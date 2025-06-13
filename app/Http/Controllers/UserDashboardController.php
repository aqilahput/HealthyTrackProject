<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Ambil daftar makanan terbaru (misal ambil 8 paling baru)
        $foods = Food::with('category')->latest()->take(8)->get();

        return view('user.dashboard', compact('foods'));
    }
}
