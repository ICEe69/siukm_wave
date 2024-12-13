<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-tachometer-alt"></i> Form Update kegiatan
    </div>

    <?php foreach ($kegiatan as $kgt): ?>

        <form method="post" action="<?php echo base_url('admin/kegiatan/update_aksi') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Kegiatan</label>
                <input type="hidden" name="id_kegiatan" value="<?php echo $kgt->id_kegiatan ?>">
                <input type="text" name="nama_kegiatan" class="form-control" value="<?php echo $kgt->nama_kegiatan ?>" required>
            </div>
            <div class="form-group">
                <label>Tanggal Kegiatan</label>
                <input type="date" name="tanggal_kegiatan" class="form-control" value="<?php echo $kgt->tanggal_kegiatan ?>" required>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="<?php echo $kgt->lokasi ?>" required>
            </div>
            <div class="form-group">
                <label>Penyelenggara</label>
                <input type="text" name="penyelenggara" class="form-control" value="<?php echo $kgt->penyelenggara ?>" required>
            </div>
            <div class="form-group">
                <label>Kuota</label>
                <input type="text" name="kuota" class="form-control" value="<?php echo $kgt->kuota ?>" required>
            </div>
            <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control" value="<?php echo $kgt->link ?>" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="" disabled>--Status--</option>
                    <option value="dibuka" <?php echo ($kgt->status == 'dibuka') ? 'selected' : ''; ?>>Di Buka</option>
                    <option value="ditutup" <?php echo ($kgt->status == 'ditutup') ? 'selected' : ''; ?>>Di Tutup</option>
                    <option value="selesai" <?php echo ($kgt->status == 'selesai') ? 'selected' : ''; ?>>Selesai</option>
                </select>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" value="<?php echo $kgt->deskripsi ?>" required>
            </div>
            <div class="form-group">
                <label>Poster</label>
                <input type="file" name="poster" class="form-control">
                <input type="hidden" name="existing_poster" value="<?php echo $kgt->poster; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>
