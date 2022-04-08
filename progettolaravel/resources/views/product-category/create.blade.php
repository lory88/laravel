@extends('layouts.backoffice')

@section('content')
<form action="/product-categories" method="POST">
@csrf
<div class="container m-4 p-3 bg-dark p-2 text-dark bg-opacity-25">
    <div class="form-group-sm mb-3">
        <label for="name">Name</label>
        <input class="form-control" id="name" name="name">
            @error('name')
                <div class="alert alert-dannger">{{$message}}</div>
            @enderror
    </div>
    <div class="form-group-sm mb-3">
        <label class="product-category">Product Category</label>
            <select class="m-3 p-2" id="product-category" name="product-category-id">
                <option value="">select category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id}}">{{$category->name}}</option>
                    @endforeach
            </select>
            <div>
                <button class="btn btn-primary m-3 p-2">Create</button>
            </div>
    </div>
</form>
</div>
@endsection