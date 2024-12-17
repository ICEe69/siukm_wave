<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-info" style="margin-right: 5px;"></i><strong>TENTANG UKM</strong>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped table-hover">
    <tr>
        <th class="text-center" style="background-color: #441752; color: white">NO</th>
        <th class="text-center" style="background-color: #441752; color: white">SEJARAH</th>
        <th class="text-center" style="background-color: #441752; color: white">VISI</th>
        <th class="text-center" style="background-color: #441752; color: white">MISI</th>
        <th class="text-center" style="background-color: #441752; color: white">AKSI</th>
        
    </tr>

    <?php  
    $no = 1;
    foreach ($tentang_ukm as $tu): ?>
    <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $tu->sejarah ?></td>
        <td><?php echo $tu->visi ?></td>
        <td><?php echo $tu->misi ?></td>
        <td width="20px"><?php echo anchor('admin/tentang_ukm/update/' .$tu->id,'<div class="btn btn-sm" style="background-color: #E87A5F; color: white;"><i class="fa fa-edit"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</div>