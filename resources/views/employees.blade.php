@extends('layouts.header')
@section('title', 'Employee Details')
@section('content')

<div class="container" style="margin-top:20px;">
            
    @foreach($empList as $emp)
            <div class="row row-25">

                <!--Agent Image-->
                <div class="col-lg-5 col-12 mb-30">
                    <div class="agent-image">
                    <img src="{{ url('../admin/files/') }}/{{$emp->image}}" width="50" alt="" />
                    </div>
                </div>

                <!--Agent Content-->
                <div class="col-lg-7 col-12">
                    <div class="agent-content">
                        <h3 class="title">{{ $emp->name }}</h3>
                        <h4 class="title">{{ $emp->user_job_title }}</h4>
                        <p>
                             {{ $emp->description }}
                        </p>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-30">
                                <h4>Persoanl Info</h4>
                                <ul>
                                    <li><i class="pe-7s-map"></i>  {{ $emp->countryname }} </li>
                                    <li><i class="pe-7s-phone"></i><a href="#">
                                    {{ $emp->contact_number }}
                                    </a></li>
                                    <li><i class="pe-7s-mail-open"></i><a href="#">
                                    {{ $emp->email }} </a></li>
                                    <li><i class="pe-7s-global"></i><a href="#">www.fortune4realestate.com</a></li>
                                    <li><i class="pe-7s-photo"></i>5 Properties</li>
                                </ul>
                                <div class="social">
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <hr />
            @endforeach
        </div>

@endsection