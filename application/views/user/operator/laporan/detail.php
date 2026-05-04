<?php
$bulanIndo = [
    1 => 'Januari','Februari','Maret','April','Mei','Juni',
    'Juli','Agustus','September','Oktober','November','Desember'
];

$tanggal = date('d');
$bulan   = $bulanIndo[date('n')];
$tahun   = date('Y');
?>


<style type="">
    .kop_pemerintah{
          font-size:13px;
    }
    .kop_instansi{
          font-size:18px;
    }
    .alamat_instansi{
          font-size:11px;
    }

    .kop-line {
  border-top: 1px solid black;
  border-bottom: 3px solid black;
  height: 4px;
}


        .judul {
            text-align: center;
            margin: 6px 0 20px;
        }
        .judul h4 {
            margin: 0;
            text-decoration: underline;
        }


        .konten {
            font-size:13px;
        }

         .tabel_barang {
            font-size:13px;
            width: 100%;
            border-collapse: collapse;
            /*margin: 15px 0;*/
        }
        table {
    font-size: 10px;
    width: 100%;
    border-collapse: collapse;  /* pindahkan ke sini */
}

th, td {
    border: 1px solid #000;
    padding: 4px 8px;           /* tambahkan padding */
    text-align: center;          /* opsional */
}
        


        .no-border {
            border: none;
        }
        .ttd {
            width: 100%;
            margin-top: 10px;
        }
        .ttd td {
            border: none;
            text-align: center;
            vertical-align: top;
        }
</style>
<div style="float:left; width:70px">
    <img src="<?php echo base_url('assets/gambar/logo_kota.png') ?>"> 
</div>
<div style="float:left; width:522px">
    <div style="text-align:center">
        <span class="kop_pemerintah"><b>    PEMERINTAH KOTA SUNGAI PENUH</b></span> <br>   
        <span class="kop_instansi"><B>  BADAN PENANGGULANGAN BENCANA DAERAH <br>    (BPBD)</B></span> <br> 
        <span class="alamat_instansi">
            Jl. Kh Ahmad Dahlan, Koto Renah, Kec. Pesisir Bukit, Kota Sungai Penuh, Jambi 37152<br>  
        
        </span>

    </div>
</div>

<div style="float:right; width:70px">
    <img src="<?php echo base_url('assets/gambar/logo_bpbd.png') ?>"> 
</div>

<div style="clear:both"></div>
<div class="kop-line"></div>
<div class="judul">
    Daftar penerima bantuan <br>Bencana <?php echo $bencana['nama_bencana'].' di '.$bencana['lokasi'] ?>
  
</div>

<table class="table">
    <tr>    
        <th rowspan="2">No</th>
        <th rowspan="2">Nama</th>
        <th rowspan="2">Alamat</th>
        <th rowspan="2">Desa</th>
        <th colspan="<?php echo $jumlah_item ?>">Bantuan</th>
    </tr>
    <tr>
        <?php 
        $kumpul_total = [];
        foreach ($item as $k => $v) { 
             $data = [
            'id_jenis_bantuan' =>$v['id_jenis_bantuan'],
            'nilai' => [],

           ];
           $kumpul_total[$k] = $data;


           ?>
        <th><?php echo $v['item'] ?></th>
        <?php } ?>
    </tr>

    <?php foreach ($penerima as $k => $v) { 
         $id_penerima = $v['id_penerima_bantuan'];?>
        <tr>    
            <td></td>
            <td><?php echo $v['nama'] ?></td>
            <td><?php echo $v['alamat'] ?></td>
            <td><?php echo $v['nama_desa'] ?></td>
              <?php foreach ($item as $k_item => $v_item) { 
                $id_item =$v_item['id_jenis_bantuan'];
               
                $q = $this->db->query("SELECT qty from barang_diterima_bantuan where id_penerima_bantuan='$id_penerima' and id_jenis_bantuan = '$id_item'")->row_array();

                // $kumpul_total[$k_item]['nilai'] = $q['qty'];

                  array_push($kumpul_total[$k_item]['nilai'], $q['qty']);

                ?>
                <td><?php  echo $q['qty'] == '' ? '-' : $q['qty']; ?></td>
                <?php } ?>
        </tr>
    <?php } ?>
    <tr>
        <th colspan="4">Total</th>
          <?php foreach ($item as $k => $v) { ?>
        <th><?php echo array_sum($kumpul_total[$k]['nilai']) ?> </th>
        <?php } ?>

    </tr>
</table>
