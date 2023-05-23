<?php include("../../templates/header.php")   ?>

<?php
include("../../db.php");

$sentence = $conexion->prepare("select * from mantenimientos where estado=2");
$sentence->execute();
$result = $sentence->fetchAll();

if ($_GET) {
    $id = intval(isset($_GET["id"]) ? $_GET["id"] : "");
    $sentece = $conexion->prepare("delete from mantenimientos where id=:id");
    $sentece->bindParam(":id", $id);
    $sentece->execute();

    header("location:finality.php");
}

?>

<h3>Mantenimientos terminados</h3>
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="index.php" role="button" style="margin-left: 10px;">Regresar</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Técnico</th>
                        <th scope="col">Computador</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Caso</th>
                        <th scope="col">Precio</th>
                        <th scope="col">F. asignacion</th>
                        <th scope="col">F. finalizacion</th>
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
                            <td><?php echo $mant["fecha_finalizacion"] ?></td>
                            <td><a class="btn btn-danger" href="finality.php?id=<?php echo $mant["id"] ?>" role="button">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>


<?php include("../../templates/footer.php")   ?>