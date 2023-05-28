<?php include("../../templates/header.php")   ?>
<?php include("../../db.php") ?>

<?php
$computerFound = [];
if ($_GET) {
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $id = intval($id);
    $sentence = $conexion->prepare("select * from computadores where id=:id");
    $sentence->bindParam(":id", $id);
    $sentence->execute();
    $computerFound = $sentence->fetch();
}

if ($_POST) {

    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $id = intval($id);
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

    $sentence = $conexion->prepare("UPDATE computadores
    SET 
    serial =?, marca = ?, modelo= ?, cpu= ?, ram= ?, almacenamiento= ?, fuente_de_poder= ?, gpu= ?,disipador= ?, placa_madre= ?
    WHERE id=?");

    $sentence->execute([$serial,$marca,$modelo,$cpu,$ram,$almacenamiento,$fuente_de_poder,$gpu,$disipador,$placa_madre,$id]);

    header("location:index.php");
}


?>

<h2>Editar computador</h2>
<div class="card">
    <div class="card-header">
        Datos nuevos del computador
    </div>
    <div class="card-body">
        <form action="edit.php" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="" class="form-label">Id</label>
                <input required value="<?php echo $computerFound["id"] ?>" type="text" class="form-control" name="id" id="id-computador" aria-describedby="helpId" readonly>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Serial</label>
                <input required value="<?php echo $computerFound["serial"] ?>" type="text" class="form-control" name="serial" id="serial-computador" aria-describedby="helpId" placeholder="Ingrese el serial del computador">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Marca</label>
                <input required value="<?php echo $computerFound["marca"] ?>" type="text" class="form-control" name="marca" id="marca-computador" aria-describedby="helpId" placeholder="Ingrese la marca del computador">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Modelo</label>
                <input required value="<?php echo $computerFound["modelo"] ?>" type="text" class="form-control" name="modelo" id="modelo-computador" aria-describedby="helpId" placeholder="Ingrese el modelo del computador">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Cpu</label>
                <input required value="<?php echo $computerFound["cpu"] ?>" type="text" class="form-control" name="cpu" id="cpu-computador" aria-describedby="helpId" placeholder="Ingrese la cpu del computador">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Ram</label>
                <input required value="<?php echo $computerFound["ram"] ?>" type="text" class="form-control" name="ram" id="ram-computador" aria-describedby="helpId" placeholder="Ingrese la ram del computador">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Almacenamiento</label>
                <input required value="<?php echo $computerFound["almacenamiento"] ?>" type="text" class="form-control" name="almacenamiento" id="almacenamiento-computador" aria-describedby="helpId" placeholder="Ingrese el almacenamiento del computador">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Fuente de poder</label>
                <input required value="<?php echo $computerFound["fuente_de_poder"] ?>" type="text" class="form-control" name="fuente_de_poder" id="fuente_de_poder-computador" aria-describedby="helpId" placeholder="Ingrese la fuente de poder del computador">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Gpu</label>
                <input required value="<?php echo $computerFound["gpu"] ?>" type="text" class="form-control" name="gpu" id="gpu-computador" aria-describedby="helpId" placeholder="Ingrese la gpu del computador">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Disipador</label>
                <input required value="<?php echo $computerFound["disipador"] ?>" type="text" class="form-control" name="disipador" id="disipador-computador" aria-describedby="helpId" placeholder="Ingrese el disipador del computador">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Placa madre</label>
                <input required value="<?php echo $computerFound["placa_madre"] ?>" type="text" class="form-control" name="placa_madre" id="placa_madre-computador" aria-describedby="helpId" placeholder="Ingrese la placa madre del computador">
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

</div>

<?php include("../../templates/footer.php")   ?>