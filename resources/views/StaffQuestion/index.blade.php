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
		<h4 class="col-md-6 widget-title">Customer Feedback Details</h4>
		<h4 class="col-md-6 widget-title pull-right"><a href="{{ route('StaffQuestion.create') }}"><button type="button" class="btn-sm btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW</button></a></h4>
	</header><!-- .widget-header -->
		<hr class="widget-separator">
		<div class="widget-body">
			<div class="table-responsive">
				<table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Customer Feedback Questions</th>
							<th>Created_at</th>
							<th _width="280px">Action</th>							
						</tr>
					</thead>								
					<tbody>
						@if (count($StaffQuestions) > 0)		
							@foreach ($StaffQuestions as $key => $StaffQuestion)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ (($StaffQuestion->text) ? $StaffQuestion->text : '--') }}</td>
								<td>{{ (($StaffQuestion->created_at) ? $StaffQuestion->created_at : '--') }}</td>
								<td>
									<a data-toggle="tooltip" data-placement="top" data-original-title="View Data" class="btn btn-info" href="{{ route('StaffQuestion.show',$StaffQuestion->id) }}"><i class="fa fa-eye"></i> Show</a>
									{!! Form::open(['method' => 'DELETE','route' => ['StaffQuestion.destroy', $StaffQuestion->id],'style'=>'display:inline']) !!}
									{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
											'type' => 'button',
											'data-toggle'  => 'modal',
											'data-target' => '#confirmDelete', 
											'data-placement' => 'top',
											'data-original-title' => 'Delete Data',
											'class' => 'btn btn-info',
											'title' => 'Delete Question',											
									)) !!}
									{!! Form::close() !!}
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


