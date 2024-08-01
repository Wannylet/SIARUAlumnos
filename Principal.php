<?php
require_once 'sesion.php';

iniciarPrincipal();

function iniciarPrincipal(){
    if (iniciarSesion($_SESSION['nombreUsuario'], $_SESSION['password'])) {
        interfazPrincipal();
    }else{
        header("Location: iniciarSesion.php");
        exit();
    }
}

function interfazPrincipal(){
    $imgCuenta = "assets/img/user/profile-img-custom-" . $_SESSION['idUsuario'] . ".jpg";
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
            
            <script>
            function confirmLogout(event) {
                event.preventDefault(); // Evita que el enlace se ejecute de inmediato
                let confirmation = confirm("¿Está seguro que quiere cerrar la sesión?");
                if (confirmation) {
                    window.location.href = "cerrarSesion.php";
                }
            }
            </script>
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
                                <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['nombreUsuario']?></span>
                            </a>
                            
                            <!-- Menu desplegable de perfil -->
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                
                                <!-- Título de usuario -->
                                <li class="dropdown-header">
                                    <h6><?php echo $_SESSION['nombres'] . ' ' . $_SESSION['apellidoP'] . ' ' . $_SESSION['apellidoM']?></h6>
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
                        <a class="nav-link collapsed" href="cuenta.php">
                            <i class="bi bi-person-circle"></i>
                            <span>Cuenta</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" onclick="confirmLogout(event)">
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
                    <h1>Página de inicio</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Inicio</li>
                        </ol>
                    </nav>
                    
                    <section class="section statistics">
                        <!-- Estadísticas del alumno -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Rendimiento</h5>
                                <canvas id="performanceChart"></canvas>
                                
                                <!-- Acciones recientes -->
                                <h5 class="card-title">Acciones recientes</h5>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <i class="bi bi-info-circle me-1"></i>
                                    A simple info alert with icon—check it out!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
            
            <!-- ======= Listeners de componentes ======= -->
            <script type="text/javascript">
                document.getElementById('').addEventListener('click', function(){
                    
                });
            </script>
        </body>
    </html>
    <?php
}
?>
