-- Creamos la tabla para la autenticación de usuarios
CREATE TABLE IF NOT EXISTS autentication(
	id_usuario INT AUTO_INCREMENT, -- Identificador único del usuario
    usuario VARCHAR(255) NOT NULL, -- Nombre de usuario
    clave VARCHAR(255) NOT NULL, -- Clave de acceso
    nombres VARCHAR(255) NOT NULL, -- Nombre completo del usuario
    correo VARCHAR(255) NOT NULL, -- Correo electrónico del usuario
    numero VARCHAR(20) NULL, -- Número de teléfono del usuario (opcional)
    dni VARCHAR(10) NOT NULL, -- Número de documento de identidad del usuario
    edad TINYINT NULL, -- Edad del usuario (opcional)
    especialidad VARCHAR(100) NULL, -- Especialidad del usuario (opcional)
    foto TEXT NULL, -- URL o ruta de la foto del usuario (opcional)
    fecha_creacion DATETIME NOT NULL, -- Fecha de creación del registro
    PRIMARY KEY(id_usuario) -- Clave primaria
);

-- Creamos la tabla para los proyectos
CREATE TABLE IF NOT EXISTS proyectos( 
    id_proyecto INT AUTO_INCREMENT, -- Identificador único del proyecto
    nombre VARCHAR(255) NOT NULL, -- Nombre del proyecto
    descripcion TEXT NOT NULL, -- Descripción del proyecto
    fecha_inicio DATE NOT NULL, -- Fecha de inicio del proyecto
    fecha_final DATE NOT NULL, -- Fecha de finalización del proyecto
    PRIMARY KEY(id_proyecto) -- Clave primaria
);

-- Creamos la tabla para los empleados
CREATE TABLE IF NOT EXISTS empleados(
    id_empleado INT AUTO_INCREMENT, -- Identificador único del empleado
    nombre VARCHAR(255) NOT NULL, -- Nombre completo del empleado
    salario DECIMAL(10,2) NOT NULL, -- Salario del empleado
    departamento VARCHAR(255) NULL, -- Departamento al que pertenece el empleado (opcional)
    telefono VARCHAR(20) NOT NULL, -- Número de teléfono del empleado
    correo VARCHAR(100) NULL, -- Correo electrónico del empleado (opcional)
    foto TEXT NULL, -- URL o ruta de la foto del empleado (opcional)
    id_proyecto INT, -- Identificador del proyecto al que está asignado el empleado
    PRIMARY KEY(id_empleado), -- Clave primaria
    FOREIGN KEY(id_proyecto) REFERENCES proyectos (id_proyecto) ON DELETE CASCADE -- Clave foránea para relacionar con la tabla de proyectos
);
