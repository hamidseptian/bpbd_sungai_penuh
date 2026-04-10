<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


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
        $data['judul'] = 'Dashboard';
        $data['deskripsi'] = 'Untuk mengelola user yang bisa login ke dalam aplikasi';

        $data['breadchumb'] = '';
        $id_user = $this->session->userdata('id_user');
        $q = $this->db->query("SELECT id_user,   id_hak_akses, nama, alamat, nohp, email,jabatan, foto, status, status_akses   from user where id_user ='$id_user' ")->row_array();
        $q_ha = $this->db->query("SELECT id_hak_akses, nama_hak_akses  from hak_akses")->result_array();
        $kumpul_ha = [];
        foreach ($q_ha as $k => $v) { 
          $kumpul_ha[$v['id_hak_akses']] = $v['nama_hak_akses'];
        }

       
        $data['user'] = $q;
        $data['hak_akses'] = $kumpul_ha;
    
        // $data['modal']                      = $this->load->view('user/operator/dashboard/modal', $data, true);
        $this->template->load('template/user_adminlte','user/operator/dashboard/dashboard', $data);


        // $this->load->view('template/user_adminlte');
    }

	public function edit()
	{
		
            $id_user = $this->input->post('id_user');
            $q = $this->db->query("SELECT id_user, id_hak_akses, nama, alamat, nohp, email,jabatan, username,password, status, status_akses from master_user where id_user='$id_user'")->row_array();
            $q_hs = $this->db->query("SELECT id_hak_akses from hak_akses_user where id_user='$id_user'")->result_array();
            $output = ['user'=>$q , 'hak_akses'=>$q_hs];
            echo json_encode($output);
		// $this->load->view('template/admin');
	}
 
  
	public function atur_outlet()
	{
		
            $id_user = $this->input->post('id_user');
            $q = $this->db->query("SELECT id_user, id_hak_akses, nama, alamat, nohp, email,jabatan, username,password, status, status_akses from master_user where id_user='$id_user'")->row_array();
            $q_outlet_fnb = $this->db->query("SELECT id_outlet from outlet_fnb_user where id_user='$id_user'")->result_array();
            $q_outlet_proshop = $this->db->query("SELECT id_outlet from outlet_proshop_user where id_user='$id_user'")->result_array();
            $output = ['user'=>$q , 'outlet_fnb'=>$q_outlet_fnb, 'outlet_proshop'=>$q_outlet_proshop];
            echo json_encode($output);
		// $this->load->view('template/admin');
	}
 
  





    public function simpan(){
        $config['upload_path']          = './file/user';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $new_file_name=date("Ymdhis");
        // $config['file_name']            = $new_file_name;
        $nama_file = $_FILES['berkas']['name'] ;
        $pecah = explode(".", $nama_file);
        $extensi = end($pecah);
        $new_file_name=date("Ymdhis").'.'.$extensi;
        $config['file_name']            = $new_file_name;
            $config['max_size']         = '10000';


        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $alamat = $this->input->post('alamat');
        $nohp = $this->input->post('nohp');
        $jabatan = $this->input->post('jabatan');
        $email = $this->input->post('email');
        $hak_akses = $this->input->post('hak_akses');
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $this->db->trans_start();
        

        $this->load->library('upload', $config);
      
    

        if ( ! $this->upload->do_upload('berkas')){


            if ($nama_file=='') {
                 $data_insert = [
                    'nama'=>$nama,
                    'alamat'=>$alamat,
                    'nohp'=>$nohp,
                    'jabatan'=>$jabatan,
                    'email'=>$email,
                    // 'id_hak_akses'=>$hak_akses,
                    'username'=>$username,
                    'password'=>$password,
                    'status'=>1,
                    'status_akses'=>$status,
                   
                ];
                $error = 0;
                $pesan = "Data user disimpan tanpa foto";

            $warna = 'alert alert-success';
              
            }else{
                if ($this->upload->display_errors()) {
                    $pesan_ERROR = $this->upload->display_errors();
                    $error = 1;
                    $warna = 'alert alert-danger';
                    $pesan = "<strong>Upload Failed ! </strong><br>".$pesan_ERROR;
                    $data_insert = [
                        'nama'=>$nama,
                        'alamat'=>$alamat,
                        'nohp'=>$nohp,
                        'jabatan'=>$jabatan,
                        'email'=>$email,
                        // 'id_hak_akses'=>$hak_akses,
                        'username'=>$username,
                        'password'=>$password,
                        'status'=>1,
                    'status_akses'=>$status,
                       
                      
                    ];
                     
                }else{
                    $pesan_ERROR = '';
                    $error = 0;
                    $warna = 'alert alert-success';
                    $data_insert = [
                        'nama'=>$nama,
                        'alamat'=>$alamat,
                        'nohp'=>$nohp,
                        'jabatan'=>$jabatan,
                        'email'=>$email,
                        // 'id_hak_akses'=>$hak_akses,
                        'username'=>$username,
                        'password'=>$password,
                        'status'=>1,
                    'status_akses'=>$status,
                       
                      
                    ];
                  $pesan = "<strong>Upload Failed ! </strong><br>".$pesan_ERROR;

                }

            }

          
        }else{
            array('upload_data' => $this->upload->data());
            $error = 0;
            $pesan = "<strong>Upload Success ! </strong><br>Data user disimpan dengan foto";
            $warna = 'alert alert-success';
            // $this->load->view('v_upload_sukses', $data);
            $redirect = "";

            
                 $data_insert = [
                    'nama'=>$nama,
                    'alamat'=>$alamat,
                    'nohp'=>$nohp,
                    'jabatan'=>$jabatan,
                    'email'=>$email,
                    // 'id_hak_akses'=>$hak_akses,
                    'username'=>$username,
                    'password'=>$password,
                    'status'=>1,
                    'foto'=>$new_file_name,
                    'status_akses'=>$status,
               
              
              
            ];
        }
            if ($error>0) {
                $redirect = 'user/admin/user';
            }else{
              $q_cek_password = $this->db->query("SELECT username from master_user where username='$username'")->num_rows();
              if ($q_cek_password>0) {
                          $this->session->set_flashdata('pesan','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal menyimpan user. Username sudah digunakan. silahkan gunakan username lain</div>');
                # code...
              }else{

                if (count($hak_akses)>0) {
                    $kumpul_hs_user = [];
                      $this->db->insert('master_user', $data_insert);
                      $id_user = $this->db->insert_id();
                    foreach ($hak_akses as $key => $value) {
                       $data = [
                        'id_user'=>$id_user,
                        'id_hak_akses'=>$value
                       ];
                       array_push($kumpul_hs_user, $data);
                    }

                    $this->db->insert_batch('hak_akses_user', $kumpul_hs_user);
                    $this->db->trans_commit();
                          $this->session->set_flashdata('pesan','<div class="'.$warna.'"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$pesan.'</div>');

                  
                }else{
                    $this->db->trans_rollback();

                          $this->session->set_flashdata('pesan','<div class="'.$warna.'"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal menyimpan data. Anda belum memilih hak akses</div>');

                }


              }






                $redirect = "user/admin/user";



            }

            redirect($redirect);

    }



    public function simpanedit(){
        $config['upload_path']          = './file/user';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $new_file_name=date("Ymdhis");
        // $config['file_name']            = $new_file_name;
        $nama_file = $_FILES['berkas']['name'] ;
        $pecah = explode(".", $nama_file);
        $extensi = end($pecah);
        $new_file_name=date("Ymdhis").'.'.$extensi;
        $config['file_name']            = $new_file_name;
            $config['max_size']         = '10000';


        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $nohp = $this->input->post('nohp');
        $jabatan = $this->input->post('jabatan');
        $email = $this->input->post('email');
        $id_user = $this->input->post('id_user');

        $where = ['id_user'=>$id_user];
        $this->db->trans_start();
   

      

        $this->load->library('upload', $config);
      
    

        if ( ! $this->upload->do_upload('berkas')){


            if ($nama_file=='') {
                 $data_insert = [
                    'nama'=>$nama,
                    'alamat'=>$alamat,
                    'nohp'=>$nohp,
                    'jabatan'=>$jabatan,
                    'email'=>$email,
                    'status'=>1,
                   
                ];
                $error = 0;
                $pesan = "Data user disimpan tanpa foto";

            $warna = 'alert alert-success';
              
            }else{
                if ($this->upload->display_errors()) {
                    $pesan_ERROR = $this->upload->display_errors();
                    $error = 1;
                    $warna = 'alert alert-danger';
                    $pesan = "<strong>Upload Failed ! </strong><br>".$pesan_ERROR;
                    $data_insert = [
                        'nama'=>$nama,
                        'alamat'=>$alamat,
                        'nohp'=>$nohp,
                        'jabatan'=>$jabatan,
                        'email'=>$email,
                        'status'=>1,
                       
                      
                    ];
                     
                }else{
                    $pesan_ERROR = '';
                    $error = 0;
                    $warna = 'alert alert-success';
                    $data_insert = [
                        'nama'=>$nama,
                        'alamat'=>$alamat,
                        'nohp'=>$nohp,
                        'jabatan'=>$jabatan,
                        'email'=>$email,
                        'status'=>1,
                       
                      
                    ];
                  $pesan = "<strong>Upload Failed ! </strong><br>".$pesan_ERROR;

                }

            }

          
        }else{
            array('upload_data' => $this->upload->data());
            $error = 0;
            $pesan = "<strong>Upload Success ! </strong><br>Data user disimpan dengan foto";
            $warna = 'alert alert-success';
            // $this->load->view('v_upload_sukses', $data);
            $redirect = "";

            
                 $data_insert = [
                    'nama'=>$nama,
                    'alamat'=>$alamat,
                    'nohp'=>$nohp,
                    'jabatan'=>$jabatan,
                    'email'=>$email,
                    'status'=>1,
                    'foto'=>$new_file_name,
               
              
              
            ];
        }
            if ($error>0) {
                $redirect = 'user/admin/user';
            }else{
                                  $this->db->update('master_user', $data_insert, $where);
                          $this->session->set_flashdata('pesan','<div class="'.$warna.'"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$pesan.'</div>');

              



                $this->db->trans_commit();



                $redirect = "user/admin/user";



            }

            redirect($redirect);

    }









 
    public function simpanedit_login(){
     
     $id_user = $this->input->post('id_user');

        $hak_akses = $this->input->post('hak_akses');
        $status = $this->input->post('status');
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        
        $this->db->trans_start();
    
    $where = ['id_user'=>$id_user];
     

      $q_cek_password = $this->db->query("SELECT username from master_user where username='$username' and id_user !='$id_user'")->num_rows();
              if ($q_cek_password>0) {
                          $this->session->set_flashdata('pesan','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal menyimpan user. Username sudah digunakan. silahkan gunakan username lain</div>');
                # code...
              }else{
                if ($this->input->post('password')=='') {
                   $data = [
                      'username'=>$username,
                      // 'id_hak_akses'=>$hak_akses,
                      'status_akses'=>$status,
                  ];
                    if (count($hak_akses)>0) {
                    $kumpul_hs_user = [];
                         $this->db->update('master_user', $data, $where);
                        $this->db->delete('hak_akses_user', $where);
                    foreach ($hak_akses as $key => $value) {
                       $data = [
                        'id_user'=>$id_user,
                        'id_hak_akses'=>$value
                       ];
                       array_push($kumpul_hs_user, $data);
                    }
                    $this->db->insert_batch('hak_akses_user', $kumpul_hs_user);
                    $this->db->trans_commit();
                    $this->session->set_flashdata('pesan','<div style="margin-bottom:10px" class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data login user diperbaharui tanpa mengubah password</div>');
                    }else{
                        $this->db->trans_rollback();
                          $this->session->set_flashdata('pesan','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal menyimpan data. Anda belum memilih hak akses</div>');
                    }
                }else{
                   $data = [
                      'username'=>$username,
                      'password'=>$password,
                      // 'id_hak_akses'=>$hak_akses,                   
                      'status_akses'=>$status,
                  ];
                    if (count($hak_akses)>0) {
                        $kumpul_hs_user = [];
                             $this->db->update('master_user', $data, $where);
                            $this->db->delete('hak_akses_user', $where);
                        foreach ($hak_akses as $key => $value) {
                           $data = [
                            'id_user'=>$id_user,
                            'id_hak_akses'=>$value
                           ];
                           array_push($kumpul_hs_user, $data);
                        }

                        $this->db->insert_batch('hak_akses_user', $kumpul_hs_user);
                        $this->db->trans_commit();
                        $this->session->set_flashdata('pesan','<div style="margin-bottom:10px" class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data login user diperbaharui dengan mengubah password</div>');

                      
                    }else{
                        $this->db->trans_rollback();

                              $this->session->set_flashdata('pesan','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal menyimpan data. Anda belum memilih hak akses</div>');

                    }

                }

              }


// echo $this->session->flashdata('pesan');
            redirect('user/admin/user');

    }


 
    public function simpanedit_outlet_user(){
     
     $id_user = $this->input->post('id_user');

        $outlet_fnb = $this->input->post('outlet_fnb');
        $outlet_proshop = $this->input->post('outlet_proshop');
        $status = $this->input->post('status');
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        
        $this->db->trans_start();
    
    $where = ['id_user'=>$id_user];
     
                  
                        $kumpul_outlet_fnb = [];
                        $kumpul_outlet_proshop = [];
                            $this->db->delete('outlet_fnb_user', $where);
                            $this->db->delete('outlet_proshop_user', $where);
                        foreach ($outlet_fnb as $key => $value) {
                           $data_outlet_fnb = [
                            'id_user'=>$id_user,
                            'id_outlet'=>$value
                           ];
                          
                           array_push($kumpul_outlet_fnb, $data_outlet_fnb);
                        }
                        foreach ($outlet_proshop as $key => $value) {
                           $data_outlet_proshop = [
                            'id_user'=>$id_user,
                            'id_outlet'=>$value
                           ];
                          
                           array_push($kumpul_outlet_proshop, $data_outlet_proshop);
                        }


                    if (count($outlet_fnb)>0) {
                        $this->db->insert_batch('outlet_fnb_user', $kumpul_outlet_fnb);
                    }

                    if (count($outlet_proshop)>0) {
                        $this->db->insert_batch('outlet_proshop_user', $kumpul_outlet_proshop);
                    }
                        $this->db->trans_commit();
                        $this->session->set_flashdata('pesan','<div style="margin-bottom:10px" class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data login user diperbaharui dengan mengubah password</div>');

                 

               


// echo $this->session->flashdata('pesan');
            redirect('user/admin/user');

    }



    public function hapus()
    {
            $id = $this->input->post('id');
            $q = $this->db->query("UPDATE master_user set status='delete' where id_user='$id'");
            $q = $this->db->query("DELETE  FROM hak_akses_user where id_user='$id'");
             $this->session->set_flashdata('pesan','<div style="margin-bottom:10px" class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data User Dihapus</div>');
            
        
    }

}
