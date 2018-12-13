@extends('layouts.app')

@section('content')
<style>
.widget .pull-right{
	margin-top: 10px;
}
.widget-title {
    color: #382E2D !important;
}
</style>
 <!-- navbar search -->
<!-- <div id="navbar-search" class="navbar-search collapse">
  <div class="navbar-search-inner">
    <form action="#">
      <span class="search-icon"><i class="fa fa-search"></i></span>
      <input class="search-field" type="search" placeholder="search..."/>
    </form>
    <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
      <i class="fa fa-close"></i>
    </button>
  </div>
  <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
</div> -->
<!-- .navbar-search -->

<!-- APP MAIN ==========-->
<!--<main id="app-main" class="app-main">
  <div class="wrap">
	<section class="app-content">
		<div class="row"> -->
			<!--<div class="col-md-12 col-sm-12">
				<div class="widget p-md clearfix">
					<div class="pull-left">
						<h3 class="widget-title">Welcome Text</h3>
						<small class="text-color">Sub Text</small>
					</div>
					<span class="pull-right fz-lg fw-500 counter" data-plugin="counterUp">10</span>
				</div> 
			</div> -->

			<!--<div class="col-md-6 col-sm-6">
				<div class="widget p-md clearfix">
					<div class="pull-left">
						<h3 class="widget-title">Non - Returnable Count Today</h3>
						<small class="text-color">Sub Text</small>
					</div>
					<span class="pull-right fz-lg fw-500 counter" data-plugin="counterUp">325</span>
				</div><!-- .widget -->
			<!--</div>-->
		</div><!-- .row -->

		<div class="row">
			<div class="col-md-4 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<h3 class="widget-title text-primary">
								<span class="counter" data-plugin="counterUp">
									 {{ (($categorys) ? $categorys : '0' )  }}
								</span>
							</h3>
							<h4 class="text-color">Category Count</h4>
						</div>
						<span class="pull-right big-icon watermark"><img class="img-responsive" src="{{ asset('assets/images/category.svg') }}" height="35" width="35" >
					</div>
					<footer class="widget-footer bg-primary bg-color-box">
						<!-- <small>Sub Text</small> -->
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<!--<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp">3.490</span>k</h3>
							<small class="text-color">Total Pending</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-ban"></i></span>
					</div>
					<footer class="widget-footer bg-danger">
						<small>% charge</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[1,2,3,5,4], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			<!--</div>-->

			<div class="col-md-4 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<h3 class="widget-title text-success">
								<span class="counter" data-plugin="counterUp">
									{{ (($products) ? $products : '0' )  }}
								</span>
							</h3>
							<h4 class="text-color">Product Count</h4>
						</div>
						<span class="pull-right big-icon watermark"><img class="img-responsive" src="{{ asset('assets/images/product.svg') }}" height="35" width="35" ></span>
					</div>
					<footer class="widget-footer bg-success bg-color-box">
						<!-- <small>Sub Text</small> -->
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[2,4,3,4,3], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-4 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<h3 class="widget-title text-warning">
								<span class="counter" data-plugin="counterUp">
									{{ (($solds) ? $solds : '0' )  }}
								</span>
							</h3>
							<h4 class="text-color">Sold Count</h4>
						</div>
						<span class="pull-right big-icon watermark"><img class="img-responsive" src="{{ asset('assets/images/outofstock.svg') }}" height="35" width="35" ></span>
					</div>
					<footer class="widget-footer bg-warning bg-color-box">
						<!-- <small>Sub Text</small> -->
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[5,4,3,5,2],{ type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>
		<!-- </div> .row -->
@endsection
