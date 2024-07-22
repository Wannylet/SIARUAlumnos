<?php
session_start();

function conectar() {
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'SIARUAlumnos');
    
    return mysqli_connect(DB_SEVER, DB_USER, DB_NAME);
}

//Ejecutar consulta
function consultar($connection, $query){
    mysqli_select_db($connection, DB_NAME);
    return mysqli_query($connection, $query);
}

//Verificar login
function verificar_login($user, $password) {
    $connection = conectar();
    
    $userClean = mysqli_real_escape_string($connection, $user);
    $passwordClean = mysqli_real_escape_string($connection, $password);
    
    $query = "SELECT * FROM usuarios WHERE usuario = '$userClean' AND clave = '$passwordClean'";
    
    $result = consultar($connection, DB_NAME, $query);
    
    if (mysqli_num_rows($result) == 1) {
        return 1;
    }else{
        return 0;
    }
}

//Extraer registro
function extraer_registro($user, $password) {
    $connection = conectar();
    
    $userClean = mysqli_real_escape_string($connection, $user);
    $passwordClean = mysqli_real_escape_string($connection, $password);
    
    $query = "SELECT * FROM usuarios WHERE usuario = '$userClean' AND clave = '$passwordClean'";
    
    return mysqli_fetch_array(consultar($connection, DB_NAME, $query));
}

function iniciar_sesion($result){
    $_SESSION['idusuario'] = $result['idusuario'];
    $_SESSION['usuario'] = $result['usuario'];
    $_SESSION['contrasena'] = $result['contrasena'];
}

function esta_loggeado(){
    //Verificar el loggin
    if (!isset($_SESSION['idusuario'])) {
        $user = $_SESSION['user'];
        $password = $_SESSION['password'];
        if (verificar_login($user, $password) == 1) {
            $result = extraer_registro($user, $password);
            iniciar_sesion($result);
            return true;
        } else {
            return false;
        }
    }else{
        return true;
    }
}
