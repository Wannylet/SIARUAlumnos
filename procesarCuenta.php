<?php
    require_once 'sesion.php';
    
    if (isset($_FILES['archivoImagenCuenta'])) {
        $imgCuenta = $_FILES['archivoImagenCuenta'];
        
        $rutaInicial = $imgCuenta['tmp_name'];
        $rutaDestino = "assets/img/imgCustom.jpg";
        $directorio = "assets/img/";
        
        if (!file_exists($rutaDestino)) {
            mkdir($directorio, 0775, true);
        }else{
            unlink($rutaDestino);
        }
        
        if (is_uploaded_file($rutaInicial)) {
            move_uploaded_file($rutaInicial, $rutaDestino);
            echo "directorio modificado";
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
    
    header("Location: cuenta.php");
?>

