

create table `empresa` (
  `empresa_id` int(11) not null auto_increment,
  `dosificacion_id` int(11) default null,
  `empresa_nombre` varchar(150) default null,
  `empresa_eslogan` varchar(250) default null,
  `empresa_direccion` varchar(250) default null,
  `empresa_telefono` varchar(250) default null,
  `empresa_imagen` varchar(250) default null,
  `empresa_zona` varchar(250) default null,
  `empresa_ubicacion` varchar(250) default null,
  `empresa_departamento` varchar(250) default null,
  `empresa_propietario` varchar(250) default null,
  `empresa_codigo` varchar(250) default null,
  `empresa_email` varchar(250) default null,
  `empresa_profesion` varchar(250) default null,
  `empresa_cargo` varchar(250) default null,
  `empresa_latitud` varchar(50) default null,
  `empresa_longitud` varchar(50) default null,
  primary key (`empresa_id`),
  unique key `empresa_id` (`empresa_id`)
) engine=innodb auto_increment=2 default charset=latin1;

#
# structure for the `estado` table : 
#

create table `estado` (
  `estado_id` int(11) not null auto_increment,
  `estado_descripcion` varchar(50) default null,
  `estado_tipo` int(11) default null,
  `estado_color` varchar(50) default null,
  primary key (`estado_id`),
  unique key `estado_id` (`estado_id`)
) engine=innodb auto_increment=3 default charset=latin1;

#
# structure for the `extencion` table : 
#

create table `extencion` (
  `extencion_id` int(11) not null auto_increment,
  `extencion_descripcion` longtext default null,
  primary key (`extencion_id`),
  unique key `extencion_id` (`extencion_id`)
) engine=innodb auto_increment=10 default charset=latin1;

#
# structure for the `genero` table : 
#

create table `genero` (
  `genero_id` int(11) not null auto_increment,
  `genero_nombre` longtext default null,
  primary key (`genero_id`),
  unique key `genero_id` (`genero_id`)
) engine=innodb auto_increment=3 default charset=latin1;

#
# structure for the `paciente` table : 
#

create table `paciente` (
  `paciente_id` int(11) not null auto_increment,
  `estado_id` int(11) default null,
  `genero_id` int(11) default null,
  `extencion_id` int(11) default null,
  `paciente_nombre` varchar(150) default null,
  `paciente_edad` int(11) default null,
  `paciente_direccion` varchar(150) default null,
  `paciente_ci` varchar(20) default null,
  primary key (`paciente_id`),
  unique key `paciente_id` (`paciente_id`)
) engine=innodb auto_increment=3 default charset=latin1;

#
# structure for the `prueba` table : 
#

create table `prueba` (
  `prueba_id` int(11) not null auto_increment,
  `usuario_id` int(11) default null,
  `tipoprueba_id` int(11) default null,
  `paciente_id` int(11) default null,
  `prueba_codigo` varchar(50) default null,
  `prueba_fechasolicitud` datetime default null,
  `prueba_medicolab` varchar(250) default null,
  `prueba_fecharecepcion` datetime default null,
  `prueba_procedencia` varchar(250) default null,
  `prueba_fechainforme` datetime default null,
  `prueba_nombreanalisis` text default null,
  `prueba_descricpion` text default null,
  `prueba_resultados` text default null,
  `prueba_observacion` text default null,
  `prueba_precio` float default null,
  `prueba_acuenta` float default null,
  `prueba_fechacuenta` datetime default null,
  `prueba_saldo` float default null,
  `prueba_fechasaldo` datetime default null,
  primary key (`prueba_id`)
) engine=innodb auto_increment=3 default charset=latin1;

#
# structure for the `tipo_prueba` table : 
#

create table `tipo_prueba` (
  `tipoprueba_id` int(11) not null auto_increment,
  `tipoprueba_descripcion` varchar(150) default null,
  `tipoprueba_precio` float default null,
  primary key (`tipoprueba_id`),
  unique key `tipoprueba_id` (`tipoprueba_id`)
) engine=innodb auto_increment=6 default charset=latin1;

#
# structure for the `usuario` table : 
#

create table `usuario` (
  `usuario_id` int(11) not null auto_increment,
  `usuario_nombre` varchar(50) default null,
  `usuario_email` varchar(50) default null,
  `usuario_login` varchar(50) default null,
  `usuario_clave` varchar(50) default null,
  `usuario_imagen` varchar(255) default null,
  `tipousuario_id` int(11) default null,
  primary key (`usuario_id`),
  unique key `usuario_id` (`usuario_id`)
) engine=innodb auto_increment=2 default charset=latin1;

#
# data for the `empresa` table  (limit 0,500)
#

