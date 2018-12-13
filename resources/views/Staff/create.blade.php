@extends('layouts.app')

@section('content')
<div class="col-md-12">
	<div class="widget">
		<header class="widget-header">
			<h4 class="col-md-6 widget-title">Staff Master</h4>
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
			 {!! Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'Staff.store', 'method' => 'POST', 'role' => 'form']) !!}

				{{ csrf_field() }} 
				 
				@include('Staff._form')
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						{!! Form::submit('Add Staff',array('class'=>'btn btn-primary'),'<i class="fa fa-btn fa-user"></i>') !!}
					</div>
				</div>
			{!! Form::close() !!}
		</div><!-- .widget-body -->
	</div><!-- .widget -->
</div><!-- END column -->
@endsection