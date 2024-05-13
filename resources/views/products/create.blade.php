@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Create Product</h1>

    {{-- @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif --}}

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
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
            <input type="file" name="image" id="image" class="form-input border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create
        </button>
        <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">
            Back
        </a>
        
    </form>
</div>



@endsection
