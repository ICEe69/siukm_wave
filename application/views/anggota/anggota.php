<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-dark" role="alert">
       <i class="fas fa-fw fa-users" style="margin-right: 5px;"></i>anggota
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <table id="tableanggota" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
        <td class="text-center">NO</td>
        <td class="text-center">NIM</td>
        <td class="text-center">NAMA ANGGOTA</td>
        <td class="text-center">JENIS KELAMIN</td>
        <td class="text-center">JABATAN</td>
        <td class="text-center">TANGGAL MASUK</td>
        <td class="text-center">STATUS</td>
        <td class="text-center">PHOTO</td>
        <td class="text-center">HAK AKSES</td>
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
    </tr>
    <?php } ?>
    </tbody>
</table>

</div>

<script>
    let table=new DataTable('#tableanggota');
</script>