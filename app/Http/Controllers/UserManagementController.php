<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class UserManagementController extends Controller
{
    private $view_directory ='pages.admin.user.';
    private $url ='user-management';
    private $page_title ='User Management';

    public function index(){
        return view($this->view_directory.'index',
      [
                'page_title' => $this->page_title,
                'current_page' => $this->url,
                'navigations' => Navigation::where('category', 'admin')->where('status', 'show')->get(),
                'data' => User::paginate(10),
                'javascript_file' => '',
            ] 
        );
    }

    public function create(){
        return view($this->view_directory.'create',
      [
                'page_title' => $this->page_title,
                'current_page' => $this->url,
                'navigations' => Navigation::where('category', 'admin')->where('status', 'show')->get(),
                'data' => User::all(),
                'javascript_file' => 'admin/user/create.js',
            ]  
        );  
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' =>'required|min:6|max:10',
        ]);

        try{
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);
            if(User::create($data)){
                return response()->json([
                    'status' => 201,
                    'message' =>'The user has been added.'
                ]);
            }else{
                return response()->json([
                    'status' => 400,
                    'message' =>'Sorry, failed to add the product.'
                ]);
            }
        }catch(\Exception $error){
            return response()->json([
                'status' => 422,
                'message' =>'Sorry, failed to add the product.' .$error->getMessage()
            ]);
        }
    }

    public function edit($id){
        return view($this->view_directory.'edit',
      [
                'page_title' => $this->page_title,
                'current_page' => $this->url,
                'navigations' => Navigation::where('category', 'admin')->where('status', 'show')->get(),
                'detail' => User::find($id),
                'javascript_file' => 'admin/user/edit.js',
            ]  
        );  
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        try{
            $data = User::find($request->id);

            if($data){
                $data->name = $request->name;
                $data->email = $request->email;
                if($request->password){
                    $data->password = bcrypt($request->password);
                }
                $data->save();
            }

            return response()->json([
                'status' => 201,
                'message' => 'The User has been updated',
            ]);

        }catch(\Exception $error){
            return response()->json([
                'status' => 422,
                'message' => 'Failed to update data' .$error->getMessage(),
            ]);
        }
    }

    public function destroy($id){
        $data = User::find($id);
        if($data){
            $data->delete();
            session::flash('message', 'The data has been deleted');
            return redirect('/user-management');
        }
    }
}
