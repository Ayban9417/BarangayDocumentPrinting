<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Official Details</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('settings.updatep', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="name">Purok:</label>
                    <input type="text" name="barangay" value="{{ $item->barangay }}">
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>