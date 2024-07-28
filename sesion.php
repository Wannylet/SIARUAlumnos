<?php
require_once 'baseDatos.php';

session_start();

/**
 * Destruye la sesión actual.
 */
function destruirSesion(){
    $_SESSION = array();
    
    session_destroy();
    header('location: iniciarSesion.php');
}

/**
 * Establece las variables de sesión mediante el arreglo relacional de un
 * registro.
 * @param type $registro Arreglo relacional del que se asgnarán los valores.
 */
function establecerSesion($registro){
    $_SESSION['idUsuario'] = $registro['idUsuario'];
    $_SESSION['nombres'] = $registro['nombres'];
    $_SESSION['apellidoP'] = $registro['apellidoP'];
    $_SESSION['apellidoM'] = $registro['apellidoM'];
    $_SESSION['tipoUsuario'] = $registro['tipoUsuario'];
    $_SESSION['nombreUsuario'] = $registro['nombreUsuario'];
    $_SESSION['password'] = $registro['password'];
    $_SESSION['dob'] = $registro['dob'];
    $_SESSION['genero'] = $registro['genero'];
    $_SESSION['RFC'] = $registro['RFC'];
    $_SESSION['CURP'] = $registro['CURP'];
    $_SESSION['pathRFC'] = $registro['pathRFC'];
    $_SESSION['pathCURP'] = $registro['pathCURP'];
}

/**
 * Verifica que se haya iniciado sesión mediante una variable de sesión.
 * @return type Verdadero si está definida la variable o falso si no lo está.
 */
function esSesionIniciada(){
    return isset($_SESSION['idUsuario']);
}

/**
 * Verifica que se haya iniciado sesión y de no ser así verifica que sea un
 * usuario mediante el nombre de usuario y contraseña recibidos del formulario,
 * extrae el registro y establece una nueva sesión.
 * @param type $usuarioForm Nombre de usuario recibido de formulario.
 * @param type $contrasenaForm Contraseña de usuario recibida de formulario.
 * @return bool Verdadero si ya hay una sesión iniciada o está registrado en la
 * base de datos, o falso si no está registrado en la base de datos.
 */
function iniciarSesion($usuarioForm, $contrasenaForm){
    if (conectar()) {
        if (esSesionIniciada()) {
            return true;
        } else {
            if (esUsuarioAlumno($usuarioForm, $contrasenaForm)) {
                $registro = extraerRegistroUsuario($usuarioForm, $contrasenaForm);
                establecerSesion($registro);
                return true;
            } else {
                if ($usuarioForm ==! '') {
                    echo '<script language="javascript">alert("El usuario o la contraseña son incorrectos, inténtelo nuevamente.");</script>';
                }
                return false;
            }
        }
    } else {
        echo '<script language="javascript">alert("Error al conectar a la base de datos, inténtelo más tarde.");</script>';
        return false;
    }
}