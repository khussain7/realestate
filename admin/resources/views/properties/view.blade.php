@extends('layouts.header')
@section('title', 'Add Property')
@section('content')

 <!--Login & Register Section start-->
 <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
        <div class="row row-100">
            <div class="col">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    <a href="{{ url('/propertieslist') }}" class="btn btnhref">Go to list</a>
                    @php
                        Session::forget('success');
                    @endphp
                </div>
                @endif
            </div>
        </div>
        @if(!Session::has('success'))    

        @php
            $imgname = explode(',', $propertydetails->Attachments);
        @endphp
       
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

  @for($i=0; $i < count($imgname); $i++) 
            @if($i == count($imgname)-1)
            <div class="carousel-item active">
                <img src="{{url('/files/'.$imgname[$i])}}" class="d-block w-100 img-view"  alt="{{$imgname[$i]}}">
            </div>
            @endif
            <div class="carousel-item">
                <img src="{{url('/files/'.$imgname[$i])}}" class="d-block w-100 img-view"  alt="{{$imgname[$i]}}">
            </div> 
        @endfor
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom pt-50">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">Property List</span>
            </a>
            

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="#" onclick="removereadonly()" style="margin-right:5px;" class="btn btnhref">Edit Property</a></li>
                <li class="nav-item"><a href="{{ url('/propertiesdelete/'.$propertydetails['PropertyId']) }}" class="btn btnhref">Delete Property</a></li>
            </ul>

           
        </header>
        <div class="row">
            <div class="row row-100">
                <div id="form-div">
                    <div class="">
                        <div class="form-header">
                            <h4 style="color:#d7d38d;">Update property</h4>
                            <input type="hidden" id="dbsubcategory" name="dbsubcategory" value="{{ json_encode($dbsubcategory) }}" />
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form method="POST" action="{{ url('/properties') }}" enctype="multipart/form-data" class="form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-3 col-12 mb-30">
                                            <label>Property Name</label>
                                            <input type="text" id="PropertyName" name="PropertyName" value="{{ $propertydetails->PropertyName}}" class="setreadonly" placeholder="Property Name" readonly />
                                            <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                            <label>Reference Number</label>
                                            <input type="text" id="ReferanceNumber" name="ReferanceNumber" class="setreadonly" placeholder="Referance Number" value="{{ $propertydetails->ReferanceNumber}}" readonly />
                                            <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Type ({{ $propertydetails->Category}})</label>
                                    <select id="Category" name="Category" class="nice-select" style="display: none;">
                                            <option value="Rent">Rent</option>
                                            <option value="Sale">Sale</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Category ({{ $propertydetails->PropertyType}})</label>
                                    <select id="PropertyType" name="PropertyType" onchange="GetSubCategory()" class="nice-select" style="display: none;">
                                    <option value="0">Select Category</option>
                                    @foreach( $dbcategory as $cat)
                                        {
                                            <option value="{{$cat->CategoryId }}">{{ $cat->CategoryName  }}</option>
                                        }
                                    @endforeach
                                    <!-- <option value="Residential">Residential</option>
                                    <option value="Commercial">Commercial</option> -->
                                    </select>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Sub Category ({{ $propertydetails->PropertyType}})</label>
                                    <input type="hidden" id="PropertyTypeSubTxt" name="PropertyTypeSubTxt" value="0" />
                                    <select id="PropertyTypeSub" class="select-option" name="PropertyTypeSub">
                                        <option value="0">Select Sub-Category</option>
                                    </select>
                                </div>
                                    <input type="hidden" id="PropertyOwnerId" name="PropertyOwnerId" value="0" />
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Area SqFt(<span class="edit-property-text">{{ $propertydetails->Area}}</span>)</label>
                                    <input type="text" id="Area" name="Area" value="{{ $propertydetails->Area}}" class="setreadonly" placeholder="Area in SqFt">
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Price(<span class="edit-property-text">{{ $propertydetails->Price}}</span>)</label>
                                    <input type="number" id="Price" name="Price" value="{{ $propertydetails->Price}}" class="setreadonly" placeholder="Price">
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Number Of Beds(<span class="edit-property-text">{{ $propertydetails->Beds}}</span>)</label>
                                    <!-- <input type="number" id="Beds" name="Beds" value="{{ $propertydetails->Beds}}" class="setreadonly" placeholder="Number Of Beds"> -->
                                    <select id="Beds" name="Beds" class="nice-select" style="display: none;">
                                            <option value="0">Studio</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                    </select>
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Number Of Bath(<span class="edit-property-text">{{ $propertydetails->Bath}}</span>)</label>
                                    <input type="number" id="Bath" name="Bath" class="setreadonly" value="{{ $propertydetails->Bath}}" placeholder="Number Of Bath">
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Located City (<span class="edit-property-text">{{ $propertydetails->City}}</span>)</label>
                                    <select id="City" name="City" class="nice-select" style="display: none;">
                                            <option value="Abu Dhabi">Abu Dhabi</option>
                                            <option value="Dubai">Dubai</option>
                                            <option value="Sharjah">Sharjah</option>
                                            <option value="Umm Al Qaiwain">Umm Al Qaiwain</option>
                                            <option value="Fujairah">Fujairah</option>
                                            <option value="Ajman">Ajman</option>
                                            <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                                    </select>
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-30">
                                    <label>Images <span style="color:#ccc;">(File Type : JPEG, JPG, PNG)</span> </label>
                                    <input type="file" id="Attachments" name="Attachments[]" accept="image/png, image/jpg, image/jpeg" onblur="ValidateFileTypeAll(this)" multiple />
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-12 col-12 mb-30">
                                <div class="col-12 mb-30">
                                            <h4>Other Feature</h4>
                                            <ul class="other-features">
                                                <li><input type="checkbox" name="Parking" value="yes" id="Parking" {{ $propertydetails->Parking === "yes" ? "Checked" : "" }} ><label for="Parking">Parking</label></li>
                                                <li><input type="checkbox" name="Terrace" value="yes" id="Terrace" {{ $propertydetails->Terrace === "yes" ? "Checked" : "" }} ><label for="bedding">Terrace</label></li>
                                                <li><input type="checkbox" name="Balcony" value="yes" id="Balcony" {{ $propertydetails->Balcony === "yes" ? "Checked" : "" }} ><label for="Balcony">Balcony</label></li>
                                                <li><input type="checkbox" name="CentralHeating" value="yes" id="CentralHeating" {{ $propertydetails->CentralHeating === "yes" ? "Checked" : "" }}><label for="CentralHeating">Central Heating</label></li>
                                                <li><input type="checkbox" name="WasteDisposal" value="yes" id="WasteDisposal" {{ $propertydetails->WasteDisposal === "yes" ? "Checked" : "" }}><label for="WasteDisposal">Waste Disposal</label></li>
                                                <li><input type="checkbox" name="Electricity" value="yes" id="Electricity" {{ $propertydetails->Electricity === "yes" ? "Checked" : "" }}><label for="parking">Gym</label></li>
                                                <li><input type="checkbox" name="ACType" value="yes" id="ACType" {{ $propertydetails->ACType === "yes" ? "Checked" : "" }}><label for="ACType">Pool</label></li>
                                            </ul>
                                        </div>
                                </div>
                               
                                            <h4>Near By approximately in kilometers</h4>
                                            <div class="col-md-3 col-12 mb-30">
                                                <label>Air Port (<span class="edit-property-text">{{ $propertydetails->AirportDistance}} KM</span>)</label>
                                                <input type="number" id="AirportDistance" name="AirportDistance" value="{{ $propertydetails->AirportDistance}}" placeholder="Airport Distance" readonly />
                                                <input type="range" min="0" max="10" step ="0.25" value="{{ $propertydetails->AirportDistance}}" onchange="rangeChange(this.value, 'AirportDistance')">
                                                <span class="error-msg"></span>
                                            </div>
                                            <div class="col-md-3 col-3 mb-30">
                                                <label>Park (<span class="edit-property-text">{{ $propertydetails->ParkDistance}} KM</span>)</label>
                                                <input type="number" id="ParkDistance" name="ParkDistance" value="{{ $propertydetails->ParkDistance}}" placeholder="Park Distance" readonly />
                                                <input type="range" min="0" step="0.25" max="15" value="{{ $propertydetails->ParkDistance}}" onchange="rangeChange(this.value, 'ParkDistance')">
                                                <span class="error-msg"></span>
                                            </div>
                                            <div class="col-md-3 col-12 mb-30">
                                                <label>Hospital (<span class="edit-property-text">{{ $propertydetails->HospitalDistance}} KM</span>)</label>
                                                <input type="number" id="HospitalDistance" name="HospitalDistance" value="{{ $propertydetails->HospitalDistance}}" placeholder="Hospital Distance" readonly />
                                                <input type="range" min="0" step="0.25" max="15" value="{{ $propertydetails->HospitalDistance}}" onchange="rangeChange(this.value, 'HospitalDistance')">
                                                <span class="error-msg"></span>
                                            </div>
                                            
                                            <div class="col-md-3 col-12 mb-30">
                                                <label>Grocery (<span class="edit-property-text">{{ $propertydetails->GroceryStoreCount}} KM</span>)</label>
                                                <input type="number" id="GroceryStoreCount" name="GroceryStoreCount" value="{{ $propertydetails->GroceryStoreCount}}" placeholder="Grocery Distance" readonly />
                                                <input type="range" min="0" step="0.25" max="15" value="{{ $propertydetails->GroceryStoreCount}}" onchange="rangeChange(this.value, 'GroceryStoreCount')">
                                                <span class="error-msg"></span>
                                            </div>
                                            <div class="col-md-6 col-12 mb-30">
                                                <label>Medical Store (<span class="edit-property-text">{{ $propertydetails->MedicalStore}} KM</span>)</label>
                                                <input type="number" id="MedicalStore" name="MedicalStore" value="{{ $propertydetails->MedicalStore}}" placeholder="Medical Distance" readonly />
                                                <input type="range" min="0" step="0.25" max="15" value="{{ $propertydetails->MedicalStore}}" onchange="rangeChange(this.value, 'MedicalStore')">
                                                <span class="error-msg"></span>
                                            </div>
                                            <div class="col-md-3 col-12 mb-30">
                                                <label>Resturants (<span class="edit-property-text">{{ $propertydetails->ResturantsCount}} KM</span>)</label>
                                                <input type="number" id="ResturantsCount" name="ResturantsCount" value="{{ $propertydetails->ResturantsCount}}" placeholder="Resturants Distance" readonly />
                                                <input type="range" min="0" step="0.25" max="15" value="{{ $propertydetails->ResturantsCount}}" onchange="rangeChange(this.value, 'ResturantsCount')">
                                                <span class="error-msg"></span>
                                            </div>
                                            <div class="col-md-3 col-12 mb-30">
                                                <label>Google Map URL</label>
                                                <input type="text" id="GoogleLink" name="GoogleLink" value="{{ $propertydetails->GoogleLink}}" placeholder="Google Map URL"  />
                                                <span class="error-msg"></span>
                                            </div>
                                            <div class="col-12 mb-30"><button class="btn">Save</button></div>
                                        
                                </div>
                            </div> 
                    </form>
                    </div>
                </div>
            </div>
            @endif
    </div>
    </div>
    <!--Login & Register Section end-->
