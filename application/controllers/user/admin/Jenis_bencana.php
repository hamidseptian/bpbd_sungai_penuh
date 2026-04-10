<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_bencana extends CI_Controller {


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
        $q = $this->db->query("SELECT  id_jenis_bencana,nama_bencana from jenis_bencana ")->result_array();
        $data['jenis_bencana'] = $q;
        $this->template->load('template/user_adminlte','user/admin/jenis_bencana/data_jenis_bencana', $data);

        // $this->load->view('template/user_adminlte');
    }


    public function detail($id_jenis_bencana)
    {
        $data['breadchumb'] = '

              <a href="'.base_url('user/admin/jenis_bencana/').'" class="btn btn-info btn-sm" >Kembali</a>
               <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah">
                Tambah Paket jenis_bencana
              </button>';

        $id_jenis_bencana = enkripsi($id_jenis_bencana, 'D');
        $q = $this->db->query("SELECT  id_jenis_bencana,jenis_bencana,status from jenis_bencana where id_jenis_bencana='$id_jenis_bencana'")->row_array();
        $q_detail = $this->db->query("SELECT  id_detail_jenis_bencana, id_jenis_bencana, nama_paket_jenis_bencana, banyak_pertemuan, masa_aktif, satuan_masa_aktif, biaya, status from detail_jenis_bencana where id_jenis_bencana='$id_jenis_bencana'")->result_array();
        $data['judul'] = 'Master Data - jenis_bencana <br><small>Detail jenis_bencana '.$q['jenis_bencana'].'</small>';
        $data['jenis_bencana'] = $q;
        $data['detail_jenis_bencana'] = $q_detail;
        $this->template->load('template/user_adminlte','user/admin/jenis_bencana/detail_jenis_bencana', $data);

        // $this->load->view('template/user_adminlte');
    }




    public function simpan_detail(){
     
     $id_jenis_bencana = $this->input->post('id_jenis_bencana');
     $nama_paket = $this->input->post('nama_paket');
     $masa_aktif = $this->input->post('masa_aktif');
     $satuan_masa_aktif = $this->input->post('satuan_masa_aktif');
     $pertemuan = $this->input->post('pertemuan');
     $biaya = $this->input->post('biaya');
     $data = [
        'nama_paket_jenis_bencana'=>$nama_paket,
        'id_jenis_bencana'=>$id_jenis_bencana,
        'masa_aktif'=>$masa_aktif,
        'satuan_masa_aktif'=>$satuan_masa_aktif,
        'biaya'=>$biaya,
        'banyak_pertemuan'=>$pertemuan,
        'status'=>1
     ];
     $this->db->insert('detail_jenis_bencana', $data);
     $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Jenis Member Disimpan</div>');
            redirect('user/admin/jenis_bencana/detail/'.enkripsi($id_jenis_bencana));

    }

	public function edit()
	{
		
            $id_jenis_bencana = $this->input->post('id_jenis_bencana');
            $q = $this->db->query("SELECT id_jenis_bencana,nama_bencana, kategori from jenis_bencana where id_jenis_bencana='$id_jenis_bencana'")->row_array();
            echo json_encode($q);
		// $this->load->view('template/admin');
	}




    public function edit_detail()
    {
        
            $id_detail_jenis_bencana = $this->input->post('id_detail_jenis_bencana');
            $q = $this->db->query("SELECT  id_detail_jenis_bencana, id_jenis_bencana, nama_paket_jenis_bencana, banyak_pertemuan, masa_aktif, satuan_masa_aktif, biaya, status from detail_jenis_bencana where id_detail_jenis_bencana='$id_detail_jenis_bencana'")->row_array();
            echo json_encode($q);
        // $this->load->view('template/admin');
    }




    public function simpan(){
     
     $kategori = $this->input->post('kategori');
     $nama_bencana = $this->input->post('nama_bencana');
     $data = [
        'kategori'=>$kategori,
        'nama_bencana'=>$nama_bencana,
        // 'keterangan'=>nl2br($keterangan),
     ];
     $this->db->insert('jenis_bencana', $data);
      $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Jenis Bencana Disimpan</div>');
            redirect('user/admin/jenis_bencana');

    }
    public function simpanedit(){
     
     $id_jenis_bencana = $this->input->post('id_jenis_bencana');
    $kategori = $this->input->post('kategori');
     $nama_bencana = $this->input->post('nama_bencana');
     $data = [
        'kategori'=>$kategori,
        'nama_bencana'=>$nama_bencana,
        // 'keterangan'=>nl2br($keterangan),
     ];
     $where = [
        'id_jenis_bencana'=>$id_jenis_bencana,
     ];
     $this->db->update('jenis_bencana', $data, $where);
      $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data jenis bencana diperbaharui</div>');
            redirect('user/admin/jenis_bencana');

    }

    public function simpanedit_detail(){
     
     
     $id_jenis_bencana = $this->input->post('id_jenis_bencana');
     $nama_paket = $this->input->post('nama_paket');
     $masa_aktif = $this->input->post('masa_aktif');
     $satuan_masa_aktif = $this->input->post('satuan_masa_aktif');
     $pertemuan = $this->input->post('pertemuan');
     $biaya = $this->input->post('biaya');

     $status = $this->input->post('status');
     $id_detail_jenis_bencana = $this->input->post('id_detail_jenis_bencana');
     $data = [
        'nama_paket_jenis_bencana'=>$nama_paket,
        'id_jenis_bencana'=>$id_jenis_bencana,
        'masa_aktif'=>$masa_aktif,
        'satuan_masa_aktif'=>$satuan_masa_aktif,
        'biaya'=>$biaya,
        'banyak_pertemuan'=>$pertemuan,
        'status'=>$status
     ];
     $where = [
        'id_detail_jenis_bencana'=>$id_detail_jenis_bencana,
     ];
     $this->db->update('detail_jenis_bencana', $data, $where);
      $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Paket jenis_bencana Diperbaharui</div>');
            redirect('user/admin/jenis_bencana/detail/'.enkripsi($id_jenis_bencana));

    }


    public function hapus()
    {
            $id_jenis_bencana = $this->input->post('id_jenis_bencana');
            $q = $this->db->query("DELETE FROM jenis_bencana where id_jenis_bencana='$id_jenis_bencana'");
            $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data jenis_bencana Dinonaktifkan</div>');
            
        
    }


    public function nonaktifkan_detail_jenis_bencana()
    {
            $id_detail_jenis_bencana = $this->input->post('id_detail_jenis_bencana');
            $jenis_bencana = $this->input->post('jenis_bencana');
            $q = $this->db->query("UPDATE detail_jenis_bencana set status='0' where id_detail_jenis_bencana='$id_detail_jenis_bencana'");
            $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Paket jenis_bencana '.$jenis_bencana.' Dinonaktifkan</div>');
            
        
    }


}
