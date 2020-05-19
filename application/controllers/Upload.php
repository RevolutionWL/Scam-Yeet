<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
        }

        public function index()
        {
                $this->load->view('upload', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'flv|mp4|3gp|mov|avi|wmv';
                $config['max_size']             = '';
                $config['max_width']            = '';
                $config['max_height']           = '';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('success', $data);
                }
        }
}
?>
