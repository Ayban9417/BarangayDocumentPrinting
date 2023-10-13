@extends('layouts.app')
@section('title','Barangay Setting | B.M.I.S.')

@section('content')

    <section class="content-header">
        <h1 class="page-title">Settings</h1>
    </section>
    
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href={!! route('home') !!}> Home </a></li>
            <li class="breadcrumb-item active"> Barangay</li>
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
            <th>Purok</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td scope="row">
                <span class="badge">{{ $item->id }} </span>
            </td>
            <td>{{$item->barangay}}</td>
            <td>
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $item->id }}">Edit</a>
                <form action="{{ route('settings.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                
            </td>
        </tr>

        <!-- Move modal inside the loop -->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Purok</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('settings.updatep', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="barangay{{ $item->id }}">Purok</label>
                                <input type="text" class="form-control" id="barangay{{ $item->id }}" name="barangay" value="{{ $item->barangay }}" required>
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

                <!-- Add New Barangay Button -->
                <div class="text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                        Add New Purok
                    </button>
                </div>

                <!-- Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Add New Purok</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('settings.storep') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="barangay">Purok</label>
                                        <input type="text" class="form-control" id="barangay" name="barangay" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
</div>

                    </div>
</div>
<!-- /.Dashboard -->
</section>
<!-- ./section -->
@endsection
