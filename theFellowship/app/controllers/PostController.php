<?php
    session_start();
    class PostController extends Controller {
        // Creación del arreglo con los datos a ser transmitidos hacia la vista
        private $data = [
            'title' => 'Post',
            'postAction' => URLROOT . '/post',
            'username' => '',
            'topMessage' => 'Post your thoughts',
            'description' => "Share your news on the middle-earth",
            'postError' => 'Please provide a thought',
            'post' => ''
        ];

        // Constructor de la clase
        public function __construct() {
            $this->postModel = $this->model('Post');
        }

        // Función para orquestar el registro de una nueva publicación en la base de datos
        public function post() {
            $this->data['username'] = $_SESSION['username'];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $temp = [
                    'username' => $_SESSION['username'],
                    'role' => $_SESSION['role'],
                    'post' => trim($POST['post'])
                ];

                if(isset($temp['username']) && isset($temp['role']) && isset($temp['post'])) {
                    if($this->postModel->savePost($temp)) {
                        redirect('dashboard');
                    } else {
                        echo '<script language="javascript">';
                            echo 'alert("Something went wrong.")';
                        echo '</script>';
                    }
                }
            }

            $this->view('post', $this->data);
        }

        // Función para orquestar la edición de una publicación en la base de datos
        public function editPost($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $temp = [
                    'id' => $id,
                    'username' => $_SESSION['username'],
                    'role' => $_SESSION['role'],
                    'post' => trim($POST['post'])
                ];

                if(isset($temp['username']) && isset($temp['role']) && isset($temp['post'])) {
                    if($this->postModel->updatePost($temp)) {
                        redirect('dashboard');
                    } else {
                        echo '<script language="javascript">';
                            echo 'alert("Something went wrong.")';
                        echo '</script>';
                    }
                }
            }
        }

        // Función para orquestar la edición de una publicación
        public function edit($id) {
            $this->data['post'] = $this->postModel->getPostById($id);
            $this->post();
        }

        // Función para orquestar la eliminación de una publicación
        public function delete($id) {
            if($this->postModel->deletePost($id)) {
                redirect('dashboard');
            } else {
                echo '<script language="javascript">';
                    echo 'alert("Something went wrong.")';
                echo '</script>';
            }
        }

        // Función para construir el controlador central
        public function dashboard() {
            $init = new Core();
            $init->setController('DashboardController', 'dashboard');
        }
    }
?>