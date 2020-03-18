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
            $this->form_validation->set_rules('role_login','Login Sebagai','required|trim');
            if($this->form_validation->run()==false)
            {
                $this->load->view('login/login');
            } else {
                $username = $this->input->POST('username');
                $password = $this->input->POST('password');
                $role_login = $this->input->POST('role_login');

                if($role_login == "super"){
                    $user = $this->db->GET_WHERE('pegawai',['username'=> $username])->row_array();
                    if($user['username']== $username)
                    {
                        if(password_verify($password, $user['password']))
                        {
                            $data =[
                                'username' => $user['username'],
                                'id_pegawai' => $user['id_pegawai'],
                                'nama' => $user['nama_pegawai'],
                                'level' =>$role_login
                            ];
                            $this->session->set_userdata($data);
                            $this->session->set_flashdata('pesan','Selamat Datang ');
                            redirect('Admin/halaman');
                        }else{
                            $this->session->set_flashdata('pesan','Password Salah');
                            redirect('Admin');
                        }
                    }else{
                        $this->session->set_flashdata('pesan','Username Salah');
                            redirect('Admin');
                    }
                }else if($role_login == "minor"){
                    $user = $this->db->GET_WHERE('siswa',['username'=> $username])->row_array();
                    if($user['username']== $username)
                    {
                        if(password_verify($password, $user['password']))
                        {
                            $data =[
                                'username' => $user['username'],
                                'no_anggota' => $user['no_anggota'],
                                'nama' => $user['nama_siswa'],
                                'level' =>$role_login
                            ];
                            $this->session->set_userdata($data);
                            $this->session->set_flashdata('pesan','Selamat Datang ');
                            redirect('Admin/halaman');
                        }else{
                            $this->session->set_flashdata('pesan','Password Salah');
                            redirect('Admin');
                        }
                    }else{
                        $this->session->set_flashdata('pesan','Username Salah');
                            redirect('Admin');
                    }

                }else if($role_login == "kepsek"){
                    $user = $this->db->GET_WHERE('kepsek',['username'=> $username])->row_array();
                    if($user['username']== $username)
                    {
                        if(password_verify($password, $user['password']))
                        {
                            $data =[
                                'username' => $user['username'],
                                'no_kepsek' => $user['id_kepsek'],
                                'nama' => $user['nama_kepsek'],
                                'level' =>$role_login
                            ];
                            $this->session->set_userdata($data);
                            $this->session->set_flashdata('pesan','Selamat Datang ');
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
        $this->session->unset_userdata(array('username','password','level'));
        $this->session->set_flashdata('pesan','Anda Telah Logout.');
        redirect('Admin');
    }

}