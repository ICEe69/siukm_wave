<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fas fa-fw fa-file-alt" style="margin-right: 5px;"></i><strong>KEGIATAN</strong>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('admin/kegiatan/input','<button class="btn btn-sm mb-3" style="background-color: #f29f58; color:white;"><i class="fas fa-plus fa-sm"></i> Tambah Kegiatan</button>') ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="background-color: #441752; color: white">NO</th>
                    <th class="text-center" style="background-color: #441752; color: white">NAMA KEGIATAN</th>
                    <th class="text-center" style="background-color: #441752; color: white">TANGGAL KEGIATAN</th>
                    <th class="text-center" style="background-color: #441752; color: white">LOKASI</th>
                    <th class="text-center" style="background-color: #441752; color: white">PENYELENGGARA</th>
                    <th class="text-center" style="background-color: #441752; color: white">KUOTA</th>
                    <th class="text-center" style="background-color: #441752; color: white">LINK</th>
                    <th class="text-center" style="background-color: #441752; color: white">STATUS</th>
                    <th class="text-center" style="background-color: #441752; color: white">DESKRIPSI</th>
                    <th class="text-center" style="background-color: #441752; color: white">POSTER</th>
                    <th colspan="2" class="text-center" style="background-color: #441752; color: white">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                $no = 1;
                foreach ($kegiatan as $kgt): ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $kgt->nama_kegiatan ?></td>
                    <td><?php echo $kgt->tanggal_kegiatan ?></td>
                    <td><?php echo $kgt->lokasi ?></td>
                    <td><?php echo $kgt->penyelenggara ?></td>
                    <td><?php echo $kgt->kuota ?></td>
                    <td><a href="<?php echo $kgt->link ?>" target="_blank"><?php echo $kgt->link ?></a></td>
                    <td><?php echo $kgt->status ?></td>
                    <td><?php echo $kgt->deskripsi ?></td>
                    <td><img src="<?php echo base_url().'assets/poster/'.$kgt->poster ?>" width="100px"></td>
                    <td><?php echo anchor('admin/kegiatan/update/' .$kgt->id_kegiatan,'<div class="btn btn-sm" style="background-color: #E87A5F; color: white;"><i class="fa fa-edit"></i></div>') ?></td>
                    <td><?php echo anchor('admin/kegiatan/delete/' .$kgt->id_kegiatan,'<div class="btn btn-sm" style="background-color: #ab4459; color: white;"><i class="fa fa-trash"></i></div>') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>