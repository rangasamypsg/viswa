@extends('layouts.app')

@section('content')
<div class="widget">
	<header class="widget-header">
		<div class="col-md-6">
			<h4 class="widget-title">Show Category</h4>
		</div>
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
		
		<form class="form-horizontal">
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Category : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-2 control-label">{{ $category->category_name }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Description : </strong></label>
				<div class="col-sm-6">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-12 control-label">{{ $category->description }}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Category Image : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-2 control-label"><img src="{{url('/images/category/'.$category->category_image)}}" class="img-circle" alt="Image" width="100px" height="100px" /></label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleTextInput1" class="col-sm-3 control-label"><strong>Status : </strong></label>
				<div class="col-sm-9">
					<label for="exampleTextInput1" style="text-align: left;" class="col-sm-2 control-label">{{ $category->status == 1 ? 'Active' : 'InActive' }}</label>
				</div>
			</div>
		</form>
	</div><!-- .widget-body -->
</div><!-- .widget -->
@endsection