# Cambio de modo
SET GLOBAL sql_mode = 'STRICT_TRANS_TABLES';

DROP DATABASE IF EXISTS fp_pro;
CREATE DATABASE IF NOT EXISTS fp_pro
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish_ci;
 
USE fp_pro;
CREATE TABLE docentes (
	nif CHAR(9) NOT NULL UNIQUE,
    nombre VARCHAR(50) NOT NULL,
    edad TINYINT NULL,
    PRIMARY KEY PK_docentes_nif (nif)
) ENGINE InnoDB;
 
CREATE TABLE alumnos (
	nif CHAR(9) NOT NULL UNIQUE,
    nombre VARCHAR(50) NOT NULL,
    fechanac DATE NOT NULL,
    pagado BOOLEAN NOT NULL,
    importe DECIMAL (6,2) NOT NULL,
    docentes_nif CHAR(9) NOT NULL,
    PRIMARY KEY PK_alumnos_nif (nif),
    FOREIGN KEY FK_alumnos_docentes_nif (docentes_nif)
    REFERENCES docentes (nif)
) ENGINE InnoDB;
 
DESCRIBE docentes;
DESCRIBE alumnos;

# Visualizar el modo SQL
SHOW VARIABLES LIKE 'sql_mode';
# Cambio de modo
SET GLOBAL sql_mode = 'STRICT_TRANS_TABLES';

# Cambio global hacerlo en my.cnf o my.ini, ponerlo al final 
# En windows estará en C:\xampp\mysql
# sql_mode=STRICT_TRANS_TABLES

INSERT INTO docentes VALUES
("11223344G", "Iván Rodríguez", 47);

INSERT INTO alumnos VALUES
("33334444S", "Blanca Soler", "2000-02-10", 1, 4100.50, "11223344G"),
("55556666A", "Alba Jiménez", "2000-06-10", 1, 4100.50, "11223344G"),
("11112222G", "Juan Carlos Romero", "2000-06-10", 0, 4100.50, "11223344G");

SELECT * FROM docentes;
SELECT * FROM alumnos;

