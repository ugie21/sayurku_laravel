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
                        <div class="mb-3">
                            <label for="title" class="form-label">Page Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content_text" id="content_text" class="form-control"></textarea>
                            <input type="hidden" name="content" id="content" value="">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="image" value="">
                        </div>
                        <div class="mb-3">
                            <label for="content_type" class="form-label">Content Type</label>
                            <select name="content_type" id="content_type" class="form-select">
                                <option value="">Choose Content Type</option>
                                <option value="page">Page</option>
                                <option value="blog">Blog</option>
                            </select>
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