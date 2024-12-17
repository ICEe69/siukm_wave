<div class="container-fluid">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-pen" style="margin-right: 5px;"></i><strong>FORM UPDATE IDENTITAS</strong>
    </div>

    <?php foreach ($identitas as $id): ?>

        <form method="post" action="<?php echo base_url('admin/identitas/update_aksi') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Website</label>
                <input type="hidden" name="id_identitas" value="<?php echo $id->id_identitas ?>">
                <input type="text" name="nama_website" class="form-control" value="<?php echo $id->nama_website ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $id->alamat ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $id->email ?>" required>
            </div>
            <div class="form-group">
                <label>No. Telpon</label>
                <input type="text" name="telp" class="form-control" value="<?php echo $id->telp ?>" required>
            </div>
            <button type="submit" class="btn" style="background-color: #f29f58; color: white; ">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>
