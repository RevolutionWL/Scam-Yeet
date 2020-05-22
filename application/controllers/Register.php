<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('register_model');
        $this->load->helper('captcha');
    }

    // Function to check password strength (must consist number,uppercase,lowercase and symbol)
    public function password_check($str) {
        
        if (preg_match('#[0-9]#', $str) && preg_match('#[a-z]#', $str) && preg_match('#[A-Z]#', $str) && preg_match('#[\W]#', $str)) {
            return TRUE;

        }

        return FALSE;

    }

    public function index() {

        if($this->session->userdata('id')) {

            redirect('home');
        }

        // Captcha configuration
        $config = array(
            'img_path'      => 'Icaptcha/',
            'img_url'       => base_url().'Icaptcha/',
            'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '160',
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 30,
            'pool'          =>  'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',
            'colors'        => array(
                                        'background' => array(0, 0, 0),
                                        'border' => array(255, 255, 255),
                                        'text' => array(255, 255, 255),
                                        'grid' => array(255, 40, 40)
                                    )
        );

        $captcha = create_captcha($config);

        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);

        // Pass captcha image to view
        $data['captchaImg'] = $captcha['image'];

        // Load the view
        $this->load->view('register', $data);

    }


    public function validation() {

        // Check that username field is not empty and unique (trim - remove whitespace before and after)
        $this->form_validation->set_rules('user_name', 'Name', 'required|trim|is_unique[register.name]');
        // Check that email field is not empty, valid(xx@xx.com) and unique
        $this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email|is_unique[register.email]');
        /*
            Check that password field is not empty and strong 
            If password is not strong, an error message is set for it 
        */
        $this->form_validation->set_rules('user_pass', 'Password', 'required|callback_password_check', 
                                            array('password_check' => 'Must contain a number, uppercase, lowercase & symbol'));

        if($this->form_validation->run()) {

            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
    
            if($inputCaptcha === $sessCaptcha) {

                $verification_key = md5(rand());
                $hashed_password = password_hash($this->input->post('user_pass'),PASSWORD_BCRYPT);
                $data = array (
                    'name'              => $this->input->post('user_name'),
                    'email'             => $this->input->post('user_email'),
                    'password'          => $hashed_password,
                    'verification_key'  => $verification_key
                );
                $id = $this->register_model->insert($data);

                if($id > 0) {

                    $subject = "Verify your account";
                    $message = "<p>Howdy ".$this->input->post('user_name')."!</p>
                                <p>Verify your account 
                                <a href='".base_url()."register/verifies/".$verification_key."'>here</a></p>";

                    $config = array(
                        'protocol'      =>  'smtp',
                        'smtp_host'     =>  'ssl://smtp.gmail.com',
                        'smtp_port'     =>  465,
                        'smtp_user'     =>  'revotube.assist@gmail.com',
                        'smtp_pass'     =>  'INFS3202',
                        'newline'       =>  "\r\n",
                        'mailtype'      =>  'html',
                        'smtp_timeout'  =>  60,
                        'charset'       =>  'iso-8859-1',
                        'wordwrap'      =>  TRUE
                    );
                    $this->load->library('email', $config);
                    $this->email->from('','Sebastian @ RevoTube_Support');
                    $this->email->to($this->input->post('user_email'));
                    $this->email->subject($subject);
                    $this->email->message($message);


                    if($this->email->send()) {
                        
                        $this->session->set_flashdata('message', 'We\'ve sent you an email! <br>
                        Check your inbox for the verification email and link!');
                        redirect('register');

                    }
                    else {

                        show_error($this->email->print_debugger());
                        return false;

                    }
        
                }
            }
            else {

                $this->session->set_flashdata('error', 'Wrong Captcha!');
                redirect('register');
                
            }
        }
        else {

            $this->index();

        }
    }


    public function refresh() {

        $config = array(
            'img_path'      => 'Icaptcha/',
            'img_url'       => base_url().'Icaptcha/',
            'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '160',
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 30,
            'pool'          =>  'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',
            'colors'        => array(
                                        'background' => array(0, 0, 0),
                                        'border' => array(255, 255, 255),
                                        'text' => array(255, 255, 255),
                                        'grid' => array(255, 40, 40)
                                    )
        );
        //Create another captcha
        $captcha = create_captcha($config);
            
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);
                        
        // Pass captcha image to view
        $data['captchaImg'] = $captcha['image'];
        echo $captcha['image'];

    }
    
    public function verifies() {

        if($this->uri->segment(3)) {

            $verifies_key = $this->uri->segment(3);
            
            if($this->register_model->verifies($verifies_key)) {

                $data["message"] = "<h1 align='center'> Your email has
                                    been verified, you can now log in 
                                    from <a href='".base_url()."login'>here</a>
                                    </h1>";

            }
            else {

                $data["message"] = "<h1 align=center> Email has already
                                    been verified.
                                    <br>
                                    You can log in your account 
                                    <a href='".base_url()."login'>here</a
                                    ></h1>";
                
            }

            $this->load->view('email_verification', $data);

        }
        else {

            //Redirect to somewhere with message of something

        }

    }
    
}