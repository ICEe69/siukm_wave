<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-comment-dots" style="margin-right: 5px;"></i><strong>PESAN DARI USER</strong>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th class="text-center" width="20px" style="background-color: #441752; color: white">NO</th>
            <th class="text-center" style="background-color: #441752; color: white">NAMA</th>
            <th class="text-center" style="background-color: #441752; color: white">EMAIL</th>
            <th class="text-center" style="background-color: #441752; color: white">PESAN</th>
            <th class="text-center" colspan="2" style="background-color: #441752; color: white">AKSI</th>
        </tr>

        <?php
        $no=1;
        foreach($hubungi as $hub): ?>
            <tr>
                <td ><?php echo $no++ ?></td>
                <td><?php echo $hub->nama ?></td>
                <td><?php echo $hub->email ?></td>
                <td><?php echo $hub->pesan ?></td>
                <td width="20px"><?php echo anchor('admin/hubungi/kirim_email/' .$hub->id_hubungi,'<div class="btn btn-sm" style="background-color: #E87A5F; color: white;"><i class="fas fa-comment-dots"></i></div>') ?></td>
                <td width="20px"><?php echo anchor('admin/hubungi/delete/' .$hub->id_hubungi,'<div class="btn btn-sm" style="background-color: #AB4459 ; color: white; "><i class="fa fa-trash" ></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>