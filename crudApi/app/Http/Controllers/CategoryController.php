<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active ?? true,
        ]);

        return response()->json([
            'message' => 'Category created successfully',
            'data' => $category
        ], 201);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
        ]);

        $category->update($request->all());

        return response()->json([
            'message' => 'Category updated successfully',
            'data' => $category
        ]);
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    }
}


// namespace App\Http\Controllers;

// use App\Models\Category;
// use Illuminate\Http\Request;

// class CategoryController extends Controller
// {
//     public function index()
//     {
//         $categories = Category::all();
//         return view('categories.index', compact('categories'));
//     }

//     public function create()
//     {
//         return view('categories.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required'
//         ]);

//         Category::create($request->all());

//         return redirect()->route('categories.index')
//             ->with('success', 'Category created successfully');
//     }

//     public function edit(Category $category)
//     {
//         return view('categories.edit', compact('category'));
//     }

//     public function update(Request $request, Category $category)
//     {
//         $request->validate([
//             'name' => 'required'
//         ]);

//         $category->update($request->all());

//         return redirect()->route('categories.index')
//             ->with('success', 'Category updated successfully');
//     }

//     public function destroy(Category $category)
//     {
//         $category->delete();

//         return redirect()->route('categories.index')
//             ->with('success', 'Category deleted successfully');
//     }
// }