<?php

use function PHPSTORM_META\type;

include("../../templates/header.php")   ?>
<?php
include("../../db.php");

$sql = "select * from computadores";
$sentence = $conexion->prepare($sql);
$sentence->execute();
$listComputers = $sentence->fetchAll();


if ($_GET) {
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $id = intval($id);
    $sentence = $conexion->prepare("delete from computadores where id=:id");
    $sentence->bindParam(":id", $id);
    $sentence->execute();
    header("location:index.php");
}


?>

<h3>Computadores</h3>
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="add.php" role="button">Agregar registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Serial</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Cpu</th>
                        <th scope="col">Ram</th>
                        <th scope="col">Almacenamiento</th>
                        <th scope="col">Fuente poder</th>
                        <th scope="col">Gpu</th>
                        <th scope="col">Disipador</th>
                        <th scope="col">Placa madre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listComputers as $computer) { ?>
                        <tr class="">
                            <td scope="row"><?php echo $computer["id"] ?></td>
                            <td><?php echo $computer["serial"] ?></td>
                            <td><?php echo $computer["marca"] ?></td>
                            <td><?php echo $computer["modelo"] ?></td>
                            <td><?php echo $computer["cpu"] ?></td>
                            <td><?php echo $computer["ram"] ?></td>
                            <td><?php echo $computer["almacenamiento"] ?></td>
                            <td><?php echo $computer["fuente_de_poder"] ?></td>
                            <td><?php echo $computer["gpu"] ?></td>
                            <td><?php echo $computer["disipador"] ?></td>
                            <td><?php echo $computer["placa_madre"] ?></td>
                            <td><a class="btn btn-info" href="edit.php?id=<? echo $computer["id"] ?>" role="button">Editar</a></td>
                            <td><a class="btn btn-danger" href="index.php?id=<? echo $computer["id"] ?>" role="button">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<?php include("../../templates/footer.php")   ?>