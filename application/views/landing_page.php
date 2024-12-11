<nav class="navbar navbar-light bg-primary text-white">

  <?php foreach($identitas as $id) : ?>
  <a class="navbar-brand" style="color: white;"><strong><?php echo $id->nama_website ?></strong></a>
  <span class="small"><?php echo $id->alamat ?> - <?php echo $id->email ?> - <?php echo $id->telp ?></span>
  <?php endforeach; ?>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    <button class="btn btn-outline-light my-2 my-sm-0 ml-2" type="submit">Login</button>
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


<div class="card text-center m-5">
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

<div class="card text-center m-5">
  <div class="card-header">
    <strong>STRUKTUR JABATAN UKM</strong>
  </div>
  <div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-between; padding: 2%;">
    <!-- Card pertama -->
    <div class="col-2 mb-2">
      <div class="card">
        <img src="<?php ?>" class="card-img-top" alt="..." style="height: auto; max-width: 100%; object-fit: cover;">
        <div class="card-body">
          <p class="card-text">Deskripsi singkat card pertama.</p>
        </div>
      </div>
    </div>

    <!-- Card kedua -->
    <div class="col-2 mb-2">
      <div class="card">
        <img src="..." class="card-img-top" alt="..." style="height: auto; max-width: 100%; object-fit: cover;">
        <div class="card-body">
          <p class="card-text">Deskripsi singkat card kedua.</p>
        </div>
      </div>
    </div>

    <!-- Card ketiga -->
    <div class="col-2 mb-2">
      <div class="card">
        <img src="..." class="card-img-top" alt="..." style="height: auto; max-width: 100%; object-fit: cover;">
        <div class="card-body">
          <p class="card-text">Deskripsi singkat card ketiga.</p>
        </div>
      </div>
    </div>

    <!-- Card keempat -->
    <div class="col-2 mb-2">
      <div class="card">
        <img src="..." class="card-img-top" alt="..." style="height: auto; max-width: 100%; object-fit: cover;">
        <div class="card-body">
          <p class="card-text">Deskripsi singkat card keempat.</p>
        </div>
      </div>
    </div>    

    <!-- Card kelima -->
    <div class="col-2 mb-2">
      <div class="card">
        <img src="..." class="card-img-top" alt="..." style="height: auto; max-width: 100%; object-fit: cover;">
        <div class="card-body">
          <p class="card-text">Deskripsi singkat card kelima.</p>
        </div>
      </div>
    </div>
  </div>
</div><br><br>




