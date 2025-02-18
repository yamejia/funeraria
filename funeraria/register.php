<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Iniciar sesion - </title>
</head>
<body>
    <div class="form-student">
        <form action="./validateregister.php" method="post">
            <h1>CREAR UNA CUENTA</h1>
            <input type="text" minlength="1" maxlength="10" placeholder="Cedula" name="cedula">
            <input type="text" placeholder="Nombre" name="nombre">
            <input type="text" placeholder="Apellido" name="apellido">
            <input type="text" placeholder="Direccion" name="direccion">
            <input type="email" placeholder="Email" name="email" id="email" required>
            <div class="password-container">
            <input type="password" id="password" name="password" placeholder="Contraseña" minlength="8">
            <i class="fa-solid fa-eye-slash" id="togglePassword"></i>
            </div>
            <button type="submit" class="send">Crear cuenta</button>
            <a href="login.php" class="reset">Volver</a>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>