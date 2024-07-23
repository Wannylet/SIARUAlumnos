<?php
require_once 'sesion.php';

iniciarIniciarSesion();

function iniciarIniciarSesion(){
    $usuarioForm = isset($_POST['username']) ? $_POST['username'] : '';
    $contrasenaForm = isset($_POST['password']) ? $_POST['password'] : '';
    
    if (iniciarSesion($usuarioForm, $contrasenaForm)) {
        header("Location: Interfaz.php");
        exit();
    }
    
    interfazIniciarSesion();
}

function interfazIniciarSesion(){
    ?>
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <title>Iniciar sesión como alumno</title>
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
            <main>
                <div class="container">
                    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                                    <div class="d-flex justify-content-center py-4">
                                        
                                        <a href="iniciarSesion.php" class="logo d-flex align-items-center w-auto">
                                            <img src="assets/img/logo.png" alt="">
                                            <span class="d-none d-lg-block">UNEDL</span>
                                        </a>
                                        
                                    </div><!-- End Logo -->
                                    
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            
                                            <form class="row g-3 needs-validation" action="iniciarSesion.php" method="POST">
                                                
                                                <div class="pt-4 pb-2">
                                                    <h5 class="card-title text-center pb-0 fs-4">Iniciar sesión</h5>
                                                    <p class="text-center small">Ingresa tu nombre usuario y tu contraseña para ingresar.</p>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <label for="yourUsername" class="form-label">Nombre de usuario</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" name="username" id="username" class="form-control" required>
                                                        <div class="invalid-feedback">Por favor, ingrese su usuario.</div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <label for="yourPassword" class="form-label">Contraseña</label>
                                                    <input type="password" name="password" id="password" class="form-control" required>
                                                    <div class="invalid-feedback">Por favor, ingrese su contraseña.</div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <input class="btn btn-primary w-100" type="submit" id="login" value="Ingresar">
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </main><!-- End #main -->
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        </body>
    </html>
    <?php
}
?>