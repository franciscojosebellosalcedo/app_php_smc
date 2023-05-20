<?php include("../../templates/header.php")   ?>

<h2>Editar</h2>
<div class="card">
    <div class="card-header">
        Datos nuevos del usuario
    </div>
    <div class="card-body">
        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Id</label>
                <input type="text" class="form-control" name="id" id="id-usuario" aria-describedby="helpId">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Nombres</label>
                <input type="text" class="form-control" name="nombre" id="nombre-usuario" aria-describedby="helpId" placeholder="Ingrese nombre del usuario">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido	" id="apellido-usuario" aria-describedby="helpId" placeholder="Ingrese apellido del usuario">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Número de identificacion</label>
                <input type="text" class="form-control" name="identificacion" id="identificacion-usuario" aria-describedby="helpId" placeholder="Ingrese número identificación del usuario">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="correo" id="correo-usuario" aria-describedby="helpId" placeholder="Ingrese correo electrónico  del usuario">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">contraseña</label>
                <input type="password" class="form-control" name="contrasenia" id="contraseña-usuario" aria-describedby="helpId" placeholder="Ingrese la contraseña del usuario">
            </div>

            <button type="button" class="btn btn-success">Actualizar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

</div>

<?php include("../../templates/footer.php")   ?>