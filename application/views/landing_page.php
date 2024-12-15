<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #264533; position: fixed; top: 0; width: 100%; z-index: 1030;">
  <?php foreach($identitas as $id) : ?>
  <a class="navbar-brand" style="color: white;"><strong><?php echo $id->nama_website ?></strong></a>
  <?php endforeach; ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link ml-3" style="color:white" href="#carouselExampleIndicators">BERANDA <span class="sr-only">(current)</span></a>
      <a class="nav-link ml-3" style="color:white" href="#infoukm">INFORMASI</a>
      <a class="nav-link ml-3" style="color:white" href="#">TENTANG UKM</a>
      <a class="nav-link ml-3" style="color:white" href="#galeriukm">GALERI</a>
      <a class="nav-link ml-3" style="color:white" href="#kontakukm">KONTAK</a>
    </div>
    <form class="form-inline ml-3">
      <a class="btn btn-outline-light my-2 my-sm-0" 
        href="https://docs.google.com/forms/d/e/1FAIpQLScRciuWXCNFK8bHHo2MUxSDauC_ax7behbO4-3uSPOK26AxLw/viewform?usp=header">DAFTAR</a>
      <a class="btn btn-outline-light my-2 my-sm-0 ml-2" 
        href="<?php echo base_url('login'); ?>">LOGIN</a>
    </form>
  </div>
</nav>


<div class="card text-center" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);";>
  <div id="carouselExampleIndicators" class="carousel slide mx-auto" data-ride="carousel" style=" width: 100% ">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="<?php echo base_url('assets/img/slider1.jpg') ?>" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo base_url('assets/img/slider2.jpg') ?>" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo base_url('assets/img/slider3.jpg') ?>" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<div class="card text-center m-5" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)";>
  <div class="card-header" style="background-color: #264533;">
    <strong style="color: white;">TENTANG UKM</strong>
  </div>
  <div class="card-body">
    <p class="card-text" style="color: black;">
    <?php foreach($tentang_ukm as $tu) : ?>
    <?php echo word_limiter($tu->sejarah,75) ?>
    <?php endforeach; ?>
    </p>
    <!-- Button trigger modal -->
    <button type="button" class="btn" style="background-color: #F8BA2B; color:white" data-toggle="modal" data-target="#exampleModal">
      Selengkapnya...
    </button>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TENTANG UKM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify" style="margin: 50px;">
        <center><p><strong class="text-center">SEJARAH UNIT KEGIATAN MAHASISWA</strong></p></center>
        <?php foreach($tentang_ukm as $tu) : ?>
        <?php echo $tu->sejarah ?>
        <?php endforeach; ?><br><br><hr>
        <center><p><strong class="text-center">VISI</strong></p></center>
        <?php foreach($tentang_ukm as $tu) : ?>
        <?php echo $tu->visi ?>
        <?php endforeach; ?><br><br><hr>
        <center><p><strong class="text-center">MISI</strong></p></center>
        <?php foreach($tentang_ukm as $tu) : ?>
        <?php echo $tu->misi ?>
        <?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="infoukm" class="card text-center m-5" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)";>
  <div class="card-header" style="background-color:#264533">
    <strong style="color:white">STRUKTUR JABATAN UKM</strong>
  </div>
  <div class="card-body" style="display: flex; flex-wrap: wrap; justify-content: space-between; padding: 2%;">
    <!-- Card pertama -->
      <div class="col-1.5 mb-2">
        <div class="card" style>
            <img src="<?php echo base_url('assets/photo/' . (isset($ketua->photo) ? htmlspecialchars($ketua->photo) : 'default.jpg')); ?>" 
                class="card-img-top" 
                alt="Foto Ketua" 
                style="height: 220px; width: 100%; object-fit: contain; background-color: #f0f0f0;">
            <div class="card-body" style="padding: 15px;">
                <h5 class="card-title text-center" style="font-size: 1.2rem; font-weight: 600; color: #333;">
                    <?php echo htmlspecialchars($ketua->nama_anggota); ?>
                </h5>
                <p class="card-text text-center" style="font-size: 1rem; color: #777;">
                    <?php echo htmlspecialchars($ketua->nama_jabatan); ?>
                </p>
            </div>
        </div>
      </div>

      <!-- Card kedua -->
      <div class="col-1.5 mb-2">
        <div class="card">
            <img src="<?php echo base_url('assets/photo/' . (isset($wakil_ketua->photo) ? htmlspecialchars($wakil_ketua->photo) : 'default.jpg')); ?>" 
                class="card-img-top" 
                alt="Foto Wakil Ketua" 
                style="height: 220px; width: 100%; object-fit: contain; background-color: #f0f0f0;">
            <div class="card-body" style="padding: 15px;">
                <h5 class="card-title text-center" style="font-size: 1.2rem; font-weight: 600; color: #333;">
                    <?php echo htmlspecialchars($wakil_ketua->nama_anggota); ?>
                </h5>
                <p class="card-text text-center" style="font-size: 1rem; color: #777;">
                    <?php echo htmlspecialchars($wakil_ketua->nama_jabatan); ?>
                </p>
            </div>
        </div>
      </div>

      <!-- Card ketiga -->
      <div class="col-1.5 mb-2">
        <div class="card">
            <img src="<?php echo base_url('assets/photo/' . (isset($sekretaris->photo) ? htmlspecialchars($sekretaris->photo) : 'default.jpg')); ?>" 
                class="card-img-top" 
                alt="Foto Sekretaris" 
                style="height: 220px; width: 100%; object-fit: contain; background-color: #f0f0f0;">
            <div class="card-body" style="padding: 15px;">
                <h5 class="card-title text-center" style="font-size: 1.2rem; font-weight: 600; color: #333;">
                    <?php echo htmlspecialchars($sekretaris->nama_anggota); ?>
                </h5>
                <p class="card-text text-center" style="font-size: 1rem; color: #777;">
                    <?php echo htmlspecialchars($sekretaris->nama_jabatan); ?>
                </p>
            </div>
        </div>
      </div>

      <!-- Card keempat -->
      <div class="col-1.5 mb-2">
        <div class="card">
            <img src="<?php echo base_url('assets/photo/' . (isset($bendahara->photo) ? htmlspecialchars($bendahara->photo) : 'default.jpg')); ?>" 
                class="card-img-top" 
                alt="Foto Bendahara" 
                style="height: 220px; width: 100%; object-fit: contain; background-color: #f0f0f0;">
            <div class="card-body" style="padding: 15px;">
                <h5 class="card-title text-center" style="font-size: 1.2rem; font-weight: 600; color: #333;">
                    <?php echo htmlspecialchars($bendahara->nama_anggota); ?>
                </h5>
                <p class="card-text text-center" style="font-size: 1rem; color: #777;">
                    <?php echo htmlspecialchars($bendahara->nama_jabatan); ?>
                </p>
            </div>
        </div>
      </div> 

      <!-- Card kelima -->
      <div class="col-1.5 mb-2">
        <div class="card">
            <img src="<?php echo base_url('assets/photo/' . (isset($humas->photo) ? htmlspecialchars($humas->photo) : 'default.jpg')); ?>" 
                class="card-img-top" 
                alt="Foto Humas" 
                style="height: 220px; width: 100%; object-fit: contain; background-color: #f0f0f0;">
            <div class="card-body" style="padding: 15px;">
                <h5 class="card-title text-center" style="font-size: 1.2rem; font-weight: 600; color: #333;">
                    <?php echo htmlspecialchars($humas->nama_anggota); ?>
                </h5>
                <p class="card-text text-center" style="font-size: 1rem; color: #777;">
                    <?php echo htmlspecialchars($humas->nama_jabatan); ?>
                </p>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>



