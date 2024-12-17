<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-info" style="margin-right: 5px;"></i><strong>INFORMASI</strong>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('admin/informasi/input','<button class="btn btn-sm mb-3" style="background-color: #f29f58; color:white;"><i class="fas fa-plus fa-sm"></i> Tambah informasi</button>') ?>


    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th class="text-center" style="background-color: #441752; color: white">NO</th>
            <th class="text-center" style="background-color: #441752; color: white">ICON</th>
            <th class="text-center" style="background-color: #441752; color: white">JUDUL INFORMASI</th>
            <th class="text-center" style="background-color: #441752; color: white">ISI INFORMASI</th>
            <th class="text-center" style="background-color: #441752; color: white" colspan="2">AKSI</th>
        </tr>

        <?php
        $no=1;
        foreach($informasi as $inf): ?>
            <tr>
                <td ><?php echo $no++ ?></td>
                <td><?php echo $inf->icon ?></td>
                <td><?php echo $inf->nama_kegiatan ?></td>
                <td><?php echo $inf->deskripsi ?></td>
                <td width="20px"><?php echo anchor('admin/informasi/update/' .$inf->id_informasi,'<div class="btn btn-sm" style="background-color: #E87A5F; color: white;"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?php echo anchor('admin/informasi/delete/' .$inf->id_informasi,'<div class="btn btn-sm" style="background-color: #ab4459; color: white;"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>