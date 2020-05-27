<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Video extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('video_model');
        $this->load->helper('download');
        $this->load->helper('file');
        
    }

    public function play() {

        $vid = $this->uri->segment(3);
        $this->db->where('video',$vid);
        $vid = $this->db->get('video')->row_array();
        $this->session->set_userdata($vid);

        $this->load->view('video');

    }  
    

    public function download() {

        $content = file_get_contents(base_url().'uploads/'.$_SESSION['video']);
        force_download($_SESSION['title'].$_SESSION['type'], $content);

    }
}