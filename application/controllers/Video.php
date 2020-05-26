<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Video extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('video_model');
        $this->load->library('form_validation');
        
    }

    public function index() {
        $this->load->view('video');
    }

    public function play() {

        $vid = $this->uri->segment(3);
        $this->db->where('video',$vid);
        $data = $this->db->get('video')->row_array();

        $this->load->view('video',$data);

    }
}