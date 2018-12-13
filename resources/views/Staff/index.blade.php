@extends('layouts.app')

@section('content')
<style>
.table > thead > tr > th, .table > thead > tr > td, .table > tbody > tr > th, .table > tbody > tr > td, .table > tfoot > tr > th, .table > tfoot > tr > td {
    vertical-align: middle !important;
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
		<h4 class="col-md-6 widget-title">Staff Details</h4>
		<h4 class="col-md-6 widget-title pull-right"><a href="{{ route('Staff.create') }}"><button type="button" class="btn-sm btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW</button></a></h4>
	</header><!-- .widget-header -->
		<hr class="widget-separator">
		<div class="widget-body">
			<div class="table-responsive">
				<table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Staff Name</th>
							<th>Position</th>
							<th>Staff ID</th>
							<th>Staff image</th>
							<th>City Name</th>
							<th>Created_at</th>
							@if(!empty( Auth::user()->role_name == "admin" ))
							<th _width="280px">Action</th>
							@endif							
						</tr>
					</thead>								
					<tbody>
						@if (count($staffs) > 0)		
							@foreach ($staffs as $key => $staff)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ (($staff->staff_name) ? ucfirst($staff->staff_name) : '--') }}</td>
								<td>{{ (($staff->position) ? ucfirst($staff->position) : '--') }}</td>
								<td>{{ (($staff->staff_id) ? $staff->staff_id : '--') }}</td>
								<td> @if (!empty($staff->profile_image))
									<img src="{{url('/images/staff_images/'.$staff->profile_image)}}" _class="img-circle" alt="Image" width="100px" height="100px" />
									@else
									<img src="{{url('/images/staff_images/no-image.png')}}" _class="img-circle" alt="Image" width="100px" height="100px" />
									@endif
								</td>
								<td>{{ (($staff->city_name) ? $staff->city_name : '--') }}</td>
								<td>{{ (($staff->created_at) ? $staff->created_at : '--') }}</td>
								@if(!empty( Auth::user()->role_name == "admin" ))
								<td>
									<a data-toggle="tooltip" data-placement="top" data-original-title="View Data" class="btn btn-info" href="{{ route('Staff.show',$staff->id) }}"><i class="fa fa-eye"></i> Show</a>
									<a data-toggle="tooltip" data-placement="top" data-original-title="Edit Data" class="btn btn-info"href="{{ route('Staff.edit',$staff->id) }}"><i class="fa fa-pencil"></i> Edit</a>
									{!! Form::open(['method' => 'DELETE','route' => ['Staff.destroy', $staff->id],'style'=>'display:inline']) !!}
									{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
											'type' => 'button',
											'data-toggle'  => 'modal',
											'data-target' => '#confirmDelete', 
											'data-placement' => 'top',
											'data-original-title' => 'Delete Data',
											'class' => 'btn btn-info',
											'title' => 'Delete Staff',											
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


