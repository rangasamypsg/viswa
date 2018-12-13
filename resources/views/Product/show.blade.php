@extends('layouts.app')

@section('content')
<div class="widget">
	<header class="widget-header">
		<div class="col-md-6">
			<h4 class="widget-title">Show Product</h4>
		</div>
		<div class="col-md-6">
			<a href="{{ route('Product.index') }}">
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
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Product Name : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ $product->product_name }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Product Code : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($product->product_code) ? $product->product_code : '--') }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Category Name : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ $product->category->category_name  }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>City : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label"> {{ (($product->city_id) ? Helper::getCityName( $product->city_id ) : '--') }} </label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Product Image : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-4 control-label"><img src="{{url('/images/products/lg/'.$product->product_ios_img_large)}}" _class="img-circle" alt="Image" /></label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Description : </strong></label>
				<div class="col-sm-6">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ $product->description }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Ct : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($product->carat) ? $product->carat : '--') }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Kt : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($product->kt) ? $product->kt : '--') }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Wt : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($product->weight) ? $product->weight : '--') }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Status : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ $product->status == 1 ? 'Active' : 'InActive' }}</label>
				</div>
			</div>

		</form>
	</div><!-- .widget-body -->
</div><!-- .widget -->
@endsection