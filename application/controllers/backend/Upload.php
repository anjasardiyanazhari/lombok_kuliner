<?php


class Upload extends CI_Controller
{
	public function index()
	{
		$data['judul'] = 'Upload Data';
		$data['halaman'] = 'beckend/v_upload';
		$this->load->view('beckend/template', $data);
	}
}
