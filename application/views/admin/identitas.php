<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-address-card"" style="margin-right: 5px;"></i><strong>IDENTITAS WEBSITE</strong>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped table-hover">
    <tr>
        <th class="text-center" style="background-color: #441752; color: white">NO</th>
        <th class="text-center" style="background-color: #441752; color: white">JUDUL WEBSITE</th>
        <th class="text-center" style="background-color: #441752; color: white">ALAMAT</th>
        <th class="text-center" style="background-color: #441752; color: white">EMAIL</th>
        <th class="text-center" style="background-color: #441752; color: white">NO. TELP</th>
        <th class="text-center" style="background-color: #441752; color: white">AKSI</th>
        
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
        <td width="20px"><?php echo anchor('admin/identitas/update/' .$id->id_identitas,'<div class="btn btn-sm" style="background-color: #E87A5F; color: white;"><i class="fa fa-edit"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</div>