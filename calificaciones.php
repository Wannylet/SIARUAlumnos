<?php
// calificaciones.php
$carreras = [
    'Ingeniería de Software' => [
        'Primero' => [
            'Programación I' => '100',
            'Matemáticas I' => '100',
            'Física I' => '100'
        ],
        'Segundo' => [
            'Programación II' => '100',
            'Matemáticas II' => '100',
            'Física II' => '100'
        ]
    ],
    'Derecho' => [
        'Primero' => [
            'Introducción al Derecho' => '100',
            'Historia del Derecho' => '100',
            'Derecho Romano I' => '100'
        ],
        'Segundo' => [
            'Derecho Constitucional I' => '100',
            'Derecho Penal I' => '100',
            'Derecho Civil I' => '100'
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
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
                <h2 class="card-title">Gestión de Calificaciones</h2>
            </div>
            <div class="card-body">
                <p>Aquí puedes gestionar las calificaciones de los alumnos. Selecciona la carrera y el grado para ver las calificaciones correspondientes.</p>

                <form id="calificacionesForm" method="post">
                    <div class="form-check">
                        <label for="carrera">Carrera:</label>
                        <select id="carrera" name="carrera">
                            <option value="">Seleccionar carrera</option>
                            <?php foreach (array_keys($carreras) as $carrera): ?>
                                <option value="<?php echo $carrera; ?>"><?php echo $carrera; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-check">
                        <label for="grado">Grado:</label>
                        <select id="grado" name="grado" disabled>
                            <option value="">Seleccionar grado</option>
                        </select>
                    </div>
                    <button type="button" id="verCalificaciones" class="btn-primary" disabled>Ver Calificaciones</button>
                </form>

                <!-- Resumen de Calificaciones -->
                <div id="resumenCalificaciones" class="summary hidden">
                    <h3>Resumen de Calificaciones</h3>
                    <table id="tablaCalificaciones">
                        <thead>
                            <tr>
                                <th>Materia</th>
                                <th>Calificación</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?php echo date("Y"); ?> Universidad Enrique Díaz de León. Todos los derechos reservados.</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carreras = <?php echo json_encode($carreras); ?>;
            const carreraSelect = document.getElementById('carrera');
            const gradoSelect = document.getElementById('grado');
            const verCalificacionesButton = document.getElementById('verCalificaciones');
            const resumenCalificaciones = document.getElementById('resumenCalificaciones');
            const tablaCalificaciones = document.getElementById('tablaCalificaciones').querySelector('tbody');

            carreraSelect.addEventListener('change', function () {
                const carreraSeleccionada = carreraSelect.value;
                gradoSelect.innerHTML = '<option value="">Seleccionar grado</option>';
                gradoSelect.disabled = !carreraSeleccionada;

                if (carreraSeleccionada) {
                    const grados = Object.keys(carreras[carreraSeleccionada]);
                    grados.forEach(grado => {
                        const option = document.createElement('option');
                        option.value = grado;
                        option.textContent = grado;
                        gradoSelect.appendChild(option);
                    });
                }
            });

            gradoSelect.addEventListener('change', function () {
                verCalificacionesButton.disabled = !gradoSelect.value;
            });

            verCalificacionesButton.addEventListener('click', function () {
                const carrera = carreraSelect.value;
                const grado = gradoSelect.value;
                const calificaciones = carreras[carrera][grado];

                tablaCalificaciones.innerHTML = '';
                Object.keys(calificaciones).forEach(materia => {
                    const row = document.createElement('tr');
                    const materiaCell = document.createElement('td');
                    materiaCell.textContent = materia;
                    const calificacionCell = document.createElement('td');
                    calificacionCell.textContent = calificaciones[materia];
                    row.appendChild(materiaCell);
                    row.appendChild(calificacionCell);
                    tablaCalificaciones.appendChild(row);
                });

                resumenCalificaciones.classList.remove('hidden');
            });
        });
    </script>
</body>
</html>
