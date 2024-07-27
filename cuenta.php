<?php
require_once 'sesion.php';

iniciarPrincipal();

function iniciarPrincipal(){
    if (iniciarSesion($_SESSION['usuario'], $_SESSION['contrasena'])) {
        interfazCuenta();
    }else{
        header("Location: iniciarSesion.php");
        exit();
    }
}

function interfazCuenta(){
    $datosUsuario = extraerRegistroTabla("usuario", "idUsuario", $_SESSION['idusuario']);
    
    $pathRFC = $datosUsuario['pathRFC'];
    $pathCURP = $datosUsuario['pathCURP'];
    $tipoUsuario = $datosUsuario['tipoUsuario'];
    $genero = $datosUsuario['genero'];
    
    if (!is_file($pathRFC) && !file_exists($pathRFC)) {
        $pathRFC = "cuenta.php";
    }
    
    if (!is_file($pathCURP) && !file_exists($pathCURP)) {
        $pathCURP = "cuenta.php";
    }
    
    switch ($tipoUsuario) {
        case 0:
            $tipoUsuario = "Alumno";
            break;
        case 1:
            $tipoUsuario = "Profesor";
            break;
        case 2:
            $tipoUsuario = "Recepción";
            break;
        case 3:
            $tipoUsuario = "Prefectura";
            break;
        case 4:
            $tipoUsuario = "Coordinación";
            break;
        case 5:
            $tipoUsuario = "Administración";
            break;
    }
    
    switch ($genero) {
        case 'H':
            $genero = "Masculino";
            break;
        case 'F':
            $genero = "Femenino";
            break;
        case 'O':
            $genero = "Otro";
            break;
    }
    
    $imgCuenta = "assets/img/imgCustom.jpg";
    if (!is_file($imgCuenta) && !file_exists($imgCuenta)) {
        $imgCuenta = "assets/img/profile-img.jpg";
    }
    ?>
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <!-- Meta -->
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <title>Alumnos UNEDL</title>
            <meta content="" name="description">
            <meta content="" name="keywords">
            <!-- Favicons -->
            <link href="assets/img/favicon.png" rel="icon">
            <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
            <!-- Google Fonts -->
            <link href="https://fonts.gstatic.com" rel="preconnect">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
            <!-- Vendor CSS Files -->
            <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
            <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
            <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
            <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
            <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
            <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
            <!-- Template Main CSS File -->
            <link href="assets/css/style.css" rel="stylesheet">
            <!-- Vendor JS Files -->
            <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/vendor/chart.js/chart.umd.js"></script>
            <script src="assets/vendor/echarts/echarts.min.js"></script>
            <script src="assets/vendor/quill/quill.min.js"></script>
            <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
            <script src="assets/vendor/tinymce/tinymce.min.js"></script>
            <script src="assets/vendor/php-email-form/validate.js"></script>
            <!-- Template Main JS File -->
            <script src="assets/js/main.js"></script>
            <!-- JQuery import -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            
        </head>
        <body>
            <!-- ======= Barra superior (Header) ======= -->
            <header id="header" class="header fixed-top d-flex align-items-center">
                
                <!-- Logotipo de página -->
                <div class="d-flex align-items-center justify-content-between">
                    <a href="principal.php" class="logo d-flex align-items-center">
                        <img src="assets/img/logo.png" alt="">
                        <span class="d-none d-lg-block">UNEDL</span>
                    </a>
                </div>
                
                <!-- Barra de navegación principal -->
                <nav class="header-nav ms-auto">
                    
                    <!-- Lista de elementos no ordenados (navegación de perfil) -->
                    <ul class="d-flex align-items-center">
                        
                        <!-- ======= Navegación de perfil ======= -->
                        <li class="nav-item dropdown pe-3">
                            
                            <!-- Imagen de perfil -->
                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                <img src=<?php echo $imgCuenta?> alt="Profile" class="rounded-circle" width="32" height="32">
                                <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $datosUsuario['nombreUsuario']?></span>
                            </a>
                            
                            <!-- Menu desplegable de perfil -->
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                
                                <!-- Título de usuario -->
                                <li class="dropdown-header">
                                    <h6><?php echo $datosUsuario['nombres'] . ' ' . $datosUsuario['apellidoP'] . ' ' . $datosUsuario['apellidoM']?></h6>
                                    <span>Alumno</span>
                                </li>
                                
                                <!-- Divisor visual -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                
                                <!-- Enlace a otra pagina -->
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="cuenta.php">
                                        <i class="bi bi-person"></i>
                                        <span>Mi cuenta</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="cerrarSesion.php">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Cerrar sesión</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
            
            <!-- ======= Barra lateral (Sidebar) ======= -->
            <aside id="sidebar" class="sidebar">
                
                <!-- Lista de elementos no ordenados (barra lateral) -->
                <ul class="sidebar-nav" id="sidebar-nav">
                    
                    <!-- Enlace a otra página -->
                    <li class="nav-item">
                        <a class="nav-link" href="principal.php">
                            <i class="bi bi-house"></i> <!-- Icono -->
                            <span>Inicio</span>
                        </a>
                    </li>
                    
                    <!-- Divisor con texto -->
                    <li class="nav-heading">Principal</li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="documentos.php">
                            <i class="bi bi-person"></i>
                            <span>Documentos</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="alumno.php">
                            <i class="bi bi-file-text"></i>
                            <span>Alumno</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="colegiaturas.php">
                            <i class="bi bi-currency-dollar"></i>
                            <span>Colegiaturas</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="inscripcion.php">
                            <i class="bi bi-wallet"></i>
                            <span>Inscripción</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="calificaciones.php">
                            <i class="bi bi-star"></i>
                            <span>Calificaciones</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="materias.php">
                            <i class="bi bi-book"></i>
                            <span>Materias</span>
                        </a>
                    </li>
                    
                    <li class="nav-heading">Otros</li>
                    
                    <!-- Enlace a otra página -->
                    <li class="nav-item">
                        <a class="nav-link" href="cuenta.php">
                            <i class="bi bi-person-circle"></i>
                            <span>Cuenta</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="cerrarSesion.php">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Cerrar sesión</span>
                        </a>
                    </li>
                </ul>
            </aside>
            
            <!-- ======= Apartado principal ======= -->
            <main id="main" class="main">
                
                <!-- Página nueva -->
                <div class="pagetitle">
                    
                    <!-- Ruta de navegación -->
                    <h1>Cuenta</h1>
                    
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="principal.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Cuenta</li>
                        </ol>
                    </nav>
                    
                    <section class="section documents">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Datos de usuario</h5>
                                
                                <form id="formularioCuenta" class="row g-3 needs-validation" action="procesarCuenta.php" method="post" enctype="multipart/form-data">
                                    <div>
                                        <a target="_blank" href=<?php echo $imgCuenta?>><img src=<?php echo $imgCuenta?> alt="Profile" class="rounded-circle" width="150" height="150"></a>
                                        <br>
                                        <br>
                                        <input class="form-control" type="file" name="archivoImagenCuenta" title="Cambiar imagen de cuenta" accept=".jpg"/>
                                    </div>
                                    <br>
                                    
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Dato</th>
                                                <th scope="col">Información</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                <td scope="row">Nombre de usuario</td>
                                                <td>
                                                    <input required maxlength="8" type="text" class="form-control" name="nombreUsuario" value=<?php echo $datosUsuario['nombreUsuario']?>>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td scope="row">Contraseña</td>
                                                <td>
                                                    <input maxlength="255" type="password" class="form-control" id="contrasena" name="contrasenaCuenta">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td scope="row">Verificar contraseña</td>
                                                <td>
                                                    <input maxlength="255" type="password" class="form-control" id="verificarContrasena">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td scope="row">Nombre personal</td>
                                                <td>
                                                    <?php echo $datosUsuario['nombres'] . ' ' . $datosUsuario['apellidoP'] . ' ' . $datosUsuario['apellidoM'] ?>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td scope="row">Tipo de usuario</td>
                                                <td>
                                                    <?php echo $tipoUsuario?>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td scope="row">Fecha de nacimiento</td>
                                                <td>
                                                    <?php echo $datosUsuario['dob']?>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td scope="row">Género</td>
                                                <td>
                                                    <?php echo $genero?>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td scope="row">RFC</td>
                                                <td>
                                                    <a target="_blank" href=<?php echo $pathRFC?>>
                                                        <?php echo $datosUsuario['RFC']?></a>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td scope="row">CURP</td>
                                                <td>
                                                    <a target="_blank" href=<?php echo $pathCURP?>>
                                                        <?php echo $datosUsuario['CURP']?></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" id="guardarCuenta">Guardar cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
            
            <!-- ======= Listeners de componentes ======= -->
            <script type="text/javascript">
                document.getElementById('contrasena').addEventListener('input', function() {
                    const verificarContrasena = document.getElementById('verificarContrasena');
                    
                    if (this.value.length > 0) {
                        verificarContrasena.setAttribute('required', 'required');
                    } else {
                        verificarContrasena.removeAttribute('required');
                    }
                });
                
                document.getElementById('formularioCuenta').addEventListener('submit', function(event) {
                    const contrasena = document.getElementById('contrasena').value;
                    const verificarContrasena = document.getElementById('verificarContrasena').value;
                    
                    if (contrasena.length > 0) {
                        if (contrasena.length < 8) {
                            event.preventDefault();
                            alert('La contraseña debe contener al menos 8 caracteres.');
                        }else if(!contieneMinuscula(contrasena)){
                            event.preventDefault();
                            alert('La contraseña debe contener al menos una minúscula.');
                        }else if(!contieneMayuscula(contrasena)){
                            event.preventDefault();
                            alert('La contraseña debe contener al menos una mayúscula.');
                        }else if(!contieneNumero(contrasena)){
                            event.preventDefault();
                            alert('La contraseña debe contener al menos un número.');
                        }else if(!contieneCaracterEspecial(contrasena)){
                            event.preventDefault();
                            alert('La contraseña debe contener al menos un carácter especial.');
                        }
                    }else if (contrasena.length > 0 && contrasena.length < 8) {
                        event.preventDefault();
                        alert('La contraseña debe contener al menos 8 caracteres, una letra, un número y un carácter especial.');
                    }
                    
                    if (contrasena.length > 0 && contrasena !== verificarContrasena) {
                        event.preventDefault();
                        alert('Las contraseñas no coinciden.');
                    }
                });
                
                function contieneMinuscula(cadena) {
                    const regex = /[a-z]/;
                    return regex.test(cadena);
                }
                
                function contieneMayuscula(cadena) {
                    const regex = /[A-Z]/;
                    return regex.test(cadena);
                }
                
                function contieneNumero(cadena) {
                    const regex = /\d/;
                    return regex.test(cadena);
                }
                
                function contieneCaracterEspecial(cadena) {
                    const regex = /[!@#$%^&*(),.?":{}|<>]/;
                    return regex.test(cadena);
                }
            </script>
        </body>
    </html>
    <?php
}
?>
