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
                            
                           <a href="https://fortune4realestate.com/"> <img src="{{ asset('build/template/images/logo2.png') }}" id="img-logo" width=70/></a>
                           <div id="logo-text1">Fortune 4</div>
                            <div id="logo-text2">Real Estate</div>
                       </div>
                   </div>
                   <!--Logo end-->
                   
                   <!--Menu start-->
                   <div class="col mr-sm-100 mr-xs-100 d-none d-lg-flex">
                       <nav class="main-menu">
                           <ul>
                               <li class="">
                                <a href="https://fortune4realestate.com/">Home</a>
                               </li>
                               
                               <li class="has-dropdown"><a href="#">Property Search</a>
                                   <ul class="sub-menu">
                                       <li class="fixborderbox"><a href="#">Buy</a></li>
                                       <li class="fixborderbox"><a href="#">Rent</a></li>
                                       <li class="fixborderbox"><a href="#">Off Plan</a></li>
                                       <li class=""><a href="#">Featured Properties</a></li>
                                   </ul>
                               </li>
                              
                               <li class="has-dropdown"><a href="#">Property Management</a>
                                   <ul class="sub-menu">
                                       <li><a href="#">List Your Property</a></li>
                                   </ul>
                               </li>
                               <li class="has-dropdown"><a href="#">About us</a>
                                   <ul class="sub-menu">
                                       <li class="fixborderbox"><a href="#">Our Team</a></li>
                                       <li class="fixborderbox"><a href="#">Our Partners</a></li>
                                       <li class="fixborderbox"><a href="#">Awards &amp; Achievements</a></li>
                                       <li class="fixborderbox"><a href="#">Testimonials</a></li>
                                       <li class="fixborderbox"><a href="#">Blogs</a></li>
                                       <li class="fixborderbox"><a href="#">Careers</a></li>
                                       <li class=""><a href="#">Contact us</a></li>
                                   </ul>
                               </li>
                           </ul>
                       </nav>
                   </div>
                   <!--Menu end-->
                   
                   <!--User start-->
                   <div class="col mr-sm-50 mr-xs-50">
                       <div class="header-user">
                           
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

   <footer class="footer-section section" style="background-image: url(assets/images/bg/footer-bg.jpg)">
       
        <!--Footer Top start-->
        <div class="footer-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
            <div class="container">
                <div class="row row-25">
                    
                    <!--Footer Widget start-->
                    <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                        <img src="assets/images/logo-footer.png" alt="">
                        <p>
                            FORTUNE FOUR REAL ESTATE L.L.C,
                            DEVELOPERS –  EMAAR, NAKHEEL, DUBAI PROPERTIES, DAMAC, DEYAAR, DANUBE, AZIZI, SOBHA, Vincitore, ELLINGTON 
                        </p>
                        <div class="footer-social">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                    <!--Footer Widget end-->
                    
                    <!--Footer Widget start-->
                    <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                        <h4 class="title"><span class="text">Contact us</span><span class="shape"></span></h4>
                        <ul>
                            <li><i class="fa fa-map-o"></i><span>
                            OFFICE NO- 1702, 17th FLOOR, THE EXCHANGE TOWER, BUSINESS BAY, DUBAI, UNITED ARAB EMIRATES
                            </span></li>
                            <li><i class="fa fa-phone"></i><span><a href="#">+97144102233</a></span></li>
                            <li>
                                <i class="fa fa-envelope-o"></i><span><a href="#">info@fortune4realestate.com</a></li>
                            <li>
                            <i class="fa fa-globe"></i><span>
                                <a href="#">www.fortune4realestate.com</a></span>
                            </li>    
                        </ul>
                    </div>
                    <!--Footer Widget end-->
                    
                    <!--Footer Widget start-->
                    <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                        <h4 class="title"><span class="text">Map</span><span class="shape"></span></h4>
                        <ul>
                            <li>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3036.0562043265877!2d55.260106548973496!3d25.18636761364169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f694c700e12f9%3A0x190ce8d857467f06!2sThe%20Exchange%20Tower!5e0!3m2!1sen!2sae!4v1686595586456!5m2!1sen!2sae" 
                                width="280" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </li>
                       </ul>
                    </div>
                    <!--Footer Widget end-->    
                    
                    <!--Footer Widget start-->
                    <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                        <h4 class="title"><span class="text">Newsletter</span><span class="shape"></span></h4>
                        
                        <p>Subscribe our newsletter and get all latest news about our latest properties, promotions, offers and discount</p>
                        
                        <form id="mc-form" class="mc-form footer-newsletter" novalidate="true">
                            <input id="mc-email" type="email" autocomplete="off" placeholder="Email Here.." name="EMAIL">
                            <button id="mc-submit"><i class="fa fa-paper-plane-o"></i></button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->
                        
                    </div>
                    <!--Footer Widget end-->
                    
                </div>
            </div>
        </div>
        <!--Footer Top end-->
        
        <!--Footer bottom start-->
        <div class="footer-bottom section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright text-center">
                            <p>Copyright ©{{date('Y') }}<a href="" style="color:#d7d38d; padding-left:5px; padding-right:2px;"> fortune4realestate </a>. All rights reserved.

                            <span><a href="#" style="padding-left:5px; padding-right:2px;">Admin Login</a></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer bottom end-->
        
     </footer>

        <script src="{{ asset('build/template/js/vendor/modernizr-2.8.3.min.js') }}"></script>
        <!-- <script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script> -->
        <script src="{{ asset('build/template/js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('build/template/js/vendor/jquery-migrate-1.4.1.min.js') }}"></script>
        <script src="{{ asset('build/template/js/popper.min.js') }}"></script>
        <script src="{{ asset('build/template/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('build/template/js/plugins.js') }}"></script>
        <script src="{{ asset('build/template/js/map-place.js') }}"></script>
        <script src="{{ asset('build/template/js/main.js') }}"></script>
    </body>
</html>
