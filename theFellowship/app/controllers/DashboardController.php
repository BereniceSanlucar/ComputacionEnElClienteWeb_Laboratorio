<?php
    session_start();
    class DashboardController extends Controller {
        // Creación del arreglo con los datos a ser transmitidos hacia la vista
        private $data = [
            'title' => 'Home',
            'editIcon' => 'mode_edit',
            'deleteIcon' => 'delete',
            'posts' => ''
        ];

        // Constructor de la clase
        public function __construct() {
            $this->postModel = $this->model('Post');
        }

        // Función para mostrar la lista de publicaciones
        public function dashboard() {
            $this->data['posts'] = array_reverse($this->postModel->getPosts());
            $this->view('dashboard', $this->data);
        }
    }
?>