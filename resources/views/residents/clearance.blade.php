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
               

                <table class="table table-hover table-bordered table-mini datatable" id="residents-datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>House No.</th>
                            <th>Lastname</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                            <th>Suffix</th>
                            <th>Sex</th>
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
                          
                          
                            <td>
                                <span class="badge">{{ $item->resID }}</span>
                            </td>
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
                             
                               
                                <a href="{{ route('barangay.clearance', ['id' => $item->resID]) }}"  target="_blank" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Barangay Certification">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                              
                        </a>                              
                            </td>
                            <!-- End Action Col -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>

    </section>

    
@endsection

@section('scripts')
<script type="text/javascript">
  
    $("button#submit").prop("disabled", true);

    let isOk = true;

    $("input, select").change(function ()
    {
        $("input, select").each(()=>
        {
            console.log(this); 
            if($(this).val() === "") 
            {
                isOk = false;
            } 
        });
        
        if(isOk) $("button#submit").prop("disabled", false);
    });

    $("input#findTo").prop("readonly", true);

    let isOkay = true;

    $("input#findFrm").change(function ()
    {
        $("input#findFrm").each(()=>
        {
            console.log(this); 
            if($(this).val() === "") 
            {
                isOkay = false;
            } 
        });
        
        if(isOkay) $("input#findTo").prop("readonly", false);
    });

</script>
@endsection