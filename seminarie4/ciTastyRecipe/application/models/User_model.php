<?php
     class User_model extends CI_Model{
        public function register($enc_password){
            // User data array
            $data = array(
                'name' => $this ->input->post('name'),
                'username' => $this ->input->post('username'),
                'password' => $enc_password,            
            );
            
            $data = $this->security->xss_clean($data);
            // Insert user
            return $this->db->insert('users', $data);
        }
         
         public function check_username_exists($username){
            $query = $this->db->get_where('users', array('username'=> $username));
            if(empty($query->row_array())){
                return true;
            }
            else{
                return false;
            }
        }
         
         public function login($username, $password){
        // Validate
            $this->db->where('username', $username);
            $result = $this->db->get('users');
            $row = $result->row_array();
    
            if(password_verify($password,$row['password'])&&($result->num_rows() == 1)){
  				return $result->row(0)->id;
            }
            else {return false;}
            }
     }