<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-tachometer-alt"></i> Form Update Jabatan
    </div>

    <?php foreach ($jabatan as $jbt): ?>

        <form method="post" action="<?php echo base_url('admin/jabatan/update_aksi') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>NAMA JABATAN</label>
                <input type="hidden" name="id_jabatan" value="<?php echo $jbt->id_jabatan ?>">
                <input type="text" name="nama_jabatan" class="form-control" value="<?php echo $jbt->nama_jabatan ?>" required>
            </div>
            <div class="form-group">
                <label>DESKRIPSI</label>
                <input type="text" name="deskripsi" class="form-control" value="<?php echo $jbt->deskripsi ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>
