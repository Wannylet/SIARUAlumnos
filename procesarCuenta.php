<?php
    require_once 'sesion.php';
    
    if (isset($_FILES['archivoImagenCuenta']) && $_FILES['archivoImagenCuenta']['error'] === UPLOAD_ERR_OK && $_FILES['archivoImagenCuenta']['size'] > 0) {
        $imgCuenta = $_FILES['archivoImagenCuenta'];
        
        $rutaInicial = $imgCuenta['tmp_name'];
        $rutaDestino = "assets/img/imgCustom.jpg";
        $directorio = dirname($rutaDestino);
        
        if (!is_dir($directorio)) {
            mkdir($directorio, 0775, true);
        }
        
        if (!is_file($rutaDestino) && !file_exists($rutaDestino)) {
            unlink($rutaDestino);
        }
        
        if (is_uploaded_file($rutaInicial)) {
            move_uploaded_file($rutaInicial, $rutaDestino);
        }
    }
    
    if (isset($_POST['nombreUsuario'])) {
        $nombreUsuario = $_POST['nombreUsuario'];
        
        actualizarDatoRegistro("usuario", "nombreUsuario", $nombreUsuario, "idUsuario", $_SESSION['idusuario']);
    }
    
    if (!empty($_POST['contrasenaCuenta'])) {
        $contrasena = $_POST['contrasenaCuenta'];
        
        actualizarDatoRegistro("usuario", "password", $contrasena, "idUsuario", $_SESSION['idusuario']);
    }
    
    echo '<script language="javascript">alert("Cambios guardados correctamente.");</script>';
    
    echo '<script language="javascript">window.location="cuenta.php";</script>';
?>