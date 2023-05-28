<?php include("../../templates/header.php")   ?>
<?php include("../../db.php") ?>

<?php

if ($_POST) {
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "";
    echo $apellido;
    $identificacion = isset($_POST["identificacion"]) ? $_POST["identificacion"] : "";
    $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
    $contrasenia = isset($_POST["contrasenia"]) ? $_POST["contrasenia"] : "";

    $sentence = $conexion->prepare("insert into usuarios (id,nombre,apellido,identificacion,correo,contrasenia) values (null,:nombre,:apellido,:identificacion,:correo,:contrasenia)");

    $sentence->bindParam(":nombre", $nombre);
    $sentence->bindParam(":apellido", $apellido);
    $sentence->bindParam(":identificacion", $identificacion);
    $sentence->bindParam(":correo", $correo);
    $sentence->bindParam(":contrasenia", $contrasenia);
    $sentence->execute();

    header("location:index.php");
}



?>

<h2>Agregar nuevo usuario</h2>
<div class="card">
    <div class="card-header">
        Datos del nuevo usuario
    </div>
    <div class="card-body">
        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Nombres</label>
                <input required type="text" class="form-control" name="nombre" id="nombre-usuario" aria-describedby="helpId" placeholder="Ingrese nombre del usuario">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Apellido</label>
                <input required type="text" class="form-control" name="apellido" id="apellido-usuario" aria-describedby="helpId" placeholder="Ingrese apellido del usuario">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Número de identificacion</label>
                <input required type="text" class="form-control" name="identificacion" id="identificacion-usuario" aria-describedby="helpId" placeholder="Ingrese número identificación del usuario">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Correo electrónico</label>
                <input required type="email" class="form-control" name="correo" id="correo-usuario" aria-describedby="helpId" placeholder="Ingrese correo electrónico  del usuario">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">contraseña</label>
                <input required type="password" class="form-control" name="contrasenia" id="contraseña-usuario" aria-describedby="helpId" placeholder="Ingrese la contraseña del usuario">
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

</div>

<?php include("../../templates/footer.php")   ?>