<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::withTrashed()->with(['categories'])->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);
    
        // Save image if present
        $picPath = $request->file('pic') ? $request->file('pic')->store('products', 'public') : null;
    
        // Create product with image path if provided
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'pic' => $picPath, // Ensure you are storing the image path correctly
        ]);
    
        if ($request->has('categories')) {
            $product->categories()->attach($request->categories);
        }
    
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
          
        ]);

        // Check and update image if present
        if ($request->hasFile('pic')) {
            // Delete old image if exists
            if ($product->pic) {
                Storage::disk('public')->delete($product->pic);
            }
            $product->pic = $request->file('pic')->store('products', 'public');
        }

        $product->update($request->only(['name', 'description', 'price',  'pic']));

        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        dd($product); // Check if the product is retrieved correctly
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product soft deleted successfully.');
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('products.index')->with('success', 'Product restored successfully.');
    }

  
}
