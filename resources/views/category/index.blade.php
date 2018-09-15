@extends('layout.master')
@section('title','Categories')

@section('content')
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Show All Category</strong></h3><br>

					@if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                	@endif 

					<a href="{{url('/categories/create')}}" class="btn btn-success pull-right"><strong>Create Category</strong></a>
					
					<div class="panel-body"> 				
						<table id="categories-table" class="table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th></th>
								</tr>
							</thead>

							<tbody>
								@foreach($categories as $category)
								<tr>
									<td>{{$category->id}}</td>
									<td><strong>{{$category->name}}</strong></td>
									<td>							
										<a class="btn btn-primary" href="{{route('categories_edit', $category->id)}}"><span class="fa fa-pencil"> Edit</span></a>
									
										<form action="{{ url('/categories/delete/'.$category->id) }}" method="POST" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $category->id }}" class="btn btn-danger">
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