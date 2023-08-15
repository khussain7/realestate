@extends('layouts.header')
@section('title', 'List Property')
@section('content')

<div class="container">
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom pt-50">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Property List</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ url('/propertyr/addproperty') }}" class="btn btnhref">Add New Property</a></li>
      </ul>
</header>
<div class="row row-100">
    <div class="col">
        @if(Session::has('success'))
        <div class="alert alert-danger">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
    </div>
</div>
<form id="postaction" method="POST" action="{{ url('/propertyr/actionpage') }}" enctype="multipart/form-data" class="form-inline">
    @csrf
      <input type="hidden" id="PropertyId" name="PropertyId" />
      <input type="hidden" id="ActionTaken" name="ActionTaken" />
</form>
<div class="">
    <table class="table table-striped table-hover" id="list">
      <thead>
        <tr>
            <td>Referance Number</td>
            <td>City</td>
            <td>Price</td>
            <td>Area</td>
            <td>Bedrooms</td>
            <td>Bath</td>
            <td>Purpose</td>
            <td>Action</td>
        </tr>
      </thead>  
      <tbody>
      
@foreach( $propertylist as $pdata)
@php
   $format_numberPrice = number_format($pdata->Price, 2, ".", ",");
   $format_numberArea = number_format($pdata->Area, 2, ".", ",");
   $PId = $pdata->PropertyId;
 @endphp
   <tr>
      <td>{{ $pdata['ReferanceNumber'] }} - {{ $pdata->PropertyId }}</td>
      <td>{{ $pdata['City'] }}</td>
      <td>{{ $format_numberPrice }}</td>
      <td>{{ $format_numberArea }}</td>
      <td>{{ $pdata['Bedroorms'] }}</td>
      <td>{{ $pdata['Bathrooms'] }}</td>
      <td>{{ $pdata['Purpose'] }}</td>
      <td>
         <span class="badge bg-primary" onclick="viewproperty('{{ $pdata->PropertyId }}', 'view')">View</span>
         <span class="badge bg-danger"  onclick="viewproperty('{{ $pdata->PropertyId }}', 'delete')">Delete</span>
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

            function viewproperty(pid, actiontaken){
              let message = (actiontaken === 'delete') ? "Are you sure you want to delete proprety" : "Are you sure you want to view proprety details";
              if (confirm(message)) {
                  //If user say 'yes' to confirm
                  document.getElementById("PropertyId").value = pid;
                  document.getElementById("ActionTaken").value = actiontaken;
                  let postaction = document.getElementById("postaction");
                  postaction.submit();
                } else {
                   return false;
                }
                
             
            }
	</script>
@endpush