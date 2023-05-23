<?php include("../../templates/header.php")   ?>
<?php include("../../db.php")   ?>

<?php
if ($_POST) {
  $nombres = isset($_POST["nombres"]) ? $_POST["nombres"] : "";
  $apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"] : "";
  $identificacion = isset($_POST["identificacion"]) ? $_POST["identificacion"] : "";
  $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
  $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
  $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
  $fecha_nacimiento = isset($_POST["fecha_nacimiento"]) ? $_POST["fecha_nacimiento"] : "";

  $sentence = $conexion->prepare("insert into tecnicos 
  (id,nombres,apellidos,identificacion,correo,direccion,telefono,fecha_nacimiento) 
  values 
  (null,:nombres,:apellidos,:identificacion,:correo,:direccion,:telefono,:fecha_nacimiento)");
  $sentence->bindParam(":nombres",$nombres);
  $sentence->bindParam(":apellidos",$apellidos);
  $sentence->bindParam(":identificacion",$identificacion);
  $sentence->bindParam(":correo",$correo);
  $sentence->bindParam(":direccion",$direccion);
  $sentence->bindParam(":telefono",$telefono);
  $sentence->bindParam(":fecha_nacimiento",$fecha_nacimiento);
  $sentence->execute();
  header("location:index.php");


}


?>


<h2>Agregar nuevo técnico</h2>
<div class="card">
  <div class="card-header">
    Datos del nuevo técnico
  </div>
  <div class="card-body">
    <form action="add.php" method="post" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="" class="form-label">Nombres</label>
        <input type="text" class="form-control" name="nombres" id="nombres-tecnico" aria-describedby="helpId" placeholder="Ingrese  nombres del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" id="apellidos-tecnico" aria-describedby="helpId" placeholder="Ingrese  apellidos del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Número de identificacion</label>
        <input type="text" class="form-control" name="identificacion" id="identificacion-tecnico" aria-describedby="helpId" placeholder="Ingrese número de identificacion del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" name="correo" id="correo-tecnico" aria-describedby="helpId" placeholder="Ingrese correo del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Dirección</label>
        <input type="text" class="form-control" name="direccion" id="direccion-tecnico" aria-describedby="helpId" placeholder="Ingrese dirección del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Número teléfono</label>
        <input type="text" class="form-control" name="telefono" id="telefono-tecnico" aria-describedby="helpId" placeholder="Ingrese número de telefono del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Fecha nacimiento</label>
        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento-tecnico" aria-describedby="helpId" placeholder="Ingrese la fecha nacimientodel técnico">
      </div>

      <button type="submit" class="btn btn-success">Guardar</button>
      <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
  </div>

</div>

<?php include("../../templates/footer.php")   ?>