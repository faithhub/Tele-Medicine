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
                    <h6 class="h2 text-white d-inline-block mb-0">Patients</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Patients</a></li>
                            <li class="breadcrumb-item active" aria-current="page">List of All Patients</li>
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
            <div class="text-center">
                @include('admin.layouts.includes.alert')
            </div>
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">List of All Patients</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">S/N</th>
                                <th scope="col" class="sort" data-sort="name">Name</th>
                                <th scope="col" class="sort" data-sort="budget">Email</th>
                                <th scope="col" class="sort" data-sort="status">Mobile</th>
                                <th scope="col" class="sort" data-sort="status">Age</th>
                                <th scope="col" class="sort" data-sort="status">Gender</th>
                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <th scope="col" class="sort" data-sort="status">Date Reg</th>
                                <th scope="col" class="sort" data-sort="completion">Completion</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($patients as $patient)                                
                            <tr>                                
                                <td class="budget">
                                    {{$sn++}}
                                </td>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$patient->name}}</span>
                                        </div>
                                    </div>
                                </th>
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$patient->email}}</span>
                                        </div>
                                    </div>
                                </td>                                
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$patient->mobile}}</span>
                                        </div>
                                    </div>
                                </td>                               
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{ (date('Y') - date('Y', strtotime($patient->dob))) }}</span>
                                        </div>
                                    </div>
                                </td>                                                               
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$patient->gender}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if ($patient->status == 'Pending')                                        
                                        <span class="badge badge-dot bg-warning mr-4 p-2">
                                            <span class="text-white" style="font-weight: 700">{{ $patient->status}}</span>
                                        </span>
                                        @elseif($patient->status == 'Active')                                        
                                        <span class="badge badge-dot bg-success mr-4 p-2">
                                            <span class="text-white" style="font-weight: 700">{{ $patient->status}}</span>
                                        </span>
                                        @elseif($patient->status == 'Inactive')                                        
                                        <span class="badge badge-dot bg-danger mr-4 p-2">
                                            <span class="text-white" style="font-weight: 700">{{ $patient->status}}</span>
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{  date('D, M j, Y \a\t g:ia', strtotime($patient->created_at))}}</span>
                                        </div>
                                    </div>
                                </td>
                               
                                <td class="text-right">
                                    <div class="dropdown">
                                        
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#ViewModal{{$patient->id}}">View</a>
                                            <a class="dropdown-item" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#deleteModal{{$patient->id}}">Delete</a>
                                            @if ($patient->status == 'Pending')                                                
                                            <a class="dropdown-item" href="{{ url('admin/status/?status=Active&id='.$patient->id) }}">Approve</a>
                                            @endif
                                            @if ($patient->status == 'Active')                                                
                                            <a class="dropdown-item" href="{{ url('admin/status/?status=Inactive&id='.$patient->id) }}">Deactivate</a>
                                            @endif
                                            @if ($patient->status == 'Inactive')                                                
                                            <a class="dropdown-item" href="{{ url('admin/status/?status=Active&id='.$patient->id) }}">Activate</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <div class="modal fade" id="deleteModal{{$patient->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            </div>
                                            <div class="modal-body text-center">
                                                <form method="post" action="{{ url('admin/delete_doctor') }}">
                                                  @csrf
                                                    <input type="hidden" value="{{$patient->id }}" name="id">
                                                    <h1>Are you sure?</h1>
                                                    <h4>You will not be able to recover this record</h4>
                                                    <!-- csrf token -->
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
    
                              <!-- Modal -->
                              <div class="modal fade" id="ViewModal{{ $patient->id }}" tabindex="-1" role="dialog" aria-labelledby="uploadPictureTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="uploadPictureTitle">{{ $patient->name }} 
                                        
                                      </h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                        <div class="modal-body">
                                          <div class="card card-profile">
                                            <div class="card-body p-0">
                                              <div class="row">
                                                <div class="col-7">
                                                  <h2 class="text-capitalize" style="font-size: 20px;
                                                  font-weight: 700;
                                                  margin-bottom: 3px;">{{ $patient->name }}</h2>
                                                 <h2 style="font-size: 14px;
                                                  color: #757575;
                                                  margin-bottom: 15px;">{{ (date('Y') - date('Y', strtotime($patient->age))) }} years</h2>
                                                  <h2 style="font-size: 14px;
                                                  color: #757575;
                                                  margin-bottom: 15px;">{{ $patient->gender }}</h2>
                                                  <h2 style="font-size: 14px;
                                                  color: #757575;
                                                  margin-bottom: 15px;">{{ $patient->country->name }}</h2>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                                </div>
                              </div>
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