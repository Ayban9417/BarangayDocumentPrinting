@extends('layouts.app')
@section('title', 'Add New Resident')

@section('content')

    <section class="content-header">
        <h1 class="page-title">Add New Resident</h1>
    </section>

    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{!! route('home') !!}">Home</a></li>
            <li class="breadcrumb-item"><a href="{!! route('residents.index') !!}">Residents</a></li>
            <li class="breadcrumb-item active">Add New Resident</li>
        </ul>
    </div>

    <!-- Section -->
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">New Resident Portal</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('residents.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-8">
                            <input id="household_no" type="text" class="form-control" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" name="household_no" value="{{ old('household_no') }}" required placeholder="Household Number">

                            @if ($errors->has('household_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('household_no') }}</strong>
                                </span>
                            @endif
                        </div>
                        

                        <div class="col-md-4">
                            <input id="suffix" type="text" class="form-control" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' name="suffix" value="{{ old('suffix') }}" placeholder="Suffix">

                            @if ($errors->has('suffix'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('suffix') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <br/>

                    <div class="row">
                        <div class="col-md-4">
                            <input id="lastname" type="text" class="form-control" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))' name="lastname" value="{{ old('lastname') }}" required placeholder="Lastname">

                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <input id="firstname" type="text" class="form-control" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))' name="firstname" value="{{ old('firstname') }}" required placeholder="Firstname">

                            @if ($errors->has('firstname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <input id="middlename" type="text" class="form-control" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))' name="middlename" value="{{ old('middlename') }}" placeholder="Middlename">

                            @if ($errors->has('middlename'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('middlename') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                      
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{ old('date') }}" max="@php $today= date('Y-m-d');echo $today; @endphp" required placeholder="Birth Date">

                            @if ($errors->has('birth_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('birth_date') }}</strong>
                                </span>
                            @endif
                        </div>
                     
                        <div class="col-md-4">
                            <select  id="gender" name="gender" class="form-control" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>

                            @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <input id="occupation" type="text" class="form-control" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))' name="occupation" value="{{ old('occupation') }}" placeholder="Occupation">

                            @if ($errors->has('occupation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('occupation') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <select  id="civil_status" name="civil_status" class="form-control" required>
                                <option value="" disabled selected>Civil Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widower">Widower</option>
                                <option value="Seperated">Seperated</option>
                            </select>

                            @if ($errors->has('civil_status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('civil_status') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <input id="sitio" type="text" class="form-control"  onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))' name="sitio" value="{{ old('sitio') }}" placeholder="Sitio">

                            @if ($errors->has('sitio'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sitio') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        @if(Auth::user()->usertype == 'admin')
                            <div class="col-md-4">
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
                        @else
                            <div class="col-md-4">
                                <input id="barangay" placeholder="{{Auth()->user()->barangay}}" value="{{Auth()->user()->barangay}}" type="text" class="form-control"  onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))' name="barangay" value="{{ old('barangay') }}" readonly>

                                @if ($errors->has('barangay'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('barangay') }}</strong>
                                    </span>
                                @endif
                            </div>
                        @endif
                        
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-8">
                            <input id="birthplace" type="text" class="form-control" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 45))' name="birthplace" value="{{ old('birthplace') }}" placeholder="Birthplace">

                            @if ($errors->has('birthplace'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('birthplace') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br>

                                <div class="form-group">
                                <label>Profile Image</label>
                                <input type="file" name="image" accept="image/*">
                            </div>

                    
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="sumbit" class="btn btn-primary">Save Resident</button>
                </div>
        </form>
            </div>
        </div>
    </section>
    <!-- ./section -->

@endsection
