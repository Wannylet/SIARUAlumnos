<?php
session_start();

function conectar() {
    define('DB_SERVIDOR', 'localhost');
    define('DB_USUARIO', 'root');
    define('DB_CONTRASENA', '');
    define('DB_NOMBRE', 'SIARUAlumnos');
    
    return mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_CONTRASENA);
}

//Ejecutar consulta
function consultar($conexion, $consulta){
    mysqli_select_db($conexion, DB_NOMBRE);
    return mysqli_query($conexion, $consulta);
}

//Verificar login
function verificarUsuarioBaseDatos($usuario, $contrasena) {
    $conexion = conectar();
    
    $usuarioLim = mysqli_real_escape_string($conexion, $usuario);
    $contrasenaLim = mysqli_real_escape_string($conexion, $contrasena);
    
    $consulta = "SELECT * FROM usuario WHERE nombreUsuario = '$usuarioLim' AND password = '$contrasenaLim'";
    
    $resultado = consultar($conexion, $consulta);
    
    if (mysqli_num_rows($resultado) == 1) {
        return 1;
    }else{
        return 0;
    }
}

//Extraer registro
function extraerRegistro($usuario, $contrasena) {
    $conexion = conectar();
    
    $usuarioLim = mysqli_real_escape_string($conexion, $usuario);
    
    $contrasenaLim = mysqli_real_escape_string($conexion, $contrasena);
    
    $consulta = "SELECT * FROM usuario WHERE nombreUsuario = '$usuario' AND password = '$contrasena'";
    
    return mysqli_fetch_array(consultar($conexion, $consulta));
}

function establecerSesion($registro){
    $_SESSION['idusuario'] = $registro['idUsuario'];
    $_SESSION['usuario'] = $registro['nombreUsuario'];
    $_SESSION['contrasena'] = $registro['password'];
}

function iniciarSesion($usuarioForm, $contrasenaForm){
    //Verificar el loggin
    if (isset($_SESSION['idusuario'])) {
        return true;
    }else{
        if (verificarUsuarioBaseDatos($usuarioForm, $contrasenaForm) == 1) {
            $registro = extraerRegistro($usuarioForm, $contrasenaForm);
            establecerSesion($registro);
            return true;
        } else {
            if ($usuarioForm ==! '') {
                echo '<script language="javascript">alert("El usuario o la contraseña son incorrectos, inténtelo nuevamente.");</script>';
            }
            return false;
        }
    }
}