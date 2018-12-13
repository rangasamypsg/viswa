@extends('layouts.app')

@section('content')
<div class="widget">
	<header class="widget-header">
		<div class="col-md-6">
			<h4 class="widget-title">Show Customer</h4>
		</div>
		<div class="col-md-6">
			<a href="{{ route('Vendor.index') }}">
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
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Customer Name : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ $vendor->name }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Mobile Number : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($vendor->mobile_number) ? $vendor->mobile_number : '--') }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Address : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($vendor->address) ? $vendor->address : '--') }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>City : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label"> {{ (($vendor->city_id) ? Helper::getCityName( $vendor->city_id ) : '--') }} </label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>State : </strong></label>
				<div class="col-sm-6">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($vendor->state) ? $vendor->state : '--') }} </label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Email : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($vendor->email) ? $vendor->email : '--') }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Dob : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ (($vendor->dob) ? Helper::getDateFormat( $vendor->dob ) : '--') }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Wedding : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">
					<?php echo ( $vendor->wedding != "--" ? date("d-m-Y", strtotime($vendor->wedding)) : '--' ); ?>
					<!--{{ (($vendor->wedding) ? Helper::getDateFormat($vendor->wedding) : '--') }}--></label>
				</div>
			</div>
			<!-- <div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Preference : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">
						<?php 
							$data = array();
							if(!empty($vendor->ring)){
								$data[] = ucfirst($vendor->ring);
							}
							if(!empty($vendor->chain)){
								$data[] = ucfirst($vendor->chain);
							}
							if(!empty($vendor->bracelet)){
								$data[] = ucfirst($vendor->bracelet);
							}
							?>
							{{ (($data) ? implode(', ', $data) : '--') }}
						
					</label>
				</div> -->
			</div>
		</form>
	</div><!-- .widget-body -->
</div><!-- .widget -->
@endsection