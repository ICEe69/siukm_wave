<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-success" role="alert">
       <i class="fas fa-fw fa-tachometer-alt"></i>Tentang UKM
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped table-hover">
    <tr>
        <th class="text-center">NO</th>
        <th class="text-center">SEJARAH</th>
        <th class="text-center">VISI</th>
        <th class="text-center">MISI</th>
        <th class="text-center">AKSI</th>
        
    </tr>

    <?php  
    $no = 1;
    foreach ($tentang_ukm as $tu): ?>
    <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $tu->sejarah ?></td>
        <td><?php echo $tu->visi ?></td>
        <td><?php echo $tu->misi ?></td>
        <td width="20px"><?php echo anchor('admin/tentang_ukm/update/' .$tu->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</div>