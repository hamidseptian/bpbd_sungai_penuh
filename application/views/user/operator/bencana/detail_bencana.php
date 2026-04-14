 

          <?php echo $this->session->flashdata('pesan') ?>

          <div class="row">
    <div class="col-md-3">
      <div class="box">

        <div class="box-header with-border">
              <h3 class="box-title">Identitas Bencana</h3>

              <div class="box-tools pull-right">
                 <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit" onclick="edit('<?php echo $bencana['id_bencana'] ?>')">
                Edit
              </button>
              </div>
            </div>



       
        <div class="box-body" style="overflow-x: scroll">
          <table class="table table-striped table-bordered">
            <tr>
              <td>Kategori</td>
              <td>:</td>
              <td><?php echo $bencana['kategori'] ?></td>
            </tr>  
            <tr>
              <td>Nama Bencana</td>
              <td>:</td>
              <td><?php echo $bencana['nama_bencana'] ?></td>
            </tr>  
            <tr>
              <td>Keterangan</td>
              <td>:</td>
              <td><?php echo $bencana['keterangan'] ?></td>
            </tr>  
            <tr>
              <td>Lokasi</td>
              <td>:</td>
              <td><?php echo $bencana['lokasi'] ?></td>
            </tr>  
            <tr>
              <td>Tgl Kejadian</td>
              <td>:</td>
              <td><?php echo $bencana['tgl_kejadian'] ?></td>
            </tr>  
            <tr>
              <td>Jam Kejadian</td>
              <td>:</td>
              <td><?php echo $bencana['jam_kejadian'] ?></td>
            </tr>  
               
          </table>
        </div>


      </div>

    </div>
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-7">

        <div class="box">
          
        <div class="box-header with-border">
              <h3 class="box-title">Desa Terdampak</h3>

              <div class="box-tools pull-right">
                 <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#tambah_desa" >
                Tambah
              </button>
              </div>
            </div>
          <?php if (count($desa)==0) { ?>
            <div class="box-body" style="overflow-x: scroll">
              <div class="alert alert-info">Belum ada data</div>
            </div>
          <?php }else{ ?>
          <div class="box-body" style="overflow-x: scroll">
            <table class="table table-striped table-bordered">
              <tr>
                <td>No</td>
                <td>Nama Desa</td>
                <td>Kepala Desa</td>
                <td>Petugas</td>
                <td>Option</td>
              </tr>  
            <?php  
            $no =1; foreach ($desa as $k => $v) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $v['nama_desa'] ?></td>
                <td><?php echo $v['kepala_desa'] ?></td>
                <td><?php echo $v['nama'] ?></td>
                <td>
                  <a href="javascript:void(0)" class="btn btn-default btn-xs">Edit</a>
                  <a href="<?php echo base_url('user/operator/bencana/hapus_desa/'.$v['id_desa'].'/'.$v['id_bencana']) ?>" onclick="return confirm('Hapus desa <?php echo $v['nama_desa'] ?> pada bencana <?php echo $bencana['nama_bencana'] ?> ')" class="btn btn-info btn-xs">Hapus</a>
                </td>
              </tr>
            <?php } ?>
            </table>
          </div>
        <?php } ?>

        </div>

    </div>
        <div class="col-md-5">

        <div class="box">
        <div class="box-header with-border">
              <h3 class="box-title">Bantuan Disalurkan</h3>

              <div class="box-tools pull-right">
                 <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#tambah_barang">
                Tambah
              </button>
              </div>
            </div>

          <?php if (count($item_bantuan)==0) { ?>
            <div class="box-body" style="overflow-x: scroll">
              <div class="alert alert-info">Belum ada data</div>
            </div>
          <?php }else{ ?>
          <div class="box-body" style="overflow-x: scroll">
            <table class="table table-striped table-bordered">
              <tr>
                <td>Kategori</td>
                <td>Item</td>
                <td>Option</td>
              </tr>  
            <?php foreach ($item_bantuan as $k => $v) { ?>
              <tr>
                <td><?php echo $v['kategori'] ?></td>
                <td><?php echo $v['item'] ?></td>
                 <td>
                  <a href="<?php echo base_url('user/operator/bencana/hapus_barang/'.$v['id_bantuan'].'/'.$v['id_bencana']) ?>" onclick="return confirm('Hapus item <?php echo $v['item'] ?> pada bencana <?php echo $bencana['nama_bencana'] ?> ')" class="btn btn-info btn-xs">Hapus</a>
                </td>
              </tr>
            <?php } ?>
            </table>
          </div>
        <?php } ?>

        </div>
      </div>
      </div>
    </div>
    
  </div>


  <div class="row">
    

    <div class="col-md-4">
      <div class="box">
       <form method="post" action="<?php echo base_url('user/operator/bencana/simpan_penerima_bantuan_new') ?>" enctype="multipart/form-data">


       <div class="box-header with-border">
              <h3 class="box-title">Tambah Penerima Bantuan</h3>

            
            </div>



         <?php if (count($desa)==0 || count($item_bantuan)==0) { ?>
            <div class="box-body" style="overflow-x: scroll">
              <div class="alert alert-info">Mohon untuk mengisi data desan dan data bantuan disalurkan terlebih dahulu</div>
            </div>
          <?php }else{ ?>
        <div class="box-body">
              <div class="form-group">
                <label>NIK</label>
                <input type="text" class="form-control" name="nik" required>
                <input type="hidden" class="form-control" name="id_bencana" value="<?php echo $bencana['id_bencana'] ?>">
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" required>
              </div>
              <div class="form-group">
                <label>No HP</label>
                <input type="text" class="form-control" name="nohp" required>
              </div>
              <div class="form-group">
                <label>Asal Desa</label>
                <select  class="form-control" name="desa">
                  <?php foreach ($desa as $k => $v) { ?>
                    <option value="<?php echo $v['id_desa'] ?>"><?php echo $v['nama_desa'] ?></option>
                  <?php } ?>
                </select>

              </div>


              <div class="form-group">
                <label>Dokumentasi</label>
                <input type="file" class="form-control" name="file[]" multiple>
              </div>
            

              <div class="form-group">
                <label>Bantuan</label>
                <table class="table">
                  <tr>
                    <th>Barang</th>
                    <th>Jumlah</th>
                  </tr>
                     <?php foreach ($item_bantuan as $k => $v) { ?>
              <tr>
                <td><?php echo $v['kategori'] ?> - <?php echo $v['item'] ?></td>
                <td>
                  <input type="hidden" class="form-control" name="id_item[]" id="id_item" value="<?php echo $v['id_jenis_bantuan'] ?>">
                  <input type="text" class="form-control" name="qty[]" id="qty" placeholder="masukan jumlah bantuan (<?php echo $v['satuan'] ?>)"></td>
                
              </tr>
            <?php } ?>
                </table>
              </div>
            
         


        </div>
       <div class="box-footer">
              <button class="btn btn-block btn-info btn-sm">Simpan</button>
            </div>
      <?php } ?>





    </form>
      </div>
    </div>


