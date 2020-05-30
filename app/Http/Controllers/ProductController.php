<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $products = $product->latest()->paginate(10);
        $stockBelow = $product->where('stock', '<', 100)->get();

        return view('products.index')->with([
            'products' => $products,
            'belowProducts' => $stockBelow
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sku' => ['required', 'unique:products'],
            'title' => ['required', 'max:191'],
            'price' => ['required'],
            'stock' => ['required']
        ]);

        $product = new Product;

        $product->sku = $request->sku;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->stock = $request->stock;

        $product->save();

        return redirect()->route('products.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if(!empty($product))
            return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if(!empty($product))
            return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if(!empty($product)) {
            $request->validate([
                'title' => ['required', 'max:191'],
                'price' => ['required'],
                'stock' => ['required']
            ]);

            if(Product::where([
                ['sku', '=', $request->sku],
                ['sku', '!=', $product->sku]
            ])->count())
                return redirect()->back()->withErrors(['sku' => 'Este código SKU já está sendo usado.']);

            $product->sku = $request->sku;
            $product->title = $request->title;
            $product->price = $request->price;
            $product->stock = $request->stock;

            $product->save();

            return redirect()->route('products.index')->with('success', true);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(!empty($product))
            $product->delete();

        return redirect()->route('products.index')->with('deleted', true);
    }

    /**
     * Adds a quantity to product stock
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function addStock(Request $request, $sku) {
        $product = Product::find($sku);

        if(!empty($product)) {
            $product->stock += $request->stock;
            $product->save();

            return redirect()->back()->with('success', true);
        }
    }

    /**
     * Removes a quantity from product stock
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function removeStock(Request $request, $sku) {
        $product = Product::find($sku);

        if(!empty($product)) {
            $product->stock -= $request->stock;
            $product->save();

            return redirect()->back()->with('removed', true);
        }
    }
}
