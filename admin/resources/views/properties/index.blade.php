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
                            <h4 style="color:#d7d38d;">Add new property</h4>
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
                                            <input type="hidden" id="AddedAsBanner" name="AddedAsBanner" value = "No" />
                                            <input type="text" id="PropertyName" name="PropertyName" placeholder="Property Name" />
                                            <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                            <label>Reference Number</label>
                                            <input type="text" id="ReferanceNumber" value="{{$maxId[0]->randomid}}-{{$rand}}" name="ReferanceNumber" placeholder="Referance Number" readonly="readonly" />
                                            <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Type</label>
                                    <select id="Category" name="Category" class="nice-select" style="display: none;">
                                            <option value="Rent">Rent</option>
                                            <option value="Sale">Sale</option>
                                            <option value="Off Plan">Off Plan</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Category</label>
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
                                    <label>Sub Category </label>
                                    <input type="hidden" id="PropertyTypeSubTxt" name="PropertyTypeSubTxt" value="0" />
                                    <select id="PropertyTypeSub" class="select-option" onchange="GetSubCategoryTxt(this)" name="PropertyTypeSub">
                                        <option value="0">Select Sub-Category</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Area SqFt</label>
                                    <input type="text" id="Area" name="Area" placeholder="Area in SqFt" />
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Price</label>
                                    <input type="number" id="Price" name="Price" placeholder="Price" />
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Number Of Beds</label>
                                    <input type="number" id="Beds" name="Beds" placeholder="Number Of Beds" />
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Number Of Bath</label>
                                    <input type="number" id="Bath" name="Bath" placeholder="Number Of Bath" />
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Located City</label>
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
                                    <input type="file" id="Attachments" name="Attachments[]" placeholder="Number Of Bath" accept="image/png, image/jpg, image/jpeg" onblur="ValidateFileTypeAll(this)" multiple />
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-12 col-12 mb-30">
                                <div class="col-12 mb-30">
                                            <h4>Other Feature</h4>
                                            <ul class="other-features">
                                                <li><input type="checkbox" name="Parking" value="yes" id="Parking"><label for="Parking">Parking</label></li>
                                                <li><input type="checkbox" name="Terrace" value="yes" id="Terrace"><label for="bedding">Terrace</label></li>
                                                <li><input type="checkbox" name="Balcony" value="yes" id="Balcony"><label for="Balcony">Balcony</label></li>
                                                <li><input type="checkbox" name="CentralHeating" value="yes" id="CentralHeating"><label for="CentralHeating">Central Heating</label></li>
                                                <li><input type="checkbox" name="WasteDisposal" value="yes" id="WasteDisposal"><label for="WasteDisposal">Waste Disposal</label></li>
                                                <li><input type="checkbox" name="Electricity" value="yes" id="Electricity"><label for="parking">Gym</label></li>
                                                <li><input type="checkbox" name="ACType" value="yes" id="ACType"><label for="ACType">Pool</label></li>
                                            </ul>
                                        </div>
                                </div>
                               
                                            <h4>Near By</h4>
                                            <div class="col-md-3 col-12 mb-30">
                                                <label>Air Port (approximately in KM)</label>
                                                <input type="number" id="AirportDistance" name="AirportDistance" value="0" placeholder="Airport Distance" readonly />
                                                <input type="range" min="0" max="10" step ="0.25" value="0" onchange="rangeChange(this.value, 'AirportDistance')">
                                                <span class="error-msg"></span>
                                            </div>
                                            <div class="col-md-3 col-3 mb-30">
                                                <label>Park (approximately in KM)</label>
                                                <input type="number" id="ParkDistance" name="ParkDistance" value="0" placeholder="Park Distance" readonly />
                                                <input type="range" min="0" step="0.25" max="15" value="0" onchange="rangeChange(this.value, 'ParkDistance')">
                                                <span class="error-msg"></span>
                                            </div>
                                            <div class="col-md-3 col-12 mb-30">
                                                <label>Hospital (approximately in KM)</label>
                                                <input type="number" id="HospitalDistance" name="HospitalDistance" value="0" placeholder="Hospital Distance" readonly />
                                                <input type="range" min="0" step="0.25" max="15" value="0" onchange="rangeChange(this.value, 'HospitalDistance')">
                                                <span class="error-msg"></span>
                                            </div>
                                            
                                            <div class="col-md-3 col-12 mb-30">
                                                <label>Grocery (approximately in KM)</label>
                                                <input type="number" id="GroceryStoreCount" name="GroceryStoreCount" value="0" placeholder="Grocery Distance" readonly />
                                                <input type="range" min="0" step="0.25" max="15" value="0" onchange="rangeChange(this.value, 'GroceryStoreCount')">
                                                <span class="error-msg"></span>
                                            </div>
                                            <div class="col-md-6 col-12 mb-30">
                                                <label>Medical Store (approximately in KM)</label>
                                                <input type="number" id="MedicalStore" name="MedicalStore" value="0" placeholder="Medical Distance" readonly />
                                                <input type="range" min="0" step="0.25" max="15" value="0" onchange="rangeChange(this.value, 'MedicalStore')">
                                                <span class="error-msg"></span>
                                            </div>
                                            <div class="col-md-3 col-12 mb-30">
                                                <label>Resturants (approximately in KM)</label>
                                                <input type="number" id="ResturantsCount" name="ResturantsCount" value="0" placeholder="Resturants Distance" readonly />
                                                <input type="range" min="0" step="0.25" max="15" value="0" onchange="rangeChange(this.value, 'ResturantsCount')">
                                                <span class="error-msg"></span>
                                            </div>
                                            <div class="col-md-3 col-12 mb-30">
                                                <label>Google Map URL</label>
                                                <input type="text" id="GoogleLink" name="GoogleLink" value="0" placeholder="Google Map URL"  />
                                                <span class="error-msg"></span>
                                            </div>
                                            <div class="col-12 mb-30"><button class="btn">Save</button></div>
                                        
                                </div>
                            </div> 
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Login & Register Section end-->
@endsection
@push('extra-js')
<script type="text/javascript">
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

        function GetSubCategoryTxt(sel){
            document.getElementById('PropertyTypeSubTxt').value = sel.options[sel.selectedIndex].text;
        }

        SetSubCategory("1");
</script>
@endpush