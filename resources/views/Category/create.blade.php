@extends('layouts.app')

@section('content')
<div class="col-md-12">
	<div class="widget">
		<header class="widget-header">
			<h4 class="col-md-6 widget-title">Category Master</h4>
			<div class="col-md-6">
				<a href="{{ route('Category.index') }}">
					<button type="submit" class="btn btn-info btn-sm pull-right">
						<i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back
					</button>
				</a>
			</div>
		</header><!-- .widget-header -->
		<hr class="widget-separator">
		<div class="widget-body">
			 {!! Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'Category.store', 'method' => 'POST', 'role' => 'form']) !!}

                        {{ csrf_field() }} 
						<div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
							{!! Form::label('Category Name','Category Name', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
                                {{ Form::text('category_name', null, array('_required','class' => 'form-control','placeholder'=>'Your Category Name')) }} 
								@if ($errors->has('category_name'))
									<span class="help-block">
										<strong>{{ $errors->first('category_name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('category_image') ? ' has-error' : '' }}">
							{!! Form::label('Category Image','Category Image', array('class' => 'col-md-4 control-label')) !!}

							<div class="col-md-6">
								
								{!! Form::file('category_image', array('class' => 'image')) !!}

								<span class="label label-danger">{{ Config::get('settings.Cat-Img') }}</span>

								@if ($errors->has('category_image'))
									<span class="help-block">
										<strong>{{ $errors->first('category_image') }}</strong>
									</span>
								@endif
							</div>
						</div>
						
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
							{!! Form::label('Description','Description', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
                            {!! Form::textarea('description', null, array('_required', 'class'=>'form-control', 'placeholder'=>'Your message')) !!}

								@if ($errors->has('description'))
									<span class="help-block">
										<strong>{{ $errors->first('description') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group">
						{!! Form::label('Status','Status', array('class' => 'col-md-4 control-label')) !!}

							<div class="col-md-6">												
								{{ Form::radio('status', 1, true, [],['class' => 'field']) }} Enable
								{{ Form::radio('status', 0,false, [],['class' => 'field']) }} Disable
							</div>
						</div>	

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Add Category',array('class'=>'btn btn-primary'),'<i class="fa fa-btn fa-user"></i>') !!}
							</div>
						</div>
                    {!! Form::close() !!}
		</div><!-- .widget-body -->
	</div><!-- .widget -->
</div><!-- END column -->
@endsection