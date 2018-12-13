@extends('layouts.app')

@section('content')
<style type="text/css">
 .div1{float:left;font-family: inherit;
    font-weight: 500;
    margin-top: -12px;
    color: inherit;}
  .div2{
  float:right;
  margin-top:-11px;
    
  }
  .thumbnail .caption{
     text-align:center;
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
	text-align:left;
	font-size: 17px;
    color: rgb(54,73,110);
    padding: 0 0 0 10px;
    font-weight: 500;
		float:left;
		width:50%;
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

.dropdown1 {
    position: relative;
    display: inline-block;
	    float: right;
}

.dropdown-content1 {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 84px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content1 a {
    color: black;
	margin-right: 4px;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
	
}
.show {
		display:block; 
		margin-top: -28%;
    margin-left: -54px;
 }
 .glyphicon {     
    top: -41px;
    float: right;     
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
				<div class="col-md-3">
					<div class="thumbnail card">
						<div class="dropdown1">
								<img onclick="myFunction(<?php echo $product->id; ?>)" class="dropbtn1 sequence" src="{{url('/images/marker.png')}}" alt="Trolltunga Norway" >
								<div id="mydropdown<?php echo $product->id; ?>" class="dropdown-content1">
									<a href="#" class="soldout" data-id="{{ $product->id }}" id="sold_out_{{ $product->id }}" name="1">Sold out </a>  
								</div>
						</div>
						<a href="{{ route('Sold.detail',[$product->id,$product->slug]) }}">
							<img src="{{url('/images/'.$product->product_image)}}" _class="img-circle" alt="Image" width="100px" height="100px" /> 
							<div class="caption">
								<div class="align">P.N : {{ $product->product_name }}</div>
								<div class="align">Caret : {{ $product->carat ? $product->carat : '--'  }} </div>
								<div class="align">KT &nbsp;: {{ $product->kt ? $product->kt : '--' }}</div>
								<div class="align">WT &nbsp;&nbsp;&nbsp;: {{ $product->weight ? $product->weight : '--'  }} </div>
							</div>	
							</a>
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
</div><!-- .widget -->

<script type="text/javascript">
	$(document).ready(function(){
	
		$('.soldout').on('click',function(){			 
			var productId = $(this).attr('data-id');
			var status = $(this).attr('name');
			var formData = {
				'product_id': productId,
				'status': status,
				//'_token': $('input[name=_token]').val()
			}	 
			if(productId){
				$.ajax({
					type:'POST',
					url: "{{ URL::route('Sold.soldout') }}",
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
								 window.location.reload();
						 }
					}
				}); 
			} 

		});
	});
</script>
@endsection