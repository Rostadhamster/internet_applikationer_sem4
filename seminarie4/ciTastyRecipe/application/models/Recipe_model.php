<?php
    class Recipe_model extends CI_Model{
       
        public function __construct(){
            $this->load->database();
        }
        
  //---------------------------------------------------------------------------------------------------------------------------------   
        
        public function get_comments($recipe_id){
    
            $this->db->order_by('comments.id', 'DESC');
            
            $query = $this->db->get_where('comments', array('recipe_id' => $recipe_id));
            
            return $query->result_array();
            
        }
        
  //--------------------------------------------------------------------------------------------------------------------------------- 
        
        public function create_comment($recipe_id){
            
            $data = array(
                'message' => $this->input->post('message'),
                'recipe_id' => $recipe_id,
                'name' => $this->session->userdata('username'),
                'user_id' => $this->session->userdata('user_id')
                
            );
            
            $data = $this->security->xss_clean($data);
            
            return $this->db->insert('comments', $data);
        }
        
  //--------------------------------------------------------------------------------------------------------------------------------- 
        
        public function delete_comment($id){
            
            $this->db->delete('comments', array('id' => $id)); 
        }
    }