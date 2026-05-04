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
                 <a href="<?php echo base_url('user/operator/laporan/detail/'.$d1['id_bencana']) ?>" class="btn btn-info btn-xs">
                Detail
              </a>
                
                </td>
              </tr>
            <?php } ?>
            
          </table>
        </div>


      </div>
    </div>
  </div>


  <div class="modal fade" id="filter_harian">
    <form action="<?php echo base_url('user/operator/laporan') ?>" method='get'>  
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Filter Harian</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="hidden" class="form-control" name="filter" value="harian">
                  <input type="date" class="form-control" name="tgl" required value="<?php echo date('Y-m-d') ?>">
                </div>
       
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Filter</button>
              </div>
          </div>
      </div>
    </form>
        </div>



  <div class="modal fade" id="filter_tahunan">
    <form action="<?php echo base_url('user/operator/laporan') ?>" method='get'>  
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Filter Tahunan</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Tahun</label>
                  <input type="hidden" class="form-control" name="filter" value="tahunan">
                  <select name="tahun" class="form-control">
                    <?php for ($i =date('Y') ; $i > 2020 ; $i--) { ?>
                      <option><?php echo $i ?></option>
                    <?php } ?>
                  </select>
                </div>
       
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Filter</button>
              </div>
          </div>
      </div>
    </form>
        </div>




  <div class="modal fade" id="filter_bulanan">
    <form action="<?php echo base_url('user/operator/laporan') ?>" method='get'>  
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Filter Bulanan</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Bulan</label>
                  <input type="hidden" class="form-control" name="filter" value="bulanan">
                  <select name="bulan" class="form-control">
                    <?php foreach(pilihan_bulan() as $k=>$v){  ?>
                      <option value="<?php echo $k ?>"><?php echo $v ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Tahun</label>
                  <select name="tahun" class="form-control">
                    <?php for ($i =date('Y') ; $i > 2020 ; $i--) { ?>
                      <option><?php echo $i ?></option>
                    <?php } ?>
                  </select>
                </div>
       
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Filter</button>
              </div>
          </div>
      </div>
    </form>
        </div>

