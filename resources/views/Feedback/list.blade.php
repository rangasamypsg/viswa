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
		<h4 class="col-md-6 widget-title">Experience Rating Details</h4>
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
							<th>Ratings</th>
							<th>Created_at</th>
							<!-- <th _width="280px">Action</th> -->							
						</tr>
					</thead>								
					<tbody>
						@if (count($feedbackRatings) > 0)		
							@foreach ($feedbackRatings as $key => $feedbackRating)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ (($feedbackRating->customer_name) ? ucfirst($feedbackRating->customer_name) : '--') }}</td>
								<td>{{ (($feedbackRating->mobile_number) ? $feedbackRating->mobile_number : '--') }}</td>
								<td>{{ (($feedbackRating->staff_name) ? ucfirst($feedbackRating->staff_name) : '--') }}</td>
								<td>{{ (($feedbackRating->city_id) ? Helper::getCityName( $feedbackRating->city_id ) : '--') }}</td>
								<td><?php $rating = Helper::getRatingImage($feedbackRating->ratings); ?> <img src="{{URL::asset('assets/images/ratings/'.$rating)}}" height="150" width="150"/> </td>
								<td>{{ (($feedbackRating->created_at) ? $feedbackRating->created_at : '--') }}</td>
								<!-- <td>
									{!! Form::open(['method' => 'DELETE','route' => ['Staff.destroy', $feedbackRating->id],'style'=>'display:inline']) !!}
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


