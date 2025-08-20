<div class="container">
    <h5>Tambah slider</h5>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="">Caption slider</label>
            <textarea type="text" name="caption_slider" class="form-control" id="editorku"><?php echo set_value("caption_slider") ?></textarea>
            <span class="small text-danger">
                <?php echo form_error('caption_slider'); ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="">Foto slider</label>
            <input type="file" name="foto_slider" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>