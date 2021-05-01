# SQL Manager 2010 for MySQL 4.5.0.9
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : baselab


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `baselab`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `baselab`;

#
# Structure for the `empresa` table : 
#

CREATE TABLE `empresa` (
  `empresa_id` int(11) NOT NULL AUTO_INCREMENT,
  `dosificacion_id` int(11) DEFAULT NULL,
  `empresa_nombre` varchar(150) DEFAULT NULL,
  `empresa_eslogan` varchar(250) DEFAULT NULL,
  `empresa_direccion` varchar(250) DEFAULT NULL,
  `empresa_telefono` varchar(250) DEFAULT NULL,
  `empresa_imagen` varchar(250) DEFAULT NULL,
  `empresa_zona` varchar(250) DEFAULT NULL,
  `empresa_ubicacion` varchar(250) DEFAULT NULL,
  `empresa_departamento` varchar(250) DEFAULT NULL,
  `empresa_propietario` varchar(250) DEFAULT NULL,
  `empresa_codigo` varchar(250) DEFAULT NULL,
  `empresa_email` varchar(250) DEFAULT NULL,
  `empresa_profesion` varchar(250) DEFAULT NULL,
  `empresa_cargo` varchar(250) DEFAULT NULL,
  `empresa_latitud` varchar(50) DEFAULT NULL,
  `empresa_longitud` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`empresa_id`),
  UNIQUE KEY `empresa_id` (`empresa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `estado` table : 
#

CREATE TABLE `estado` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_descripcion` varchar(50) DEFAULT NULL,
  `estado_tipo` int(11) DEFAULT NULL,
  `estado_color` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`estado_id`),
  UNIQUE KEY `estado_id` (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `extencion` table : 
#

CREATE TABLE `extencion` (
  `extencion_id` int(11) NOT NULL AUTO_INCREMENT,
  `extencion_descripcion` longtext DEFAULT NULL,
  PRIMARY KEY (`extencion_id`),
  UNIQUE KEY `extencion_id` (`extencion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Structure for the `genero` table : 
#

CREATE TABLE `genero` (
  `genero_id` int(11) NOT NULL AUTO_INCREMENT,
  `genero_nombre` longtext DEFAULT NULL,
  PRIMARY KEY (`genero_id`),
  UNIQUE KEY `genero_id` (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `paciente` table : 
#

CREATE TABLE `paciente` (
  `paciente_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `extencion_id` int(11) DEFAULT NULL,
  `paciente_nombre` varchar(150) DEFAULT NULL,
  `paciente_edad` int(11) DEFAULT NULL,
  `paciente_direccion` varchar(150) DEFAULT NULL,
  `paciente_ci` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`paciente_id`),
  UNIQUE KEY `paciente_id` (`paciente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `prueba` table : 
#

CREATE TABLE `prueba` (
  `prueba_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `tipoprueba_id` int(11) DEFAULT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `prueba_codigo` varchar(50) DEFAULT NULL,
  `prueba_fechasolicitud` datetime DEFAULT NULL,
  `prueba_medicolab` varchar(250) DEFAULT NULL,
  `prueba_fecharecepcion` datetime DEFAULT NULL,
  `prueba_procedencia` varchar(250) DEFAULT NULL,
  `prueba_fechainforme` datetime DEFAULT NULL,
  `prueba_nombreanalisis` text DEFAULT NULL,
  `prueba_descricpion` text DEFAULT NULL,
  `prueba_resultados` text DEFAULT NULL,
  `prueba_observacion` text DEFAULT NULL,
  `prueba_precio` float DEFAULT NULL,
  `prueba_acuenta` float DEFAULT NULL,
  `prueba_fechacuenta` datetime DEFAULT NULL,
  `prueba_saldo` float DEFAULT NULL,
  `prueba_fechasaldo` datetime DEFAULT NULL,
  PRIMARY KEY (`prueba_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `tipo_prueba` table : 
#

CREATE TABLE `tipo_prueba` (
  `tipoprueba_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoprueba_descripcion` varchar(150) DEFAULT NULL,
  `tipoprueba_precio` float DEFAULT NULL,
  PRIMARY KEY (`tipoprueba_id`),
  UNIQUE KEY `tipoprueba_id` (`tipoprueba_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `usuario` table : 
#

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(50) DEFAULT NULL,
  `usuario_email` varchar(50) DEFAULT NULL,
  `usuario_login` varchar(50) DEFAULT NULL,
  `usuario_clave` varchar(50) DEFAULT NULL,
  `usuario_imagen` varchar(255) DEFAULT NULL,
  `tipousuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for the `empresa` table  (LIMIT 0,500)
#

INSERT INTO `empresa` (`empresa_id`, `dosificacion_id`, `empresa_nombre`, `empresa_eslogan`, `empresa_direccion`, `empresa_telefono`, `empresa_imagen`, `empresa_zona`, `empresa_ubicacion`, `empresa_departamento`, `empresa_propietario`, `empresa_codigo`, `empresa_email`, `empresa_profesion`, `empresa_cargo`, `empresa_latitud`, `empresa_longitud`) VALUES 
  (1,1,'LABORATORIO TEST CENTER','LAS MAS MEJORES PRUEBAS','URUGUAY Nº 461, EDIFICIO FERRARI 2DO PISO','(591)70351037 - (591)60351322','1582753889.png','ZONA CENTRAL','CERCADO - COCHABAMBA','Cochabamba','ANA GABRIELA ORELLANA RODRIGUEZ','rv9JQ0','testcenter@gmail.com','LIC. BIOQUIMICA','PROPIETARIO',NULL,NULL);
COMMIT;

#
# Data for the `estado` table  (LIMIT 0,500)
#

INSERT INTO `estado` (`estado_id`, `estado_descripcion`, `estado_tipo`, `estado_color`) VALUES 
  (1,'ACTIVO',1,'a04040'),
  (2,'INACTIVO',1,'#a3a3a3');
COMMIT;

#
# Data for the `extencion` table  (LIMIT 0,500)
#

INSERT INTO `extencion` (`extencion_id`, `extencion_descripcion`) VALUES 
  (1,'CB'),
  (2,'LP'),
  (3,'SC'),
  (4,'PT'),
  (5,'OR'),
  (6,'BN'),
  (7,'PD'),
  (8,'TR'),
  (9,'SC');
COMMIT;

#
# Data for the `genero` table  (LIMIT 0,500)
#

INSERT INTO `genero` (`genero_id`, `genero_nombre`) VALUES 
  (1,'MASCULINO'),
  (2,'FEMENINO');
COMMIT;

#
# Data for the `paciente` table  (LIMIT 0,500)
#

INSERT INTO `paciente` (`paciente_id`, `estado_id`, `genero_id`, `extencion_id`, `paciente_nombre`, `paciente_edad`, `paciente_direccion`, `paciente_ci`) VALUES 
  (1,1,1,1,'CORNELIO RIOS RELOZ',38,'N/A','5920892'),
  (2,1,1,1,'MARIO CHOQUE GALARZA',38,'N/A','695983923');
COMMIT;

#
# Data for the `prueba` table  (LIMIT 0,500)
#

INSERT INTO `prueba` (`prueba_id`, `usuario_id`, `tipoprueba_id`, `paciente_id`, `prueba_codigo`, `prueba_fechasolicitud`, `prueba_medicolab`, `prueba_fecharecepcion`, `prueba_procedencia`, `prueba_fechainforme`, `prueba_nombreanalisis`, `prueba_descricpion`, `prueba_resultados`, `prueba_observacion`, `prueba_precio`, `prueba_acuenta`, `prueba_fechacuenta`, `prueba_saldo`, `prueba_fechasaldo`) VALUES 
  (1,1,2,1,'CRR001','2021-04-30 15:30:11','N/A','0000-00-00 00:00:00','PERU','2021-05-01 12:15:18','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC\r\n','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.\r\n',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),
  (2,1,2,2,'MCG002','2021-04-30 15:35:25','N/A','0000-00-00 00:00:00','PERU','2021-05-01 12:20:22','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 35.8 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');
COMMIT;

#
# Data for the `tipo_prueba` table  (LIMIT 0,500)
#

INSERT INTO `tipo_prueba` (`tipoprueba_id`, `tipoprueba_descripcion`, `tipoprueba_precio`) VALUES 
  (1,'PRUEBA RAPIDA',150),
  (2,'HISOPADO NASOFARINGEO',150),
  (3,'PRUEBA ANTIGENO NASAL',200),
  (4,'PRUEBA DE ELISSA',250),
  (5,'PRUEBA PCR',500);
COMMIT;

#
# Data for the `usuario` table  (LIMIT 0,500)
#

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_email`, `usuario_login`, `usuario_clave`, `usuario_imagen`, `tipousuario_id`) VALUES 
  (1,'Ana Gabriela Orellana Rodriguez','superusuario@micorreo.com','super','1b3231655cebb7a1f783eddf27d254ca','1616930453.jpg',1);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;