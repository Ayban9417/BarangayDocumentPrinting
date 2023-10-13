@extends('layouts.app')
@section('title','Barangay Setting | B.M.I.S.')

@section('content')

    <section class="content-header">
        <h1 class="page-title">Settings</h1>
    </section>
    
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{!! route('home') !!}"> Home </a></li>
            <li class="breadcrumb-item active"> Officials</li>
        </ul>
    </div>
    
    <!-- Section -->
    <section class="content">
        <!-- Dashboard -->
        <div class="card card-primary card-outline card-outline-tabs">
            <!-- card-header -->
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    @include('settings.nav_tab')
                </ul>
            </div>
            <!-- /.card-header -->

            <!-- card-body -->
            <div class="card-body">
                <!-- Brgy -->
                <table class="table table-hover table-bordered table-mini brgy-datatable datatable" id="brgy-datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td scope="row">
                                <span class="badge">{{ $item->id }} </span>
                            </td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->position}}</td>
                            
                            <td>
                                <a href="" href="{{ route('settings.shows', $item->id) }}" data-toggle="modal" data-target="#editModal{{ $item->id }}" type="button" class="btn btn-primary btn-xs"  data-placement="top" title="Edit">
                                    <i class="fa fa-edit" aria-hidden="true"></i></a>
                            </td>
                        </tr>

                        <!-- Move modal inside the loop -->
                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Official</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('settings.updates', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                        
                                            <div class="form-group">
                                                <label for="name{{ $item->id }}">Name</label>
                                                <input type="text" class="form-control" id="name{{ $item->id }}" name="name" value="{{ $item->name }}" required>
                                            </div>
                        
                                            <div class="form-group">
                                                <label for="position{{ $item->id }}">Position</label>
                                                <select class="form-control" id="position{{ $item->id }}" name="position" required>
                                                    <option value="Barangay Chairman" {{ $item->position == 'Barangay Chairman' ? 'selected' : '' }}>Barangay Chairman</option>
                                                    <option value="Barangay Captain" {{ $item->position == 'Barangay Captain' ? 'selected' : '' }}>Barangay Captain</option>
                                                    <option value="Secretary" {{ $item->position == 'Secretary' ? 'selected' : '' }}>Secretary</option>
                                                    <!-- Add more options as needed -->
                                                </select>
                                            </div>
                        
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of modal -->

                        @endforeach
                    </tbody>
                </table>
                
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.Dashboard -->
    </section>
    <!-- ./section -->

@endsection