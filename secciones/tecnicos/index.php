<?php include("../../templates/header.php")   ?>

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
                        <th scope="col">Foto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row">R1C2</td>
                        <td>R1C3</td>
                        <td>R1C3</td>
                        <td>R1C3</td>
                        <td>R1C3</td>
                        <td>R1C3</td>
                        <td>R1C3</td>
                        <td>R1C3</td>
                        <td><a  class="btn btn-info" href="edit.php" role="button">Editar</a></td>
                        <td><a  class="btn btn-primary" href="asignarMant.php" role="button">Asignar mantenimiento</a></td>
                        <td><a  class="btn btn-danger" href="edit.php" role="button">Eliminar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
   
</div>

<?php include("../../templates/footer.php")   ?>

