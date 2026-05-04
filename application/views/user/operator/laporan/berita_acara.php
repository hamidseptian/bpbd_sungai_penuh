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
    <h4>BERITA ACARA SERAH TERIMA BARANG</h4>
    <p style="margin-top:0px"><b>NOMOR: 300.2.1. /    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     / Bahan Bangunan-BPBD / <?php echo ($bencana['tahun_bencana']) ?></b></p>
</div>


<div class="konten">  
Pada hari ini tanggal <?= $tanggal ?> bulan <?= $bulan ?> tahun <?= $tahun ?>, kami yang bertanda tangan di bawah ini:




<table class="no-border" style="margin-left:20px">
    <tr>
        <td class="no-border" width="20%">Nama</td>
        <td class="no-border" width="2%">:</td>
        <td class="no-border"> <?php echo $penerima['nama'] ?></td>
    </tr>
    <tr>
        <td class="no-border">Jabatan</td>
        <td class="no-border">:</td>
        <td class="no-border"> Penerima Bantuan</td>
    </tr>
    <tr>
        <td class="no-border">Alamat</td>
        <td class="no-border">:</td>
        <td class="no-border"> <?php echo $penerima['alamat'] ?></td>
    </tr>
</table>

<p>Selanjutnya disebut <b>PIHAK PERTAMA</b>.</p>

<table class="no-border" style="margin-left:20px">
    <tr>
        <td class="no-border" width="20%">Nama</td>
        <td class="no-border" width="2%">:</td>
        <td class="no-border"><?php echo $penerima['petugas'] ?></td>
    </tr>
    <tr>
        <td class="no-border">NIP</td>
        <td class="no-border">:</td>
        <td class="no-border"><?php echo $penerima['nip'] ?></td>
    </tr>
    <tr>
        <td class="no-border">Pangkat / Gol</td>
        <td class="no-border">:</td>
        <td class="no-border"><?php echo pangkat($penerima['pangkat']).'('.$penerima['pangkat'].')'  ?></td>
    </tr>
    <tr>
        <td class="no-border">Jabatan</td>
        <td class="no-border">:</td>
        <td class="no-border"><?php echo $penerima['jabatan'] ?></td>
    </tr>
    <tr>
        <td class="no-border">Alamat</td>
        <td class="no-border">:</td>
        <td class="no-border"><?php echo $penerima['alamat_petugas'] ?></td>
    </tr>
</table>

<p>Selanjutnya disebut <b>PIHAK KEDUA</b>.</p>

<p>
    Dengan ini PIHAK KEDUA menyerahkan kepada PIHAK PERTAMA berupa barang sebagai berikut:
</p>

<table class="tabel_barang">
    <tr>
        <th>NO</th>
        <th>JENIS BARANG</th>
        <th>JUMLAH</th>
        <th>KETERANGAN</th>
    </tr>
    <?php
    $no=1; foreach ($item as $k => $v) { ?>
    <tr>
        <td><?php echo  $no++ ?></td>
        <td><?php echo $v['item'] ?></td>
        <td><?php echo $v['qty'].' '.$v['satuan'] ?></td>
        <td>Baik dan Cukup</td>
    </tr>
    <?php } ?>
</table>

<p>
    Demikian Berita Acara Serah Terima ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.
</p>


<table class="ttd">
    <tr>
        <td align="center">
            PIHAK KEDUA<br>
            <?php echo $penerima['jabatan']  ?>
            <br><br> <br>    <br>    
            <div class="nama"><?php echo $penerima['petugas'].'<br>'.pangkat($penerima['pangkat']).'<br>'.$penerima['nip'] ?></div>
        </td>
        <td width="100px">
            
        </td>
        <td align="center">
            PIHAK PERTAMA<br><br><br> <br>  <br>    
            <div class="nama"><?php echo  $penerima['nama'] ?></div>
        </td>
    </tr>
    <tr>
        <td align="center">
             
        </td>
        <td width="200px">
            Mengetahui<br>
            Kepala Desa <?php echo $penerima['nama_desa'] ?><br><br> <br>    <br>    
            <div class="nama"><?php echo $penerima['kepala_desa'] ?></div>
        </td>
        <td align="center">
            
        </td>
    </tr>
</table>

</div>