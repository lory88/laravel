@extends('layouts.app')

@section('content')
@if(session ('hasError'))
    <div class="alert alert-danger"><!--alert per il delete-->
        @if(session ('action') === 'destroy')
            Delete action not allowed:checl if the selected category has children
        @endif
    </div>
@endif
<table class="table text-center">
    <thead>
        <tr>
            <th>#</th>
                <th>Name</th>
                <th>Parent</th>

        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
    <tr>
        <td> {{ $category->id}} </td>
        <td> {{ $category->name}}</td>

        <td>
            @if($category->productCategory)
                {{ $category->productCategory->name}}
            @else 
                -
            @endif
        </td>
        <td class="text-end">
            <a href="/product-categories/{{ $category->id}}/edit" class="btn btn-primary">Edit</a>
            <form class="d-inline" action="/product-categories/{{$category->id}}" method="POST">
                @csrf()
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
                <!--<input type="hidden" name="product-category-id" value="{{$category->id}}">--><!--campo id che sara tenuta nascostaa con hidden-->
            </form>
        </td>
    @endforeach
    </tbody>
</table>
@endsection