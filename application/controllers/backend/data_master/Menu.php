<?php

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('backend/data_master/m_menu');
	}

	public function index()
	{
		$data = array(
			'judul'             => 'MENU',
			'halaman'           => 'backend/data_master/menu/v_list',
		);
		// Ambil Data Fasilitas
		$data['menu'] = $this->m_menu->getAll();
		$this->load->view('backend/template', $data);
	}

	public function add()
	{
		$data = array(
			'judul'             => 'TAMBAH MENU',
			'halaman'           => 'backend/data_master/menu/v_add',
		);
		// Ambil Data Fasilitas
		$this->load->view('backend/template', $data);
	}

	function proses_add()
	{
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama',
			'Nama Menu',
			'required',
			array(
				'required'          => '%s Harus Diisi',
			)
		);

		$valid->set_rules(
			'harga',
			'Harga Fasilitas',
			'required',
			array(
				'required'          => '%s Harus Diisi',
			)
		);

		$valid->set_rules(
			'deskripsi',
			'Deskripsi Menu',
			'required',
			array(
				'required'          => '%s Harus Diisi',
			)
		);

		if ($valid->run() == FALSE) {
			$this->add();
			// End Validasi Input
		} else {
			// Falidasi Foto
			$config['upload_path']          = './assets/img/asli/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = '3000';
			$config['max_width']            = '3000';
			$config['max_height']           = '3000';

			$this->load->library('upload');
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('error', 'Foto Gagal Di Upload');
				$this->add();
				// End Validasi Input
			} else {
				// Falidasi Foto
				$upload_gambar = array('upload_data' => $this->upload->data());

				// Create thumbnail
				$config['image_library']        = 'gd2';
				$config['source_image']         = './assets/img/asli/' . $upload_gambar['upload_data']['file_name'];

				// Lokasi folder thumbnail
				$config['new_image']            = './assets/img/thumbnail/';
				$config['create_thumb']         = TRUE;
				$config['maintain_ratio']       = TRUE;
				$config['width']                = 1000;
				$config['height']               = 1500;
				$config['thumb_marker']         = '';

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// End create thumbnail

				//Masuk Database Fasilitas
				$data = array(
					'nama'        			=> $this->input->post('nama'),
					'harga'                 => $this->input->post('harga'),
					'deskripsi'             => $this->input->post('deskripsi'),
					'foto'                  => $upload_gambar['upload_data']['file_name'],
					'status'      			=> $this->input->post('status'),
				);
				$this->m_menu->simpan_add($data);
				$this->session->set_flashdata('success', 'Data Telah Ditambahkan');
				redirect(base_url('backend/data_master/Menu/index'), 'refresh');
			}
		}
	}

	//Edit Data Fasilitas
	public function edit($id_menu)
	{
		$data = array(
			'judul'             => 'EDIT DATA MENU',
			'halaman'           => 'backend/data_master/menu/v_edit',
		);
		// Ambil Detail Fasilitas
		$data['isi_form'] = $this->m_menu->getWhere($id_menu);
		$this->load->view('backend/template', $data);
	}

	function proses_edit()
	{
		$id_menu = $this->input->post('id_menu');

		// Validasi Input
		$valid = $this->form_validation;


		$valid->set_rules(
			'nama',
			'Nama Menu',
			'required',
			array(
				'required'          => '%s Harus Diisi',
			)
		);

		$valid->set_rules(
			'harga',
			'Harga Fasilitas',
			'required',
			array(
				'required'          => '%s Harus Diisi',
			)
		);

		$valid->set_rules(
			'deskripsi',
			'Deskripsi Menu',
			'required',
			array(
				'required'          => '%s Harus Diisi',
			)
		);

		if ($valid->run() == FALSE) {
			$this->edit($id_menu);
			// End Validasi Input
		} else {
			// Falidasi Foto Jika Diganti
			if (!empty($_FILES['foto']['name'])) {
				// Falidasi Foto
				$config['upload_path']          = './assets/img/asli/';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['max_size']             = '3000';
				$config['max_width']            = '3000';
				$config['max_height']           = '3000';

				$this->load->library('upload');
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('foto')) {
					$this->session->set_flashdata('error', 'Foto Gagal Di Upload');
					$this->edit($id_menu);
					// End Validasi Input
				} else {
					// Ambil Detail Fasilitas
					$isi = $this->m_menu->getWhere($id_menu);

					// Delete Foto di Tbl Fasilitas
					if ($isi->foto != '') {
						unlink('./assets/img/asli/' . $isi->foto);
						unlink('./assets/img/thumbnail/' . $isi->foto);
					}
					// End Delete Foto di Tbl Fasilitas

					// Falidasi Foto
					$upload_gambar = array('upload_data' => $this->upload->data());

					// Create thumbnail
					$config['image_library']        = 'gd2';
					$config['source_image']         = './assets/img/asli/' . $upload_gambar['upload_data']['file_name'];

					// Lokasi folder thumbnail
					$config['new_image']            = './assets/img/thumbnail/';
					$config['create_thumb']         = TRUE;
					$config['maintain_ratio']       = TRUE;
					$config['width']                = 1000;
					$config['height']               = 1500;
					$config['thumb_marker']         = '';

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					// End create thumbnail

					//Masuk Database Fasilitas
					$data = array(
						'id_menu'          		=> $id_menu,
						'nama'        			=> $this->input->post('nama'),
						'harga'                 => $this->input->post('harga'),
						'deskripsi'             => $this->input->post('deskripsi'),
						'foto'                  => $upload_gambar['upload_data']['file_name'],
						'status'      			=> $this->input->post('status'),
					);
					$this->m_menu->simpan_edit($id_menu, $data);
					$this->session->set_flashdata('success', 'Data Telah Di Update');
					redirect(base_url('backend/data_master/Menu/index'), 'refresh');
				}
			} else {
				//Masuk Database Fasilitas
				$data = array(
					'id_menu'          		=> $id_menu,
					'nama'        			=> $this->input->post('nama'),
					'harga'                 => $this->input->post('harga'),
					'deskripsi'             => $this->input->post('deskripsi'),
					'status'      			=> $this->input->post('status'),
				);
				$this->m_menu->simpan_edit($id_menu, $data);
				$this->session->set_flashdata('success', 'Data Telah Di Update');
				redirect(base_url('backend/data_master/Menu/index'), 'refresh');
			}
		}
	}

	// Delete Data Fasilitas
	public function delete($id_menu)
	{
		// Ambil Detail Fasilitas
		$isi = $this->m_menu->getWhereDeleteFoto($id_menu);

		// Delete Foto di Tbl Fasilitas
		if ($isi->foto != '') {
			unlink('./assets/img/asli/' . $isi->foto);
			unlink('./assets/img/thumbnail/' . $isi->foto);
		}
		// End Delete Foto di Tbl Fasilitas 

		// Delete data di tabel fasilitas
		$this->m_menu->delete($id_menu);
		$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
		redirect(base_url('backend/data_master/Menu/index'), 'refresh');
	}
}
