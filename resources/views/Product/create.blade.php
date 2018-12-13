@extends('layouts.app')

@section('content')
<div class="col-md-12">
	<div class="widget">
		<header class="widget-header">
			<h4 class="col-md-6 widget-title">Product Master</h4>
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
			{!! Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'Product.store', 'method' => 'POST', 'role' => 'form']) !!}

                        {{ csrf_field() }} 
						<div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
							{!! Form::label('Product Name','Product Name', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
							{!! Form::text('product_name', Input::old('product_name'), array('_required','class' => 'form-control','placeholder'=>'Your Product Name')) !!} 
								@if ($errors->has('product_name'))
									<span class="help-block">
										<strong>{{ $errors->first('product_name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('product_code') ? ' has-error' : '' }}">
							{!! Form::label('Product Code','Product Code', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
							{!! Form::text('product_code', Input::old('product_code'), array('_required','class' => 'form-control','placeholder'=>'Your Product Code')) !!} 
								@if ($errors->has('product_code'))
									<span class="help-block">
										<strong>{{ $errors->first('product_code') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
							{!! Form::label('Category Name','Category Name', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">

								<?php $category_id = Input::old('category_id'); ?>
								<select class="form-control" id="category_id" name="category_id">
									<option value="">Select Category Name</option>
									<?php foreach ($categorys as $key=>$category): ?>
									<option value="<?php echo $category->id; ?>" <?php
											if (isset($category_id) && Input::old('category_id') == $category->id) {
												echo 'selected="selected"';
											}
											?>><?php echo $category->category_name; ?></option>
									<?php endforeach; ?>
								</select>	

								@if ($errors->has('category_id'))
									<span class="help-block">
										<strong>{{ $errors->first('category_id') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
							{!! Form::label('City','City', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
							   {!! Form::select('city_id', $cities, null, ['class' => 'form-control' , 'id' => 'city_id' ]) !!}
								@if ($errors->has('city_id'))
									<span class="help-block">
										<strong>{{ $errors->first('city_id') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<!-- <div class="form-group{{ $errors->has('product_image') ? ' has-error' : '' }}">
							{!! Form::label('Product Image','Product Image', array('class' => 'col-md-4 control-label')) !!}

							<div class="col-md-6">
								
								{!! Form::file('product_image', array('class' => 'image')) !!}

								@if ($errors->has('product_image'))
									<span class="help-block">
										<strong>{{ $errors->first('product_image') }}</strong>
									</span>
								@endif
							</div>
						</div> -->

						<div class="form-group{{ $errors->has('product_ios_img_small') ? ' has-error' : '' }}">
							{!! Form::label('Product Ios Image Small','Product IOS Image Small', array('class' => 'col-md-4 control-label')) !!}

							<div class="col-md-6">
								
								{!! Form::file('product_ios_img_small', array('class' => 'image')) !!}
								<span class="label label-danger">{{ Config::get('settings.Prd-Img-small') }}</span>				
								@if ($errors->has('product_ios_img_small'))
									<span class="help-block">
										<strong>{{ $errors->first('product_ios_img_small') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('product_ios_img_large') ? ' has-error' : '' }}">
							{!! Form::label('Product Ios Image Large','Product IOS Image Large', array('class' => 'col-md-4 control-label')) !!}

							<div class="col-md-6">
								
								{!! Form::file('product_ios_img_large', array('class' => 'image')) !!}
							    <span class="label label-danger">{{ Config::get('settings.Prd-Img-large') }}</span>
								@if ($errors->has('product_ios_img_large'))
									<span class="help-block">
										<strong>{{ $errors->first('product_ios_img_large') }}</strong>
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
							{!! Form::label('Ct','Ct', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
                                {{ Form::text('carat', Input::old('carat'), array('_required','class' => 'form-control','placeholder'=>'Your carat')) }} 
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('Kt','Kt', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
                                {{ Form::text('kt', Input::old('kt'), array('_required','class' => 'form-control','placeholder'=>'Your kt')) }} 
							</div>
						</div>

						<!--<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
							{!! Form::label('Price','Price', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
                                {{ Form::text('price', Input::old('price'), array('_required','class' => 'form-control','placeholder'=>'Your Price')) }} 
								@if ($errors->has('price'))
									<span class="help-block">
										<strong>{{ $errors->first('price') }}</strong>
									</span>
								@endif
							</div>
						</div> -->

						<div class="form-group">
							{!! Form::label('Wt','Wt', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
                                {{ Form::text('weight', Input::old('weight'), array('_required','class' => 'form-control','placeholder'=>'Your weight')) }} 
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
								{!! Form::submit('Add Product',array('class'=>'btn btn-primary'),'<i class="fa fa-btn fa-user"></i>') !!}
							</div>
						</div>
                    {!! Form::close() !!}
				</div><!-- .widget-body -->
			</div><!-- .widget -->
		</div><!-- END column -->
@endsection