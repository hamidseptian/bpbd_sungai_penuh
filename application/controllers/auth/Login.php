<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       
        $this->id_tupoksi = 1;
    }
	public function index()
	{
		
		// $this->template->load('template/auth','auth/login');
		$this->load->view('auth/login/login');
	}
	
	public function proses_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->query("SELECT * from user where username='$username'")->row_array();
		if ($user) {
				if ($user['status_akses'] == 1) {
					if (password_verify($password, $user['password']) ) {
						$output['status'] 	= true;
						$output['message']	= 'Success !';
						
						$session = [
							'login' 		=> true,
							'id_user' 		=> $user['id_user'],
							'full_name' 	=> $user['nama'],
							'id_hak_akses' 	=> $user['id_hak_akses'],
							'jabatan' 	=> $user['jabatan'],
							
						
							// 'is_active'	=> $user['is_active'],
							'id_session' 	=> session_id()
						];
						$this->session->set_userdata($session);
						$this->session->set_flashdata('pesan','<div class="alert alert-success"> Login Berhasil.!
	                </div>');
						if ($user['id_hak_akses']==1) {
							$redirect = '/user/su/dashboard';
							# code...
						}else if ($user['id_hak_akses']==2) {
							$redirect = '/user/admin/dashboard';

						}else{
							$redirect = '/user/operator/dashboard';

						}
					} else {
						// $this->attempts($post['email']);
						$this->session->set_flashdata('pesan','<div class="alert alert-danger"> Password Salah.!
	                      
	                    </div>');
						$redirect = '/auth/login';
					}
				} else {
					$redirect = '/auth/login';
					$this->session->set_flashdata('pesan','<div class="alert alert-danger"> User tidak aktif.!
                      
                    </div>');
				}
			} else {
				$redirect = '/auth/login';
				$this->session->set_flashdata('pesan','<div class="alert alert-danger"> Username dan Password Salah.!
                  
                </div>');
			}

			redirect($redirect);
	}
	

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
	public function kick()
	{
		$this->session->sess_destroy();
		 $this->session->set_flashdata('pesan','<div class="alert alert-danger"> Akses menu ini tidak dibolehkan <br>Silahkan login ulang
                </div>');
		redirect('/');
	}
}
