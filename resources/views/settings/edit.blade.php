
@extends('layouts.app')
@section('title','Barangay Setting | B.M.I.S.')

@section('content')

    <section class="content-header">
        <h1 class="page-title">Settings</h1>
    </section>
    
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href={!! route('home') !!}> Home </a></li>
            <li class="breadcrumb-item active"> Barangay Settings</li>
        </ul>
    </div>
    
    <!-- Section -->
    <section class="content">
        <!-- Dashboard -->
       <!-- edit.blade.php -->
            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="logo">Logo:</label>
                    <input type="file" class="form-control-file" id="logo" name="logo">
                    @if ($settings->logo)
                    <img src="{{ asset($settings->logo) }}" alt="Logo">
                    @endif
                </div>

                <div class="form-group">
                    <label for="name">Barangay Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $settings->name }}">
                </div>
                <div class="form-group">
                    <label for="municipality">Municipality/City:</label>
                    <input type="text" class="form-control" id="municipality" name="municipality" value="{{ $settings->municipality }}">
                </div>
                <div class="form-group">
                    <label for="province">Province:</label>
                    <input type="text" class="form-control" id="province" name="province" value="{{ $settings->province }}">
                </div>


                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        <!-- /.Dashboard -->
    </section>
    <!-- ./section -->

@endsection