<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metaetiquetas requeridas -->
    <meta charset="UTF-8">
    <meta name="description" content="Sign Up - Screen">
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
    <?php require APPROOT . '/views/baseStructure/outside-navbar.php'?>

    <!-- Código de implementación del formulario de registro -->
    <section class="p-5">
        <div>
            <h2 class="text-center"><?php echo $data['topMessage']?></h2>
            <p class="text-center text-secondary"><?php echo $data['description']?></p>
        </div>
        <form action="<?php echo $data['signUpAction']?>" method="POST" class="container border border-info p-3 rounded needs-validation" style="width: 500px" novalidate>
            <div class="form-group">
                <label for="inputUsername"><?php echo $data['username']?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><?php echo $data['usernamePrefix']?></span>
                    </div>
                    <input name="username" type="text" class="form-control rounded-right" id="inputUsername" required>
                    <div class="invalid-feedback">
                        <?php echo $data['usernameError']?>
                    </div>
                </div>
            </div>
            <div class="form-group" >
                <label for="inputEmail"><?php echo $data['email']?></label>
                <input name="email" type="email" class="form-control" id="inputEmail" required>
                <div class="invalid-feedback">
                    <?php echo $data['emailError']?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword"><?php echo $data['password']?></label>
                <input name="password" type="password" class="form-control" id="inputPassword" required minlength="8" maxlength="8">
                <div class="invalid-feedback">
                    <?php echo $data['passwordError']?>
                </div>
            </div>
            <div>
                <label for="selectRole"><?php echo $data['role']?></label>
                <select name="role" class="custom-select mr-sm-2" id="selectRole" required>
                    <option selected disabled value><?php echo $data['roleDescription']?></option>
                    <option value="elf"><?php echo $data['elfRole']?></option>
                    <option value="hobbit"><?php echo $data['hobbitRole']?></option>
                    <option value="human"><?php echo $data['humanRole']?></option>
                    <option value="dwarf"><?php echo $data['dwarfRole']?></option>
                </select>
                <div class="invalid-feedback">
                    <?php echo $data['roleError']?>
                </div>
            </div>
            <div class="text-center"> 
                <button type="submit" class="btn btn-info mt-3"><?php echo $data['title']?></button>
            </div>
        </form>
    </section>

    <!-- Inclusión del pie de página -->
    <?php require APPROOT . '/views/baseStructure/footer.php'?>
</body>
</html>