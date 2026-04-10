<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bencana extends CI_Controller {


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





    public function index()
    {
        $data['judul'] = 'Master Data - Bencana';
        $data['breadchumb'] = ' <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah">
                Tambah Bencana
              </button>';
        $q = $this->db->query("SELECT  b.id_bencana, jb.nama_bencana, jb.kategori, b.tgl_kejadian, b.lokasi, b.keterangan, b.status, b.jam_kejadian from bencana b
        left join jenis_bencana jb on b.id_jenis_bencana=jb.id_jenis_bencana ")->result_array();
        $q_kategori = $this->db->query("SELECT id_jenis_bencana, kategori, nama_bencana from jenis_bencana order by nama_bencana asc")->result_array();
        $data['bencana'] = $q;
        $data['kategori'] = $q_kategori;
        $this->template->load('template/user_adminlte','user/operator/bencana/data_bencana', $data);

        // $this->load->view('template/user_adminlte');
    }





	public function edit()
	{
		
            $id_bencana = $this->input->post('id_bencana');
            $q = $this->db->query("SELECT  id_jenis_bencana, tgl_kejadian, lokasi, status, jam_kejadian , REPLACE(keterangan, '<br />', '') as keterangan, desa, kepala_desa from bencana where id_bencana='$id_bencana'")->row_array();
            echo json_encode($q);
		// $this->load->view('template/admin');
	}


  public function dokumentasi()
  {
    
            $id_penerima_bantuan = $this->input->post('id_penerima_bantuan');
            $q = $this->db->query("SELECT nama_file from penerima_bantuan_file where id_penerima_bantuan='$id_penerima_bantuan'")->result_array();
            echo json_encode($q);
    // $this->load->view('template/admin');
  }

    public function detail($id_bencana)
    {
          $data['judul'] = 'Detail Bencana';
        $data['breadchumb'] = ' <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah">
                Kembali
              </button>';
            $q = $this->db->query("SELECT  b.id_bencana, jb.nama_bencana, jb.kategori, b.tgl_kejadian, b.lokasi, b.keterangan, b.status, b.jam_kejadian, b.desa, b.kepala_desa from bencana b
        left join jenis_bencana jb on b.id_jenis_bencana=jb.id_jenis_bencana where b.id_bencana='$id_bencana'")->row_array();
            $q_jenis_bantuan = $this->db->query("SELECT id_jenis_bantuan, satuan, item, kategori from jenis_bantuan ")->result_array();
            $q_petugas = $this->db->query("SELECT id_petugas, nama,jabatan from petugas ")->result_array();
            $q_penerima = $this->db->query("SELECT pb.*, pt.nama as petugas, d.nama_desa from penerima_bantuan pb 
                left join desa_terdampak d on pb.id_desa = d.id_desa 
                left join petugas pt on d.id_petugas = pt.id_petugas 
                where pb.id_bencana='$id_bencana' 
                 ")->result_array();
            $q_desa = $this->db->query("SELECT dp.*, p.nama from desa_terdampak dp left join petugas p on dp.id_petugas = p.id_petugas where dp.id_bencana = '$id_bencana'")->result_array();
            $q_item_bantuan = $this->db->query("SELECT b.*, jb.* from bantuan_bencana b left join jenis_bantuan jb on b.id_jenis_bantuan = jb.id_jenis_bantuan where b.id_bencana = '$id_bencana'")->result_array();
            $data['bencana'] = $q;
            $data['desa'] = $q_desa      ;
            $data['jenis_bantuan'] = $q_jenis_bantuan;
            $data['item_bantuan'] = $q_item_bantuan;

        $q_kategori = $this->db->query("SELECT id_jenis_bencana, kategori, nama_bencana from jenis_bencana order by nama_bencana asc")->result_array();

        $data['kategori'] = $q_kategori;
            $data['penerima'] = $q_penerima;
            $data['petugas'] = $q_petugas;
            $data['json_jenis_bantuan'] = json_encode($q_jenis_bantuan);

            $this->template->load('template/user_adminlte','user/operator/bencana/detail_bencana', $data);


    }







    public function simpan(){
     
     $kategori = $this->input->post('kategori');
     $ket = $this->input->post('ket');
     $tgl = $this->input->post('tgl');
     $jam = $this->input->post('jam');
     $lokasi = $this->input->post('lokasi');

     $data = [
        ' id_jenis_bencana'=>$kategori,
        'tgl_kejadian'=>$tgl,
        'lokasi'=>$lokasi,
        'jam_kejadian '=>$jam,
        'keterangan'=>nl2br($ket),
     ];
     $this->db->insert('bencana', $data);
      $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Bencana Disimpan</div>');
            redirect('user/operator/bencana');

    }

    public function simpan_desa(){
     
     $nama = $this->input->post('nama');
     $kades = $this->input->post('kades');
     $id_bencana = $this->input->post('id_bencana');
     $id_petugas = $this->input->post('petugas');

     $data = [
        'id_bencana'=>$id_bencana,
        'id_petugas'=>$id_petugas,
        'nama_desa'=>$nama,
        'kepala_desa '=>$kades,
     ];
     $this->db->insert('desa_terdampak', $data);
      $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Desa Terdampak Bencana Disimpan</div>');
            redirect('user/operator/bencana/detail/'.$id_bencana);

    }
    public function simpan_bantuan(){
     
     $qty = $this->input->post('qty');
     $id_bencana = $this->input->post('id_bencana');
     $id_jenis_bantuan = $this->input->post('id_jenis_bantuan');

     $data = [
        'id_bencana'=>$id_bencana,
        'id_jenis_bantuan'=>$id_jenis_bantuan,
        'qty'=>$qty,
     ];
     $this->db->insert('bantuan_bencana', $data);
      $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Bantuan Bencana Disimpan</div>');
            redirect('user/operator/bencana/detail/'.$id_bencana);

    }
    public function simpanedit(){
     
     $id_bencana = $this->input->post('id_bencana');
  
     $kategori = $this->input->post('kategori');
     $ket = $this->input->post('ket');
     $tgl = $this->input->post('tgl');
     $jam = $this->input->post('jam');
     $lokasi = $this->input->post('lokasi');
     $page = $this->input->post('page');

     $data = [
        ' id_jenis_bencana'=>$kategori,
        'tgl_kejadian'=>$tgl,
        'lokasi'=>$lokasi,
        'jam_kejadian '=>$jam,
        'keterangan'=>nl2br($ket),
     ];
     $where = [
        'id_bencana'=>$id_bencana,
     ];
     $this->db->update('bencana', $data, $where);
      $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data bencana diperbaharui</div>');
      if ($page=='index') {
            redirect('user/operator/bencana');
      }else{
            redirect('user/operator/bencana/detail/'.$id_bencana);

      }

    }


    public function hapus()
    {
            $id_bencana = $this->input->post('id_bencana');
            $q = $this->db->query("DELETE FROM bencana where id_bencana='$id_bencana'");
            $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data bencana Dinonaktifkan</div>');
            
        
    }

    public function hapus_desa($id_desa, $id_bencana)
    {
            // $id_desa = $this->input->post('id_desa');
            $q = $this->db->query("DELETE FROM desa_terdampak where id_desa='$id_desa'");
            $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data desa dihapus</div>');

            redirect('user/operator/bencana/detail/'.$id_bencana);
            
        
    }


    public function hapus_barang($id_item, $id_bencana)
    {
            // $id_desa = $this->input->post('id_desa');
            $q = $this->db->query("DELETE FROM bantuan_bencana where id_bantuan='$id_item'");
            $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Bantuan dihapus</div>');

            redirect('user/operator/bencana/detail/'.$id_bencana);
            
        
    }





    // public function simpan_penerima_bantuan()
    // {
    //     $nik = $this->input->post('nik');
    //     $id_bencana = $this->input->post('id_bencana');
    //     $nama = $this->input->post('nama');
    //     $alamat = $this->input->post('alamat');
    //     $nohp = $this->input->post('nohp');
    //     $petugas = $this->input->post('petugas');
       
      
    //         $data_insert = [
    //             ' id_bencana'=>$id_bencana,
    //             'nik'=>$nik,
    //             'nama'=>$nama,
    //             'alamat'=>$alamat,
    //             'nohp'=>$nohp,
    //             'id_petugas '=>$petugas,
              
    //         ];

        

    //     $this->db->insert('penerima_bantuan', $data_insert);
    //     $id_penerima = $this->db->insert_id();

    //     $item = $this->input->post('item');
    //     $qty = $this->input->post('qty');
        
    //     $kumpul_item = [];
    //     for ($i=0; $i < count($item) ; $i++) { 
    //         $pecah = explode('|', $item[$i]);
    //         $data = [
    //             'id_penerima_bantuan'=>$id_penerima,
    //             'id_bencana'=>$id_bencana,
    //             'kategori'=>$pecah[0],
    //             'item'=>$pecah[1],
    //             'qty '=>$qty[$i],
    //         ];
    //         array_push($kumpul_item, $data);
    //     }

    //     $this->db->insert_batch('barang_diterima_bantuan', $kumpul_item);
    //     redirect('user/operator/bencana/detail/'.$id_bencana);
    // }


    public function simpan_penerima_bantuan_new()
{
    $nik         = $this->input->post('nik');
    $id_bencana  = $this->input->post('id_bencana');
    $nama        = $this->input->post('nama');
    $alamat      = $this->input->post('alamat');
    $nohp        = $this->input->post('nohp');
    $desa        = $this->input->post('desa');

    // 🔥 PERBAIKAN: hilangkan spasi di key array
    $data_insert = [
        'id_bencana' => $id_bencana,
        'nik'        => $nik,
        'nama'       => $nama,
        'alamat'     => $alamat,
        'nohp'       => $nohp,
        'id_desa'    => $desa,
    ];

    // Simpan ke tabel utama
    $this->db->insert('penerima_bantuan', $data_insert);
    $id_penerima = $this->db->insert_id(); // ambil ID

    // =========================
    // 🚀 PROSES MULTIPLE UPLOAD
    // =========================
    $config['upload_path']   = './file/dokumentasi/';
    $config['allowed_types'] = 'jpg|jpeg|png|pdf';
    $config['max_size']      = 2048;
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    $files = $_FILES['file'];

    if (!empty($_FILES['file']['name'][0])) {

        $count = count($_FILES['file']['name']);

        for ($i = 0; $i < $count; $i++) {

            $_FILES['userfile']['name']     = $files['name'][$i];
            $_FILES['userfile']['type']     = $files['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['userfile']['error']    = $files['error'][$i];
            $_FILES['userfile']['size']     = $files['size'][$i];

            if ($this->upload->do_upload('userfile')) {

                $upload_data = $this->upload->data();

                // Simpan ke tabel file
                $file_data = [
                    'id_penerima_bantuan' => $id_penerima,
                    'nama_file'   => $upload_data['file_name']
                ];

                $this->db->insert('penerima_bantuan_file', $file_data);

            } else {
                // Kalau gagal upload
                echo $this->upload->display_errors();
                return;
            }
        }
    }

    // =========================
    // 🔁 REDIRECT
    // =========================
    redirect('user/operator/bencana/detail/'.$id_bencana);
}





}
