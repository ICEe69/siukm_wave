<div class="container-fluid">

    <div class="alert alert-success" role="alert">
       <i class="fas fa-fw fa-tachometer-alt"></i>Form Input Informasi
    </div>

    <form method="post" action="<?php echo base_url('admin/informasi/input_aksi') ?>">
        <div class="form-group">
            <label>Icon</label>
            <input type="text" name="icon" placeholder="Masukkan Icon" class="form-control">
            <?php echo form_error('icon','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Judul informasi</label>
            <input type="text" name="judul_informasi" placeholder="Masukkan judul informasi" class="form-control">
            <?php echo form_error('judul_informasi','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Isi Informasi</label>
            <input type="text" name="isi_informasi" placeholder="Masukkan judul Program Studi" class="form-control">
            <?php echo form_error('isi_informasi','<div class="text-danger small" ml-3>')?>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>