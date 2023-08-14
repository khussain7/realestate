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
                            <h4 style="color:#d7d38d;">Add new Agent</h4>
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
                    <form method="POST" action="{{ url('/agentr/addagent') }}" enctype="multipart/form-data" class="form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-3 col-12 mb-30">
                                            <label>Agent Name</label>
                                            <input type="text" id="name" name="name" placeholder="Agent Name" />
                                            <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                            <label>Agent Email</label>
                                            <input type="email" id="email" name="email" placeholder="Agent Email" />
                                            <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Employee Title</label>
                                    <select id="role" name="role" class="nice-select" style="display: none;">
                                            <option value="CEO">CEO</option>
                                            <option value="Director">Director</option>
                                            <option value="Sales">Sales</option>
                                            <option value="Administrator">Administrator</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Select Country</label>
                                    <select id="country_code" name="country_code" class="nice-select" style="display: none;">
                                    @foreach( $countrylist as $country)
                                        {
                                            <option value="{{$country->id}}">{{ $country->countryname}} </option>
                                        }
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Date of Birth</label>
                                    <input type="date" id="birthday" name="birthday" placeholder="Date of Birth" />
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Contact Number</label>
                                    <input type="number" id="contact_number" name="contact_number" placeholder="Contact Number" />
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Job Title</label>
                                    <input type="text" id="user_job_title" name="user_job_title" placeholder="Job Title" />
                                    <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                    <label>Join Date</label>
                                    <input type="date" id="joindate" name="joindate" placeholder="Join Date" />
                                    <span class="error-msg"></span>
                                </div>
                                
                                <div class="col-md-12 col-12 mb-30">
                                    <label>Images <span style="color:#ccc;">(File Type : JPEG, JPG, PNG)</span> </label>
                                    <input type="file" id="image" name="image" placeholder="Number Of Bath" accept="image/png, image/jpg, image/jpeg"/>
                                    <span class="error-msg"></span>
                                </div>

                                <div class="col-md-12 col-12 mb-30">
                                    <label>Description</label>
                                    <textarea id="description" name="description"></textarea>
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
    //   ClassicEditor
    //         .create( document.querySelector( '#Property_Description' ) )
    //         .catch( error => {
    //             console.error( error );
    //         } );
            function rangeChange(setvalue, feildid){
                $("#"+feildid).val(setvalue);
            }
	</script>
    <script type="text/javascript">
    ClassicEditor
          .create( document.querySelector( '#Description' ) )
          .catch( error => {
              console.error( error );
          } );
            function rangeChange(setvalue, feildid){
                $("#"+feildid).val(setvalue);
            }
	</script>
@endpush