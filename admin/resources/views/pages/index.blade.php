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
                            <h4 style="color:#d7d38d;">Add new page</h4>
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
                    <form method="POST" action="{{ url('/addpages') }}" enctype="multipart/form-data" class="form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-3 col-12 mb-30">
                                            <label>Page Name</label>
                                            <input type="text" id="PageName" name="PageName" placeholder="Page Name">
                                            <span class="error-msg"></span>
                                </div>
                                <div class="col-md-3 col-12 mb-30">
                                            <label>Page Heading</label>
                                            <input type="text" id="PageHeading" name="PageHeading" placeholder="Page Heading">
                                            <span class="error-msg"></span>
                                </div>
                                <div class="col-md-12 col-12 mb-30">
                                            <label>Description</label>
                                            <textarea id="Description" name="Description"></textarea>
                                            <span class="error-msg"></span>
                                </div>
                                <div class="col-md-12 col-12 mb-30">
                                    <label>Images <span style="color:#ccc;">(File Type : JPEG, JPG, PNG)</span> </label>
                                    <input type="file" id="Attachments" name="Attachments[]" placeholder="Number Of Bath" accept="image/png, image/jpg, image/jpeg" onblur="ValidateFileTypeAll(this)" multiple />
                                    <span class="error-msg"></span>
                                </div>
                                
                                <div class="col-md-12 col-12 mb-30">
                                
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