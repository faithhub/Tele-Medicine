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
                    <h6 class="h2 text-white d-inline-block mb-0">Prescriptions</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Prescriptions</a></li>
                            <li class="breadcrumb-item active" aria-current="page">List of All Prescriptions</li>
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
                    <h3 class="mb-0">List of All Prescriptions</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">S/N</th>
                                <th scope="col" class="sort" data-sort="budget">Doctor Name</th>
                                <th scope="col" class="sort" data-sort="name">Patient Name</th>
                                <th scope="col" class="sort" data-sort="status">Medicine Name</th>
                                <th scope="col" class="sort" data-sort="status">Medicine Type</th>
                                <th scope="col" class="sort" data-sort="status">Date Prescribed</th>
                                <th scope="col" class="sort" data-sort="status">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($prescriptions as $patient)                                
                            <tr>                                
                                <td class="budget">
                                    {{$sn++}}
                                </td>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">Dr. {{$patient->doctor->name}}</span>
                                        </div>
                                    </div>
                                </th>
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$patient->user->name}}</span>
                                        </div>
                                    </div>
                                </td>                                
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$patient->medicine_name}}</span>
                                        </div>
                                    </div>
                                </td>                                  
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$patient->medicine_type}}</span>
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
                                <td class="text-right">
                                    <div class="dropdown">
                                        
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#ViewModal{{$patient->id}}" class="dropdown-item" href="#">View</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            {{-- View Modal --}}
                            <div class="modal fade" id="ViewModal{{$patient->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        {{$patient->user->name}}
                                        </div>
                                        <div class="modal-body">
                                            <p>Patient Name: {{$patient->user->name}}</p>
                                            <p>Medicine Type: {{$patient->medicine_type}}</p>
                                            <p>Medicine Name: {{$patient->medicine_name}}</p>
                                            <p>MG/ML: {{$patient->mg_ml}}</p>
                                            <p>Dose: {{$patient->dose}}</p>
                                            <p>Day: {{$patient->day}}</p>
                                            <p>Medicine Comment: {{$patient->medicine_comment}}</p>
                                            <p>Overall Comment: {{$patient->overall_comment}}</p>
                                            <p>Prescribed On: {{ date('D, M j, Y \a\t g:ia', strtotime($patient->created_at)) }}</p>
                                            <!-- csrf token -->
                                            <div class="text-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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