<div class="col-md-8">
      <div class="box">
       


       <div class="box-header with-border">
              <h3 class="box-title">Daftar Penerima Bantuan</h3>

             
            </div>



           <?php if (count($desa)==0) { ?>
            <div class="box-body" style="overflow-x: scroll">
              <div class="alert alert-info">Belum ada data</div>
            </div>
          <?php }else{ ?>
        <div class="box-body" style="overflow-x: scroll">
          <table class="table table-striped table-bordered"  id="tabel1">
           <thead>
              <tr>
              <td>No</td>
              <td>Nama</td>
              <td>Alamat</td>
              <td>No HP</td>
              <td>Asal Desa</td>
              <td>Option</td>
            </tr>  

           </thead>
            <?php foreach ($penerima as $k => $v) { 
              $id_penerima = $v['id_penerima_bantuan'];
              
              ?>
                 <tr>
                  <td><?php echo $k+1 ?></td>
                  <td><?php echo $v['nama'] ?></td>
                  <td><?php echo $v['alamat'] ?></td>
                  <td><?php echo $v['nohp'] ?></td>
                  <td><?php echo $v['nama_desa'] ?></td>
                 
            
                  <td>
                    <a href="javascript:void(0)" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#dokumentasi" onclick="dokumentasi(<?php echo $v['id_penerima_bantuan'] ?>,'<?php echo $v['nama'] ?>')">Dokumentasi</a>
                    <a href="javascript:void(0)" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#bantuan_diterima" onclick="bantuan_diterima(<?php echo $v['id_penerima_bantuan'] ?>,'<?php echo $v['nama'] ?>')">Bantuan Diterima</a>
                    <a href="<?php echo base_url('user/operator/laporan/berita_acara/'.$v['id_bencana'].'/'.$id_penerima) ?>" class="btn btn-info btn-xs">Print BA</a>
                  </td>
                </tr>  
            <?php } ?>
          </table>


        </div>
<?php } ?>

      </div>
    </div>

  </div>


    <form action="<?php echo base_url('user/operator/bencana/simpanedit') ?>" method='post' id='xxxx'> 
  <div class="modal fade" id="edit">
      
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
                  <input type="hidden" class="form-control" name="page" id="page" value="detail">
                  <label>Kategori</label>
                  <select class="form-control" name="kategori" id="kategori">
                    <?php
                    foreach ($kategori as $k => $v) { ?>
                      <option value="<?php echo $v['id_jenis_bencana'] ?>"><?php echo $v['nama_bencana'].' - '.$v['kategori'] ?></option>
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
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" id="status">
                    <?php
                    $status = ['Penyaluran Bantuan','Selesai'];
                    foreach ($status as $v) { ?>
                      <option value="<?php echo $v ?>"><?php echo $v ?></option>
                    <?php } ?>
                  </select>
                </div>
                  <hr>  

                <div class="form-group">
                  <label>Nama Desa Terdampak</label>
                  <input type="text" class="form-control" name="desa" id="desa" required>
                </div>
                <div class="form-group">
                  <label>Nama Kepala Desa</label>
                  <input type="text" class="form-control" name="kades" id="kades" required>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            
          </div>
        </div>
    </form>

  <form action="<?php echo base_url('user/operator/bencana/simpanedit') ?>" method='post' id='xxxx'> 
  <div class="modal fade" id="dokumentasi">
      
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Dokumentasi <span id="nama_penerima"></span></h4>
              </div>
              <div class="modal-body">
                <div class="row"  id="list_gambar"></div>
               
        

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>
    </form>

  <form action="<?php echo base_url('user/operator/bencana/simpanedit') ?>" method='post' id='xxxx'> 
  <div class="modal fade" id="bantuan_diterima">
      
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Bantuan <span id="nama_penerima"></span></h4>
              </div>
              <div class="modal-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Kategori</th>
                      <th>Item</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody  id="list_bantuan"></tbody>
                </table>
               
               
        

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>
    </form>


    <form action="<?php echo base_url('user/operator/bencana/simpan_desa') ?>" method='post' id='xxxx'> 
  <div class="modal fade" id="tambah_desa">
      
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Desa</h4>
              </div>
              <div class="modal-body">
               
                  <input type="hidden" class="form-control" name="id_bencana" id="id_bencana" value="<?php echo $bencana['id_bencana'] ?>">

             
                <div class="form-group">
                  <label>Nama Desa</label>
                  <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="form-group">
                  <label>Kepala Desa</label>
                  <input type="text" class="form-control" name="kades" id="kades" required>
                </div>

              <div class="form-group">
                <label>Petugas Penyalur </label>
                <select class="form-control" name="petugas">
                            <?php foreach ($petugas as $k => $v) { ?>
                              <option value="<?php echo $v['id_petugas'] ?>"><?php echo $v['nama'].' | '.$v['jabatan'] ?></option>
                            <?php } ?>
                          </select>
              </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            
          </div>
        </div>
    </form>


    <form action="<?php echo base_url('user/operator/bencana/simpan_bantuan') ?>" method='post' id='xxxx'> 
  <div class="modal fade" id="tambah_barang">
      
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Bantuan</h4>
              </div>
              <div class="modal-body">
               
                  <input type="hidden" class="form-control" name="id_bencana" id="id_bencana" value="<?php echo $bencana['id_bencana'] ?>">

             
              <div class="form-group">
                <label>Petugas Penyalur </label>
                <select class="form-control" name="id_jenis_bantuan">
                            <?php foreach ($jenis_bantuan as $k => $v) { ?>
                              <option value="<?php echo $v['id_jenis_bantuan'] ?>"><?php echo $v['kategori'].' | '.$v['item'] ?></option>
                            <?php } ?>
                          </select>
              </div>
              



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            
          </div>
        </div>
    </form>


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
      

function dokumentasi(id_penerima_bantuan, nama_penerima)
  {
   
                  $('#dokumentasi').find('#list_gambar').html(``); 
                  $('#dokumentasi').find('#nama_penerima').html('<br>' +nama_penerima); 
            $.ajax(
            {
              url     : baseUrl('/user/operator/bencana/dokumentasi'),
              dataType: 'JSON',
              type    : 'POST',
              data    : { 
                id_penerima_bantuan : id_penerima_bantuan,
                
              },
              success : function(data)
              {
                  var url = '<?php echo base_url() ?>file/dokumentasi/';
                 $.each(data, function(k,v){
                  console.log(v);
                  $('#dokumentasi').find('#list_gambar').append(`<div class="col-md-4"><img src="`+url+ v.nama_file +`" width="100%"></div>`);

                 });
              },
              error : function(){
              }
            });
          }
      

function bantuan_diterima(id_penerima_bantuan, nama_penerima)
  {
   
                  $('#bantuan_diterima').find('#list_bantuan').html(``); 
                  $('#bantuan_diterima').find('#nama_penerima').html('<br>' +nama_penerima); 
            $.ajax(
            {
              url     : baseUrl('/user/operator/bencana/bantuan_diterima'),
              dataType: 'JSON',
              type    : 'POST',
              data    : { 
                id_penerima_bantuan : id_penerima_bantuan,
                
              },
              success : function(data)
              {
                
                 $.each(data, function(k,v){
                 console.log(v);
                  $('#bantuan_diterima').find('#list_bantuan').append(`
                      <tr>
                        <td>`+v.kategori+`</td>
                        <td>`+v.item+`</td>
                        <td>`+v.qty + ' '+ v.satuan+`</td>
                      </tr>`);

                 });
              },
              error : function(){
              }
            });
          }
      

</script>










