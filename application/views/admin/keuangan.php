<div class="container-fluid">

    <div class="alert alert-success" role="alert">
       <i class="fas fa-fw fa-tachometer-alt"></i> Keuangan
</div>

    <?php echo $this->session->flashdata('pesan') ?>

<div class="card mb-3">
    <div class="card-header bg-primary text-white">
        Filter Data Keuangan UKM
    </div>
        <div class="card-body">
           <form class="form-inline">
            <div style="display: flex;column-gap: 1rem;" >
                <div class="form-group mb-2">
                    <label for="staticEmail2" class="">Tanggal</label>
                    <select class="form-control ml-3" name="tanggal">
                        <option value="">--Pilih Tanggal--</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
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
                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                <a href="" class="btn btn-success mb-2 ml-3"><i class="fas fa-print"></i> Cetak Data Keuangan</a>
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

    <div class="alert alert-info">
        Menampilkan Data keuangan UKM Tanggal: <span class="font-weight-bold"><?php echo $tanggal ?></span> Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div>

    <div>
        <table class="table table-striped table-bordered table-hover">
        <tr>
            <th class="text-center">NO</th>
            <th class="text-center">NAMA KEGIATAN</th>
            <th class="text-center">JENIS TRANSAKSI</th>
            <th class="text-center">DEKSRIPSI</th>
            <th class="text-center">JUMLAH</th>
            <th class="text-center">SUMBER DANA</th>
            <th class="text-center">BUKTI TRANSAKSI</th>
            <th class="text-center">TOTAL SALDO</th>
        </tr>

        <?php
        $no=1;
        foreach($keuangan as $kgn): ?>
            <tr>
                <td ><?php echo $no++ ?></td>
                <td><?php echo $kgn->nama_kegiatan?></td>
                <td><?php echo $kgn->jenis_transaksi ?></td>
                <td><?php echo $kgn->deskripsi ?></td>
                <td><?php echo $kgn->jumlah ?></td>
                <td><?php echo $kgn->sumber_dana ?></td>
                <td><img src="<?php echo base_url().'assets/btransfer/'.$kgn->bukti_transfer ?>" width="75px"></td>
                <td><?php echo $kgn->total_saldo ?></td>
            </tr>
        <?php endforeach; ?>
    </table><br><br><br><br>
    </div>