@extends('layout.master')
@section('title','Create Product')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Add New</strong> Product</h3>
                
                <form method="POST" action="{{route('product_create')}}" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <lable for="description">Description</lable>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <select class="btn btn-default" name="category_id">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" selected="">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image" class="form-control" multiple id="file-simple"/>
                        </div>

                        <a href="{{route('products')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection