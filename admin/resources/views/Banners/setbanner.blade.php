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
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom pt-50">
            <span href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">Banner List</span>
            </span>
        </header>
            <div class="row row-100">
                <div>
                <table class="table table-striped table-hover" id="list">
                        <thead>
                            <tr>
                            <td>Referance Number</td>
                            <td>Price</td>
                            <td>Area(SqFt)</td>
                            <td>Bedrooms</td>
                            <td>Bath</td>
                            <td>Category</td>
                            <td>Action</td>
                            </tr>
                        </thead>  
                    <tbody>
                    @foreach($bannerdetailslist as $pdata)
                    <tr>
                        <td>{{ $pdata['ReferanceNumber'] }}</td>
                        <td>
                            @php 
                            echo number_format($pdata['Price'], 2);
                            @endphp
                        </td>
                        <td>{{ $pdata['Area'] }} SqFt</td>
                        <td>{{ $pdata['Beds'] }}</td>
                        <td>{{ $pdata['Bath'] }}</td>
                        <td>{{ $pdata['Category'] }}</td>
                        <td>
                        <h4>
                            <a href="{{ url('/bannerr/remove/'.$pdata['PropertyId']) }}" class="btn extra-maring btn-warning btn-sm">Remove Banner</a>
                        </td>
                    </tr>
                    @endforeach
                        
                    </tbody>
                    </table>
                </div>
                <div id="form-div">
                    <div class="">
                        <div class="form-header">
                            <h4 style="color:#d7d38d;">Add Banner</h4>
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
                    <form method="POST" action="{{ url('/bannerr/addbanner') }}" enctype="multipart/form-data" class="form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-12 col-12 mb-30">
                                <p class="edit-property-text"> Maximum 6 Property can be set as banner </p>
                                <label>Select Property</label>
                                <select id="PropertyId" name="PropertyId" class="nice-select" style="display: none;">
                                @foreach( $propertydetailslist as $pdetail)
                                        {
                                            <option value="{{$pdetail->PropertyId}}">{{ $pdetail->ReferanceNumber}}</option>
                                        }
                                @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-30">
                                    <label>Banner Image <span style="color:#ccc;">(File Type : JPEG, JPG, PNG)</span> </label>
                                    <input type="file" id="BannerImage" name="BannerImage" placeholder="Number Of Bath" accept="image/png, image/jpg, image/jpeg" onblur="ValidateFileTypeAll(this)" multiple />
                                    <span class="error-msg"></span>
                                </div>
                               
                                @if($bannerdetailslist->count() >= 6)
                                    <div class="col-md-12 col-12 mb-30">
                                        <div class="col-12 mb-30"><button class="btn">Cant Remove</button></div>     
                                    </div>
                               
                                @else
                                
                                    <div class="col-md-12 col-12 mb-30">
                                        <div class="col-12 mb-30"><button class="btn">Save</button></div>     
                                    </div>
                               
                               @endif

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
          $(document).ready( function () {
                $('#list').DataTable();
            } );
            function rangeChange(setvalue, feildid){
                $("#"+feildid).val(setvalue);
            }
	</script>
@endpush