@extends('layouts.app')

@section('content')
<div class="col-md-12">
	<div class="widget">
		<header class="widget-header">
			<h4 class="col-md-6 widget-title">Edit Customer</h4>
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
			{!! Form::model($vendor, ['method' => 'PATCH','files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'route' => ['Vendor.update', $vendor->id]]) !!}
                        {{ csrf_field() }} 
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							{!! Form::label('Customer Name','Name', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
							{!! Form::text('name', Input::old('name'), array('class' => 'form-control','placeholder'=>'Your Customer Name')) !!} 
								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
							{!! Form::label('Mobile Number','Mobile Number', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
								{{ Form::text('mobile_number', null, array('_required','class' => 'form-control','placeholder'=>'Your Mobile Number')) }} 
								@if ($errors->has('mobile_number'))
									<span class="help-block">
										<strong>{{ $errors->first('mobile_number') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							{!! Form::label('Email','Email', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
								{{ Form::text('email', null, array('_required','class' => 'form-control','placeholder'=>'Your Email')) }} 
								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
							{!! Form::label('DOB','DOB', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
								{{ Form::text('dob', null, array('_required','id'=>'dob','class' => 'form-control','placeholder'=>'Your DOB')) }} 
								@if ($errors->has('dob'))
									<span class="help-block">
										<strong>{{ $errors->first('dob') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
							{!! Form::label('Address','Address', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
								{!! Form::textarea('address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
								@if ($errors->has('address'))
									<span class="help-block">
										<strong>{{ $errors->first('address') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
							{!! Form::label('City','City', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
							    {!! Form::select('city_id', $cities, old('city_id'), ['class' => 'form-control' , 'id' => 'city_id' ]) !!}  
								@if ($errors->has('city_id'))
									<span class="help-block">
										<strong>{{ $errors->first('city_id') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
							{!! Form::label('State','State', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
								{{ Form::text('state', null, array('_required','class' => 'form-control','placeholder'=>'Your State')) }} 
								@if ($errors->has('state'))
									<span class="help-block">
										<strong>{{ $errors->first('state') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('wedding') ? ' has-error' : '' }}">
							{!! Form::label('Wedding','Wedding', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
								{{ Form::text('wedding', null, array('_required','id'=>'wedding','class' => 'form-control','placeholder'=>'Your Wedding')) }} 
								@if ($errors->has('wedding'))
									<span class="help-block">
										<strong>{{ $errors->first('wedding') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<<!-- div class="form-group{{ $errors->has('preference') ? ' has-error' : '' }}">
							{!! Form::label('Preference','Preference', array('class' => 'col-md-4 control-label')) !!}

							<div class="col-md-6">
								<ul class="preferences">
									<li style="float: left">
									{!! Form::checkbox("preference[ring]", 'ring', ($vendor->ring == 'ring') ? true : false , ['class' => 'checkbox']) !!} Ring
									</li>
									<li style="float: left">
									{!! Form::checkbox("preference[bracelet]", 'bracelet', ($vendor->bracelet == 'bracelet') ? true : false, ['class' => 'checkbox']) !!} Bracelet 	 
									</li>
									<li style="float: left">
									{!! Form::checkbox("preference[chain]", 'chain', ($vendor->chain == 'chain') ? true : false, ['class' => 'checkbox']) !!} Chain	 
									</li>
								</ul>								
 									@if ($errors->has('preference'))
									<span class="help-block">
										<strong>{{ $errors->first('preference') }}</strong>
									</span>
								@endif
							</div>
						</div> -->
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Save',array('class'=>'btn btn-primary'),'<i class="fa fa-btn fa-user"></i>') !!}
								<!--{!! Form::reset('Reset',array('class'=>'btn btn-danger'),'<i class="fa fa-btn fa-user"></i>') !!}-->
								<a  href="{{ route('Vendor.index') }}" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
							</div>
						</div>
                    {!! Form::close() !!}	
		</div><!-- .widget-body -->
	</div><!-- .widget -->
</div><!-- END column -->
<style>
.form-group ul.preferences li {
   float: left;
   //width: 74px;
   display: block;
   padding-left: 15px;
   text-indent: -15px;
}
</style>
@endsection