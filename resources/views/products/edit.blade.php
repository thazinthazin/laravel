@extends('layout.master')
@section('title','Edit Product')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Edit</strong> Product</h3>
				 
				<form action="{{action('ProductController@update',$products->id)}}" method="POST" class="form-horizontal" >
					<?php echo csrf_field(); ?>
					<div class="panel-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="product_title" class="form-control" value="{{$products->title}}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="product_price" class="form-control" value="{{$products->price}}">
                        </div>
                        <div class="form-group">
                            <lable for="description">Description</lable>
                            <textarea name="description" id="product_description" rows="5" class="form-control">{{$products->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <select class="btn btn-default" name="category_id">
                                @foreach($categories as $category)
								<option @if(in_array($category->id, $categories_product)) selected @endif value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image Upload</label>
                            <input type="file" name="image[]"  id="image"><img src="{{ asset($products->image) }}" multiple width="200px"/></br>
                        </div> 
							
							<a href="{{route('products')}}" class="btn btn-default">Cancel</a>					                                
							<button type="submit" class="btn btn-primary">Update</button>
						</div>											
					</div>					
				</form>
			</div>
		</div>
	</div>
</div>
@endsection