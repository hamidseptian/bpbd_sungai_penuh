<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_bantuan extends CI_Controller {


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
        $data['judul'] = 'Master Data - Jenis Bantuan';
        $data['breadchumb'] = ' <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah">
                Tambah Jenis Bantuan
              </button>';
        $q = $this->db->query("SELECT  id_jenis_bantuan,item, satuan, kategori from jenis_bantuan ")->result_array();
        $q_kategori = $this->db->query("SELECT  kategori from kategori_bantuan ")->result_array();
        $data['jenis_bantuan'] = $q;
        $data['kategori'] = $q_kategori;
        $this->template->load('template/user_adminlte','user/admin/jenis_bantuan/data_jenis_bantuan', $data);

        // $this->load->view('template/user_adminlte');
    }





	public function edit()
	{
		
            $id_jenis_bantuan = $this->input->post('id_jenis_bantuan');
            $q = $this->db->query("SELECT id_jenis_bantuan,item, kategori, satuan from jenis_bantuan where id_jenis_bantuan='$id_jenis_bantuan'")->row_array();
            echo json_encode($q);
		// $this->load->view('template/admin');
	}







    public function simpan(){
     
     $kategori = $this->input->post('kategori');
     $item = $this->input->post('item');
     $satuan = $this->input->post('satuan');
     $data = [
        'kategori'=>$kategori,
        'item'=>$item,
        'satuan'=>$satuan,
     ];
     $this->db->insert('jenis_bantuan', $data);
      $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Jenis Bencana Disimpan</div>');
            redirect('user/admin/jenis_bantuan');

    }
    public function simpanedit(){
     
     $id_jenis_bantuan = $this->input->post('id_jenis_bantuan');
    $kategori = $this->input->post('kategori');
     $item = $this->input->post('item');
     $satuan = $this->input->post('satuan');
     $data = [
        'kategori'=>$kategori,
        'satuan'=>$satuan,
        'item'=>$item,
     ];
     $where = [
        'id_jenis_bantuan'=>$id_jenis_bantuan,
     ];
     $this->db->update('jenis_bantuan', $data, $where);
      $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data jenis bencana diperbaharui</div>');
            redirect('user/admin/jenis_bantuan');

    }


    public function hapus()
    {
            $id_jenis_bantuan = $this->input->post('id_jenis_bantuan');
            $q = $this->db->query("DELETE FROM jenis_bantuan where id_jenis_bantuan='$id_jenis_bantuan'");
            $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data jenis_bantuan Dinonaktifkan</div>');
            
        
    }



}
