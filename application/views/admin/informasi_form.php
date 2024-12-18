<div class="container-fluid">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-info" style="margin-right: 5px;"></i><strong>FORM INPUT INFORMASI</strong>
    </div>

    <form method="post" action="<?php echo base_url('admin/informasi/input_aksi') ?>">
        <div class="form-group">
            <label>Icon</label>
            <input type="text" name="icon" placeholder="Masukkan Icon" class="form-control">
            <?php echo form_error('icon','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <label>Judul Informasi</label>
            <select name="nama_kegiatan" class="form-control">
                <option value="">--Pilih kegiatan--</option>
                <?php foreach($kegiatan as $kgt): ?>
                    <option value="<?php echo $kgt->nama_kegiatan; ?>"><?php echo $kgt->nama_kegiatan; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Isi Informasi</label>
            <select name="deskripsi" class="form-control">
                <option value="">--Pilih kegiatan--</option>
                <?php foreach($kegiatan as $kgt): ?>
                    <option value="<?php echo $kgt->deskripsi; ?>"><?php echo $kgt->deskripsi; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <button type="submit" class="btn" style="background-color: #f29f58; color: white;">Simpan</button>
    </form>
</div>