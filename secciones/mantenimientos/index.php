<?php include("../../templates/header.php")   ?>
<?php include("../../db.php")   ?>

<?php
$sentence = $conexion->prepare("select * from mantenimientos where estado=1");
$sentence->execute();
$result = $sentence->fetchAll();

if($_GET){
  if($_GET["id"] && $_GET["terminado"]=="true"){
    $id=intval(isset($_GET["id"])?$_GET["id"]:"");
    $sentece=$conexion->prepare("update  mantenimientos set estado=?, fecha_finalizacion=current_time  where id=?");
    $estado=2;
    $sentece->execute([$estado,$id]);
  
    header("location:index.php");
    
  }
   if($_GET["id"] && $_GET["delete"]=="true"){
    $id=intval(isset($_GET["id"])?$_GET["id"]:"");
    $sentece=$conexion->prepare("delete from mantenimientos where id=:id");
    $sentece->bindParam(":id",$id);
    $sentece->execute();
    
    header("location:index.php");
  }
}

?>

<h3>Mantenimientos asignandos</h3>
<div class="card">
  <div class="card-header">
    <a class="btn btn-primary" href="asignarMant.php" role="button">Agregar registro</a>
    <a class="btn btn-primary" href="finality.php" role="button" style="margin-left: 10px;">Mant. terminados</a>
  </div>
  <div class="card-body">
    <div class="table-responsive-sm">
      <table class="table ">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Técnico</th>
            <th scope="col">Computador</th>
            <th scope="col">tipo</th>
            <th scope="col">Caso</th>
            <th scope="col">Precio</th>
            <th scope="col">F. asignacion</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $mant) { ?>
            
            <?php
            $sentence = $conexion->prepare("select * from tecnicos where id=:id");
            $sentence->bindParam(":id", intval($mant["id_tecnico"]));
            $sentence->execute();
            $resultTecni = $sentence->fetch();

            $sentence = $conexion->prepare("select * from computadores where id=:id");
            $sentence->bindParam(":id", intval($mant["id_computador"]));
            $sentence->execute();
            $resultCompu = $sentence->fetch();

            ?>
            <tr class="">
              <td scope="row"><?php echo $mant["id"] ?></td>
              <td><?php echo $resultTecni["nombres"] ?> <?php echo $resultTecni["apellidos"] ?></td>
              <td><?php echo $resultCompu["serial"] ?> <?php echo $resultCompu["marca"] ?></td>
              <td><?php echo $mant["tipo_mantenimiento"] ?></td>
              <td>
                <textarea class="form-control" name="" id="" rows="3"><?php echo $mant["caso"] ?></textarea>
              </td>
              <td>$<?php echo $mant["precio"] ?></td>
              <td><?php echo $mant["fecha_asignacion"] ?></td>
              <td><a class="btn btn-info" href="edit.php" role="button">Editar</a></td>
              <td><a class="btn btn-danger" href="index.php?id=<?php echo $mant["id"]?>&&delete=true" role="button">Eliminar</a></td>
              <td><a class="btn btn-warning" href="index.php?id=<?php echo $mant["id"]?>&&terminado=true" role="button">M. terminado</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>

</div>

<?php include("../../templates/footer.php")   ?>