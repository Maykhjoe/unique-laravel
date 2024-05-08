@extends('layouts.app')

@section('styles')

<style>
    /* Custom styling for the success alert */
    #successAlert {
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
</style>

@endsection

 


@section('content')
    <h1 class="text-center">Products</h1>

    <p class="text-center">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
    </p>

    @if(session('success'))
            <div id="successAlert" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>variant</th>
                        <th>is_new</th>
                        <th>image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->variant }}</td>
                            <td>{{ $product->is_new }}</td>
                            <td>
                                <img src="{{ asset($product->image) }}" style="width: 70px; height:70px;" alt="Img" />
                            </td>
                            <td>
                                <a href="{{ route('products.edit', $product) }}">Edit</a>
        
                                <form method="POST" action="{{ route('products.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
        
                                    <button type="submit">Delete</button>
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
            }, 5000); // 5000 milliseconds = 5 seconds (adjust as needed)
        };
    </script>

@endsection