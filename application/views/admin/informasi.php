<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-success" role="alert">
       <i class="fas fa-fw fa-tachometer-alt"></i>Informasi
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('admin/informasi/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah informasi</button>') ?>


    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>NO</th>
            <th>ICON</th>
            <th>JUDUL INFORMASI</th>
            <th>ISI INFORMASI</th>
            <th colspan="2">AKSI</th>
        </tr>

        <?php
        $no=1;
        foreach($informasi as $inf): ?>
            <tr>
                <td ><?php echo $no++ ?></td>
                <td><?php echo $inf->icon ?></td>
                <td><?php echo $inf->nama_kegiatan ?></td>
                <td><?php echo $inf->deskripsi ?></td>
                <td width="20px"><?php echo anchor('admin/informasi/update/' .$inf->id_informasi,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?php echo anchor('admin/informasi/delete/' .$inf->id_informasi,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>