<?php
    class Controller {
        // Función para la carga del modelo requerido por una vista específica
        public function model($model) {
            require_once '../app/models/'.$model.'.php';
            return new $model();
        }

        // Función para la carga de la vista solicitada por el usuario
        public function view($url, $data = []) {
            if(file_exists('../app/views/'.$url.'.php')){
                require_once '../app/views/'.$url.'.php';
            } else {
                echo '<script language="javascript">';
                    echo 'alert("View is missing.")';
                echo '</script>';
            }
        }
    }
?>