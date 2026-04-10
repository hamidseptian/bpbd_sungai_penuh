 <div class="row">
    <div class="col-md-12">
      <div class="box">
       
        <div class="box-body" style="overflow-x: scroll">



          <?php echo $this->session->flashdata('pesan') ?>
          <table class="table table-striped table-bordered" id="tabel1">
            <thead>
              <tr>
                <td width="20px">No</td>
                <td>Foto </td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>No HP</td>
                <td>Email</td>
                <td>Jabatan</td>
                <td>Akses User</td>
               
                <td>Status</td>
              
                <td width="90px">Option</td>
              </tr>
            </thead>
            <?php 
            $no=1;
            $status = ['Tidak Aktif', 'Aktif'];
            foreach ($user as $d1) { 
              $foto = $d1['foto'] == '' ? base_url('file/user/user.png') : base_url('file/user/'.$d1['foto']);
              ?>
              <tr>
                <td><?php echo $no++ ?></td>

                <td><img src="<?php echo $foto ?>" width="100px"></td>
                <td><?php echo $d1['nama'] ?></td>
                <td><?php echo $d1['alamat'] ?></td>
                <td><?php echo $d1['nohp'] ?></td>
                <td><?php echo $d1['email'] ?></td>
                <td><?php echo $d1['jabatan'] ?></td>
                <td><?php echo $d1['id_hak_akses'] == '' ? '' : $hak_akses[$d1['id_hak_akses']] ?></td>
               
                <td><?php echo $status[$d1['status']].'<br>Login : '.$status[$d1['status_akses']] ?></td>
                <td>
                 <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit_data" onclick="edit('<?php echo $d1['id_user'] ?>')">
                Edit Data
              </button>
                 <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit_login" onclick="edit_login('<?php echo $d1['id_user'] ?>')">
                Edit Login
              </button>
                 <button type="button" class="btn btn-info btn-xs" onclick="hapus('<?php echo $d1['id_user'] ?>','<?php echo $d1['nama'] ?>')">
                Hapus
              </button>
                 
                </td>
              </tr>
            <?php } ?>
            
          </table>
        </div>


      </div>
    </div>


  </div>


  <div class="modal fade" id="tambah">
    <form action="<?php echo base_url('user/admin/user/simpan') ?>" method='post' enctype="multipart/form-data">  
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah User</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" required id="nama">
                </div>
                  <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="alamat" required id="alamat">
                </div>
                  <div class="form-group">
                  <label>No HP</label>
                  <input type="text" class="form-control" name="nohp" required id="nohp">
                </div>
                  <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" required id="email">
                </div>
                  <div class="form-group">
                  <label>Jabatan </label>
                  <input type="text" class="form-control" name="jabatan" required id="jabatan">
                </div>
                  <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="berkas" id="berkas">
                </div>

                <hr>

                  <div class="form_hak_akses">
                    
                    <div class="form-group">
                      <label>Hak Akses</label>
                      <select class="form-control" name="id_hak_akses" id="id_hak_akses">
                        <?php foreach ($hak_akses as $k => $v) { ?>
                          <option value="<?php echo $k ?>"><?php echo $v ?></option>
                        <?php } ?>
                      </select>
                    </div>
                      <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                      <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                  </div>

             
             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
    </form>
        </div>


  <div class="modal fade" id="edit_data">
    <form action="<?php echo base_url('user/admin/user/simpanedit') ?>" method='post' enctype="multipart/form-data"> 
      
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit User</h4>
              </div>
                <input type="hidden" class="form-control" name="id_user" required id="id_user">
                <input type="hidden" class="form-control" name="file_lama" required id="file_lama">
               <div class="modal-body">
                  <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" required id="nama">
                </div>
                  <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="alamat" required id="alamat">
                </div>
                  <div class="form-group">
                  <label>No HP</label>
                  <input type="text" class="form-control" name="nohp" required id="nohp">
                </div>
                  <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" required id="email">
                </div>
                  <div class="form-group">
                  <label>Jabatan </label>
                  <input type="text" class="form-control" name="jabatan" required id="jabatan">
                </div>
                  <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="berkas" id="berkas">
                </div>
                  <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                  </select>
                </div>

             
             
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            
          </div>
    </form>
        </div>




  <div class="modal fade" id="edit_login">
    <form action="<?php echo base_url('user/admin/user/simpanedit_akun') ?>" method='post' enctype="multipart/form-data"> 
      
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Login User <span id="nama_user"></span></h4>
              </div>
                <input type="hidden" class="form-control" name="id_user" required id="id_user">
               <div class="modal-body">
               
                  <div class="form_edit_login">
                    
                    <div class="form-group">
                      <label>Hak Akses</label>
                      <select class="form-control" name="id_hak_akses" id="id_hak_akses">
                        <?php foreach ($hak_akses as $k => $v) { ?>
                          <option value="<?php echo $k ?>"><?php echo $v ?></option>
                        <?php } ?>
                      </select>
                    </div>
                      <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control username" name="username" id="username" required>
                    </div>
                      <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control password" name="password" id="password" required>
                    </div>
                  </div>
                  <div class="form-group">
                  <label>Status Login</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                  </select>
                </div>

             
             
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            
          </div>
    </form>
        </div>

