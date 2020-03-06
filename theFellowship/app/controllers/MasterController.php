<?php
    class MasterController extends Controller {
        // Creación del arreglo con los datos a ser transmitidos hacia la vista
        private $data = [
            'title' => 'Sign In',
            'signInAction' => URLROOT . '/signIn',
            'topMessage' => 'Welcome Back',
            'description' => "Don't miss this opportunity. Sign in to stay updated on the Middle-earth.",
            'email' => 'Email',
            'emailError' =>  'Please provide a valid email.',
            'password' => "Password",
            'passwordError' => 'Please provide a password with exactly 8 characters.'
        ];

        // Constructor de la clase
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        // Función para orquestar el inicio de sesión
        public function signIn() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $temp = [
                    'email' => trim($POST['email']),
                    'password' => trim($POST['password'])
                ];

                if(isset($temp['email']) && isset($temp['password'])) {
                    if(!($this->userModel->findEmail($temp['email']))) {
                        echo '<script language="javascript">';
                            echo 'alert("This email is not registered.")';
                        echo '</script>';
                    } elseif($this->userModel->authenticateUser($temp['email'], $temp['password'])) {
                        $this->createUserSession($temp);
                        return;
                    } else {
                        echo '<script language="javascript">';
                            echo 'alert("Incorrect password.")';
                        echo '</script>';
                    }
                }
            } 
            $this->view('signIn', $this->data);
        }

        // Función para crear la sesión de usuario
        public function createUserSession($temp) {
            session_start();
            $user = $this->userModel->getUserByEmail($temp['email']);
            $_SESSION['username'] = $user->username;
            $_SESSION['role'] = $user->role;
            redirect('dashboard');
        }

        // Función para construir el controlador de registro
        public function signUp() {
            $init = new Core();
            $init->setController('SignUpController', 'signUp');
        }

        // Función para construir el controlador central
        public function dashboard() {
            $init = new Core();
            $init->setController('DashboardController', 'dashboard');
        }

        // Función para construir el controlador de registro de publicaciones
        public function post() {
            $init = new Core();
            $init->setController('PostController', 'post');
        }

        // Función para prellenar el controlador de edición de publicaciones
        public function edit($id) {
            $init = new Core();
            $init->setController('PostController', 'edit', $id);
        }

        // Función para construir el controlador de edición de publicaciones
        public function editPost($id) {
            $init = new Core();
            $init->setController('PostController', 'editPost', $id);
        }

        // Función para llamar al controlador de eliminación de publicaciones
        public function delete($id) {
            $init = new Core();
            $init->setController('PostController', 'delete', $id);
        }

        // Función para destruir la sesión de usuario
        public function signOut() {
            $_SESSION = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            session_destroy();
            redirect("signIn");
        }
    }
?>