@endsection
@push('extra-js')
	<script type="text/javascript">

        
    //   ClassicEditor
    //         .create( document.querySelector( '#Property_Description' ) )
    //         .catch( error => {
    //             console.error( error );
    //         } );
            function rangeChange(setvalue, feildid){
                $("#"+feildid).val(setvalue);
            }

            function removereadonly(){

            }
            function SetSubCategory(callValue){
                //alert(callValue);
                var getJson = JSON.parse(document.getElementById("dbsubcategory").value);
                const parent = document.getElementById('PropertyTypeSub');
                
                $("#PropertyTypeSub").find("option").remove().end();
                $("#PropertyTypeSub").append($('<option>', {value: '0', text: 'Select Subcategory'}));
                for(let i=0; i<= getJson.length -1; i++){
                    if(getJson[i].CategoryId == callValue)
                    {
                        $("#PropertyTypeSub").append($('<option>', {value: getJson[i].SubCategoryId, text: getJson[i].SubCategoryName}));
                        // $(child1).append(`<span class="">${getJson[i].SubCategoryName}</span>`);
                       // $(child2).append(`<li data-value="${getJson[i].SubCategoryId}" class="">${getJson[i].SubCategoryName}</li>`);

                        // console.log(getJson[i].SubCategoryId);
                        // console.log(getJson[i].SubCategoryName);
                    }
                    //
                }
            }
            function GetSubCategory(){
                SetSubCategory(document.getElementById('PropertyType').value);
            }

            SetSubCategory("1");
	</script>
@endpush