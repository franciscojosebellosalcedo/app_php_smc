<?php include("../../templates/header.php")   ?>
<?php include("../../db.php")   ?>

<?php 
$sentence=$conexion->prepare("select * from tecnicos");
$sentence->execute();
$result=$sentence->fetchAll();

if ($_GET) {
    $id=intval(isset($_GET["id"])?$_GET["id"]:"");
    $sentence=$conexion->prepare("delete from tecnicos where id=:id");
    $sentence->bindParam(":id",$id);
    $sentence->execute();

    header("location:index.php");
}


?>

<h3>Técnicos</h3>
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
                        <th scope="col">Dirección</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($result as $technical){?>
                    <tr class="">
                        <td scope="row"><?php echo $technical["id"]?></td>
                        <td><?php echo $technical["nombres"]?></td>
                        <td><?php echo $technical["apellidos"]?></td>
                        <td><?php echo $technical["identificacion"]?></td>
                        <td><?php echo $technical["correo"]?></td>
                        <td><?php echo $technical["direccion"]?></td>
                        <td><?php echo $technical["telefono"]?></td>
                        <td><?php echo $technical["fecha_nacimiento"]?></td>
                        <td><a  class="btn btn-info" href="edit.php?id=<?php echo $technical["id"]?>" role="button">Editar</a></td>
                        <td><a  class="btn btn-danger" href="index.php?id=<?php echo $technical["id"]?>" role="button">Eliminar</a></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
        
    </div>
   
</div>

<?php include("../../templates/footer.php")   ?>

