<?php
// Establecer la conexión con la base de datos (cambiar estos datos según tu configuración)
$servername = "localhost";
$database = "test";
$username = "root";
$password = "";

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = password_hash($_POST['password'], PASSWORD_DEFAULT); // Se recomienda almacenar las contraseñas hasheadas

// Preparar la consulta SQL para insertar un nuevo usuario
$sql = "INSERT INTO usuarios (correo, usuario, contrasena) VALUES ('$correo', '$usuario', '$contrasena')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Usuario registrado correctamente.";
} else {
    echo "Error al registrar usuario: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>