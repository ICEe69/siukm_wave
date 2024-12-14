<div class="container-fluid" style="margin-bottom: 100px; height: 100vh; overflow-y: auto;">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-tachometer-alt"></i> Kegiatan
    </div>

    <?php foreach ($kegiatan as $kgt) : ?>
    <div class="card mx-auto mb-4"> <!-- Tambahkan class mb-4 untuk margin bawah antar card -->
        <div class="card-header font-weight-bold 
            <?php 
                // Menentukan warna header berdasarkan status
                if ($kgt->status == 'dibuka') {
                    echo 'bg-primary text-white'; // Biru untuk "dibuka"
                } elseif ($kgt->status == 'ditutup') {
                    echo 'bg-danger text-white'; // Merah untuk "ditutup"
                } elseif ($kgt->status == 'selesai') {
                    echo 'bg-dark text-white'; // Hitam untuk "selesai"
                }
            ?>">
            <?php echo $kgt->status ?>
        </div>
        <div class="card-body"> <!-- Tambahkan scroll di body card jika konten panjang -->
            <div class="row">
                <div class="col-md-5 text-center"> <!-- Tambahkan scroll jika gambar terlalu besar -->
                    <img style="width: 100%; height: auto;" src="<?php echo base_url('assets/poster/' . $kgt->poster) ?>">
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <td>Nama Kegiatan</td>
                            <td>:</td>
                            <td><?php echo $kgt->nama_kegiatan ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kegiatan</td>
                            <td>:</td>
                            <td><?php echo $kgt->tanggal_kegiatan ?></td>
                        </tr>
                        <tr>
                            <td>Lokasi</td>
                            <td>:</td>
                            <td>
                                <!-- Embed Google Maps Iframe -->
                                <iframe 
                                    src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q=<?php echo $kgt->lokasi ?>" 
                                    width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy">
                                </iframe>
                            </td>
                        </tr>
                        <tr>
                            <td>Penyelenggara</td>
                            <td>:</td>
                            <td><?php echo $kgt->penyelenggara ?></td>
                        </tr>
                        <tr>
                            <td>Kuota</td>
                            <td>:</td>
                            <td><?php echo $kgt->kuota ?></td>
                        </tr>
                        <tr>
                            <td>Link</td>
                            <td>:</td>
                            <td><a href="<?php echo $kgt->link ?>" target="_blank"><?php echo $kgt->link ?></a></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td style="max-height: 150px; overflow-y: auto;"> <!-- Tambahkan scroll pada deskripsi jika panjang -->
                                <?php echo $kgt->deskripsi ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

</div>
