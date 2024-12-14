<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-dark" role="alert">
       <i class="fas fa-fw fa-file-alt" style="margin-right: 5px;"></i>kegiatan
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('admin/kegiatan/input','<button class="btn btn-sm mb-3" style="background-color: #F8BA2B; color:white;"><i class="fas fa-plus fa-sm"></i> Tambah Kegiatan</button>') ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">NAMA KEGIATAN</th>
                    <th class="text-center">TANGGAL KEGIATAN</th>
                    <th class="text-center">LOKASI</th>
                    <th class="text-center">PENYELENGGARA</th>
                    <th class="text-center">KUOTA</th>
                    <th class="text-center">LINK</th>
                    <th class="text-center">STATUS</th>
                    <th class="text-center">DESKRIPSI</th>
                    <th class="text-center">POSTER</th>
                    <th colspan="3" class="text-center">AKSI</th>
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
                    <td><?php echo anchor('admin/kegiatan/update/' .$kgt->id_kegiatan,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                    <td><?php echo anchor('admin/kegiatan/delete/' .$kgt->id_kegiatan,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>