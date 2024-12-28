<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset('/assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{asset('/assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{asset('/assets/css/custom.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="{{asset('/assets/img/logo.png')}}" />

                    </a>

                </div>

                <span class="logout-spn">
                    <a href="#" style="color:#fff;">LOGOUT</a>

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="active-link">
                        <a href="/admin?tab=brand"><i class="fa fa-desktop "></i>Brand</a>
                    </li>
                    <li class="active-link">
                        <a href="/admin?tab=category"><i class="fa fa-desktop "></i>Category</a>
                    </li>
                    <li class="active-link">
                        <a href="/admin?tab=product"><i class="fa fa-desktop "></i>Product</a>
                    </li>
                    <li class="active-link">
                        <a href="/admin?tab=user"><i class="fa fa-desktop "></i>User</a>
                    </li>
                    <li class="active-link">
                        <a href="/admin?tab=order"><i class="fa fa-desktop "></i>Order</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                @php
                    $tab='';
                    if(isset($_GET['tab'])){
                        $tab = $_GET['tab'];
                    }
                    if(isset($tab1)){
                        $tab = $tab1;
                    }
                @endphp
                @switch($tab)
                    @case('brand')
                        @include('brands.index')
                    @break
 
                    @case('category')
                        @include('category.index')
                    @break

                    @case('product')
                        @include('products.admin_show')
                    @break
                    @case('user')
                        @include('users.index')
                    @break
                    @case('order')
                        @include('users.index')
                    @break

                    @default
                        
                @endswitch
                
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <div class="footer">
    </div>


    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

</html>