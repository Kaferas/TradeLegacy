<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get("search");
        $categoryId = $request->get("category_id");

        $query = Product::query();

        if (!empty($search)) {
            $query->where("name", "LIKE", "%{$search}%");
        }

        if (!empty($categoryId)) {
            $query->where("category_id", $categoryId);
        }

        $products = $query->with('category')->orderBy('id', "DESC")->get();
        $categories = Category::all();

        return view("admin.product.index", ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.product.form_product", ['categories' => $categories]);
        // return view("admin/product/form_product", ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:product_categories,id',
            'file_upload' => 'required|file|max:10240',
        ]);

        $file = $request->file('file_upload');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('products_img', $filename, 'public');
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'file_upload' => $path,
            'price' => $request->price,
        ]);

        if ($product) {
            return redirect("/product")->with('success', "Product created successfully");
        } else {
            return redirect()->back()->with('error', "Failed to create product");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view("admin.product.form_product", ['product' => $product, 'categories' => $categories]);
        // return view("admin/product/form_product", ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:product_categories,id',
        ]);

        $isUpdated = $product->update($request->all());
        if ($isUpdated) {
            return redirect("/product")->with('success', "Product updated successfully");
        } else {
            return redirect()->back()->with('error', "Failed to update product");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $isDeleted = $product->delete();
        if ($isDeleted) {
            return redirect("/product")->with('success', "Product deleted successfully");
        } else {
            return redirect()->back()->with('error', "Failed to delete product");
        }
    }
}
