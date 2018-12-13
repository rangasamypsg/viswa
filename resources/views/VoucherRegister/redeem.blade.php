@extends('layouts.app')

@section('content')
<div class="widget">
	<header class="widget-header">
		<div class="col-md-6">
			<h4 class="widget-title">Redeem Voucher </h4>
		</div>
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
        
      <div class="col-md-12" id="success_msg">
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

        <div class="alert alert-success" id="voucher-error" style="text-align:center;width:50%;margin:0 auto;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <span id="voucher-msg"></span>
        </div>

        <div class="form-wrap">
            <label class="control-label mb-10 text-left">Voucher ID</label>
                <div class="row">
                    {!! Form::open(['files' => true,  'method' => 'POST', 'role' => 'form']) !!}
                    {{ csrf_field() }}
                    <div class="col-md-9 col-sm-12 col-xs-12 form-group">
                        {{ Form::text('voucher_code', null, array('class' => 'form-control', 'id' => 'voucher_code', 'placeholder'=>'Voucher Code')) }}
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                        {{ Form::button('Submit',array('class'=>'btn btn-danger','onClick'=>'getMessage()') ) }}
                    </div>
                    {!! Form::close() !!}
                </div>
        </div>
        <div class="row">
            <!-- Basic Table -->
            <div class="col-sm-12">
              <div class="panel panel-default card-view">
                <!-- <div class="panel-heading">
                  <div class="pull-left">
                  </div>
                  <div class="clearfix"></div>
                </div> -->
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                    <div class="table-wrap mt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <thead>
                            <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Email Id</th>
                            <th>Mobile Number</th>
                            <th>Location</th>
                            <th>Voucher Code</th>
                            <th>Available Voucher</th>
                            <th>Voucher Redeemed</th>
                            <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr id="msg"></tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Basic Table -->        
		</div> 
	</div><!-- .widget-body -->
</div><!-- .widget -->


<script type="text/javascript">
     
     $( document ).ready(function() {
       $("#voucher-error").hide();
    });
      function getMessage(){
        $("#success_msg").remove();
        var _token = $('input[name="_token"]').val();
        voucher_code = document.getElementById('voucher_code').value;
        $("#voucher-error").hide();
        var formData = {
                _token : _token,
                voucher_code : voucher_code,
              }
        $.ajax({
               type:'POST',
               url: "{{ URL::route('Voucher.redeem_voucher') }}",
               data: formData,
               chache: false,
               success:function(data){
                 var json = $.parseJSON(data);
                  //alert(" rangasamy " + json.status);
                  if(json.status == "success") {
                    $("#msg").html('<td>'+json.response["0"]["id"]+'</td><td>'+json.response["0"]["firstname"]+json.response["0"]["lastname"]+'</td><td>'+json.response["0"]["email"]+'</td><td>'+json.response["0"]["mobile_number"]+'</td><td>'+json.response["0"]["country"]+'</td><td>'+json.response["0"]["voucher"]+'</td><td>'+json.response["0"]["voucher_count"]+'</td><td>'+json.response["0"]["redeem_count"]+'</td><td><a href="voucher_redeem/'+json.response["0"]["id"]+'" class="btn btn-danger btn-xs '+((json.response["0"]["voucher_count"] == 0) ? 'disabled' : '')+'">Redeem</a></td>');
                  } else {
                     $("#voucher-error").addClass('alert-danger').show(); 
                     $("#voucher-msg").html(json.response); 
                  }
                  
               },
               error:function(data) {
                 // $("#msg").html("data.msg");
                 $("#msg").html('<td>1</td><td>Jens</td><td>Brincker</td><td>Brincker123</td><td>1</td><td>Jens</td><td>Brincker</td><td>Brincker123</td>');
                 // alert(voucher_code);
               }
            });
      }
    
    </script>
@endsection