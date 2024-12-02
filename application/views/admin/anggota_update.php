<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-tachometer-alt"></i> Form Update Anggota
    </div>

    <?php foreach ($anggota as $agt): ?>

        <form method="post" style="margin-bottom: 100px;" action="<?php echo base_url('admin/anggota/update_aksi') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>NIM</label>
                <input type="hidden" name="id_anggota" value="<?php echo $agt->id_anggota ?>">
                <input type="text" name="nim" class="form-control" value="<?php echo $agt->nim ?>" required>
            </div>
            <div class="form-group">
                <label>Nama Anggota</label>
                <input type="text" name="nama_anggota" class="form-control" value="<?php echo $agt->nama_anggota ?>" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan Username" class="form-control" value="<?php echo $agt->username ?>">
                <?php echo form_error('username','<div class="text-danger small" ml-3>')?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan Username" class="form-control" value="<?php echo $agt->password ?>">
                <?php echo form_error('password','<div class="text-danger small" ml-3>')?>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="" disabled>--Jenis Kelamin--</option>
                    <option value="L" <?php echo ($agt->jenis_kelamin == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="P" <?php echo ($agt->jenis_kelamin == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
            <label>Jabatan</label>
                <select name="nama_jabatan" class="form-control">
                    <option value="<?php echo $agt->nama_jabatan ?>"><?php echo $agt->nama_jabatan ?></option>
                    <?php foreach($jabatan as $jbt): ?>
                    <option value="<?php echo $jbt->nama_jabatan ?>"><?php echo $jbt->nama_jabatan ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $agt->tanggal_masuk ?>" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="" disabled>--Status--</option>
                    <option value="aktif" <?php echo ($agt->status == 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                    <option value="tidak aktif" <?php echo ($agt->status == 'tidak aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                </select>
            </div>
            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="photo" class="form-control">
                <input type="hidden" name="existing_photo" value="<?php echo $agt->photo; ?>">
            </div>
            <div class="form-group">
                <label>Hak Akses</label>
                <select name="hak_akses" class="form-control">
                    <option value="<?php echo $agt->hak_akses ?>">
                    <?php if($agt->hak_akses == '1'){
                        echo "admin";
                    }else{
                        echo "anggota";
                    } ?>
                    </option>
                    <option value="1">Admin</option>
                    <option value="2">Anggota</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>
