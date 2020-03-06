<!-- Carga de archivos de alta prioridad para la aplicación -->
<?php
    require_once 'master/Core.php';
    require_once 'master/Controller.php';
    require_once 'config/config.php';
    require_once 'helpers/urlHelper.php';

    spl_autoload_register(function ($className) {
        require_once 'master/'. $className . '.php';
    });
?>