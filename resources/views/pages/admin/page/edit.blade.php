@extends('layouts.main')
@section('container')
    <main class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-uppercase">{{  $page_title }}</h2>
                </div>
            </div>
            
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <form id="submitForm" action="" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $detail->id }}">
                        <div class="mb-3">
                            <label for="title" class="form-label">Page Tittle</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ $detail->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content_text" id="content_text" class="form-control">{{ $detail->content }}</textarea>
                            <input type="hidden" name="content" id="content">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Product Image</label>
                            <input type="file" class="form-control" name="image" id="image" value="">
                        </div>
                        <div class="mb-3">
                            <label for="content_type" class="form-label">Content Type</label>
                            <select name="content_type" id="content_type" class="form-select">
                                <option value="">Choose Content Type</option>
                                <option value="page" @if($detail->content_type == 'page') selected @endif>Page</option>
                                <option value="blog" @if($detail->content_type == 'blog') selected @endif>Blog</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset($detail->image) }}" width="250" alt="">
                        </div>
                        
                        <div class="mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary submit-data">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </main>
@endsection