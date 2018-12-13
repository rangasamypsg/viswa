@extends('layouts.app')

@section('content')
<div class="col-md-12">
	<div class="widget">
		<header class="widget-header">
			<h4 class="col-md-6 widget-title">Edit Category</h4>
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
			 {!! Form::model($category, ['method' => 'PATCH','files' => true,'class' => 'form-horizontal','role' => 'form', 'route' => ['Category.update', $category->id]]) !!}
             
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
                        <br/>
                        @if (!empty($category->category_image))
                            <img src="{{url('/images/category/'.$category->category_image)}}" class="img-circle" alt="Image" width="100px" height="100px" />
                        @else 
                            <img src="{{url('/images/pro-empty.png')}}" class="img-circle" alt="Image" width="100px" height="100px" />  
                        @endif

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

                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    {!! Form::label('Status','Status', array('class' => 'col-md-4 control-label')) !!}

                    <div class="col-md-6">
                        {{ Form::radio('status', '1', ($category->status == '1'),[],['class' => 'field']) }} Enable
                        {{ Form::radio('status', '0', ($category->status == '0'),[],['class' => 'field']) }} Disable
                    </div>
                </div>
                
                <div class="form-group">
                
                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Edit Category', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            </form>
		</div><!-- .widget-body -->
	</div><!-- .widget -->
</div><!-- END column -->
@endsection