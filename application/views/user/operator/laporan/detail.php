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
        table{
            font-size:13px;

        }
        .tabel_barang th, td {
            border: 1px solid #000;
            border-collapse: collapse;
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
    <h4>Coming Soon</h4>
    <!-- <p style="margin-top:0px"><b>NOMOR: 300.2.1. /    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     / Bahan Bangunan-BPBD / 2025</b></p> -->
</div>

