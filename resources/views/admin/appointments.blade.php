@extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.semanticui.min.css"/> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css"/> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/> 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.semanticui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script  src="https://code.jquery.com/jquery-3.5.1.js"></script>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Appointments</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Appointments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">List of All Appointments</li>
                        </ol>
                    </nav>
                </div>
                {{-- <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">List of All Appointments</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">S/N</th>
                                <th scope="col" class="sort" data-sort="name">Patient Name</th>
                                <th scope="col" class="sort" data-sort="budget">Doctor Name</th>
                                <th scope="col" class="sort" data-sort="status">Appointment Date</th>
                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <th scope="col" class="sort" data-sort="status">Date Booked</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($appointments as $patient)                                
                            <tr>                                
                                <td class="budget">
                                    {{$sn++}}
                                </td>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$patient->patient->name}}</span>
                                        </div>
                                    </div>
                                </th>
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">Dr. {{$patient->user->name}} ({{$patient->speciality->name}})</span>
                                        </div>
                                    </div>
                                </td>                                
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$patient->book_day}} - {{$patient->time}}</span>
                                        </div>
                                    </div>
                                </td>                               
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            @if ($patient->status == 'Pending')                                        
                                        <span class="badge badge-dot bg-warning mr-4 p-2">
                                            <span class="text-white" style="font-weight: 700">{{ $patient->status}}</span>
                                        </span>
                                        @elseif($patient->status == 'Confirmed')                                        
                                        <span class="badge badge-dot bg-success mr-4 p-2">
                                            <span class="text-white" style="font-weight: 700">{{ $patient->status}}</span>
                                        </span>
                                        @elseif($patient->status == 'Cancelled')                                        
                                        <span class="badge badge-dot bg-danger mr-4 p-2">
                                            <span class="text-white" style="font-weight: 700">{{ $patient->status}}</span>
                                        </span>
                                    @endif
                                        </div>
                                    </div>
                                </td>                                                               
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            {{ date('D, M j, Y \a\t g:ia', strtotime($patient->created_at)) }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                {{-- <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Footer -->
    {{-- @include('admin.layouts.includes.footer') --}}
</div>
<script>
$(document).ready(function(){
    $('#table').DataTable( {
        stateSave: true
    } );
})
</script>
@endsection