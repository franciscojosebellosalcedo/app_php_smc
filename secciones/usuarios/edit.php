<?php include("../../templates/header.php")   ?>
<?php include("../../db.php") ?>

<?php

$id = null;
$result=[];
if ($_GET) {
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $id = intval($id);
   
    $sentence = $conexion->prepare("select * from usuarios where id=:id");
    $sentence->bindParam(":id", $id);
    $sentence->execute();
    $result=$sentence->fetch();
}

if($_POST){
    $id = isset($_POST["id"]) ? $_POST["id"] : null;
    $id = intval($id);
    $nombre=isset($_POST["nombre"])?$_POST["nombre"]:"";
    $apellido=isset($_POST["apellido"])?$_POST["apellido"]:"";
    $identificacion=isset($_POST["identificacion"])?$_POST["identificacion"]:"";
    $correo=isset($_POST["correo"])?$_POST["correo"]:"";
    $contresenia=isset($_POST["contresenia"])?$_POST["contresenia"]:"";

    $sentence = $conexion->prepare("update usuarios set nombre = ?, apellido = ?, identificacion= ?, correo= ?, contrasenia= ?    where id=?");

    $sentence->execute([$nombre,$apellido,$identificacion,$correo,$contrasenia,$id]);
    header("location:index.php");

}

?>

<h2>Editar usuario</h2>
<div class="card">
    <div class="card-header">
        Datos nuevos del usuario
    </div>
    <div class="card-body">
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Id</label>
                <input required value="<?php echo $result["id"]?>" type="text" class="form-control" name="id" id="id-usuario" aria-describedby="helpId" readonly>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Nombres</label>
                <input required value="<?php echo $result["nombre"]?>" type="text" class="form-control" name="nombre" id="nombre-usuario" aria-describedby="helpId" placeholder="Ingrese nombre del usuario">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Apellido</label>
                <input required value="<?php echo $result["apellido"]?>" type="text" class="form-control" name="apellido" id="apellido-usuario" aria-describedby="helpId" placeholder="Ingrese apellido del usuario">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Número de identificacion</label>
                <input required value="<?php echo $result["identificacion"]?>" type="text" class="form-control" name="identificacion" id="identificacion-usuario" aria-describedby="helpId" placeholder="Ingrese número identificación del usuario">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Correo electrónico</label>
                <input required value="<?php echo $result["correo"]?>" type="email" class="form-control" name="correo" id="correo-usuario" aria-describedby="helpId" placeholder="Ingrese correo electrónico  del usuario">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">contraseña</label>
                <input required value="<?php echo $result["contrasenia"]?>" type="password" class="form-control" name="contrasenia" id="contraseña-usuario" aria-describedby="helpId" placeholder="Ingrese la contraseña del usuario">
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

</div>

<?php include("../../templates/footer.php")   ?>