@extends('layouts.app')

@section('content')
<style type="text/css">
   .size{
		 font-weight: bolder;
     font-size: 18px;
		 font-family: serif;
		 }
  .error {
    color: #f51814;
    font-weight: 500;  
  }
  .thumbnail .caption{
     text-align:center;
   }
  .thumbnail{
     background-color: #ffffff;
		 border: none !important;
   }
   .thumbnail a > img{
     width: 100%;
		 border-radius: 31px;
    } 

		.thumbnail a > img {
				display: block;
				max-width: 75%;
				height: auto;
				margin-left: auto;
				margin-right: auto;
		}
   
	.article{
	text-align:left;
	}
	
	.align{margin-bottom: 20px;}
	.btn-sm {
    margin-right: 10px;
	}
	.btn-sm	a {
			color: #ffffff;
			text-decoration: none;
	}
	h4, .caption .align {
		font-size: inherit;
		font-weight: inherit;
	}

	.article{
	text-align:left;
	}

 /* .menubar.light .app-user .username {
    color: #333333;
    font-family: AvenirLTStd-Book;
} 

.app-footer .copyright {
    float: left;
    font-weight: bold;
    color: #aaacae;
    letter-spacing: 1.5px;
    //font-family: AvenirLTStd-Book;
} */

.btn-sm {
		margin-right: 10px;
		//font-family: AvenirLTStd-Book;
	}

.table > thead > tr > th, .table > thead > tr > td, .table > tbody > tr > th, .table > tbody > tr > td, .table > tfoot > tr > th, .table > tfoot > tr > td {
	border-top: none !important;
	line-height: 1.8em;
}
.table tr td:first-child {
	width : 20%;
	font-weight: 600;
	font-size: 16px;
}
.table {
  	margin-top: -6px !important;
}
	 
  </style>
<div class="widget">
	<header class="widget-header">
		<div class="col-md-6">
			<h4 class="widget-title">Show Product</h4>
		</div>
		<div class="col-md-6">
		<!--<a data-toggle="tooltip" data-placement="top" data-original-title="Edit Data" class="btn btn-primary"href="{{ route('Product.edit',$product->id) }}"><i class="fa fa-pencil"></i> Edit</a> -->
			<a href="{{ route('Product.category',$product->category_id) }}">
				<button type="submit" class="btn btn-info btn-sm pull-right">
					<i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back
				</button>
			</a> 
			<!--<a href="{{ route('Product.edit',$product->id) }}">
				<button type="submit" class="btn btn-info btn-sm pull-right">
						<i class="fa fa-pencil"></i> Edit</a>
				</button>
			</a>-->
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
						 	<img class="card-img-top" src="{{url('/images/products/lg/'.$product->product_ios_img_large)}}" alt="Image" />  
						   <div class="caption">
								<h4 class="size">{{ $product->product_name }}</h4>
							</div>
						</a>
					</div>
				</div>	
		    <div class="continue">
					<!--<h4 class="align"><span class="size">Product Name : </span> {{ $product->product_name }}</h4> 
					<h4 class="align"><span class="size">Product Code &nbsp;: </span> {{ $product->product_code ? $product->product_code : '--'  }}</h4> 
					  	
					<h4 class="align"><span class="size">Ct &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span> {{ (($product->carat) ? $product->carat : '--') }}</h4> 	
					<h4 class="align"><span class="size">Kt &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span> {{ (($product->kt) ? $product->kt : '--') }}</h4> 	
					<h4 class="align"><span class="size">Wt &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span> {{ (($product->weight) ? $product->weight : '--') }}</h4> 	
					<h4 class="align"><span class="size">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span> {{ (($product->status == 1) ? "Pick me!" : 'Off the Shelf') }}</h4> 	
					<h4 class="align"><span class="size">Description &nbsp;&nbsp;&nbsp;&nbsp;: </span> <span id="ran">{{ (($product->description) ? $product->description : '--') }} </span></h4> -->

					<div class="table-responsive">          
						<table class="table">
							<thead>
 							</thead>
							<tbody>
							<tr>
								<td>Product Name</td>
								<td>:</td>
								<td>{{ $product->product_name }}</td>
							</tr>
							<tr>
								<td>Product Code</td>
								<td>:</td>
								<td> {{ $product->product_code ? $product->product_code : '--'  }} </td>
							</tr>
							<tr>
								<td>Ct</td>
								<td>:</td>
								<td> {{ (($product->carat) ? $product->carat : '--') }} </td>
							</tr>
							<tr>
								<td>Kt</td>
								<td>:</td>
								<td> {{ (($product->kt) ? $product->kt : '--') }} </td>
							</tr>
							<tr>
								<td>Wt</td>
								<td>:</td>
								<td>{{ (($product->weight) ? $product->weight : '--') }}</td>
							</tr>
							<tr>
								<td>Status</td>
								<td>:</td>
								<td>{{ (($product->status == 1) ? "Pick me!" : 'Off the Shelf') }}</td>
							</tr>
							<tr>
								<td>Description</td>
								<td>:</td>
								<td> {{ (($product->description) ? $product->description : '--') }} </td>
							</tr>
							</tbody>
						</table>
					</div>		
		    </div>	
		 </div>
		 
	</div><!-- .widget-body -->
</div><!-- .widget -->
@endsection