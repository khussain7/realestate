@extends('layouts.header')
@section('title', 'Property Details')
@section('content')

@php
    $area_format_number_area = number_format($propertydetails[0]["Area"], 2, ".", ",");
    $price_format_number = number_format($propertydetails[0]["Price"], 2, ".", ",");
@endphp
@php ($i=0) @endphp
@php ($j=0) @endphp

<div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
            
                <div class="col-lg-8 col-12 order-1 order-lg-2 mb-sm-50 mb-xs-50">
                    <div class="row">

                        <!--Property start-->
                        <div class="single-property col-12 mb-50">
                            <div class="property-inner">
                               
                                <div class="head">
                                    <div class="left">
                                        <h1 class="title">{{ $propertydetails[0]["ReferanceNumber"] }}</h1>
                                        <span class="location"><img src="assets/images/icons/marker.png" alt="">
                                                {{ $propertydetails[0]["Address"]}}
                                        </span>
                                    </div>
                                    <div class="right">
                                        <div class="type-wrap">
                                            <span class="price"> AED {{ $price_format_number}} </span>
                                            <span class="type"> {{ $propertydetails[0]["Purpose"]}} </span>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="image mb-30">
                                    <div class="single-property-gallery">
                                        <div class="item"><img src="{{ asset('../admin/public/files/'.$BannerImage[0]['ImageName']) }}" alt="{{ $BannerImage[0]['ImageName'] }}"></div>
                                    @foreach($propertyImages as $pimg)
                                        <img src="{{ asset('../admin/public/files/'.$pimg['ImageName']) }}"  alt="{{ $pimg['ImageName'] }}">
                                         @php ($i++)
                                    @endforeach 
                                    </div>
                                    <div class="single-property-thumb">
                                    @foreach($propertyImages as $pimg)
                                        <div class="item">
                                        <img src="{{ asset('../admin/public/files/'.$pimg['ImageName']) }}"  alt="{{ $pimg['ImageName'] }}">
                                        </div>
										@php ($j++)
                                            @endforeach
                                    </div>
                                </div>          


 
                                
                                
                                <div class="content">
                                    
                                    <h3>Description</h3>
                                    {!! $propertydetails[0]["Description"] !!}
                                    
                                    
                                    <div class="row mt-30 mb-30">
                                        
                                        <div class="col-md-5 col-12 mb-xs-30">
                                            <h3>Condition</h3>
                                            <ul class="feature-list">
                                                <li><div class="image"><img src="{{ asset('build/template/images/icons/area.png') }}" alt="area"></div>
                                                    Area {{ $area_format_number_area }} sqft
                                                </li>
                                                <li><div class="image"><img src="{{ asset('build/template/images/icons/bed.png') }}" alt="bed"></div>
                                                    Bedroom {{  $propertydetails[0]["Bedroorms"] }}
                                                </li>
                                                <li><div class="image"><img src="{{ asset('build/template/images/icons/bath.png') }}" alt=""></div>
                                                    Bathroom {{  $propertydetails[0]["Bathrooms"] }}
                                                </li>
                                                <li><div class="image"><img src="{{ asset('build/template/images/icons/parking.png') }}" alt=""></div>
                                                    Parking {{  ($propertyAmenities[0]["ParkingSpaces"] > 0) ?  ':'. $propertyAmenities[0]["ParkingSpaces"] : ': No' }}
                                                </li>
                                                <li><div class="image"><img src="{{ asset('build/template/images/icons/area.png') }}" alt="area"></div>
                                                     Balcony Or Terrace {{  ($propertyAmenities[0]["BalconyOrTerrace"] == 1) ? 
                                                                            ': Yes' : ': No' }}
                                                </li>
                                                @if($propertyAmenities[0]["CentrallyAirConditioned"] == 1)
                                                        <li>
                                                            Centrally Air Conditioned
                                                        </li>
                                                @endif

                                                @if($propertyAmenities[0]["CentralHeating"] == 1)
                                                        <li>
                                                            Central Heating
                                                        </li>
                                                @endif

                                                @if($propertyAmenities[0]["ElectricityBackup"] == 1)
                                                        <li>
                                                            Electricity Backup
                                                        </li>
                                                @endif
                                                
                                                @if($propertyAmenities[0]["Furnished"] == 1)
                                                        <li>
                                                             Furnished
                                                        </li>
                                                @endif
                                                <!-- <li><div class="image"><img src="assets/images/icons/kitchen.png" alt=""></div>Kitchen 2</li> -->
                                            </ul>
                                        </div>
                                        
                                       
                                    </div>
                                    <div class="col-md-12 col-12">
                                            <h3>Amenities</h3>
                                            <ul class="amenities-list">
                                                @if($propertyAmenities[0]["BarbequeArea"] == 1)
                                                     <li> Barbeque Area </li>
                                                @endif
                                           
                                                @if($propertyAmenities[0]["BarbequeArea"] == 1)
                                                        <li> Day Care Center </li>
                                                @endif 

                                                @if($propertyAmenities[0]["BarbequeArea"] == 1)
                                                            <li> Kids Play Area </li>
                                                @endif 
                                            
                                                @if($propertyAmenities[0]["LawnOrGarden"] == 1)
                                                            <li> Lawn Or Garden </li>
                                                @endif 
                                             
                                                @if($propertyAmenities[0]["CafeteriaOrCanteen"] == 1)
                                                            <li> Cafeteria Or Canteen</li>
                                                @endif 
                                           
                                                @if($propertyAmenities[0]["HealthAndFitness"] == 1)
                                                            <li> Health And Fitness</li>
                                                @endif 
                                            
                                                @if($propertyAmenities[0]["GymOrHealthClub"] == 1)
                                                            <li> Gym Or Health Club</li>
                                                @endif 
                                             
                                                @if($propertyAmenities[0]["Jacuzzi"] == 1)
                                                            <li>Jacuzzi</li>
                                                @endif 
                                            
                                                @if($propertyAmenities[0]["Sauna"] == 1)
                                                            <li>Sauna</li>
                                                @endif 
                                            
                                                @if($propertyAmenities[0]["SteamRoom"] == 1)
                                                            <li>Steam Room</li>
                                                @endif 
                                                @if($propertyAmenities[0]["SwimmingPool"] == 1)
                                                            <li>Swimming Pool</li>
                                                @endif 
                                                @if($propertyAmenities[0]["FacilitiesForDisabled"] == 1)
                                                            <li>Facilities For Disabled</li>
                                                @endif 

                                                @if($propertyAmenities[0]["LaundryRoom"] == 1)
                                                            <li>Laundry Room</li>
                                                @endif 

                                                @if($propertyAmenities[0]["LaundryFacility"] == 1)
                                                            <li>Laundry Facility</li>
                                                @endif 

                                                @if($propertyAmenities[0]["SharedKitchen"] == 1)
                                                            <li>Shared Kitchen</li>
                                                @endif 

                                                @if($propertyAmenities[0]["CompletionYear"] > 1)
                                                    <li> $propertyAmenities[0]["CompletionYear"] </li>
                                                @endif 

                                                @if($propertyAmenities[0]["BalconyOrTerrace"] > 1)
                                                    <li> $propertyAmenities[0]["BalconyOrTerrace"] </li>
                                                @endif 

                                                @if($propertyAmenities[0]["LobbyInBuilding"] > 1)
                                                    <li> $propertyAmenities[0]["LobbyInBuilding"] </li>
                                                @endif 

                                                @if($propertyAmenities[0]["Flooring"] != null)
                                                    <li> {{ $propertyAmenities[0]["Flooring"]  }}</li>
                                                @endif 

                                                @if($propertyAmenities[0]["ElevatorsInBuilding"] != null)
                                                    <li> Elevators In Building :  $propertyAmenities[0]["ElevatorsInBuilding"] </li>
                                                @endif

                                                
                                                @if($propertyAmenities[0]["PrayerRoom"] == 1)
                                                    <li> Prayer Room </li>
                                                @endif

                                                @if($propertyAmenities[0]["ReceptionOrWaitingRoom"] == 1)
                                                    <li> Reception Or Waiting Room </li>
                                                @endif

                                                @if($propertyAmenities[0]["BusinessCenter"] == 1)
                                                    <li> Business Center </li>
                                                @endif

                                                @if($propertyAmenities[0]["SecurityStaff"] > 0)
                                                    <li> Number Of Security Staff : {{ $propertyAmenities[0]["SecurityStaff"]}}  </li>
                                                @endif

                                                @if($propertyAmenities[0]["CCTVSecurity"] == 1)
                                                    <li>  CCTV Security </li>
                                                @endif

                                                @if($propertyAmenities[0]["View"] != null)
                                                    <li>   {{  ($propertyAmenities[0]["View"]) }}  </li>
                                                @endif

                                                @if($propertyAmenities[0]["Floor"] != null)
                                                    <li> Number of Floors   {{  ($propertyAmenities[0]["Floor"]) }}  </li>
                                                @endif

                                                @if($propertyAmenities[0]["OtherMainFeatures"] != null)
                                                    <li>  Other Main Features  {{  ($propertyAmenities[0]["OtherMainFeatures"]) }}  </li>
                                                @endif
                                               
                                                @if($propertyAmenities[0]["Freehold"] == 1)
                                                    <li>  Free Hold  </li>
                                                @endif

                                                @if($propertyAmenities[0]["PetPolicy"] != null)
                                                    <li>  Pet Policy  {{  ($propertyAmenities[0]["PetPolicy"]) }}  </li>
                                                @endif

                                                @if($propertyAmenities[0]["ATMFacility"] == 1)
                                                    <li>  ATM Facility  </li>
                                                @endif

                                                @if($propertyAmenities[0]["LandArea"] != null)
                                                    <li>  Land Area  {{  ($propertyAmenities[0]["LandArea"]) }} </li>
                                                @endif

                                                @if($propertyAmenities[0]["NumberOfBedrooms"] != null)
                                                    <li> Maid Bed Room :   {{  ($propertyAmenities[0]["NumberOfBedrooms"]) }} </li>
                                                @endif

                                                @if($propertyAmenities[0]["NearbySchools"] != null)
                                                    <li> Near by Schools:   {{  ($propertyAmenities[0]["NearbySchools"]) }} </li>
                                                @endif
                                            
                                                @if($propertyAmenities[0]["NumberOfBathrooms"] != null)
                                                    <li> Maid Bath Room :   {{  ($propertyAmenities[0]["NumberOfBathrooms"]) }} </li>
                                                @endif

                                                @if($propertyAmenities[0]["NearbyHospitals"] != null)
                                                    <li> Near by Hospitals :   {{  ($propertyAmenities[0]["NearbyHospitals"]) }} </li>
                                                @endif

                                                @if($propertyAmenities[0]["NearbyShoppingMalls"] != null)
                                                    <li> Near by Shopping Malls :   {{  ($propertyAmenities[0]["NearbyShoppingMalls"]) }} </li>
                                                @endif

                                                @if($propertyAmenities[0]["NearbyPublicTransport"] != null)
                                                    <li> Near by Public Transport :   {{  ($propertyAmenities[0]["NearbyPublicTransport"]) }} </li>
                                                @endif
                                                
                                                @if($propertyAmenities[0]["DistanceFromAirport"] != null)
                                                    <li> Distance From Airport :   {{  ($propertyAmenities[0]["DistanceFromAirport"]) }} </li>
                                                @endif

                                                @if($propertyAmenities[0]["BroadbandInternet"] == 1)
                                                    <li>   Broadband Internet </li>
                                                @endif

                                                @if($propertyAmenities[0]["SatelliteCableTV"] == 1)
                                                    <li>   Satellite CableTV </li>
                                                @endif

                                                @if($propertyAmenities[0]["Intercom"] == 1)
                                                    <li>   Intercom </li>
                                                @endif

                                                @if($propertyAmenities[0]["DoubleGlazedWindows"] == 1)
                                                    <li>   Double Glazed Windows </li>
                                                @endif

                                                @if($propertyAmenities[0]["StudyRoom"] == 1)
                                                    <li>   Study Room </li>
                                                @endif

                                                @if($propertyAmenities[0]["WasteDisposal"] == 1)
                                                    <li>   Waste Disposal </li>
                                                @endif

                                                
                                                @if($propertyAmenities[0]["CleaningServices"] == 1)
                                                    <li>   Cleaning Services </li>
                                                @endif

                                                @if($propertyAmenities[0]["MaintenanceStaff"] > 0)
                                                    <li>   Maintenance Staff : $propertyAmenities[0]["MaintenanceStaff"]</li>
                                                @endif
                                            </ul>
                                        </div>
                                        
                                </div>
                            </div>
                        </div>
                        <!--Property end-->
                        
                       
                    </div>
                </div>
                
                <div class="col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15">
                    
                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Contact Person</span><span class="shape"></span></h4>
                        
                    
                        <!--Property Search start-->
                        <div class="property-search sidebar-property-search">
                        <div class="col-lg-5 col-12 mb-30">
                            <div class="agent-image">
                            <img src="{{ url('../admin/files/') }}/{{  $EmployeeProfile[0]['image'] }}" width="50" alt="" />
                            </div>
                        </div>
                        <div class="agent-content">
                        <h3 class="title">{{ $EmployeeProfile[0]['name'] }}</h3>
                        <h4 class="title">{{ $EmployeeProfile[0]['user_job_title'] }}</h4>
                        <p>
                             {{  $EmployeeProfile[0]['description'] }}
                        </p>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-30">
                                <h4>Persoanl Info</h4>
                                <ul>
                                    <li><i class="pe-7s-phone"></i><a href="#">
                                    {{  $EmployeeProfile[0]['contact_number'] }}
                                    </a></li>
                                    <li><i class="pe-7s-mail-open"></i><a href="#">
                                    {{  $EmployeeProfile[0]['email'] }} </a></li>
                                    <li><i class="pe-7s-global"></i><a href="www.fortune4realestate.com">www.fortune4realestate.com</a></li>
                                      <li><i class="pe-7s-global"></i><a href="#">All Properties</a>
                                    </li>
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
                        <!--Property Search end-->
                        
                    </div>
                    <!--Sidebar end-->
                   
                   
                  
                </div>
                
            </div>
        </div>
    </div>
@endsection