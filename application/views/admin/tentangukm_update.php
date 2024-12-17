<div class="container-fluid">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-pen" style="margin-right: 5px;"></i><strong>FORM UPDATE TENTANG UKM</strong>
    </div>

    <?php foreach ($tentang_ukm as $tu): ?>

        <form method="post" action="<?php echo base_url('admin/tentang_ukm/update_aksi') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Sejarah</label>
                <input type="hidden" name="id" value="<?php echo $tu->id ?>">
                <input type="text" name="sejarah" class="form-control" value="<?php echo $tu->sejarah ?>" required>
            </div>
            <div class="form-group">
                <label>Visi</label>
                <input type="text" name="visi" class="form-control" value="<?php echo $tu->visi ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="misi" class="form-control" value="<?php echo $tu->misi ?>" required>
            </div>
            <button type="submit" class="btn" style="background-color: #f29f58; color: white;">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>
