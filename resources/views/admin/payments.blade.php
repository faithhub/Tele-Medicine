@extends('admin.layouts.app')
@section('content')
<script  src="https://code.jquery.com/jquery-3.5.1.js"></script>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Payments</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Payments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">List of All Payments</li>
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
                    <h3 class="mb-0">List of All Payments</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">S/N</th>
                                <th scope="col" class="sort" data-sort="budget">Name</th>
                                <th scope="col" class="sort" data-sort="name">Transaction ID</th>
                                <th scope="col" class="sort" data-sort="status">TX REF</th>
                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <th scope="col" class="sort" data-sort="status">Paid On</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($payments as $payment)                                
                            <tr>                                
                                <td class="budget">
                                    {{$sn++}}
                                </td>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$payment->user->name}}</span>
                                        </div>
                                    </div>
                                </th>
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$payment->transaction_id}}</span>
                                        </div>
                                    </div>
                                </td>                                
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$payment->tx_ref}}</span>
                                        </div>
                                    </div>
                                </td>                                  
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            @if ($payment->status == 'successful')                      
                                            <i class="btn btn-sm btn-warning mr-3">{{$payment->status}}</i>
                                            @else
                                            <i class="btn btn-sm btn-danger mr-3">{{$payment->status}}</i>
                                            @endif
                                        </div>
                                    </div>
                                </td>                                                               
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            {{ date('D, M j, Y \a\t g:ia', strtotime($payment->created_at)) }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
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