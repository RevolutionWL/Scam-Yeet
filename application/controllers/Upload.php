<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Upload extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('video_model');
        $this->load->library('form_validation');
        
    }

    public function index() {
        if($this->session->userdata('id')) {

            $this->load->view('upload', array('error' => ' ' ));
        }

        else {

            redirect('home');

        }
    }
    
    
    public function do_upload(){

        $this->form_validation->set_rules('vid_title', 'Title', 'required');
        $this->form_validation->set_rules('vid_desc', 'Description', 'required');

        if ($this->form_validation->run()) {

            //file upload code 
            //set file upload settings 
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'flv|mp4|3gp|mov|avi|wmv';
            $config['max_size']             = '';
            $config['max_width']            = '';
            $config['max_height']           = '';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('video')) {

                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload', $error);

            }
            else {

                    $this->db->where('id', $this->session->userdata('id'));
                    $info = $this->db ->get('register')->row_array();
                
                    $upload_video = $this->upload->data();
                    $data = array (
                        'title'         =>  $this->input->post('vid_title'),
                        'description'   =>  $this->input->post('vid_desc'),
                        'author'        =>  $info['name'],
                        'video'         =>  $upload_video['file_name']
                    );

                    //file is uploaded successfully
                    //now get the file uploaded data 
                    //get the uploaded file name

                    //store pic data to the db
                    $this->video_model->store_video($data);
                    redirect('allvideo');
                
            }
        }
        else {
            
            $this->index();

        }
    }
}
 ?>
