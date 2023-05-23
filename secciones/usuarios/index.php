<?php include("../../templates/header.php")   ?>
<?php include("../../db.php") ?>

<?php
$sentence=$conexion->prepare("select * from usuarios where id!=45");
$sentence->execute();
$result=$sentence->fetchAll();

if($_GET){
    $id=isset($_GET["id"])?$_GET["id"]:null;
    $id=intval($id);
    $sentence=$conexion->prepare("delete from usuarios where id=:id");
    $sentence->bindParam(":id",$id);
    $sentence->execute();
    header("location:index.php");
}

?>

<h3>Usuarios</h3>
<div class="card">
    <div class="card-header">
        <a  class="btn btn-primary" href="add.php"  role="button">Agregar registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Identificacion</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($result as $user) { ?>

                    <tr class="">
                        <td scope="row"><?php echo $user["id"]?></td>
                        <td><?php echo $user["nombre"]?></td>
                        <td><?php echo $user["apellido"]?></td>
                        <td><?php echo $user["identificacion"]?></td>
                        <td><?php echo $user["correo"]?></td>
                        <td>*****</td>
                        <td><a  class="btn btn-info" href="edit.php?id=<?php echo $user["id"]?>" role="button">Editar</a></td>
                        <td><a  class="btn btn-danger" href="index.php?id=<?php echo $user["id"]?>" role="button">Eliminar</a></td>
                    </tr>

                <?php } ?>
                </tbody>
            </table>
        </div>
        
    </div>
   
</div>

<?php include("../../templates/footer.php")   ?>
