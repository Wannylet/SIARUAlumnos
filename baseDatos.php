<?php

/**
 * Define las constantes de entorno de la base de datos y realiza una conexión.
 * @return type Conexión a la base de datos.
 */
function conectar() {
    if (!defined('DB_SERVIDOR')) {
        define('DB_SERVIDOR', 'localhost');
        define('DB_USUARIO', 'root');
        define('DB_CONTRASENA', '');
        define('DB_NOMBRE', 'SIARUAlumnos');
    }
    
    return mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_CONTRASENA);
}

/**
 * Ejecuta una consulta a la base de datos seleccionada.
 * @param type $conexion Conexión a la base de datos.
 * @param type $consulta Cadena de caracteres de consulta en lenguaje SQL.
 * @return type Resultado de la consulta.
 */
function consultar($conexion, $consulta){
    mysqli_select_db($conexion, DB_NOMBRE);
    return mysqli_query($conexion, $consulta);
}

/**
 * Extrae un registro de un usuario mediante su nombre de usuario y contraseña
 * en la base de datos.
 * @param type $usuario Nombre de usuario.
 * @param type $contrasena Contraseña de usuario.
 * @return type Arreglo relacional de registro.
 */
function extraerRegistroUsuario($usuario, $contrasena) {
    $conexion = conectar();
    
    $usuarioLim = mysqli_real_escape_string($conexion, $usuario);
    
    $contrasenaLim = mysqli_real_escape_string($conexion, $contrasena);
    
    $consulta = "SELECT * FROM usuario WHERE nombreUsuario = '$usuarioLim' AND password = '$contrasenaLim'";
    
    return mysqli_fetch_array(consultar($conexion, $consulta));
}

/**
 * Verifica que haya un usuario registrado mediante su nombre de usuario y
 * contraseña en la base de datos.
 * @param type $usuario Nombre de usuario.
 * @param type $contrasena Contraseña de ususario.
 * @return int Verdadero si el número de filas es uno o falso si no lo es.
 */
function esUsuario($usuario, $contrasena) {
    $conexion = conectar();
    
    $usuarioLim = mysqli_real_escape_string($conexion, $usuario);
    $contrasenaLim = mysqli_real_escape_string($conexion, $contrasena);
    
    $consulta = "SELECT * FROM usuario WHERE nombreUsuario = '$usuarioLim' AND password = '$contrasenaLim'";
    
    $resultado = consultar($conexion, $consulta);
    
    return mysqli_num_rows($resultado) == 1;
}
?>