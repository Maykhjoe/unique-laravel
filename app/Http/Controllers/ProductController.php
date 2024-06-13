<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::all();

       

        return view('products.index', compact('products'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductRequest  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'variant' => 'required',
            'is_new' => 'nullable|boolean',
            'image' => 'required|string', // Validation for image file
        ]);
    
        
        product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'variant' => $request->variant,
            'is_new' => $request->has('is_new') ? 'New' : 'Old',
            'image' => $request->image, // Store the image path as a string
        ]);
        
        return redirect()->route('products.index')->with('success', 'Produk telah ditambahkan!!');
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return View
     */
    public function edit($id)
    {
        $products = Product::all();
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product', 'products'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductRequest  $request
     * @param  Product  $product
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'variant' => 'required',
        'is_new' => 'boolean',
        'image' => 'required|string', // Validation for image file
    ]);

    $product = Product::findOrFail($id);
    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'variant' => $request->variant,
        'is_new' => $request->is_new == true ? 1 : 0,
        'image' => $request->image, // Store the image path as a string
    ]);

    return redirect()->route('products.index')->with('success', 'Produk telah diperbarui!!');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        // $product->delete();

        // return redirect()->route('products.index')->with('success', 'produk telah dihapus!!');
        $products = product::findOrFail($id);
        if(File::exists($products->image)) {
            File::delete($products->image);
        }
        $products->delete();
        return redirect()->route('products.index')->with('success', 'produk ' . $products->name . ' telah dihapus!!');

    }

    public function getProductsData(): JsonResponse
{
    $products = Product::all();

    return response()->json(['products' => $products]);
}

public function selectProduct()
{
    $products = Product::all();
    return view('products.select', compact('products'));
}

}