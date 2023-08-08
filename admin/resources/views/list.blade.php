@extends('layouts.header')
@section('title', 'List Property')
@section('content')

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
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Property List</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ url('/propertydetails') }}" class="btn btnhref">Add New Property</a></li>
      </ul>
</header>

<div class="">
    <table class="table table-striped table-hover" id="list">
      <thead>
        <tr>
            <td>Name</td>
            <td>Price</td>
            <td>Area</td>
            <td>Bedrooms</td>
            <td>Bath</td>
            <td>Category</td>
            <td>Action</td>
        </tr>
      </thead>  
      <tbody>
      
@foreach( $propertydetailslist as $pdata)
   <tr>
      <td>{{ $pdata['Property_Name'] }}</td>
      <td>{{ $pdata['Property_Price'] }}</td>
      <td>{{ $pdata['Property_Size'] }}</td>
      <td>{{ $pdata['Property_Bedrooms'] }}</td>
      <td>{{ $pdata['Property_Bath'] }}</td>
      <td>{{ $pdata['Property_Category'] }}</td>
      <td>
      
      <h4>
        <a href="{{ url('/propertydelete/'.$pdata['Id']) }}">
            <i class="bi bi-trash handover pr-10"></i> 
        </a></h4>
        <i class="bi bi-pencil-square handover"></i>
      </td>
    </tr>
@endforeach
      
</tbody>
</table>

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
	</script>
@endpush