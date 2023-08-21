@extends('layouts.header')
@section('title', 'Add Property')
@section('content')

 <!--Login & Register Section start-->
 <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row">
                <ul class="add-property-tab-list nav mb-50">
                            <li class="working"><a href="#PropertyDetailsDiv" data-bs-toggle="tab">1. Property Details</a></li>
                            <li><a href="#AmenitiesDiv" data-bs-toggle="tab">2. Amenities</a></li>
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
                            <div class="form-header">

                            
                                <h4 style="color:#d7d38d;">Update property</h4>
                                <input type="hidden" id="dbsubcategory" name="dbsubcategory" value="{{ json_encode($dbsubcategory) }}" />
                            </div>
          
            <form method="POST" action="{{ url('/propertyr/updateproperty') }}" enctype="multipart/form-data" class="form-data">
               @csrf
              
              <div class="row">
                <div class="col-sm-12">
                  <h4>
                    <input type="hidden" id="PropertyId" name="PropertyId" value="{{$propertydetail->PropertyId}}" />
                    <input type="checkbox" class="form-check-input" id="CheckUpdate" onclick="setcheckbox('CheckUpdate')" name="CheckUpdate" value="0" 
                            {{ old('CheckUpdate') == '1' ? 'checked="checked"' : '' }} />
                    <label for="BarbequeAreaFor" class="form-labelcheckbox">
                           Click on check-box to activate update button!
                    </label>
                  </h4>
                </div>
              </div> 
            <div class="row g-3">
            
            <div class="col-sm-3">
              <label for="ReferanceNumberFor" class="form-label">Referance Number
              <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$propertydetail->ReferanceNumber}}
                    </div>
              </label>
              <input type="text" class="form-control" id="ReferanceNumber" name="ReferanceNumber" value="{{$propertydetail->ReferanceNumber}}" readonly="readonly" />
              @if ($errors->has('ReferanceNumber'))
                    <span class="text-danger">{{  $errors->first('ReferanceNumber') }}</span>
                @endif
               
            </div>

            <div class="col-sm-3">
              <label for="PermitNumberFor" class="form-label">Permit Number 
                <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                    {{$propertydetail->PermitNumber}}
                </div>
              </label>
              <input type="text" class="form-control" id="PermitNumber" name="PermitNumber" placeholder="Permit Number" value="{{ old('PermitNumber') }}" />
              @if ($errors->has('PermitNumber'))
                    <span class="text-danger">{{  $errors->first('PermitNumber') }}</span>
                @endif
            </div>

            <div class="col-sm-3"> 
              <label for="CategoryFor" class="form-label">Category 
                <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                    {{$selectcategory->CategoryName}}
                </div> 
                </label> 
              <select class="form-select Category" onchange="GetSubCategory()" id="Category"  name="Category" >
              <option value="{{$selectcategory->CategoryId}}">{{$selectcategory->CategoryName}}</option>
               @foreach( $dbcategory as $cat)
                    @if($cat->CategoryId != $selectcategory->CategoryId )
                       <option value="{{$cat->CategoryId }}" {{ old('Category') == $cat->CategoryId ? 'selected="selected"' : '' }}>{{ $cat->CategoryName  }}</option>
                    @endif
               @endforeach
              </select>
              @if ($errors->has('Category'))
                    <span class="text-danger">{{  $errors->first('Category') }}</span>
                @endif
            </div>
            

            <div class="col-sm-3">
              <label for="SubCategoryFor" class="form-label">Sub-Category 
                <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                    {{$selectsubcategory->SubCategoryName}}
                </div>
              </label>
              <select class="form-select SubCategory" id="SubCategory"  name="SubCategory" >
              <option value="{{$selectsubcategory->SubCategoryId }}">{{ $selectsubcategory->SubCategoryName  }}</option>
               @foreach( $dbsubcategory as $subcat)
                    @if($subcat->SubCategoryId != $propertydetail->SubCategory && $subcat->CategoryId == $propertydetail->Category)
                       <option value="{{$subcat->SubCategoryId }}">{{ $subcat->SubCategoryName  }}</option>
                    @endif
               @endforeach
              </select>
              @if ($errors->has('SubCategory'))
                    <span class="text-danger">{{  $errors->first('SubCategory') }}</span>
                @endif
            </div>

            <div class="col-sm-3">
              <label for="PriceFor" class="form-label">Price 
                    <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$propertydetail->Price}}
                    </div>
                </label>
              <input type="number" class="form-control" name="Price" id="Price" placeholder="Price"  value="{{ old('Price') }}"/>
              @if ($errors->has('Price'))
                    <span class="text-danger">{{  $errors->first('Price') }}</span>
                @endif
            </div>

            <div class="col-sm-3">
              <label for="AreaFor" class="form-label">Area (Square Feet) 

                    <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$propertydetail->Area}}
                    </div>
              </label>
              <input type="number" class="form-control" name="Area" id="Area" placeholder="Area"  value="{{ old('Area') }}"/>
              @if ($errors->has('Area'))
                    <span class="text-danger">{{  $errors->first('Area') }}</span>
                @endif
            </div>

            <div class="col-sm-3">
              <label for="BedroormsFor" class="form-label">Number Of Bedroorms
              <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$propertydetail->Bedroorms}}
                    </div>
              </label>
              <select class="form-select Bedroorms" id="Bedroorms"  name="Bedroorms" >
                <option value="">Select number of bedroorms</option>
                <option value="Studio" {{ old('Bedroorms') == 'Studio' ? 'selected="selected"' : '' }}>Studio</option>
                <option value="1" {{ old('Bedroorms') == '1' ? 'selected="selected"' : '' }}>1</option>
                <option value="2" {{ old('Bedroorms') == '2' ? 'selected="selected"' : '' }}>2</option>
                <option value="3" {{ old('Bedroorms') == '3' ? 'selected="selected"' : '' }}>3</option>
                <option value="4" {{ old('Bedroorms') == '4' ? 'selected="selected"' : '' }}>4</option>
                <option value="5" {{ old('Bedroorms') == '5' ? 'selected="selected"' : '' }}>5</option>
                <option value="6" {{ old('Bedroorms') == '6' ? 'selected="selected"' : '' }}>6</option>
                <option value="7" {{ old('Bedroorms') == '7' ? 'selected="selected"' : '' }}>7</option>
                <option value="8" {{ old('Bedroorms') == '8' ? 'selected="selected"' : '' }}>8</option>
                <option value="9" {{ old('Bedroorms') == '9' ? 'selected="selected"' : '' }}>9</option>
                <option value="10+" {{ old('Bedroorms') == '10+' ? 'selected="selected"' : '' }}>10+</option>
              </select>
            </div>

            <div class="col-sm-3">
              <label for="BathroomsFor" class="form-label">Number Of Bathrooms
              <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$propertydetail->Bathrooms}}
                    </div>
              </label>
              <select class="form-select Bathrooms" id="Bathrooms"  name="Bathrooms" >
                <option value="">Select number of bathrooms</option>
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

            <div class="col-sm-3">
              <label for="PurposeFor" class="form-label">Purpose
              <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$propertydetail->Purpose}}
                    </div>
              </label>
              <select class="form-select Purpose" id="Purpose"  name="Purpose" >
                <option value="">Select purpose</option>
                <option value="Rent" {{ old('Purpose') == 'Rent' ? 'selected="selected"' : '' }}>Rent</option>
                <option value="Sale" {{ old('Purpose') == 'Sale' ? 'selected="selected"' : '' }}>Sale</option>
                <option value="Off Plan" {{ old('Purpose') == 'Off Plan' ? 'selected="selected"' : '' }}>Off Plan</option>
              </select>
            </div>
            
            <div class="col-sm-3">
              <label for="MinimumContractPeriodFor" class="form-label">Minimum Contract Period(Months)
              <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$propertydetail->MinimumContractPeriod}}
                    </div>
              </label>
              <select class="form-select" id="MinimumContractPeriod"  name="MinimumContractPeriod" >
                <option value="">Select contract period</option>
                <option value="1" {{ old('MinimumContractPeriod') == '1' ? 'selected="selected"' : '' }}>1</option>
                <option value="2" {{ old('MinimumContractPeriod') == '2' ? 'selected="selected"' : '' }}>2</option>
                <option value="3" {{ old('MinimumContractPeriod') == '3' ? 'selected="selected"' : '' }}>3</option>
                <option value="4" {{ old('MinimumContractPeriod') == '4' ? 'selected="selected"' : '' }}>4</option>
                <option value="5" {{ old('MinimumContractPeriod') == '5' ? 'selected="selected"' : '' }}>5</option>
                <option value="6" {{ old('MinimumContractPeriod') == '6' ? 'selected="selected"' : '' }}>6</option>
                <option value="7" {{ old('MinimumContractPeriod') == '7' ? 'selected="selected"' : '' }}>7</option>
                <option value="8" {{ old('MinimumContractPeriod') == '8' ? 'selected="selected"' : '' }}>8</option>
                <option value="9" {{ old('MinimumContractPeriod') == '9' ? 'selected="selected"' : '' }}>9</option>
                <option value="10" {{ old('MinimumContractPeriod') == '10' ? 'selected="selected"' : '' }}>10</option>
                <option value="11" {{ old('MinimumContractPeriod') == '11' ? 'selected="selected"' : '' }}>11</option>
                <option value="12" {{ old('MinimumContractPeriod') == '12' ? 'selected="selected"' : '' }}>12</option>
              </select>
            </div>

            <div class="col-sm-3">
              <label for="VacatingNoticePeriodFor" class="form-label">Vacating Notice Period(Months)
              <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$propertydetail->VacatingNoticePeriod}}
                    </div>
              </label>
              <select class="form-select" id="VacatingNoticePeriod"  name="VacatingNoticePeriod" >
                <option value="">Select vacating notice period</option>
                <option value="1" {{ old('VacatingNoticePeriod') == '1' ? 'selected="selected"' : '' }}>1</option>
                <option value="2" {{ old('VacatingNoticePeriod') == '2' ? 'selected="selected"' : '' }}>2</option>
                <option value="3" {{ old('VacatingNoticePeriod') == '3' ? 'selected="selected"' : '' }}>3</option>
                <option value="4" {{ old('VacatingNoticePeriod') == '4' ? 'selected="selected"' : '' }}>4</option>
                <option value="5" {{ old('VacatingNoticePeriod') == '5' ? 'selected="selected"' : '' }}>5</option>
                <option value="6" {{ old('VacatingNoticePeriod') == '6' ? 'selected="selected"' : '' }}>6</option>
                <option value="7" {{ old('VacatingNoticePeriod') == '7' ? 'selected="selected"' : '' }}>7</option>
                <option value="8" {{ old('VacatingNoticePeriod') == '8' ? 'selected="selected"' : '' }}>8</option>
                <option value="9" {{ old('VacatingNoticePeriod') == '9' ? 'selected="selected"' : '' }}>9</option>
                <option value="10" {{ old('VacatingNoticePeriod') == '10' ? 'selected="selected"' : '' }}>10</option>
                <option value="11" {{ old('VacatingNoticePeriod') == '11' ? 'selected="selected"' : '' }}>11</option>
                <option value="12" {{ old('VacatingNoticePeriod') == '12' ? 'selected="selected"' : '' }}>12</option>
              </select>
            </div>

            <div class="col-sm-3">
              <label for="RentFor" class="form-label">Rent Frequency
              <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$propertydetail->Rent}}
                    </div>
              </label>
              <select class="form-select" id="Rent"  name="Rent" >
              <option value="">Select rent frequency</option>
                <option value="Daily" {{ old('Rent') == 'Daily' ? 'selected="selected"' : '' }}>Daily</option>
                <option value="Weekly" {{ old('Rent') == 'Weekly' ? 'selected="selected"' : '' }}>Weekly</option>
                <option value="Monthly" {{ old('Rent') == 'Monthly' ? 'selected="selected"' : '' }}>Monthly</option>
                <option value="Yearly" {{ old('Rent') == 'Yearly' ? 'selected="selected"' : '' }}>Yearly</option>
              </select>
            </div>

            
            <div class="col-sm-3">
              <label for="FurnishedFor" class="form-label">Furnished
                <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$propertydetail->Furnished}}
                </div>
              </label>
              <select class="form-select" id="Furnished"  name="Furnished" >
                <option value="">Select furnished/unfurnished</option>
                <option value="Furnished" {{ old('Furnished') == 'Furnished' ? 'selected="selected"' : '' }}>Furnished</option>
                <option value="Unfurnished" {{ old('Furnished') == 'Unfurnished' ? 'selected="selected"' : '' }}>Unfurnished</option>
              </select>
            </div>

            <div class="col-sm-3">
              <label for="MaintenanceFeeFor" class="form-label">Maintenance Fee
              <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$propertydetail->MaintenanceFeeFor}}
                </div>
              </label>
              <input type="number" class="form-control" id="MaintenanceFeeFor" name="MaintenanceFeeFor" value="0"/>
            </div>

            
            <div class="col-sm-3">
              <label for="CategoryFor" class="form-label">Agent
              <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$userdetails->name}}
                </div>
              </label>
              <select class="form-select Agent" id="Agent" onchange="setAgentDetails()"  name="Agent" >
              <option value="">Select agent</option>
               @foreach( $agentlist as $agent)
                       <option value="{{$agent->id }}" setemail = "{{ $agent->email  }}"  setcontact = "{{ $agent->contact_number  }}" 
                       {{ old('Agent') == $agent->id ? 'selected="selected"' : '' }} >{{ $agent->name  }}</option>
               @endforeach
              </select>
            </div>
            <div class="col-sm-3">
            <label for="CategoryFor" class="form-label">Agent Details
            <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$userdetails->email}},{{ $userdetails->contact_number  }}
                </div>
            </label>
              <input type="text" class="form-control" id="agentdetails" name="agentdetails" readonly="readonly" />
            </div>

            <div class="col-sm-3">
              <label for="CityFor" class="form-label">City
              <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$propertydetail->City}}
                </div>
              </label>
              <select class="form-select country" id="City"  name="City" >
                <option value="Abu Dhabi" {{ old('City') == 'Abu Dhabi' ? 'selected="selected"' : '' }}>Abu Dhabi</option>
                <option value="Dubai" {{ old('City') == 'Dubai' ? 'selected="selected"' : '' }}>Dubai</option>
                <option value="Sharjah" {{ old('City') == 'Sharjah' ? 'selected="selected"' : '' }}>Sharjah</option>
                <option value="Umm Al Qaiwain" {{ old('City') == 'Umm Al Qaiwain' ? 'selected="selected"' : '' }}>Umm Al Qaiwain</option>
                <option value="Fujairah" {{ old('City') == 'Fujairah' ? 'selected="selected"' : '' }}>Fujairah</option>
                <option value="Ajman" {{ old('City') == 'Ajman' ? 'selected="selected"' : '' }}>Ajman</option>
                <option value="Ras Al Khaimah" {{ old('City') == 'Ras Al Khaimah' ? 'selected="selected"' : '' }}>Ras Al Khaimah</option>
              </select>
            </div>

            <div class="col-sm-9">
              <label for="AddressFor" class="form-label">Address
              <div class = "h-100 d-inline-block bg-danger text-white currentdetails"  style = "width: 100%;">
                        {{$propertydetail->Address}}
                </div>
              </label>
                <input type="text" class="form-control" name="Address" id="Address" placeholder="Address" value="{{ old('Address') }}"/>
                @if ($errors->has('Address'))
                    <span class="text-danger">{{  $errors->first('Address') }}</span>
                @endif
            </div>


            <div class="col-12">
              <label for="address2" class="form-label">Description</label>
              <textarea class="form-control" id="Description" name="Description" readonly="readonly"> {{ $propertydetail->Description }} </textarea>
              @if ($errors->has('Description'))
                    <span class="text-danger">{{  $errors->first('Description') }}</span>
                @endif
            </div>

          </div>
          <div class="col-sm-12" style="margin-top:10px;">
            <button class="btn btn-danger" id="updatebtn" disabled="true">Update</button> 
            <a href="{{ url('/propertyr/amenities/'.$propertydetail->PropertyId)}}" class="btn" id="amenitiesbtn"> Amenities >>  </a>
          </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!--Login & Register Section end-->
