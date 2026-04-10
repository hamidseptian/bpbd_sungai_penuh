<div class="row">
  <div class="col-md-12">
    <?php echo $this->session->flashdata('pesan') ?>
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua">
            	Selamad datang di halaman <?php echo $hak_akses[$user['id_hak_akses']] ?> 
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
