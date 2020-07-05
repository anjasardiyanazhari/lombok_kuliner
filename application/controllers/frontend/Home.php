<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
    }

    //Halaman Utama 
    public function index()
    {
        $data = array(
            'title'             => 'Lombok Kuliner',
            // 'sub_title'         => 'Lombok Kuliner',
            'halaman'           => 'frontend/home/v_wrapper',
        );
        $this->load->view('frontend/layout/v_wrapper', $data);
    }

    //Halaman Utama 
    public function about()
    {
        $data = array(
            'title'             => 'Lombok Kuliner',
            // 'sub_title'         => 'Lombok Kuliner',
            'halaman'           => 'frontend/home/v_about',
        );
        $this->load->view('frontend/layout/v_wrapper', $data);
    }

    //Halaman Utama 
    public function chef()
    {
        $data = array(
            'title'             => 'Lombok Kuliner',
            // 'sub_title'         => 'Lombok Kuliner',
            'halaman'           => 'frontend/home/v_chef',
        );
        $this->load->view('frontend/layout/v_wrapper', $data);
    }

    //Halaman Utama 
    public function contact()
    {
        $data = array(
            'title'             => 'Lombok Kuliner',
            // 'sub_title'         => 'Lombok Kuliner',
            'halaman'           => 'frontend/home/v_contact',
        );
        $this->load->view('frontend/layout/v_wrapper', $data);
    }
}
