@extends('layouts.app')

@section('content')
<style type="text/css">
   .size{font-weight: bolder;
    font-size: 18px;}
  .error {
    color: #f51814;
    font-weight: 500;  
  }
  .thumbnail .caption{
     text-align:center;
   }
  .thumbnail{
     background-color: #ffffff;
	 
   }
  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
   }
   .thumbnail a > img{
     width: 100%;
    } 
   
	.article{
	text-align:left;
	}
		.align{margin-bottom: 20px;}
		h4, .caption .align {
		font-size: inherit;
		font-weight: inherit;
	}
  
	.size{
    font-weight: bolder;
    font-size: 18px;
    font-family: AvenirLTStd-Book;

	}

.thumbnail a > img{
     width: 100%;
	border-radius: 31px;
    display: block;
    max-width: 70%;
    height: auto;
    margin-left: auto;
    margin-right: auto;
    max-height: 390px;
    } 

		.thumbnail a > img {
				display: block;
				
				height: auto;
				margin-left: auto;
				margin-right: 6%;
				max-height: 380px;
			
		}
   .thumbnail .caption{
     margin-left: 47%;
    font-family: AvenirLTStd-Book;
    font-size: 22px;
   }

  </style>
<div class="widget">
	<header class="widget-header">
		<div class="col-md-6">
			<h4 class="widget-title">Show Product</h4>
		</div>
		<div class="col-md-6">
			<a href="{{ route('Sold.category',$product->category_id) }}">
				<button type="submit" class="btn btn-info btn-sm pull-right">
					<i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back
				</button>
			</a>
		</div>
	</header><!-- .widget-header -->
	<hr class="widget-separator">
	<div class="widget-body">
			
		<!--<div class="card mb-4">			 
			<img class="card-img-top" src="{{url('/images/'.$product->product_image)}}" alt="Image" />			
			<div class="card-body">
			  <h2 class="card-title">{{ $product->product_name }}</h2>
			  <h4 class="card-title">Rs.{{ (($product->price) ? sprintf("%01.2f", $product->price) : '')  }}</h4>
			  <p class="card-text"> {{ $product->description }} </p>
			   
			</div>
			<div class="card-footer text-muted">
			  Posted on January 1, 2017 by
			  <a href="#">Start Bootstrap</a>
			</div>
		 </div> -->

		 <div class="row">
				<div class="col-md-6">
					<div class="thumbnail card">
					   <a href="#">
						 	<img class="card-img-top" src="{{url('/images/'.$product->product_ios_img_large)}}" alt="Image" />  
						   <div class="caption">
								<h4>{{ $product->product_name }}</h4>
							</div>
						</a>
					</div>
				</div>	
		    <div class="continue">
				<h4 class="align"><span class="size">Product Name : </span> {{ $product->product_name }}</h4> 
				<!--<h4 class="align"><span class="size">Category : </span> Ring</h4> --> 	
				<h4 class="align"><span class="size">Caret &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span> {{ (($product->carat) ? $product->carat : '--') }}</h4> 	
				<h4 class="align"><span class="size">Kt &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span> {{ (($product->kt) ? $product->kt : '--') }}</h4> 	
				<h4 class="align"><span class="size">Weight &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span> {{ (($product->weight) ? $product->weight : '--') }}</h4> 	
				<h4 class="align"><span class="size">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span> {{ (($product->status == 1) ? "Pick me!" : 'Off the Shelf') }}</h4> 	
				<h4 class="description"><span class="size">Description &nbsp;&nbsp;&nbsp;&nbsp;: </span></h4>
								{{ (($product->description) ? $product->description : '--') }}
		    </div>	
		 </div>
		 
	</div><!-- .widget-body -->
</div><!-- .widget -->
@endsection