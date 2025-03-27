@extends('layouts.main')
@section('container')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="text-align: center;">
            <h1>Blog</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio aliquam, nulla iure eligendi cupiditate vitae adipisci natus voluptates cum reprehenderit.</p>
            </div>
        </div>
    </div>
</div>
<main class="content">
    <section class="products">
        <div class="container-xxl">
            <div class="galleries page-content">
                @foreach($blogs as $blog)
                    <div class="item">
                        <a href="{{ url('blog/'.$blog->slug) }}">
                            <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                        </a>
                        <div class="product-name">{{ $blog->title }}</div>
                        <div class="mt-3 mb-3 p-2 d-flex justify-content-end">
                            <a href="" class="btn btn-outline-success">Read More</a>
                        </div>
                    </div>
                @endforeach  
            </div>
        </div>
    </section>
    </main>
@endsection