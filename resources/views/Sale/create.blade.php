@extends('layouts.app')

@section('content')
<div class="col-md-12">
	<div class="widget">
		<header class="widget-header">
			<h4 class="col-md-6 widget-title">Service Master</h4>
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
				{!! Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'Sale.store', 'method' => 'POST', 'role' => 'form']) !!}
						{{ csrf_field() }} 						
						<div class="form-group{{ $errors->has('purchase_id') ? ' has-error' : '' }}">
							{!! Form::label('Purchase ID','Purchase ID', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
							{!! Form::text('purchase_id', Input::old('purchase_id'), array('class' => 'form-control','placeholder'=>'Your Purchase ID')) !!} 
								@if ($errors->has('purchase_id'))
									<span class="help-block">
										<strong>{{ $errors->first('purchase_id') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('sale_image') ? ' has-error' : '' }}">
							{!! Form::label('Image','Image', array('class' => 'col-md-4 control-label')) !!}
							<div class="col-md-6">								
								{!! Form::file('sale_image', array('class' => 'image')) !!}

								@if ($errors->has('sale_image'))
									<span class="help-block">
										<strong>{{ $errors->first('sale_image') }}</strong>
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
						<div class="form-group{{ $errors->has('date_of_service') ? ' has-error' : '' }}">
							{!! Form::label('Date of Service','Date of Service', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
								{{ Form::text('date_of_service', null, array('_required','id' => 'date_of_service', 'class' => 'form-control','placeholder'=>'Your Date of Service')) }} 
								@if ($errors->has('date_of_service'))
									<span class="help-block">
										<strong>{{ $errors->first('date_of_service') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('return_of_service') ? ' has-error' : '' }}">
							{!! Form::label('Return of Service','Return of Service', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
								{{ Form::text('return_of_service', null, array('_required','id'=>'return_of_service','class' => 'form-control','placeholder'=>'Your Return of Service')) }} 
								@if ($errors->has('return_of_service'))
									<span class="help-block">
										<strong>{{ $errors->first('return_of_service') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
							{!! Form::label('Username','Username', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
								{!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
								@if ($errors->has('username'))
									<span class="help-block">
										<strong>{{ $errors->first('username') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('Description','Description', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
								{!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Add Service',array('class'=>'btn btn-primary'),'<i class="fa fa-btn fa-user"></i>') !!}
								{!! Form::reset('Reset',array('class'=>'btn btn-danger'),'<i class="fa fa-btn fa-user"></i>') !!}
							</div>
						</div>
					{!! Form::close() !!}
				</div><!-- .widget-body -->
			</div><!-- .widget -->
		</div><!-- END column -->
@endsection