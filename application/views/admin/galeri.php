<div class="container-fluid" style="margin-bottom: 100px;">

    <div class="alert alert-green-light" style="background-color: #Ab4459; color: white;" role="alert">
       <i class="fab fa-fw fa-envira" style="margin-right: 5px;"></i><strong>GALERI</strong>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="background-color: #441752; color: white">NO</th>
                    <th class="text-center" style="background-color: #441752; color: white">NAMA KEGIATAN</th>
                    <th class="text-center" style="background-color: #441752; color: white">FOTO</th>
                    <th class="text-center" style="background-color: #441752; color: white">DESKRIPSI</th>
                    <th colspan="2" class="text-center" style="background-color: #441752; color: white">AKSI</th>
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
                    <td><?php echo anchor('admin/galeri/update/' . $gr->id_galeri, '<div class="btn btn-sm" style="background-color: #E87A5F; color: white;"><i class="fa fa-edit"></i></div>') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
