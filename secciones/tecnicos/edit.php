<?php include("../../templates/header.php")   ?>

<h2>Editar</h2>
<div class="card">
  <div class="card-header">
    Datos nuevos del técnico
  </div>
  <div class="card-body">
    <form action="add.php" method="post" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="" class="form-label">Id</label>
        <input type="text" class="form-control" name="id" id="id-tecnico" aria-describedby="helpId">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Nombres</label>
        <input type="text" class="form-control" name="nombres" id="nombres-tecnico" aria-describedby="helpId" placeholder="Ingrese  nombres del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" id="apellidos-tecnico" aria-describedby="helpId" placeholder="Ingrese  apellidos del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Número de identificacion</label>
        <input type="text" class="form-control" name="identificacion" id="identificacion-tecnico" aria-describedby="helpId" placeholder="Ingrese número de identificacion del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" name="correo" id="correo-tecnico" aria-describedby="helpId" placeholder="Ingrese correo del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Dirección</label>
        <input type="text" class="form-control" name="direccion" id="direccion-tecnico" aria-describedby="helpId" placeholder="Ingrese dirección del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Número teléfono</label>
        <input type="text" class="form-control" name="telefono" id="telefono-tecnico" aria-describedby="helpId" placeholder="Ingrese número de telefono del técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Fecha nacimiento</label>
        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento-tecnico" aria-describedby="helpId" placeholder="Ingrese la fecha nacimientodel técnico">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Foto</label>
        <input type="file" class="form-control" name="foto" id="foto-tecnico" aria-describedby="helpId" placeholder="Ingrese  foto del técnico">
      </div>
      <button type="button" class="btn btn-success">Actualizar</button>
      <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
  </div>

</div>

<?php include("../../templates/footer.php")   ?>