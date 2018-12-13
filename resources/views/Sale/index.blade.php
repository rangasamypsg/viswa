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
		<h4 class="col-md-6 widget-title">Services Details</h4>
		<h4 class="col-md-6 widget-title pull-right"><a href="{{ route('Sale.create') }}"><button type="button" class="btn-sm btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW</button></a></h4>
	</header><!-- .widget-header -->
		<hr class="widget-separator">
		<div class="widget-body">
			<div class="table-responsive">
				<table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Purchase ID</th>
							<th>Sales ID</th>
 							<th>Date of Service</th>
 							<th>Return of Service</th>
 							<th>Service Image</th>
							<th>Username</th>
							<th>Status</th>
							<th _width="280px">Action</th>							
						</tr>
					</thead>								
					<tbody>
						@if (count($sales) > 0)		
							@foreach ($sales as $key => $sale)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ (($sale->purchase_id) ? $sale->purchase_id : '--') }}</td>
								<td>{{ (($sale->purchase_id) ? $sale->sales_id : '--') }}</td>
								<td>{{ (($sale->date_of_service) ? Helper::getDateFormat( $sale->date_of_service ) : '--') }}</td>
								<td>{{ (($sale->return_of_service) ? Helper::getDateFormat( $sale->return_of_service ) : '--') }}</td>
								<td> @if (!empty($sale->sale_image))
									<img src="{{url('/images/services/'.$sale->sale_image)}}" _class="img-circle" alt="Image" width="100px" height="100px" />
									@else
									<img src="{{url('/images/pro-empty.png')}}" _class="img-circle" alt="Image" width="100px" height="100px" />
									@endif
								</td>
								<td>{{ (($sale->username) ? ucfirst($sale->username) : '--') }}</td>
								<td>{{ (($sale->status) ? ucfirst($sale->status) : '--') }}</td>
								<td>
									<a data-toggle="tooltip" data-placement="top" data-original-title="View Data" class="btn btn-info" href="{{ route('Sale.show',$sale->id) }}"><i class="fa fa-eye"></i> Show</a>
									<a data-toggle="tooltip" data-placement="top" data-original-title="Edit Data" class="btn btn-info"href="{{ route('Sale.edit',$sale->id) }}"><i class="fa fa-pencil"></i> Edit</a>
									<!--{!! Form::open(['method' => 'DELETE','route' => ['Sale.destroy', $sale->id],'style'=>'display:inline']) !!}
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


