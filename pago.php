<?php
// pago.php
// Si se envía el formulario, procesamos el pago
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mesesSeleccionados = isset($_POST['mes']) ? $_POST['mes'] : [];

    // Aquí puedes agregar lógica para guardar el pago en la base de datos o procesarlo según sea necesario.
    // Por simplicidad, simplemente devolvemos una respuesta de éxito.

    if (!empty($mesesSeleccionados)) {
        echo '<script>alert("Pago exitoso");</script>';
    } else {
        echo '<script>alert("Por favor, seleccione al menos un mes para pagar.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Pagos</title>
    <!-- Enlace a tu CSS principal -->
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            color: #333;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
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
            justify-content: space-between;
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
        .summary h3 {
            margin-top: 0;
            font-size: 1.25rem;
        }
        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .form-check-input {
            margin-right: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.875rem;
            color: #6c757d;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <img src="Img/universidad-enrique-diaz-de-leon-logo-896B422A00-seeklogo.com.png" alt="" class="logo">
                <h2 class="card-title">Gestión de Pagos Semestrales</h2>
            </div>
            <div class="card-body">
                <p>Aquí puedes gestionar los pagos semestrales de tu curso. Selecciona los meses correspondientes y procede con el pago.</p>

                <!-- Resumen de Pagos -->
                <div class="summary">
                    <h3>Resumen de Pagos</h3>
                    <p><strong>Costo por mes:</strong> $2500 MXN</p>
                    <p><strong>Total a pagar:</strong> $<span id="totalAmount">0</span> MXN</p>
                </div>

                <form id="pagoForm" method="post">
                    <div class="form-check">
                        <input type="checkbox" name="mes[]" value="enero" id="enero" class="form-check-input" data-price="2500">
                        <label for="enero" class="form-check-label">Enero - 2500 MXN</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="mes[]" value="febrero" id="febrero" class="form-check-input" data-price="2500">
                        <label for="febrero" class="form-check-label">Febrero - 2500 MXN</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="mes[]" value="marzo" id="marzo" class="form-check-input" data-price="2500">
                        <label for="marzo" class="form-check-label">Marzo - 2500 MXN</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="mes[]" value="abril" id="abril" class="form-check-input" data-price="2500">
                        <label for="abril" class="form-check-label">Abril - 2500 MXN</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="mes[]" value="mayo" id="mayo" class="form-check-input" data-price="2500">
                        <label for="mayo" class="form-check-label">Mayo - 2500 MXN</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="mes[]" value="junio" id="junio" class="form-check-input" data-price="2500">
                        <label for="junio" class="form-check-label">Junio - 2500 MXN</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="mes[]" value="julio" id="julio" class="form-check-input" data-price="2500">
                        <label for="julio" class="form-check-label">Julio - 2500 MXN</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="mes[]" value="agosto" id="agosto" class="form-check-input" data-price="2500">
                        <label for="agosto" class="form-check-label">Agosto - 2500 MXN</label>
                    </div>
                    <button type="submit" class="btn-primary">Pagar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?php echo date("Y"); ?> Universidad Enrique Díaz de León. Todos los derechos reservados.</p>
    </div>

    <script>
        // Actualizar el total de pagos basado en las selecciones
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.form-check-input');
            const totalAmountElement = document.getElementById('totalAmount');
            const updateTotal = () => {
                let total = 0;
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        total += parseFloat(checkbox.getAttribute('data-price'));
                    }
                });
                totalAmountElement.textContent = total;
            };
            checkboxes.forEach(checkbox => checkbox.addEventListener('change', updateTotal));
            updateTotal();
        });
    </script>
</body>
</html>
