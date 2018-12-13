@extends('layouts.app')

@section('content')
<div class="widget">
	<header class="widget-header">
		<div class="col-md-6">
			<h4 class="widget-title">Show Staff</h4>
		</div>
		<div class="col-md-6">
			<a href="{{ route('Staff.index') }}">
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
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Staff Name : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-2 control-label"> {{ (($staff->staff_name) ? ucfirst($staff->staff_name) : '--') }} </label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Position : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-2 control-label"> {{ (($staff->position) ? ucfirst($staff->position) : '--') }} </label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Staff ID : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-2 control-label"> {{ (($staff->staff_id) ? $staff->staff_id : '--') }} </label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>City Name : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-2 control-label"> {{ (($staff->city_id) ? Helper::getCityName( $staff->city_id ) : '--') }} </label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Staff Image : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-2 control-label"><img src="{{url('/images/staff_images/'.$staff->profile_image)}}" _class="img-circle" alt="Image" width="100px" height="100px" /></label>
				</div>
			</div>
			 
		</form>
	</div><!-- .widget-body -->
</div><!-- .widget -->
@endsection