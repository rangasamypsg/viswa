<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
  <meta name="base_url" content="{{ URL::to('/') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="{{ asset('assets/images/fav-icon-02.png') }}">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <title>{{ config('app.name', 'Bradken Admin Panel') }}</title> -->	
    <title>{{ Config::get('settings.name') }}</title>	
    <!-- Styles -->
	<link rel="stylesheet" href="{{ asset('libs/bower/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css') }}">
	<!-- build:css ../assets/css/app.min.css -->
	<link rel="stylesheet" href="{{ asset('libs/bower/animate.css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('libs/bower/fullcalendar/dist/fullcalendar.min.css') }}">
	<link rel="stylesheet" href="{{ asset('libs/bower/perfect-scrollbar/css/perfect-scrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
	<!-- endbuild -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
  <!-- Scripts -->
  <!--<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>-->
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/common-function.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-1.12.4.js') }}"></script>

  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

	<script>
		Breakpoints();
	</script>
  <style type="text/css">
  .app-menu .menu-text {
    font-size: 1.1em !important;
  }
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
  .fg-color-box a {
     color: #382E2D !important;
  }
  .app-menu .img-responsive { 
    display: unset;   
    max-width: 100%;
    height: auto;
  }
  .app-menu .menu-text {
    color : #a5a5a5;
  }
  .app-menu li.open, .app-menu li.active {
    //border-left-color: #000000 !important;
    border-left-color: #382E2D !important;
      background-color: #382E2D !important;
  }
  .hm-logo {
    margin-top: -17px;
  }
  .fg-color-box a {
    color: #aaacae !important;
  }
  .fg-color-box a:hover {
      color: #382E2D !important;
  }
  #productSubmenu, #feedbackSubmenu li {
    _margin-left : 15px;
  } 

  .has-children ul li {
    padding: 0px 8px !important;
  }

  .active-menu {
    border-left-color: #000000 !important;
    /* border-left-color: #382E2D !important; */
    background-color: #382E2D !important;
  }
  .vd-title-menu {
    font-size:15px !important;
    font-weight:600;
    color:#a5a5a5 !important;
  }

  /* .menu-text:hover {
    color : #382E2D;
  } */
   
 </style>
</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary bkcolor">
<!--============= start main area -->

<!-- Start Delete Pop-UP -->
<!-- Modal Dialog -->
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete item</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete this item ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirm" onclick="return fu">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- APP NAVBAR ==========-->
<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary" style="background-color: #382E2D;">
  
  <!-- navbar header -->
  <div class="navbar-header">
    <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
      <span class="sr-only">Toggle navigation</span>
      <span class="hamburger-box"><span class="hamburger-inner"></span></span>
    </button>

    <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-more"></span>
    </button>

    <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-search"></span>
    </button>

    <a href="{{ URL::to('home') }}" class="navbar-brand">
      <span class="brand-icon"><img class="hm-logo" src="{{ asset('assets/images/vdd-logo.png') }}"></span>
      <!--<span class="brand-name">{{ Config::get('settings.Project.title') }}</span>-->
    </a>
  </div><!-- .navbar-header -->
  
  <div class="navbar-container container-fluid">
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
        <!-- <li class="hidden-float hidden-menubar-top">
          <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
          </a>
        </li> -->
        <li>
          <h5 class="page-title hidden-menubar-top hidden-float"></h5>
        </li>
      </ul>

      <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
        <!-- <li class="nav-item dropdown hidden-float">
          <a href="javascript:void(0)" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
            <i class="zmdi zmdi-hc-lg zmdi-search"></i>
          </a>
        </li> -->

        <li class="dropdown">
          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-settings"></i></a>
          <ul class="dropdown-menu animated flipInY">
            <!--<li><a href="javascript:void(0)"><i class="zmdi m-r-md zmdi-hc-lg zmdi-account-box"></i>Log Out</a></li>-->
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="zmdi m-r-md zmdi-hc-lg zmdi-account-box"></i> Logout
                </a>    
            </li>          
          </ul>
        </li>

        
      </ul>
    </div>
  </div><!-- navbar-container -->
</nav>
<!--========== END app navbar -->

