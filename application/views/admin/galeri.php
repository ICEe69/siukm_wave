<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-dark" role="alert">
       <i class="fas fa-fw fa-file-alt" style="margin-right: 5px;"></i>Galeri
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">NAMA KEGIATAN</th>
                    <th class="text-center">FOTO</th>
                    <th class="text-center">DESKRIPSI</th>
                    <th colspan="2" class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                $no = 1;
                foreach ($galeri as $gr): ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $gr->nama_kegiatan ?></td>
                    <td><img src="<?php echo base_url('assets/galeri/'.$gr->galeri) ?>" width="100px"></td>
                    <td><?php echo $gr->deskripsi ?></td>
                    <td><?php echo anchor('admin/galeri/update/' . $gr->id_galeri, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
