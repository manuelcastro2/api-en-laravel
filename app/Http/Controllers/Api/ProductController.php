<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index()
    {
        $products = product::all();
        return $products;
    }


    public function store(Request $request)
    {
        $product = new product();
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
    }


    public function show(string $id)
    {
        $product=product::find($id);
        return $product;
    }


    public function update(Request $request, string $id)
    {
        $product=product::findOrFail($request->id);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=product::destroy($id);
        return $product;
    }
}
