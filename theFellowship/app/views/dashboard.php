<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metaetiquetas requeridas -->
    <meta charset="UTF-8">
    <meta name="description" content="Dashboard - Screen">
    <meta name="author" content="Berenice Mendoza Sanlúcar">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Referencia al código de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/theFellowship/public/css/styles.css?version=1.0">

    <!-- Referencia al código de jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <title><?php echo $data['title']?></title>
</head>
<body>
    <!-- Archivos opcionales de JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Inclusión de la barra de navegación -->
    <?php require APPROOT . '/views/baseStructure/inside-navbar.php'?>
    
    <!-- Código de implementación de la lista de publicaciones -->
    <section class="p-5">
        <div class="container">
            <div class="row justify-content-between">
                <?php foreach($data['posts'] as $post) : ?>
                    <div class="border bg-info rounded mb-3" style="width: 350px">
                        <div>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item bg-info border-info">
                                    <a 
                                    class="<?php if($post->username == $_SESSION['username']) {
                                        echo 'text-white'; 
                                    } else {
                                        echo 'text-muted';
                                    } ?>"
                                    href="<?php if($post->username == $_SESSION['username']) {
                                        echo URLROOT; ?>/edit/<?php echo $post->postID; 
                                    } else {
                                         echo '';
                                    } ?>">
                                        <i class="material-icons"><?php echo $data["editIcon"] ?></i>
                                    </a>
                                </li>
                                <li class="ml-auto list-group-item bg-info border-info">
                                    <a
                                    class="<?php if($post->username == $_SESSION['username']) {
                                        echo 'text-white'; 
                                    } else {
                                        echo 'text-muted';
                                    } ?>"
                                    href="<?php if($post->username == $_SESSION['username']) {
                                        echo URLROOT; ?>/delete/<?php echo $post->postID; 
                                    } else {
                                         echo '';
                                    } ?>">
                                        <i class="material-icons"><?php echo $data["deleteIcon"] ?></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="text-center">
                            <img class="rounded-circle" src="/theFellowship/public/image/<?php echo $post->role ?>.jpg" alt="" width="100" height="100">
                        </div>
                        <div>
                            <h5 class="text-center text-white font-weight-bold"><?php echo $post->username ?></h5>
                        </div>
                        <div class="mx-3">
                            <p class="text-justify font-weight-light text-white"><?php echo $post->post ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <!-- Inclusión del pie de página -->
    <?php require APPROOT . '/views/baseStructure/footer.php'?>
</body>
</html>