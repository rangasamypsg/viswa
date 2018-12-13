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
		<h4 class="col-md-6 widget-title">Customer Details</h4>
		@if(!empty( Auth::user()->role_name == "admin" ))
		<h4 class="col-md-6 widget-title pull-right"><a href="{{ route('Vendor.create') }}"><button type="button" class="btn-sm btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW</button></a></h4>
		@endif
	</header><!-- .widget-header -->
		<hr class="widget-separator">
		<div class="widget-body">
			<div class="table-responsive">
				<table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Customer Name</th>
							<th>Mobile Number</th>
							<th>Email</th>
 							<th>City</th>
							<th>State</th>
							@if(!empty( Auth::user()->role_name == "admin" ))
							<th _width="280px">Action</th>					
							@endif		
						</tr>
					</thead>								
					<tbody>
						@if (count($vendors) > 0)		
							@foreach ($vendors as $key => $vendor)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ (($vendor->name) ? $vendor->name : '--') }}</td>
								<td>{{ (($vendor->mobile_number) ? $vendor->mobile_number : '--') }}</td>
								<td>{{ (($vendor->email) ? $vendor->email : '--') }}</td>
								<td>{{ (($vendor->city_id) ? Helper::getCityName( $vendor->city_id ) : '--') }}</td>
								<td>{{ (($vendor->state) ? ucfirst($vendor->state) : '--') }}</td>
								@if(!empty( Auth::user()->role_name == "admin" ))
								<td>
									<a data-toggle="tooltip" data-placement="top" data-original-title="View Data" class="btn btn-info" href="{{ route('Vendor.show',$vendor->id) }}"><i class="fa fa-eye"></i> Show</a>
									<a data-toggle="tooltip" data-placement="top" data-original-title="Edit Data" class="btn btn-info"href="{{ route('Vendor.edit',$vendor->id) }}"><i class="fa fa-pencil"></i> Edit</a>
									<!--{!! Form::open(['method' => 'DELETE','route' => ['Vendor.destroy', $vendor->id],'style'=>'display:inline']) !!}
									{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
											'type' => 'button',
											'data-toggle'  => 'modal',
											'data-target' => '#confirmDelete', 
											'data-placement' => 'top',
											'data-original-title' => 'Delete Data',
											'class' => 'btn btn-info',
											'title' => 'Delete Post',											
									)) !!}
									{!! Form::close() !!}-->
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


