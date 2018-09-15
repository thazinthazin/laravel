@extends('layout.master')
@section('title','Edit Category')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Edit</strong> Category</h3>
				 
				<form action="{{action('CategoryController@update',$categories->id)}}" method="POST" class="form-horizontal" >
					<?php echo csrf_field(); ?>
					<div class="panel-body">						
						<div class="form-group">
							<div class="col-md-3">
								<input type="text" id="name" name="name" class="form-control" value="{{$categories->name}}">								
							</div>
							
							<a href="{{route('categories')}}" class="btn btn-default">Cancel</a>					                                
							<button type="submit" class="btn btn-primary">Update</button>
						</div>											
					</div>					
				</form>
			</div>
		</div>
	</div>
</div>
@endsection