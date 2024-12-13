<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-success" role="alert">
       <i class="fas fa-fw fa-tachometer-alt"></i>Form Input Kegiatan
    </div>

    <form method="post" action="<?php echo base_url('admin/kegiatan/input_aksi') ?>">
        <div class="form-group">
            <label>Nama kegiatan</label>
            <input type="text" name="nama_kegiatan" placeholder="Masukkan Nama kegiatan" class="form-control">
            <?php echo form_error('nama_kegiatan','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal_kegiatan" placeholder="Masukkan Tanggal Masuk" class="form-control">
            <?php echo form_error('tanggal_kegiatan','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="lokasi" placeholder="Masukkan Lokasi" class="form-control">
            <?php echo form_error('lokasi','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Penyelenggara</label>
            <input type="text" name="penyelenggara" placeholder="Masukkan Penyelenggara" class="form-control">
            <?php echo form_error('penyelenggara','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Kuota</label>
            <input type="text" name="kuota" placeholder="Masukkan Penyelenggara" class="form-control">
            <?php echo form_error('kuota','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Link</label>
            <input type="text" name="link" placeholder="Masukkan Link" class="form-control">
            <?php echo form_error('link','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select required name="status" class="form-control">
                <option value="" selected >--Status--</option>
                <option value="dibuka">Di Buka</option>
                <option value="ditutup">Di Tutup</option>
                <option value="selesai">Selesai</option>
                <?php echo form_error('status','<div class="text-danger small" ml-3>')?>
            </select>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea style="height: 5rem; line-height:5rem;" type="text" name="deskripsi" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label>Poster</label>
            <input type="file" name="poster" placeholder="Masukkan Poster" class="form-control">
            <?php echo form_error('poster','<div class="text-danger small" ml-3>')?>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>