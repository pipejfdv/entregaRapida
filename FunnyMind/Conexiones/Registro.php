<?php
    require('../Conect.php');

    // Obtenemos datos del formulario
    $primer_nombre = mysqli_real_escape_string($enlace, $_POST['primer_nombre']);
    $segundo_nombre = mysqli_real_escape_string($enlace, $_POST['segundo_nombre']);
    $primer_apellido = mysqli_real_escape_string($enlace, $_POST['primer_apellido']);
    $segundo_apellido = mysqli_real_escape_string($enlace, $_POST['segundo_apellido']);
    $fecha = $_POST['fecha'];
    $fecha_nacimiento = date('Y-m-d', strtotime($fecha));
    $genero = mysqli_real_escape_string($enlace, $_POST['genero']);
    $correo = mysqli_real_escape_string($enlace, $_POST['correo']);
    $contrasena = $_POST['contrasena'];

    // Hash the password
    $passhash = password_hash($contrasena, PASSWORD_BCRYPT);

    // Consulta SQL para la inserción de datos
    $sql = "CALL InsertarUsuario ('$primer_nombre', '$segundo_nombre','$primer_apellido' ,'$segundo_apellido' ,'$fecha_nacimiento', '$genero', '$correo', '$passhash')";

    if ($enlace->query($sql) === TRUE) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar datos: " . mysqli_error($enlace);
    }

    header("Location: ../paginas/Ingreso.html");

    $enlace->close();

?>
