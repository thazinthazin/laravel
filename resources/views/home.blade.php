@extends('layout.master')

@section('content')
<div class="container-fluid">
    <div class="col-md-3">
        {{--sidebar--}}
        @include('layout.sidebar')
    </div>

    <div class="col-md-9">
        <h1>Content</h1>

        @foreach($products as $product)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail" style="text-align: center;">

                    <img src="{{asset($product->image)}}" width="100" height="80" alt="img">

                    <div class="caption">
                        <h3>{{$product->price}}</h3>
                        <h3>{{$product->title}}</h3>
                        <p>{{$product->description}}</p>
                        <p>
                            <a href="#" class="btn btn-info">View Detail</a>
                            <a href="#" class="btn btn-success pull-right">Add To Cart</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
