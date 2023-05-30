<?php include("../../templates/header.php")   ?>
<?php include("../../db.php")   ?>

<?php
$resultMant = [];
$resultTec = [];
$resultComp = [];

$listTecs = [];
$listComps = [];

if($_POST){
  $id = intval(isset($_POST["id"]) ? $_POST["id"] : "");
  $id_tecnico = intval(isset($_POST["select_tecnico"]) ? $_POST["select_tecnico"] : "");
  $id_computador = intval(isset($_POST["select_computador"]) ? $_POST["select_computador"] : "");
  $tipo_mantenimiento = isset($_POST["select_tipo_manten"]) ? $_POST["select_tipo_manten"] : "";
  $caso = isset($_POST["caso"]) ? $_POST["caso"] : "";
  $precio = doubleval(isset($_POST["precio"]) ? $_POST["precio"] : "");
  $fecha_asignacion=isset($_POST["fecha_asignacion"])?$_POST["fecha_asignacion"]:"";

  $sentence = $conexion->prepare("UPDATE mantenimientos
    SET 
    id_tecnico =?, id_computador = ?, tipo_mantenimiento= ?, caso= ?, precio= ?, fecha_asignacion= ?
    WHERE id=?");
  $sentence->execute([$id_tecnico,$id_computador,$tipo_mantenimiento,$caso,$precio,$fecha_asignacion,$id]);
  header("location:index.php");
}

if ($_GET) {
  $idMat = intval(isset($_GET["id"]) ? $_GET["id"] : "");
  $sentence = $conexion->prepare("select * from mantenimientos where id=:id");
  $sentence->bindParam(":id", $idMat);
  $sentence->execute();
  $resultMant = $sentence->fetch();

  $idTec = intval($resultMant["id_tecnico"]);
  $sentence = $conexion->prepare("select * from tecnicos where id=:id");
  $sentence->bindParam(":id", $idTec);
  $sentence->execute();
  $resultTec = $sentence->fetch();

  $sentence = $conexion->prepare("select * from tecnicos");
  $sentence->execute();
  $listTecs = $sentence->fetchAll();

  $sentence = $conexion->prepare("select * from computadores");
  $sentence->execute();
  $listComps = $sentence->fetchAll();

  $idComp = intval($resultMant["id_computador"]);
  $sentence = $conexion->prepare("select * from computadores where id=:id");
  $sentence->bindParam(":id", $idComp);
  $sentence->execute();
  $resultComp = $sentence->fetch();
}


?>

<h2>Editar mantenimiento</h2>
<div class="card">
  <div class="card-header">
    Datos nuevos del mantenimiento
  </div>
  <div class="card-body">
    <form action="edit.php" method="post" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="" class="form-label">Id</label>
        <input required value="<?php echo $resultMant["id"] ?>" type="text" class="form-control" name="id" id="id-mantenimiento" aria-describedby="helpId" readonly>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Técnico</label>

        <select required class="form-select form-select-lg" name="select_tecnico" id="selec-tecnico" style="font-size: 15px;">

          <option value="<?php echo $resultTec["id"] ?>" selected><?php echo $resultTec["nombres"] ?> <?php echo $resultTec["apellidos"] ?> </option>

          <?php foreach ($listTecs as $tec) { ?>
            <option value="<?php echo $tec["id"] ?>"><?php echo $tec["nombres"] ?> </option>
          <?php } ?>

        </select>

      </div>

      <div class="mb-3">
        <label for="" class="form-label">Computador</label>
        <select required class="form-select form-select-lg" name="select_computador" id="selec-tecnico" style="font-size: 15px;">
          <option value="<?php echo $resultComp["id"] ?>" selected><?php echo $resultComp["serial"] ?> <?php echo $resultComp["marca"] ?> </option>

          <?php foreach ($listComps as $comp) { ?>
            <option value="<?php echo $comp["id"] ?>">Serial: <?php echo $comp["serial"] ?> Marca:<?php echo $comp["marca"] ?> Modelo: <?php echo $comp["modelo"] ?> Cpu: <?php echo $comp["cpu"] ?></option>
          <?php } ?>

        </select>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Tipo de mantenimiento</label>
        <select required class="form-select form-select-lg" name="select_tipo_manten" id="selec-tecnico" style="font-size: 15px;">
          <option selected><?php echo $resultMant["tipo_mantenimiento"]?></option>
          <option value="preventivo">Preventivo</option>
          <option value="correctivo">Correctivo</option>
          <option value="predictivo">Predictivo</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Caso</label>
        <textarea required class="form-control" name="caso" id="caso" rows="3"><?php echo $resultMant["caso"]?></textarea>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Precio (opcional)</label>
        <input value="<?php echo $resultMant["precio"]?>" type="double" class="form-control" name="precio" id="precio-mantenimiento" aria-describedby="helpId" placeholder="Ingrese el precio del mantenimiento (opcional)">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Fecha del mantenimiento</label>
        <input required value="<?php echo $resultMant["fecha_asignacion"]?>" type="date" class="form-control" name="fecha_asignacion" id="fecha_asignacion_mantenimiento" aria-describedby="helpId">
      </div>


      <button type="submit" class="btn btn-success">Actualizar</button>
      <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
  </div>

</div>

<?php include("../../templates/footer.php")   ?>