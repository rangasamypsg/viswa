@extends('layouts.app')

@section('content')
<div class="col-md-12">
	<div class="widget">
		<header class="widget-header">
			<h4 class="col-md-6 widget-title">Edit Staff</h4>
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
			 {!! Form::model($staff, ['method' => 'PATCH','files' => true,'class' => 'form-horizontal','role' => 'form', 'route' => ['Staff.update', $staff->id]]) !!}
             
             {{ csrf_field() }}

                @include('Staff._form')   
                
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Edit Staff', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            </form>
		</div><!-- .widget-body -->
	</div><!-- .widget -->
</div><!-- END column -->
@endsection