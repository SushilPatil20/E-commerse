<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $numberOfProducts = Product::all();
        $numberOfUsers = User::where('role', 'user')->get();
        return view('admin.dashboard', ['numberOfProducts' => count($numberOfProducts), 'numberOfUsers' => count($numberOfUsers)]);
    }
}
