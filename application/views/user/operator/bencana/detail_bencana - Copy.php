 

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

          <div class="box-body" style="overflow-x: scroll">
            <table class="table table-striped table-bordered">
              <tr>
                <td>Kategori</td>
                <td>Item</td>
                <td>Qty</td>
                <td>Option</td>
              </tr>  
            <?php foreach ($item_bantuan as $k => $v) { ?>
              <tr>
                <td><?php echo $v['kategori'] ?></td>
                <td><?php echo $v['item'] ?></td>
                <td><?php echo $v['qty'].' '.$v['satuan'] ?></td>
                 <td>
                  <a href="javascript:void(0)" class="btn btn-default btn-xs">Edit</a>
                  <a href="<?php echo base_url('user/operator/bencana/hapus_barang/'.$v['id_bantuan'].'/'.$v['id_bencana']) ?>" onclick="return confirm('Hapus item <?php echo $v['item'] ?> pada bencana <?php echo $bencana['nama_bencana'] ?> ')" class="btn btn-info btn-xs">Hapus</a>
                </td>
              </tr>
            <?php } ?>
            </table>
          </div>


        </div>
      </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="box">
       <form method="post" action="<?php echo base_url('user/operator/bencana/simpan_penerima_bantuan') ?>">


       <div class="box-header with-border">
              <h3 class="box-title">Tambah Penerima Bantuan</h3>

            
            </div>




        <div class="box-body">
          <div class="row">
          	<div class="col-md-5">
          		<div class="form-group">
          			<label>NIK</label>
          			<input type="text" class="form-control" name="nik">
          			<input type="hidden" class="form-control" name="id_bencana" value="<?php echo $bencana['id_bencana'] ?>">
          		</div>
          		<div class="form-group">
          			<label>Nama</label>
          			<input type="text" class="form-control" name="nama">
          		</div>
          		<div class="form-group">
          			<label>Alamat</label>
          			<input type="text" class="form-control" name="alamat">
          		</div>
          		<div class="form-group">
          			<label>No HP</label>
          			<input type="text" class="form-control" name="nohp">
          		</div>
          		
          	</div>
          	<div class="col-md-7">
          		<div class="form-group">
          			<label>Penyaluran Bantuan</label>

                  <table class="table table-bordered">
                    <thead>
                      <tr>
	          				<td>Item Bantuan</td>
	          				<td>Qty</td>
	          				<td>
	          					Option
	          				 <button class="btn btn-info btn-xs float-right" onclick="tambah_barang()" type="button"><i class="fa fa-plus"></i></button>

	          				</td>
	          			</tr>
                    </thead>
                    <tbody id="form_bantuan">
                      <tr>
                        <td>
                        	<select class="form-control" name="item[]">
                        		<?php foreach ($jenis_bantuan as $k => $v) { ?>
                        			<option value="<?php echo $v['kategori'].'|'.$v['item'] ?>"><?php echo $v['kategori'].' - '.$v['item'] ?></option>
                        		<?php } ?>
                        	</select>
                        	</td>
                        <td>
                        	<input type="text"  name="qty[]" required>
                        </td>
                        <td align="center"> - </td>
                      </tr>
                    </tbody>

                  </table>




<script type="text/javascript">
	
  function tambah_barang(){

    var jenis_bantuan = <?php echo $json_jenis_bantuan ?>;
  	var append_tabel = `
       <tr class="form_bantuan_baru">  	<td>
                        	<select class="form-control" name="item[]">
`;

   $.each(jenis_bantuan, function(k,v){

  	append_tabel += `<option value="`+v.kategori+`|`+v.item+`">`+v.kategori+` | `+v.item+`</option>`;
   })


  	append_tabel += `
</select>
                        	</td>
                        <td><input type="text"  name="qty[]" required></td>
                                            <td align="center">
                                              <button class="btn btn-danger btn-sm  hapus_form_bantuan" onclick="hapus_form_bantuan(this)" type="button"><i class="fa fa-times"></i></button>
                                            </td>
                                          </tr>`;
    $('#form_bantuan').append(append_tabel);

  }

 function hapus_form_bantuan(x){
 $(x).parents("tr").remove();
 };




</script>




          		</div>
          		<div class="form-group">
          			<label>Petugas Penyalur	</label>
          			<select class="form-control" name="petugas">
                        		<?php foreach ($petugas as $k => $v) { ?>
                        			<option value="<?php echo $v['id_petugas'] ?>"><?php echo $v['nama'].' | '.$v['jabatan'] ?></option>
                        		<?php } ?>
                        	</select>
          		</div>
          	</div>
          </div>


        </div>



       <div class="box-footer">
              <button class="btn btn-block btn-info btn-sm">SImpan</button>

            
            </div>



		</form>
      </div>
    </div>
    <div class="col-md-12">
      <div class="box">
       


       <div class="box-header with-border">
              <h3 class="box-title">Daftar Penerima Bantuan</h3>

             
            </div>




        <div class="box-body" style="overflow-x: scroll">
          <table class="table table-striped table-bordered" id="">
            <tr>
              <td>No</td>
              <td>Nama</td>
              <td>Alamat</td>
              <td>No HP</td>
              <td>Barang</td>
              <td>Petugas</td>
              <td>Option</td>
            </tr>  
            <?php foreach ($penerima as $k => $v) { 
            	$id_penerima = $v['id_penerima_bantuan'];
            	$q_barang = $this->db->query("SELECT * from barang_diterima_bantuan where id_penerima_bantuan='$id_penerima'")->result_array();
            	?>
            	   <tr>
		              <td><?php echo $k+1 ?></td>
		              <td><?php echo $v['nama'] ?></td>
		              <td><?php echo $v['alamat'] ?></td>
		              <td><?php echo $v['nohp'] ?></td>
		              <td>
		              	<ol>
		              		
		              	<?php foreach ($q_barang as $k_b => $v_b) { ?>
		              		<li><?php echo $v_b['kategori'].' - '.$v_b['item'].' ['.$v_b['qty'] ?>]</li>
		              	<?php } ?>
		              	</ol>
		              </td>
		        
		              <td><?php echo $v['petugas'] ?></td>
		              <td><a href="<?php echo base_url('user/operator/laporan/berita_acara/'.$v['id_bencana'].'/'.$id_penerima) ?>" class="btn btn-info btn-xs">Print BA</a></td>
		            </tr>  
            <?php } ?>
          </table>


        </div>


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
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="text" class="form-control" name="qty" id="qty" required>
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
      

</script>









