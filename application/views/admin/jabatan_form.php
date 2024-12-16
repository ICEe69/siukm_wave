<div class="container-fluid">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-user-tie" style="margin-right: 5px;"></i><strong>FORM INPUT JABATAN</strong>
    </div>

    <form method="post" action="<?php echo base_url('admin/jabatan/input_aksi') ?>">
        <div class="form-group">
            <label>Nama Jabatan</label>
            <input type="text" name="nama_jabatan" placeholder="Masukkan Nama Jabatan" class="form-control">
            <?php echo form_error('nama_jabatan','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" placeholder="Masukkan Nama Program Studi" class="form-control">
            <?php echo form_error('deskripsi','<div class="text-danger small" ml-3>')?>
        </div>
        
        <button type="submit" class="btn" style="background-color: #f29f58; color: white; " >Simpan</button>
    </form>
</div>