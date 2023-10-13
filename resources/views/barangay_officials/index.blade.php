@extends('layouts.app')
@section('title','Barangay Officials | B.M.I.S.')

@section('content')
    <!-- Page Header -->
    <section class="content-header">
        <h1 class="page-title">Barangay Officials</h1>
    </section>
    
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href={!! route('home') !!}> Home </a></li>
        <li class="breadcrumb-item active">Barangay Officials</li>
    </ul>
    <!-- /Page Header -->
    
    <!-- Section -->
    <section class="content">
        <!-- Dashboard -->
        <div class="card card-primary card-outline card-outline-tabs">
            <!-- card-header -->
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    @include('barangays.nav_tab')
                </ul>
            </div>
            <!-- /.card-header -->

            <!-- card-body -->
            <div class="card-body">
                <div class="row">
                    <h2>Residents</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($residents as $resident)
                                <tr>
                                    <td>{{ $resident->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <!-- Add official form -->
                    
                    <h2>Add Official</h2>
                    @if(session('success'))
                        <div>{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('officials.store') }}" method="POST">
                        @csrf
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                        
                        <label for="resident_id">Resident:</label>
                        <select id="resident_id" name="resident_id" required>
                            @foreach($residents as $resident)
                                <option value="{{ $resident->id }}">{{ $resident->name }}</option>
                            @endforeach
                        </select>
                        
                        <label for="position">Position:</label>
                        <input type="text" id="position" name="position" required>
                        
                        <button type="submit">Add Official</button>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.Dashboard -->
    </section>
    <!-- ./section -->


    
@endsection

