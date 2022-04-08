@extends('layouts.backoffice')

@section('content')
<form action="/products/{{ $product->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" id="name" name="name" value="{{$product->name}}">
        @error('name')
            <div class="alert alert-dannger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input class="form-control" id="description" name="description" value="{{$product->description}}">
        @error('description')
            <div class="alert alert-dannger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input class="form-control" id="price" name="price" value="{{$product->price}}">
        @error('price')
            <div class="alert alert-dannger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input class="form-control" id="image" name="image" value="{{$product->image}}">
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}">
        @error('quantity')
            <div class="alert alert-dannger">{{$message}}</div>
        @enderror
    </div>

            @foreach($products as $product)
                <option 
                value="{{ $product->id}}" 
            @if($product->id === $product->product_id) selected @endif
            >
        {{ $product->name }}

</option>
            @endforeach
        </select>
    <div>
        <button class="btn btn-primary m-4 p-3">Edit</button>
    </div>
</form>
@endsection