<div class="mx-5 my-5">
  <div class="row justify-content-center g-4">
    <!-- Kolom kiri -->
    <div class="col-md-6">
      <div class="card border-0 shadow-sm text-center mb-4" style="border-radius: 10px; height: 55vh; background-color: #264533;">
        <div class="card-body">
          <span class="display-2 d-block mb-3" style="color:white;">
            <i class="<?php echo $informasi[0]->icon ?>"></i>
          </span>
          <h5 class="card-title badge bg-light py-2 px-3">
            <?php echo $informasi[0]->nama_kegiatan ?>
          </h5>
          <p class="card-text mt-3" style="color: white">
            <?php echo $informasi[0]->deskripsi ?>
          </p>
          <a href="#" class="btn mt-3" style="background-color: #F8BA2B; color:white">Go somewhere</a>
        </div>
      </div>
      <div class="card border-0 shadow-sm text-center" style="border-radius: 10px; height: 55vh; background-color: #264533;" >
        <div class="card-body">
          <span class="display-2 d-block mb-3" style="color:white;">
            <i class="<?php echo $informasi[1]->icon ?>"></i>
          </span>
          <h5 class="card-title badge bg-light py-2 px-3">
            <?php echo $informasi[1]->nama_kegiatan ?>
          </h5>
          <p class="card-text mt-3" style="color: white">
            <?php echo $informasi[1]->deskripsi ?>
          </p>
          <a href="#" class="btn mt-3" style="background-color: #F8BA2B; color:white">Go somewhere</a>
        </div>
      </div>
    </div>

    <!-- Kolom kanan -->
    <div class="col-md-6">
      <div class="card border-0 shadow-sm text-center mb-4" style="border-radius: 10px; height: 55vh; background-color: #264533;">
        <div class="card-body">
          <span class="display-2 d-block mb-3" style="color:white;">
            <i class="<?php echo $informasi[2]->icon ?>"></i>
          </span>
          <h5 class="card-title badge bg-light py-2 px-3">
            <?php echo $informasi[2]->nama_kegiatan ?>
          </h5>
          <p class="card-text mt-3" style="color: white">
            <?php echo $informasi[2]->deskripsi ?>
          </p>
          <a href="#" class="btn mt-3" style="background-color: #F8BA2B; color:white">Go somewhere</a>
        </div>
      </div>
      <div class="card border-0 shadow-sm text-center" style="border-radius: 10px; height: 55vh; background-color: #264533;">
        <div class="card-body">
          <span class="display-2 d-block mb-3" style="color:white;">
            <i class="<?php echo $informasi[3]->icon ?>"></i>
          </span>
          <h5 class="card-title badge bg-light py-2 px-3">
            <?php echo $informasi[3]->nama_kegiatan ?>
          </h5>
          <p class="card-text mt-3" style="color: white">
            <?php echo $informasi[3]->deskripsi ?>
          </p>
          <a href="#" class="btn mt-3" style="background-color: #F8BA2B; color:white">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="card text-center m-5" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
  <div id="galeriukm" class="card-header" style="background-color: #264533;">
    <strong style="color:white">GALERI</strong>
  </div>
  <div class="card-body border rounded" style="background-color: white;">
    <!-- Menampilkan gambar utama dengan index 0 -->
    <?php if (!empty($galeri)) : ?>
      <div class="card mb-4" style="width: 95%; margin: 0 auto; overflow: hidden;">
        <img src="<?php echo base_url('assets/galeri/' . $galeri[0]->galeri) ?>" style="width: 110%; margin-left: -5%; margin-right: -5%; height: 50vh; object-fit:cover;" >
        <div class="card-body">
          <h5 class="card-title"><?php echo $galeri[0]->nama_kegiatan ?></h5>
          <p class="card-text"><?php echo $galeri[0]->deskripsi ?></p>
        </div>
      </div>
    <?php endif; ?>

    <!-- Menampilkan gambar lainnya dalam card-deck -->
    <div class="card-deck m-4">
      <?php if (isset($galeri[1])) : ?>
        <div class="card">
          <img src="<?php echo base_url('assets/galeri/' . $galeri[1]->galeri) ?>" style="height: 40vh; object-fit:cover;" >
          <div class="card-body">
            <h5 class="card-title"><?php echo $galeri[1]->nama_kegiatan ?></h5>
            <p class="card-text"><?php echo $galeri[1]->deskripsi ?></p>
          </div>
        </div>
      <?php endif; ?>
      
      <?php if (isset($galeri[2])) : ?>
        <div class="card">
          <img src="<?php echo base_url('assets/galeri/' . $galeri[2]->galeri) ?>" style="height: 40vh; object-fit:cover;" >
          <div class="card-body">
            <h5 class="card-title"><?php echo $galeri[2]->nama_kegiatan ?></h5>
            <p class="card-text"><?php echo $galeri[2]->deskripsi ?></p>
          </div>
        </div>
      <?php endif; ?>
      
      <?php if (isset($galeri[3])) : ?>
        <div class="card">
          <img src="<?php echo base_url('assets/galeri/' . $galeri[3]->galeri) ?>" style="height: 40vh; object-fit:cover;" >
          <div class="card-body">
            <h5 class="card-title"><?php echo $galeri[3]->nama_kegiatan ?></h5>
            <p class="card-text"><?php echo $galeri[3]->deskripsi ?></p>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>



