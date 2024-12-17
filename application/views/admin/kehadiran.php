<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-user-check" style="margin-right: 5px;"></i><strong>KEHADIRAN</strong>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

<div class="card mb-3">
    <div class="card-header text-white" style="background-color: #441752;">
        Filter Data Kehadiran Anggota
    </div>
        <div class="card-body">
           <form class="form-inline">
            <div style="display: flex;column-gap: 1rem;" >
                <div class="form-group mb-2">
                    <label for="staticEmail2" class="">Tanggal</label>
                    <select class="form-control ml-3" name="tanggal">
                        <option value="">--Pilih Tanggal--</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label for="staticEmail2" class="">Bulan</label>
                    <select class="form-control ml-2" name="bulan">
                        <option value="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label for="staticEmail2" class="">Tahun</label>
                    <select class="form-control ml-2" name="tahun">
                        <option value="">--Pilih Tahun--</option>
                        <?php $tahun = date('Y'); 
                        for($i=2020;$i<$tahun+5;$i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
                <?php
                    if((isset($_GET['tanggal']) && $_GET['tanggal']!='') && (isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                        $tanggal = $_GET['tanggal'];
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        $tanggalbulantahun = $tanggal.$bulan.$tahun;

                    }else{
                        $tanggal = date('d');
                        $bulan = date('m');
                        $tahun = date('Y');
                        $tanggalbulantahun = $tanggal.$bulan.$tahun;
                    }
                ?>
                
                <button type="submit" style="background-color: #f29f58; color:white;" class="btn mb-2 ml-auto"><i class="fas fa-eye"></i>Tampilkan Data</button>
                <a href="<?php echo base_url('admin/kehadiran/input') ?>" class="btn mb-2 ml-2" style="background-color: #d46059; color:white;"><i class="fas fa-plus"></i>Input Kehadiran</a>
                
                <?php if(count($kehadiran) > 0) { ?>
                    <a href="<?php echo base_url('admin/kehadiran/cetak_laporankehadiran?tanggal=' . $tanggal . '&bulan=' . $bulan . '&tahun=' . $tahun);?>" class="btn mb-2 ml-2" style="background-color: #802b5b; color:white; ;"><i class="fas fa-print"></i> Cetak Data Kehadiran</a>

                <?php }else{ ?>
                    <button type="button" style="background-color: #802b5b; color:white;" class="btn btn-success mb-2 ml-2" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-print"></i> Cetak Data Kehadiran
                    </button>
                <?php } ?>
                
                
            </form>
        </div>
    </div>

    <?php  
        if((isset($_GET['tanggal']) && $_GET['tanggal']!='') && (isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $tanggal = $_GET['tanggal'];
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $tanggalbulantahun = $tanggal.$bulan.$tahun;
        }else{
            $tanggal = date('d');
            $bulan = date('m');
            $tahun = date('Y');
            $tanggalbulantahun = $tanggal.$bulan.$tahun;
        }
    
    ?>

    <div class="alert alert-dark">
        Menampilkan Data Kehadiran Anggota Tanggal: <span class="font-weight-bold"><?php echo $tanggal ?></span> Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div>

    <?php  
    $jml_data = count($kehadiran);
    if($jml_data > 0) { ?>
    <div>
        <table class="table table-striped table-bordered table-hover">
        <tr>
            <th class="text-center" style="background-color: #441752; color: white">NO</th>
            <th class="text-center" style="background-color: #441752; color: white">NIM</th>
            <th class="text-center" style="background-color: #441752; color: white">NAMA ANGGOTA</th>
            <th class="text-center" style="background-color: #441752; color: white">JENIS KELAMIN</th>
            <th class="text-center" style="background-color: #441752; color: white">NAMA JABATAN</th>
            <th class="text-center" style="background-color: #441752; color: white">HADIR</th>
            <th class="text-center" style="background-color: #441752; color: white">SAKIT</th>
            <th class="text-center" style="background-color: #441752; color: white">ALPHA</th>
        </tr>

        <?php
        $no=1;
        foreach($kehadiran as $khr): ?>
            <tr>
                <td ><?php echo $no++ ?></td>
                <td><?php echo $khr->nim ?></td>
                <td><?php echo $khr->nama_anggota ?></td>
                <td><?php echo $khr->jenis_kelamin ?></td>
                <td><?php echo $khr->nama_jabatan ?></td>
                <td><?php echo $khr->hadir ?></td>
                <td><?php echo $khr->sakit ?></td>
                <td><?php echo $khr->alpha ?></td>
            </tr>
        <?php endforeach; ?>
    </table><br><br><br><br>
    </div>

    <?php }else{ ?>
        <span class="badge badge-danger"><i class="fas fa-info-circle"></i>Data Masih Kosong, Silahkan Input Data Kehadiran pada tanggal, bulan, tahun yang anda pilih</span>
    <?php } ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Data kehadiran masih kosong, silakan input absensi terlebih dahulu.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

