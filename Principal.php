<?php
require_once 'sesion.php';

iniciarPrincipal();

function iniciarPrincipal(){
    if (esSesionIniciada() == false) {
        header("Location: iniciarSesion.php");
        exit();
    }
    
    interfazPrincipal();
}

function interfazPrincipal(){
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
                                <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                                <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                            </a>
                            
                            <!-- Menu desplegable de perfil -->
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                
                                <!-- Título de usuario -->
                                <li class="dropdown-header">
                                    <h6>Aquí va el nombre de usuario</h6>
                                    <span>Alumno</span>
                                </li>
                                
                                <!-- Divisor visual -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                
                                <!-- Enlace a otra pagina -->
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                        <i class="bi bi-person"></i>
                                        <span>Mi cuenta</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
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
                        <a class="nav-link collapsed" href="pages-faq.html">
                            <i class="bi bi-person"></i>
                            <span>Documentos</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="pages-faq.html">
                            <i class="bi bi-file-text"></i>
                            <span>Datos de alumno</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="pages-faq.html">
                            <i class="bi bi-currency-dollar"></i>
                            <span>Colegiaturas</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="pages-faq.html">
                            <i class="bi bi-wallet"></i>
                            <span>Inscripción</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="pages-faq.html">
                            <i class="bi bi-star"></i>
                            <span>Calificaciones</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="pages-faq.html">
                            <i class="bi bi-book"></i>
                            <span>Materias</span>
                        </a>
                    </li>
                    
                    <li class="nav-heading">Otros</li>
                    
                    <!-- Enlace a otra página -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="users-profile.html">
                            <i class="bi bi-person-circle"></i>
                            <span>Cuenta</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="pages-login.html">
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
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Rendimiento</h5>
                                    <canvas id="performanceChart"></canvas>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Acciones recientes -->
                        <div class="container">
                            <h5 class="section-title">Acciones recientes</h5>
                            <div class="alert alert-info" role="alert">
                                Tu solicitud de cambio de curso ha sido aprobada.
                            </div>
                        </div>
                    </section>
                </div>
            </main>
            
        </body>
    </html>
    <?php
}
?>
