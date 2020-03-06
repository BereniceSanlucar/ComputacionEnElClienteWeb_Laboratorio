<!-- Implementación del código de enrutamiento -->
<?php
    function redirect($page) {
        header('location: '.URLROOT.'/'.$page);
    }
?>