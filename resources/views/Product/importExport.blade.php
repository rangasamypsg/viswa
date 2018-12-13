@extends('layouts.app')

@section('content')
<div class="col-md-12">
	<div class="widget">
		<header class="widget-header">
			<h4 class="col-md-6 widget-title">Product Import Master</h4>
			<div class="col-md-6">
				<a href="{{ route('Product.index') }}">
					<button type="submit" class="btn btn-info btn-sm pull-right">
						<i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back
					</button>
				</a>
			</div>
		</header><!-- .widget-header -->
		<div class="container">
			@if ( Session::has('success') )
				<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>{{ Session::get('success') }}</strong>
			</div>
			@endif
		
			@if ( Session::has('error') )
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>{{ Session::get('error') }}</strong>
			</div>
			@endif
		
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				<div>
					@foreach ($errors->all() as $error)
					<p>{{ $error }}</p>
					@endforeach
				</div>
			</div>
			@endif
		</div>
		<div class="panel-body"> 
			<!-- <div class="col-md-2"></div>
			<div class="col-md-6">
				<div class="row">
						<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
						<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
						<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
				</div>
			</div>
			<div class="col-md-2"></div> -->
		</div>
		<div class="widget-body">
			{!! Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'Product.importExcel', 'method' => 'POST', 'role' => 'form']) !!}
            	{{ csrf_field() }} 
				<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
					{!! Form::label('Import File','Import File', array('class' => 'col-md-4 control-label')) !!} 
					
					<div class="col-md-6">
						{!! Form::file('file', array('class' => 'image')) !!}   
						@if ($errors->has('file'))
							<span class="help-block">
								<strong>{{ $errors->first('file') }}</strong>
							</span>
						@endif 
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						{!! Form::submit('Import File',array('class'=>'btn btn-primary'),'<i class="fa fa-btn fa-user"></i>') !!}
					</div>
				</div>
			{!! Form::close() !!}
		</div><!-- .widget-body -->	
	</div><!-- .widget -->
</div><!-- END column -->
@endsection