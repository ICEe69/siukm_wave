<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title ?></title>
    <style type="text/css">
        body{
            font-family: 'Times New Roman', Times, serif;
            color: black;
        }
    </style>
</head>
<body>

    <center>
        <h1>UNIVERSITAS MARITIM RAJA ALI HAJI</h1>
        <h2>Daftar Kehadiran Anggota UKM wave</h2>
    </center>

    <?php
        if((isset($_GET['tanggal']) && $_GET['tanggal']!='') && (isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                $tanggal = $_GET['tanggal'];
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $tanggalbulantahun = $tanggal.$bulan.$tahun;
                //echo    '<script> alert('.$tanggalbulantahun.');</script>';
            }else{
                $tanggal = date('d');
                $bulan = date('m');
                $tahun = date('Y');
                $tanggalbulantahun = $tanggal.$bulan.$tahun;
            }
    ?>

    <table>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?php echo $tanggal ?></td>
        </tr>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?php echo $bulan ?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?php echo $tahun ?></td>
        </tr>
    </table>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA ANGGOTA</th>
            <th>JENIS KELAMIN</th>
            <th>NAMA JABATAN</th>
            <th>HADIR</th>
            <th>SAKIT</th>
            <th>ALPHA</th>
        </tr>

        <?php
        $no=1;
        foreach($cetak_laporankehadiran as $khr): ?>
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
    </table>

    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <p>Tanjungpinang, <?php echo date("d M Y")?> <br> Finance</p>
                <br>
                <br>
                <p>______________________</p>
            </td>
        </tr>
    </table>
    
</body>
</html>

<script type="text/javascript">
    window.print();
</script>