@extends('layouts.header')
@section('title', 'Employee Details')
@section('content')

<div class="feature-section feature-section-border-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
        <div class="container">
            <div class="row row-25 align-items-center">
               
             
                
                <div class="col-lg-12 col-12 order-2 order-lg-1 mb-40">
                    
                    <div class="row">
                        <div class="col">
                            <div class="about-content">
                                <h3> {{ $companyprofile->PageHeading}} </h3> 
                                <p>
                                    {!! $companyprofile->Description !!}
                                </p>
                            
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>


@endsection