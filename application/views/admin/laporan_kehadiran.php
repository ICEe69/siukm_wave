<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="card mx-auto" style="width: 65%;">
        <div class="card-header bg-primary text-white text-center">
            Filter Laporan Kehadiran Anggota
        </div>
        
        <form action="POST" action="<?php echo base_url('admin/laporan_kehadiran/cetak_laporankehadiran') ?>">

        <div class="card-body">
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Tanggal</label>
                <div class="col-sm-9">
                <select class="form-control" name="tanggal">
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
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Bulan</label>
                <div class="col-sm-9">
                <select class="form-control" name="bulan">
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
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Tahun</label>
                <div class="col-sm-9">
                <select class="form-control" name="tahun">
                        <option value="">--Pilih Tahun--</option>
                        <?php $tahun = date('Y'); 
                        for($i=2020;$i<$tahun+5;$i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <button style="width: 100%;" type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Laporan Kehadiran</button>
        </div>
    </div>
    </form>

</div>