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
    
    try {
        $conexion = mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_CONTRASENA);
        return $conexion;
    } catch (Exception $ex) {
        return null;
    }
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
 * Extrae un registro de una tabla mediante el nombre de la tabla, el campo
 * de referencia y el dato de referencia.
 * @param type $tabla Nombre de tabla.
 * @param type $campoRef Nombre de campo de referencia.
 * @param type $datoRef Dato de referencia. 
 * @return type Arreglo relacional de registro.
 */
function extraerRegistroTabla($tabla, $campoRef, $datoRef) {
    $conexion = conectar();
    
    $consulta = "SELECT * FROM $tabla WHERE $campoRef = $datoRef";
    
    return mysqli_fetch_array(consultar($conexion, $consulta));
}

/**
 * Actualiza un dato de un registro mediante la tabla, campo a actualizar,
 * dato a actualizar, campo de referencia y el dato de referencia.
 * @param type $tabla Nombre de tabla.
 * @param type $campo Nombre de campo de referencia.
 * @param type $dato Dato de referencia.
 * @param type $campoRef Campo de referencia.
 * @param type $datoRef Dato de referencia.
 * @return type Resultado de la consulta.
 */
function actualizarDatoRegistro($tabla, $campo, $dato, $campoRef, $datoRef) {
    $conexion = conectar();
    
    $datoLim = mysqli_real_escape_string($conexion, $dato);
    
    $consulta = "UPDATE $tabla SET $campo = '$datoLim' WHERE $campoRef = $datoRef";
    
    return consultar($conexion, $consulta);
}

/**
 * Verifica que haya un usuario registrado mediante su nombre de usuario y
 * contraseña en la base de datos.
 * @param type $usuario Nombre de usuario.
 * @param type $contrasena Contraseña de ususario.
 * @return int Verdadero si el número de filas es uno o falso si no lo es.
 */
function esUsuarioAlumno($usuario, $contrasena) {
    $conexion = conectar();
    
    $usuarioLim = mysqli_real_escape_string($conexion, $usuario);
    $contrasenaLim = mysqli_real_escape_string($conexion, $contrasena);
    
    $consulta = "SELECT * FROM usuario WHERE nombreUsuario = '$usuarioLim' AND password = '$contrasenaLim' AND tipoUsuario = '0'";
    
    $resultado = consultar($conexion, $consulta);
    
    $numFilas = mysqli_num_rows($resultado) == 1 ? true : false;
    return $numFilas;
}
?>