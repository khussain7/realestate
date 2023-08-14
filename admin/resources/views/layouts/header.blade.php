<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('title') </title>
        <!-- Fonts -->
       <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('build/template/images/favicon/apple-touch-icon.png') }}">
       <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('build/template/images/favicon/favicon-32x32.png') }}">
       <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('build/template/images/favicon/favicon-16x16.png') }}">
       <link rel="stylesheet" href="{{ asset('build/template/css/bootstrap.min.css') }}" />
       <link rel="stylesheet" href="{{ asset('build/template/css/iconfont.min.css') }}" />
       <link rel="stylesheet" href="{{ asset('build/template/css/plugins.css') }}" />
       <link rel="stylesheet" href="{{ asset('build/template/css/helper.css') }}" />
       <link rel="stylesheet" href="{{ asset('build/template/css/style.css') }}" />
       <link rel="stylesheet" href="{{ asset('build/template/css/custom.css') }}" />
       <link rel="stylesheet" href="{{ asset('build/template/css/carousel.css') }}" />
       <link rel="stylesheet" href="{{ asset('build/template/datatables/datatables.min.css') }}" />
       <link rel="stylesheet" href="{{ asset('build/template/css/bootstrap-icons.css') }}" />
       <link rel="stylesheet" href="{{ asset('build/template/css/select2.min.css') }}" />
       <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css"> -->


   <!-- Scripts -->
       
    </head>
    <body>
    <div id="main-wrapper">
   
   <!--Header section start-->
   <header class="header header-sticky">
       <div class="header-bottom menu-center header-bottom">
           <div class="container">
               <div class="row justify-content-between">
                   
                   <!--Logo start-->
                   <div class="col mt-10 mb-10">
                       <div class="logo">
                           <a href="https://fortune4realestate.com/">
                             <img src="{{ asset('/build/template/images/logo2.png') }}" id="img-logo" width=50 />
                            </a>
                       </div>
                   </div>
                   <!--Logo end-->
                   
                   <!--Menu start-->
                   <div class="col d-none d-lg-flex">
                       <nav class="main-menu">
                           <ul>
                               <li class="">
                                <a href="{{ url('/propertyr/propertylist') }}">Properties</a>
                               </li>
                               <li class="">
                               <a href="{{ url('/bannerr/addbanner')}}">Banners</a>
                               </li>
                               <li class="">
                               <a href="{{ url('/agentr/agentlist')}}">Agent</a>
                               </li>
                               <li class="has-dropdown"><a href="agencies.html">Agencies</a>
                                   <ul class="sub-menu">
                                       <li><a href="agencies.html">Agencies</a></li>
                                       <li><a href="agency-details.html">Agency Details</a></li>
                                   </ul>
                               </li>
                               <!-- <li class="has-dropdown"><a href="news.html">News</a>
                                   <ul class="sub-menu">
                                       <li><a href="news.html">Default Layout</a></li>
                                       <li><a href="news-left-sidebar.html">Left Sidebar</a></li>
                                       <li><a href="news-right-sidebar.html">Right Sidebar</a></li>
                                       <li><a href="news-carousel.html">Carousel Single Row</a></li>
                                       <li><a href="news-carousel2.html">Carousel Double Row</a></li>
                                       <li><a href="news-details.html">Details Left Sidebar</a></li>
                                       <li><a href="news-details-right-sidebar.html">Details Right Sidebar</a></li>
                                   </ul>
                               </li> -->
                               <li class="has-dropdown"><a href="#">pages</a>
                                   <ul class="sub-menu">
                                       <li><a href="{{ url('/pageslist')}}">Manage Pages</a></li>
                                       <!-- <li><a href="add-properties.html">Add Properties</a></li>
                                       <li><a href="contact-us.html">Contact us</a></li>
                                       <li><a href="gallery-2-column.html">Gallery 2 Column</a></li>
                                       <li><a href="gallery-3-column.html">Gallery 3 Column</a></li>
                                       <li><a href="gallery-4-column.html">Gallery 4 Column</a></li>
                                       <li><a href="login-register.html">Login & Register</a></li>
                                       <li><a href="my-account.html">My Account</a></li> -->
                                   </ul>
                               </li>
                           </ul>
                       </nav>
                   </div>
                   <!--Menu end-->
                   
                   <!--User start-->
                   <div class="col mr-sm-50 mr-xs-50">
                       <div class="header-user">
                           
                           <nav class="main-menu">
                           <ul>
                            <li class="has-dropdown">
                            <img src="{{ url('/files/') }}/{{Auth::user()->image}}" width="50" />
                                <!-- <img src="/storage/assets/images/{{Auth::user()->image}}" width="100" /> -->
                               <p> {{ Auth::user()->name }} </p> 
                               <p> {{ Auth::user()->email }} </p>
                           
                            <ul class="sub-menu">
                            <li>
                                       <a href="{{ route('profile.edit') }}">
                                           {{ __('Profile') }}
                                       </a>
                               </li>
                               <li>
                                 <form method="POST" action="{{ route('logout') }}">
                                     @csrf
  
                                     <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                                         {{ __('Log Out') }}
                                     </a>
                                 </form>
                               </li>
                            </ul>
                               </li>
                            </ul>
                            </nav>
                           
                            <!-- Authentication -->
                            
                        </div>
                       </div>
                   </div>
                   <!--User end-->
               </div>
               
               <!--Mobile Menu start-->
               <div class="row">
                   <div class="col-12 d-flex d-lg-none">
                       <div class="mobile-menu"></div>
                   </div>
               </div>
               <!--Mobile Menu end-->
               
           </div>
       </div>
   </header>
   <!--Header section end-->

   @yield('content')


        <script src="{{ asset('build/template/js/vendor/modernizr-2.8.3.min.js') }}"></script>
        <script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script>
        <script src="{{ asset('build/template/js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('build/template/js/vendor/jquery-migrate-1.4.1.min.js') }}"></script>
        <script src="{{ asset('build/template/js/popper.min.js') }}"></script>
        <script src="{{ asset('build/template/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('build/template/js/plugins.js') }}"></script>
        <script src="{{ asset('build/template/js/map-place.js') }}"></script>
        <script src="{{ asset('build/template/js/main.js') }}"></script>
        <script src="{{ asset('build/template/js/fileuploads.js') }}"></script>
        <script src="{{ asset('build/template/js/feildvalidate.js') }}"></script>
        <script src="{{ asset('build/template/ckeditor5/ckeditor.js') }}"></script>
        <script src="{{ asset('build/template/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('build/template/js/select2.min.js') }}"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script> -->
    @stack('extra-js')
    </body>
</html>
