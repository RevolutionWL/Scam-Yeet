<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Allvideo extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('video_model');
        $this->load->library('form_validation');
        
    }

    public function index()
    {

        $data['vid_list'] = $this->video_model->get_all_vid();
        
        $this->load->view('allvideo', $data);

    }
}