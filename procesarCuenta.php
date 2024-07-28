<?php
    require_once 'sesion.php';
    
    $cambio = false;
    
    if (isset($_FILES['archivoImagenCuenta']) && $_FILES['archivoImagenCuenta']['error'] === UPLOAD_ERR_OK && $_FILES['archivoImagenCuenta']['size'] > 0) {
        $imgCuenta = $_FILES['archivoImagenCuenta'];
        
        $rutaInicial = $imgCuenta['tmp_name'];;
        $rutaDestino = "assets/img/user/profile-img-custom-" . $_SESSION['idUsuario'] . ".jpg";
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
        
        $cambio  = true;
    }
    
    if (isset($_POST['nombreUsuario']) && $_POST['nombreUsuario'] !== $_SESSION['nombreUsuario']) {
        $nombreUsuario = $_POST['nombreUsuario'];
        $_SESSION['nombreUsuario'] = $nombreUsuario;
        
        actualizarDatoRegistro("usuario", "nombreUsuario", $nombreUsuario, "idUsuario", $_SESSION['idUsuario']);
        
        $cambio  = true;
    }
    
    if (!empty($_POST['contrasenaCuenta'])) {
        $contrasena = $_POST['contrasenaCuenta'];
        $_SESSION['password'] = $contrasena;
        
        actualizarDatoRegistro("usuario", "password", $contrasena, "idUsuario", $_SESSION['idUsuario']);
        
        $cambio  = true;
    }
    
    if ($cambio) {
        echo '<script language="javascript">alert("Cambios guardados correctamente.");</script>';
    }else{
        echo '<script language="javascript">alert("No ha habido cambios por guardar.");</script>';
    }
    
    echo '<script language="javascript">window.location="cuenta.php";</script>';
?>