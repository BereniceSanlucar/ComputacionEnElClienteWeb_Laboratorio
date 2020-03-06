<?php
    class SignUpController extends Controller {
        // Creación del arreglo con los datos a ser transmitidos hacia la vista
        private $data = [
            'title' => 'Sign Up',
            'signUpAction' => URLROOT . '/signUp',
            'topMessage' => 'Join Us',
            'description' => "Make the most of your free time.",
            'username' => 'Username',
            'usernamePrefix' => '@',
            'usernameError' => 'Please provide a username.',
            'email' => 'Email',
            'emailError' => 'Please provide a valid email.',
            'password' => "Password",
            'passwordError' => 'Please provide a password with exactly 8 characters.',
            'role' => "Role",
            'roleDescription' => 'Choose which role you want to play',
            'elfRole' => 'Elf',
            'hobbitRole' => 'Hobbit',
            'humanRole' => 'Human',
            'dwarfRole' => 'Dwarf',
            'roleError' => 'Please choose a role.'
        ];

        // Constructor de la clase
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        // Función para orquestar el registro de usuario
        public function signUp() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $temp = [
                    'username' => '@' . trim($POST['username']),
                    'email' => trim($POST['email']),
                    'password' => trim($POST['password']),
                    'role' => trim($POST['role'])
                ];

                if(isset($temp['username']) && isset($temp['email']) && isset($temp['password']) && isset($temp['role'])) {
                    if($this->userModel->findUsername($temp['username'])) {
                        echo '<script language="javascript">';
                            echo 'alert("This username is already taken.")';
                        echo '</script>';
                    } elseif($this->userModel->findEmail($temp['email'])) {
                        echo '<script language="javascript">';
                            echo 'alert("This email is already taken.")';
                        echo '</script>';
                    } else {
                        $temp['password'] = password_hash($temp['password'], PASSWORD_DEFAULT);
                        if($this->userModel->saveUser($temp)) {
                            redirect('signIn');
                        } else {
                            echo '<script language="javascript">';
                                echo 'alert("Something went wrong.")';
                            echo '</script>';
                        }
                    }
                }
            } 
            $this->view('signUp', $this->data);
        }

        // Función para construir el controlador de inicio de sesión
        public function signIn() {
            $init = new Core();
            $init->setController();
        }
    }
?>