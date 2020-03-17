<?php
class Template{
    protected $_ci;
    
    public function __construct(){
        $this->_ci = &get_instance();
    }
    
    public function utama($content, $data = NULL){

        $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
        $data['slider'] = $this->_ci->load->view('template/slider', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
        
        $this->_ci->load->view('index', $data);
    }

    public function cek_login() {
        if($this->_ci->session->userdata('username') == '') {
        $this->_ci->session->set_flashdata('pesan','Jangan Coba Coba Akses Halaman Sebelum Login Karena IP Anda Telah Diamankan'.$_SERVER["REMOTE_ADDR"].'Perhatikan Baik Baik..!!' );
        redirect('c_admin');
        }
    }
}

if (!function_exists('bulan')) {
    function bulan(){
        $bulan = Date('m');
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;

            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
}

if (!function_exists('tanggal')) {
    function tanggal() {
        $tanggal = Date('d') . " " .bulan(). " ".Date('Y');
        return $tanggal;
    }
}