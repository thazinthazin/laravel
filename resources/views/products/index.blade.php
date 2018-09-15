@extends('layout.master')
@section('title','Products')

@section('content')
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				@if(session('status'))
                    <p class="alert alert-success">{{session('status')}}</p>
                @endif
                
					<h3 class="panel-title"><strong>Show All Product</strong></h3>
					<a href="{{url('/products/create')}}" class="btn btn-success pull-right"><strong>Create Product</strong></a>
					
					<div class="panel-body">  				
						<table id="products-table" class="table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Title</th>
									<th>Price</th>
									<th>Description</th>
									<th>Category ID</th>
									<th>Image</th>
								</tr>
							</thead>

							<tbody>
								@foreach($products as $product)
								<tr>
									<td>{{$product->id}}</td>
									<td><strong>{{$product->title}}</strong></td>
									<td><strong>{{$product->price}}</strong></td>
									<td><strong>{{$product->description}}</strong></td>
									<td><strong>
										@foreach(App\Category::where('id', '=' , $product->category_id)->get() as $category)
											{{$category->name}}
										@endforeach
									</strong></td>
									<td><img src="{{asset($product->image)}}" width="80" height="80"></td>
									<td>							
										<a class="btn btn-primary" href="{{route('product_edit', $product->id)}}"><span class="fa fa-pencil"> Edit</span></a>

										<form action="{{ url('/products/delete/'.$product->id) }}" method="POST" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $product->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i> Delete
                                            </button>
                                        </form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection