CREATE DATABASE veterinaria;
USE veterinaria;

CREATE TABLE propietarios (
    idpropietario INT AUTO_INCREMENT PRIMARY KEY,
    apellidos VARCHAR(40) NOT NULL,
    nombres VARCHAR(40)
)engine=InnoDB;

CREATE TABLE mascotas (
    idmascota INT AUTO_INCREMENT PRIMARY KEY,
    idpropietario INT NOT NULL,
    tipo enum('perro', 'gato') NOT NULL,
    nombre VARCHAR(40) NOT NULL,
    color VARCHAR(40) NOT NULL,
    genero enum('macho', 'hembra') NOT NULL,
    vive enum('si', 'no') NOT NULL, 
    constraint fk_idproprietario FOREIGN KEY (idpropietario) REFERENCES propietarios(idpropietario)
)engine=InnoDB;

INSERT into propietarios (apellidos, nombres) values
('Perez', 'Juan'),
('Gomez', 'Ana'),
('Lopez', 'Carlos');

INSERT INTO mascotas (idpropietario, tipo, nombre, color, genero) values
(1, 'perro', 'Firulais', 'marron', 'macho'),
(1, 'gato', 'Miau', 'blanco', 'hembra'),
(2, 'perro', 'Rex', 'negro', 'macho'),
(2, 'gato', 'Luna', 'gris', 'hembra');

SELECT * FROM mascotas;

SELECT *
  MA.idmascota,
  MA.tipo,
  MA.nombre,
  MA.color,
  MA.genero,
  CONCAT(PR.apellidos,' ',PR.nombres) 'propietario'
  FROM mascotas MA
  INNER JOIN propietario PR ON ma.idpropietario = PR.idpropietario;
  ORDER BY MA.nombre;