<!-- APP ASIDE ==========-->
<aside id="menubar" class="menubar light">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <a href="javascript:void(0)"><img class="img-responsive" src="{{ asset('assets/images/221.jpg') }}" alt="avatar"></a>
        </div><!-- .avatar -->
      </div>
      <div class="media-body">
        <div class="foldable">
          @if(Auth::check())
          <h5><a href="javascript:void(0)" class="username">{{ ucfirst(Auth::user()->name) }}</a></h5>
          <ul>
            <!--<li class="dropdown">
              <a class="text-color" href="logout.php">
                    <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                    <span>Logout</span>
                  </a>              
            </li>-->
            <li class="dropdown">
                <!--<a class="text-color" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                   <span>Logout</span>
                </a> -->

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
          </ul>
           @endif
        </div>
      </div><!-- .media-body -->
    </div><!-- .media -->
  </div><!-- .app-user -->

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner" style="position: relative; overflow: scroll; width: auto; height: 100%;">
        
        <ul class="app-menu">
          <li class="{{ request()->is('home') ? 'active open' : '' }}" class="has-submenu">
            <a href="{{ URL::to('home') }}">
              <img class="img-responsive" src="{{ asset('assets/images/dashboard.svg') }}" height="20" width="20" > &nbsp;
              <span class="menu-text">Dashboard</span>            
            </a>         
          </li>
          <?php $categoryMenu = ''; if(request()->is('categorys')) { $categoryMenu = "active open"; } elseif(request()->is('category/create')) { $categoryMenu = "active open"; }elseif(Request::segment(1) == "category") {  $categoryMenu = "active open";  } ?>
          <li class="{{ $categoryMenu }}" class="has-submenu">
            <a href="{{ URL::to('categorys') }}">
              <img class="img-responsive" src="{{ asset('assets/images/category.svg') }}" height="22" width="22" > &nbsp;
              <span class="menu-text">Category</span>            
            </a>         
          </li>
      
       </ul>

       <?php $productMenu = ''; if(request()->is('products')) { $productMenu = "active open"; } elseif(request()->is('product/create')) { $productMenu = "active open"; }elseif(Request::segment(1) == "product") {  $productMenu = "active open";  } ?>
       <?php $vendorMenu = ''; if(request()->is('product_categorys') || Request::segment(1) == "product_category" || Request::segment(1) == "product_show" ) { $vendorMenu = "active open"; }  ?> 
       <?php $importMenu = ''; if(request()->is('importExport')) { $importMenu = "active open"; } ?>
       <?php $favMenu = ''; if(request()->is('sold_categorys') || Request::segment(1) == "sold_category" || Request::segment(1) == "sold_show" ) { $favMenu = "active open"; }  ?>
        <ul class="cd-accordion-menu animated">           
          <li class="has-children {{ $productMenu }}">
            <input type="checkbox" name ="group-1" id="group-1">
            <label for="group-1" class="vd-title-menu">Products <span class="caret" style="font-size: 29px;float: right;margin-top: 6px;"></span></label>
            <ul style="<?php if($productMenu || $vendorMenu || $importMenu || $favMenu) { ?> display:block; <?php } ?>">
              <li class="{{ $productMenu }} <?php if( $productMenu == "active open" ) { ?> active-menu <?php } ?>" class="has-submenu">
                  <a href="{{ URL::to('products') }}">
                    <img class="img-responsive" src="{{ asset('assets/images/product.svg') }}" height="22" width="22" > &nbsp;
                    <span class="menu-text">Jwellery</span>            
                  </a>         
              </li>  
              <li class="{{ $vendorMenu }} <?php if( $vendorMenu == "active open" ) { ?> active-menu <?php } ?>" class="has-submenu">
                  <a href="{{ URL::to('product_categorys') }}">
                    <!-- <i class="menu-icon zmdi fa fa-file-image-o" aria-hidden="true"></i> -->
                    <img class="img-responsive" src="{{ asset('assets/images/gallery-01.svg') }}" height="22" width="22" > &nbsp;
                    <span class="menu-text">Gallery</span>            
                  </a>         
                </li> 
                <li class="{{ $importMenu }} <?php if( $importMenu == "active open" ) { ?> active-menu <?php } ?>" class="has-submenu">
                  <a href="{{ URL::to('importExport') }}">
                  <!-- <i class="menu-icon zmdi fa fa-file-image-o" aria-hidden="true"></i> -->
                    <img class="img-responsive" src="{{ asset('assets/images/import.svg') }}" height="22" width="22" > &nbsp;
                    <span class="menu-text">Import</span>            
                  </a>         
                </li> 
                <li class="{{ $favMenu }} <?php if( $favMenu == "active open" ) { ?> active-menu <?php } ?>" class="has-submenu">
                  <a href="{{ URL::to('sold_categorys') }}">
                  <!-- <i class="menu-icon zmdi fa fa-file-image-o" aria-hidden="true"></i> -->
                    <img class="img-responsive" src="{{ asset('assets/images/rate-star-button.svg') }}" height="22" width="22" > &nbsp;
                    <span class="menu-text">Favourites</span>            
                  </a>         
                </li>
            </ul>
          </li>
          
          <?php $vendorMenu = ''; if(request()->is('vendors')) { $vendorMenu = "active open active-menu"; } elseif(request()->is('vendor/create')) { $productMenu = "active open active-menu"; }elseif(Request::segment(1) == "vendor") {  $productMenu = "active open active-menu";  } ?>
          <?php $smsMenu = ''; if(request()->is('sms/create')) { $smsMenu = "active open active-menu"; } ?>
          <?php $questionMenu = ''; if(request()->is('questions')) { $questionMenu = "active open active-menu"; } ?>
          <?php $feedbackMenu = ''; if(request()->is('feedbacks')) { $feedbackMenu = "active open active-menu"; } ?>
          <?php $feedBackListMenu = ''; if(request()->is('feed_back_lists')) { $feedBackListMenu = "active open active-menu"; } ?>
          <?php $staffQuestionMenu = ''; if(request()->is('staff_questions')) { $staffQuestionMenu = "active open active-menu"; } ?>
          <?php $staff_feedbackMenu = ''; if(request()->is('staff_feedbacks')) { $staff_feedbackMenu = "active open active-menu"; } ?>
          <?php $staffListMenu = ''; if(request()->is('staff_lists')) { $staffListMenu = "active open active-menu"; } ?>
          <li class="has-children">
              <input type="checkbox" name ="group-2" id="group-2">
              <label for="group-2" class="vd-title-menu">Customer Management <span class="caret" style="font-size: 29px;float: right;margin-top: 6px;"></span></label>
                  <ul style="<?php if( $vendorMenu || $smsMenu || $questionMenu || $feedbackMenu || $feedBackListMenu || $staffQuestionMenu || $staff_feedbackMenu || $staffListMenu ) { ?> display:block; <?php } ?>">
                      <li class="{{ $vendorMenu }}" class="has-submenu">
                        <a href="{{ URL::to('vendors') }}">
                        <!-- <i class="menu-icon zmdi fa fa-file-image-o" aria-hidden="true"></i> -->
                          <img class="img-responsive" src="{{ asset('assets/images/customer-service.svg') }}" height="22" width="22" > &nbsp;
                          <span class="menu-text">Customers</span>            
                        </a>         
                      </li>
                      <li class="{{ $smsMenu }}" class="has-submenu">
                        <a href="{{ URL::to('sms/create') }}">
                        <!-- <i class="menu-icon zmdi fa fa-file-image-o" aria-hidden="true"></i> -->
                          <img class="img-responsive" src="{{ asset('assets/images/sms.svg') }}" height="22" width="22" > &nbsp;
                          <span class="menu-text">Send SMS</span>            
                        </a>         
                      </li>  
                      <li class="has-children">
                        <input type="checkbox" name ="sub-group-1" id="sub-group-1">
                        <label for="sub-group-1" class="vd-title-menu" style="padding : 0px";>Experience Feedback <span class="caret" style="font-size: 29px;float: right;margin-top: 6px;"></span></label>
                        <ul style="<?php if( $questionMenu || $feedbackMenu || $feedBackListMenu ) { ?> display:block; <?php } ?>">
                          <li class="{{ $questionMenu }}" class="has-submenu">
                              <a href="{{ URL::to('questions') }}">
                              <!-- <i class="menu-icon zmdi fa fa-file-image-o" aria-hidden="true"></i> -->
                                <img class="img-responsive" src="{{ asset('assets/images/question.svg') }}" height="22" width="22" > &nbsp;
                                <span class="menu-text">Question</span>            
                              </a>         
                           </li> 
                           <li class="{{ $feedbackMenu }}" class="has-submenu">
                              <a href="{{ URL::to('feedbacks') }}">
                              <!-- <i class="menu-icon zmdi fa fa-file-image-o" aria-hidden="true"></i> -->
                                <img class="img-responsive" src="{{ asset('assets/images/feedback.svg') }}" height="22" width="22" > &nbsp;
                                <span class="menu-text">Feedback</span>            
                              </a>         
                           </li>
                           <li class="{{ $feedBackListMenu }}" class="has-submenu">
                              <a href="{{ URL::to('feed_back_lists') }}">
                              <!-- <i class="menu-icon zmdi fa fa-file-image-o" aria-hidden="true"></i> -->
                                <img class="img-responsive" src="{{ asset('assets/images/review.svg') }}" height="22" width="22" > &nbsp;
                                <span class="menu-text">Ratings</span>            
                              </a>         
                            </li> 
                        </ul>
                      </li>     			 
                      <li class="has-children">
                        <input type="checkbox" name ="sub-group-2" id="sub-group-2">
                        <label for="sub-group-2" class="vd-title-menu">Customer Feedback <span class="caret" style="font-size: 29px;float: right;margin-top: 6px;"></span></label>
                            <ul style="<?php if( $staffQuestionMenu || $staff_feedbackMenu || $staffListMenu ) { ?> display:block; <?php } ?>">
                              <li class="{{ $staffQuestionMenu }}" class="has-submenu">
                                  <a href="{{ URL::to('staff_questions') }}">
                                <!-- <i class="menu-icon zmdi fa fa-file-image-o" aria-hidden="true"></i> -->
                                  <img class="img-responsive" src="{{ asset('assets/images/question.svg') }}" height="22" width="22" > &nbsp;
                                  <span class="menu-text">Question</span>            
                                </a>         
                              </li> 
                              <li class="{{ $staff_feedbackMenu }}" class="has-submenu">
                                <a href="{{ URL::to('staff_feedbacks') }}">
                                    <img class="img-responsive" src="{{ asset('assets/images/feedback.svg') }}" height="22" width="22" > &nbsp;
                                  <span class="menu-text">Feedback</span>            
                                </a>         
                              </li>
                              <li class="{{ $staffListMenu }}" class="has-submenu">
                                <a href="{{ URL::to('staff_lists') }}">
                                <!-- <i class="menu-icon zmdi fa fa-file-image-o" aria-hidden="true"></i> -->
                                  <img class="img-responsive" src="{{ asset('assets/images/review.svg') }}" height="22" width="22" > &nbsp;
                                  <span class="menu-text">Ratings</span>            
                                </a>         
                              </li>                                
                          </ul>
                      </li> 
                  </ul>
            </li> 
            <?php $voucherMenu = ''; if(request()->is('voucher_list')) { $voucherMenu = "active open active-menu"; } ?>
            <?php $voucherUserMenu = ''; if(request()->is('voucher_user')) { $voucherUserMenu = "active open active-menu"; } ?>
            <?php $voucherRedeemMenu = ''; if(request()->is('voucher_redeem_list')) { $voucherRedeemMenu = "active open active-menu"; } ?>
            <li class="has-children">
              <input type="checkbox" name ="group-3" id="group-3">
              <label for="group-3" class="vd-title-menu">E-voucher Management <span class="caret" style="font-size: 29px;float: right;margin-top: 6px;"></span></label>
              <ul style="<?php if( $voucherMenu || $voucherRedeemMenu || $voucherUserMenu ) { ?> display:block; <?php } ?>">
                  <li class="{{ $voucherUserMenu }}" class="has-submenu">
                      <a href="{{ URL::to('voucher_user') }}">
                        <img class="img-responsive" src="{{ asset('assets/images/users.svg') }}" height="22" width="22" > &nbsp;
                        <span class="menu-text">View Users</span>            
                      </a>         
                  </li>
                  <li class="{{ $voucherMenu }}" class="has-submenu">
                      <a href="{{ URL::to('voucher_list') }}">
                        <img class="img-responsive" src="{{ asset('assets/images/coupon.svg') }}" height="22" width="22" > &nbsp;
                        <span class="menu-text">View Voucher</span>            
                      </a>         
                  </li>
                  <li class="{{ $voucherRedeemMenu }}" class="has-submenu">
                    <a href="{{ URL::to('voucher_redeem_list') }}">
                      <img class="img-responsive" src="{{ asset('assets/images/redeem.svg') }}" height="22" width="22" > &nbsp;
                      <span class="menu-text">Redeem</span>            
                    </a>         
                </li> 
              </ul>
          </li>  
        </ul> <!-- cd-accordion-menu -->

        <ul class="app-menu">
          <?php $expoMenu = ''; if(request()->is('expo_customer_list')) { $expoMenu = "active open"; } ?>
          <li class="{{ $expoMenu }}" class="has-submenu">
            <a href="{{ URL::to('expo_customer_list') }}">
              <img class="img-responsive" src="{{ asset('assets/images/staff.svg') }}" height="22" width="22" > &nbsp;
              <span class="menu-text">Expo customer List</span>            
            </a>         
            </li> 
        </ul>

        <ul class="app-menu">
          <?php $staffMenu = ''; if(request()->is('staffs')) { $staffMenu = "active open"; } ?>
            <li class="{{ $staffMenu }}" class="has-submenu">
                <a href="{{ URL::to('staffs') }}">
                <!-- <i class="menu-icon zmdi fa fa-file-image-o" aria-hidden="true"></i> -->
                  <img class="img-responsive" src="{{ asset('assets/images/staff.svg') }}" height="22" width="22" > &nbsp;
                  <span class="menu-text">Staff Management</span>            
                </a>         
              </li> 
       </ul> <!-- app-menu -->

    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->

