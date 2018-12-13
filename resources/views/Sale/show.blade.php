@extends('layouts.app')

@section('content')
<div class="widget">
	<header class="widget-header">
		<div class="col-md-6">
			<h4 class="widget-title">Show Service</h4>
		</div>
		<div class="col-md-6">
			<a href="{{ route('Sale.index') }}">
				<button type="submit" class="btn btn-info btn-sm pull-right">
					<i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back
				</button>
			</a>
		</div>
	</header><!-- .widget-header -->
	<hr class="widget-separator">
	<div class="widget-body">
		
		<form class="form-horizontal">
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Purchase ID : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ $sale->purchase_id }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Service Image : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">
						@if (!empty($sale->sale_image))
							<img src="{{url('/images/services/'.$sale->sale_image)}}" class="img-rounded" alt="Image" width="100px" height="100px" />
						@else 
							<img src="{{url('/images/pro-empty.png')}}" class="img-rounded" alt="Image" width="100px" height="100px" />  
						@endif
					</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Sales Id : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($sale->sales_id) ? $sale->sales_id : '--') }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Mobile number : </strong></label>
				<div class="col-sm-6">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($sale->mobile_number) ? $sale->mobile_number : '--') }} </label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Date of Service : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($sale->date_of_service) ? Helper::getDateFormat($sale->date_of_service) : '--') }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Return of Service : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label"> {{ (($sale->return_of_service) ? Helper::getDateFormat($sale->return_of_service) : '--') }} </label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Username : </strong></label>
				<div class="col-sm-6">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($sale->username) ? $sale->username : '--') }} </label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Description : </strong></label>
				<div class="col-sm-6">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($sale->description) ? $sale->description : '--') }} </label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Status : </strong></label>
				<div class="col-sm-6">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($sale->status) ? $sale->status : '--') }} </label>
				</div>
			</div>
		</form>
	</div><!-- .widget-body -->
</div><!-- .widget -->
@endsection