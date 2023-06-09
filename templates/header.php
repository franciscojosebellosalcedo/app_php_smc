<!doctype html>
<html lang="en">

<head>
    <title>App SMC</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<?php
session_start();
if (!isset($_SESSION["nombre_usuario"])) {
    header("location: login.php");
}

$urlRoot = "http://localhost:8080/app_php/app_php_smc/"

?>

<body>

    <nav class="navbar navbar-expand navbar-light bg-light " style="display:flex;justify-content:space-between;align-items:center;">
        <img class="bg-img" src="http://cedesarrollocomfenalco.edu.co/sitio/wp-content/uploads/2020/07/cropped-logo-1-300x81.jpg" alt="logo" style="height: 60px;margin-left:10px;">

        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo $urlRoot ?>" aria-current="page">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $urlRoot; ?>secciones/tecnicos/index.php">Técnicos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $urlRoot; ?>secciones/computadores/index.php">Computadores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $urlRoot; ?>secciones/usuarios/index.php">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $urlRoot; ?>secciones/mantenimientos/index.php">Mantenimientos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:cerrarSesion()">Cerrar sesion</a>
            </li>
        </ul>
    </nav>

    <script>
        function cerrarSesion() {
            Swal.fire({
                title: '¿<?php echo $_SESSION["nombre_usuario"]?> deseas cerrar sesion?',
                showCancelButton: true,
                confirmButtonText: 'Si',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?php echo $urlRoot."cerrar.php"?>";
                }
            })
        }
    </script>

    <br>
    <br>


    <main class="container">