<?php include("../../templates/header.php")   ?>

<?php include("../../db.php") ?>

<?php

if($_POST){
  $serial = isset($_POST["serial"]) ? $_POST["serial"] : "";
  $marca = isset($_POST["marca"]) ? $_POST["marca"] : "";
  $modelo = isset($_POST["modelo"]) ? $_POST["modelo"] : "";
  $cpu = isset($_POST["cpu"]) ? $_POST["cpu"] : "";
  $ram = isset($_POST["ram"]) ? $_POST["ram"] : "";
  $almacenamiento = isset($_POST["almacenamiento"]) ? $_POST["almacenamiento"] : "";
  $fuente_de_poder = isset($_POST["fuente_de_poder"]) ? $_POST["fuente_de_poder"] : "";
  $gpu = isset($_POST["gpu"]) ? $_POST["gpu"] : "";
  $disipador = isset($_POST["disipador"]) ? $_POST["disipador"] : "";
  $placa_madre = isset($_POST["placa_madre"]) ? $_POST["placa_madre"] : "";

  $sentence = $conexion->prepare(
    "insert into computadores (id,serial,marca,modelo,cpu,ram,almacenamiento,fuente_de_poder,gpu,disipador,placa_madre) 
    values (null,:serial,:marca,:modelo,:cpu,:ram,:almacenamiento,:fuente_de_poder,:gpu,:disipador,:placa_madre)"
  );
  $sentence->bindParam(":serial", $serial);
  $sentence->bindParam(":marca", $marca);
  $sentence->bindParam(":modelo", $modelo);
  $sentence->bindParam(":cpu", $cpu);
  $sentence->bindParam(":ram", $ram);
  $sentence->bindParam(":almacenamiento", $almacenamiento);
  $sentence->bindParam(":fuente_de_poder", $fuente_de_poder);
  $sentence->bindParam(":gpu", $gpu);
  $sentence->bindParam(":disipador", $disipador);
  $sentence->bindParam(":placa_madre", $placa_madre);
  $sentence->execute();

  header("location:index.php");
}

?>



<h2>Agregar nuevo computador</h2>
<div class="card">
  <div class="card-header">
    Datos del nuevo computador
  </div>
  <div class="card-body">
    <form action="add.php" method="post" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="" class="form-label">Serial</label>
        <input type="text" class="form-control" name="serial" id="serial-computador" aria-describedby="helpId" placeholder="Ingrese el serial del computador">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Marca</label>
        <input type="text" class="form-control" name="marca" id="marca-computador" aria-describedby="helpId" placeholder="Ingrese la marca del computador">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Modelo</label>
        <input type="text" class="form-control" name="modelo" id="modelo-computador" aria-describedby="helpId" placeholder="Ingrese el modelo del computador">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Cpu</label>
        <input type="text" class="form-control" name="cpu" id="cpu-computador" aria-describedby="helpId" placeholder="Ingrese la cpu del computador">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Ram</label>
        <input type="text" class="form-control" name="ram" id="ram-computador" aria-describedby="helpId" placeholder="Ingrese la ram del computador">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Almacenamiento</label>
        <input type="text" class="form-control" name="almacenamiento" id="almacenamiento-computador" aria-describedby="helpId" placeholder="Ingrese el almacenamiento del computador">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Fuente de poder</label>
        <input type="text" class="form-control" name="fuente_de_poder" id="fuente_de_poder-computador" aria-describedby="helpId" placeholder="Ingrese la fuente de poder del computador">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Gpu</label>
        <input type="text" class="form-control" name="gpu" id="gpu-computador" aria-describedby="helpId" placeholder="Ingrese la gpu del computador">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Disipador</label>
        <input type="text" class="form-control" name="disipador" id="disipador-computador" aria-describedby="helpId" placeholder="Ingrese el disipador del computador">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Placa madre</label>
        <input type="text" class="form-control" name="placa_madre" id="placa_madre-computador" aria-describedby="helpId" placeholder="Ingrese la placa madre del computador">
      </div>

      <button type="submit" class="btn btn-success">Guardar</button>
      <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
  </div>

</div>

<?php include("../../templates/footer.php")   ?>