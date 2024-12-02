<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-success" role="alert">
       <i class="fas fa-fw fa-tachometer-alt"></i>anggota
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('admin/anggota/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah anggota</button>') ?>

    <table class="table table-bordered table-striped table-hover">
    <tr>
        <th class="text-center">NO</th>
        <th class="text-center">NIM</th>
        <th class="text-center">NAMA ANGGOTA</th>
        <th class="text-center">JENIS KELAMIN</th>
        <th class="text-center">JABATAN</th>
        <th class="text-center">TANGGAL MASUK</th>
        <th class="text-center">STATUS</th>
        <th class="text-center">PHOTO</th>
        <th class="text-center">HAK AKSES</th>
        <th class="text-center" colspan="2">AKSI</th>
        
    </tr>

    <?php  
    $no = 1;
    foreach ($anggota as $agt): ?>
    <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $agt->nim ?></td>
        <td><?php echo $agt->nama_anggota ?></td>
        <td><?php echo $agt->jenis_kelamin ?></td>
        <td><?php echo $agt->nama_jabatan ?></td>
        <td><?php echo $agt->tanggal_masuk ?></td>
        <td><?php echo $agt->status ?></td>
        <td><img src="<?php echo base_url().'assets/photo/'.$agt->photo ?>" width="75px"></td>
        <?php if($agt->hak_akses=='1') { ?>
            <td>Admin</td>
        <?php }else{ ?>
            <td>Anggota</td>
        <?php } ?>
        <td width="20px"><?php echo anchor('admin/anggota/update/' .$agt->id_anggota,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
        <td width="20px"><?php echo anchor('admin/anggota/delete/' .$agt->id_anggota,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</div>