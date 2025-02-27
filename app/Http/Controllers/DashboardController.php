<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Navigation;

class DashboardController extends Controller
{
    public function index(){
        return view('pages.admin.dashboard',
        [
                  'current_page' => 'dashboard',
                  'navigations' => Navigation::where('category', 'admin')->where('status', 'show')->get(),
                  'javascript_file' => '',
                  'data_list' => Order::all(),
                  'page_title' => 'Dashboard'
              ]
        );
    }
}
