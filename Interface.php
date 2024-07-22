<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Página de Usuarios</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="PlantillaFront/assets/img/favicon.png" rel="icon">
        <link href="PlantillaFront/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="PlantillaFront/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="PlantillaFront/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="PlantillaFront/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="PlantillaFront/assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="PlantillaFront/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="PlantillaFront/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="PlantillaFront/assets/vendor/simple-datatables/style.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="PlantillaFront/assets/css/style.css" rel="stylesheet">

        <style>
            .hidden {
                display: none;
            }
        </style>
    </head>
    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="Img/universidad-enrique-diaz-de-leon-logo-896B422A00-seeklogo.com.png" alt="">
                    <span class="d-none d-lg-block">UNEDL</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="Img/9187604.png" alt="Profile" class="rounded-circle">
                            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                        </a><!-- End Profile Iamge Icon -->
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>Kevin Anderson</h6>
                                <span>Alumno</span>
                            </li>
                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->
                </ul>
            </nav><!-- End Icons Navigation -->
        </header><!-- End Header -->

        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="menuBtn">
                            <i class="bi bi-grid"></i>
                            <span>Menu</span>
                        </a>
                    </li>
                    <!-- End Dashboard Nav -->
                </ul>
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#finanzas-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-cash"></i><span>Finanzas</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="finanzas-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="#" id="finanzasLink">
                                <i class="bi bi-circle"></i><span>Gestionar Pagos</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Finanzas Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" onclick="mostrarSeccion('materias')">
                        <i class="bi bi-book"></i>
                        <span>Materias</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#calificaciones-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-file-earmark-bar-graph"></i><span>Calificaciones</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="calificaciones-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="#" id="calificacionesLink">
                                <i class="bi bi-circle"></i><span>Ver Calificaciones</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Calificaciones Nav -->

                <li class="nav-heading">Otros</li>

                <!--Datos del Usuario-->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#usuario-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-person-circle"></i><span>Datos del Usuario</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="usuario-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="#" id="datosUsuarioLink">
                                <i class="bi bi-circle"></i><span>Ver Datos</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Datos del Usuario Nav -->

                <!-- Contacto -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" id="contactBtn">
                        <i class="bi bi-envelope"></i>
                        <span>Contacto</span>
                    </a>
                </li><!-- End Contacto Page Nav -->

                <div id="contactModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Quejas y Dudas</h2>
                        <form id="complaintForm">
                            <label for="complaintText">Escribe tu queja o duda:</label>
                            <textarea id="complaintText" name="complaintText" rows="4" cols="50" required></textarea>
                            <button type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
                <!-- End Contact Modal -->
                <!-- Style for Contact Modal -->
                <style>
                    /* Modal Background */
                    .modal {
                        display: none;
                        position: fixed;
                        z-index: 1000;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        overflow: auto;
                        background-color: rgba(0,0,0,0.5);
                        transition: opacity 0.3s ease;
                    }
                    /* Modal Content */
                    .modal-content {
                        background-color: #fff;
                        margin: 15% auto;
                        padding: 20px;
                        border-radius: 8px;
                        width: 80%;
                        max-width: 500px;
                        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
                    }
                    .modal-content h2 {
                        font-size: 1.5em;
                        margin-bottom: 15px;
                        color: #333;
                    }
                    .modal-content label {
                        font-weight: 600;
                        margin-bottom: 5px;
                        display: block;
                        color: #666;
                    }
                    .modal-content textarea {
                        width: 100%;
                        padding: 10px;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                        box-sizing: border-box;
                        resize: vertical;
                    }
                    .modal-content button {
                        background-color: #007bff;
                        color: #fff;
                        border: none;
                        padding: 10px 20px;
                        border-radius: 4px;
                        cursor: pointer;
                        font-size: 1em;
                        margin-top: 10px;
                        transition: background-color 0.3s ease;
                    }
                    .modal-content button:hover {
                        background-color: #0056b3;
                    }
                    .close {
                        color: #aaa;
                        float: right;
                        font-size: 28px;
                        font-weight: bold;
                        cursor: pointer;
                    }
                    .close:hover,
                    .close:focus {
                        color: #000;
                        text-decoration: none;
                        cursor: pointer;
                    }
                </style>
                <!-- Script para manejar el modal -->
                <script>
                    var modal = document.getElementById("contactModal");
                    var btn = document.getElementById("contactBtn");
                    var span = document.getElementsByClassName("close")[0];
                    btn.onclick = function () {
                        modal.style.display = "block";
                    }
                    span.onclick = function () {
                        modal.style.display = "none";
                    }
                    window.onclick = function (event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                    document.getElementById("complaintForm").onsubmit = function (event) {
                        event.preventDefault();
                        var complaintText = document.getElementById("complaintText").value;
                        if (complaintText.trim() === "") {
                            alert("Por favor, escribe tu queja o duda antes de enviar.");
                            return;
                        }
                        alert("Queja o duda enviada: " + complaintText);
                        // Limpiar el campo de texto
                        document.getElementById("complaintText").value = "";
                        
                        // Ocultar el modal
                        modal.style.display = "none";
                    }
                </script>

                <!--Cerrar Sesion-->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" id="logoutLink">
                        <i class="bi bi-dash-circle"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                </li>
                <script>
                    document.getElementById('logoutLink').addEventListener('click', function (event) {
                        event.preventDefault();
                        sessionStorage.removeItem('username');
                        window.location.href = 'loginAlumnos.php';
                    });
                </script>
            </ul>
        </aside><!-- End Sidebar-->

        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Pantalla Principal</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Main</a></li>
                        <li class="breadcrumb-item active">Principal</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">
                    <section id="finanzas" class="section-content hidden">
                        <!-- Contenido de la sección de Finanzas -->
                    </section>

                    <section id="calificaciones" class="section-content hidden">
                        <!-- Contenido de la sección de Calificaciones -->
                    </section>

                    <section id="materias" class="section-content hidden">
                        <?php include 'materias.php'; ?>
                    </section>
                </div>
            </section>
        </main><!-- End #main -->


        <!-- Vendor JS Files -->
        <script src="PlantillaFront/assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="PlantillaFront/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="PlantillaFront/assets/vendor/chart.js/chart.umd.js"></script>
        <script src="PlantillaFront/assets/vendor/echarts/echarts.min.js"></script>
        <script src="PlantillaFront/assets/vendor/quill/quill.min.js"></script>
        <script src="PlantillaFront/assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="PlantillaFront/assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="PlantillaFront/assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="PlantillaFront/assets/js/main.js"></script>

        <script>
                    function mostrarSeccion(seccion) {
                        var secciones = document.querySelectorAll('.section-content');
                        secciones.forEach(function (sec) {
                            sec.classList.add('hidden');
                        });
                        document.getElementById(seccion).classList.remove('hidden');
                    }
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var menuBtn = document.getElementById('menuBtn');
                var finanzasLink = document.getElementById('finanzasLink');
                var calificacionesLink = document.getElementById('calificacionesLink');
                var datosUsuarioLink = document.getElementById('datosUsuarioLink');
                var contentDiv = document.querySelector('.main .section .row');

                finanzasLink.addEventListener('click', function () {
                    fetch('pago.php')
                            .then(response => response.text())
                            .then(html => {
                                contentDiv.innerHTML = html;
                            })
                            .catch(error => console.error('Error al cargar la sección de Finanzas:', error));
                });

                calificacionesLink.addEventListener('click', function () {
                    fetch('calificaciones.php')
                            .then(response => response.text())
                            .then(html => {
                                contentDiv.innerHTML = html;
                            })
                            .catch(error => console.error('Error al cargar la sección de Calificaciones:', error));
                });

                datosUsuarioLink.addEventListener('click', function () {
                    fetch('datos.php')
                            .then(response => response.text())
                            .then(html => {
                                contentDiv.innerHTML = html;
                            })
                            .catch(error => console.error('Error al cargar la sección de Datos del Usuario:', error));
                });

                menuBtn.addEventListener('click', function () {
                    contentDiv.innerHTML = `
                        <div class="col-12">
                            <h1>Bienvenido al menú</h1>
                            <p>Seleccione una opción del menú lateral para ver su contenido.</p>
                        </div>
                    `;
                });
            });
        </script>
    </body>
</html>
