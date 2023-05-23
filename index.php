<?php include("./templates/header.php")   ?>
<?php


?>
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Hola <?php echo $_SESSION["nombre_usuario"]?></h1>
        <h2 class="display-5 fw-bold">Bienvenido a SMC</h2>
        <p class="col-md-8 fs-4">
            Smc su sigla traduce a (Sistema de mantenimiento de cómputo) es un sistemas en el que podras administrar todos los mantenimientos asignados
            a los técnicos registrados dentro de la plataforma.
        </p>
    </div>
</div>

<?php include("./templates/footer.php")   ?>