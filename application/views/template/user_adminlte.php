<?php 
  $id_hak_akses = $this->session->userdata('id_hak_akses');
if ($this->session->userdata('login')!=true) {
  $this->session->set_flashdata('pesan','<div class="alert alert-danger">Login dulu</div>');
  redirect('auth/login');
}else{
  $id_user = $this->session->userdata('id_user');
  $user = $this->db->query("SELECT *  from user u left join hak_akses ha on u.id_hak_akses = ha.id_hak_akses where id_user='$id_user'")->row_array();
  $nama_user = $user['nama'];
  $jabatan_user = $user['jabatan'];
  $hak_akses = $user['nama_hak_akses'];
  $id_hak_akses = $user['id_hak_akses'];
  $foto = $user['foto'] == '' ? base_url().'/file/user/user.png' :  base_url().'/file/user/'.$user['foto'] ;
  $show_judul = $judul == "" ? '': $judul.'';

}
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $show_judul ?> | BPBD Sungai Penuh</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo   base_url('assets/adminlte/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo   base_url('assets/adminlte/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo   base_url('assets/adminlte/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo   base_url('assets/adminlte/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo   base_url('assets/adminlte/') ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo   base_url('assets/adminlte/') ?>dist/css/skins/_all-skins.min.css">

    <script src="<?php echo base_url() ?>assets/sweetalert/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/sweetalert/dist/sweetalert2.min.css">


    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
  <!-- <header class="main-header" style="position:  fixed; width: 100%"> -->
    <!-- Logo -->
    <a href="#" class="logo">
      BPBD Sungai Penuh
        <!-- <img src="<?php echo base_url('assets/gambar/logo.png') ?>" width="110px">  -->
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->

          <?php if ($id_hak_akses==1) { 
            $q_pengeluaran = $this->db->query("SELECT p.keterangan, p.besar_pengeluaran, u.nama from pengeluaran p left join user u on p.id_user = u.id_user where p.status = 0");
            $j_pengeluaran = $q_pengeluaran->num_rows();
            ?>
            <li class="dropdown messages-menu">
            <?php if ($j_pengeluaran>0) { ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?php echo $j_pengeluaran ?></span>
            </a>
            <?php } ?>
            <ul class="dropdown-menu">
              <li class="header"><?php echo $j_pengeluaran ?> usulan pengeluaran baru</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php foreach ($q_pengeluaran->result_array() as $key => $d_pengeluaran) {  ?>
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <center><i class="fa fa-envelope-o"></i></center>
                      </div>
                      <h4>
                        <?php echo $d_pengeluaran['nama'] ?>

                        <small><i class="fa fa-money"></i> <?php echo number_format($d_pengeluaran['besar_pengeluaran']) ?></small>
                      </h4>
                      <p><?php echo $d_pengeluaran['keterangan'] ?></p>
                    </a>
                  </li>
                <?php } ?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url('user/master/approval/pengeluaran') ?>">See All Messages</a></li>
            </ul>
          </li>
          <?php } ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $foto ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $nama_user ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $foto ?>" alt="User Image">

                <p>
                  <?php echo $nama_user ?>
                  <small><?php echo $jabatan_user ?></small>
                </p>
              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url() ?>auth/profile/update_password" class="btn btn-info btn-flat">Update Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url() ?>auth/login/logout" class="btn btn-info btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
       
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $foto ?>" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nama_user ?></p>
          <a href="#"><?php echo $hak_akses ?></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header" style="color:pink">Admin</li> -->
        <!-- <li class="header">Master Data [Super Admin]</li> -->
            <!-- <li><a href="<?php echo base_url('user/su/admin') ?>" style="color:grey"><i class="fa fa-circle-o"></i> Data Admin</a></li> -->
        <?php if ($id_hak_akses=='3') {  ?>
        <li class="header">Master Data </li>
            <li><a href="<?php echo base_url('user/admin/jenis_bencana') ?>" style="color:aqua"><i class="fa fa-circle-o"></i> Data Jenis Bencana</a></li>
            <li><a href="<?php echo base_url('user/admin/jenis_bantuan') ?>" style="color:aqua"><i class="fa fa-circle-o"></i> Data Jenis Bantuan</a></li>
            <li><a href="<?php echo base_url('user/admin/user') ?>" style="color:aqua"><i class="fa fa-circle-o"></i> Data User</a></li>
            <li><a href="<?php echo base_url('user/admin/petugas') ?>" style="color:aqua"><i class="fa fa-circle-o"></i> Data Petugas</a></li>
          <?php }else{ ?>
        <li class="header">Menu</li>
            <li><a href="<?php echo base_url('user/operator/bencana') ?>" style="color:aqua"><i class="fa fa-circle-o"></i> Bencana</a></li>
            <li><a href="<?php echo base_url('user/operator/laporan') ?>" style="color:yellow"><i class="fa fa-circle-o"></i> Laporan</a></li>
        <?php } ?>
        
    


        
     <!--    <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li> -->
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $show_judul ?>
      </h1>
      <div class="breadcrumb">
         <?php echo @$breadchumb ?>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo  $konten ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <!-- <b>Version</b> 2.4.18 -->
    </div>
    <strong>Copyright &copy; 2025. BPBD Provinsi Jambi. Template By  <a href="javascript:void(0)">AdminLTE</a>. Development By  <a href="https://www.instagram.com/hamidseptian" target="_blank">Hamid Septian</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!-- <div class="control-sidebar-bg"></div> -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<!-- FastClick -->
<script src="<?php echo base_url('assets/adminlte/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/adminlte/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/adminlte/') ?>dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#tabel1').DataTable()
    $('.data_tabel').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });

   function baseUrl(link = '') {
            let alamat = "<?php echo base_url(); ?>" + link;
            return alamat;
        }

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function number_format(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1.$2");
    return x;
}



    // function getkey(e)
    //         {
    //         if (window.event)
    //            return window.event.keyCode;
    //         else if (e)
    //            return e.which;
    //         else
    //            return null;
    //         }
            
    //     function goodchars(e, goods, field)
    //         {
    //             var key, keychar;
    //             key = getkey(e);
    //             if (key == null) return true;
                 
    //             keychar = String.fromCharCode(key);
    //             keychar = keychar.toLowerCase();
    //             goods = goods.toLowerCase();
                 
    //             // check goodkeys
    //             if (goods.indexOf(keychar) != -1)
    //                 return true;
    //             // control keys
    //             if ( key==null || key==0 || key==8 || key==9 || key==27 )
    //                return true;
                    
    //             if (key == 13) {
    //                 var i;
    //                 for (i = 0; i < field.form.elements.length; i++)
    //                     if (field == field.form.elements[i])
    //                         break;
    //                 i = (i + 1) % field.form.elements.length;
    //                 field.form.elements[i].focus();
    //                 return false;
    //                 };
    //             // else return false
    //             return false;
    //         }

      function showAutoCurrency(){
    $('input.currency').number( true, 0 );
  }

</script>
</body>
</html>
