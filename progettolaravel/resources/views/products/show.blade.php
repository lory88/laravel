@extends('layouts.backoffice')

@section('content')
<div class="container m-4">
    <div class="row">

@foreach($shows as $show)
<?php $path=$show->image; ?>
<div class="col-4 mb-3">
    <div class="card" style="width: 18rem;">
                <?php echo "<img src=$path class='card-img-top' style='width:200px; height:190px;'  alt='...'>" ?>                    
                <div class="card-body">
                    <h5 class="card-title">{{$show->name}}</h5>
                        <p class="card-title">{{$show->description}}</p>
                        <p class="card-title">{{$show->price}}</p>
                        <p class="card-title">{{$show->quantity}}</p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Add Cart</a>
            </div>
</div>
</div>
@endforeach
</div>
    </div>

@endsection
