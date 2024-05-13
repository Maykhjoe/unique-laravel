<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
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
        // Product::create($request->validated());

        // return redirect()->route('products.index')->with('success', 'produk telah ditambahkan!!');

        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'variant' => 'required',
            'is_new' => 'boolean',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048|required',
        ]);
        $filename = NULL;
        $path = NULL;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();    

            $filename = time() . '.' . $extension;

            // Move the file to the desired location
            $file->move(public_path('/assets/image'), $filename);

            // Store the image path in the database
            $path = '/assets/image/' . $filename;
        }

        product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'variant' => $request->variant,
            'is_new' => $request->is_new == true ? 1:0,
            'image' => $filename,
        ]);

        return redirect()->route('products.index')->with('success', 'produk telah ditambahkan!!');
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return View
     */
    public function edit(Product $product): View
    {
        $products = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductRequest  $request
     * @param  Product  $product
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        // $product->update($request->validated());

        // return redirect()->route('products.index')->with('success', 'Produk Sukses Diupdate!!');

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'variant' => 'required',
            'is_new' => 'booleand',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $products = product::findOrFail($id);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginaExtension();

            $filename = time() . '.' . $extension;

            $path = public_path('uploads/products');
            $file->move($path, $filename);

            if(File::exists($products->image)) {
                File::delete($products->image);
            }
        }
        $products->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'variant' => $request->variant,
            'is_new' => $request->is_new == true ? 1:0,
            'image' => $path.$filename,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk Sukses Diupdate!!');
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

    public function getProductsData(): Response
    {
        $products = Product::all();

    return (new Response(response()->json(['products' => $products], 200), 200))->header('Content-Type', 'application/json');
    }
}