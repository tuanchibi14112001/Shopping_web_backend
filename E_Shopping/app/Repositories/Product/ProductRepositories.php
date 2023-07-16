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
        $products = $this->filter($products, $request);
        $products = $this->sortAndPagination($products, $request);

        return $products;
    }

    public function getProductByCategory($category_name, $request)
    {
        $products = ProductCategory::where('name', $category_name)->first()->products->toQuery();
        $products = $this->filter($products, $request);
        $products = $this->sortAndPagination($products, $request);
        return $products;
    }

    private function sortAndPagination($products, $request)
    {

        $per_page = $request->show ?? 3;
        $sort_by  = $request->sort_by ?? 'latest';
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

        return $products;
    }
}
