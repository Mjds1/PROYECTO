<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$database = "test";
$username = "root";
$password = "";

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta SQL
$sql = "SELECT placa, marca, chofer, ruta FROM transportes ORDER BY marca";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<div>
    <a class="btn btn-outline-primary" href="index.html" style="font-size: 18px; font-weight: 600; color: #7F0000;">Inicio</a>
</div>
             

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportes</title>
    <style>
        /* Estilos generales */
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #f0f0f0;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
        }
        h2 {
            text-align: center;
        }
        /* Estilos de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        /* Estilos del pie de página */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
        }
        #iconos a {
            color: white;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Lista de Transportes</h2>
    <table>
        <thead>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Chofer</th>
                <th>Ruta</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Mostrar datos en la tabla
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["placa"] . "</td>";
                    echo "<td>" . $row["marca"] . "</td>";
                    echo "<td>" . $row["chofer"] . "</td>";
                    echo "<td>" . $row["ruta"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>0 datos consultados</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<footer class="w-100  d-flex bg-dark align-items-center justify-content-center flex-wrap">
  <p class="fs-5 px-3  pt-3">La Cazadora R.L &copy; Todos Los Derechos Reservados 2024</p>
  <div id="iconos" >
      <a href="#"><i class="bi bi-facebook"></i></a>
      <a href="#"><i class="bi bi-twitter"></i></a>
      <a href="#"><i class="bi bi-instagram"></i></a> 
  </div>
</footer>
<!-- Option 1: Bootstrap Bundle with Popper -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="main.js"></script>
</body>

</html>

<?php
// Cerrar la conexión
mysqli_close($conn);
?>
