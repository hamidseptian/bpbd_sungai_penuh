 <div class="row">
    <div class="col-md-12">
      <div class="box">
       
        <div class="box-body" style="overflow-x: scroll">
          <?php echo $this->session->flashdata('pesan') ?>
          <table class="table table-striped table-bordered" id="tabel1">
            <thead>
              <tr>
                <td width="20px">No</td>
                <td>NIP</td>
                <td>Nama</td>
                <td>Jabatan</td>
                <td>Alamat</td>
                <td>No HP</td>
              
                <td width="90px">Option</td>
              </tr>
            </thead>
            <?php 
            $no=1;
            $status = ['Tidak Aktif', 'Aktif'];
            foreach ($petugas as $d1) { ?>
              <tr>
                <td><?php echo $no++ ?></td>

                <td><?php echo $d1['nip'] ?></td>
                <td><?php echo $d1['nama'] ?></td>
                <td><?php echo $d1['jabatan'] ?></td>
                <td><?php echo $d1['alamat'] ?></td>
                <td><?php echo $d1['no_hp'] ?></td>
                <td>
                 <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit" onclick="edit('<?php echo $d1['id_petugas'] ?>')">
                Edit
              </button>
                 <button type="button" class="btn btn-info btn-xs" onclick="hapus('<?php echo $d1['id_petugas'] ?>','<?php echo $d1['nama'] ?>')">
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
    <form action="<?php echo base_url('user/admin/petugas/simpan') ?>" method='post'>  
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Jenis barang</h4>
              </div>
              <div class="modal-body">
              
                <div class="form-group">
                  <label>NIP</label>
                  <input type="text" class="form-control" name="nip" required>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" required>
                </div>
                <div class="form-group">
                  <label>Pangkat</label>
                  <select class="form-control" name="pangkat">
                    <?php foreach (pangkat() as $k => $v) {?>
                      <option value="<?php echo $k ?>"><?php echo $v ?></option>
                    <?php } ?>
                  </select>
                 
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="alamat" required>
                </div>
                <div class="form-group">
                  <label>No HP</label>
                  <input type="text" class="form-control" name="nohp" required>
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

  <div class="modal fade" id="edit">
    <form action="<?php echo base_url('user/admin/petugas/simpanedit') ?>" method='post'>  
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Jenis barang</h4>
              </div>
              <div class="modal-body">
              
                <div class="form-group">
                  <label>NIP</label>
                  <input type="text" class="form-control" name="id_petugas" id="id_petugas" required>
                  <input type="text" class="form-control" name="nip" id="nip" required>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                </div>
                <div class="form-group">
                  <label>Pangkat</label>
                  <select class="form-control" name="pangkat" id="pangkat">
                    <?php foreach (pangkat() as $k => $v) {?>
                      <option value="<?php echo $k ?>"><?php echo $v ?></option>
                    <?php } ?>
                  </select>
                 
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" required>
                </div>
                <div class="form-group">
                  <label>No HP</label>
                  <input type="text" class="form-control" name="nohp" id="nohp" required>
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
  

function hapus(id_petugas, petugas)
  {
    Swal.fire({
        title: 'Warning',
        html: 'Nonaktifkan petugas '+petugas+' .?',
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
              url     : baseUrl('/user/admin/petugas/hapus'),
              type    : 'POST',
              data    : { 
                id_petugas : id_petugas,
                
              },
              success : function(data)
              {
                // alert('ew');
                window.location.href=baseUrl('user/admin/petugas');
              },
              error : function(){
                alert('ee');
                
              }
            });
      

        
        }
      }); 
  }



function edit(id_petugas)
  {
    
            $.ajax(
            {
              url     : baseUrl('/user/admin/petugas/edit'),
              dataType: 'JSON',
              type    : 'POST',
              data    : { 
                id_petugas : id_petugas,
                
              },
              success : function(data)
              {
                  $('#edit').find('#nip').val(data.nip);
                  $('#edit').find('#nama').val(data.nama);
                  $('#edit').find('#jabatan').val(data.jabatan);
                  $('#edit').find('#alamat').val(data.alamat);
                  $('#edit').find('#nohp').val(data.no_hp);
                  $('#edit').find('#pangkat').val(data.pangkat).change();
                  $('#edit').find('#id_petugas').val(data.id_petugas);
              },
              error : function(){
              }
            });
          }
      

</script>