insert into `empresa` (`empresa_id`, `dosificacion_id`, `empresa_nombre`, `empresa_eslogan`, `empresa_direccion`, `empresa_telefono`, `empresa_imagen`, `empresa_zona`, `empresa_ubicacion`, `empresa_departamento`, `empresa_propietario`, `empresa_codigo`, `empresa_email`, `empresa_profesion`, `empresa_cargo`, `empresa_latitud`, `empresa_longitud`) values 
  (1,1,'laboratorio test center','las mas mejores pruebas','uruguay nº 461, edificio ferrari 2do piso','(591)70351037 - (591)60351322','1582753889.png','zona central','cercado - cochabamba','cochabamba','ana gabriela orellana rodriguez','rv9jq0','testcenter@gmail.com','lic. bioquimica','propietario',null,null);
commit;

#
# data for the `estado` table  (limit 0,500)
#

insert into `estado` (`estado_id`, `estado_descripcion`, `estado_tipo`, `estado_color`) values 
  (1,'activo',1,'a04040'),
  (2,'inactivo',1,'#a3a3a3');
commit;

#
# data for the `extencion` table  (limit 0,500)
#

insert into `extencion` (`extencion_id`, `extencion_descripcion`) values 
  (1,'cb'),
  (2,'lp'),
  (3,'sc'),
  (4,'pt'),
  (5,'or'),
  (6,'bn'),
  (7,'pd'),
  (8,'tr'),
  (9,'sc');
commit;

#
# data for the `genero` table  (limit 0,500)
#

insert into `genero` (`genero_id`, `genero_nombre`) values 
  (1,'masculino'),
  (2,'femenino');
commit;

#
# data for the `paciente` table  (limit 0,500)
#

insert into `paciente` (`paciente_id`, `estado_id`, `genero_id`, `extencion_id`, `paciente_nombre`, `paciente_edad`, `paciente_direccion`, `paciente_ci`) values 
  (1,1,1,1,'cornelio rios reloz',38,'n/a','5920892'),
  (2,1,1,1,'mario choque galarza',38,'n/a','695983923');
commit;

#
# data for the `prueba` table  (limit 0,500)
#

insert into `prueba` (`prueba_id`, `usuario_id`, `tipoprueba_id`, `paciente_id`, `prueba_codigo`, `prueba_fechasolicitud`, `prueba_medicolab`, `prueba_fecharecepcion`, `prueba_procedencia`, `prueba_fechainforme`, `prueba_nombreanalisis`, `prueba_descricpion`, `prueba_resultados`, `prueba_observacion`, `prueba_precio`, `prueba_acuenta`, `prueba_fechacuenta`, `prueba_saldo`, `prueba_fechasaldo`) values 
  (1,1,2,1,'crr001','2021-04-30 15:30:11','n/a','0000-00-00 00:00:00','peru','2021-05-01 12:15:18','prueba covid-19','prueba en tiempo real\r\n=====================\r\ntemperatura corporal: 36.5 ºc\r\n','pcr-tr covid-19  no detectado','resultado detectado, es considerado como positivo para covid-19, indica que rna del sars-cov-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nresultados no detectados, es considerado como negativo para covid-19, indica que rna del sars-cov-2\r\nno esta presente en la muestra por el momento.\r\n',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),
  (2,1,2,2,'mcg002','2021-04-30 15:35:25','n/a','0000-00-00 00:00:00','peru','2021-05-01 12:20:22','prueba covid-19','prueba en tiempo real\r\n=====================\r\ntemperatura corporal: 35.8 ºc','pcr-tr covid-19  no detectado','resultado detectado, es considerado como positivo para covid-19, indica que rna del sars-cov-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nresultados no detectados, es considerado como negativo para covid-19, indica que rna del sars-cov-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');
commit;

#
# data for the `tipo_prueba` table  (limit 0,500)
#

insert into `tipo_prueba` (`tipoprueba_id`, `tipoprueba_descripcion`, `tipoprueba_precio`) values 
  (1,'prueba rapida',150),
  (2,'hisopado nasofaringeo',150),
  (3,'prueba antigeno nasal',200),
  (4,'prueba de elissa',250),
  (5,'prueba pcr',500);
commit;

#
# data for the `usuario` table  (limit 0,500)
#

insert into `usuario` (`usuario_id`, `usuario_nombre`, `usuario_email`, `usuario_login`, `usuario_clave`, `usuario_imagen`, `tipousuario_id`) values 
  (1,'ana gabriela orellana rodriguez','superusuario@micorreo.com','super','1b3231655cebb7a1f783eddf27d254ca','1616930453.jpg',1);
commit;

