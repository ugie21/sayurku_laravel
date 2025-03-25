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
                            <label for="name" class="form-label">Blog Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $detail->name }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" class="form-control"></textarea>                      
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Image</label>
                            <select name="status" id="status" class="form-select">
                                <option value="show" @if($detail->category == 'show') selected @endif>Show</option>
                                <option value="hide" @if($detail->category == 'hide') selected @endif>Hide</option>
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