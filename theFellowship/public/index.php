<!-- Carga de archivos de alta prioridad, e inicialización de la clase Core -->
<?php
  require_once('../app/requireFiles.php');
  $init = new Core();
  $init -> setController();
?>