@endsection
@push('extra-js')
	<script type="text/javascript">

        // $(document).ready(function() {
        //     $('.country').select2();
        // });
        
        ClassicEditor
            .create( document.querySelector( '#Description' ) )
            .catch( error => {
                console.error( error );
            } );

        // setAgentDetails();

        function GetSubCategory(){
            var getJson = JSON.parse(document.getElementById("dbsubcategory").value);
            var callValue = JSON.parse(document.getElementById("Category").value);
            console.log(getJson);
            $("#SubCategory").find("option").remove().end();
            $("#SubCategory").append($('<option>', {value: '0', text: 'Select Sub-category'}));
            for(let i=0; i<= getJson.length -1; i++){
                if(getJson[i].CategoryId == callValue)
                {
                    $("#SubCategory").append($('<option>', {value: getJson[i].SubCategoryId, text: getJson[i].SubCategoryName}));
                }
            }
        }
        function setAgentDetails(){
             const selid = document.getElementById("Agent");
              let contactdetails = selid.options[selid.selectedIndex].getAttribute('setcontact');
              let emailid = selid.options[selid.selectedIndex].getAttribute('setemail');
              document.getElementById("agentdetails").value =`${emailid}, # ${contactdetails}`;
            }
        function setcheckbox(feildid){
          const checkval = document.getElementById(feildid).value;
          const box = document.getElementById('updatebtn');
          (checkval === '0') ? document.getElementById(feildid).value = 1 : document.getElementById(feildid).value = 0;
          (checkval === '0') ? box.classList.remove = "btn-danger" : box.classList.add = "btn-danger";
          (checkval === '0') ? box.disabled = false : box.disabled = true;
        }
	</script>
@endpush