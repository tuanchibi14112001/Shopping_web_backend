<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Repositories\BaseRepositories;

class ProductRepositories extends BaseRepositories implements ProductRepositoriesInterFace
{
    public function getModel()
    {
        return Product::class;
    }

    public function getRelatedProducts($product, $limit = 4)
    {
        return $this->model->where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->where('tag', $product->tag)
            ->limit($limit)->get();
    }

    public function getFeaturedProducts($categoryId)
    {
        return $this->model->where('product_category_id', $categoryId)
            ->orderBy('price', 'desc')->get();
    }

    public function getProductOnIndex($request)
    {

        $search_pro_name = $request->search_pro_name ?? '';
        $products = $this->model->where('name', 'like', '%' . $search_pro_name . '%');
        //$products = $this->filter($products, $request);
        $products = $this->sortAndPagination($products, $request);

        return $products;
    }

    public function getProductByCategory($category_name, $request)
    {
        $products = ProductCategory::where('name', $category_name)->first()->products->toQuery();
        //$products = $this->filter($products, $request);
        $products = $this->sortAndPagination($products, $request);
        return $products;
    }

    private function sortAndPagination($products, $request)
    {

        $per_page = $request->show ?? 3;
        $sort_by  = $request->sort_by ?? 'latest';
        $price_min  = $request->price_min ?? 10;
        $price_max  = $request->price_max ?? 999;
        $price_min  = str_replace('$', '', $price_min);
        $price_max  = str_replace('$', '', $price_max);

        $brands = $request->brand ?? [];
        $color  = $request->color ?? '';
        $size  = $request->size ?? '';
        $products = $this->filter($products, $request);


        switch ($sort_by) {
            case 'latest':
                $products = $products->orderByDesc('id');
                break;
            case 'oldest':
                $products = $products->orderBy('id');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
                // case 'price-ascending':
                //     $products = $products->orderBy('price');
                //     break;
                // case 'price-descrease':
                //     $products = $products->orderByDesc('price');
                //     break;
            default:
                $products = $products->orderBy('id');
                break;
        }


        $products = $products->paginate($per_page);
        $products->appends(
            [
                'brand' => $brands,
                'price_min'=>$price_min,
                'price_max'=>$price_max,
                'color' => $color,
                'size' => $size,
                'sort_by' => $sort_by,
                'show' => $per_page,
            ]
        );

        return $products;
    }

    private function filter($products, $request)
    {
        // Brand
        $brands = $request->brand ?? [];
        $brand_ids = array_keys($brands);

        $products = $brand_ids != null ? $products->whereIn('brand_id', $brand_ids) : $products;

        // price

        $price_min  = $request->price_min;
        $price_max  = $request->price_max;
        $price_min  = str_replace('$', '', $price_min);
        $price_max  = str_replace('$', '', $price_max);

        $products = ($price_min && $price_max) ? $products->whereBetween('price', [$price_min, $price_max]) : $products;

        //color
        $color  = $request->color;
        $products = $color != null ? $products->whereHas('productDetails', function($query) use ($color) {
            return $query->where('color', 'like', '%' . $color . '%')->where('qty','>',0);
        }) : $products;

        //size
        $size  = $request->size;
        $products = $size != null ? $products->whereHas('productDetails', function($query) use ($size) {
            return $query->where('size', $size)->where('qty','>',0);
        }) : $products;

        return $products;
    }
}
