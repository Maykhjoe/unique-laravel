@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>

    <form method="POST" action="{{ route('products.update', $product) }}">
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
    </form>
</div>

@endsection
