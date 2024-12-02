<div class="container-fluid">

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
            <label>Status</label>
            <select required name="status" class="form-control">
                <option value="" selected >--Status--</option>
                <option value="db">Di buka</option>
                <option value="dt">Di tutup</option>
                <option value="s">Selesai</option>
                <?php echo form_error('status','<div class="text-danger small" ml-3>')?>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>