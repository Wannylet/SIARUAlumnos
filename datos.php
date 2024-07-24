<?php

function iniciarDatos(){
    if (esSesionIniciada() == false) {
        header("Location: iniciarSesion.php");
        exit();
    }
    
    interfazDatos();
}

function interfazDatos(){
    
}

// datos.php
// Datos del usuario (Ejemplo, estos deberían venir de una base de datos o sesión)
$nombre_completo = "usuario sacado de la base";
$correo = "user@email.com";
$contrasena = "**********nd";
$carrera = "Ingeniería de Software";
$semestre = "6° Semestre";
?>

<!DOCTYPE html>
<body>
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Datos del Usuario</h5>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Campo</th>
                        <th scope="col">Información</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Nombre Completo</th>
                        <td><?php echo $nombre_completo; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Correo</th>
                        <td><?php echo $correo; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Contraseña</th>
                        <td><?php echo $contrasena; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Carrera</th>
                        <td><?php echo $carrera; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Semestre</th>
                        <td><?php echo $semestre; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
            </body>
    </html>

<?php
?>
