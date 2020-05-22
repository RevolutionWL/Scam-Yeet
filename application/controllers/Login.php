<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('login_model');


    }

    function index() {
        if($this->session->userdata('id')) {

            redirect('home');
        }
        else {

            $this->load->view('login');

        }

    }

    function validation() {

        $this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('user_pass', 'Password', 'required');

        if($this->form_validation->run()) {

            $result = $this->login_model->validate_user($this->input->post('user_email'),$this->input->post('user_pass'));

            if($result == '') {

                redirect('home');

            }
            else {
                
                $this->session->set_flashdata('message', $result);
                redirect('login');

            }

        }
        else {

            $this->index();

        }

    }

}