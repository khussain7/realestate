@extends('layouts.header')
@section('title', 'Property Details')
@section('content')

 <!--New property section start-->
    <div class="property-section section pt-100 pt-lg-100 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
            
                <div class="col-lg-12 col-12 order-1 order-lg-2 mb-sm-50 mb-xs-50">
                    <div class="row">
                    @php
                        $imgname = explode(',', $propertydetails[0]["Attachments"]);
                        $english_format_number_area = number_format($propertydetails[0]["Area"], 2, ".", ",");
                        $english_format_number = number_format($propertydetails[0]["Price"], 2, ".", ",");
                    @endphp
                        <!--Property start-->
                        <div class="single-property col-12 mb-50">
                            <div class="property-inner">
                               
                                <div class="head">
                                    <div class="left">
                                        <h1 class="title"> {{ $propertydetails[0]["PropertyName"]  }}</h1>
                                        <span class="location">
                                            {{ $propertydetails[0]["MainSubCategory"]  }}
                                        </span>
                                        <span>
                                        Reference Number {{ $propertydetails[0]["ReferanceNumber"]  }}
                                        </span>
                                    </div>
                                    <div class="right">
                                        <div class="type-wrap">
                                            <span class="price">{{$english_format_number}}</span>
                                            <span class="type">{{ $propertydetails[0]["Category"]  }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="image mb-30">
                                    <div class="single-property-gallery">
                                    @foreach( $imgname as $img)
                                        <div class="item">
                                            <img src="{{asset('../admin/public/files/'.$img)}}"  alt="{{$img}}">
                                        </div>
                                    @endforeach
                                    </div>
                                    <div class="single-property-thumb">
                                    @foreach( $imgname as $img)
                                        <div class="item">
                                            <img src="{{asset('../admin/public/files/'.$img)}}"  alt="{{$img}}">
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                
                                <div class="content">
                                    
                                    <h3>Description</h3>
                                    
                                    <p>Khonike - Real Estate Bootstrap 5 Templateipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo.</p>
                                    <p>Khonike - Real Estate Bootstrap 5 Templateis the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore gna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor nt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu.</p>
                                    <p>Khonike - Real Estate Bootstrap 5 Templateis the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore gna iqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                    
                                    <div class="row mt-30 mb-30">
                                        
                                        <div class="col-md-5 col-12 mb-xs-30">
                                            <h3>Condition</h3> 
                                            <ul class="feature-list">
                                                <li><div class="image"><img src="{{ asset('build/template/images/icons/area.png') }}" alt="Area"></div>Area  {{ $english_format_number_area }} sqft</li>
                                                <li><div class="image"><img src= "{{ asset('build/template/images/icons/bed.png') }}" alt="Beds"></div>Bedroom {{ $propertydetails[0]["Beds"] }}</li>
                                                <li><div class="image"><img src="{{ asset('build/template/images/icons/bath.png') }}" alt="Bath"></div>Bathroom {{$propertydetails[0]["Bath"]}}</li>
                                                <li><div class="image"><img src="{{ asset('build/template/images/icons/parking.png') }}" alt="Parking"></div>Parking {{ ucfirst($propertydetails[0]["Parking"]) }} </li>
                                                <!-- <li><div class="image"><img src="{{ asset('build/template/images/icons/kitchen.png') }}" alt="Kitchen"></div>Kitchen </li> -->
                                            </ul>
                                        </div>
                                        
                                        <div class="col-md-7 col-12">
                                            <h3>Amenities</h3>
                                            <ul class="amenities-list">
                                                <li>Air Conditioning</li>
                                                <li>Bedding</li>
                                                <li>Balcony</li>
                                                <li>Cable TV</li>
                                                <li>Internet</li>
                                                <li>Parking</li>
                                                <li>Lift</li>
                                                <li>Pool</li>
                                                <li>Dishwasher</li>
                                                <li>Toaster</li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    
                                  
                                    
                                </div>
                            </div>
                        </div>
                        <!--Property end-->
                        
                        

                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!--New property section end-->

    @endsection