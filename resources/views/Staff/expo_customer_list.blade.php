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
		<h4 class="col-md-6 widget-title">Expo Customer Details</h4>
		<h4 class="col-md-6 widget-title pull-right"><a href="{{ route('Staff.create') }}"><button type="button" class="btn-sm btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW</button></a></h4>
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
							<th>Know About</th>
							<th>Comments</th>
							<th>Status</th>
						</tr>
					</thead>								
					<tbody>
						@if (count($expoCustomers) > 0)		
							@foreach ($expoCustomers as $key => $expoCustomer)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ (($expoCustomer->customer_name) ? ucfirst($expoCustomer->customer_name) : '--') }}</td>
								<td>{{ (($expoCustomer->mobile_number) ? $expoCustomer->mobile_number : '--') }}</td>
								<td>{{ (($expoCustomer->know_about) ? $expoCustomer->know_about : '--') }}</td>
								<td>{{ (($expoCustomer->comments) ? $expoCustomer->comments : '--') }}</td>
								<td> @if ($expoCustomer->status == "yes")
									<!--<img src="{{url('/images/active.png')}}" _class="img-circle" alt="Image" width="30px" height="30px" />-->
									<button type="button" class="btn btn-primary">Blue</button>
									@else
									<!--<img src="{{url('/images/in-active.png')}}" _class="img-circle" alt="Image" width="30px" height="30px" />-->
									<button type="button" class="btn btn-danger">Red</button>
									@endif
								</td>								
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