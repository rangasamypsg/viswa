@extends('layouts.app')

@section('content')
<style type="text/css">
  
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
	.no-records-page {
			width: 380px;
			margin: 0 auto;
			padding: 120px;
			height:300px;
	}
	.size {
		 font-weight: bolder;
     	 font-size: 18px;
		 font-family: serif;
	}
 </style>
<div class="widget">
	<header class="widget-header">
		<div class="col-md-6">
			<h4 class="widget-title">Show Category</h4>
		</div>
		<div class="col-md-6">
			<!--<a href="{{ route('Sold.categorys') }}">
				<button type="submit" class="btn btn-info btn-sm pull-right">
					<i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back
				</button>
			</a> -->
		</div>
	</header><!-- .widget-header -->
	<hr class="widget-separator">
	<div class="widget-body">
		<div class="row">										
			@if (count($categorys) > 0)		
				@foreach ($categorys as $key => $category)					 
					@foreach ($category as $key2 => $value)
						<div class="col-md-3">
							<div class="thumbnail card">
								<a href="{{ route('Sold.category',$value['id']) }}">							 
									@if (!empty($value['product_image']))
										<img src="{{url('/images/category/'.$value['product_image'])}}" alt="Image" width="100px" height="100px" />
									@else 
										<img src="{{url('/images/pro-empty.png')}}" alt="Image" width="100px" height="100px" />  
									@endif
									<div class="caption text-center">
										<h4 class="size">{{ $value['category_name'] }} ( <?php  echo $productCount = Helper::getCatProductCount( $value['id'], 0 ); ?> )</h4>
									</div>
								</a>
							</div>
						</div>
					@endforeach
				@endforeach
			@else 
			<div class="caption no-records-page">
					<div><strong>No Record Found</strong></div>
			</div>										 
			@endif
		</div>	
	</div><!-- .widget-body -->
</div><!-- .widget -->
@endsection