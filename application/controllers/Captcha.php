<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Captcha extends CI_Controller
{
    function __construct() {
        parent::__construct();
        
        // Load session library
        $this->load->library('session');
        
        // Load the captcha helper
        $this->load->helper('captcha');
    }
    
    public function index(){
        
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
        $this->load->view('captcha', $data);
    }

    public function check() {
       
        // If captcha form is submitted
        if($this->input->post('submit')){

            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');

            if($inputCaptcha === $sessCaptcha) {

                redirect('login');

            }
            else {

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
                $this->load->view('captcha', $data);
                echo 'Captcha code does not match, please try again.';

            }
        }
    }
    
    public function refresh(){
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
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Display captcha image
        echo $captcha['image'];
    }
}