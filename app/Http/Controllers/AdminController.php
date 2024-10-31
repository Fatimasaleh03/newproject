<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        
        $productCount = \App\Models\Product::count();
        $orderCount = \App\Models\Order::count();
        $categoryCount = \App\Models\Category::count();
    
        return view('admin.dashboard', compact('productCount', 'orderCount', 'categoryCount'));
    }
}
