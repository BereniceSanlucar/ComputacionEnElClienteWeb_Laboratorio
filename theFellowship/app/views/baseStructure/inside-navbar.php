<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metaetiquetas requeridas -->
    <meta charset="UTF-8">
    <meta name="description" content="Inside-Navbar - Piece">
    <meta name="author" content="Berenice Mendoza Sanlúcar">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Código de actualización del elemento seleccionado -->
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery(".navbar-nav a").filter(function() {
                return this.href==location.href
            }).parent().addClass('active').siblings().removeClass('active')
        });
    </script>

    <title>Inside-Navbar</title>
</head>
<body>
    <!-- Código de implementación de la barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <h2 class="navbar-brand font-weight-bold"><?php echo SITENAME?></h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link mt-2" href="<?php echo URLROOT; ?>/dashboard">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-2" href="<?php echo URLROOT; ?>/post">Post</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/signIn">
                        <button type="button" class="btn border border-white text-white">Sign Out</button>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>