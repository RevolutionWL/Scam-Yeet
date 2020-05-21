<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {

        parent::__construct();
        if(!$this->session->userdata('id')) {

            redirect('login');

        }

    }

    function index() {

        $this->db->where('id', $this->session->userdata('id'));
        $info = $this->db ->get('register')->row_array();

        // echo '<h1 align= "center">Welcome '.$info['name'].'</h1>';
        // echo '<p align= "center"> PLEASE LOG OUT 
        //      <a href= "'.base_url().'home/logout"> HERE</a> NOW</p>';

        $this->load->view('home', $info);




    }

    function logout() {


        $this->session->unset_userdata($this->session->all_userdata());
    
        redirect('login');



    }
    

}
?>
