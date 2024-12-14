<div class="container-fluid">

    <div class="alert alert-dark" role="alert">
       <i class="fas fa-fw fa-user-edit" style="margin-right: 5px;"></i>Form Input anggota
    </div>

    <form method="post" action="<?php echo base_url('admin/anggota/input_aksi') ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nim</label>
            <input type="text" name="nim" placeholder="Masukkan Nim" class="form-control">
            <?php echo form_error('nim','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Nama Anggota</label>
            <input type="text" name="nama_anggota" placeholder="Masukkan Nama Anggota" class="form-control">
            <?php echo form_error('nama_anggota','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
            <?php echo form_error('username','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Username" class="form-control">
            <?php echo form_error('password','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select required name="jenis_kelamin" class="form-control">
                <option value="" selected >--Jenis Kelamin--</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
                <?php echo form_error('jenis_kelamin','<div class="text-danger small" ml-3>')?>
            </select>
        </div>
        <div class="form-group">
            <label>Jabatan</label>
            <select name="nama_jabatan" class="form-control">
                <option value="">--Pilih Jabatan--</option>
                <?php foreach($jabatan as $jbt): ?>
                    <option value="<?php echo $jbt->nama_jabatan; ?>"><?php echo $jbt->nama_jabatan; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" placeholder="Masukkan Tanggal Masuk" class="form-control">
            <?php echo form_error('tanggal_masuk','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select required name="status" class="form-control">
                <option value="" selected >--Status--</option>
                <option value="aktif">Aktif</option>
                <option value="tidak aktif">Tidak Aktif</option>
                <?php echo form_error('status','<div class="text-danger small" ml-3>')?>
            </select>
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="photo" placeholder="Masukkan Photo" class="form-control">
            <?php echo form_error('photo','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <label>Hak Akses</label>
            <select name="hak_akses" class="form-control">
                <option value="">--Pilih Hak Akses--</option>
                <option value="1">Admin</option>
                <option value="2">Anggota</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Simpan</button>
    </form><br><br><br><br>
</div>