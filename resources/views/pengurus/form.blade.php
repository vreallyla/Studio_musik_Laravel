<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('post') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body" id="content">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="category" class="col-md-3 control-label">Photo</label>
                        <div class="col-md-6">
                            <input type="file" id="gambar_pengurus" name="gambar_pengurus" class="form-control content">
                            <p class="nama_pengurus content2"></p>
                            <span class="help-block with-errors content"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-md-3 control-label">Nama</label>
                        <div class="col-md-6">
                            <input type="text" id="nama_pengurus" name="nama_pengurus" class="form-control content" autofocus required>
                            <p class="nama_pengurus content2"></p>
                            <span class="help-block with-errors content"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-md-3 control-label">Email</label>
                        <div class="col-md-6">
                            <input type="email" id="email" name="email" class="form-control content" autofocus required>
                            <p class="email content2"></p>
                            <span class="help-block with-errors content"></span>
                        </div>
                    </div>
                    <div class="form-group content">
                        <label for="category" class="col-md-3 control-label">Password</label>
                        <div class="col-md-6">
                            <input type="password" id="password" name="password" class="form-control content" autofocus required>
                            <span class="help-block with-errors content"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-md-3 control-label">No. Telp</label>
                        <div class="col-md-6">
                            <input type="text" id="no_telp" name="no_telp" class="form-control content" autofocus required>
                            <p class="no_telp content2"></p>
                            <span class="help-block with-errors content"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-md-3 control-label">Status</label>
                        <div class="col-md-6">
                            <select name="status_pengurus" id="status_pengurus" class="form-control content">
                                <option value="owner">owner</option>
                                <option value="pegawai">pegawai</option>
                            </select>
                            <p class="status_pengurus content2"></p>
                            <span class="help-block with-errors content"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-md-3 control-label">Alamat</label>
                        <div class="col-md-6">
                            <input type="text" id="alamat" name="alamat" class="form-control content" autofocus required>
                            <p class="no_telp content2"></p>
                            <span class="help-block with-errors content"></span>
                        </div>
                    </div>







                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save content">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>