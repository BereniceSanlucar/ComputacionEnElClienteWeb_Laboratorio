<?php
    class Post {
        // Referencia a la base de datos
        private $db;

        // Constructor de la clase
        public function __construct() {
            $this->db = new Database;
        }

        // Función para guardar una publicación en la base de datos
        public function savePost($data) {
            $this->db->query('INSERT INTO Posts (username, role, post) VALUES(:username, :role, :post)');
        
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':role', $data['role']);
            $this->db->bind(':post', $data['post']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Función para recuperar una publicación dado su id
        public function getPostById($id) {
            $this->db->query("SELECT * FROM Posts WHERE postID = :id");
      
            $this->db->bind(':id', $id);
            
            $row = $this->db->single();
      
            return $row;
        }

        // Función para editar una publicación
        public function updatePost($data) {
            $this->db->query('UPDATE Posts SET post = :post WHERE postID = :id');
        
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':post', $data['post']);
                
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    
        // Función para eliminar una publicación
        public function deletePost($id) {
            $this->db->query('DELETE FROM Posts WHERE postID = :id');
        
            $this->db->bind(':id', $id);
                
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // Función para recuperar todas las publicaciones de la base de datos
        public function getPosts() {
            $this->db->query("SELECT * FROM Posts");
        
            $results = $this->db->resultset();
        
            return $results;
        }
    }
?>