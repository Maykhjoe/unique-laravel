@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>

    {{-- <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price (IDR):</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}" step="0.01" required>
            </div>
        </div>

        <div class="form-group">
            <label for="variant">Variant:</label>
            <input type="text" class="form-control" name="variant" id="variant" value="{{ old('variant') }}" required>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="is_new" id="is_new" value="1" {{ old('is_new') ? 'checked' : '' }}>
            <label class="form-check-label" for="is_new">Is New</label>
        </div>

        <div class="form-group">
            <label for="image">Product Image:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </form> --}}
    {{-- <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="name" class="block mb-2">Name:</label>
            <input type="text" class="form-input border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 w-full" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block mb-2">Description:</label>
            <textarea class="form-textarea border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 w-full" name="description" id="description" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block mb-2">Price (IDR):</label>
            <div class="flex">
                <span class="input-group-text mr-2 font-bold">Rp</span>
                <input type="number" class="form-input border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 w-full" name="price" id="price" value="{{ old('price') }}" step="0.01" required>
            </div>
        </div>

        <div class="mb-4">
            <label for="variant" class="block mb-2">Variant:</label>
            <input type="text" class="form-input border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 w-full" name="variant" id="variant" value="{{ old('variant') }}" required>
        </div>

        <div class="mb-4">
            <input type="checkbox" class="form-checkbox" name="is_new" id="is_new" value="1" {{ old('is_new') ? 'checked' : '' }}>
            <label class="ml-2" for="is_new">Is New</label>
        </div>

        <div class="mb-4">
            <label for="image" class="block mb-2">Product Image:</label>
            <input type="text" class="form-input border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 w-full" name="image" id="image" value="{{ old('image') }}" required>
        </div>


        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create
        </button>
        <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">
            Back
        </a>
        
    </form> --}}

    @extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PATCH')
        
        <div class="mb-4">
            <label for="product_id" class="block text-gray-700">Product ID:</label>
            <select id="product_id" name="product_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" onchange="location = this.value;">
                @foreach ($products as $item)
                    <option value="{{ route('products.edit', $item->id) }}" {{ $item->id == $product->id ? 'selected' : '' }}>
                        {{ $item->id }} - {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description:</label>
            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700">Price:</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="variant" class="block text-gray-700">Variant:</label>
            <input type="text" id="variant" name="variant" value="{{ old('variant', $product->variant) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="is_new" class="block text-gray-700">Is New:</label>
            <input type="checkbox" id="is_new" name="is_new" value="1" {{ old('is_new', $product->is_new) ? 'checked' : '' }} class="mt-1 block">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image:</label>
            <input type="text" id="image" name="image" value="{{ old('image', $product->image) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
            <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
        </div>
    </form>
</div>
@endsection

</div>

@endsection
