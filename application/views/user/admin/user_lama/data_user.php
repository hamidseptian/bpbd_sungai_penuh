 <div class="row">
    <div class="col-md-12">
      <div class="box">
       
        <div class="box-body" style="overflow-x: scroll">
          <?php echo $this->session->flashdata('pesan') ?>
             <table class="table table-striped table-bordered data_tabel">
                                                        <thead>
                                                          <tr>
                                                            <td width="20px">No</td>
                                                            <td>Nama</td>
                                                            <td>Alamat</td>
                                                            <td>No HP</td>
                                                            <td>Email</td>
                                                            <td>Jabatan</td>
                                                            <td>Hak Akses</td>
                                                            <td>Status</td>
                                                          
                                                            <td width="90px">Option</td>
                                                          </tr>
                                                        </thead>
                                                        <?php 
                                                        $no=1;
                                                        foreach ($user as $d1) {  
                                                        
                                                        ?>
                                                          <tr>
                                                            <td><?php echo $no++ ?></td>
                                                           

                                                            <td><?php echo $d1['nama'] ?></td>
                                                            <td><?php echo $d1['alamat'] ?></td>
                                                            <td><?php echo $d1['nohp'] ?></td>
                                                            <td><?php echo $d1['email'] ?></td>
                                                            <td><?php echo $d1['jabatan'] ?></td>
                                                           

                                                            <td><?php echo @$status[$d1['status_akses']] ?></td>
                                                            <td>


                                                                <div role="group" class="btn-group-sm btn-group" >
                                                                
                                                                    <button type="button" class="btn btn-outline-info btn-xs" data-toggle="modal" data-target="#edit" onclick="edit('<?php echo $d1['id_user'] ?>')">
                                                            Edit
                                                          </button>
                                                                    <button type="button" class="btn btn-outline-info btn-xs" data-toggle="modal" data-target="#edit_login" onclick="edit('<?php echo $d1['id_user'] ?>')" >
                                                            Edit Login
                                                          </button>
                                                                    <button type="button" class="btn btn-outline-info btn-xs" onclick="hapus('<?php echo $d1['id_user'] ?>','<?php echo $d1['nama'] ?>')">
                                                            Hapus
                                                          </button>
                                                                </div>


                                                             
                                                            
                                                            </td>
                                                          </tr>
                                                        <?php } ?>
                                                        
                                                      </table>


        </div>


      </div>
    </div>
  </div>


  <div class="modal fade" id="tambah">
    <form action="<?php echo base_url('user/admin/jenis_bencana/simpan') ?>" method='post'>  
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Jenis barang</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="kategori">
                    <?php
                    $kategori = ['Bencana Alam','Bencana Non Alam','Bencana Sosial']; 
                    foreach ($kategori as $k => $v) { ?>
                      <option><?php echo $v ?></option>
                    <?php } ?>
                  </select>
                </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Bencana</label>
                  <input type="text" class="form-control" name="nama_bencana" required>
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


  <div class="modal fade" id="edit_metode">
    <form action="<?php echo base_url('user/admin/jenis_bencana/simpanedit') ?>" method='post' id='xxxx'> 
      
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Jenis barang</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="kategori" id="kategori">
                    <?php
                    $kategori = ['Bencana Alam','Bencana Non Alam','Bencana Sosial']; 
                    foreach ($kategori as $k => $v) { ?>
                      <option><?php echo $v ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Bencana</label>
                  <input type="text" class="form-control" name="nama_bencana" id="nama_bencana" required>
                  <input type="hidden" class="form-control" name="id_jenis_bencana" id="id_jenis_bencana" required>
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
  

function hapus(id_jenis_bencana, jenis_bencana)
  {
    Swal.fire({
        title: 'Warning',
        html: 'Nonaktifkan Jenis barang '+jenis_bencana+' .?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Nonaktifkan',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax(
            {
              url     : baseUrl('/user/admin/jenis_bencana/hapus'),
              type    : 'POST',
              data    : { 
                id_jenis_bencana : id_jenis_bencana,
                
              },
              success : function(data)
              {
                // alert('ew');
                window.location.href=baseUrl('user/admin/jenis_bencana');
              },
              error : function(){
                alert('ee');
                
              }
            });
      

        
        }
      }); 
  }



function edit(id_jenis_bencana)
  {
    
            $.ajax(
            {
              url     : baseUrl('/user/admin/jenis_bencana/edit'),
              dataType: 'JSON',
              type    : 'POST',
              data    : { 
                id_jenis_bencana : id_jenis_bencana,
                
              },
              success : function(data)
              {
                  $('#edit_metode').find('#id_jenis_bencana').val(data.id_jenis_bencana);
                  $('#edit_metode').find('#kategori').val(data.kategori).change();
                  $('#edit_metode').find('#nama_bencana').val(data.nama_bencana);
              },
              error : function(){
              }
            });
          }
      

</script>









