@extends('layouts.app')
@section('title','Settings | B.M.I.S.')

@section('content')

    <section class="content-header">
        <h1 class="page-title">Settings</h1>
    </section>
    
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{!! route('home') !!}"> Home </a></li>
            <li class="breadcrumb-item active"> Sector</li>
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
                <!-- Include -->
                <div class="mb-2">
                    <a href="#" class="btn btn-primary" style="float: right" data-toggle="modal" data-target="#addSectorModal">Add Sector</a>
                </div>
                <table class="table table-hover table-bordered table-mini brgy-datatable datatable" id="brgy-datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sector</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td scope="row">
                                <span class="badge">{{ $item->id }}</span>
                            </td>
                            <td>{{ $item->sector }}</td>
                            <td>
                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editSectorModal" data-id="{{ $item->id }}" data-sector="{{ $item->sector }}">Edit</a>
                                <form action="{{ route('sector.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Close Include -->            
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.Dashboard -->
    </section>
    <!-- ./section -->

    <!-- Add Sector Modal -->
    <div class="modal fade" id="addSectorModal" tabindex="-1" role="dialog" aria-labelledby="addSectorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSectorModalLabel">Add Sector</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="sectorForm" action="{{ route('sector.store') }}" method="POST">

                    @csrf
                    <div class="form-group">
                        <label for="sectorName">Sector Name</label>
                        <input type="text" class="form-control" id="sector" name="sector" placeholder="Enter sector name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Sector Modal -->
    <div class="modal fade" id="editSectorModal" tabindex="-1" role="dialog" aria-labelledby="editSectorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSectorModalLabel">Edit Sector</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editSectorForm" action="{{ route('sector.update', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editSector">Sector</label>
                            <input type="text" class="form-control" id="editSector" name="sector" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                
                
                
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Edit Sector Modal
            $('#editSectorModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var sectorId = button.data('id');
                var sectorName = button.data('sector');
                var modal = $(this);
                modal.find('.modal-title').text('Edit Sector');
                modal.find('#editSector').val(sectorName);
                modal.find('#editSectorForm').attr('action', "{{ route('sector.update', '') }}/" + sectorId);
            });
        });
    </script>

@endsection

