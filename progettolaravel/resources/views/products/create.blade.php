@extends('layouts.backoffice')

@section('content')
<form action="/products" method="POST" enctype="multipart/form-data">
@csrf
<div class="container m-4 p-3 bg-dark p-2 text bg-opacity-50">
    <div class="form-group-sm mb-3">
        <span for="name" id="inputGroup-sizing-sm">Name</span>
        <input type="form-class" class="form-control" aria-label="Sizing example input" aria-describrdby="inputGroup-sizing-sm" id="name" name="name">
    </div>
    
    <div class="form-group-sm mb-3">
        <span for="description">Description</span>
        <input id="description"  type="form-class" name="description" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    
    <div class="form-group-sm mb-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
    </div>
    
    <div class="form-group-sm mb-3">
        <label for="price">Price</label>
        <input id="price" name="price" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
    </div>
    
    <div class="form-group-sm mb-3">
        <label for="quantity">quantity</label>
        <input id="quantity" name="quantity" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
    </div>
    
    <div class="form-group-sm mb-3">
        <select name="product-category-id" id="product-category">
            <option value="">--Select categories</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
    </div>
    <div>
        <button class="btn btn-primary p-2">Accedi</button>
    </div>
</div>

</form>
@endsection