</aside>
<!--========== END app aside -->

<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
  <div class="wrap">
    <section class="app-content">
      <div class="row">

          @yield('content')

      </div> <!-- row -->
    </section>
  </div>
<!-- APP FOOTER -->
  <div class="wrap p-t-0" style="padding-top:50px !important;">
    <footer class="app-footer" style="position:absolute;bottom:0;width:100%;height:60px;_background:#382E2D;">
      <div class="clearfix">        
        <div class="copyright pull-left fg-color-box">Copyright &copy; <?php echo Date('Y'); ?> <a href="http://www.viswadevji.in/" target="_blank">Viswa & Devji Diamonds Private Limited.</a> Crafted by:<a href="http://www.episodetechnologies.com/" target="_blank">Episode Technologies Private Limited.</a> </div>
      </div>
    </footer>
  </div>
  <!-- /#app-footer -->
</main>
<!--========== END app main -->

	<!-- APP CUSTOMIZER -->
	<!-- <div id="app-customizer" class="app-customizer">
		<a href="javascript:void(0)" 
			class="app-customizer-toggle theme-color" 
			data-toggle="class" 
			data-class="open"
			data-active="false"
			data-target="#app-customizer">
			<i class="fa fa-gear"></i>
		</a>
		<div class="customizer-tabs">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#menubar-customizer" aria-controls="menubar-customizer" role="tab" data-toggle="tab">Menubar</a></li>				
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane in active fade" id="menubar-customizer">
					<div class="hidden-menubar-top hidden-float">
						<div class="m-b-0">
							<label for="menubar-fold-switch">Fold Menubar</label>
							<div class="pull-right">
								<input id="menubar-fold-switch" type="checkbox" data-switchery data-size="small" />
							</div>
						</div>
						<hr class="m-h-md">
					</div>
					<div class="radio radio-default m-b-md">
						<input type="radio" id="menubar-light-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="light">
						<label for="menubar-light-theme">Light</label>
					</div>
					<div class="radio radio-inverse m-b-md">
						<input type="radio" id="menubar-dark-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="dark">
						<label for="menubar-dark-theme">Dark</label>
					</div>
				</div>				
			</div>
		</div>
		<hr class="m-0">
	</div> -->	

	<!-- build:js ./assets/js/core.min.js -->
	<script src="{{ asset('libs/bower/jquery/dist/jquery.js') }}"></script>
	<script src="{{ asset('libs/bower/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('libs/bower/jQuery-Storage-API/jquery.storageapi.min.js') }}"></script>
	<script src="{{ asset('libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js') }}"></script>
	<script src="{{ asset('libs/bower/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
	<script src="{{ asset('libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
	<script src="{{ asset('libs/bower/PACE/pace.min.js') }}"></script>
	<!-- endbuild -->

	<!-- build:js ../assets/js/app.min.js -->
	<script src="{{ asset('assets/js/library.js') }}"></script>
	<script src="{{ asset('assets/js/plugins.js') }}"></script>
	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script src="{{ asset('assets/js/sidebar.js') }}"></script>
	<!-- endbuild -->
	<script src="{{ asset('libs/bower/moment/moment.js') }}"></script>
	<script src="{{ asset('libs/bower/fullcalendar/dist/fullcalendar.min.js') }}"></script>
	<script src="{{ asset('assets/js/fullcalendar.js') }}"></script>

  <script>
  $(document).ready(function() {
 	    // Get today's date
      var today = new Date();
      $("#date_of_service,#return_of_service,#dob,#wedding").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',
        //minDate: today // set the minDate to the today's date
        // you can add other options here
      });

      /* var accordionsMenu = $('.cd-accordion-menu');

      if( accordionsMenu.length > 0 ) {
        
        accordionsMenu.each(function(){
          var accordion = $(this);
          //detect change in the input[type="checkbox"] value
          accordion.on('change', 'input[type="checkbox"]', function(){
            var checkbox = $(this);
            console.log(checkbox.prop('checked'));
            ( checkbox.prop('checked') ) ? checkbox.siblings('ul').attr('style', 'display:none;').slideDown(300) : checkbox.siblings('ul').attr('style', 'display:block;').slideUp(300);
          });
        }); */

  });
  </script>

</body>
</html>
