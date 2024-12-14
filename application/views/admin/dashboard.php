<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-dark" role="alert">
       <i class="fas fa-fw fa-tachometer-alt"></i>Dashboard
    </div>

    <div class="alert alert-dark" role="alert">
        <h4 class="alert-heading">Selamat Datang!</h4>
        <p>Selamat Datang <strong><?php echo $username; ?></strong> di Sistem Informasi Unit Kegiatan Mahasiswa Universitas Maritim Raja Ali Haji, Anda Login sebagai <strong><?php echo $hak_akses; ?></strong></p>
    </div>

    <!-- Button trigger modal -->


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 5px solid #A9AF33;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #A9AF33;">
                                                Anggota</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $anggota ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 5px solid #FFDF78;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #FFDF78;">
                                                Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $admin ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 5px solid #743D38;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #743D38;">Kegiatan
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $kegiatan ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="background-color: #743D38; width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 5px solid #8ED8E1;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #8ED8E1;">
                                                Absensi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kehadiran ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i>
            Control Panel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url()?>"><p class="nav-link small text-info">ANGGOTA</p></a>
                <i class="fas fa-3x fa-user-graduate"></i>
            </div>
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url()?>"><p class="nav-link small text-info">KEGIATAN</p></a>
                <i class="fas fa-3x fa-calendar-alt"></i>
            </div>
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url()?>"><p class="nav-link small text-info">KKA</p></a>
                <i class="fas fa-3x fa-edit"></i>
            </div>
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url()?>"><p class="nav-link small text-info">KHK</p></a>
                <i class="fas fa-3x fa-file-alt"></i>
            </div>
        </div><hr>

        <div class="row">
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url()?>"><p class="nav-link small text-info">INPUT SERTIFIKAT</p></a>
                <i class="fas fa-3x fa-sort-numeric-down"></i>
            </div>
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url()?>"><p class="nav-link small text-info">CETAK TRANSKRIP</p></a>
                <i class="fas fa-3x fa-print"></i>
            </div>
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url()?>"><p class="nav-link small text-info">KATEGORI</p></a>
                <i class="fas fa-3x fa-list-ul"></i>
            </div>
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url()?>"><p class="nav-link small text-info">INFO UKM</p></a>
                <i class="fas fa-3x fa-bullhorn"></i>
            </div>
        </div><hr>

        <div class="row">
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url()?>"><p class="nav-link small text-info">IDENTITAS</p></a>
                <i class="fas fa-3x fa-id-card-alt"></i>
            </div>
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url()?>"><p class="nav-link small text-info">TENTANG KAMPUS</p></a>
                <i class="fas fa-3x fa-info-circle"></i>
            </div>
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url()?>"><p class="nav-link small text-info">FASILITAS</p></a>
                <i class="fas fa-3x fa-laptop"></i>
            </div>
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url()?>"><p class="nav-link small text-info">GALLERY</p></a>
                <i class="fas fa-3x fa-images"></i>
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>