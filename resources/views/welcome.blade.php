@extends('layouts.app')

@section('content')
<main class="py-8 px-4">
    <section class="mb-8">
        <h2 class="text-2xl font-bold mb-2">About Us</h2>
        <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut ante vel nunc efficitur placerat. Integer sit amet fermentum mauris, nec maximus velit.</p>
    </section>

    <section class="mb-8">
        <h2 class="text-2xl font-bold mb-2">Our Products</h2>
        <p class="text-gray-700">Check out our amazing products:</p>
        <div class="mt-4">
            <a class="text-center text-sm   bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block" href="{{ route('products.index') }}">View Products</a>
        </div>
    </section>

    <section>
        <h2 class="text-2xl font-bold mb-2">Contact Us</h2>
        <p class="text-gray-700">Have questions? Contact us:</p>
        <ul class="mt-4">
            <li class="text-gray-700">Email: info@example.com</li>
            <li class="text-gray-700">Phone: 123-456-7890</li>
            <!-- Add more contact information as needed -->
        </ul>
    </section>
</main>

@endsection
