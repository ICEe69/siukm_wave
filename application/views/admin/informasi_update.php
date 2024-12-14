<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-tachometer-alt"></i> Form Update Informasi
    </div>

    <?php foreach ($informasi as $inf): ?>

        <form method="post" action="<?php echo base_url('admin/informasi/update_aksi') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Icon</label>
                <input type="hidden" name="id_informasi" value="<?php echo $inf->id_informasi ?>">
                <input type="text" name="icon" class="form-control" value="<?php echo $inf->icon ?>" required>
            </div>
            <div class="form-group">
            <label>Judul Informasi</label>
                <select name="nama_kegiatan" class="form-control">
                    <option value="<?php echo $inf->nama_kegiatan ?>"><?php echo $inf->nama_kegiatan ?></option>
                    <?php foreach($kegiatan as $kgt): ?>
                    <option value="<?php echo $kgt->nama_kegiatan ?>"><?php echo $kgt->nama_kegiatan ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
            <label>Isi Informasi</label>
                <select name="deskripsi" class="form-control">
                    <option value="<?php echo $inf->deskripsi ?>"><?php echo $inf->deskripsi ?></option>
                    <?php foreach($kegiatan as $kgt): ?>
                    <option value="<?php echo $kgt->deskripsi ?>"><?php echo $kgt->deskripsi ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>
