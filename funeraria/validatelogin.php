<?php
session_start(); // Iniciar sesión

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "funeraria");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Verificar si el usuario existe en la base de datos
$sql = "SELECT id_cliente, nombre, contraseña FROM clientes WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['contraseña']; // Obtener la contraseña encriptada

    // Verificar la contraseña usando password_verify()
    if (password_verify($password, $hashed_password)) {
        // Iniciar sesión y almacenar datos en $_SESSION
        $_SESSION['id_cliente'] = $row['id_cliente'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['email'] = $email;

        echo "<script>
            alert('Inicio de sesión exitoso.');
            window.location.href = 'funeraria.php'; 
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Contraseña incorrecta.');
            window.location.href = 'login.php';
        </script>";
        exit();
    }
} else {
    echo "<script>
        alert('El correo no está registrado.');
        window.location.href = 'login.php';
    </script>";
    exit();
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>
