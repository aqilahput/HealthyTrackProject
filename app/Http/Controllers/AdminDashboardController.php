<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalFoods = Food::count();
        $totalCategories = Category::count();
        $categories = Category::withCount('foods')->get();

        $foods = Food::latest()->take(8)->get(); // Tambahkan ini

        return view('admin.dashboard', compact('totalFoods', 'totalCategories', 'categories', 'foods'));
    }
}
