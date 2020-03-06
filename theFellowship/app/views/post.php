<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metaetiquetas requeridas -->
    <meta charset="UTF-8">
    <meta name="description" content="Post- Screen">
    <meta name="author" content="Berenice Mendoza Sanlúcar">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Referencia al código de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Referencia al código de jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <!-- Código para la validación de los campos en el formulario -->
    <script type="text/javascript">
        "use strict";
        (function() {
            window.addEventListener("load", function() {
                var forms = document.getElementsByClassName("needs-validation");
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener("submit", function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add("was-validated");
                    }, false);
                });
            }, false);
        })();
    </script> 
    
    <title><?php echo $data['title']?></title>
</head>
<body>
    <!-- Archivos opcionales de JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Inclusión de la barra de navegación -->
    <?php require APPROOT . '/views/baseStructure/inside-navbar.php'?>

    <!-- Código de implementación del formulario de publicaciones -->
    <section class="p-5 m-5">
        <div>
            <h2 class="text-center"><?php echo $data['topMessage']?></h2>
        </div>
        <div class="container bg-info p-3 rounded" style="width: 500px" > 
            <div>
                <h4 class="text-white"><?php echo $data['username']?></h4>
            </div>
            <form action="<?php 
                if(empty($data['post'])) {
                    echo $data['postAction'];
                } else {
                    echo URLROOT; ?>/editPost/<?php echo $data['post']->postID;
                } ?>"
            method="POST" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="inputPost" class="text-white"><?php echo $data['description']?></label>
                    <textarea name="post" class="form-control" id="inputPost" rows="6" required maxlength="400"><?php 
                    if(empty($data['post'])) {
                        echo '';
                    } else {
                        echo $data['post']->post;
                    }?>
                    </textarea>
                    <div class="invalid-feedback">
                        <?php echo $data['postError']?>
                    </div>
                </div>
                <div class="text-center"> 
                    <button type="submit" class="btn border border-white text-white mt-3">Post</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Inclusión del pie de página -->
    <?php require APPROOT . '/views/baseStructure/footer.php'?>
</body>
</html>