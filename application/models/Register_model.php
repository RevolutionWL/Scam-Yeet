<?php 
class Register_model extends CI_Model {

    function insert($data) {

        $this->db->insert('register', $data);
        return $this->db->insert_id();
    }

    function verifies($key){

        $this->db->where('verification_key', $key);
        $this->db->where('verified', 'no');
        $query = $this->db->get('register');

        if($query->num_rows() > 0) {

            $data = array(
                'verified'  =>   'yes'
            );
            $this->db->where('verification_key', $key);
            $this->db->update('register', $data);
            return true;

        }
        else {

            return false;

        }

    }

}