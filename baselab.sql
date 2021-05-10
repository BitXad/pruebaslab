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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Structure for the `estado` table : 
#

CREATE TABLE `estado` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_descripcion` varchar(50) DEFAULT NULL,
  `estado_tipo` int(11) DEFAULT NULL,
  `estado_color` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`estado_id`),
  UNIQUE KEY `estado_id` (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Structure for the `extencion` table : 
#

CREATE TABLE `extencion` (
  `extencion_id` int(11) NOT NULL AUTO_INCREMENT,
  `extencion_descripcion` longtext DEFAULT NULL,
  PRIMARY KEY (`extencion_id`),
  UNIQUE KEY `extencion_id` (`extencion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Structure for the `genero` table : 
#

CREATE TABLE `genero` (
  `genero_id` int(11) NOT NULL AUTO_INCREMENT,
  `genero_nombre` longtext DEFAULT NULL,
  PRIMARY KEY (`genero_id`),
  UNIQUE KEY `genero_id` (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
  `paciente_codigo` varchar(20) DEFAULT NULL,
  `paciente_ci` varchar(20) DEFAULT NULL,
  `paciente_celular` varchar(50) DEFAULT NULL,
  `paciente_telefono` varchar(50) DEFAULT NULL,
  `paciente_nit` varchar(30) DEFAULT NULL,
  `paciente_razon` varchar(250) DEFAULT NULL,
  `paciente_foto` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`paciente_id`),
  UNIQUE KEY `paciente_id` (`paciente_id`),
  KEY `fk_estado_paciente` (`estado_id`),
  KEY `fk_extencion_ci` (`extencion_id`),
  KEY `fk_genero_paciente` (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Structure for the `parametros` table : 
#

CREATE TABLE `parametros` (
  `parametro_id` int(11) NOT NULL AUTO_INCREMENT,
  `parametro_numrecegr` int(11) DEFAULT NULL,
  `parametro_numrecing` int(11) DEFAULT NULL,
  `parametro_copiasfact` int(11) DEFAULT NULL,
  `parametro_tipoimpresora` varchar(20) DEFAULT NULL,
  `parametro_numcuotas` int(11) DEFAULT NULL,
  `parametro_montomax` float(9,3) DEFAULT NULL,
  `parametro_diasgracia` int(11) DEFAULT NULL,
  `parametro_diapago` int(11) DEFAULT NULL,
  `parametro_periododias` int(11) DEFAULT NULL,
  `parametro_interes` int(11) DEFAULT NULL,
  `parametro_tituldoc` varchar(150) NOT NULL,
  `parametro_mostrarcategoria` int(11) DEFAULT NULL,
  `parametro_diagnostico` varchar(50) DEFAULT NULL,
  `parametro_solucion` varchar(50) DEFAULT NULL,
  `parametro_modoventas` int(11) DEFAULT NULL,
  `parametro_imprimircomanda` int(11) DEFAULT NULL,
  `parametro_anchoboton` int(11) DEFAULT NULL,
  `parametro_altoboton` int(11) DEFAULT NULL,
  `parametro_colorboton` varchar(30) DEFAULT NULL,
  `parametro_anchoimagen` int(11) DEFAULT NULL,
  `parametro_altoimagen` int(11) DEFAULT NULL,
  `parametro_formaimagen` varchar(20) DEFAULT NULL,
  `parametro_modulorestaurante` int(11) DEFAULT NULL,
  `parametro_permisocredito` int(11) DEFAULT NULL,
  `parametro_agruparitems` int(11) DEFAULT NULL,
  `parametro_diasvenc` int(11) DEFAULT 0,
  `parametro_anchofactura` float DEFAULT NULL,
  `parametro_altofactura` float(9,3) DEFAULT NULL,
  `parametro_margenfactura` float(9,3) DEFAULT NULL,
  `parametro_imagenreal` int(11) DEFAULT NULL,
  `parametro_diasentrega` int(11) DEFAULT NULL,
  `parametro_notaentrega` int(11) DEFAULT NULL,
  `parametro_segservicio` int(11) DEFAULT NULL,
  `parametro_apikey` varchar(250) DEFAULT NULL,
  `parametro_serviciofact` int(11) DEFAULT NULL,
  `parametro_sucursales` int(11) DEFAULT NULL,
  `parametro_logomonitor` varchar(150) DEFAULT NULL,
  `parametro_fondomonitor` varchar(150) DEFAULT NULL,
  `parametro_cantidadproductos` float DEFAULT NULL,
  `parametro_datosboton` int(11) DEFAULT NULL,
  `moneda_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`parametro_id`),
  UNIQUE KEY `parametro_id` (`parametro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
  `estado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`prueba_id`),
  UNIQUE KEY `prueba_id` (`prueba_id`),
  KEY `fk_prueba_paciente` (`paciente_id`),
  KEY `fk_prueba_usuario` (`usuario_id`),
  KEY `fk_tipo_prueba` (`tipoprueba_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Structure for the `tipo_prueba` table : 
#

CREATE TABLE `tipo_prueba` (
  `tipoprueba_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoprueba_descripcion` varchar(150) DEFAULT NULL,
  `tipoprueba_precio` float DEFAULT NULL,
  PRIMARY KEY (`tipoprueba_id`),
  UNIQUE KEY `tipoprueba_id` (`tipoprueba_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for the `empresa` table  (LIMIT 0,500)
#

INSERT INTO `empresa` (`empresa_id`, `dosificacion_id`, `empresa_nombre`, `empresa_eslogan`, `empresa_direccion`, `empresa_telefono`, `empresa_imagen`, `empresa_zona`, `empresa_ubicacion`, `empresa_departamento`, `empresa_propietario`, `empresa_codigo`, `empresa_email`, `empresa_profesion`, `empresa_cargo`, `empresa_latitud`, `empresa_longitud`) VALUES 
  (1,1,'LABORATORIO TESTCENTER','INDUSTRIA Y COMERCIO','QHALUYU ENTRE QUEWINA Y PILLPINTU','(591)78313788 - (591)60351322','1582753889.png','ZONA SANTA ANA','CERCADO - COCHABAMBA','Cochabamba','ARIEL CÁRDENAS NORIEGA','rv9JQ0','industria.comercio.acn@gmail.com','ING. COMERCIAL','PROPIETARIO',NULL,NULL);
COMMIT;

#
# Data for the `estado` table  (LIMIT 0,500)
#

INSERT INTO `estado` (`estado_id`, `estado_descripcion`, `estado_tipo`, `estado_color`) VALUES 
  (1,'PENDIENTE',1,'9f631e'),
  (2,'PROCESO',1,'c5d11a'),
  (3,'TERMINADO',1,'dac74e'),
  (4,'ENTREGADO',1,'827d7d');
COMMIT;

#
# Data for the `extencion` table  (LIMIT 0,500)
#

INSERT INTO `extencion` (`extencion_id`, `extencion_descripcion`) VALUES 
  (1,'CB'),
  (2,'LP'),
  (3,'SC'),
  (4,'BN'),
  (5,'PND');
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

INSERT INTO `paciente` (`paciente_id`, `estado_id`, `genero_id`, `extencion_id`, `paciente_nombre`, `paciente_edad`, `paciente_direccion`, `paciente_codigo`, `paciente_ci`, `paciente_celular`, `paciente_telefono`, `paciente_nit`, `paciente_razon`, `paciente_foto`) VALUES 
  (1,1,1,1,'CORNELIO RIOS RELOZ',38,'N/A',NULL,'5920892',NULL,NULL,NULL,NULL,'foto.jpg'),
  (2,1,1,1,'MARIO CHOQUE GALARZA',38,'N/A',NULL,'695983923',NULL,NULL,NULL,NULL,'foto.jpg'),
  (3,1,1,1,'ALAN FRANCO QUISPE VASQUEZ',30,'N/A',NULL,'13193077',NULL,NULL,NULL,NULL,'foto.jpg'),
  (4,1,1,1,'JUAN JOSE PEÑA GONZALES',37,'N/A',NULL,'6474081',NULL,NULL,NULL,NULL,'foto.jpg'),
  (5,1,1,1,'SUHAYB AHMED ELSAYED',1,NULL,NULL,'CE50733',NULL,NULL,NULL,NULL,'foto.jpg'),
  (6,1,2,1,'ABDELRAHMAN AHMED MOHAMED FATHI AHMED',30,'URUGUAY N 454','OFDDS01','A15805786','70789506','4522563','5152388021','LOZANO MENDEZ','foto.jpg'),
  (7,1,2,1,'HAGAR EMADELDEN LOTFY ELSAYED',26,NULL,NULL,'A21191357',NULL,NULL,NULL,NULL,'foto.jpg'),
  (8,1,1,1,'MAX KONRAD VOGGEL',76,NULL,NULL,'0',NULL,NULL,NULL,NULL,'foto.jpg'),
  (9,1,2,1,'LIZETH DANIELA QUIRUCHI GONZALES',27,NULL,NULL,'8791288',NULL,NULL,NULL,NULL,'foto.jpg');
COMMIT;

#
# Data for the `parametros` table  (LIMIT 0,500)
#

INSERT INTO `parametros` (`parametro_id`, `parametro_numrecegr`, `parametro_numrecing`, `parametro_copiasfact`, `parametro_tipoimpresora`, `parametro_numcuotas`, `parametro_montomax`, `parametro_diasgracia`, `parametro_diapago`, `parametro_periododias`, `parametro_interes`, `parametro_tituldoc`, `parametro_mostrarcategoria`, `parametro_diagnostico`, `parametro_solucion`, `parametro_modoventas`, `parametro_imprimircomanda`, `parametro_anchoboton`, `parametro_altoboton`, `parametro_colorboton`, `parametro_anchoimagen`, `parametro_altoimagen`, `parametro_formaimagen`, `parametro_modulorestaurante`, `parametro_permisocredito`, `parametro_agruparitems`, `parametro_diasvenc`, `parametro_anchofactura`, `parametro_altofactura`, `parametro_margenfactura`, `parametro_imagenreal`, `parametro_diasentrega`, `parametro_notaentrega`, `parametro_segservicio`, `parametro_apikey`, `parametro_serviciofact`, `parametro_sucursales`, `parametro_logomonitor`, `parametro_fondomonitor`, `parametro_cantidadproductos`, `parametro_datosboton`, `moneda_id`) VALUES 
  (1,760,452,3,'NORMAL',1,150000.000,14,2,7,0,'',2,'REVISION','REVISION',1,0,125,180,'warning',123,140,'',0,1,1,15,19,0.000,1.000,0,0,1,0,'AIzaSyClNsJugfWI4xOf1Or9Wdg5lD_qUqaik58',1,NULL,'','',1,1,2);
COMMIT;

#
# Data for the `prueba` table  (LIMIT 0,500)
#

INSERT INTO `prueba` (`prueba_id`, `usuario_id`, `tipoprueba_id`, `paciente_id`, `prueba_codigo`, `prueba_fechasolicitud`, `prueba_medicolab`, `prueba_fecharecepcion`, `prueba_procedencia`, `prueba_fechainforme`, `prueba_nombreanalisis`, `prueba_descricpion`, `prueba_resultados`, `prueba_observacion`, `prueba_precio`, `prueba_acuenta`, `prueba_fechacuenta`, `prueba_saldo`, `prueba_fechasaldo`, `estado_id`) VALUES 
  (1,1,2,1,'CRR001','2021-04-30 15:30:11','N/A','2021-05-10 09:06:29','PERU','2021-05-01 12:15:18','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1),
  (2,1,2,2,'MCG002','2021-04-30 15:35:25','N/A','0000-00-00 00:00:00','PERU','2021-05-01 12:20:22','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 35.8 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1),
  (3,1,2,3,'AFQV03','2021-05-05 07:30:15','N/A','0000-00-00 00:00:00','PERU','2021-05-05 18:03:23','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 35.8 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1),
  (4,1,2,4,'JJPG04','2021-05-07 08:03:18','N/A','0000-00-00 00:00:00','PERU','2021-05-07 18:14:03','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 35.8 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',2),
  (5,1,2,5,'A.Q.C.','2021-05-07 08:30:15','N/A','0000-00-00 00:00:00','PERU','2021-05-08 09:45:15','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1),
  (6,1,2,6,'A.Q.C.','2021-05-07 08:30:15','N/A','0000-00-00 00:00:00','PERU','2021-05-08 09:45:35','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',2),
  (7,1,2,7,'A.Q.C.','2021-05-07 08:30:15','N/A','0000-00-00 00:00:00','PERU','2021-05-08 09:45:35','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1),
  (8,1,2,8,'A.Q.C.','2021-05-06 16:15:23','N/A','0000-00-00 00:00:00','PERU','2021-05-07 16:30:45','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1),
  (9,1,2,9,'A.Q.C.','2021-05-06 15:45:13','N/A','0000-00-00 00:00:00','PERU','2021-05-07 18:10:36','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1),
  (10,NULL,2,0,NULL,'0000-00-00 00:00:00','BBBBB BBBBBBB BBBBBBBBBB',NULL,'CCCCC CCCCCCCC CCCCCCCCCC  CCCCC','2021-05-10 09:23:42','AAAAAAAAAA','-','-','-',250,50,'0000-00-00 00:00:00',200,NULL,NULL),
  (11,NULL,2,0,NULL,'0000-00-00 00:00:00','BBBBB BBBBBBB BBBBBBBBBB',NULL,'CCCCC CCCCCCCC CCCCCCCCCC CCCCC','2021-05-10 09:23:42','AAAAAAAAAA','-','-','-',250,50,'0000-00-00 00:00:00',200,NULL,NULL),
  (12,NULL,2,0,'-','0000-00-00 00:00:00','MAURICIO MENDEZ',NULL,'DE LA CALLE','2021-05-10 09:39:45','PRUEBAS COVID 19','-','-','-',250,50,'2021-05-10 09:39:45',200,NULL,1),
  (13,1,3,0,'-','0000-00-00 00:00:00','MILTON MILTARRON',NULL,'DE GERENCIA','2021-05-10 09:42:12','PRUEBAS COVID 19','-','-','-',200,40,'2021-05-10 09:42:12',160,NULL,1),
  (14,1,1,0,'-','0000-00-00 00:00:00','JUAN GODINEZ',NULL,'DE LA CALLE','2021-05-10 09:46:15','PRUEBA RAPIDA','-','-','-',150,30,'2021-05-10 09:46:15',120,NULL,1);
COMMIT;

#
# Data for the `tipo_prueba` table  (LIMIT 0,500)
#

INSERT INTO `tipo_prueba` (`tipoprueba_id`, `tipoprueba_descripcion`, `tipoprueba_precio`) VALUES 
  (1,'PRUEBA RAPIDA',150),
  (2,'ELISA',250),
  (3,'ANTIGENO NASAL',200);
COMMIT;

#
# Data for the `usuario` table  (LIMIT 0,500)
#

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_email`, `usuario_login`, `usuario_clave`, `usuario_imagen`, `tipousuario_id`) VALUES 
  (1,'BRIGITTE MENDEZ','brigitte@micorreo.com','brigitte','a986564fd8e964a54438e7b18219916a',NULL,1);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;