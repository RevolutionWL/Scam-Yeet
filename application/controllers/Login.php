<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('login_model');


    }

    public function index() {
        
        if($this->session->userdata('id')) {

            redirect('home');
        }
        else {

            $this->load->view('login');

        }

    }

    public function validation() {

        $this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('user_pass', 'Password', 'required');

        if($this->form_validation->run()) {

            $email  =   $this->input->post('user_email');
            $pass   =   $this->input->post('user_pass');

            $result = $this->login_model->validate_user($email,$pass);

            if($result == '') {

                if ($this->input->post("setremember"))
                {

                    $this->input->set_cookie('email', $email, 0); /* Create cookie for store emailid */
                    $this->input->set_cookie('password', $pass, 0); /* Create cookie for password */
                    
                }
                else
                {

                    delete_cookie('email'); /* Delete email cookie */
                    delete_cookie('password'); /* Delete password cookie */
                    
                }

                $this->db->where('id', $this->session->userdata('id'));
                $info = $this->db ->get('register')->row_array();
                
                if($info['profile'] == 'no') {
    
                    redirect('profile');
    
                }
                else {

                    redirect('home');

                }

            }
            else {
                
                $this->session->set_flashdata('error', $result);
                redirect('login');

            }

        }
        else {

            $this->index();

        }

    }

}