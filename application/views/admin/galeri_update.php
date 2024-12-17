<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-info" style="margin-right: 5px;"></i><strong>FORM UPDATE GALERI</strong>
    </div>

    <?php foreach ($galeri as $gr): ?>

        <form method="post" action="<?php echo base_url('admin/galeri/update_aksi') ?>" enctype="multipart/form-data">
            <div class="form-group">
            <label>Judul Informasi</label>
            <input type="hidden" name="id_galeri" value="<?php echo $gr->id_galeri ?>">
                <select name="nama_kegiatan" class="form-control">
                    <option value="<?php echo $gr->nama_kegiatan ?>"><?php echo $gr->nama_kegiatan ?></option>
                    <?php foreach($kegiatan as $kgt): ?>
                    <option value="<?php echo $kgt->nama_kegiatan ?>"><?php echo $kgt->nama_kegiatan ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" value="<?php echo $gr->deskripsi ?>" required>
            </div>
            <div class="form-group">
                <label>Galeri</label>
                <input type="file" name="galeri" class="form-control">
                <input type="hidden" name="existing_galeri" value="<?php echo $gr->galeri; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>
