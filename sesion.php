<?php
require_once 'baseDatos.php';

session_start();

/**
 * Establece las variables de sesión mediante el arreglo relacional de un
 * registro.
 * @param type $registro Arreglo relacional del que se asgnarán los valores.
 */
function establecerSesion($registro){
    $_SESSION['idusuario'] = $registro['idUsuario'];
    $_SESSION['usuario'] = $registro['nombreUsuario'];
    $_SESSION['contrasena'] = $registro['password'];
}

/**
 * Verifica que se haya iniciado sesión mediante una variable de sesión.
 * @return type Verdadero si está definida la variable o falso si no lo está.
 */
function esSesionIniciada(){
    return isset($_SESSION['idusuario']);
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
    if (esSesionIniciada()) {
        return true;
    }else{
        if (esUsuario($usuarioForm, $contrasenaForm)) {
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
}