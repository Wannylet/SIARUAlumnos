<?php
require_once 'sesion.php';

// Define la variable para marcar el menú activo
$activeMenu = 'calificaciones';

iniciarPrincipal();

function iniciarPrincipal() {
    if (iniciarSesion($_SESSION['nombreUsuario'], $_SESSION['password'])) {
        interfazCalificaciones();
    } else {
        header("Location: iniciarSesion.php");
        exit();
    }
}

function interfazCalificaciones() {
    $imgCuenta = "../PlantillaFront/assets/img/user/profile-img-custom-" . $_SESSION['idUsuario'] . ".jpg";
    if (!is_file($imgCuenta) && !file_exists($imgCuenta)) {
        $imgCuenta = "../PlantillaFront/assets/img/profile-img.jpg";
    }

    // Conexión a la base de datos y obtención de calificaciones del usuario
    $conn = new mysqli("localhost", "root", "", "SIARUAlumnos");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener las materias y calificaciones del usuario
    $sql_calificaciones = "SELECT m.nombre AS materia, 
                                  c.primerParcial, 
                                  c.segundoParcial, 
                                  c.tercerParcial, 
                                  c.calificacionFinal
                           FROM Calificaciones c
                           JOIN Materia m ON c.fk_idMateria = m.idMateria
                           WHERE c.fk_idAlumno = ?";
    $stmt = $conn->prepare($sql_calificaciones);
    $stmt->bind_param("i", $_SESSION['idUsuario']);
    $stmt->execute();
    $result = $stmt->get_result();
    $calificaciones = [];
    while ($row = $result->fetch_assoc()) {
        $calificaciones[] = $row;
    }
    $stmt->close();
    $conn->close();
    ?>
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <!-- Meta -->
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <title>Calificaciones</title>
            <!-- Favicons -->
            <link href="../PlantillaFront/assets/img/favicon.png" rel="icon">
            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
            <!-- Vendor CSS Files -->
            <link href="../PlantillaFront/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="../PlantillaFront/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
            <link href="../PlantillaFront/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
            <!-- Template Main CSS File -->
            <link href="../PlantillaFront/assets/css/style.css" rel="stylesheet">
            <style>
                body {
                    font-family: 'Open Sans', sans-serif;
                    color: #333;
                    background-color: #f4f4f9;
                    margin: 0;
                    padding: 0;
                }

                .card {
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    margin-bottom: 20px;
                }
                .card-header, .card-body {
                    padding: 20px;
                }
                .card-header {
                    background-color: #007bff;
                    color: #fff;
                    display: flex;
                    align-items: center;
                    gap: 20px; /* Espacio entre el logo y el título */
                }
                .card-title {
                    font-size: 1.5rem;
                    margin: 0;
                }
                .card-body p {
                    margin: 0 0 20px;
                }
                .summary {
                    background-color: #f9f9f9;
                    border-radius: 8px;
                    padding: 20px;
                    margin-bottom: 20px;
                    border: 1px solid #ddd;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    padding: 10px;
                    border-bottom: 1px solid #ddd;
                }
                th {
                    background-color: #007bff;
                    color: #fff;
                }
                .footer {
                    text-align: center;
                    margin-top: 30px;
                    font-size: 0.875rem;
                    color: #6c757d;
                }
                .logo {
                    max-width: 150px;
                    height: auto;
                }
                .hidden {
                    display: none;
                }
                .table-striped tbody tr:nth-of-type(odd) {
                    background-color: #f9f9f9;
                }
            </style>
            <!-- JQuery import -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        </head>
        <body>
            <!-- ======= Barra superior (Header) ======= -->
            <header id="header" class="header fixed-top d-flex align-items-center">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="principal.php" class="logo d-flex align-items-center">
                        <img src="../Img/universidad-enrique-diaz-de-leon-logo-896B422A00-seeklogo.com.png" alt="">
                        <span class="d-none d-lg-block">UNEDL</span>
                    </a>
                </div>
                <nav class="header-nav ms-auto">
                    <ul class="d-flex align-items-center">
                        <li class="nav-item dropdown pe-3">
                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                <img src="<?php echo $imgCuenta; ?>" alt="Profile" class="rounded-circle" width="32" height="32">
                                <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['nombreUsuario']; ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li class="dropdown-header">
                                    <h6><?php echo $_SESSION['nombres'] . ' ' . $_SESSION['apellidoP'] . ' ' . $_SESSION['apellidoM']; ?></h6>
                                    <span>Alumno</span>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="cuenta.php"><i class="bi bi-person"></i><span>Mi cuenta</span></a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="cerrarSesion.php"><i class="bi bi-box-arrow-right"></i><span>Cerrar sesión</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>

            <!-- ======= Barra lateral (Sidebar) ======= -->
            <aside id="sidebar" class="sidebar">
                <ul class="sidebar-nav" id="sidebar-nav">
                    <li class="nav-item"><a class="nav-link" href="principal.php"><i class="bi bi-house"></i><span>Inicio</span></a></li>
                    <li class="nav-heading">Principal</li>
                    <li class="nav-item"><a class="nav-link collapsed" href="documentos.php"><i class="bi bi-person"></i><span>Documentos</span></a></li>
                    <li class="nav-item"><a class="nav-link collapsed" href="alumno.php"><i class="bi bi-file-text"></i><span>Alumno</span></a></li>
                    <li class="nav-item"><a class="nav-link collapsed" href="colegiaturas.php"><i class="bi bi-currency-dollar"></i><span>Colegiaturas</span></a></li>
                    <li class="nav-item"><a class="nav-link collapsed" href="inscripcion.php"><i class="bi bi-wallet"></i><span>Inscripción</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="calificaciones.php"><i class="bi bi-star"></i><span>Calificaciones</span></a></li>
                    <li class="nav-item"><a class="nav-link collapsed" href="materias.php"><i class="bi bi-book"></i><span>Materias</span></a></li>
                    <li class="nav-heading">Otros</li>
                    <li class="nav-item"><a class="nav-link collapsed" href="cuenta.php"><i class="bi bi-person-circle"></i><span>Cuenta</span></a></li>
                    <li class="nav-item"><a class="nav-link collapsed" href="cerrarSesion.php"><i class="bi bi-box-arrow-in-right"></i><span>Cerrar sesión</span></a></li>
                </ul>
            </aside>

            <!-- ======= Apartado principal ======= -->
            <main id="main" class="main">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <img src="../Img/universidad-enrique-diaz-de-leon-logo-896B422A00-seeklogo.com.png" class="logo" alt="Logo Universidad">
                            <h1 class="card-title">Calificaciones</h1>
                        </div>
                        <div class="card-body">
                            <div class="summary">
                                <h3>Información Personal</h3>
                                <p><strong>Nombre: </strong><?php echo $_SESSION['nombres'] . ' ' . $_SESSION['apellidoP'] . ' ' . $_SESSION['apellidoM']; ?></p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Materias</th>
                                            <th>Primer Parcial</th>
                                            <th>Segundo Parcial</th>
                                            <th>Tercer Parcial</th>
                                            <th>Calificación Final</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($calificaciones as $calificacion): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($calificacion['materia']); ?></td>
                                                <td><?php echo htmlspecialchars($calificacion['primerParcial']); ?></td>
                                                <td><?php echo htmlspecialchars($calificacion['segundoParcial']); ?></td>
                                                <td><?php echo htmlspecialchars($calificacion['tercerParcial']); ?></td>
                                                <td><?php echo htmlspecialchars($calificacion['calificacionFinal']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- ======= Pie de página (Footer) ======= -->
            <footer id="footer" class="footer">
                <div class="container">
                    <div class="copyright">
                        &copy; <strong><span>Universidad Enrique Díaz de León</span></strong>. Todos los derechos reservados.
                    </div>
                </div>
            </footer>

            <!-- Vendor JS Files -->
            <script src="../PlantillaFront/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="../PlantillaFront/assets/vendor/jquery/jquery.min.js"></script>
        </body>
    </html>
    <?php
}
?>