<form id="kontakukm" method="post" action="<?php echo base_url('welcome/kirim_pesan') ?>" class="p-4 m-5 border rounded shadow-sm">

  <div class="alert d-flex align-items-center mb-4" style="background-color: #264533;">
      <i style="color: white; margin-right:1vh" class="fas fa-envelope-open-text me-2"></i>
      <strong style="margin-right: 20px; color:white">Hubungi Kami</strong>
      <span style="color:white" class="small"><?php echo $id->alamat ?> - <?php echo $id->email ?> - <?php echo $id->telp ?></span>
  </div>
  <?php echo $this->session->flashdata('pesan') ?>

  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama Anda" required>
    <?php echo form_error('nama', '<div class="text-danger small">', '</div>') ?>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" required>
    <?php echo form_error('email', '<div class="text-danger small">', '</div>') ?>
  </div>

  <div class="mb-3">
    <label for="pesan" class="form-label">Pesan</label>
    <textarea name="pesan" id="pesan" class="form-control" rows="4" placeholder="Tulis pesan Anda di sini" required></textarea>
    <?php echo form_error('pesan', '<div class="text-danger small">', '</div>') ?>
  </div>

  <div class="text-end">
    <button type="submit" class="btn" style="background-color: #F8BA2B; color:white">Kirim Pesan</button>
  </div>

</form>





