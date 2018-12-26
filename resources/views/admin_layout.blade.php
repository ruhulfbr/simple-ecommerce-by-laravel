
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta name="description" content="RuhulAmin">
    <meta name="author" content="RuhulAmin">
    <meta name="keyword" content="">
    <!-- end: Meta -->
    
    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->
    
    <!-- start: CSS -->
    <link id="bootstrap-style" href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link id="base-style" href="{{asset('public/backend/css/style.css')}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

    

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link id="ie-style" href="css/ie.css" rel="stylesheet">
    <![endif]-->
    
    <!--[if IE 9]>
        <link id="ie9style" href="css/ie9.css" rel="stylesheet">
    <![endif]-->
        
    <!-- start: Favicon -->
    <link rel="shortcut icon" href="{{ URL::to('public/backend/img/favicon.ico')}}">
    <!-- end: Favicon -->
</head>

<body>
        <!-- start: Header -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="{{URL::to('/dashboard')}}"><span>Shop</span></a>
                                
                <!-- start: Header Menu -->
                <div class="nav-no-collapse header-nav">
                    <ul class="nav pull-right">
                        <!-- start: User Dropdown -->
                        <li class="dropdown">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white user"></i> {{Session::get('admin_name')}}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu-title">
                                    <span>Account Settings</span>
                                </li>
                                <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
                                <li><a href="{{URL::to('/logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <!-- end: User Dropdown -->
                    </ul>
                </div>
                <!-- end: Header Menu -->
                
            </div>
        </div>
    </div>
    <!-- start: Header -->
    
    <div class="container-fluid-full">
        <div class="row-fluid">
           <!-- start: Main Menu -->
            <div id="sidebar-left" class="span2">
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li><a href="{{URL::to('/dashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>   
                        <li><a href="{{URL::to('/all-category')}}"><i class="icon-envelope"></i><span class="hidden-tablet"> All Category</span></a></li>
                        <li><a href="{{URL::to('/add-category')}}"><i class="icon-tasks"></i><span class="hidden-tablet"> Add Category</span></a></li>
                        <li><a href="{{URL::to('/all-brand')}}"><i class="icon-eye-open"></i><span class="hidden-tablet"> All Brand</span></a></li>
                        <li><a href="{{URL::to('/add-brand')}}"><i class="icon-dashboard"></i><span class="hidden-tablet"> Add Brand</span></a></li>
                        <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Product</span><span class="label label-important pull-right">  <i class="halflings-icon chevron-down"></i> </span></a>
                            <ul>
                                <li><a class="submenu" href="{{URL::to('/all-product')}}">++<span class="hidden-tablet"> All Product</span></a></li>
                                <li><a class="submenu" href="{{URL::to('/add-product')}}">++<span class="hidden-tablet"> Add Product</span></a></li>
                            </ul>   
                        </li>
                        <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Slider</span><span class="label label-important pull-right"><i class="halflings-icon chevron-down"></i> </span></a>
                            <ul>
                                <li><a class="submenu" href="{{URL::to('/all-slider')}}">++<span class="hidden-tablet"> All Slider</span></a></li>
                                <li><a class="submenu" href="{{URL::to('/add-slider')}}">++<span class="hidden-tablet"> Add Slider</span></a></li>
                            </ul>   
                        </li>
                        <li><a href="{{URL::to('/manage-order')}}"><i class="icon-list-alt"></i><span class="hidden-tablet"> Manage Order</span></a></li>
                        <li><a href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Shop Name</span></a></li>
                        <li><a href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Delivery Man</span></a></li>
                    </ul>
                </div>
            </div>

            <!-- end: Main Menu -->
            <div id="content" class="span10">
                @yield('admin_content')
            </div>
        
           
         
    
            <!-- end: Content -->
        </div><!--/#content.span10-->
    </div><!--/fluid-row-->
        
    <div class="modal hide fade" id="myModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Settings</h3>
        </div>
        <div class="modal-body">
            <p>Here settings can be configured...</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
            <a href="#" class="btn btn-primary">Save changes</a>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <footer>

        <p>
            <span style="text-align:left;float:left">&copy; <?php echo date('Y'); ?> <a href="http://bootstrapmaster.com/" alt="Bootstrap Themes">creativeLabs</a></span>
            <span class="hidden-phone" style="text-align:right;float:right">Powered by: <a href="http://admintemplates.co/" alt="Bootstrap Admin Templates">Metro</a></span>
        </p>

    </footer>
    
    <!-- start: JavaScript-->

        <script src="{{URL::to('public/backend/js/jquery-1.9.1.min.js')}}"></script>
        <script src="{{URL::to('public/backend/js/jquery-migrate-1.0.0.min.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.ui.touch-punch.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/modernizr.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/bootstrap.min.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.cookie.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/fullcalendar.min.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.dataTables.min.js')}}"></script>

        <script src="{{URL::to('public/backend/js/excanvas.js')}}"></script>
        <script src="{{URL::to('public/backend/js/jquery.flot.js')}}"></script>
        <script src="{{URL::to('public/backend/js/jquery.flot.pie.js')}}"></script>
        <script src="{{URL::to('public/backend/js/jquery.flot.stack.js')}}"></script>
        <script src="{{URL::to('public/backend/js/jquery.flot.resize.min.js')}}"></script>
        
        <script src="{{URL::to('public/backend/js/jquery.chosen.min.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.uniform.min.js')}}"></script>
        
        <script src="{{URL::to('public/backend/js/jquery.cleditor.min.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.noty.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.elfinder.min.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.raty.min.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.iphone.toggle.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.uploadify-3.1.min.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.gritter.min.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.imagesloaded.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.masonry.min.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.knob.modified.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/jquery.sparkline.min.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/counter.js')}}"></script>
    
        <script src="{{URL::to('public/backend/js/retina.js')}}"></script>

        <script src="{{URL::to('public/backend/js/custom.js')}}"></script>
    <!-- end: JavaScript-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script type="text/javascript">
        @if(Session::has('message'))
            var type = "{{Session::get('alert-type','info')}}"
            switch(type){
                case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
                case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
                case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
                case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
            }
        @endif
    </script>
    
</body>

</html>
