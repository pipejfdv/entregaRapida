<?php
// Incluir el archivo de conexión a la base de datos
require('../Conect.php');

// Verificar si se ha enviado el formulario de login
if (isset($_POST['login'])) {
    // Obtener el usuario y la contraseña enviados desde el formulario
    $usuario_login = mysqli_real_escape_string($enlace, $_POST['usuario']);
    $contrasena_login = $_POST['contrasena'];

    // Consulta SQL para obtener la contraseña encriptada del usuario
    $sql_login = "SELECT contrasena FROM usuarios WHERE correo = '$usuario_login'";
    $resultado = mysqli_query($enlace, $sql_login);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        // Verificar si se encontró un usuario con ese correo
        if ($fila = mysqli_fetch_assoc($resultado)) {
            // Obtener la contraseña encriptada de la base de datos
            $contrasena_encriptada = trim($fila['contrasena']);

            // Verificar si la contraseña ingresada coincide con la contraseña encriptada
            if (password_verify($contrasena_login, $contrasena_encriptada)) {
                // La contraseña es correcta, redirigir al usuario a la página de inicio
                header("Location: ../Paginas/home.html");
                exit; // Detener la ejecución del script después de redirigir
            } else {
                // La contraseña es incorrecta, mostrar un mensaje de error
                echo '<div class="alert alert-danger">Credenciales Incorrectas</div>';
            }
        } else {
            // No se encontró ningún usuario con ese correo, mostrar un mensaje de error
            echo '<div class="alert alert-danger">Usuario no encontrado</div>';
        }
    } else {
        // Hubo un error en la consulta SQL, mostrar un mensaje de error
        echo '<div class="alert alert-danger">Error en la consulta: ' . mysqli_error($enlace) . '</div>';
    }
}
?>

