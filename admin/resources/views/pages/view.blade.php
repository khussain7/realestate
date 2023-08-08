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
                            <h4 style="color:#d7d38d;">Pages list</h4>
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