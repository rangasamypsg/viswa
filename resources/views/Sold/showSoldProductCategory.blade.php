@extends('layouts.app')

@section('content')
<style type="text/css">

  .error {
    color: #f51814;
    font-weight: 500;  
  }
  input[type="radio"], input[type="checkbox"] {
      margin-top: 10px !important;
  }
  .bg-color-box {
     background-color: #382E2D !important;
  }
  .app-menu .img-responsive { 
    display: unset;   
    max-width: 100%;
    height: auto;
  }
   
  .app-menu li.open, .app-menu li.active {
    border-left-color: #000000 !important;
  }
  .hm-logo {
    margin-top: -17px;
  }


 .div1{float:left;font-family: inherit;
    font-weight: 500;
    margin-top: -12px;
    color: inherit;}
  .div2{
  float:right;
  margin-top:-11px;
    
  }
  .thumbnail .caption{
    text-align: center;
		//color: #000000;
		font-size: 1.1em;
		margin-top: 20px;
		line-height: 2.5;
		font-weight: bold;
		//font-family: AvenirLTStd-Book;
   }
  .thumbnail{
     background-color: #ffffff;
		 height: 320px;
   }
  .card:hover {
     box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
   }
  
   .thumbnail a > img{
     width: 100%;
	   height: auto;
    } 
	.align{
	  text-align:left;
	}
  .ralign{
    float: right;
	  font-size: 17px;
    color: rgb(54,73,110);
    padding: 0 0 0 10px;
    font-weight: 500;
   }
   .button 
  {
    margin-top: 10px;
    border-radius: 10px;
    background-color: #4CAF50; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }
  .button1 
  {
    margin-top: 10px;
    border-radius: 10px;
    background-color: #ff5b5b; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }
  .align{
	  text-align:center;
	  font-size: 17px;
    padding: 0 0 0 10px;
    //font-weight: 500;
		float:left;
    margin-right: 9px;
		/* width:50%; */
	}
   .ralign{
    text-align:center;
  	font-size: 17px;
    color: rgb(54,73,110);
    padding: 0 0 0 10px;
    font-weight: 500;
	  margin-top: 4px;
   }
   .container {
    position: relative;
    width: 50%;
}
   .thumbnail:hover{opcity:1;}
.img {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}

  @media(min-width: 990px) and (axm-width: 1800px){
    .align{}
  }
.no-records-page {
    width: 380px;
    margin: 0 auto;
		padding: 120px;
		height:300px;
}

.dropdown {
    position: relative;
    display: inline-block;
	    float: right;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 84px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
	  margin-right: 4px;
    padding: 8px 13px;
    text-decoration: none;
    display: block;
	
}
.show {
		display:block; 
    margin-top: -8%;
    margin-left: 1px;
    border-radius: 5px;
 }
 .glyphicon {     
    top: -41px;
    float: right;     
}
 .parse{
   position: absolute;
   margin-left: 54%;
}
h4, .caption .align {
	font-size: inherit;
	font-weight: inherit;
}
div.align1{
	margin-left: 16px;
	font-size:16px;
}
.sequence{
    width: 30px;
    height: 30px;
    margin-top: 10px;
    margin-left: 118px;
}
  </style>
<div class="widget">
	<header class="widget-header">
		<div class="col-md-6">
			<h4 class="widget-title">Show All Products</h4>
		</div>
		<div class="col-md-6">
			<a href="{{ route('Sold.categorys') }}">
				<button type="submit" class="btn btn-info btn-sm pull-right">
					<i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back
				</button>
			</a>
		</div>
	</header><!-- .widget-header -->
	<hr class="widget-separator">
	<div class="widget-body">
		<div class="row">		
		  <?php $i = 1; ?>								
			@if (count($products) > 0)		
			@foreach ($products as $key => $product)	
				<div class="col-md-4">
					<div class="thumbnail card">
            @if(!empty( Auth::user()->role_name == "admin" ))
						<div class="dropdown parse">
								<img onclick="myFunction(<?php echo $product->id; ?>)" class="dropbtn sequence" src="{{url('/images/marker.png')}}" alt="Trolltunga Norway" >
								<div id="mydropdown<?php echo $product->id; ?>" class="dropdown-content">
									<a href="#" class="soldout" data-id="{{ $product->id }}" id="sold_out_{{ $product->id }}" name="0">Move to Gallery </a> <!--<i class="glyphicon glyphicon-chevron-up"></i> -->
								</div>
						</div>
            @endif
						<a href="{{ route('Sold.detail',[$product->id,$product->slug]) }}">
							  <img src="{{url('/images/products/sm/'.$product->product_ios_img_small)}}" _class="img-circle" alt="Image" width="100px" height="100px" /> 
                <div class="caption">
                  <h4>{{ $product->product_name }} - {{ $product->product_code ? $product->product_code : '--'  }}</h4>
                  <div class="col-md-3">Ct : {{ $product->carat ? $product->carat : '--'  }} </div>
                  <div class="col-md-1"> | </div>
                  <div class="col-md-3">Kt &nbsp;: {{ $product->kt ? $product->kt : '--' }} </div>
                  <div class="col-md-1"> | </div>
                  <div class="col-md-3">Wt &nbsp;: {{ $product->weight ? $product->weight : '--'  }} </div>
                </div>	
							</a>
							<!--<div class="caption">			  
								@if ($product->status == 1)
										<button type="button" data-id="{{ $product->id }}" id="sold_out_{{ $product->id }}" name="1" class="button soldout">Pick me!</button>
										<button type="button" data-id="{{ $product->id }}" id="sold_product_{{ $product->id }}" name="0" class="button1 soldout" style="display:none">Off the shelf</button>
								@else
									<button type="button" data-id="{{ $product->id }}" id="sold_out_{{ $product->id }}" name="1" class="button soldout" style="display:none">Pick me!</button>
									<button type="button" data-id="{{ $product->id }}" id="sold_product_{{ $product->id }}" name="0" class="button1 soldout">Off the shelf</button>
								@endif  
							</div> -->
					</div>					
				</div>		
				<?php $i++; ?>
			@endforeach
			@else 
			<div class="caption no-records-page">
					<div><strong>No Record Found</strong></div>
			</div>											 
			@endif
		</div>	
	</div><!-- .widget-body -->
  <div class="text-center">
    {{ $products->links() }}
  </div>
</div><!-- .widget -->

<script type="text/javascript">
	$(document).ready(function(){
	
		$('.soldout').on('click',function(){		
      if (confirm('Are you sure you want Move to Gallery?')) {	 
          var productId = $(this).attr('data-id');
          //alert(productId);
          var status = $(this).attr('name');
          var formData = {
            'product_id': productId,
            'status': status,
            //'_token': $('input[name=_token]').val()
          }	 
          if(productId){
            $.ajax({
              type:'POST',
              url: "{{ URL::route('Product.soldout') }}",
              dataType: 'json',
              data : formData,
              chache: false,
              success:function(data){
                console.log(data);
                if(data.status == "success") {
                    if(data.msg == "sold-product") {
                      $("#sold_product_"+productId).show();
                      $("#sold_out_"+productId).hide();
                    }else {
                      $("#sold_product_"+productId).hide();
                      $("#sold_out_"+productId).show();
                    }
                }
                window.location.reload();
              }
            }); 
          } 
        }  
		  });
	});
</script>
  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction(id) {
	  $(".dropdown-content").removeClass("show");
    document.getElementById("mydropdown"+id).classList.toggle("show");
}

// Close the dropdown1 if the user clicks outside of it
window.onclick = function(event) {

	 //alert('testss');
//	$(".dropbtn").remove('show');
  if (!event.target.matches('.dropbtn')) {
		
    var dropdown1s = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdown1s.length; i++) {
      var opendropdown1 = dropdown1s[i];
			 
      if (opendropdown1.classList.contains('show')) {
        opendropdown1.classList.remove('show');
      }
    }
		
  }
}
 
</script>
@endsection