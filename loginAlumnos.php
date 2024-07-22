<?php
session_start();

if (isset($_SESSION['username'])==true) {
    // Redireccionamiento a la página principal
    header("Location: Interface.php");
    die();
} else {
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <title>Inicio de Sesión para el Alumno</title>
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
        </head>

        <body>
            <main>
                <div class="container">
                    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                                    <div class="d-flex justify-content-center py-4">
                                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                                            <img src="Img/universidad-enrique-diaz-de-leon-logo-896B422A00-seeklogo.com.png" alt="">
                                            <span class="d-none d-lg-block">Inicio de Sesión</span>
                                        </a>
                                    </div><!-- End Logo -->
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="pt-4 pb-2">
                                                <h5 class="card-title text-center pb-0 fs-4">Identifícate para entrar a tu cuenta</h5>
                                                <p class="text-center small">Ingresa tu usuario y tu contraseña para ingresar</p>
                                            </div>
                                            <form class="row g-3 needs-validation" novalidate>
                                                <div class="col-12">
                                                    <label for="yourUsername" class="form-label">Usuario</label>
                                                    <div class="input-group has-validation">
                                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                        <input type="text" name="username" id="username" class="form-control" required>
                                                        <div class="invalid-feedback">Por favor, ingrese su usuario.</div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="yourPassword" class="form-label">Contraseña</label>
                                                    <input type="password" name="password" id="password" class="form-control" required>
                                                    <div class="invalid-feedback">Por favor, ingrese su contraseña</div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                                        <label class="form-check-label" for="rememberMe">Recordar usuario</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary w-100" type="button" id="registrate">Conectar</button>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div id="error-msg" class="alert alert-danger d-none" role="alert">
                                                        Usuario o contraseña incorrectos.
                                                    </div>
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
            <script src="js/JQuery.js"></script>
            <script type="text/javascript">
                $(function () {
                    $('#registrate').click(function () {
                        var u = $('#username').val();
                        var p = $('#password').val();
                        var obj = {
                            username: u,
                            password: p
                        };
                        $.post('login.php', obj, function (resp) {
                        window.location.href = 'Interface.php';
//                            if (resp === 'success') {
//                                window.location.href = 'index1.php';
//                            } else {
//                                $('#error-msg').removeClass('d-none');
//                            }
                        });
                    });
                });
            </script>
        </body>
    </html>
    <?php
    echo "No hay sesion habilitada para el usuario:" . $_SESSION['username'];
}
?>
