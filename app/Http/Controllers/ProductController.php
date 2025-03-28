<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prods = Product::paginate(10);
        return view('products.index', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // If you need to eager load the 'comments' relationship,
        // you can do so by modifying the route binding or by accessing the relationship directly here.
        $product->load('comment'); // This will load the 'comments' relationship

        return view('products.show', compact('product'));
    }

    /**
     * Display the specified resource.
     */
    public function showTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $products = $tag->product->paginate(12);
        return view('tags.show', compact('tag', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
