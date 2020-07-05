<?php
// Error Upload
if ($this->session->flashdata('error')) {
    echo "<div class='alert alert-warning'>" . $this->session->flashdata('error') . "</div>";
}

//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form Open
echo form_open_multipart(base_url('backend/data_master/Menu/proses_edit/'), 'class="form-horizontal"');
?>

<p class="btn-group">
    <div class="btn-group float-left">
        <a href="<?php echo base_url('backend/data_master/Menu/') ?>" title="Kembali" class="btn btn-info btn-lg"><i class="fa fa-backward"></i> Kembali</a>
    </div>
</p>

<!-- Horizontal Form -->
<form action="" method="POST">
    <div class="card-body">
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Menu</label>
            <div class="col-sm-6">
                <input type="hidden" name="id_menu" value="<?php echo $isi_form->id_menu; ?>">
                <input type="text" class="form-control" name="nama" id="nama" placeholder=" Nama Menu..." value="<?php echo $isi_form->nama; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga Menu</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="harga" id="harga" placeholder=" Harga Menu..." value="<?php echo $isi_form->harga; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-6">
                <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder=" Deskripsi..."><?php echo $isi_form->deskripsi; ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload Foto</label>
            <div class="col-sm-6">
                <input type="file" accept="image/*" class="form-control" name="foto" id="foto">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Status Menu</label>
            <div class="col-sm-6">
                <select name="status" id="status" class="form-control">
                    <option value="Publish">Publikasikan</option>
                    <option value="Draft" <?php if ($isi_form->status == "Draft") {
                                                echo "selected";
                                            } ?>>Simpan Ke Draft
                    </option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-danger" name="reset"><i class="fa fa-times"></i> Reset</button>
            </div>
        </div>
    </div>
</form>

<?php echo form_close(); ?>