@extends('layouts.app')

@section('content')
<div class="col-md-12">
	<div class="widget">
		<header class="widget-header">
			<h4 class="col-md-6 widget-title">Edit Product</h4>
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
			{!! Form::model($product, ['method' => 'PATCH','files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'route' => ['Product.update', $product->id]]) !!}
                        {{ csrf_field() }} 
						<div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
							{!! Form::label('Product Name','Product Name', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
							{!! Form::text('product_name', null, array('_required','class' => 'form-control','placeholder'=>'Your Product Name')) !!} 
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
							{!! Form::text('product_code', null, array('_required','class' => 'form-control','placeholder'=>'Your Product Code')) !!} 
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
									@foreach($categorys as $type =>$category)
										@if(old('category_id',$product->category_id) == $category->id )
											<option value="{{ $category->id }}" selected >{{ $category->category_name }}</option>
										@else
											<option value="{{ $category->id }}">{{ $category->category_name }}</option>
										@endif
									@endforeach 
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
							    {!! Form::select('city_id', $cities, old('city_id'), ['class' => 'form-control' , 'id' => 'city_id' ]) !!}  
								@if ($errors->has('city_id'))
									<span class="help-block">
										<strong>{{ $errors->first('city_id') }}</strong>
									</span>
								@endif
							</div>
						</div>	
						<div class="form-group{{ $errors->has('product_ios_img_small') ? ' has-error' : '' }}">
							{!! Form::label('Product Ios Image Small','Product Ios Image Small', array('class' => 'col-md-4 control-label')) !!}

							<div class="col-md-6">								
								{!! Form::file('product_ios_img_small', array('class' => 'image')) !!}
								<span class="label label-danger">{{ Config::get('settings.Prd-Img-small') }}</span>
								<br/>
								<br/>
								@if (!empty($product->product_ios_img_small))
									<img src="{{url('/images/products/sm/'.$product->product_ios_img_small)}}" class="img-responsive img-rounded" alt="Image" width="100px" height="100px" />
								@else 
									<img src="{{url('/images/pro-empty.png')}}" class="img-circle" alt="Image" width="100px" height="100px" />  
								@endif

								@if ($errors->has('product_ios_img_small'))
									<span class="help-block">
										<strong>{{ $errors->first('product_ios_img_small') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('product_ios_img_large') ? ' has-error' : '' }}">
							{!! Form::label('Product Ios Image Large','Product Ios Image Large', array('class' => 'col-md-4 control-label')) !!}

							<div class="col-md-6">								
								{!! Form::file('product_ios_img_large', array('class' => 'image')) !!}
								<span class="label label-danger">{{ Config::get('settings.Prd-Img-large') }}</span>
								@if (!empty($product->product_ios_img_large))
								<br/>
								<br/>
									<img src="{{url('/images/products/lg/'.$product->product_ios_img_large)}}" class="img-responsive img-rounded" alt="Image" width="100px" height="100px" />
								@else 
									<img src="{{url('/images/pro-empty.png')}}" class="img-circle" alt="Image" width="100px" height="100px" />  
								@endif

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
                                {{ Form::text('price', null, array('_required','class' => 'form-control','placeholder'=>'Your Price')) }} 
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

						<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
						{!! Form::label('Status','Status', array('class' => 'col-md-4 control-label')) !!}

							<div class="col-md-6">
								{{ Form::radio('status', '1', ($product->status == '1'),[],['class' => 'field']) }} Enable
								{{ Form::radio('status', '0', ($product->status == '0'),[],['class' => 'field']) }} Disable
							</div>
						</div>	

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Edit Product',array('class'=>'btn btn-primary'),'<i class="fa fa-btn fa-user"></i>') !!}
							</div>
						</div>
                    {!! Form::close() !!}	
		</div><!-- .widget-body -->
	</div><!-- .widget -->
</div><!-- END column -->
@endsection