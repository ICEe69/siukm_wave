<div class="container-fluid">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-comment-dots" style="margin-right: 5px;"></i><strong>FORM BALAS PESAN USER</strong>
    </div>

    <?php foreach($hubungi as $hub): ?>

        <form method="post" action="<?php echo base_url('admin/hubungi/kirim_email_aksi') ?>">
            <div class="form-group">
                <label>Email</label>
                <input type="hidden" name="id_hubungi" value="<?php echo $hub->id_hubungi ?>">
                <input type="text" name="email" class="form-control" value="<?php echo $hub->email ?>"readonly>
            </div>

            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control">
            </div>

            <div class="form-group">
                <label>Pesan</label>
                <textarea type="text" name="pesan" class="form-control" rows="5"></textarea>
            </div>

            <button type="submit" class="btn" style="background-color: #E87A5F; color: white;">Kirim</button>
        </form>

    <?php endforeach; ?>
</div>