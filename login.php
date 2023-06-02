<?php
include("./db.php");
session_start();
if ($_POST) {
    $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
    $contrasenia = isset($_POST["contrasenia"]) ? $_POST["contrasenia"] : "";
    $sentence = $conexion->prepare("select * from usuarios where correo=? and contrasenia=?");
    $sentence->execute([$correo, $contrasenia]);
    $result = $sentence->fetch();
    if ($result) {
        $_SESSION["nombre_usuario"] = $result["nombre"];
        $_SESSION["correo_usuario"] = $result["correo"];
        $_SESSION["id_usuario"] = $result["id"];
        $_SESSION["login_usuario"] = true;
        header("location:index.php");
    } else {
        $mensaje = "Este usuario no está registrado en la aplicación";
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container">


        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <br>
                <br>
                <div class="card">
                    <img class="bg-img" src="http://cedesarrollocomfenalco.edu.co/sitio/wp-content/uploads/2020/07/cropped-logo-1-300x81.jpg" alt="logo" style="height: 100px;margin-left:10px;">
                    <br>
                    <div class="card-header">
                    </div>
                    <div class="card-body">

                        <?php if (isset($mensaje)) { ?>

                            <div class="alert alert-danger" role="alert">
                                <strong><?php echo $mensaje; ?></strong>
                            </div>

                        <?php } ?>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Correo</label>
                                <input type="email" class="form-control" name="correo" id="" aria-describedby="helpId" placeholder="Ingrese su correo electrónico">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="contrasenia" id="" aria-describedby="helpId" placeholder="Ingrese su contraseña">
                            </div>
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </form>
                        <br>
                        <a href="http://localhost:8080/app_php/app_php_smc/secciones/usuarios/recoveryAccont.php">¿ He olvidado mi contraseña ?</a>
                    </div>

                </div>
            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>