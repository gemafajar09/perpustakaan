<?php

Class Admin extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template','load');
        $this->load->model('M_admin','admin');
	}
// awal login
    public function index()
    {
		$this->form_validation->set_rules('username','Username','required|trim');
            $this->form_validation->set_rules('password','Password','required|trim');
            if($this->form_validation->run()==false)
            {
                $this->load->view('login/login');
            } else {
                $username = $this->input->POST('username');
            	$password = $this->input->POST('password');
            	$user = $this->db->GET_WHERE('pegawai',['username'=> $username])->row_array();
                    if($user['username']== $username)
                    {
                        if(password_verify($password, $user['password']))
                        {
                            $data =[
                                'username' => $user['username'],
                            ];
                            $this->session->set_userdata($data);
                            $this->session->set_flashdata('pesan','Selamat Datang Admin.');
                            redirect('Admin/halaman');
                        }else{
                            $this->session->set_flashdata('pesan','Password Salah');
                            redirect('Admin');
                        }
                    }else{
                        $this->session->set_flashdata('pesan','Username Salah');
                            redirect('Admin');
                    }

                }
    }

    public function register()
    {
        $this->load->view('login/registrasi');
    }

    public function daftar()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $nama_pegawai = $this->input->post('nama_pegawai');
        $jabatan = $this->input->post('jabatan');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

            $pass = password_hash($password, PASSWORD_DEFAULT);
            $this->admin->daftar($id_pegawai,$nama_pegawai,$jabatan,$username,$pass);
            $this->session->set_flashdata('pesan','Pendaftaran Berhasil');
            redirect('Admin');
    }

    public function halaman()
    {
        $data['user'] =$this->db->GET_WHERE('pegawai',['username' => $this->session->userdata('username')])->row_array();
        $this->template->utama('home', $data);
    }
  	
// penutup
    public function logout()
    {
        $this->session->unset_userdata(array('email','password'));
        $this->session->set_flashdata('pesan','Anda Telah Logout.');
        redirect('Admin');
    }

}