<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-success" role="alert">
       <i class="fas fa-fw fa-tachometer-alt"></i>Ubah Password
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('ubah_password/ubah_passwordaksi') ?>">
            
            <div class="form-group">
                <label for="">Password Baru</label>
                <input type="password" name="pass_baru" class="form-control">
                <?php echo form_error('pass_baru','<div class="text-danger small" ml-3>')?>
            </div>

            <div class="form-group">
                <label for="">Ulangi Password Baru</label>
                <input type="password" name="ulang_pass" class="form-control">
                <?php echo form_error('ulang_pass','<div class="text-danger small" ml-3>')?>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>

            </form>
        </div>
    </div>

</div>