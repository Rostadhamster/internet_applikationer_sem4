<?php
    class Users extends CI_Controller{
        public function register(){
            $data['title'] = 'Registrera';
            
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confrim Password', 'matches[password]');
            
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            }
            else{
                // Encrypt password
                $enc_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                
                $this->user_model->register($enc_password);
                
                //set message
                $this->session->set_flashdata('user_registered', 'You are now registered and can log in');
                
                redirect('users/login');
            }
        }
        
        public function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
            
            if($this->user_model->check_username_exists($username)){
                return true;                
            }
            else{
                return false;
            }
            
        }
        
        public function login(){
            $data['title'] = 'Logga in';
            
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            }
            else{
            // Get username
            $username = $this->input->post('username');
            $password = $this->input->post('password');
                
            $user_id = $this->user_model->login($username, $password);
                
            if($user_id){
                // create session
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true               
                );
                
                $this->session->set_userdata($user_data);
                
                //set message
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');
                
                redirect('home');
            }
            else{  
                //set message
                $this->session->set_flashdata('login_failed', 'Login failed');
                
                redirect('users/login');
            }

            }
        }
        
        public function logout(){
            // Unset user data
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');
            
            $this->session->set_flashdata('user_loggedout', 'You are now logged out');
                
            redirect('users/login');            
        }
    }