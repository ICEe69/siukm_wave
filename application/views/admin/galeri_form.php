<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-success" role="alert">
       <i class="fas fa-fw fa-tachometer-alt"></i>Form Input Galeri
    </div>
    
    <form method="post" action="<?php echo base_url('admin/galeri/input_aksi') ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" placeholder="Masukkan Nama Kegiatan" class="form-control">
            <?php echo form_error('nama_kegiatan','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea style="height: 5rem; line-height:5rem;" type="text" name="deskripsi" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label>Galeri</label>
            <input type="file" name="galeri" placeholder="Masukkan galeri" class="form-control">
            <?php echo form_error('galeri','<div class="text-danger small" ml-3>')?>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>