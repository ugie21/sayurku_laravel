@extends('layouts.main')
@section('container')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="text-align: center;">
                <h1>{{ $page_detail->title}}</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio aliquam, nulla iure eligendi cupiditate vitae adipisci natus voluptates cum reprehenderit.</p>
            </div>
        </div>
    </div>
</div>
<main class="content">
    <div class="container">
        <div class="row mt-4 page-content">
            <div class="col-lg-12" >
                {!! $page_detail->content !!} 
            </div>
        </div>
    </div>
</main>
@endsection