<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index() {
        // Retrieve paginated products
        $products = Product::paginate(3);
    
        // Calculate the starting serial number for the current page
        $currentPage = $products->currentPage();
        $perPage = $products->perPage();
        $startingSerialNumber = ($currentPage - 1) * $perPage + 1;
    
        // Add a serial number (count) to each product
        $products->getCollection()->transform(function ($product) use (&$startingSerialNumber) {
            $product->count = $startingSerialNumber++;
            return $product;
        });
    
        return view('products.index', [
            'products' => $products,
        ]);
    }    

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {

        // validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        // upload image to public path
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        // push to database
        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        return back()->withSuccess('Product added successfully');
    }

    public function edit($id) {
        $product = Product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id) {

        // validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $product = Product::where('id', $id)->first();

        if(isset($request->image)) {
            //upload image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return back()->withSuccess('Product updated successfully');
    }

    public function destroy($id) {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product deleted successfully');
    }

    public function show($id) {
        $product = Product::where('id', $id)->first();
        return view('products.show', ['product' => $product]);        
    }
}
