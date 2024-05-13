@extends('layouts.app')

@section('content')
    <h1 class="text-center text-3xl font-semibold mb-4">Products</h1>

    <div class="flex justify-center mb-4">
        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Product</a>
    </div>

    @if(session('success'))
        <div id="successAlert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path fill-rule="evenodd" d="M14.35 14.35a1 1 0 0 1-1.41 0L10 11.41l-2.93 2.93a1 1 0 1 1-1.41-1.41L8.59 10 5.66 7.07a1 1 0 0 1 1.41-1.41L10 8.59l2.93-2.93a1 1 0 0 1 1.41 1.41L11.41 10l2.93 2.93a1 1 0 0 1 0 1.42z"/>
                </svg>
            </span>
        </div>
    @endif

    <div class="container mx-auto">
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-500">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-200 border border-gray-500">Name</th>
                        <th class="px-4 py-2 bg-gray-200 border border-gray-500">Description</th>
                        <th class="px-4 py-2 bg-gray-200 border border-gray-500">Price</th>
                        <th class="px-4 py-2 bg-gray-200 border border-gray-500">Variant</th>
                        <th class="px-4 py-2 bg-gray-200 border border-gray-500">Is New</th>
                        <th class="px-4 py-2 bg-gray-200 border border-gray-500">Image</th>
                        <th class="px-4 py-2 bg-gray-200 border border-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-4 py-2 border border-gray-500">{{ $product->name }}</td>
                            <td class="px-4 py-2 border border-gray-500">{{ $product->description }}</td>
                            <td class="px-4 py-2 border border-gray-500">{{ $product->price }}</td>
                            <td class="px-4 py-2 border border-gray-500">{{ $product->variant }}</td>
                            <td class="px-4 py-2 border border-gray-500">{{ $product->is_new }}</td>
                            <td class="px-4 py-2 border border-gray-500">
                                <img src="{{ asset('assets/image/' . $product->image) }}" class="w-16 h-16" alt="image">
                            </td>
                            <td class="px-4 py-2 border border-gray-500">
                                <a href="{{ route('products.edit', $product) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                <form method="POST" action="{{ route('products.destroy', $product) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Function to dismiss the alert after a specified duration
        window.onload = function() {
            setTimeout(function() {
                var successAlert = document.getElementById('successAlert');
                if (successAlert) {
                    successAlert.style.display = 'none';
                }
            }, 3000); // 5000 milliseconds = 5 seconds (adjust as needed)
        };
    </script>

@endsection