<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-success" role="alert">
       <i class="fas fa-fw fa-tachometer-alt"></i>kegiatan
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('admin/kegiatan/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Kegiatan</button>') ?>

    <table class="table table-bordered table-striped table-hover">
    <tr>
        <th>NO</th>
        <th>NAMA KEGIATAN</th>
        <th>TANGGAL KEGIATAN</th>
        <th>LOKASI</th>
        <th>PENYELENGGARA</th>
        <th>KUOTA</th>
        <th>STATUS</th>
        <th colspan="2">AKSI</th>
    </tr>

    <?php  
    $no = 1;
    foreach ($kegiatan as $kgt): ?>
    <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $kgt->nama_kegiatan ?></td>
        <td><?php echo $kgt->tanggal_kegiatan ?></td>
        <td><?php echo $kgt->lokasi ?></td>
        <td><?php echo $kgt->penyelenggara ?></td>
        <td><?php echo $kgt->kuota ?></td>
        <td><?php echo $kgt->link ?></td>
        <td><?php echo $kgt->status ?></td>
        <td><?php echo $kgt->deskripsi ?></td>
        <td><img src="<?php echo base_url().'assets/poster/'.$kgt->poster ?>" width="75px"></td>
        <td width="20px"><?php echo anchor('admin/kegiatan/update/' .$kgt->id_kegiatan,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
        <td width="20px"><?php echo anchor('admin/kegiatan/delete/' .$kgt->id_kegiatan,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</div>