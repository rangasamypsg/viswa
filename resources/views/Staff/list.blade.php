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
		<h4 class="col-md-6 widget-title">Customer Rating Details</h4>
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
							<th>Staff Name</th>
							<th>City Name</th>
							<th>Shop Ratings</th>
							<th>Created_at</th>
							<!-- <th _width="280px">Action</th> -->							
						</tr>
					</thead>								
					<tbody>
						@if (count($staffs) > 0)		
							@foreach ($staffs as $key => $staff)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ (($staff->customer_name) ? ucfirst($staff->customer_name) : '--') }}</td>
								<td>{{ (($staff->mobile_number) ? $staff->mobile_number : '--') }}</td>
								<td>{{ (($staff->staff_name) ? ucfirst($staff->staff_name) : '--') }}</td>
								<td>{{ (($staff->city_id) ? Helper::getCityName( $staff->city_id ) : '--') }}</td>
								<td><?php $rating = Helper::getRatingImage($staff->ratings); ?> <img src="{{URL::asset('assets/images/ratings/'.$rating)}}" height="150" width="150"/> </td>
								<td>{{ (($staff->created_at) ? $staff->created_at : '--') }}</td>
								<!-- <td>
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
								</td> -->
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


