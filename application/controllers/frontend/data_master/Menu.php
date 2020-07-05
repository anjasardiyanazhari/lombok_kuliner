<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/data_master/m_menu');
    }

    //Halaman Utama Pemesanan
    public function index()
    {
        // Ambil Total Fasilitas Di m_fasilitas
        $total = $this->m_menu->total_menu();

        // Start Pagination
        $this->load->library('pagination');

        $config['base_url']             = base_url() . 'frontend/data_master/Menu/index/';
        $config['total_rows']           = $total->total;
        $config['use_page_numbers']     = TRUE;
        $config['per_page']             = 9;
        $config['uri_segment']          = 5;
        $config['num_links']            = 9;

        // Style Pagination
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        // End Style Pagination 

        $config['first_url']            = base_url() . 'frontend/data_master/Menu/';

        $this->pagination->initialize($config);
        // End Pagination

        // // Ambil Data Fasilitas
        $page = ($this->uri->segment(5)) ? ($this->uri->segment(5) - 1) * $config['per_page'] : 0;
        $fasilitas_page = $this->m_menu->menu($config['per_page'], $page);

        $data = array(
            'title'             => 'Fasilitas Golden Care',
            'fasilitas_page'    => $fasilitas_page,
            'pagin'             => $this->pagination->create_links(),
            'halaman'           => 'frontend/Menu/v_list',
        );
        // Ambil Data Pemesanan chart_check
        $this->load->view('frontend/layout/v_wrapper', $data);
    }
}
