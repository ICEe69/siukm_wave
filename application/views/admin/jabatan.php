<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-dark" role="alert">
       <i class="fas fa-fw fa-tachometer-alt" style="margin-right: 5px;"></i>Jabatan
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('admin/jabatan/input','<button style="background-color: #F8BA2B; color:white;" class="btn btn-sm mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Jabatan</button>') ?>


    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>NO</th>
            <th>NAMA JABATAN</th>
            <th>DESKRIPSI</th>
            <th colspan="2">AKSI</th>
        </tr>

        <?php
        $no=1;
        foreach($jabatan as $jbt): ?>
            <tr>
                <td ><?php echo $no++ ?></td>
                <td><?php echo $jbt->nama_jabatan ?></td>
                <td><?php echo $jbt->deskripsi ?></td>
                <td width="20px"><?php echo anchor('admin/jabatan/update/' .$jbt->id_jabatan,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?php echo anchor('admin/jabatan/delete/' .$jbt->id_jabatan,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>