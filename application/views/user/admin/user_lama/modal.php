<?php 

  $status = ['Tidak Aktif','Aktif'];

   ?>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="<?php echo base_url('user/admin/user/simpan') ?>" method='post' enctype="multipart/form-data"> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" >
                </div>
                <div class="form-group">
                  <label>No HP</label>
                  <input type="text" class="form-control" name="nohp" id="nohp" required>
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="berkas" id="berkas" >
                </div>
                <div class="form-group">
                  <hr>
                </div>
                <div class="form-group mb-3">
                  <label>Hak Akses</label> <br>
                   <?php foreach ($hak_akses as $k => $v) { ?>
                    <div><input type="checkbox" name="hak_akses[]" id="hak_akses" value="<?php echo $k ?>"> <?php echo $v; ?></div>
                    <?php } ?>
                 
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" id="username" >
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" name="password" id="password" >
                </div>
                <div class="form-group">
                  <label>Status Login</label>
                  <select class="form-control" name="status" id="status" >
                    <?php foreach ($status as $k => $v) { ?>
                      <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                    <?php } ?>
                  </select>
                </div>


                </div>
               
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
  </form>
</div>



<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="<?php echo base_url('user/admin/user/simpanedit') ?>" method='post' enctype="multipart/form-data"> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="hidden" class="form-control" name="id_user" id="id_user" >
                  <input type="text" class="form-control" name="nama" id="nama" >
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" >
                </div>
                <div class="form-group">
                  <label>No HP</label>
                  <input type="text" class="form-control" name="nohp" id="nohp" >
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" id="jabatan" >
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" id="email" >
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="berkas" id="berkas" >
                </div>
                <div class="form-group">
                  <hr>
                </div>

                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" id="status" >
                    <?php foreach ($status as $k => $v) { ?>
                      <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                    <?php } ?>
                  </select>
                </div>


                </div>
               
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
  </form>
</div>


<div class="modal fade" id="edit_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="<?php echo base_url('user/admin/user/simpanedit_login') ?>" method='post' enctype="multipart/form-data"> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Login user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                  <input type="hidden" class="form-control" name="id_user" id="id_user" >
              

                <div class="form-group mb-3">
                  <label>Hak Akses</label> <br>
                   <?php foreach ($hak_akses as $k => $v) { ?>
                    <div><input type="checkbox" name="hak_akses[]" id="hak_akses_<?php echo $k ?>" value="<?php echo $k ?>" class="input_hak_akses"> <?php echo $v; ?></div>
                    <?php } ?>
                 
                </div>


                
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" id="username" >
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" name="password" id="password" >
                </div>
                <div class="form-group">
                  <label>Status Login</label>
                  <select class="form-control" name="status" id="status" >
                    <?php foreach ($status as $k => $v) { ?>
                      <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                    <?php } ?>
                  </select>
                </div>

                </div>
               
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
  </form>
</div>


<div class="modal fade" id="atur_outlet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="<?php echo base_url('user/admin/user/simpanedit_outlet_user') ?>" method='post' enctype="multipart/form-data"> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Login user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                  <input type="hidden" class="form-control" name="id_user" id="id_user" >
              
                <div class="row">
                   <div class="col-md-12"> 
                    <table class="table">
                      <tr>
                        <td>Nama </td>
                        <td>:</td>
                        <td id="nama"></td>
                      </tr>
                      <tr>
                        <td>Jabatan </td>
                        <td>:</td>
                        <td id="jabatan"></td>
                      </tr>
                      <tr>
                        <td>No HP </td>
                        <td>:</td>
                        <td id="no_hp"></td>
                      </tr>
                    </table>
                        
                  </div>
                  <div class="col-md-6"> 
                    <div class="form-group mb-3">
                      <label><u>Outlet F & B</u></label> <br>
                       <?php foreach ($outlet_fnb as $k => $v) { ?>
                        <div><input type="checkbox" name="outlet_fnb[]" id="outlet_fnb_<?php echo $k ?>" value="<?php echo $k ?>" class="input_outlet_fnb"> <?php echo $v; ?></div>
                        <?php } ?>
                     
                    </div>
                        
                  </div>
                 
                  <div class="col-md-6"> 
                    <div class="form-group mb-3">
                      <label><u>Outlet Proshop</u></label> <br>
                       <?php foreach ($outlet_proshop as $k => $v) { ?>
                        <div><input type="checkbox" name="outlet_proshop[]" id="outlet_proshop_<?php echo $k ?>" value="<?php echo $k ?>" class="input_outlet_proshop"> <?php echo $v; ?></div>
                        <?php } ?>
                     
                    </div>
                        
                  </div>
                </div>
               


                

                </div>
               
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
  </form>
</div>


<script>
function atur_outlet(id_user)
  {
    
            $.ajax(
            {
              url     : baseUrl('/user/admin/user/atur_outlet'),
              dataType: 'JSON',
              type    : 'POST',
              data    : { 
                id_user : id_user,
                
              },
              success : function(data)
              {
                  $('#atur_outlet').find('#id_user').val(data.user.id_user);
                  $('#atur_outlet').find('#nama').html(data.user.nama);
                  $('#atur_outlet').find('#no_hp').html(data.user.nohp);
                  $('#atur_outlet').find('#jabatan').html(data.user.jabatan);

                 

                  $.each(data.outlet_fnb, function(k,v){
                  console.log(data);
                  $('#atur_outlet').find('#outlet_fnb_'+v.id_outlet).attr('checked','checked');

                  });

                  $.each(data.outlet_proshop, function(k,v){
                  $('#atur_outlet').find('#outlet_proshop_'+v.id_outlet).attr('checked','checked');

                  });
              

              },
              error : function(){
                alert('error');
              }
            });
          }
      


function edit(id_user)
  {
    
                  $('#edit_login').find('.input_hak_akses').removeAttr('checked');
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

                // $('input.currency').number( true, 0 );
                  $('#edit').find('#id_user').val(data.user.id_user);
                  $('#edit').find('#nama').val(data.user.nama);
                  $('#edit').find('#alamat').val(data.user.alamat);
                  $('#edit').find('#nohp').val(data.user.nohp);
                  $('#edit').find('#jabatan').val(data.user.jabatan);
                  $('#edit').find('#email').val(data.user.email);
                  $('#edit').find('#status').val(data.user.status).change();
                  $('#edit_login').find('#id_user').val(data.user.id_user);
                  $('#edit_login').find('#username').val(data.user.username);
                  $('#edit_login').find('#status').val(data.user.status_akses).change();

                  $.each(data.hak_akses, function(k,v){
                  $('#edit_login').find('#hak_akses_'+v.id_hak_akses).attr('checked','checked');

                  });
              

              },
              error : function(){
                alert('33');
              }
            });
          }
      


  function hapus(id, user){
     
    Swal.fire({
        title: 'Hapus ?',
        text: 'Hapus user '+user+'.?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          
            $.ajax({
          url: '<?php echo base_url() ?>user/admin/user/hapus/',
              type: 'POST',
              // dataType: 'JSON',
              data: {    
                id : id,
              },
              success: function(data) {
                
                window.location.href=baseUrl('user/admin/user');
              },
              error: function(jqXHR, textStatus, errorThrown) {
              }
          });

        
        }
      });


    
  }

</script>









