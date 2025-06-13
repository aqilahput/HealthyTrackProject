<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view-food')) {
            abort(401);
        }

        $foods = Food::with('category')->get();
        return view('foods.index', compact('foods'));
    }

    public function show(string $id)
    {
        if (!Gate::allows('view-food')) {
            abort(401);
        }

        $food = Food::with('category')->findOrFail($id);
        return view('foods.show', compact('food'));
    }

    public function create()
    {
        if (!Gate::allows('store-food')) {
            abort(401);
        }

        $categories = Category::all();
        return view('foods.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!Gate::allows('store-food')) {
            abort(401);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'calories' => 'nullable|numeric',
            'fat' => 'nullable|numeric',
            'protein' => 'nullable|numeric',
            'carbohydrate' => 'nullable|numeric',
            'cooking_time' => 'nullable|integer',
            'ingredients' => 'required|string',
            'steps' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/foods', 'public');
        }

        Food::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'calories' => $validated['calories'] ?? null,
            'fat' => $validated['fat'] ?? null,
            'protein' => $validated['protein'] ?? null,
            'carbohydrate' => $validated['carbohydrate'] ?? null,
            'cooking_time' => $validated['cooking_time'] ?? null,
            'ingredients' => $validated['ingredients'],
            'steps' => $validated['steps'] ?? null,
            'category_id' => $validated['category_id'],
            'image' => $imagePath,
        ]);

        return redirect()->route('foods.index')->with('success', 'Makanan berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        if (!Gate::allows('edit-food')) {
            abort(401);
        }

        $food = Food::findOrFail($id);
        $categories = Category::all();
        return view('foods.edit', compact('food', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        if (!Gate::allows('edit-food')) {
            abort(401);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'calories' => 'nullable|numeric',
            'fat' => 'nullable|numeric',
            'protein' => 'nullable|numeric',
            'carbohydrate' => 'nullable|numeric',
            'cooking_time' => 'nullable|integer',
            'ingredients' => 'required|string',
            'steps' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $food = Food::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($food->image && Storage::disk('public')->exists($food->image)) {
                Storage::disk('public')->delete($food->image);
            }
            $food->image = $request->file('image')->store('images/foods', 'public');
        }

        $food->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? $food->description,
            'calories' => $validated['calories'] ?? $food->calories,
            'fat' => $validated['fat'] ?? $food->fat,
            'protein' => $validated['protein'] ?? $food->protein,
            'carbohydrate' => $validated['carbohydrate'] ?? $food->carbohydrate,
            'cooking_time' => $validated['cooking_time'] ?? $food->cooking_time,
            'ingredients' => $validated['ingredients'],
            'steps' => $validated['steps'] ?? $food->steps,
            'category_id' => $validated['category_id'],
            'image' => $food->image,
        ]);

        return redirect()->route('foods.index')->with('success', 'Makanan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        if (!Gate::allows('destroy-food')) {
            abort(401);
        }

        $food = Food::findOrFail($id);

        if ($food->image && Storage::disk('public')->exists($food->image)) {
            Storage::disk('public')->delete($food->image);
        }

        $food->delete();

        return redirect()->route('foods.index')->with('success', 'Makanan berhasil dihapus!');
    }
}
