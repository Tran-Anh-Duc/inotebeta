{{-- Modal sửa note --}}
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action=""  id="form-edit" method="POST" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Cập nhật</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Name</label>
                        <label for="name-edit"></label><input type="text" class="form-control" id="name-edit" placeholder="Nhập vào họ tên">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="description" id="description-edit" class="form-control" value="" required="required" title="">
                    </div>

                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category" id="category-edit" class="form-control" required="required">
                            <option value="work">Đi làm</option>
                            <option value="school">Đi học </option>
                            <option value="play">Đi chơi</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Edit</button>

                </div>
            </form>
        </div>
    </div>
</div>
