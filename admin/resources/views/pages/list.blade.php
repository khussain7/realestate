@extends('layouts.header')
@section('title', 'Add Property')
@section('content')

 <!--Login & Register Section start-->
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
                            <span class="fs-4">Pages List</span>
                        </a>

                        <ul class="nav nav-pills">
                            <li class="nav-item"><a href="{{ url('/addpages') }}" class="btn btnhref">Add New Page</a></li>
                        </ul>
                    </header>
               

                <table class="table table-striped table-hover" id="list">
      <thead>
        <tr>
            <td>Page Name</td>
            <td>Page Heading</td>
            <td>Description</td>
            <td>Action</td>
        </tr>
      </thead>  
      <tbody>
      
@foreach($pageslist as $pdata)
   <tr>
      <td>{{ $pdata['PageName'] }}</td>
      <td>{{ $pdata['PageHeading'] }}</td>
      <td> {!! $pdata['Description'] !!} </td>
      <td>
      <h4>
        <a href="{{ url('/propertiesview/'.$pdata['PropertyId']) }}" class="btn extra-maring btn-warning btn-sm">View Details</a>
      </td>
    </tr>
@endforeach
      
</tbody>
</table>
            </div>
        </div>
    </div>
    </div>

    <!--Login & Register Section end-->
@endsection
@push('extra-js')
	<script type="text/javascript">
    ClassicEditor
        //   .create( document.querySelector( '#Description' ) )
        //   .catch( error => {
        //       console.error( error );
        //   } );
            
            $(document).ready( function () {
                $('#list').DataTable();
            } );
	</script>
@endpush