@extends('layouts.header')
@section('title', 'Add Property')
@section('content')
 <!--Login & Register Section start-->
 <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row">
                <ul class="add-property-tab-list nav mb-50">
                            <li><a href="#PropertyDetailsDiv" data-bs-toggle="tab">1. Property Details</a></li>
                            <li><a href="#AmenitiesDiv" data-bs-toggle="tab">2. Amenities</a></li>
                            <li class="working"><a href="#UploadsDiv" data-bs-toggle="tab">3. Uploads</a></li>
                </ul>
            </div>
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
            <div class="tab-pane" id="gallery_video">
                            <div class="tab-body">
                                    
                 <form method="POST" action="{{ url('/propertyr/uploadimages') }}" enctype="multipart/form-data" class="form-data">
                    @csrf 
                            <div class="row">
                            <input type="hidden" id="bannerindex" name="bannerindex" value="0" />
                            <input type="hidden" id="PropertyId" name="PropertyId" value="{{$id}}" />
                            @if ($errors->has('PropertyId'))
                             <span class="text-danger">{{  $errors->first('PropertyId') }}</span>
                            @endif

                        <input type="file" name="files[]" id="files" class="form-control" onchange="return ValidateFileTypeAll(this)" multiple>
                        @if ($errors->has('files'))
                             <span class="text-danger">{{  $errors->first('files') }}</span>
                            @endif
                        <div id="showimages">

                        </div>
                         <div class="col-sm-12" style="margin-top:10px;">
                             <button class="btn">Upload</button>
                         </div>
                        </div>
                    </form>
                     </div> 
            </div>
        </div>
</div>
@endsection
@push('extra-js')
<script>
    function setasbanner(getId, filename){
        const boxes = document.querySelectorAll('.setasbanner');
        boxes.forEach(box => {
            box.innerHTML = "";
        });
        const idsplit = getId.split("-"); 
        document.getElementById("setasbanner-"+idsplit[1]).innerHTML = "Selected as banner";
        document.getElementById("bannerindex").value = filename;
    }
</script>
	
@endpush