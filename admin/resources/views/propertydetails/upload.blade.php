@extends('layouts.header')
@section('title', 'Add Property')
@section('content')
@php $j=1; @endphp
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
                            <div class="row row-100">
                    <div id="form-div">
                        <div class="">
                            <div class="form-header">

                            
                                <h4 style="color:#d7d38d;">Image uploades</h4>
                            </div>
               <form id="postaction" method="POST" action="{{ url('/propertyr/actionpage') }}" enctype="multipart/form-data" class="form-inline">
                  @csrf
                    <input type="hidden" id="PropertyId" name="PropertyId" value="{{$id}}" />
                    <input type="hidden" id="ActionTaken" name="ActionTaken" value="view" />
              </form>
                                    
                 <form method="POST" action="{{ url('/propertyr/uploadimages') }}" enctype="multipart/form-data" class="form-data">
                    @csrf 
                    <div class="row">
                        <div class="col-sm-12">
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
                            <div class="row">
                            <input type="hidden" id="bannerindex" name="bannerindex" value="0" />
                            <input type="hidden" id="PropertyId" name="PropertyId" value="{{$id}}" />
                            <input type="hidden" id="removeBanner" name="removeBanner"  value="0"/>
                            <input type="hidden" id="deletedlist" name="deletedlist"  value="0"/>
                            <input type="hidden" id="insertorupdate" name="insertorupdate"  value="{{$insertorupdate}}"/>
                            @if ($errors->has('PropertyId'))
                             <span class="text-danger">{{  $errors->first('PropertyId') }}</span>
                            @endif
                            <div class="col-sm-9">
                        <input type="file" name="files[]" id="files" class="form-control" onchange="return ValidateFileTypeAll(this)" multiple>
                            </div>
                        @if ($errors->has('files'))
                             <span class="text-danger">{{  $errors->first('files') }}</span>
                            @endif

                            <table class="table table-striped table-hover dataTable no-footer" id="imagetable">
                                    <tr>
                                        <td>Images</td>
                                        <td>Banner</td>
                                        <td>Action</td>
                                    </tr>

                                 @if($insertorupdate == "update")
                                    @foreach($propertyimages as $imglist)
                                            <tr id="row__{{ $imglist->Id }}">
                                            <td>
                                                <img src="{{ url('/files/') }}/{{$imglist->ImageName}}" alt="{{$imglist->ImageName}}" width = "70" />
                                            </td>
                                            <td>
                                            {{$imglist->IsBannner}}
                                            <span id="removebanner_{{ $imglist->Id }}">
                                                @if($imglist->IsBannner == "Yes")
                                                    <span class="badge bg-danger"  onclick="removebanner('{{$imglist->Id}}')">Remove Banner</span>
                                                @endif
                                            </span>
                                            
                                            </td>
                                            <td>
                                                <span class="badge bg-danger"  onclick="deleteimage('{{$imglist->Id}}', '{{$imglist->IsBannner}}')">Delete</span>
                                            </td>
                                            </tr>
                                    @endforeach
                                    @endif
                                </table>
                                </div>
                           
                        <div id="showimages">
                        </div>
                        </div>
                        
                            <div class="col-sm-12" style="margin: 20px;">
                                <span class="btn" id="propertydetails" onclick="backtopropertypage()"> << Property Details </span> 
                                <a href="{{ url('/propertyr/amenities/'.$id)}}" class="btn" id="amenitiesbtn"> << Amenities   </a>
                                <button class="btn btn-danger" id="updatebtn" disabled="true">Upload</button> 
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
    var arraylist = [];
    function setasbanner(getId, filename){
        const boxes = document.querySelectorAll('.setasbanner');
        boxes.forEach(box => {
            box.innerHTML = "";
        });
        const idsplit = getId.split("-"); 
        document.getElementById("addimg-"+idsplit[1]).innerHTML = "Selected as banner";
        document.getElementById("bannerindex").value = filename;
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

        function deleteimage(selid, isbanner){
            const response = confirm("Are you sure you delete image?");
            if(response == true)
            {
                var row = document.getElementById('row__'+selid);
            var getData = document.getElementById('deletedlist');
            arraylist.push(selid);
                getData.value = arraylist;
                row.parentNode.removeChild(row);
             if(isbanner == "Yes") {
                document.getElementById('removeBanner').value = selid;
                
             }
                return true;
            }
            return true;
        }

        function removebanner(selid)
        {
            const response = confirm("Are you sure you remove banner?");
            if(response == true)
            {
                document.getElementById('removeBanner').value = selid;
                document.getElementById('removebanner_'+selid).innerHTML = "";
            }
            return true;
        }

</script>
	
@endpush