<?php
class Sms extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
		$this->load->model('M_sms');
	}

	public function index()
	{
		$data['user'] = $this->db->GET_WHERE('pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$data['sms'] = $this->M_sms->tampil();
		$this->template->utama('sms/data_sms', $data);
	}

	public function tambah_data()
	{
		$no_tujuan = $this->input->post('no_tujuan');
		$isi_pesan = $this->input->post('isi_pesan');


		$array_fields['phone_number'] = $no_tujuan; // set nohp
		$array_fields['message'] = $isi_pesan; // set pesan
		$array_fields['device_id'] = 116234; // set device id. cek di dashboard web smsgateway.me


		// token didapat dari smsgateway.me
		$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU4NDY5NDc2OCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjc4NjE0LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.NaLXTLVJSltW_cznrD38D7t2F5qT5Gwo-1RoRc6WMAY";

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "[  " . json_encode($array_fields) . "]",
			CURLOPT_HTTPHEADER => array(
				"authorization: $token",
				"cache-control: no-cache"
			),
		));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$response = curl_exec($curl);
		$err = curl_error($curl);
		if ($err) {
			echo "<script>
			alert('Gagal Kirim Pesan');
			</script>";
			redirect('sms/index');
		} else {
			$data = array(
				'sms_no' => $no_tujuan,
				'sms_isi' => $isi_pesan,
			);
			$this->M_sms->tambah($data);
			echo "<script>
			alert('Pesan Terkirim');
			</script>";
			redirect('sms/index');
		}
	}

	public function hapus($id)
	{
		$this->M_sms->hapus_sms($id);
		redirect('sms/index');
	}
}
