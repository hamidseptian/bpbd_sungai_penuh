<div class="row">
  <div class="col-md-12">
    <?php echo $this->session->flashdata('pesan') ?>
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua">
              <div class="widget-user-image">
                <?php 
                $foto = $user['foto'] == '' ? base_url().'/file/user/user.png' : base_url().'/file/user/'.$user['foto'];
   ?>
                <img class="img" src="<?php echo $foto ?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $user['nama'] ?></h3>
              <h5 class="widget-user-desc"><?php echo $hak_akses[$user['id_hak_akses']] ?></h5>
            </div>
         
          </div>
          <!-- /.widget-user -->
        </div>


</div>

<form action="<?php echo base_url('auth/profile/simpanedit_password') ?>" method="post">
  
 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Update password</h3>
        </div>
        <div class="box-body" style="overflow-x: scroll">
          <?php echo $this->session->flashdata('pesan') ?>
         <div class="form-group">
           <label>Username</label>
           <input type="text" class="form-control" name="username" value="<?php echo $user['username'] ?>">
         </div>
         <div class="form-group">
           <label>Password Lama</label>
           <input type="text" class="form-control" name="password_lama">
         </div>
         <div class="form-group">
           <label>Password Baru</label>
           <input type="text" class="form-control" name="password_baru">
         </div>
         <div class="form-group">
           <label>KOnfirmasi Password Baru</label>
           <input type="text" class="form-control" name="password_baru_konfirm">
         </div>
         <div class="form-group">
           <button> Simpan</button>
         </div>
        </div>


      </div>
    </div>
  </div>
</form>
