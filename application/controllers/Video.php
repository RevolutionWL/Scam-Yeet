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

        $id = $this->uri->segment(3);
        $this->db->where('vid_id',$id);
        $vid = $this->db->get('video')->row_array();

        $this->session->set_userdata($vid);

        if (file_exists("./uploads/".$_SESSION['video'])) {


            $this->load->view('video');

        }
        else {

            $this->load->view('novideo');

        }

    }  
    

    public function download() {

        $content = file_get_contents(base_url().'uploads/'.$_SESSION['video']);
        force_download($_SESSION['title'].$_SESSION['type'], $content);

    }
}