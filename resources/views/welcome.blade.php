@extends('layouts.header')
@section('title', 'fortune4realestate')
@section('content')

  <!--Hero Section start-->
  <div class="hero-section section position-relative">
       
       <!--Hero Slider start-->
       <div class="hero-slider section">
       @foreach( $bannerlist as $bdata)
           <!--Hero Item start-->
           <div class="hero-item" style="background-image: url({{asset('../admin/public/files/'.$bdata->BannerImage)}})">
               <div class="container">
                   <div class="row">
                       <div class="col-12">

                           <!--Hero Content start-->
                           <div class="hero-property-content text-center">

                               <h1 class="title">
                                    {{ $bdata->Category }}
                                </h1>
                               <span class="location"><img src="assets/images/icons/hero-marker.png" alt=""> {{ $bdata->City }}</span>
                               <div class="type-wrap">
                                   <span class="type">AED</span>
                                   @php
                                        $format_number1 = number_format($bdata->Price, 2, ".", ",");
                                    @endphp

                                   <span class="price"> {{$format_number1}} <span>Total</span></span>
                               </div>
                               <ul class="property-feature">
                                   <li>
                                       <img src="{{ asset('build/template/images/icons/hero-area.png') }}" alt=""><span>{{ $bdata->Area }} SqFt</span>
                                   </li>
                                   <li>
                                       <img src="{{ asset('build/template/images/icons/hero-bed.png') }}" alt=""><span> {{ $bdata->Bedroorms }} Bed</span>
                                   </li>
                                   <li>
                                       <img src="{{ asset('build/template/images/icons/hero-bath.png') }}" alt=""><span> {{ $bdata->Bathrooms }} Bath</span>
                                   </li>
                                  
                               </ul>
                               
                               <div class="linkdetails">
                               <a href="{{ url('/propertiesview/'.$bdata->PropertyId) }}">  Details
                                        </a>
                                </div>

                             
                           </div>
                           <!--Hero Content end-->
          
                       </div>
                   </div>
               </div>
          
           </div>
           <!--Hero Item end-->

           @endforeach

       </div>
       <!--Hero Slider end-->
       
   </div>
   <!--Hero Section end-->

   <!--Search Section section start-->
   <div class="search-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Find Your Home</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
                <div class="col">
                    
                    <!--Property Search start-->
                    <div class="property-search">

                        <form action="#">

                            <div>
                                <input type="text" placeholder="Location">
                            </div>

                            <div>
                                <select class="nice-select">
                                    <option>All Cities</option>
                                    <option value="Abu Dhabi">Abu Dhabi</option>
                                    <option value="Dubai">Dubai</option>
                                    <option value="Sharjah">Sharjah</option>
                                    <option value="Umm Al Qaiwain">Umm Al Qaiwain</option>
                                    <option value="Fujairah">Fujairah</option>
                                    <option value="Ajman">Ajman</option>
                                    <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                                </select>
                            </div>

                            <div>
                                <select class="nice-select">
                                    <option>For Rent</option>
                                    <option>For Sale</option>
                                </select>
                            </div>

                            <div>
                                <select class="nice-select">
                                    <option value="Apartment">Apartment</option>
                                    <option value="Villa">Villa</option>
                                </select>
                            </div>

                            <div>
                                <select class="nice-select">
                                    <option>Bedrooms</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>

                            <div>
                                <select class="nice-select">
                                    <option>Bathrooms</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>

                            <div>
                                <button class="btn">search</button>
                            </div>

                        </form>

                    </div>
                    <!--Property Search end-->
                    
                </div>
            </div>
            
        </div>
    </div>
    <!--Search Section section end-->

      <!--New property section start-->
      <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
        <div class="container">
           
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Newly Added Property</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
                 
@foreach( $propertydetailslist as $pdata)
        @php
        echo $pdata->pimg['ImageName'];
            $english_format_number = number_format($pdata->Price, 2, ".", ",");
        @endphp
   <!--Property start-->
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                    <div class="property-inner">
                        <div class="image">
                            <a href="{{ url('/propertiesview/'.$pdata['PropertyId']) }}">
                                <img src="" class="d-block w-100 img-view"  alt="">
                            </a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="{{ asset('build/template/images/icons/area.png') }}" alt="">{{ $pdata['Area'] }} SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="{{ asset('build/template/images/icons/bed.png') }}" alt="">{{ $pdata['Bedroorms'] }}</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="{{ asset('build/template/images/icons/bath.png') }}" alt="">{{ $pdata['Bathrooms'] }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="single-properties.html">{{ $pdata['ReferanceNumber '] }}</a></h3>
                                <span class="location"><img src="{{ asset('build/template/images/icons/marker.png') }}" alt="">{{ $pdata['City'] }}</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price1">AED {{ $english_format_number }}</span>
                                    <span class="type">{{ $pdata['Purpose'] }}</span>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->
                @endforeach
            </div>
            
        </div>
    </div>
    <!--New property section end-->

 <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
           



            <div class="row row-100">
                <div id="form-div">
                    <div class="">
                        <div class="form-header">
                            <h1 style="color:#d7d38d;"> Contact Us</h1>
                            <h2 style="color:#fff;">We will get back to you asap!</h2>   
                        </div>
                    <form action="#" class="form-data">
                               <div class="row">
                                   <div class="col-md-6 col-12 mb-30"><input type="text" id="f_name" placeholder="First Name"></div>
                                   <div class="col-md-6 col-12 mb-30"><input type="text" id="l_name" placeholder="Last Name"></div>
                                   <div class="col-md-6 col-12 mb-30"><input type="email" id="l_email" placeholder="Email"></div>
                                   <div class="col-md-6 col-12 mb-30"><input type="number" id="l_contact" placeholder="Contact Number"></div>
                                   <div class="col-12 mb-30"><label for="about_me">About Me</label><textarea id="about_me"></textarea></div>

                                   
                                   <div class="col-12 mb-30"><button class="btn">Save Change</button></div>
                               </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Login & Register Section end-->

@endsection