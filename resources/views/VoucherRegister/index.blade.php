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
		<h4 class="col-md-6 widget-title">Voucher Register Details</h4>
	</header><!-- .widget-header -->
		<hr class="widget-separator">
		<div class="widget-body">
			<div class="table-responsive">
				<table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Full Name</th>
							<th>Email ID</th>
 							<th>Mobile Number</th>
							<th>Location</th>
							<th>Voucher Code</th>
							<th>Available Voucher</th>
							<th>Status</th>
						</tr>
					</thead>								
					<tbody>
						@if (count($voucherRegisters) > 0)		
							@foreach ($voucherRegisters as $key => $voucherRegister)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $voucherRegister->fullName }}</td>
								<td>{{ $voucherRegister->email }}</td>
								<td>{{ $voucherRegister->mobile_number }}</td>
								<td>{{ $voucherRegister->country }}</td>
								<td>{{ $voucherRegister->voucher }}</td>
								<td>{{ $voucherRegister->voucher_count }}</td>
								<td> @if ($voucherRegister->voucher_count == 1)
									<img src="{{url('/images/active.png')}}" _class="img-circle" alt="Image" width="30px" height="30px" />
									@else
									<img src="{{url('/images/in-active.png')}}" _class="img-circle" alt="Image" width="30px" height="30px" />
									@endif
								</td>
								<!-- <td>
									<a data-toggle="tooltip" data-placement="top" data-original-title="View Data" class="btn btn-info" href="{{ route('Product.show',$voucherRegister->id) }}"><i class="fa fa-eye"></i> Show</a>
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


