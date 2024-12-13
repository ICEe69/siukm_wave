<nav class="navbar navbar-light bg-primary text-white">

  <?php foreach($identitas as $id) : ?>
  <a class="navbar-brand" style="color: white;"><strong><?php echo $id->nama_website ?></strong></a>
  <span class="small"><?php echo $id->alamat ?> - <?php echo $id->email ?> - <?php echo $id->telp ?></span>
  <?php endforeach; ?>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    <a class="btn btn-outline-light my-2 my-sm-0 ml-2" href="<?php echo base_url('login')?>">Login</a>
  </form>
</nav>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mx-auto">
      <a class="nav-link ml-3" href="#">BERANDA <span class="sr-only">(current)</span></a>
      <a class="nav-link ml-3" href="#">INFORMASI</a>
      <a class="nav-link ml-3" href="#">TENTANG UKM</a>
      <a class="nav-link ml-3" href="#">GALLERY</a>
      <a class="nav-link ml-3" href="#">KONTAK</a>
    </div>
  </div>
</nav>

<div class="card text-center m-5" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)";>
  <div id="carouselExampleIndicators" class="carousel slide mx-auto" data-ride="carousel" style=" width: 100%">
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
  <div class="card-header">
    <strong>TENTANG UKM</strong>
  </div>
  <div class="card-body">
    <p class="card-text">
    <?php foreach($tentang_ukm as $tu) : ?>
    <?php echo word_limiter($tu->sejarah,75) ?>
    <?php endforeach; ?>
    </p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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

<div class="card text-center m-5" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)";>
  <div class="card-header">
    <strong>STRUKTUR JABATAN UKM</strong>
  </div>
  <div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-between; padding: 2%;">

    <!-- Card pertama -->
    <div class="col-2 mb-2">
      <div class="card">
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
    <div class="col-2 mb-2">
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
    <div class="col-2 mb-2">
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
    <div class="col-2 mb-2">
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
    <div class="col-2 mb-2">
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

<div class="mx-5 my-5">
  <div class="row justify-content-center g-4">
    <!-- Kolom kiri -->
    <div class="col-md-6">
      <div class="card border-0 shadow-sm text-center mb-4" style="border-radius: 10px; height: 55vh;">
        <div class="card-body">
          <span class="display-2 text-info d-block mb-3">
            <i class="<?php echo $informasi[0]->icon ?>"></i>
          </span>
          <h5 class="card-title badge bg-info text-white py-2 px-3">
            <?php echo $informasi[0]->nama_kegiatan ?>
          </h5>
          <p class="card-text mt-3">
            <?php echo $informasi[0]->deskripsi ?>
          </p>
          <a href="#" class="btn btn-primary mt-3">Go somewhere</a>
        </div>
      </div>
      <div class="card border-0 shadow-sm text-center" style="border-radius: 10px; height: 55vh;">
        <div class="card-body">
          <span class="display-2 text-info d-block mb-3">
            <i class="<?php echo $informasi[1]->icon ?>"></i>
          </span>
          <h5 class="card-title badge bg-info text-white py-2 px-3">
            <?php echo $informasi[1]->nama_kegiatan ?>
          </h5>
          <p class="card-text mt-3">
            <?php echo $informasi[1]->deskripsi ?>
          </p>
          <a href="#" class="btn btn-primary mt-3">Go somewhere</a>
        </div>
      </div>
    </div>

    <!-- Kolom kanan -->
    <div class="col-md-6">
      <div class="card border-0 shadow-sm text-center mb-4" style="border-radius: 10px; height: 55vh;">
        <div class="card-body">
          <span class="display-2 text-info d-block mb-3">
            <i class="<?php echo $informasi[2]->icon ?>"></i>
          </span>
          <h5 class="card-title badge bg-info text-white py-2 px-3">
            <?php echo $informasi[2]->nama_kegiatan ?>
          </h5>
          <p class="card-text mt-3">
            <?php echo $informasi[2]->deskripsi ?>
          </p>
          <a href="#" class="btn btn-primary mt-3">Go somewhere</a>
        </div>
      </div>
      <div class="card border-0 shadow-sm text-center" style="border-radius: 10px; height: 55vh;">
        <div class="card-body">
          <span class="display-2 text-info d-block mb-3">
            <i class="<?php echo $informasi[3]->icon ?>"></i>
          </span>
          <h5 class="card-title badge bg-info text-white py-2 px-3">
            <?php echo $informasi[3]->nama_kegiatan ?>
          </h5>
          <p class="card-text mt-3">
            <?php echo $informasi[3]->deskripsi ?>
          </p>
          <a href="#" class="btn btn-primary mt-3">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="card text-center m-5" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
  <div class="card-header">
    <strong>GALLERY</strong>
  </div><br>
  <div class="card mb-4" style="width: 95%; margin: 0 auto; overflow: hidden;">
    <!-- Gambar dengan ukuran yang lebih besar, melebar ke kiri dan kanan -->
    <img class="card-img-top" src="<?php echo base_url('assets/img/gallery7.jpeg') ?>" alt="Card image cap" style="width: 110%; margin-left: -5%; margin-right: -5%; height: 50vh; object-fit:cover;">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    </div>
  </div>

  <div class="card-deck m-4">
    <div class="card">
      <img class="card-img-top" src="<?php echo base_url('assets/img/gallery7.jpeg')?>" alt="Card image cap" style="height: 40vh; object-fit:cover;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="<?php echo base_url('assets/img/gallery3.jpeg')?>" alt="Card image cap" style="height: 40vh; object-fit:cover;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="<?php echo base_url('assets/img/gallery5.jpeg')?>" alt="Card image cap" style="height: 40vh; object-fit:cover;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      </div>
    </div>
  </div>
</div>


<form method="post" action="<?php echo base_url('welcome/kirim_pesan') ?>" class="p-4 m-5 border rounded shadow-sm">

  <div class="alert alert-primary d-flex align-items-center mb-4">
    <i class="fas fa-envelope-open-text me-2"></i>
    <strong>Hubungi Kami</strong>
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
    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
  </div>

</form>





