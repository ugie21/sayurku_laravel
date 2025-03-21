@extends('layouts.main')
@section('container')
    <main class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>HASIL PENCARIAN</h1>
                </div>
                @if($products->count() > 0)
                    <div class="galleries">
                        @foreach($products as $product)
                            <div class="item">
                                <a href="">
                                    <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}">
                                </a>
                                <div class="product-name">{{ $product->product_name }}</div>
                                <div class="product-description">
                                    {{ $product->product_description }}
                                </div>
                            </div>
                        @endforeach  
                    </div>
                @else
                    <div class="alert alert-info">
                        Data Tidak Ditemukan
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection