@extends('layouts.app')
@section('title','Resident List | B.M.I.S.')

@section('content')

    <section class="content-header">
        <h1 class="page-title">Residents</h1>
    </section>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href={!! route('home') !!}> Home </a></li>
        <li class="breadcrumb-item active">Resident</li>
    </ul>

    <section class="content">        
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    @php
                    $count = DB::table('residents')->count();
                $residents = DB::table('residents')->orderBy('lastname', 'asc')->get();
                if($count != 0)
                {
                    $last = $residents->last();
                }
                    @endphp

                    @if(Auth()->user()->usertype != 'admin')
                        @if($count != 0)
                            @if((date('m') - \Carbon\Carbon::parse($last->created_at)->format('m') >= '6'))
                                <form action="{{ route('residents.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input  type="file" name="file" accept=".xlsx, .xls" required>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-success btn-xs"><i class='fa fa-upload' ></i> Import Resident Data</button>
                                        </div>
                                    </div> 
                                </form>
                            @endif
                        @else
                            <form action="{{ route('residents.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input  type="file" name="file" accept=".xlsx, .xls" required>
                                        <input type="text" name="fullname" id="fullname" value="{{Auth()->user()->name}}" hidden>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-success btn-xs"><i class='fa fa-upload' ></i> Import Resident Data</button>
                                    </div>
                                </div> 
                            </form>
                        @endif
                    @else
                        <form action="{{ route('residents.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input  type="file" name="file" accept=".xlsx, .xls" required>
                                    <input type="text" name="fullname" id="fullname" value="{{Auth()->user()->name}}" hidden>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-success btn-xs"><i class='fa fa-upload' ></i> Import Resident Data</button>
                                </div>
                            </div> 
                        </form>
                    @endif
                </div>
                <div class="pull-right">
                    @if(Auth()->user()->usertype != 'admin')
                        @if($count != 0)
                            @if((date('m') - \Carbon\Carbon::parse($last->created_at)->format('m') >= '6'))
                                <a class="btn btn-info btn-xs" href="{{ route('residents.export') }}"><i class='fa fa-plus'></i> Add Resident </a>
                            @endif
                        @else
                            <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#create"><i class='fa fa-plus'></i> Add Resident </a>
                        @endif
                    @else
                        <a class="btn btn-info btn-xs" href="{{ route('residents.create') }}"><i class='fa fa-plus'></i> Add Resident </a>
                    @endif
                    <a class="btn btn-warning btn-xs" href="{{ route('residents.export') }}"><i class='fa fa-download' ></i> Export Excel Data</a>
                  
                </div>
            </div>            
            <div class="card-body">
                    <div class="card collapsed-card">
                        <div class="card-header">
                          <h3 class="card-title">Filter</h3>
          
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fa fa-times"></i>
                            </button>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('residents.index') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-group-prepend">
                                                <input  type="text" name="findHousehold" id="findHousehold" class="form-control sm my-0 py-1" placeholder="Household Number" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="input-group-prepend">
                                                <input value="{{old('findMe')}}" type="text" name="findMe" id="findMe" class="form-control sm my-0 py-1" placeholder="Firstname, Middlename or Lastname" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))'>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <br/>
                        
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="" selected disabled>Select Gender</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control" id="findSctr" name="findSctr">
                                                <option value="" selected disabled>Select Sector</option>
                                                @foreach($sector as $item)
                                                <option value="{{$item->id}}">{{$item->sector}}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group-prepend">
                                                <input type="text" name="findSitio" id="findSitio" class="form-control sm my-0 py-1" placeholder="Sitio" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))'>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control" id="findBrgy" name="findBrgy">
                                                <option value="" selected disabled>Select Barangay</option>
                                                @foreach($brgy as $item)
                                                <option value="{{$item->id}}">{{$item->barangay}}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                    </div>
                        
                                    <br/>
                        
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input  type="text" name="findFrm" id="findFrm" class="form-control sm" placeholder="Enter Age" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                        </div>
                                        to
                                        <div class="col-md-4">
                                            <input type="text" name="findTo" id="findTo" class="form-control sm" placeholder="Enter Age" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-xs mr-1"><i class="fa fa-search"></i>
                                            <b>{{ __('SEARCH') }}</b>
                                        </button>
                                        <button href="{{route('residents.index')}}" class="btn btn-primary btn-xs"><i class="fa fa-refresh"></i>
                                            <b>{{ __('RESET') }}</b>
                                        </button>
                                    </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                <table class="table table-hover table-bordered table-mini datatable" id="residents-datatable">
                    <thead>
                        <tr>
                          
                            <th>House No.</th>
                            <th>Lastname</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                            <th>Suffix</th>
                            <th>Sex</th>
                            <th>Civil Status</th>
                            <th>Birthday</th>
                            <th>Age</th>
                            <th>Sitio</th>
                            <th>Purok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($res as $item)
                        <tr>
                            <!-- No Col -->
                          
                          
                         
                            <!-- No Col -->
        
                            <!-- Household No Col -->
                            <td>
                                {{ $item->household_no }}
                            </td>
                            <!-- Household No Col -->
        
                            <!-- Lastname Col -->
                            <td>
                                {{ ucfirst($item->lastname) }}
                            </td>
                            <!-- Lastname Col -->
        
                            <!-- Firstname Col -->
                            <td>
                                {{ $item->firstname }}
                            </td>
                            <!-- Firstname Col -->
        
                            <!-- Middlename Col -->
                            <td>
                                {{ $item->middlename }}
                            </td>
                            <!-- Middlename Col -->
        
                            <!-- Suffix Col -->
                            <td>
                                @if(!empty($item->suffix))
                                    {{$item->suffix}}
                                @else
                                    -
                                @endif
                            </td>
                            <!-- Suffix Col -->
        
                            <!-- Gender Col -->
                            <td>
                                {{ $item->gender }}
                            </td>
                            <td>
                                {{ $item->civil_status }}
                            </td>
                            <!-- Gender Col -->
        
                            <!-- Birth Date Col -->
                            <td>
                                {{\Carbon\Carbon::parse($item->birth_date)->format('m/j/Y')}}
                            </td>
                            <!-- Birth Date Col -->
        
                            <!-- Age Col -->
                            <td>
                                {{ \Carbon\Carbon::parse($item->birth_date)->age }}
                            </td>
                            <!-- Age Col -->
        
                            <!-- Sitio Col -->
                            <td>
                                @if(!empty($item->sitio))
                                    {{$item->sitio}}
                                @else
                                    -
                                @endif
                            </td>
                            <!-- Sitio Col -->
        
                            <!-- Barangay Col -->
                            <td>
                                {{ $item->brgy }}
                            </td>
                            <!-- Barangay Col -->
        
                            <!-- Action Col -->
                            <td>
                                <div class="btn-group-vertical">
                                    <div class="btn-group" >
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Actions  
                                        </button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" href="{{ route('residents.show', $item->resID) }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                          </a>
                                          <a class="dropdown-item" href="{{ route('residents.edit', $item->resID) }}">
                                            <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                          </a>
                                          <a class="dropdown-item changeBrgy" href="#" data-res_id="{{$item->resID}}" data-toggle="modal" data-target="#changeBrgy">
                                            <i class="la la-edit" aria-hidden="true"></i> Change Purok
                                          </a>
                                          <a class="dropdown-item" href="{{ route('residents.transactions', $item->resID) }}">
                                            <i class="fa fa-history" aria-hidden="true"></i> Transactions
                                        </a>
                                        

                                          <a class="dropdown-item admindeleteRes" href="#" data-res_id="{{$item->resID}}" data-toggle="modal" data-target="#admindeleteRes">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                          </a>
                                        </div>
                                      </div>
                                      
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Requests
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#barangayClearanceModal{{ $item->resID }}">
                                                <i class="fa fa-print" aria-hidden="true"></i> Barangay Clearance
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#certificateOfIndigencyModal{{ $item->resID }}">
                                                <i class="fa fa-print" aria-hidden="true"></i> Certificate Of Indigency
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#businessPermitModal{{ $item->resID }}">
                                                <i class="fa fa-print" aria-hidden="true"></i> Business Permit
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#loanModal{{ $item->resID }}">
                                                <i class="fa fa-print" aria-hidden="true"></i> Loan Request
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cuttingModal{{ $item->resID }}">
                                                <i class="fa fa-print" aria-hidden="true"></i> Cutting Trees
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <!-- Barangay Clearance Modal -->
                                    <div class="modal fade" id="barangayClearanceModal{{ $item->resID }}" tabindex="-1" role="dialog" aria-labelledby="barangayClearanceModalLabel{{ $item->resID }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="barangayClearanceModalLabel{{ $item->resID }}">Barangay Clearance Payment Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to proceed with the payment P 100.00 and print the Barangay Clearance?</p>
                                                </div>
                                                <div class="form-group">
                                                
                                            </div>
                                                <div class="modal-footer">
                                                    <!-- <a href="{{ route('barangay.clearance', ['id' => $item->resID]) }}" target="_blank" class="btn btn-primary" onclick="createRequest({{ $item->resID }})">Proceed</a> -->
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#orModal{{ $item->resID }}">Proceed</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                          <!-- Loan Modal -->
                                    <div class="modal fade" id="loanModal{{ $item->resID }}" tabindex="-1" role="dialog" aria-labelledby="loanModalLabel{{ $item->resID }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="loanModalLabel{{ $item->resID }}">Certificate Payment Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to proceed with the payment P 100.00 and print the Certificate?</p>
                                                </div>
                                                <div class="form-group">
                                                
                                            </div>
                                                <div class="modal-footer">
                                                    <!-- <a href="{{ route('barangay.clearance', ['id' => $item->resID]) }}" target="_blank" class="btn btn-primary" onclick="createRequest({{ $item->resID }})">Proceed</a> -->
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#loanApplyModal{{ $item->resID }}">Proceed</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- cutting trees -->
                                    <div class="modal fade" id="cuttingModal{{ $item->resID }}" tabindex="-1" role="dialog" aria-labelledby="cuttingModalLabel{{ $item->resID }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="cuttingModalLabel{{ $item->resID }}">Certificate Payment Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to proceed with the payment P 100.00 and print the Certificate?</p>
                                                </div>
                                                <div class="form-group">
                                                
                                            </div>
                                                <div class="modal-footer">
                                                    <!-- <a href="{{ route('barangay.clearance', ['id' => $item->resID]) }}" target="_blank" class="btn btn-primary" onclick="createRequest({{ $item->resID }})">Proceed</a> -->
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#cuttingApplyModal{{ $item->resID }}">Proceed</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <!-- Certificate of Indigency Modal -->
                                    <div class="modal fade" id="certificateOfIndigencyModal{{ $item->resID }}" tabindex="-1" role="dialog" aria-labelledby="certificateOfIndigencyModalLabel{{ $item->resID }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="certificateOfIndigencyModalLabel{{ $item->resID }}">Certificate Of Indigency Payment Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to proceed with the payment of P 0.00 and print the Certificate Of Indigency?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ route('barangay.indigency', ['id' => $item->resID]) }}" target="_blank" class="btn btn-primary" onclick="createRequest({{ $item->resID }})">Proceed</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Business Permit Modal -->
                                    <div class="modal fade" id="businessPermitModal{{ $item->resID }}" tabindex="-1" role="dialog" aria-labelledby="businessPermitModalLabel{{ $item->resID }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="businessPermitModalLabel{{ $item->resID }}">Business Permit Payment Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to proceed with the payment P 150.00 and print the Business Permit?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#applyModal{{ $item->resID }}">Proceed</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                               
                              

                            </td>
                            <!-- End Action Col -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @foreach($res as $item)
                <div class="modal fade" id="applyModal{{ $item->resID }}" tabindex="-1" role="dialog" aria-labelledby="applyModal{{ $item->resID }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="applyModal{{ $item->resID }}Label">Apply for Business Permit - {{ $item->lastname }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="businessPermitForm{{ $item->resID }}" action="{{ route('business.certificate', ['id' => $item->resID]) }}" method="GET" target="_blank" >
                                    <div class="form-group">
                                        <label for="businessName">Business Name:</label>
                                        <input type="text" class="form-control" id="businessName" name="businessName" placeholder="Enter business name">
                                    </div>
                                    <div class="form-group">
                                        <label for="businessAddress">Business Address:</label>
                                        <input type="text" class="form-control" id="businessAddress" name="businessAddress" placeholder="Enter business address">
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="businessAddress">OR #:</label>
                                        <input type="text" class="form-control" id="orNo" name="orNo" placeholder="Enter OR #"> -->
                                    </div>
                                    <input type="hidden" name="residentId" value="{{ $item->resID }}">
                                    <button type="submit" class="btn btn-primary">Proceed</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
@endforeach

<!-- Loan -->
@foreach($res as $item)
                <div class="modal fade" id="loanApplyModal{{ $item->resID }}" tabindex="-1" role="dialog" aria-labelledby="loanApplyModal{{ $item->resID }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="loanApplyModal{{ $item->resID }}Label">Apply for Loan - {{ $item->lastname }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="businessPermitForm{{ $item->resID }}" action="{{ route('loan.certificate', ['id' => $item->resID]) }}" method="GET" target="_blank" >
                                    <div class="form-group">
                                        <label for="businessName">Business Name:</label>
                                        <input type="text" class="form-control" id="businessName" name="businessName" placeholder="Enter business name">
                                    </div>
                                    <div class="form-group">
                                        <label for="businessSpecifications">Specifications:</label>
                                        <textarea class="form-control" id="businessSpecifications" name="businessSpecifications" placeholder="Ex. farm of Corn area also a tenant of this area of 1.0 Ha located at P-4 Bolocaon, Kitaotao Bukidnon also a farmer’s, monthly fee: (7,000.00)."></textarea>
                                    </div>
                                    <input type="hidden" name="residentId" value="{{ $item->resID }}">
                                    <button type="submit" class="btn btn-primary">Proceed</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
@endforeach


<!-- Cutting -->

@foreach($res as $item)
                <div class="modal fade" id="cuttingApplyModal{{ $item->resID }}" tabindex="-1" role="dialog" aria-labelledby="cuttingApplyModal{{ $item->resID }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cuttingApplyModal{{ $item->resID }}Label">Apply for Cutting Tree - {{ $item->lastname }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="businessPermitForm{{ $item->resID }}" action="{{ route('cutting.certificate', ['id' => $item->resID]) }}" method="GET" target="_blank" >
                                    <div class="form-group">
                                        <label for="businessName">Tree Type:</label>
                                        <input type="text" class="form-control" id="treeType" name="treeType" placeholder="Enter Tree Type">
                                    </div>
                                    <div class="form-group">
                                        <label for="businessSpecifications">Specifications:</label>
                                        <textarea class="form-control" id="specifications" name="specifications" placeholder="Ex. Coconut Trees located at P-1, Bolocaon, Kitaotao, Bukidnon under Certificate of Land Title No. AT-18333 in the name of Mr.& Mrs. Norberto G. Cailing"></textarea>
                                    </div>
                                    <input type="hidden" name="residentId" value="{{ $item->resID }}">
                                    <button type="submit" class="btn btn-primary">Proceed</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
@endforeach

<!-- Cutting -->


@foreach($res as $item)
                <div class="modal fade" id="orModal{{ $item->resID }}" tabindex="-1" role="dialog" aria-labelledby="orModal{{ $item->resID }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orModal{{ $item->resID }}Label">Apply for Clearance - {{ $item->lastname }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form id="businessPermitForm{{ $item->resID }}" action="{{ route('barangay.clearance', ['id' => $item->resID]) }}" method="GET" target="_blank" >       
                                    <div class="form-group">
                                        <label for="businessAddress">Cedula OR #:</label>
                                        <input type="text" class="form-control" id="orNo" name="orNo" placeholder="Enter OR #">
                                    </div>
                                    <input type="hidden" name="residentId" value="{{ $item->resID }}">
                                    <button type="submit" class="btn btn-primary">Proceed</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
@endforeach
                
            </div>
        </div>
       
    </section>

    <!-- Transfer Brgy Class -->
    <div class="modal fade" id="changeBrgy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Change Purok Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form action="{{ route('change.address') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    <h1 class="text-danger text-center">
                        <i class="fa fa-exclamation-triangle"></i>
                    </h1>
                        <p class="text-center">
                            Are you sure you want to change?
                        </p>
                        <input type="text" name="res_id" id="res_id" hidden>
                        <select  id="barangay" name="barangay" class="form-control">
                            <option value="" disabled selected>Select Purok</option>
                            @php
                                $get = DB::table('barangays')->get();
                                foreach($get as $value)
                                {
                                    echo "<option value=".$value->id.">$value->barangay</option>";
                                }
                            @endphp
                        </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No, Exit</button>
                    <button type="submit" class="btn btn-warning">Yes, Change</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- End Transfer Brgy Class -->

    <!-- Delete Modal -->
    <div class="modal fade" id="admindeleteRes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">Delete Resident Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form action="{{ route('residents.destroy', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE') 
                    <h1 class="text-danger text-center">
                        <i class="fa fa-exclamation-triangle"></i>
                    </h1>
                        <p class="text-center">
                            Are you sure you want to delete?
                        </p>
                        <input type="text" name="res_id" id="res_id" hidden>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No, Exit</button>
                    <button type="submit" class="btn btn-warning">Yes, Delete</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- End of Delete Modal -->

@endsection

@section('scripts')
<script type="text/javascript">
  
  $("button#submit").prop("disabled", true);

let isOk = true;

$("input, select").change(function () {
    $("input, select").each(function() {
        console.log(this); 
        if ($(this).val() === "") {
            isOk = false;
        } 
    });

    if (isOk) {
        $("button#submit").prop("disabled", false);
    } else {
        $("button#submit").prop("disabled", true);
    }
});

$("input#findTo").prop("readonly", true);

$("input#findFrm, input#findTo").on("input", function() {
    let fromValue = parseInt($("input#findFrm").val());
    let toValue = parseInt($("input#findTo").val());

    if (!isNaN(fromValue) && !isNaN(toValue) && fromValue <= toValue) {
        $("input#findTo").prop("readonly", false);
    } else {
        $("input#findTo").prop("readonly", true);
    }
});




    function printBusinessPermit(residentId) {
    // Logic to fetch the form data and generate the business permit
    // You can use AJAX to send the form data to the server for processing
    // Once the business permit is generated, you can trigger the printing functionality
    // You can use JavaScript libraries like Print.js or the browser's native print functionality
    // Adjust the logic according to your requirements
    // Example using Print.js library:
    printJS({
        printable: 'form-element-id', // Replace with the ID of the business permit form
        type: 'html',
        header: 'Business Permit - Resident ID: ' + residentId,
    });
}


function createRequest(residentId) {
    // Assuming you have a button or link with the class "submit-request-button" that triggers the AJAX request

$('.submit-request-button').on('click', function(event) {
  event.preventDefault();

  // Get the resident ID from the data attribute or any other source
  var residentId = $(this).data('resident-id');

  // Send the AJAX request
  $.ajax({
    url: '{{ route('resident.submit-request') }}',
    type: 'POST',
    data: { residentId: residentId },
    dataType: 'json',
    success: function(response) {
      // Handle the successful response
      console.log(response.message); // Log the success message

      // Perform any additional actions here, such as showing a success message to the user or updating the UI

      // Optionally, you can redirect the user to another page or perform any other desired action
    },
    error: function(xhr, status, error) {
      // Handle the error response
      console.log(xhr.responseText); // Log the error message

      // Perform any additional error handling or show an error message to the user
    }
  });
});

  }
</script>
@endsection