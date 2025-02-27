<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Navigation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    private $view_directory ='pages.admin.blog.';
    private $url ='blog-management';
    private $page_title ='Blog Management';

    public function index(){
        return view($this->view_directory.'index',
      [
                'page_title' => $this->page_title,
                'current_page' => $this->url,
                'navigations' => Navigation::where('category', 'admin')->where('status', 'show')->get(),
                'data' => Blog::all(),
                'javascript_file' => '',
            ] 
        );
    }

    public function create(){
        return view($this->view_directory.'create',
      [
                'page_title' => $this->page_title,
                'current_page' => $this->url,
                'navigations' => Blog::where('category', 'admin')->where('status', 'show')->get(),
                'data' => Blog::all(),
                'javascript_file' => 'admin/blog/create.js',
            ]  
        );  
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'blog_name' => 'required',
            'blog_description' => 'required',
            'blog_image' =>'required|file|mimes:jpg,jpeg,png',
        ]);

        $folder_destination = 'uploads/blogs';
        $file = $request->file('blog_image');
        $file_name = time().'-'.$request->file('blog_image')->getClientOriginalName();
        $file->move($folder_destination, $file_name);

        try{
            $data['blog_name'] = $request->blog_name;
            $data['blog_description'] = $request->blog_description;
            $data['blog_image'] = $folder_destination.'/'.$file_name;
            if(Blog::create($data)){
                return response()->json([
                    'status' => 201,
                    'message' =>'The blog has been added.'
                ]);
            }else{
                return response()->json([
                    'status' => 400,
                    'message' =>'Sorry, failed to add the blog.'
                ]);
            }
        }catch(\Exception $error){
            return response()->json([
                'status' => 422,
                'message' =>'Sorry, failed to add the blog.' .$error->getMessage()
            ]);
        }
    }

    public function edit($id){
        return view($this->view_directory.'edit',
      [
                'page_title' => $this->page_title,
                'current_page' => $this->url,
                'navigations' => Navigation::where('category', 'admin')->where('status', 'show')->get(),
                'detail' => Blog::find($id),
                'javascript_file' => 'admin/blog/edit.js',
            ]  
        );  
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'blog_name' => 'required',
            'blog_description' => 'required',
            'blog_image' =>'nullable|file|mimes:jpg,jpeg,png',
        ]);

        try{
            $data = Blog::find($request->id);

            if($data){
                $data->blog_name = $request->blog_name;
                $data->blog_description = $request->blog_description;

                if($request->file('blog_image')){
                    $folder_destination = 'uploads/blogs';
                    $file = $request->file('blog_image');
                    $file_name = time().'-'.$request->file('blog_image')->getClientOriginalName();
                    $file->move($folder_destination, $file_name);

                    $data->blog_image = $folder_destination.'/'.$file_name;
                }

                $data->save();
            }

            return response()->json([
                'status' => 201,
                'message' => 'The blog has been updated',
            ]);

        }catch(\Exception $error){
            return response()->json([
                'status' => 422,
                'message' => 'Failed to update data' .$error->getMessage(),
            ]);
        }
    }

    public function destroy($id){
        $data = Blog::find($id);
        if($data){
            $data->delete();
            session::flash('message', 'The data has been deleted');
            return redirect('/blog-management');
        }
    }

}
