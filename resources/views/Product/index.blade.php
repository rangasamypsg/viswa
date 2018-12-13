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
		<h4 class="col-md-6 widget-title">Product Details</h4>
		@if(!empty( Auth::user()->role_name == "admin" ))
		<h4 class="col-md-6 widget-title pull-right"><a href="{{ route('Product.create') }}"><button type="button" class="btn-sm btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW</button></a></h4>
		@endif
	</header><!-- .widget-header -->
		<hr class="widget-separator">
		<div class="widget-body">
			<div class="table-responsive">
				<table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Product Name</th>
							<th>Category</th>
							<!-- <th>Description</th> -->
							<th>City Name</th>
							<th>Product image</th>
							<th>Ct</th>
							<th>Kt</th>
							<th>Wt</th>
							<th>Status</th>
							@if(!empty( Auth::user()->role_name == "admin" ))
							<th width="280px">Action</th>
							@endif							
						</tr>
					</thead>								
					<tbody>
						@if (count($products) > 0)		
							@foreach ($products as $key => $product)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $product->product_name }}</td>
								<td>{{ $product->category_name }}</td>
								<td>{{ (($product->city_id) ? Helper::getCityName( $product->city_id ) : '--') }}</td>
								<!--<td>{{ substr($product->description, 0, 50) }}</td>-->
								<td> @if (!empty($product->product_ios_img_small))
									<img src="{{url('/images/products/sm/'.$product->product_ios_img_small)}}" _class="img-circle" alt="Image" width="100px" height="100px" />
									@else
									<img src="{{url('/images/pro-empty.png')}}" _class="img-circle" alt="Image" width="100px" height="100px" />
									@endif
								</td>
								<td>{{ (($product->carat) ? $product->carat : '--') }}</td>
								<td>{{ (($product->kt) ? $product->kt : '--') }}</td>
								<td>{{ (($product->weight) ? $product->weight : '--') }}</td>
								<td> @if ($product->status == 1)
									<img src="{{url('/images/active.png')}}" _class="img-circle" alt="Image" width="30px" height="30px" />
									@else
									<img src="{{url('/images/in-active.png')}}" _class="img-circle" alt="Image" width="30px" height="30px" />
									@endif
								</td>
								@if(!empty( Auth::user()->role_name == "admin" ))
								<td>
									<a data-toggle="tooltip" data-placement="top" data-original-title="View Data" class="btn btn-info" href="{{ route('Product.show',$product->id) }}"><i class="fa fa-eye"></i> Show</a>
									<a data-toggle="tooltip" data-placement="top" data-original-title="Edit Data" class="btn btn-info"href="{{ route('Product.edit',$product->id) }}"><i class="fa fa-pencil"></i> Edit</a>
									{!! Form::open(['method' => 'DELETE','route' => ['Product.destroy', $product->id],'style'=>'display:inline']) !!}
									{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
											'type' => 'button',
											'data-toggle'  => 'modal',
											'data-target' => '#confirmDelete', 
											'data-placement' => 'top',
											'data-original-title' => 'Delete Data',
											'class' => 'btn btn-info',
											'title' => 'Delete Product',											
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


