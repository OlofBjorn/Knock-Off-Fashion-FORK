<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::query()
            ->when($request->brand_name, function ($query, $brand) {
                $brand = strtolower(str_replace(' ', '', $brand));

                $query->whereRaw(
                    "REPLACE(LOWER(brand_name), ' ', '') LIKE ?",
                    ["%{$brand}%"]
                );
            })

            ->when($request->product_name, function ($query, $productName) {
                $productName = strtolower(str_replace(' ', '', $productName));

                $query->whereRaw(
                    "REPLACE(LOWER(product_name), ' ', '') LIKE ?",
                    ["%{$productName}%"]
                );
            })

            ->when($request->category, function ($query, $category) {
                $category = strtolower(str_replace(' ', '', $category));

                $query->whereRaw(
                    "REPLACE(LOWER(category), ' ', '') LIKE ?",
                    ["%{$category}%"]
                );
            })
            ->when($request->min_price, function ($query, $min) {
                $query->where('price', '>=', $min);
            })
            ->when($request->max_price, function ($query, $max) {
                $query->where('price', '<=', $max);
            })
            ->paginate(10)
            ->withQueryString();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string|max:50',
            'description' => 'required|string|max:150',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:50',
            'color' => 'required|string|max:50',
            'stock' => 'required|integer|min:0',
            'product_name' => 'required|string|max:50',
        ]);  
        
        Product::create($validated); 
        {
            return redirect()->route('products.index')->with('success', 'Product created.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string|max:50',
            'description' => 'required|string|max:150',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:50',
            'color' => 'required|string|max:50',
            'stock' => 'required|integer|min:0',
            'product_name' => 'required|string|max:50',
        ]);
        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')
                     ->with('success', 'Product deleted successfully.');
    }
}
