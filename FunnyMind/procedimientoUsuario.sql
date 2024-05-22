DELIMITER //

CREATE PROCEDURE InsertarUsuario(
    IN p_primer_nombre VARCHAR(50),
    IN p_segundo_nombre VARCHAR(50),
    IN p_primer_apellido VARCHAR(50),
    IN p_segundo_apellido VARCHAR(50),
    IN p_fecha_nacimiento DATE,
    IN p_genero ENUM ('Masculino','Femenino'),
    IN p_correo VARCHAR(100),
    IN p_contrasena VARCHAR(255)
)
BEGIN
    INSERT INTO usuarios (
        primer_nombre,
        segundo_nombre,
        primer_apellido,
        segundo_apellido,
        fecha_nacimiento,
        genero,
        correo,
        contrasena
    ) VALUES (
        p_primer_nombre,
        p_segundo_nombre,
        p_primer_apellido,
        p_segundo_apellido,
        p_fecha_nacimiento,
        p_genero,
        p_correo,
        p_contrasena
    );
END //

DELIMITER ;