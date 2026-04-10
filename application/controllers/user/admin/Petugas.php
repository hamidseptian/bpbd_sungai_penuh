<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {


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
        $data['judul'] = 'Master Data - Petugas';
        $data['breadchumb'] = ' <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah">
                Tambah Petugas
              </button>';
        $q = $this->db->query("SELECT  id_petugas,nama, nip, alamat, no_hp, jabatan from petugas ")->result_array();
        $data['petugas'] = $q;
        $this->template->load('template/user_adminlte','user/admin/petugas/data_petugas', $data);

        // $this->load->view('template/user_adminlte');
    }




	public function edit()
	{
		
            $id_petugas = $this->input->post('id_petugas');
            $q = $this->db->query("SELECT * from petugas where id_petugas='$id_petugas'")->row_array();
            echo json_encode($q);
		// $this->load->view('template/admin');
	}






    public function simpan(){
     
     $nip = $this->input->post('nip');
     $nama = $this->input->post('nama');
     $jabatan = $this->input->post('jabatan');
     $pangkat = $this->input->post('pangkat');
     $alamat = $this->input->post('alamat');
     $nohp = $this->input->post('nohp');
     $data = [
        'nip'=>$nip,
        'nama'=>$nama,
        'jabatan'=>$jabatan,
        'pangkat'=>$pangkat,
        'alamat'=>$alamat,
        'no_hp'=>$nohp,
     ];
     $this->db->insert('petugas', $data);
      $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Petugas Disimpan</div>');
            redirect('user/admin/petugas');

    }
    public function simpanedit(){
     
     $id_petugas = $this->input->post('id_petugas');
    $nip = $this->input->post('nip');
     $nama = $this->input->post('nama');
     $jabatan = $this->input->post('jabatan');
     $pangkat = $this->input->post('pangkat');
     $alamat = $this->input->post('alamat');
     $nohp = $this->input->post('nohp');
     $data = [
        'nip'=>$nip,
        'nama'=>$nama,
        'jabatan'=>$jabatan,
        'pangkat'=>$pangkat,
        'alamat'=>$alamat,
        'no_hp'=>$nohp,
     ];
     $where = [
        'id_petugas'=>$id_petugas,
     ];
     $this->db->update('petugas', $data, $where);
      $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data jenis Petugas diperbaharui</div>');
            redirect('user/admin/petugas');

    }

    public function simpanedit_detail(){
     
     
     $id_petugas = $this->input->post('id_petugas');
     $nama_paket = $this->input->post('nama_paket');
     $masa_aktif = $this->input->post('masa_aktif');
     $satuan_masa_aktif = $this->input->post('satuan_masa_aktif');
     $pertemuan = $this->input->post('pertemuan');
     $biaya = $this->input->post('biaya');

     $status = $this->input->post('status');
     $id_detail_petugas = $this->input->post('id_detail_petugas');
     $data = [
        'nama_paket_petugas'=>$nama_paket,
        'id_petugas'=>$id_petugas,
        'masa_aktif'=>$masa_aktif,
        'satuan_masa_aktif'=>$satuan_masa_aktif,
        'biaya'=>$biaya,
        'banyak_pertemuan'=>$pertemuan,
        'status'=>$status
     ];
     $where = [
        'id_detail_petugas'=>$id_detail_petugas,
     ];
     $this->db->update('detail_petugas', $data, $where);
      $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Paket petugas Diperbaharui</div>');
            redirect('user/admin/petugas/detail/'.enkripsi($id_petugas));

    }


    public function hapus()
    {
            $id_petugas = $this->input->post('id_petugas');
            $q = $this->db->query("DELETE FROM petugas where id_petugas='$id_petugas'");
            $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data petugas Dinonaktifkan</div>');
            
        
    }


    public function nonaktifkan_detail_petugas()
    {
            $id_detail_petugas = $this->input->post('id_detail_petugas');
            $petugas = $this->input->post('petugas');
            $q = $this->db->query("UPDATE detail_petugas set status='0' where id_detail_petugas='$id_detail_petugas'");
            $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Paket petugas '.$petugas.' Dinonaktifkan</div>');
            
        
    }


}
