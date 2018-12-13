@extends('layouts.app')

@section('content')
<style>
.table > thead > tr > th, .table > thead > tr > td, .table > tbody > tr > th, .table > tbody > tr > td, .table > tfoot > tr > th, .table > tfoot > tr > td {
    vertical-align: middle !important;
}
.tb-status {
	text-align : center;
}
.btn-info {
	background-color: #382e2d !important;
    border-color: #382e2d !important;
}
.btn-info:hover {
	background-color: #645755 !important;
    border-color: #645755 !important;
}
</style>
<div class="widget">
	<div class="col-md-12">
		<div class="col-md-2">&nbsp;</div>
	    <div class="col-md-8">
			@if ($message = Session::get('success'))
				<div class="alert alert-success" style="text-align: center;">
					<p><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> {{ $message }}</p>
				</div>
			@endif
		</div>
		<div class="col-md-2">&nbsp;</div>		
	</div>
	<header class="widget-header">										
		<h4 class="col-md-6 widget-title">Category Details</h4>
		@if(!empty( Auth::user()->role_name == "admin" ))
		<h4 class="col-md-6 widget-title pull-right"><a href="{{ route('Category.create') }}"><button type="button" class="btn-sm btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW</button></a></h4>
		@endif
	</header><!-- .widget-header -->
		<hr class="widget-separator">
		<div class="widget-body">
			<div class="table-responsive">
				<table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Category</th>
							<!--<th>Description</th>-->
							<th>Category Image</th>
							<th class="tb-status">&nbsp;&nbsp;&nbsp;&nbsp;Status</th>
							@if(!empty( Auth::user()->role_name == "admin" ))
							<th class="tb-status">Action</th>
							@endif							
						</tr>
					</thead>								
					<tbody>
						@if (count($categorys) > 0)		
							@foreach ($categorys as $key => $category)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $category->category_name }}</td>
								<!--<td>{{ substr($category->description, 0, 30) }}</td>-->
								<td> @if (!empty($category->category_image))
									<img src="{{url('/images/category/'.$category->category_image)}}" _class="img-circle" alt="Image" width="100px" height="100px" />
									@else
									<img src="{{url('/images/pro-empty.png')}}" _class="img-circle" alt="Image" width="100px" height="100px" />
									@endif
								</td>
								<td class="tb-status"> @if ($category->status == 1)
									<img src="{{url('/images/active.png')}}" _class="img-circle" alt="Image" width="30px" height="30px" />
									@else
									<img src="{{url('/images/in-active.png')}}" _class="img-circle" alt="Image" width="30px" height="30px" />
									@endif
								</td>
								@if(!empty( Auth::user()->role_name == "admin" ))
								<td class="tb-status">
									<a data-toggle="tooltip" data-placement="top" data-original-title="View Data" class="btn btn-info" href="{{ route('Category.show',$category->id) }}"><i class="fa fa-eye"></i> Show</a>
									<a data-toggle="tooltip" data-placement="top" data-original-title="Edit Data" class="btn btn-info"href="{{ route('Category.edit',$category->id) }}"><i class="fa fa-pencil"></i> Edit</a>
									{!! Form::open(['method' => 'DELETE','route' => ['Category.destroy', $category->id],'style'=>'display:inline']) !!}
									{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
											'type' => 'button',
											'data-toggle'  => 'modal',
											'data-target' => '#confirmDelete', 
											'data-placement' => 'top',
											'data-original-title' => 'Delete Data',
											'class' => 'btn btn-info',
											'title' => 'Delete Category',											
									)) !!}
									{!! Form::close() !!}
								</td>
								@endif
							</tr>
							@endforeach
						@endif										
					</tbody>
				</table>
			</div>
		</div><!-- .widget-body -->
	</div><!-- .widget -->
</div><!-- END column -->
@endsection


