<?php include("../../templates/header.php")   ?>
<?php include("../../db.php")   ?>

<?php 
$result=[];
if($_GET){
  $id=intval(isset($_GET["id"])?$_GET["id"]:"");
  $sentence=$conexion->prepare("select * from tecnicos where id=:id");
  $sentence->bindParam(":id",$id);
  $sentence->execute();
  $result=$sentence->fetch();
}

if($_POST){
  $id=intval(isset($_POST["id"])?$_POST["id"]:"");
  $nombres = isset($_POST["nombres"]) ? $_POST["nombres"] : "";
  $apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"] : "";
  $identificacion = isset($_POST["identificacion"]) ? $_POST["identificacion"] : "";
  $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
  $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
  $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
  $fecha_nacimiento = isset($_POST["fecha_nacimiento"]) ? $_POST["fecha_nacimiento"] : "";

  $sentence = $conexion->prepare("update tecnicos set nombres =?, apellidos = ?, identificacion= ?, correo= ?, direccion= ?, telefono= ?, fecha_nacimiento= ? where id=?");
  $sentence->execute([$nombres,$apellidos,$identificacion,$correo,$direccion,$telefono,$fecha_nacimiento,$id]);
  header("location:index.php");
}




?>


<h2>Editar técnico</h2>
<div class="card">
  <div class="card-header">
    Datos nuevos del técnico
  </div>
  <div class="card-body">
    <form action="edit.php" method="post" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="" class="form-label">Id</label>
        <input value="<?php echo $result["id"] ?>" type="text" class="form-control" name="id" id="id-tecnico" aria-describedby="helpId" readonly>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Nombres</label>
        <input value="<?php echo $result["nombres"] ?>" type="text" class="form-control" name="nombres" id="nombres-tecnico" aria-describedby="helpId" placeholder="Ingrese  nombres del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Apellidos</label>
        <input value="<?php echo $result["apellidos"] ?>" type="text" class="form-control" name="apellidos" id="apellidos-tecnico" aria-describedby="helpId" placeholder="Ingrese  apellidos del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Número de identificacion</label>
        <input value="<?php echo $result["identificacion"] ?>" type="text" class="form-control" name="identificacion" id="identificacion-tecnico" aria-describedby="helpId" placeholder="Ingrese número de identificacion del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Correo electrónico</label>
        <input value="<?php echo $result["correo"] ?>" type="email" class="form-control" name="correo" id="correo-tecnico" aria-describedby="helpId" placeholder="Ingrese correo del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Dirección</label>
        <input value="<?php echo $result["direccion"] ?>" type="text" class="form-control" name="direccion" id="direccion-tecnico" aria-describedby="helpId" placeholder="Ingrese dirección del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Número teléfono</label>
        <input value="<?php echo $result["telefono"] ?>" type="text" class="form-control" name="telefono" id="telefono-tecnico" aria-describedby="helpId" placeholder="Ingrese número de telefono del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Fecha nacimiento</label>
        <input value="<?php echo $result["fecha_nacimiento"] ?>" type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento-tecnico" aria-describedby="helpId" placeholder="Ingrese la fecha nacimientodel técnico">
      </div>

      <button type="submit" class="btn btn-success">Actualizar</button>
      <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
  </div>

</div>

<?php include("../../templates/footer.php")   ?>