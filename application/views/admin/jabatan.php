<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-user-tie" style="margin-right: 5px;"></i><strong>JABATAN</strong>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('admin/jabatan/input','<button style="background-color: #f29f58; color:white;" class="btn btn-sm mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Jabatan</button>') ?>


    <table class="table table-striped table-bordered table-hover">
        <tr>
            <td class="text-center" style="background-color: #441752; color: white" >NO</td>
            <td class="text-center" style="background-color: #441752; color: white" >NAMA JABATAN</td>
            <td class="text-center" style="background-color: #441752; color: white" >DESKRIPSI</td>
            <td class="text-center" style="background-color: #441752; color: white"  colspan="2">AKSI</td>
        </tr>

        <?php
        $no=1;
        foreach($jabatan as $jbt): ?>
            <tr>
                <td ><?php echo $no++ ?></td>
                <td><?php echo $jbt->nama_jabatan ?></td>
                <td><?php echo $jbt->deskripsi ?></td>
                <td width="20px"><?php echo anchor('admin/jabatan/update/' .$jbt->id_jabatan,'<div class="btn btn-sm" style="background-color: #E87A5F; color: white; " ><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?php echo anchor('admin/jabatan/delete/' .$jbt->id_jabatan,'<div class="btn btn-sm" style="background-color: #ab4459; color: white; " ><i class="fa fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>