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
                $query->where('brand_name', 'like', "%{$brand}%");
            })
            ->when($request->category, function ($query, $category) {
                $query->where('category', $category);
            })
            ->when($request->min_price, function ($query, $min) {
                $query->where('price', '>=', $min);
            })
            ->when($request->max_price, function ($query, $max) {
                $query->where('price', '<=', $max);
            })
            ->get();

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
            'brand_name' => 'required|string|max:255',
            'description'=> 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'color' => 'required|string|max:50',
            'stock' => 'required|integer|min:0',
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
