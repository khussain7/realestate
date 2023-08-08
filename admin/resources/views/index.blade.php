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
                    <form method="POST" action="{{ url('/admin/public/propertydetails') }}" enctype="multipart/form-data" class="form-data">
                    @csrf
                               <div class="row">
                                   <div class="col-md-3 col-12 mb-30">
                                        <input type="text" id="Property_Name" name="Property_Name" placeholder="Property Name">
                                        <span class="error-msg"></span>
                                    </div>
                                   <div class="col-md-3 col-12 mb-30">
                                        <input type="number" id="Property_Size" name="Property_Size" placeholder="Size in SQ.FT"> 
                                        <span class="error-msg"></span>
                                   </div>
                                   <div class="col-md-3 col-12 mb-30">
                                        <input type="number" id="Property_Price" name="Property_Price" placeholder="Price">
                                        <span class="error-msg"></span>
                                    </div>
                                   <div class="col-md-3 col-12 mb-30">
                                        <input type="number" id="Number_Of_Bedroom" name="Property_Bedrooms" placeholder="Number of Bedroom">
                                        <span class="error-msg"></span>
                                    </div>
                                   <div class="col-md-3 col-12 mb-30">
                                        <input type="number" id="Number_Of_Bath" name="Property_Bath" placeholder="Number of Bathroom">
                                        <span class="error-msg"></span>
                                    </div>
                                   <div class="col-md-3 col-12 mb-30">
                                    <select id="Category" name="Property_Category" class="nice-select" style="display: none;">
                                            <option value="Rent">Rent</option>
                                            <option value="Sale">Sale</option>
                                    </select>
                                    <span class="error-msg"></span>
                                   </div>
                                   <div class="col-md-3 col-12 mb-30">
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
                                   <div class="col-md-3 col-12 mb-30">
                                        <input type="text" id="Location" name="Location" placeholder="Location">
                                        <span class="error-msg"></span>
                                    </div>
                                    <div class="col-md-3 col-12 mb-30">
                                        <input type="text" id="Property_Map_Link" name="Property_Map_Link" placeholder="Property Map Link">
                                        <span class="error-msg"></span>
                                    </div>
                                   <div class="col-md-12 col-12 mb-30">
                                        <input type="file" id="Property_Images[]" name="Property_Images" placeholder="Contact Number" onblur="ValidateFileTypeAll(this)" multiple>
                                        <span class="error-msg"></span>
                                    </div>
                                   <div class="col-12 mb-30">
                                        <label for="about_me">Notes</label>
                                        <textarea class="" id="Property_Description" name="Property_Description"></textarea>

                                        <!-- <textarea id="p_notes"></textarea> -->
                                        <span class="error-msg"></span>
                                    </div>
                                   <div class="col-12 mb-30"><button class="btn">Save</button></div>
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
      ClassicEditor
            .create( document.querySelector( '#Property_Description' ) )
            .catch( error => {
                console.error( error );
            } );
	</script>
@endpush