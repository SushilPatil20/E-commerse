<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('products.create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $imageName = time() . "." . $request->image->extension();
        $request->image->move(public_path('product_images'), $imageName);

        $newProduct = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName
        ]);
        $newProduct->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where('id', $id)->get()->first();
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productToEdit = Product::where('id', $id)->get()->first();
        if ($productToEdit) {
            return view('products.edit', ['product' => $productToEdit]);
        } else {
            dd("Somthing went wrong");
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        if (isset($request->image)) {
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path('product_images'), $imageName);
            $request->image = $imageName;
        }
        $productToUpdate = Product::where('id', $id)->get()->first();
        $productToUpdate->name = $request->name;
        $productToUpdate->description = $request->description;
        $productToUpdate->price = $request->price;
        $productToUpdate->update();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productTodDelete = Product::where('id', $id);
        if ($productTodDelete) {
            $productTodDelete->delete();
            return redirect()->route('products.index');
        } else {
            dd('somthing went wrong');
        }
    }
}
