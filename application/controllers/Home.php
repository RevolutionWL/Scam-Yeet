<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('video_model');

    }

    public function index() {

        $info['vid_list'] = $this->video_model->get_all_vid();      
        $this->load->view('home', $info);

    }

    public function logout() {


        $this->session->sess_destroy();
    
        redirect('home');



    }
    

}
?>
