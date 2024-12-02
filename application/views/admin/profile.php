
<div class="container-fluid">

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('admin/profile/') ?>">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Hak Akses</label>
            <input type="text" name="hak_akses" value="<?php echo $hak_akses?>" class="form-control">
        </div>
    
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>   
</div>