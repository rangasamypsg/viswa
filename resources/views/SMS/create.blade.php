@extends('layouts.app')

@section('content')
<div class="col-md-12">
	<div class="widget">
		<div class="col-md-2">&nbsp;</div>
			<div class="col-md-8">
				@if ($message = Session::get('success'))
					<div class="alert alert-success" style="text-align: center;">
						<p><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> {{ $message }}</p>
					</div>
				@endif
			</div>
			<div class="col-md-2">&nbsp;</div>
		</div>
		<header class="widget-header">
			<h4 class="col-md-6 widget-title">SMS Sending</h4>
			<div class="col-md-6">
				<!-- <a href="#">
					<button type="submit" class="btn btn-info btn-sm pull-right">
						<i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back
					</button>
				</a> -->
			</div>
		</header><!-- .widget-header -->
		<hr class="widget-separator">
			<div class="widget-body">
				{!! Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'Sms.store', 'method' => 'POST', 'role' => 'form']) !!}

						{{ csrf_field() }} 
						
						<div class="form-group{{ $errors->has('sender_id') ? ' has-error' : '' }}">
							{!! Form::label('Sender ID','Sender ID', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
							{!! Form::text('sender_id', Input::old('sender_id'), array('class' => 'form-control','maxlength'=>'6','placeholder'=>'Your Sender ID')) !!} 
								@if ($errors->has('sender_id'))
									<span class="help-block">
										<strong>{{ $errors->first('sender_id') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('preference') ? ' has-error' : '' }}">
							{!! Form::label('Campaign',trans('Campaign'), array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
							<ul class="ranga">
							    <li style="float: left">
								{!! Form::checkbox("campaign", 1, null, ['id'=>'coimbatore','class' => 'checkbox']) !!} Coimbatore
								</li>
								<li style="float: left">
								{!! Form::checkbox("campaign", 2, null, ['id'=>'chennai','class' => 'checkbox']) !!} Chennai	
								</li>
								<li style="float: left">
								{!! Form::checkbox("campaign", 'Wedding', null, ['id'=>'Wedding','class' => 'checkbox']) !!} Wedding
								</li>
								<li style="float: left">
								{!! Form::checkbox("campaign", 'Birthday', null, ['id'=>'Birthday','class' => 'checkbox']) !!} Birth Day
								</li>
							</ul>
								@if ($errors->has('preference'))
									<span class="help-block">
										<strong>{{ $errors->first('preference') }}</strong>
									</span>
								@endif
							</div>
						</div>


						<div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
							{!! Form::label('Mobile Number','Mobile Number', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
								{{ Form::hidden('mobile_numbers', '', array('_required','id'=>'mobile_numbers','class' => 'form-control','placeholder'=>'Your Mobile Number')) }} 

								{!! Form::textarea('mobile_number', '', array('_required','id'=>'mobile_number','class' => 'form-control','disabled'=>'disabled','placeholder'=>'Your Mobile Number')) !!}

								@if ($errors->has('mobile_number'))
									<span class="help-block">
										<strong>{{ $errors->first('mobile_number') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
							{!! Form::label('Content','Content', array('class' => 'col-md-4 control-label')) !!} 
							
							<div class="col-md-6">
								{!! Form::textarea('content', null, array('placeholder' => 'Content','id'=>'content','class' => 'form-control')) !!}
								(Maximum characters: 160)<br/>
								<span id="charLeft"> </span>  Characters left
								@if ($errors->has('content'))
									<span class="help-block">
										<strong>{{ $errors->first('content') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Send SMS',array('class'=>'btn btn-primary'),'<i class="fa fa-btn fa-user"></i>') !!}
								<!--{!! Form::reset('Reset',array('class'=>'btn btn-danger'),'<i class="fa fa-btn fa-user"></i>') !!}-->
							</div>
						</div>

					{!! Form::close() !!}
				</div><!-- .widget-body -->
			</div><!-- .widget -->
		</div><!-- END column -->
<script>
	$(document).ready(function() {
 		$('#content').keyup(function() {
			var len = this.value.length;
			if (len >= 160) {
				this.value = this.value.substring(0, 160);
				//return true;
			}
			$('#charLeft').text(160 - len);
		});
	});
</script>
<style>
.check {
	width : 15px;
}

.form-group ul.ranga li {
   float: left;
   margin-right: 20px;	
/*   width: 0px;
   height: 0px;
*/   width: 74px;

display: block;
  padding-left: 15px;
  text-indent: -15px;

}
</style>
<script>
	$(document).ready(function() {
		//$('.checkbox').trigger('change');
		//alert('rangasamy');
		$(".checkbox").on("change", function() { 
			var favorite = [];
            $.each($(".checkbox:checked"), function(){            
                favorite.push($(this).val());
            });
			var typeId = favorite.join(",");
			//alert(typeId);
			//alert(jQuery('#campaign').val());
			$.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
			jQuery.ajax({
                  url: "{{ url('/sms/city') }}",
                  method: 'post',
                  data: {
                     name: typeId                     
                  },
                  success: function(result){	
					// alert(result);
					// return false; 				
                    jQuery('#mobile_number').html(result.data);
                    jQuery('#mobile_numbers').val(result.data);
                  }
			});
        		 
		});
	});
</script>
@endsection