{{-- Modal thêm mới note --}}
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="" data-url="{{ route('notes.store') }}" id="form-add" method="POST" role="form">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add note</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Name</label>
                        <label for="name-add"></label><input name="name" type="text" class="form-control" id="name-add" placeholder="Nhập vào họ tên">
                    </div>


                    <div class="form-group">
                        <label for="">Description</label>
                        <input name="description" type="text"  id="description-add" class="form-control" value="" required="required" title="">
                    </div>

                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category" id="category-add" class="form-control" required="required">
                            <option value="work">Đi làm</option>
                            <option value="school">Đi học </option>
                            <option value="play">Đi chơi</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

