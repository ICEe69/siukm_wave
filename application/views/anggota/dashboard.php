<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-tachometer-alt" style="margin-right: 5px;"></i><strong>DASHBOARD</strong>
    </div>

    <div class="alert alert-dark" role="alert">
        <h4 class="alert-heading">Selamat Datang!</h4>
        <p>Selamat Datang <strong><?php echo $username; ?></strong> di Sistem Informasi Unit Kegiatan Mahasiswa Universitas Maritim Raja Ali Haji, Anda Login sebagai <strong><?php echo $hak_akses; ?></strong></p>
    </div>

    <div class="card mx-auto" style="margin-bottom: 120px">
        <div class="card-header font-weight-bold text-white" style="background-color: #441752;">
            Data Anggota
        </div>

        <?php foreach($anggota as $a) : ?>
        <div class="card-body">
         <div class="row">
            <div class="col-md-5 text-center">
                <img style="width: 250px" src="<?php echo base_url('assets/photo/'.$a->photo) ?>">
            </div>
                <div class="col-md-7">
                    <table class="table">
                        <tr>
                            <td>Nama Anggota</td>
                            <td>:</td>
                            <td><?php echo $a->nama_anggota ?></td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td><?php echo $a->nim ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?php echo $a->jenis_kelamin ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>:</td>
                            <td><?php echo $a->nama_jabatan ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Masuk</td>
                            <td>:</td>
                            <td><?php echo $a->tanggal_masuk ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo $a->status ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    