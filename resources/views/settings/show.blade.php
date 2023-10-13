<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Official Details</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('settings.updates', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{ $item->name }}">
                    <label for="position">Position:</label>
                    <input type="text" name="position" value="{{ $item->position }}">
                    <!-- Other input fields for updating details -->
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>