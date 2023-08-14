@extends('layouts.header')
@section('title', 'Add Amenities')
@section('content')
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
                            
                           
            <form method="POST" action="{{ url('/propertyr/amenities') }}" enctype="multipart/form-data" class="form-inline">
               @csrf
            <div class="row g-3"> 
            <div class="col-sm-3 col-support-3">
            <input type="hidden" id="PropertyId" name="PropertyId" value="{{$id}}" />
            @if ($errors->has('PropertyId'))
                <span class="text-danger">{{  $errors->first('PropertyId') }}</span>
            @endif
              <input type="checkbox" class="form-check-input" id="BarbequeArea" onclick="setcheckbox('BarbequeArea')" name="BarbequeArea" value="0" {{ old('BarbequeArea') == '1' ? 'checked="checked"' : '' }} />
              <label for="BarbequeAreaFor" class="form-labelcheckbox">Barbeque Area</label>
            </div>
           
            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="DayCareCenter" name="DayCareCenter" onclick="setcheckbox('DayCareCenter')"  value="0" {{ old('DayCareCenter') == '1' ? 'checked="checked"' : '' }} />  
            <label for="DayCareCenterFor" class="form-labelcheckbox">Day Care Center</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="KidsPlayArea" name="KidsPlayArea" onclick="setcheckbox('KidsPlayArea')" value="0" {{ old('KidsPlayArea') == '1' ? 'checked="checked"' : '' }} />  
            <label for="KidsPlayAreaFor" class="form-labelcheckbox">Kids Play Area</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="LawnOrGarden" name="LawnOrGarden" onclick="setcheckbox('LawnOrGarden')" value="0" {{ old('LawnOrGarden') == '1' ? 'checked="checked"' : '' }} />  
            <label for="LawnOrGardenFor" class="form-labelcheckbox">Lawn Or Garden</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="CafeteriaOrCanteen" name="CafeteriaOrCanteen" onclick="setcheckbox('CafeteriaOrCanteen')" value="0" {{ old('CafeteriaOrCanteen') == '1' ? 'checked="checked"' : '' }} />  
            <label for="CafeteriaOrCanteenFor" class="form-labelcheckbox">Cafeteria Or Canteen</label>
            </div>

            
            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="GymOrHealthClub" name="GymOrHealthClub" onclick="setcheckbox('GymOrHealthClub')" value="0" {{ old('GymOrHealthClub') == '1' ? 'checked="checked"' : '' }} />  
            <label for="GymOrHealthClubFor" class="form-labelcheckbox">Gym Or HealthClub</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="Jacuzzi" name="Jacuzzi" onclick="setcheckbox('Jacuzzi')" value="0" {{ old('Jacuzzi') == '1' ? 'checked="checked"' : '' }} />  
            <label for="JacuzziFor" class="form-labelcheckbox">Jacuzzi</label>
            </div>
            
            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="Sauna" name="Sauna" onclick="setcheckbox('Sauna')" value="0" {{ old('Sauna') == '1' ? 'checked="checked"' : '' }} />  
            <label for="SaunaFor" class="form-labelcheckbox">Sauna</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="SteamRoom" name="SteamRoom" onclick="setcheckbox('SteamRoom')" value="0" {{ old('SteamRoom') == '1' ? 'checked="checked"' : '' }} />  
            <label for="SteamRoomFor" class="form-labelcheckbox">Steam Room</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="SwimmingPool" name="SwimmingPool" onclick="setcheckbox('SwimmingPool')" value="0" {{ old('SwimmingPool') == '1' ? 'checked="checked"' : '' }} />  
            <label for="SwimmingPoolFor" class="form-labelcheckbox">Swimming Pool</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="FacilitiesForDisabled" name="FacilitiesForDisabled" onclick="setcheckbox('FacilitiesForDisabled')" value="0" {{ old('FacilitiesForDisabled') == '1' ? 'checked="checked"' : '' }} />  
            <label for="FacilitiesForDisabledFor" class="form-labelcheckbox">Facilities For Disabled</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="LaundryRoom" name="LaundryRoom" onclick="setcheckbox('LaundryRoom')" value="0" {{ old('LaundryRoom') == '1' ? 'checked="checked"' : '' }} />  
            <label for="LaundryRoomFor" class="form-labelcheckbox">Laundry Room</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="LaundryFacility" name="LaundryFacility" onclick="setcheckbox('LaundryFacility')" value="0" {{ old('LaundryFacility') == '1' ? 'checked="checked"' : '' }} />  
            <label for="LaundryFacilityFor" class="form-labelcheckbox">Laundry Facility</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="SharedKitchen" name="SharedKitchen" onclick="setcheckbox('SharedKitchen')" value="0" {{ old('SharedKitchen') == '1' ? 'checked="checked"' : '' }} />  
            <label for="SharedKitchenFor" class="form-labelcheckbox">Shared Kitchen</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="BalconyOrTerrace" name="BalconyOrTerrace" onclick="setcheckbox('BalconyOrTerrace')" value="0" {{ old('BalconyOrTerrace') == '1' ? 'checked="checked"' : '' }} />  
            <label for="BalconyOrTerraceFor" class="form-labelcheckbox">Balcony Or Terrace</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="LobbyInBuilding" name="LobbyInBuilding" onclick="setcheckbox('LobbyInBuilding')" value="0" {{ old('LobbyInBuilding') == '1' ? 'checked="checked"' : '' }} />  
            <label for="LobbyInBuildingFor" class="form-labelcheckbox">Lobby In Building</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="PrayerRoom" name="PrayerRoom" onclick="setcheckbox('PrayerRoom')" value="0" {{ old('PrayerRoom') == '1' ? 'checked="checked"' : '' }} />  
            <label for="PrayerRoomFor" class="form-labelcheckbox">Prayer Room</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="ReceptionOrWaitingRoom" name="ReceptionOrWaitingRoom" onclick="setcheckbox('ReceptionOrWaitingRoom')" value="0" {{ old('ReceptionOrWaitingRoom') == '1' ? 'checked="checked"' : '' }} />  
            <label for="ReceptionOrWaitingRoomFor" class="form-labelcheckbox">Reception Or Waiting Room</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="BusinessCenter" name="BusinessCenter" onclick="setcheckbox('BusinessCenter')" value="0" {{ old('BusinessCenter') == '1' ? 'checked="checked"' : '' }} />  
            <label for="BusinessCenterFor" class="form-labelcheckbox">Business Center</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="CCTVSecurity" name="CCTVSecurity" onclick="setcheckbox('CCTVSecurity')" value="0" {{ old('CCTVSecurity') == '1' ? 'checked="checked"' : '' }} />  
            <label for="CCTVSecurityFor" class="form-labelcheckbox">CCTV Security</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="ATMFacility" name="ATMFacility" onclick="setcheckbox('ATMFacility')" value="0" {{ old('ATMFacility') == '1' ? 'checked="checked"' : '' }} />  
            <label for="ATMFacilityFor" class="form-labelcheckbox">ATM Facility</label>
            </div>

            
            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="Freehold" name="Freehold" onclick="setcheckbox('Freehold')" value="0" {{ old('Freehold') == '1' ? 'checked="checked"' : '' }} />  
            <label for="FreeholdFor" class="form-labelcheckbox">Freehold</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="BroadbandInternet" name="BroadbandInternet" onclick="setcheckbox('BroadbandInternet')" value="0" {{ old('BroadbandInternet') == '1' ? 'checked="checked"' : '' }} />  
            <label for="BroadbandInternetFor" class="form-labelcheckbox">Broadband Internet</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="SatelliteCableTV" name="SatelliteCableTV" onclick="setcheckbox('SatelliteCableTV')" value="0" {{ old('SatelliteCableTV') == '1' ? 'checked="checked"' : '' }} />  
            <label for="SatelliteCableTVFor" class="form-labelcheckbox">Satellite Cable TV</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="Intercom" name="Intercom" onclick="setcheckbox('Intercom')" value="0" {{ old('Intercom') == '1' ? 'checked="checked"' : '' }} />  
            <label for="IntercomFor" class="form-labelcheckbox">Intercom</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="DoubleGlazedWindows" name="DoubleGlazedWindows" onclick="setcheckbox('DoubleGlazedWindows')" value="0" {{ old('DoubleGlazedWindows') == '1' ? 'checked="checked"' : '' }} />  
            <label for="DoubleGlazedWindowsFor" class="form-labelcheckbox">Double Glazed Windows</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="CentrallyAirConditioned" name="CentrallyAirConditioned" onclick="setcheckbox('CentrallyAirConditioned')" value="0" {{ old('CentrallyAirConditioned') == '1' ? 'checked="checked"' : '' }} />  
            <label for="CentrallyAirConditionedFor" class="form-labelcheckbox">Centrally Air Conditioned</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="CentralHeating" name="CentralHeating" onclick="setcheckbox('CentralHeating')" value="0" {{ old('CentralHeating') == '1' ? 'checked="checked"' : '' }} />  
            <label for="CentralHeatingFor" class="form-labelcheckbox">Central Heating</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="StudyRoom" name="StudyRoom" onclick="setcheckbox('StudyRoom')" value="0" {{ old('StudyRoom') == '1' ? 'checked="checked"' : '' }} />  
            <label for="StudyRoomFor" class="form-labelcheckbox">Study Room</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="WasteDisposal" name="WasteDisposal" onclick="setcheckbox('WasteDisposal')" value="0" {{ old('WasteDisposal') == '1' ? 'checked="checked"' : '' }} />  
            <label for="WasteDisposalFor" class="form-labelcheckbox">Waste Disposal</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <input type="checkbox" class="form-check-input" id="CleaningServices" name="CleaningServices" onclick="setcheckbox('CleaningServices')" value="0" {{ old('CleaningServices') == '1' ? 'checked="checked"' : '' }} />  
            <label for="CleaningServicesFor" class="form-labelcheckbox">Cleaning Services</label>
            </div>

            <div class="col-sm-3 col-support-3">
            <label for="ViewFor" class="form-label">View</label>
            <input type="text" id="View" class="form-control" name="View" value="{{ old('View') }}"/>
            </div>
            
            <div class="col-sm-3 col-support-3">
            <label for="CompletionYearFor" class="form-label">Completion Year</label>
            <input type="text" id="CompletionYear" class="form-control" name="CompletionYear" value="{{ old('CompletionYear') }}"/>
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
            <label for="FloorFor" class="form-label">Number of Floors</label>
            <input type="number" id="Floor" class="form-control" name="Floor" value="{{ old('Floor') }}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            <label for="ElevatorsInBuildingFor" class="form-label">Number Of Elevators in a Building</label>
            <input type="number" id="ElevatorsInBuilding" class="form-control" name="ElevatorsInBuilding" value="{{ old('ElevatorsInBuilding') }}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            <label for="SecurityStaffFor" class="form-label">Number Of Security Staff</label>
            <input type="number" id="SecurityStaff" class="form-control" name="SecurityStaff" value="{{ old('SecurityStaff') }}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            <label for="OtherMainFeaturesFor" class="form-label">Other Main Features</label>
            <input type="number" id="OtherMainFeatures" class="form-control" name="OtherMainFeatures" value="{{ old('OtherMainFeatures') }}"/>
            </div>



            <div class="col-sm-3 col-support-3">
            <label for="PetPolicyFor" class="form-label">PetPolicy</label>
            <input type="text" id="PetPolicy" class="form-control" name="PetPolicy" value="{{ old('PetPolicy') }}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            <label for="LandAreaFor" class="form-label">Land Area</label>
            <input type="number" id="LandArea" class="form-control" name="LandArea" value="{{ old('LandArea') }}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            <label for="NearbySchoolsFor" class="form-label">Near By Schools</label>
            <input type="text" id="NearbySchools" class="form-control" name="NearbySchools" value="{{ old('NearbySchools') }}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            <label for="NearbyHospitalsFor" class="form-label">Near By Hospitals</label>
            <input type="text" id="NearbyHospitals" class="form-control" name="NearbyHospitals" value="{{ old('NearbyHospitals') }}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            <label for="NearbyShoppingMallsFor" class="form-label">Near By Shopping Malls</label>
            <input type="text" id="NearbyShoppingMalls" class="form-control" name="NearbyShoppingMalls" value="{{ old('NearbyShoppingMalls') }}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            <label for="DistanceFromAirportFor" class="form-label">Distance From Airport</label>
            <input type="number" id="DistanceFromAirportFor" class="form-control" name="DistanceFromAirportFor" value="{{ old('DistanceFromAirportFor') }}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            <label for="NearbyPublicTransportFor" class="form-label">Distance From Public Transport</label>
            <input type="number" id="NearbyPublicTransport" class="form-control" name="NearbyPublicTransport" value="{{ old('NearbyPublicTransport') }}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            <label for="OtherNearbyPlacesFor" class="form-label">Other Nearby Places</label>
            <input type="text" id="OtherNearbyPlaces" class="form-control" name="OtherNearbyPlaces" value="{{ old('OtherNearbyPlaces') }}"/>
            </div>

            <div class="col-sm-3 col-support-3">
            <label for="FeaturesFor" class="form-label">Other Features</label>
            <input type="text" id="Features" class="form-control" name="Features" value="{{ old('Features') }}"/>
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

          <div class="col-sm-12 col-support-3" style="margin-top:10px; padding-bottom:2%;">
            <button class="btn">Save</button>
          </div>
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
	</script>
@endpush