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
        <form action="./validatelogin.php" method="post">
            <h1>INICIAR SESION</h1>
            <input type="email" placeholder="Email">
            <div class="password-container">
                <input type="password" id="password" placeholder="Contraseña">
                <i class="fa-solid fa-eye-slash" id="togglePassword"></i>
            </div>
            <button type="submit" class="send">Iniciar sesion</button>
            <a href="" class="reset">¿Olvidaste tu contraseña?</a>
            <button type="submit" class="send1">Crear una cuenta</button>
        </form>
    </div>
    <script src="../script.js"></script>
</body>
</html>