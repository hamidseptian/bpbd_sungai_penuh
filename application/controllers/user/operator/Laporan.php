<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        // $this->form_validation->CI = &$this;
        $this->load->model([
            'datatables_model'                         => 'datatables_model', 
        ]);
        
        $id_hak_akses = $this->session->userdata('id_hak_akses'); 
        //   if ($id_hak_akses!='2') {
        //     redirect('auth/login/kick');
           
        // }
    }






 public function berita_acara($id_bencana, $id_penerima)
    {
      

          $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            // "margin_left" => 5,
            // "margin_right" => 5,
            // "margin_top" => 10,
            // "margin_bottom" => 15,
            'orientation' => 'P',
            'tempDir' => '/tmp'
        ]);
   // $mpdf->SetJS('this.print();');

            $q = $this->db->query("SELECT  b.id_bencana, jb.nama_bencana, jb.kategori, b.tgl_kejadian, b.lokasi, b.keterangan, b.status, year(b.tgl_kejadian) as tahun_bencana, b.jam_kejadian, b.desa, b.kepala_desa from bencana b
        left join jenis_bencana jb on b.id_jenis_bencana=jb.id_jenis_bencana where b.id_bencana='$id_bencana'")->row_array();

            $q_penerima = $this->db->query("SELECT pb.*, pt.nama as petugas, pt.jabatan, pt.pangkat, pt.alamat as alamat_petugas, pt.nip,
            d.nama_desa, d.kepala_desa 
                from penerima_bantuan pb 
                left join desa_terdampak d on pb.id_desa = d.id_desa 
                left join petugas pt on d.id_petugas = pt.id_petugas 
                where pb.id_penerima_bantuan='$id_penerima' 
                 ")->row_array();


            $q_item = $this->db->query("SELECT bdb.qty, jb.item, jb.kategori, jb.satuan from barang_diterima_bantuan bdb 
                left join jenis_bantuan jb on bdb.id_jenis_bantuan = jb.id_jenis_bantuan
                where bdb.id_penerima_bantuan='$id_penerima'")->result_array();

            
            $data['bencana'] = $q;
            $data['penerima'] = $q_penerima ;
            $data['item'] = $q_item ;
          $html = $this->load->view('user/operator/laporan/berita_acara', $data, true);
        $mpdf->WriteHTML($html);


        $mpdf->Output('Print.pdf', 'I');
    }


 public function detail($id_bencana)
    {
      

          $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            // "margin_left" => 5,
            // "margin_right" => 5,
            // "margin_top" => 10,
            // "margin_bottom" => 15,
            'orientation' => 'P',
            'tempDir' => '/tmp'
        ]);

            $q_bantuan = $this->db->query("SELECT bb.*, jb.item, jb.satuan from bantuan_bencana bb left join jenis_bantuan jb on bb.id_jenis_bantuan = jb.id_jenis_bantuan where id_bencana = '$id_bencana'");
            $q_bencana = $this->db->query("SELECT jb.nama_bencana, b.lokasi from bencana b left join jenis_bencana jb on b.id_jenis_bencana = jb.id_jenis_bencana where id_bencana = '$id_bencana'");
            $q_penerima = $this->db->query("SELECT pb.*, d.nama_desa  from penerima_bantuan pb left join desa_terdampak  d on pb.id_desa=d.id_desa where pb.id_bencana = '$id_bencana'")->result_array();
            $data['item'] = $q_bantuan->result_array() ;
            $data['bencana'] = $q_bencana->row_array() ;
            $data['penerima'] = $q_penerima ;
            $data['jumlah_item'] = $q_bantuan->num_rows() ;
          $html = $this->load->view('user/operator/laporan/detail', $data, true);
        $mpdf->WriteHTML($html);


        $mpdf->Output('Print.pdf', 'I');
    }


 public function index()
    {

        $data['judul'] = 'Laporan Bencana';
          $data['breadchumb'] = ' <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#filter_harian">
                Filter Harian
              </button> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#filter_bulanan">
                Filter Bulanan
              </button> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#filter_tahunan">
                Filter Tahunan
              </button>';
        $filter = $this->input->get('filter');
        $blns  = date('m');
        $thns  = date('Y');

        if ($filter) {
            if ($filter=='harian') {
                $tgl = $this->input->get('tgl');
                $where = "WHERE b.tgl_kejadian = '$tgl'";
                $data['judul'] .= '<br><small>Tanggal '.$tgl.'</small>';
                # code...
            }
            else if ($filter=='tahunan') {
                $tahun = $this->input->get('tahun');
                $where = "WHERE year(b.tgl_kejadian) = '$tahun'";
                $data['judul'] .= '<br><small>Tahun '.$tahun.'</small>';
                # code...
            }else{
                $bulan = $this->input->get('bulan');
                $tahun = $this->input->get('tahun');
                $where = "WHERE month(b.tgl_kejadian) = '$bulan' and  year(b.tgl_kejadian) = '$tahun'";
                $data['judul'] .= '<br><small>Bulan '.nama_bulan($bulan).' Tahun '.$tahun.'</small>';

            }
        }else{
            $where = "WHERE month(b.tgl_kejadian) = '$blns' and  year(b.tgl_kejadian) = '$thns'";
            $data['judul'] .= '<br><small>Bulan '.nama_bulan($blns).' Tahun '.$thns.'</small>';
        }
          $q = $this->db->query("SELECT  b.id_bencana, jb.nama_bencana, jb.kategori, b.tgl_kejadian, b.lokasi, b.keterangan, b.status, b.jam_kejadian from bencana b
        left join jenis_bencana jb on b.id_jenis_bencana=jb.id_jenis_bencana $where")->result_array();

        $data['bencana'] = $q;
    

        $this->template->load('template/user_adminlte','user/operator/laporan/index', $data);
      }
}
