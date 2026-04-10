<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
       $hak_akses = $this->db->query("SELECT 
         id_hak_akses,nama_hak_akses
         from hak_akses -- where id_hak_akses= 3 ")->result_array();
       $kumpul_hak_akses = [];
       foreach ($hak_akses as $k => $v) {
           $kumpul_hak_akses[$v['id_hak_akses']] = $v['nama_hak_akses'];
       }
       $this->hak_akses = $kumpul_hak_akses;


        $id_hak_akses = $this->session->userdata('id_hak_akses'); 
        //   if ($id_hak_akses!='1') {
        //     redirect('auth/login/kick');
        // }
        
    }





    public function index()
    {
        $data['judul'] = 'user';
        $data['breadchumb'] = ' <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah">
                Tambah User
              </button>';
        $q = $this->db->query("SELECT 
         id_user, id_hak_akses,nama,alamat,nohp,email,jabatan,username,password,status, foto, status_akses
         from user where status !='delete'")->result_array();
        $data['user'] = $q;
        $data['hak_akses'] = $this->hak_akses;
        $this->template->load('template/user_adminlte','user/admin/user/data_user', $data);

        // $this->load->view('template/user_adminlte');
    }

    public function edit()
    {
        
            $id_user = $this->input->post('id_user');
            $q = $this->db->query("SELECT 
            id_user, id_hak_akses,nama,alamat,nohp,email,jabatan,username,password,status, foto, status_akses
            from user where id_user='$id_user'")->row_array();
            $output = [
                'id_user'=>$q['id_user'],
                'id_hak_akses'=>$q['id_hak_akses'],
                'nama'=>$q['nama'],
                'alamat'=>$q['alamat'],
                'nohp'=>$q['nohp'],
                'email'=>$q['email'],
                'jabatan'=>$q['jabatan'],
                'username'=>$q['username'],
                'password'=>$q['password'],
                'status'=>$q['status'],
                'foto'=>$q['foto'],
                'status_akses'=>$q['status_akses'],
               
            ];
            echo json_encode($output);
        // $this->load->view('template/admin');
    }




    // public function simpan(){
     
    //  $jenis = $this->input->post('jenis');
    //  $user = $this->input->post('user');
    //  $nama_user = $this->input->post('nama_user');
    //  $keterangan = $this->input->post('keterangan');
    //  $data = [
    //     'jenis'=>$jenis,
    //     'besar_user'=>$user,
    //     'nama_user'=>$nama_user,
    //     'keterangan'=>nl2br($keterangan),
    //     'status '=>1
    //  ];
    //  $this->db->insert('user', $data);
    //     $this->session->set_flashdata('pesan','<div class="alert alert-info">Data user Disimpan</div>');
    //         redirect('user/admin/user');

    // }
















    public function simpan(){
        $config['upload_path']          = './file/user';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        // $config['file_name']            = $new_file_name;
        $nama_file = $_FILES['berkas']['name'] ;
        $pecah = explode(".", $nama_file);
        $extensi = end($pecah);
        $new_file_name=date("Ymdhi").'.'.$extensi;
        $config['file_name']            = $new_file_name;
            $config['max_size']         = '10000';
        $this->load->library('upload', $config);
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        // $id_berita = $this->input->post('id_berita');
        // $where  = [
        //     'id_berita'=>$this->input->post('id'),
          
        // ];


        $berikan_akses = $this->input->post('berikan_akses');
     

        if ( ! $this->upload->do_upload('berkas')){
            if ($nama_file=='') {
                 $data_insert = [
                    'nama'=>$this->input->post('nama'),
                    'alamat'=>$this->input->post('alamat'),
                    'nohp'=>$this->input->post('nohp'),
                    'email'=>$this->input->post('email'),
                    'jabatan '=>$this->input->post('jabatan'),
                    'status'=>1,
                ];
                 $data_insert_with_login = [
                    'nama'=>$this->input->post('nama'),
                    'alamat'=>$this->input->post('alamat'),
                    'nohp'=>$this->input->post('nohp'),
                    'email'=>$this->input->post('email'),
                    'jabatan'=>$this->input->post('jabatan'),
                    'username'=>$this->input->post('username'),
                    'id_hak_akses'=>$this->input->post('id_hak_akses'),
                    'password'=>$password,
                    'status'=>1,
                    'status_akses'=>1,
                ];
                $error = 0;
                $warna = 'alert alert-info';

                $pesan = 'Data user disimpan tanpa gambar';
            }else{
                if ($this->upload->display_errors()) {
                    $pesan_ERROR = $this->upload->display_errors();
                    $error = 1;
                    $warna = 'alert alert-danger';
                    $pesan = 'Data gagal disimpan<br>'.$pesan_ERROR ;
                    //  $data_insert = [
                    //     'nama'=>$this->input->post('nama'),
                    //     'alamat'=>$this->input->post('alamat'),
                    //     'nohp'=>$this->input->post('nohp'),
                    //     'email'=>$this->input->post('email'),
                    //     'jabatan '=>$this->input->post('jabatan'),
                    //     'status'=>1,
                    // ];
                    //  $data_insert_with_login = [
                    //     'nama'=>$this->input->post('nama'),
                    //     'alamat'=>$this->input->post('alamat'),
                    //     'nohp'=>$this->input->post('nohp'),
                    //     'email'=>$this->input->post('email'),
                    //     'jabatan'=>$this->input->post('jabatan'),
                    // 'id_hak_akses'=>$this->input->post('id_hak_akses'),
                    //     'username'=>$this->input->post('username'),
                    //     'password'=>$password,
                    //     'status'=>1,
                    //     'status_akses'=>1,
                    // ];
                }else{
                    $pesan_ERROR = '';
                    $error = 0;
                    $warna = 'alert alert-info';
                     $data_insert = [
                        'nama'=>$this->input->post('nama'),
                        'alamat'=>$this->input->post('alamat'),
                        'nohp'=>$this->input->post('nohp'),
                        'email'=>$this->input->post('email'),
                        'jabatan '=>$this->input->post('jabatan'),
                        'status'=>1,
                    ];
                     $data_insert_with_login = [
                        'nama'=>$this->input->post('nama'),
                        'alamat'=>$this->input->post('alamat'),
                        'nohp'=>$this->input->post('nohp'),
                        'email'=>$this->input->post('email'),
                        'jabatan'=>$this->input->post('jabatan'),
                    'id_hak_akses'=>$this->input->post('id_hak_akses'),
                        'username'=>$this->input->post('username'),
                        'password'=>$password,
                        'status'=>1,
                        'status_akses'=>1,
                       
                    ];
                    $pesan = "<strong>Upload Sukses ! </strong><br>".$pesan_ERROR;

                }

            }
        }else{
            array('upload_data' => $this->upload->data());
            $error = 0;
            $pesan = "<strong>Upload Success ! </strong><br>Data user disimpan dengan foto";
            $warna = 'alert alert-info';
            // $this->load->view('v_upload_sukses', $data);
            $redirect = 'user/admin/user';
                     $data_insert = [
                        'nama'=>$this->input->post('nama'),
                        'alamat'=>$this->input->post('alamat'),
                        'nohp'=>$this->input->post('nohp'),
                        'email'=>$this->input->post('email'),
                        'jabatan '=>$this->input->post('jabatan'),
                         'foto'=>$new_file_name,
                        'status'=>1,
                    ];
                     $data_insert_with_login = [
                        'nama'=>$this->input->post('nama'),
                        'alamat'=>$this->input->post('alamat'),
                        'nohp'=>$this->input->post('nohp'),
                        'email'=>$this->input->post('email'),
                        'jabatan'=>$this->input->post('jabatan'),
                         'foto'=>$new_file_name,
                    'id_hak_akses'=>$this->input->post('id_hak_akses'),
                        'username'=>$this->input->post('username'),
                        'password'=>$password,
                        'status'=>1,
                        'status_akses'=>1,
                       
                    ];
        }


            $cek_username = $this->db->query("SELECT * from user where username = '$username'")->num_rows();
            if ($cek_username>0) {
                $warna = "alert alert-danger";
                $pesan = "Gagal menyimpan user <br>Username sudah dipakai. silahkan dunakan username lain";
                  
            }else{
                if ($error==0) {
                    $warna = "alert alert-info";
                    $pesan = "Data user disimpan beserta akses login";
                    $this->db->insert('user', $data_insert_with_login);
                    # code...
                }else{
                    $warna = "alert alert-danger";
                    $pesan = $pesan;

                }
               
            }
        
            $this->session->set_flashdata('pesan','<div class="'.$warna.'"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$pesan.'</div>');
        if ($error>0) {
                $redirect = 'user/admin/user';
            }else{
                $redirect = 'user/admin/user';
            }
            redirect($redirect);

    }

    public function simpanedit(){
         $id_user = $this->input->post('id_user');
         $where = ['id_user'=>$id_user];
        $config['upload_path']          = './file/user';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        // $config['file_name']            = $new_file_name;
        $nama_file = $_FILES['berkas']['name'] ;
        $pecah = explode(".", $nama_file);
        $extensi = end($pecah);
        $new_file_name=date("Ymdhi").'.'.$extensi;
        $config['file_name']            = $new_file_name;
            $config['max_size']         = '10000';
        $this->load->library('upload', $config);
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        // $id_berita = $this->input->post('id_berita');
        // $where  = [
        //     'id_berita'=>$this->input->post('id'),
          
        // ];


        $berikan_akses = $this->input->post('berikan_akses');
     

        if ( ! $this->upload->do_upload('berkas')){
            if ($nama_file=='') {
                 $data_insert = [
                    'nama'=>$this->input->post('nama'),
                    'alamat'=>$this->input->post('alamat'),
                    'nohp'=>$this->input->post('nohp'),
                    'email'=>$this->input->post('email'),
                    'jabatan '=>$this->input->post('jabatan'),
                    
                        
                        'username'=>'',
                        'password'=>'',
                        'status_akses'=>0,
                        'status'=>$this->input->post('status'),
                ];
                 $data_insert_with_login = [
                    'nama'=>$this->input->post('nama'),
                    'alamat'=>$this->input->post('alamat'),
                    'nohp'=>$this->input->post('nohp'),
                    'email'=>$this->input->post('email'),
                    'jabatan'=>$this->input->post('jabatan'),
                    'username'=>$this->input->post('username'),
                    'password'=>$password,
                    'status'=>$this->input->post('status'),
                    'status_akses'=>1,
                   
                ];
                $error = 0;
                $warna = 'alert alert-info';

                $pesan = 'Data user disimpan tanpa gambar';
            }else{
                if ($this->upload->display_errors()) {
                    $pesan_ERROR = $this->upload->display_errors();
                    $error = 1;
                    $warna = 'alert alert-danger';
                    $pesan = 'Data gagal disimpan<br>'.$pesan_ERROR ;
                    //  $data_insert = [
                    //     'nama'=>$this->input->post('nama'),
                    //     'alamat'=>$this->input->post('alamat'),
                    //     'nohp'=>$this->input->post('nohp'),
                    //     'email'=>$this->input->post('email'),
                    //     'jabatan '=>$this->input->post('jabatan'),
                    //     'status'=>$this->input->post('status'),
                    // ];
                    //  $data_insert_with_login = [
                    //     'nama'=>$this->input->post('nama'),
                    //     'alamat'=>$this->input->post('alamat'),
                    //     'nohp'=>$this->input->post('nohp'),
                    //     'email'=>$this->input->post('email'),
                    //     'jabatan'=>$this->input->post('jabatan'),
                    // 'id_hak_akses'=>$this->input->post('id_hak_akses'),
                    //     'username'=>$this->input->post('username'),
                    //     'password'=>$password,
                    //     'status'=>$this->input->post('status'),
                    //     'status_akses'=>1,
                       
                    // ];
                      
                    
                }else{
                    $pesan_ERROR = '';
                    $error = 0;
                    $warna = 'alert alert-info';
                     $data_insert = [
                        'nama'=>$this->input->post('nama'),
                        'alamat'=>$this->input->post('alamat'),
                        'nohp'=>$this->input->post('nohp'),
                        'email'=>$this->input->post('email'),
                        'jabatan '=>$this->input->post('jabatan'),
                        
                     'foto'=>$new_file_name,
                        'username'=>'',
                        'password'=>'',
                        'status_akses'=>0,
                        'status'=>$this->input->post('status'),
                    ];
                     $data_insert_with_login = [
                        'nama'=>$this->input->post('nama'),
                        'alamat'=>$this->input->post('alamat'),
                        'nohp'=>$this->input->post('nohp'),
                        'email'=>$this->input->post('email'),
                        'jabatan'=>$this->input->post('jabatan'),
                        'username'=>$this->input->post('username'),
                        'password'=>$password,
                        'status'=>$this->input->post('status'),
                        'status_akses'=>1,
                       
                    ];
                    $pesan = "<strong>Upload Sukses ! </strong><br>".$pesan_ERROR;

                }

            }


            
        }else{
            array('upload_data' => $this->upload->data());
            $error = 432;
            $pesan = "<strong>Upload Success ! </strong><br>Data user disimpan dengan foto";
            $warna = 'alert alert-info';
            $filelama = $this->input->post('file_lama');
            // $this->load->view('v_upload_sukses', $data);
            $redirect = 'user/admin/user';
                     $data_insert = [
                        'nama'=>$this->input->post('nama'),
                        'alamat'=>$this->input->post('alamat'),
                        'nohp'=>$this->input->post('nohp'),
                        'email'=>$this->input->post('email'),
                        'jabatan '=>$this->input->post('jabatan'),
                         'foto'=>$new_file_name,

                        'username'=>'',
                        'password'=>'',
                        'status_akses'=>0,
                        'status'=>$this->input->post('status'),
                    ];
                     $data_insert_with_login = [
                        'nama'=>$this->input->post('nama'),
                        'alamat'=>$this->input->post('alamat'),
                        'nohp'=>$this->input->post('nohp'),
                        'email'=>$this->input->post('email'),
                        'jabatan'=>$this->input->post('jabatan'),
                         'foto'=>$new_file_name,
                        'username'=>$this->input->post('username'),
                        'password'=>$password,
                        'status'=>$this->input->post('status'),
                        'status_akses'=>1,
                       
                    ];
                    unlink('./file/user/'.$filelama);
        }

            $this->db->update('user', $data_insert , $where);
        
            $this->session->set_flashdata('pesan','<div class="'.$warna.'"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$pesan.'</div>');
        if ($error>0) {
                $redirect = 'user/admin/user';
                # code...
            }else{
                $redirect = 'user/admin/user';

            }


            redirect($redirect);

    }







    public function hapus()
    {
                $this->session->set_flashdata('pesan','<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data user Dihapus</div>');
            $id_user = $this->input->post('id_user');
            $q = $this->db->query("UPDATE user set status='delete', status_akses='delete' where id_user='$id_user'");
            
        
    }




    public function simpanedit_akun()
    {
            $id_user = $this->input->post('id_user');
            $username = $this->input->post('username');
            $id_hak_akses = $this->input->post('id_hak_akses');
            $password = $this->input->post('password');
            $status = $this->input->post('status');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data_insert_with_login = [
                'username'=>$this->input->post('username'),
                'password'=>$password,
                'id_hak_akses'=>$id_hak_akses,
                'status_akses'=>$status,
            ];
             $where = [
                'id_user'=>$id_user,
            ];
            $cek_username = $this->db->query("SELECT * from user where username = '$username' and id_user !='$id_user'")->num_rows();
            if ($cek_username>0) {
                $warna = "alert alert-danger";
                $pesan = "Gagal menyimpan user <br>Username sudah dipakai. silahkan dunakan username lain";
                  
            }else{
                $warna = "alert alert-info";
                $pesan = "Data akses login diperbaharui";
                $this->db->update('user', $data_insert_with_login, $where);
               
            }
        
            $redirect = 'user/admin/user';
           $this->session->set_flashdata('pesan','<div class="'.$warna.'"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$pesan.'</div>');
            redirect($redirect);


            
        
    }


}
