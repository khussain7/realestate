@extends('layouts.header')
@section('title', 'Employee Details')
@section('content')

<div class="feature-section feature-section-border-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
        <div class="container">
            <div class="row row-25 align-items-center">
               
                <!--Feature Image start-->
                <div class="col-lg-5 col-12 order-1 order-lg-2 mb-40">
                    <div class="feature-image">
                        <img src="{{ asset('build/template/images/logo1.png') }}" alt="logo">
                    </div>
                </div>
                <!--Feature Image end-->
                
                <div class="col-lg-7 col-12 order-2 order-lg-1 mb-40">
                    
                    <div class="row">
                        <div class="col">
                            <div class="about-content">
                                <h3>Welcome to {{ $aboutus[0]->PageHeading}} </h3>
                                <p>
                                    {!! $aboutus[0]->Description !!}
                                </p>
                                <ul class="feature-list">
                                    <li>
                                    <i class="fa fa-check check"></i>
                                       <h4>Sales</h4>
                                    </li>
                                    <li> 
                                        <i class="fa fa-check check"></i>                                  
                                        <h4>Property Managment</h4>
                                    </li>
                                    <li> 
                                        <i class="fa fa-check check"></i>                                  
                                        <h4>Leasing</h4>
                                    </li>
                                    <li>
                                        <i class="fa fa-check check"></i>                                  
                                        <h4>Property Consultant</h4>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>


@endsection