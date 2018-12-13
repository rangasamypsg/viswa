@extends('layouts.app')

@section('content')
<div class="col-md-12">
	<div class="widget">
		<header class="widget-header">
			<h4 class="col-md-6 widget-title">Customer Feedback</h4>
			<div class="col-md-6">
				<a href="{{ route('StaffQuestion.index') }}">
					<button type="submit" class="btn btn-info btn-sm pull-right">
						<i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back
					</button>
				</a>
			</div>
		</header><!-- .widget-header -->
		<hr class="widget-separator">
		<div class="widget-body">
			 {!! Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'StaffQuestion.store', 'method' => 'POST', 'role' => 'form']) !!}

                        {{ csrf_field() }} 
						
						<div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
							{!! Form::label('StaffQuestion','Question', array('class' => 'col-md-4 control-label')) !!} 							
							<div class="col-md-6">
								{{ Form::text('text', null, array('_required','class' => 'form-control','placeholder'=>'Your Staff Question')) }} 
								@if ($errors->has('text'))
									<span class="help-block">
										<strong>{{ $errors->first('text') }}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="text-group">
							<div class="form-group">
								{!! Form::label('Option','Option', array('class' => 'col-md-4 control-label')) !!} 							
								<div class="col-md-6">
									{{ Form::text('option[]', null, array('_required','class' => 'form-control','style' => 'width: 83%;float: left;margin-right: 25px;','placeholder'=>'Your option')) }} 
									<div> 
										<a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Add Question',array('class'=>'btn btn-primary'),'<i class="fa fa-btn fa-user"></i>') !!}
							</div>
						</div>
                    {!! Form::close() !!}
		</div><!-- .widget-body -->
	</div><!-- .widget -->
</div><!-- END column -->

 <script type="text/javascript">

	$(document).ready(function() {
		var max_fields      = 5; //maximum input boxes allowed
		var wrapper         = $(".text-group"); //Fields wrapper
		var add_button      = $(".addMore"); //Add button ID
	
		var x = 1; //initlal text box count
		$(add_button).click(function(e){ //on add input button click
			e.preventDefault();
			if(x < max_fields){ //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="form-group"><label for="Option" class="col-md-4 control-label">Option</label><div class="col-md-6"><input required class="form-control" placeholder="Your Option" name="option[]" type="text" style="width: 78%;float: left;margin-right: 25px;"> <a href="javascript:void(0)" class="btn btn-danger remove remove_field"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a> </div></div>'); //add input box
			} else{
				alert('Maximum '+ max_fields +' Fields are allowed.');
			}
		});
	
		$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
			e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
		});
	});

 </script>


@endsection