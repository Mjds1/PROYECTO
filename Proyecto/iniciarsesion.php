<?php
session_start();

$servername = "localhost";
$database = "test";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$usuario = $_POST['usuario'];
$contrasena = $_POST['password'];

$sql = "SELECT id, usuario, contrasena FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($contrasena, $row['contrasena'])) {
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario'] = $row['usuario'];
        echo "¡Inicio de sesión exitoso! Bienvenido, " . $row['usuario'];
        header("Location: transportes.php"); // Cambia "otra_pagina.php" por la URL de la página a la que deseas redirigir al usuario
        exit();
    } else {
        echo "Usuario o contraseña incorrectos";
    }
} else {
    echo "Usuario no encontrado";
}

$stmt->close();
$conn->close();
?>
