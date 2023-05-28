<?php include("../../templates/header.php")   ?>
<?php include("../../db.php")   ?>

<?php
$sentence = $conexion->prepare("select * from tecnicos");
$sentence->execute();
$listTechnical = $sentence->fetchAll();

$sql = "select * from computadores";
$sentence = $conexion->prepare($sql);
$sentence->execute();
$listComputers = $sentence->fetchAll();

if ($_POST) {
  $id_tecnico = intval(isset($_POST["select_tecnico"]) ? $_POST["select_tecnico"] : "");
  $id_computador = intval(isset($_POST["select_computador"]) ? $_POST["select_computador"] : "");
  $tipo_mantenimiento = isset($_POST["select_tipo_manten"]) ? $_POST["select_tipo_manten"] : "";
  $caso = isset($_POST["caso"]) ? $_POST["caso"] : "";
  $fecha_asignacion=isset($_POST["fecha_asignacion"])?$_POST["fecha_asignacion"]:"";
  $precio = doubleval(isset($_POST["precio"]) ? $_POST["precio"] : "");

  $sentence = $conexion->prepare("insert into mantenimientos (id,id_tecnico,id_computador,tipo_mantenimiento,caso,precio,fecha_asignacion) 
  values 
  (null,:id_tecnico,:id_computador,:tipo_mantenimiento,:caso,:precio,:fecha_asignacion)");
  $sentence->bindParam(":id_tecnico", $id_tecnico);
  $sentence->bindParam(":id_computador", $id_computador);
  $sentence->bindParam(":tipo_mantenimiento", $tipo_mantenimiento);
  $sentence->bindParam(":caso", $caso);
  $sentence->bindParam(":precio", $precio);
  $sentence->bindParam(":fecha_asignacion", $fecha_asignacion);
  $sentence->execute();
  
  header("location:index.php");
}



?>

<h2>Asignar mantenimiento</h2>
<div class="card">
  <div class="card-header">
    Datos del mantenimiento
  </div>
  <div class="card-body">
    <form action="asignarMant.php" method="post" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="" class="form-label">Técnico</label>
        <select required class="form-select form-select-lg" name="select_tecnico" id="selec-tecnico" style="font-size: 15px;">

          <option selected>Seleccione un técnico</option>
          <?php foreach ($listTechnical as $tec) { ?>
            <option value="<?php echo $tec["id"] ?>"><?php echo $tec["nombres"] ?> <?php echo $tec["apellidos"] ?> </option>
          <?php } ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Computador</label>
        <select required class="form-select form-select-lg" name="select_computador" id="selec-tecnico" style="font-size: 15px;">
          <option selected>Seleccione un computador</option>
          <?php foreach ($listComputers as $comp) { ?>
            <option value="<?php echo $comp["id"] ?>">Serial: <?php echo $comp["serial"] ?> Marca:<?php echo $comp["marca"] ?> Modelo: <?php echo $comp["modelo"] ?> Cpu: <?php echo $comp["cpu"] ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Tipo de mantenimiento</label>
        <select required class="form-select form-select-lg" name="select_tipo_manten" id="selec-tecnico" style="font-size: 15px;">
          <option selected>Seleccione el tipo del mantenimiento</option>
          <option value="preventivo">Preventivo</option>
          <option value="correctivo">Correctivo</option>
          <option value="predictivo">Predictivo</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Caso</label>
        <textarea required class="form-control" name="caso" id="caso" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Precio (opcional)</label>
        <input required type="double" class="form-control" name="precio" id="precio-mantenimiento" aria-describedby="helpId" placeholder="Ingrese el precio del mantenimiento (opcional)">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Fecha nacimiento</label>
        <input required type="date" class="form-control" name="fecha_asignacion" id="fecha_asignacion_mantenimiento" aria-describedby="helpId">
      </div>

      <button type="submit" class="btn btn-success">Guardar</button>
      <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
  </div>

</div>

<?php include("../../templates/footer.php")   ?>