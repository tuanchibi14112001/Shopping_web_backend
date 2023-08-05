@extends('front.layout.master')
@section('title', 'Result')

@section('body')


    <!-- Code here -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Result</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Check Out Section Begin -->
    <div class="checkout-section spad">
        <div class="container">
            <div class="col-lg-12">
                <h4>{{$notifi}}</h4>
                <a href="./" class="primary-btn mt-5">Continue shopping</a>
            </div>
        </div>
    </div>

    <!-- Check Out Section End -->


    <!-- Code here -->


@endsection
