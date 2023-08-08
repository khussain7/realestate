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
      <span class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Agent List</span>
      </span>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ url('/agentr/addagent') }}" class="btn btnhref">Add New Agent</a></li>
      </ul>
</header>

<div class="">
    <table class="table table-striped table-hover" id="list">
      <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Email</td>
            <td>Contact</td>
            <td>Nationality</td>
            <td>Date of Joining</td>
            <td>Action</td>
        </tr>
      </thead>  
      <tbody>
      
@foreach( $agentlist as $pdata)
   <tr> 
   <!-- 'users.id','users.name','users.email','users.image','users.role','users.contact_number','users.country_code','countries.countryname' -->
      <td> <img src="{{ url('/files/') }}/{{$pdata->image}}" width="50" /> </td>
      <td>{{ $pdata->name }}</td>
      <td>{{ $pdata->email }}</td>
      <td>{{ $pdata->contact_number }}</td>
      <td>{{ $pdata->countryname }}</td>
      <td>{{ $pdata->joindate }}</td>
      <td>
      <h4>
        <a href="{{ url('agentr/agentdetails/'.$pdata->id) }}" class="btn extra-maring btn-warning btn-sm">View Details</a>
        <a href="#" onclick="confirmation()" class="btn btn-danger extra-maring btn-warning btn-sm">Delete</a>
        <!-- {{ url('agentr/remove/'.$pdata->id) }} -->
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

            function confirmation(){
              e.preventDefault();
      var result = confirm("Are you sure to delete user");
      if(result){
         return true;
      }
      else{
        return false;
      }
    }
	</script>
@endpush