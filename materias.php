<?php
// materias.php

// Datos de ejemplo del usuario
$usuario = 'Kevin Anderson'; // Este dato debería venir de la sesión o base de datos
$curso_actual = 'Ingeniería de Software - Segundo Semestre'; // Este dato debería venir de la sesión o base de datos

// Materias del curso actual (Ejemplo)
$materias = [
    [
        'materia' => 'Programación II',
        'profesor' => 'Prof. Juan Pérez',
        'horario' => 'Lunes y Miércoles, 10:00 - 12:00',
        'horas_semana' => 4
    ],
    [
        'materia' => 'Matemáticas II',
        'profesor' => 'Prof. María López',
        'horario' => 'Martes y Jueves, 8:00 - 10:00',
        'horas_semana' => 4
    ],
    [
        'materia' => 'Física II',
        'profesor' => 'Prof. Carlos Ramírez',
        'horario' => 'Viernes, 10:00 - 14:00',
        'horas_semana' => 4
    ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
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
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <img src="Img/universidad-enrique-diaz-de-leon-logo-896B422A00-seeklogo.com.png" alt="" class="logo">
                <h2 class="card-title">Materias del Curso Actual</h2>
            </div>
            <div class="card-body">
                <p>Bienvenido, <?php echo $usuario; ?>. Aquí puedes ver las materias de tu curso actual.</p>

                <div class="summary">
                    <h3><?php echo $curso_actual; ?></h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Materia</th>
                                <th>Profesor</th>
                                <th>Horario</th>
                                <th>Horas por Semana</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($materias as $materia): ?>
                                <tr>
                                    <td><?php echo $materia['materia']; ?></td>
                                    <td><?php echo $materia['profesor']; ?></td>
                                    <td><?php echo $materia['horario']; ?></td>
                                    <td><?php echo $materia['horas_semana']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?php echo date("Y"); ?> Universidad Enrique Díaz de León. Todos los derechos reservados.</p>
    </div>
</body>
</html>
