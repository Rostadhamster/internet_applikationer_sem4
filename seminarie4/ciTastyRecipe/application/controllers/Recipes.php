<?php
    class Recipes extends CI_Controller{
        
        public function index(){
            $data['title'] ='Välj ditt recept!';
            
            $this->load->view('templates/header');
            $this->load->view('recipes/index', $data);
            $this->load->view('templates/footer');
        }
        
  //--------------------------------------------------------------------------------------------------------------------------------- 
        
        public function view($page = 'index'){
            if(!file_exists(APPPATH.'views/recipes/'.$page.'.php')){
              show_404();
            }
            
            $data['recipe_id'] = $page;
            $data['title'] = ucfirst($page);
            $data['comments'] = $this->recipe_model->get_comments($page);
            $this->session->set_userdata('recipe_id', $page);
            
            
            $this->load->view('templates/header');
            $this->load->view('recipes/'.$page, $data);
            $this->load->view('recipes/comments');
            $this->load->view('templates/footer');
        }
        
  //--------------------------------------------------------------------------------------------------------------------------------- 
        
        public function create(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $this->recipe_model->create_comment($this->session->userdata('recipe_id'));
                
                //$this->recipe_model->create_comment();
                //redirect('recipes/index');
        }
        
  //--------------------------------------------------------------------------------------------------------------------------------- 
        
        public function delete($id){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
                        
            $this->recipe_model->delete_comment($id);
  
        }
        
 //---------------------------------------------------------------------------------------------------------------------------------
        
        public function retrive(){
            
            $result = $this->recipe_model->get_comments($this->session->userdata('recipe_id'));
            //$result = $this->recipe_model->get_comments($page);
            echo json_encode($result);
        }
        
 //---------------------------------------------------------------------------------------------------------------------------------
        
    }