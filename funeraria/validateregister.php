<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "funeraria");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$cedula = trim($_POST['cedula']);
$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$direccion = trim($_POST['direccion']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Validar que el usuario no tenga más de dos cuentas con el mismo correo
$sql_check = "SELECT COUNT(*) as total FROM clientes WHERE correo = ?";
$stmt_check = $conexion->prepare($sql_check);
$stmt_check->bind_param("s", $email);
$stmt_check->execute();
$result_check = $stmt_check->get_result();
$row_check = $result_check->fetch_assoc();

if ($row_check['total'] >= 2) {
    echo "<script>
        alert('No puedes registrar más de dos cuentas con el mismo correo.');
        window.location.href = './register.php';
    </script>";
    exit();
}

// Encriptar la contraseña antes de guardarla
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insertar datos en la base de datos
$sql = "INSERT INTO clientes (id_cliente, nombre, apellido, direccion, correo, contraseña) 
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("isssss", $cedula, $nombre, $apellido, $direccion, $email, $hashed_password);

if ($stmt->execute()) {
    echo "<script>
        alert('Registro exitoso. Ahora puedes iniciar sesión.');
        window.location.href = './login.php';
    </script>";
} else {
    echo "<script>
        alert('Error en el registro.');
        window.location.href = './register.php';
    </script>";
}

// Cerrar conexiones
$stmt->close();
$stmt_check->close();
$conexion->close();
?>
