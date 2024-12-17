<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-users" style="margin-right: 5px;"></i><strong>ANGGOTA</strong>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('admin/anggota/input','<button style="background-color: #F29f58; color: white; " class="btn btn-sm mb-3"><i class="fas fa-plus fa-sm"></i> Tambah anggota</button>') ?>


    <table id="tableanggota" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
        <td class="text-center" style="background-color: #441752; color: white" >NO</td>
        <td class="text-center" style="background-color: #441752; color: white">NIM</td>
        <td class="text-center" style="background-color: #441752; color: white">NAMA ANGGOTA</td>
        <td class="text-center" style="background-color: #441752; color: white">JENIS KELAMIN</td>
        <td class="text-center" style="background-color: #441752; color: white">JABATAN</td>
        <td class="text-center" style="background-color: #441752; color: white">TANGGAL MASUK</td>
        <td class="text-center" style="background-color: #441752; color: white">STATUS</td>
        <td class="text-center" style="background-color: #441752; color: white">PHOTO</td>
        <td class="text-center" style="background-color: #441752; color: white">HAK AKSES</td>
        <td class="text-center" style="background-color: #441752; color: white">AKSI</td>
        </tr>
    </thead>
    
    <tbody>
    <?php  
    $no = 1;
    foreach ($anggota as $agt){ ?>
    <tr>
        <td><?php echo $no++ ?></td>
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
        <td ><?php echo anchor('admin/anggota/update/' .$agt->id_anggota,'<div class="btn btn-sm" style="background-color: #E87A5F; color: white;" ><i class="fa fa-edit"></i></div>') ?>
        <?php echo anchor('admin/anggota/delete/' .$agt->id_anggota,'<div class="btn btn-sm" style="background-color: #AB4459 ; color: white; "><i class="fa fa-trash"></i></div>') ?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>

</div>

<script>
    let table=new DataTable('#tableanggota');
</script>