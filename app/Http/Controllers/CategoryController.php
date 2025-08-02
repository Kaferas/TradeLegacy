<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get("search");
        if (!empty($search)) {
            $categories = Category::where("name", "LIKE", "%{$search}%")->orderBy('id', "DESC")->get();
        } else {
            $categories = Category::orderBy('id', "DESC")->get();
        }
        return view("admin.product.category_list", ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.product.form_category");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create($request->all());
        if ($category) {
            return redirect("/category")->with('success', "Category created successfully");
        } else {
            return redirect()->back()->with('error', "Failed to create category");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("admin.product.form_category", ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $isUpdated = $category->update($request->all());
        if ($isUpdated) {
            return redirect("/category")->with('success', "Category updated successfully");
        } else {
            return redirect()->back()->with('error', "Failed to update category");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $isDeleted = $category->delete();
        if ($isDeleted) {
            return redirect("/category")->with('success', "Category deleted successfully");
        } else {
            return redirect()->back()->with('error', "Failed to delete category");
        }
    }
}
