@extends('layouts.app')

@section('content')
@if(session ('hasError'))
    <div class="alert alert-danger"><!--alert per il delete-->
        @if(session ('action') === 'destroy')
            Delete action not allowed:checl if the selected category has children
        @endif
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>quantity</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
    <tr>
        <td> {{ $product->id}} </td>
        <td> {{ $product->name}}</td>
        <td> {{ $product->description}}</td>
        <td> {{ $product->price}}</td>
        <td> {{ $product->quantity}}</td>

        <td>
        <a href="/products/{{ $product->id}}/edit" class="btn btn-primary">Edit</a>

        <form class="d-inline" action="/products/{{$product->id}}" method="POST">
                @csrf()
                @method('DELETE')
                <button class="btn btn-danger p-2 m-1">Delete</button>
            </form>
        </td>
    @endforeach
    </tbody>
</table>
@endsection