<script>
  
$('#edit_login').find('#status').change(function(){
  if ($(".berikan_akses").is(':checked')) {

    $('.username').removeAttr('required');
    $('.password').removeAttr('required');
  }else{
    $('.username').removeAttr('required');
    $('.password').removeAttr('required');


  }
});



function hapus(id_user, metode_pembayaran)
  {
    Swal.fire({
        title: 'Warning',
        html: 'Hapus user '+metode_pembayaran+' .?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax(
            {
              url     : baseUrl('/user/admin/user/hapus'),
              type    : 'POST',
              data    : { 
                id_user : id_user,
                
              },
              success : function(data)
              {
                // alert('ew');
                window.location.href=baseUrl('/user/admin/user');
              },
              error : function(){
                alert('ee');
                
              }
            });
      

        
        }
      }); 
  }



 


function edit(id_user)
  {
    
            $.ajax(
            {
              url     : baseUrl('/user/admin/user/edit'),
              dataType: 'JSON',
              type    : 'POST',
              data    : { 
                id_user : id_user,
                
              },
              success : function(data)
              {
                  $('#edit_data').find('#id_user').val(data.id_user);
                  $('#edit_data').find('#nama').val(data.nama);
                  $('#edit_data').find('#alamat').val(data.alamat);
                  $('#edit_data').find('#nohp').val(data.nohp);
                  $('#edit_data').find('#email').val(data.email);
                  $('#edit_data').find('#jabatan').val(data.jabatan);
                  $('#edit_data').find('#file_lama').val(data.foto);
                  // $('#edit_data').find('#password').val(data.password);
                  $('#edit_data').find('#status').val(data.status);
                  if (data.status_akses==1) {
                      $("#berikan_akses_edit").prop('checked', true);
                      $('.form_hak_akses').show();

                  $('#edit_data').find('#username').attr('required', 'required');
                  $('#edit_data').find('#password').attr('required', 'required');
                  }else{
                      $("#berikan_akses_edit").prop('checked', false);
                      $('.form_hak_akses').hide();


                  }

                  
                  $('#edit_data').find('#status').val(data.status).change();

                  $('#edit_data').find('#id_hak_akses').val(data.id_hak_akses).change();
              
              },
              error : function(){
              }
            });
          }
      
function edit_login(id_user)
  {
    
            $.ajax(
            {
              url     : baseUrl('/user/admin/user/edit'),
              dataType: 'JSON',
              type    : 'POST',
              data    : { 
                id_user : id_user,
                
              },
              success : function(data)
              {
                console.log(data.nama);
                  $('#edit_login').find('#id_user').val(data.id_user);
                  $('#edit_login').find('#nama_user').html('<br>'+data.nama);
   

                  

                  $('#edit_login').find('#id_hak_akses').val(data.id_hak_akses).change();
              
              },
              error : function(){
              }
            });
          }
      

</script>









