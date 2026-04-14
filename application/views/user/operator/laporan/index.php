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
                <td>Nama Bencana</td>
                <td>Keterangan</td>
                <td>Lokasi</td>
                <td>Waktu Kejadian</td>
              
                <td width="90px">Option</td>
              </tr>
            </thead>
            <?php 
            $no=1;
            $status = ['Tidak Aktif', 'Aktif'];
            foreach ($bencana as $d1) { ?>
              <tr>
                <td><?php echo $no++ ?></td>

                <td><?php echo $d1['kategori'] ?></td>
                <td><?php echo $d1['nama_bencana']?></td>
                <td><?php echo $d1['keterangan'] ?></td>
                <td><?php echo $d1['lokasi'] ?></td>
                <td><?php echo $d1['tgl_kejadian'].'<br>'.$d1['jam_kejadian'] ?></td>
                <td>
                 <a href="<?php echo base_url('user/operator/laporan/detail/'.$d1['id_bencana']) ?>" class="btn btn-default btn-xs">
                Detail (langsung print)
              </a>
                
                </td>
              </tr>
            <?php } ?>
            
          </table>
        </div>


      </div>
    </div>
  </div>


  <div class="modal fade" id="tambah">
    <form action="<?php echo base_url('user/operator/bencana/simpan') ?>" method='post'>  
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Bencana</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="kategori">
                    <?php
                    foreach ($kategori as $k => $v) { ?>
                      <option value="<?php echo $v['id_jenis_bencana'] ?>"><?php echo $v['kategori'].' - '.$v['nama_bencana'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" name="ket" required rows="7"></textarea>
                </div>
                <div class="form-group">
                  <label>Tgl Kejadian</label>
                  <input type="date" class="form-control" name="tgl" required>
                </div>
                <div class="form-group">
                  <label>Jam Kejadian</label>
                  <input type="time" class="form-control" name="jam" required>
                </div>
                <div class="form-group">
                  <label>Lokasi Kejadian</label>
                  <input type="text" class="form-control" name="lokasi" required>
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
    <form action="<?php echo base_url('user/operator/bencana/simpanedit') ?>" method='post' id='xxxx'> 
      
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Bencana</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <input type="hidden" class="form-control" name="id_bencana" id="id_bencana">
                  <input type="hidden" class="form-control" name="page" id="page" value="index">
                  <label>Kategori</label>
                  <select class="form-control" name="kategori" id="kategori">
                    <?php
                    foreach ($kategori as $k => $v) { ?>
                      <option value="<?php echo $v['id_jenis_bencana'] ?>"><?php echo $v['kategori'].' - '.$v['nama_bencana'] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" name="ket" id="ket" required rows="7"></textarea>
                </div>
                <div class="form-group">
                  <label>Tgl Kejadian</label>
                  <input type="date" class="form-control" name="tgl" id="tgl" required>
                </div>
                <div class="form-group">
                  <label>Jam Kejadian</label>
                  <input type="time" class="form-control" name="jam" id="jam" required>
                </div>
                <div class="form-group">
                  <label>Lokasi Kejadian</label>
                  <input type="text" class="form-control" name="lokasi" id="lokasi" required>
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
  

function hapus(id_bencana, bencana)
  {
    Swal.fire({
        title: 'Warning',
        html: 'Nonaktifkan Jenis barang '+bencana+' .?',
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
              url     : baseUrl('/user/operator/bencana/hapus'),
              type    : 'POST',
              data    : { 
                id_bencana : id_bencana,
                
              },
              success : function(data)
              {
                // alert('ew');
                window.location.href=baseUrl('user/operator/bencana');
              },
              error : function(){
                alert('ee');
                
              }
            });
      

        
        }
      }); 
  }



function edit(id_bencana)
  {
    
            $.ajax(
            {
              url     : baseUrl('/user/operator/bencana/edit'),
              dataType: 'JSON',
              type    : 'POST',
              data    : { 
                id_bencana : id_bencana,
                
              },
              success : function(data)
              {
                  $('#edit').find('#id_bencana').val(id_bencana);
                  $('#edit').find('#kategori').val(data.id_jenis_bencana).change();
                  $('#edit').find('#tgl').val(data.tgl_kejadian);
                  $('#edit').find('#jam').val(data.jam_kejadian);
                  $('#edit').find('#lokasi').val(data.lokasi);
                  $('#edit').find('#status').val(data.status).change();
                  $('#edit').find('#ket').val(data.keterangan);
                  $('#edit').find('#desa').val(data.desa);
                  $('#edit').find('#kades').val(data.kepala_desa);
              },
              error : function(){
              }
            });
          }
      

</script>









