<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-success" role="alert">
       <i class="fas fa-fw fa-tachometer-alt"></i>Identitas Website
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped table-hover">
    <tr>
        <th class="text-center">NO</th>
        <th class="text-center">JUDUL WEBSITE</th>
        <th class="text-center">ALAMAT</th>
        <th class="text-center">EMAIL</th>
        <th class="text-center">NO. TELP</th>
        <th class="text-center">AKSI</th>
        
    </tr>

    <?php  
    $no = 1;
    foreach ($identitas as $id): ?>
    <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $id->nama_website ?></td>
        <td><?php echo $id->alamat ?></td>
        <td><?php echo $id->email ?></td>
        <td><?php echo $id->telp ?></td>
        <td width="20px"><?php echo anchor('admin/identitas/update/' .$id->id_identitas,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</div>