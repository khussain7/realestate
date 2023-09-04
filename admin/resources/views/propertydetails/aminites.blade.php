@extends('layouts.header')
@section('title', 'Add Amenities')
@section('content')
@php
  $setvalue = 0; $setcheck = '';
@endphp
<style>
    body {
        line-height: unset;
}
</style>
 <!--Login & Register Section start-->
 <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row">
                <ul class="add-property-tab-list nav mb-50">
                            <li><a href="#PropertyDetailsDiv" data-bs-toggle="tab">1. Property Details</a></li>
                            <li class="working"><a href="#AmenitiesDiv" data-bs-toggle="tab">2. Amenities</a></li>
                            <li><a href="#UploadsDiv" data-bs-toggle="tab">3. Uploads</a></li>
                </ul>
            </div>
        <div id="PropertyDetailsDiv">
            <div class="row row-100">
                <div class="col">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                    @endif
                </div>
            </div>
                <div class="row row-100">
                    <div id="form-div">
                        <div class="">

              <form id="postaction" method="POST" action="{{ url('/propertyr/actionpage') }}" enctype="multipart/form-data" class="form-inline">
                  @csrf
                    <input type="hidden" id="PropertyId" name="PropertyId" value="{{$id}}" />
                    <input type="hidden" id="ActionTaken" name="ActionTaken" value="view" />
              </form>
                            
            <form method="POST" action="{{ url('/propertyr/amenities') }}" enctype="multipart/form-data" class="form-inline">
               @csrf
               <div class="row">
                <div class="col-sm-12 col-support-3">
                  @if($insertorupdate == "update")
                     <h4>
                        <input type="checkbox" class="form-check-input" id="CheckUpdate" onclick="setcheckbox2('CheckUpdate')" name="CheckUpdate" value="0" 
                                 {{ old('CheckUpdate') == '1' ? 'checked="checked"' : '' }} />
                        <label for="" class="form-labelcheckbox">
                                 Click on check-box to activate update button!
                        </label>
                     </h4>
                  @endif
                
                </div>
              </div> 

            <div class="row g-3"> 
            <div class="col-sm-3 col-support-3">
              <input type="hidden" id="PropertyId" name="PropertyId" value="{{$id}}" />
                  <input type="hidden" id="insertorupdate" name="insertorupdate" value="{{$insertorupdate}}" />
            @if ($errors->has('PropertyId'))
                <span class="text-danger">{{  $errors->first('PropertyId') }}</span>
            @endif
              @php  
              if($insertorupdate == "insert")
               { 
                  if(old('BarbequeArea') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} else {$setvalue = 0; $setcheck = '';}
               }
               else
               {
                  if($propertyamenities->BarbequeArea == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
                  else if(old('BarbequeArea') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;} 
                  else {$setvalue = 0; $setcheck = '';}
               }
              @endphp
              <input type="checkbox" class="form-check-input" id="BarbequeArea" onclick="setcheckbox('BarbequeArea')" name="BarbequeArea" value="{{$setvalue}}"  {{$setcheck}} />
              <label for="BarbequeAreaFor" class="form-labelcheckbox">Barbeque Area</label>
            </div>
           
            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('DayCareCenter') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->DayCareCenter == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('DayCareCenter') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="DayCareCenter" name="DayCareCenter" onclick="setcheckbox('DayCareCenter')"  value="{{$setvalue}}"  {{$setcheck}}/>  
            <label for="DayCareCenterFor" class="form-labelcheckbox">Day Care Center</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('KidsPlayAreaFor') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->KidsPlayAreaFor == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('KidsPlayAreaFor') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="KidsPlayArea" name="KidsPlayArea" onclick="setcheckbox('KidsPlayArea')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="KidsPlayAreaFor" class="form-labelcheckbox">Kids Play Area</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('LawnOrGardenFor') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->LawnOrGarden == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('LawnOrGarden') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="LawnOrGarden" name="LawnOrGarden" onclick="setcheckbox('LawnOrGarden')" value="0" value="{{$setvalue}}"  {{$setcheck}}  />  
            <label for="LawnOrGardenFor" class="form-labelcheckbox">Lawn Or Garden</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('CafeteriaOrCanteen') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->CafeteriaOrCanteen == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('CafeteriaOrCanteen') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="CafeteriaOrCanteen" name="CafeteriaOrCanteen" onclick="setcheckbox('CafeteriaOrCanteen')" value="{{$setvalue}}"  {{$setcheck}}  />  
            <label for="CafeteriaOrCanteenFor" class="form-labelcheckbox">Cafeteria Or Canteen</label>
            </div>

            
            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('GymOrHealthClub') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->GymOrHealthClub == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('GymOrHealthClub') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="GymOrHealthClub" name="GymOrHealthClub" onclick="setcheckbox('GymOrHealthClub')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="GymOrHealthClubFor" class="form-labelcheckbox">Gym Or HealthClub</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('JacuzziFor') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->JacuzziFor == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('JacuzziFor') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="Jacuzzi" name="Jacuzzi" onclick="setcheckbox('Jacuzzi')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="JacuzziFor" class="form-labelcheckbox">Jacuzzi</label>
            </div>
            
            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('JacuzziFor') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->JacuzziFor == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('JacuzziFor') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="Sauna" name="Sauna" onclick="setcheckbox('Sauna')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="SaunaFor" class="form-labelcheckbox">Sauna</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('SteamRoom') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->SteamRoom == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('SteamRoom') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="SteamRoom" name="SteamRoom" onclick="setcheckbox('SteamRoom')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="SteamRoomFor" class="form-labelcheckbox">Steam Room</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('SwimmingPool') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->SwimmingPool == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('SwimmingPool') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="SwimmingPool" name="SwimmingPool" onclick="setcheckbox('SwimmingPool')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="SwimmingPoolFor" class="form-labelcheckbox">Swimming Pool</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('FacilitiesForDisabled') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->FacilitiesForDisabled == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('FacilitiesForDisabled') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="FacilitiesForDisabled" name="FacilitiesForDisabled" onclick="setcheckbox('FacilitiesForDisabled')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="FacilitiesForDisabledFor" class="form-labelcheckbox">Facilities For Disabled</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('LaundryRoom') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->LaundryRoom == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('LaundryRoom') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="LaundryRoom" name="LaundryRoom" onclick="setcheckbox('LaundryRoom')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="LaundryRoomFor" class="form-labelcheckbox">Laundry Room</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('LaundryFacility') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->LaundryFacility == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('LaundryFacility') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="LaundryFacility" name="LaundryFacility" onclick="setcheckbox('LaundryFacility')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="LaundryFacilityFor" class="form-labelcheckbox">Laundry Facility</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('SharedKitchen') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->SharedKitchen == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('SharedKitchen') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="SharedKitchen" name="SharedKitchen" onclick="setcheckbox('SharedKitchen')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="SharedKitchenFor" class="form-labelcheckbox">Shared Kitchen</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('BalconyOrTerrace') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->BalconyOrTerrace == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('BalconyOrTerrace') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="BalconyOrTerrace" name="BalconyOrTerrace" onclick="setcheckbox('BalconyOrTerrace')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="BalconyOrTerraceFor" class="form-labelcheckbox">Balcony Or Terrace</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('LobbyInBuilding') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->LobbyInBuilding == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('LobbyInBuilding') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="LobbyInBuilding" name="LobbyInBuilding" onclick="setcheckbox('LobbyInBuilding')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="LobbyInBuildingFor" class="form-labelcheckbox">Lobby In Building</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('PrayerRoom') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->PrayerRoom == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('PrayerRoom') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="PrayerRoom" name="PrayerRoom" onclick="setcheckbox('PrayerRoom')"value="{{$setvalue}}"  {{$setcheck}}/>  
            <label for="PrayerRoomFor" class="form-labelcheckbox">Prayer Room</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('ReceptionOrWaitingRoom') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->ReceptionOrWaitingRoom == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('ReceptionOrWaitingRoom') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="ReceptionOrWaitingRoom" name="ReceptionOrWaitingRoom" onclick="setcheckbox('ReceptionOrWaitingRoom')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="ReceptionOrWaitingRoomFor" class="form-labelcheckbox">Reception Or Waiting Room</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('BusinessCenter') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->BusinessCenter == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('BusinessCenter') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="BusinessCenter" name="BusinessCenter" onclick="setcheckbox('BusinessCenter')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="BusinessCenterFor" class="form-labelcheckbox">Business Center</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('CCTVSecurity') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->CCTVSecurity == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('CCTVSecurity') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="CCTVSecurity" name="CCTVSecurity" onclick="setcheckbox('CCTVSecurity')" value="0" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="CCTVSecurityFor" class="form-labelcheckbox">CCTV Security</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('ATMFacility') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->ATMFacility == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('ATMFacility') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="ATMFacility" name="ATMFacility" onclick="setcheckbox('ATMFacility')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="ATMFacilityFor" class="form-labelcheckbox">ATM Facility</label>
            </div>

            
            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('Freehold') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->Freehold == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('Freehold') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="Freehold" name="Freehold" onclick="setcheckbox('Freehold')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="FreeholdFor" class="form-labelcheckbox">Freehold</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('BroadbandInternet') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->BroadbandInternet == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('BroadbandInternet') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="BroadbandInternet" name="BroadbandInternet" onclick="setcheckbox('BroadbandInternet')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="BroadbandInternetFor" class="form-labelcheckbox">Broadband Internet</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('SatelliteCableTV') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->SatelliteCableTV == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('SatelliteCableTV') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="SatelliteCableTV" name="SatelliteCableTV" onclick="setcheckbox('SatelliteCableTV')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="SatelliteCableTVFor" class="form-labelcheckbox">Satellite Cable TV</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('Intercom') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->Intercom == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('Intercom') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="Intercom" name="Intercom" onclick="setcheckbox('Intercom')"value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="IntercomFor" class="form-labelcheckbox">Intercom</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('DoubleGlazedWindows') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->DoubleGlazedWindows == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('DoubleGlazedWindows') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="DoubleGlazedWindows" name="DoubleGlazedWindows" onclick="setcheckbox('DoubleGlazedWindows')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="DoubleGlazedWindowsFor" class="form-labelcheckbox">Double Glazed Windows</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('CentrallyAirConditioned') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->CentrallyAirConditioned == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('CentrallyAirConditioned') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="CentrallyAirConditioned" name="CentrallyAirConditioned" onclick="setcheckbox('CentrallyAirConditioned')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="CentrallyAirConditionedFor" class="form-labelcheckbox">Centrally Air Conditioned</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('CentralHeating') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->CentralHeating == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('CentralHeating') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="CentralHeating" name="CentralHeating" onclick="setcheckbox('CentralHeating')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="CentralHeatingFor" class="form-labelcheckbox">Central Heating</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('StudyRoom') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->StudyRoom == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('StudyRoom') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="StudyRoom" name="StudyRoom" onclick="setcheckbox('StudyRoom')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="StudyRoomFor" class="form-labelcheckbox">Study Room</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('WasteDisposal') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->WasteDisposal == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('WasteDisposal') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="WasteDisposal" name="WasteDisposal" onclick="setcheckbox('WasteDisposal')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="WasteDisposalFor" class="form-labelcheckbox">Waste Disposal</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
              if($insertorupdate == "insert")
               { 
                  if(old('CleaningServices') == '1') {$setvalue = 1; $setcheck = 'checked=checked';} 
               }
               else
               {
                  if($propertyamenities->CleaningServices == '1') {$setvalue = 1; $setcheck = 'checked=checked';}
                  else if(old('CleaningServices') == '1') { $setcheck = 'checked=checked'; $setvalue = 1;}
                  else {$setvalue = 0; $setcheck = '';}
               }
            @endphp
            <input type="checkbox" class="form-check-input" id="CleaningServices" name="CleaningServices" onclick="setcheckbox('CleaningServices')" value="{{$setvalue}}"  {{$setcheck}} />  
            <label for="CleaningServicesFor" class="form-labelcheckbox">Cleaning Services</label>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('View') != null) {$setvalue = old('View');} 
               }
               else
               {
                  if($propertyamenities->View != null) {$setvalue = $propertyamenities->View; }
                  else if(old('View') != null) {$setvalue = old('View');}
               }
            @endphp
            <label for="ViewFor" class="form-label">View</label>
            <input type="text" id="View" class="form-control" name="View" value="{{$setvalue}}"/>
            </div>
            
            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('CompletionYear') != null) {$setvalue = old('CompletionYear');} 
               }
               else
               {
                  if($propertyamenities->CompletionYear != null) {$setvalue = $propertyamenities->CompletionYear; }
                  else if(old('CompletionYear') != null) {$setvalue = old('CompletionYear');}
               }
            @endphp
            <label for="CompletionYearFor" class="form-label">Completion Year</label>
            <input type="text" id="CompletionYear" class="form-control" name="CompletionYear" value="{{$setvalue}}"/>
            </div>
            
            <div class="col-sm-3 col-support-3">
            <label for="FloorFor" class="form-label">Flooring</label>
            <select class="form-select Flooring" id="Flooring"  name="Flooring" >
                <option value="Others" {{ old('Flooring') == 'Others' ? 'selected="selected"' : '' }}>Others</option>
                <option value="Tiles" {{ old('Flooring') == 'Tiles' ? 'selected="selected"' : '' }}>Tiles</option>
                <option value="Marble" {{ old('Flooring') == 'Marble' ? 'selected="selected"' : '' }}>Marble</option>
                <option value="Wooden" {{ old('Flooring') == 'Wooden' ? 'selected="selected"' : '' }}>Wooden</option>
              </select>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('Floor') != null) {$setvalue = old('Floor');} 
               }
               else
               {
                  if($propertyamenities->Floor != null) {$setvalue = $propertyamenities->Floor; }
                  else if(old('Floor') != null) {$setvalue = old('Floor');}
               }
            @endphp
            <label for="FloorFor" class="form-label">Number of Floors</label>
            <input type="number" id="Floor" class="form-control" name="Floor" value="{{$setvalue}}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('ElevatorsInBuildingFor') != null) {$setvalue = old('ElevatorsInBuildingFor');} 
               }
               else
               {
                  if($propertyamenities->ElevatorsInBuildingFor != null) {$setvalue = $propertyamenities->ElevatorsInBuildingFor; }
                  else if(old('ElevatorsInBuildingFor') != null) {$setvalue = old('ElevatorsInBuildingFor');}
               }
            @endphp
            <label for="ElevatorsInBuildingFor" class="form-label">Number Of Elevators in a Building</label>
            <input type="number" id="ElevatorsInBuilding" class="form-control" name="ElevatorsInBuilding" value="{{$setvalue}}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('ElevatorsInBuildingFor') != null) {$setvalue = old('ElevatorsInBuildingFor');} 
               }
               else
               {
                  if($propertyamenities->ElevatorsInBuildingFor != null) {$setvalue = $propertyamenities->ElevatorsInBuildingFor; }
                  else if(old('ElevatorsInBuildingFor') != null) {$setvalue = old('ElevatorsInBuildingFor');}
               }
            @endphp
            <label for="SecurityStaffFor" class="form-label">Number Of Security Staff</label>
            <input type="number" id="SecurityStaff" class="form-control" name="SecurityStaff" value="{{$setvalue}}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('OtherMainFeatures') != null) {$setvalue = old('OtherMainFeatures');} 
               }
               else
               {
                  if($propertyamenities->OtherMainFeatures != null) {$setvalue = $propertyamenities->OtherMainFeatures; }
                  else if(old('OtherMainFeatures') != null) {$setvalue = old('OtherMainFeatures');}
               }
            @endphp
            <label for="OtherMainFeaturesFor" class="form-label">Other Main Features</label>
            <input type="number" id="OtherMainFeatures" class="form-control" name="OtherMainFeatures" value="{{$setvalue}}"/>
            </div>



            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('PetPolicy') != null) {$setvalue = old('PetPolicy');} 
               }
               else
               {
                  if($propertyamenities->PetPolicy != null) {$setvalue = $propertyamenities->PetPolicy; }
                  else if(old('PetPolicy') != null) {$setvalue = old('PetPolicy');}
               }
            @endphp
            <label for="PetPolicyFor" class="form-label">PetPolicy</label>
            <input type="text" id="PetPolicy" class="form-control" name="PetPolicy" value="{{$setvalue}}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('LandArea') != null) {$setvalue = old('LandArea');} 
               }
               else
               {
                  if($propertyamenities->LandArea != null) {$setvalue = $propertyamenities->LandArea; }
                  else if(old('LandArea') != null) {$setvalue = old('LandArea');}
               }
            @endphp
            <label for="LandAreaFor" class="form-label">Land Area</label>
            <input type="number" id="LandArea" class="form-control" name="LandArea" value="{{$setvalue}}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('NearbySchools') != null) {$setvalue = old('NearbySchools');} 
               }
               else
               {
                  if($propertyamenities->NearbySchools != null) {$setvalue = $propertyamenities->NearbySchools; }
                  else if(old('NearbySchools') != null) {$setvalue = old('NearbySchools');}
               }
            @endphp
            <label for="NearbySchoolsFor" class="form-label">Near By Schools</label>
            <input type="text" id="NearbySchools" class="form-control" name="NearbySchools" value="{{$setvalue}}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('NearbyHospitals') != null) {$setvalue = old('NearbyHospitals');} 
               }
               else
               {
                  if($propertyamenities->NearbyHospitals != null) {$setvalue = $propertyamenities->NearbyHospitals; }
                  else if(old('NearbyHospitals') != null) {$setvalue = old('NearbyHospitals');}
               }
            @endphp
            <label for="NearbyHospitalsFor" class="form-label">Near By Hospitals</label>
            <input type="text" id="NearbyHospitals" class="form-control" name="NearbyHospitals" value="{{$setvalue}}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('NearbyShoppingMalls') != null) {$setvalue = old('NearbyShoppingMalls');} 
               }
               else
               {
                  if($propertyamenities->NearbyShoppingMalls != null) {$setvalue = $propertyamenities->NearbyShoppingMalls; }
                  else if(old('NearbyShoppingMalls') != null) {$setvalue = old('NearbyShoppingMalls');}
               }
            @endphp
            <label for="NearbyShoppingMallsFor" class="form-label">Near By Shopping Malls</label>
            <input type="text" id="NearbyShoppingMalls" class="form-control" name="NearbyShoppingMalls" value="{{$setvalue}}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('DistanceFromAirportFor') != null) {$setvalue = old('DistanceFromAirportFor');} 
               }
               else
               {
                  if($propertyamenities->DistanceFromAirportFor != null) {$setvalue = $propertyamenities->DistanceFromAirportFor; }
                  else if(old('DistanceFromAirportFor') != null) {$setvalue = old('DistanceFromAirportFor');}
               }
            @endphp
            <label for="DistanceFromAirportFor" class="form-label">Distance From Airport</label>
            <input type="number" id="DistanceFromAirportFor" class="form-control" name="DistanceFromAirportFor" value="{{$setvalue}}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('NearbyPublicTransport') != null) {$setvalue = old('NearbyPublicTransport');} 
               }
               else
               {
                  if($propertyamenities->NearbyPublicTransport != null) {$setvalue = $propertyamenities->NearbyPublicTransport; }
                  else if(old('NearbyPublicTransport') != null) {$setvalue = old('NearbyPublicTransport');}
               }
            @endphp
            <label for="NearbyPublicTransportFor" class="form-label">Distance From Public Transport</label>
            <input type="number" id="NearbyPublicTransport" class="form-control" name="NearbyPublicTransport" value="{{$setvalue}}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('OtherNearbyPlaces') != null) {$setvalue = old('OtherNearbyPlaces');} 
               }
               else
               {
                  if($propertyamenities->OtherNearbyPlaces != null) {$setvalue = $propertyamenities->OtherNearbyPlaces; }
                  else if(old('OtherNearbyPlaces') != null) {$setvalue = old('OtherNearbyPlaces');}
               }
            @endphp
            <label for="OtherNearbyPlacesFor" class="form-label">Other Nearby Places</label>
            <input type="text" id="OtherNearbyPlaces" class="form-control" name="OtherNearbyPlaces" value="{{$setvalue}}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            @php  
               $setvalue = "";
              if($insertorupdate == "insert")
               { 
                  if(old('Features') != null) {$setvalue = old('Features');} 
               }
               else
               {
                  if($propertyamenities->Features != null) {$setvalue = $propertyamenities->Features; }
                  else if(old('Features') != null) {$setvalue = old('Features');}
               }
            @endphp
            <label for="FeaturesFor" class="form-label">Other Features</label>
            <input type="text" id="Features" class="form-control" name="Features" value="{{$setvalue}}"/>
            </div>
            
            <div class="col-sm-3 col-support-3">
              <label for="NumberOfBedroomsFor" class="form-label">Maid Rooms</label>
              <select class="form-select NumberOfBedrooms" id="NumberOfBedrooms"  name="NumberOfBedrooms">
                <option value="0" {{ old('Bathrooms') == '0' ? 'selected="selected"' : '' }}>0</option>
                <option value="1" {{ old('Bathrooms') == '1' ? 'selected="selected"' : '' }}>1</option>
                <option value="2" {{ old('Bathrooms') == '2' ? 'selected="selected"' : '' }}>2</option>
                <option value="3" {{ old('Bathrooms') == '3' ? 'selected="selected"' : '' }}>3</option>
                <option value="4" {{ old('Bathrooms') == '4' ? 'selected="selected"' : '' }}>4</option>
                <option value="5" {{ old('Bathrooms') == '5' ? 'selected="selected"' : '' }}>5</option>
                <option value="6" {{ old('Bathrooms') == '6' ? 'selected="selected"' : '' }}>6</option>
                <option value="7" {{ old('Bathrooms') == '7' ? 'selected="selected"' : '' }}>7</option>
                <option value="8" {{ old('Bathrooms') == '8' ? 'selected="selected"' : '' }}>8</option>
                <option value="9" {{ old('Bathrooms') == '9' ? 'selected="selected"' : '' }}>9</option>
                <option value="10+" {{ old('Bathrooms') == '10+' ? 'selected="selected"' : '' }}>10+</option>
              </select>
            </div>

            <div class="col-sm-3 col-support-3">
              <label for="NumberOfBathrooms" class="form-label">Maid Bathrooms</label>
              <select class="form-select NumberOfBathrooms" id="NumberOfBathrooms"  name="NumberOfBathrooms">
                <option value="0" {{ old('Bathrooms') == '0' ? 'selected="selected"' : '' }}>0</option>
                <option value="1" {{ old('Bathrooms') == '1' ? 'selected="selected"' : '' }}>1</option>
                <option value="2" {{ old('Bathrooms') == '2' ? 'selected="selected"' : '' }}>2</option>
                <option value="3" {{ old('Bathrooms') == '3' ? 'selected="selected"' : '' }}>3</option>
                <option value="4" {{ old('Bathrooms') == '4' ? 'selected="selected"' : '' }}>4</option>
                <option value="5" {{ old('Bathrooms') == '5' ? 'selected="selected"' : '' }}>5</option>
                <option value="6" {{ old('Bathrooms') == '6' ? 'selected="selected"' : '' }}>6</option>
                <option value="7" {{ old('Bathrooms') == '7' ? 'selected="selected"' : '' }}>7</option>
                <option value="8" {{ old('Bathrooms') == '8' ? 'selected="selected"' : '' }}>8</option>
                <option value="9" {{ old('Bathrooms') == '9' ? 'selected="selected"' : '' }}>9</option>
                <option value="10+" {{ old('Bathrooms') == '10+' ? 'selected="selected"' : '' }}>10+</option>
              </select>
            </div>

            <div class="col-sm-3 col-support-3">
              <label for="MaintenanceStaff" class="form-label">Maintenance Staff</label>
              <select class="form-select MaintenanceStaff" id="MaintenanceStaff"  name="MaintenanceStaff">
                <option value="0" {{ old('MaintenanceStaff') == '0' ? 'selected="selected"' : '' }}>0</option>
                <option value="1" {{ old('MaintenanceStaff') == '1' ? 'selected="selected"' : '' }}>1</option>
                <option value="2" {{ old('MaintenanceStaff') == '2' ? 'selected="selected"' : '' }}>2</option>
                <option value="3" {{ old('MaintenanceStaff') == '3' ? 'selected="selected"' : '' }}>3</option>
                <option value="4" {{ old('MaintenanceStaff') == '4' ? 'selected="selected"' : '' }}>4</option>
                <option value="5" {{ old('MaintenanceStaff') == '5' ? 'selected="selected"' : '' }}>5</option>
                <option value="6" {{ old('MaintenanceStaff') == '6' ? 'selected="selected"' : '' }}>6</option>
                <option value="7" {{ old('MaintenanceStaff') == '7' ? 'selected="selected"' : '' }}>7</option>
                <option value="8" {{ old('MaintenanceStaff') == '8' ? 'selected="selected"' : '' }}>8</option>
                <option value="9" {{ old('MaintenanceStaff') == '9' ? 'selected="selected"' : '' }}>9</option>
                <option value="10+" {{ old('MaintenanceStaff') == '10+' ? 'selected="selected"' : '' }}>10+</option>
              </select>
            </div>

            <div class="col-sm-3 col-support-3">
              <label for="ParkingSpaces" class="form-label">Parking Spaces</label>
              <select class="form-select ParkingSpaces" id="ParkingSpaces"  name="ParkingSpaces">
                <option value="0" {{ old('ParkingSpaces') == '0' ? 'selected="selected"' : '' }}>0</option>
                <option value="1" {{ old('ParkingSpaces') == '1' ? 'selected="selected"' : '' }}>1</option>
                <option value="2" {{ old('ParkingSpaces') == '2' ? 'selected="selected"' : '' }}>2</option>
                <option value="3" {{ old('ParkingSpaces') == '3' ? 'selected="selected"' : '' }}>3</option>
                <option value="4" {{ old('ParkingSpaces') == '4' ? 'selected="selected"' : '' }}>4</option>
                <option value="5" {{ old('ParkingSpaces') == '5' ? 'selected="selected"' : '' }}>5</option>
                <option value="6" {{ old('ParkingSpaces') == '6' ? 'selected="selected"' : '' }}>6</option>
                <option value="7" {{ old('ParkingSpaces') == '7' ? 'selected="selected"' : '' }}>7</option>
                <option value="8" {{ old('ParkingSpaces') == '8' ? 'selected="selected"' : '' }}>8</option>
                <option value="9" {{ old('ParkingSpaces') == '9' ? 'selected="selected"' : '' }}>9</option>
                <option value="10+" {{ old('ParkingSpaces') == '10+' ? 'selected="selected"' : '' }}>10+</option>
              </select>
            </div>
             
            @if($insertorupdate == "update")
                  <div class="col-sm-12" style="margin:10px;">
                     <span class="btn" id="propertydetails" onclick="backtopropertypage()"> << Property Details </span> 
                     <button class="btn btn-danger" id="updatebtn" disabled="true">Update Aminites</button> 
                     <a href="{{ url('/propertyr/uploadimages/'.$propertyamenities->PropertyId)}}" class="btn" id="amenitiesbtn"> Images >>  </a>
                  </div>
               @else
               <div class="col-sm-3" style="margin:10px 50px;">
                  <span class="btn" id="propertydetails" onclick="backtopropertypage()"> << Property Details </span> 
                  <button class="btn">Save</button> 
               </div>
            @endif         
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('extra-js')
	<script type="text/javascript">

       function setcheckbox(feildid){
       let checkval = document.getElementById(feildid).value;
       (checkval === '0') ? document.getElementById(feildid).value = 1 : document.getElementById(feildid).value = 0;

       }
       function backtopropertypage(){
         let postaction = document.getElementById("postaction");
             postaction.submit();
       }
       function setcheckbox2(feildid){
          const checkval = document.getElementById(feildid).value;
          const box = document.getElementById('updatebtn');
          (checkval === '0') ? document.getElementById(feildid).value = 1 : document.getElementById(feildid).value = 0;
          (checkval === '0') ? box.classList.remove = "btn-danger" : box.classList.add = "btn-danger";
          (checkval === '0') ? box.disabled = false : box.disabled = true;
        }
	</script>
@endpush