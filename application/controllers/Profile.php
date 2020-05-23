<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('register_model');


    }

    public function index() {


        if($this->session->userdata('id')) {

            $this->db->where('id', $this->session->userdata('id'));
            $info = $this->db ->get('register')->row_array();
            // $data = array(
            //     "profile"   =>  'yes'
            // );
            // $this->db->update('register', $data);

            $this->load->view('profile',$info);
        }
        else {

            redirect('home');

        }

    }

    public function save() {

        $this->form_validation->set_rules('contact', 'contact', 'numeric');

        if ($this->form_validation->run()) {
            $data = array (
                'firstname' => $this->input->post('firstname'),
                'lastname'  => $this->input->post('lastname'),
                'contact'   => $this->input->post('contact'),
                'profile'   => 'yes'
            );

            $this->register_model->update($data);

            redirect('profile');
        }
        else {

            $this->index();

        }

    }
}
?>