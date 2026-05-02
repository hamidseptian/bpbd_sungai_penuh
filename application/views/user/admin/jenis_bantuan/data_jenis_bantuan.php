 <div class="row">
    <div class="col-md-12">
      <div class="box">
       
        <div class="box-body" style="overflow-x: scroll">
          <?php echo $this->session->flashdata('pesan') ?>
          <table class="table table-striped table-bordered" id="tabel1">
            <thead>
              <tr>
                <td width="20px">No</td>
                <td>Kategori</td>
                <td>Item</td>
                <td>Satuan</td>
              
                <td width="90px">Option</td>
              </tr>
            </thead>
            <?php 
            $no=1;
            $status = ['Tidak Aktif', 'Aktif'];
            foreach ($jenis_bantuan as $d1) { ?>
              <tr>
                <td><?php echo $no++ ?></td>

                <td><?php echo $d1['kategori'] ?></td>
                <td><?php echo $d1['item'] ?></td>
                <td><?php echo $d1['satuan'] ?></td>
                <td>
                 <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit_metode" onclick="edit('<?php echo $d1['id_jenis_bantuan'] ?>')">
                Edit
              </button>
                 <button type="button" class="btn btn-info btn-xs" onclick="hapus('<?php echo $d1['id_jenis_bantuan'] ?>','<?php echo $d1['item'] ?>')">
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
    <form action="<?php echo base_url('user/admin/jenis_bantuan/simpan') ?>" method='post'>  
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
                    foreach ($kategori as $k => $v) { ?>
                      <option><?php echo $v['kategori'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Item Bantuan</label>
                  <input type="text" class="form-control" name="item" required>
                </div>
                <div class="form-group">
                  <label>Satuan </label>
                  <input type="text" class="form-control" name="satuan" required>
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
    <form action="<?php echo base_url('user/admin/jenis_bantuan/simpanedit') ?>" method='post' id='xxxx'> 
      
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
                    foreach ($kategori as $k => $v) { ?>
                      <option><?php echo $v['kategori'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Item Bantuan</label>
                  <input type="text" class="form-control" name="item" id="item" required>
                  <input type="hidden" class="form-control" name="id_jenis_bantuan" id="id_jenis_bantuan" required>
                </div>

                <div class="form-group">
                  <label>Satuan </label>
                  <input type="text" class="form-control" name="satuan" required id="satuan">
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
  

function hapus(id_jenis_bantuan, jenis_bantuan)
  {
    Swal.fire({
        title: 'Warning',
        html: 'Hapus Jenis barang '+jenis_bantuan+' .?',
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
              url     : baseUrl('/user/admin/jenis_bantuan/hapus'),
              type    : 'POST',
              data    : { 
                id_jenis_bantuan : id_jenis_bantuan,
                
              },
              success : function(data)
              {
                // alert('ew');
                window.location.href=baseUrl('user/admin/jenis_bantuan');
              },
              error : function(){
                alert('ee');
                
              }
            });
      

        
        }
      }); 
  }



function edit(id_jenis_bantuan)
  {
    
            $.ajax(
            {
              url     : baseUrl('/user/admin/jenis_bantuan/edit'),
              dataType: 'JSON',
              type    : 'POST',
              data    : { 
                id_jenis_bantuan : id_jenis_bantuan,
                
              },
              success : function(data)
              {
                  $('#edit_metode').find('#id_jenis_bantuan').val(data.id_jenis_bantuan);
                  $('#edit_metode').find('#satuan').val(data.satuan);
                  $('#edit_metode').find('#item').val(data.item);
                  $('#edit_metode').find('#kategori').val(data.kategori).change();
              },
              error : function(){
              }
            });
          }
      

</script>









