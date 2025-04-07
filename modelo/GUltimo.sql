create database G;

use G;

CREATE TABLE rol_usuario (
  idRolusuario int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  descripRolusuario varchar(30) DEFAULT NULL,
  estadoRolusuario varchar(30) DEFAULT NULL
);



insert into rol_usuario values (1,'Administrador', 'Activo');
insert into rol_usuario values (2,'Usuario', 'Activo');
insert into rol_usuario values (3,'Prueba', 'Activo');


select *from rol_usuario;
-- --------------------------------------------------------


CREATE TABLE usuario (
  id_usuario int  primary key  NOT NULL auto_increment,
  tipo_DocUsuario varchar(30) DEFAULT NULL,
  no_DocUsuario varchar(20) DEFAULT NULL,
  nombre_usuario varchar(50) DEFAULT NULL,
  apellido_usuario varchar(50) DEFAULT NULL,
  direccion_usuario varchar(80) DEFAULT NULL,
  telefono_Usuario varchar(20) DEFAULT NULL,
  correo_Usuario varchar(70) DEFAULT NULL,
  password_usuario varchar(20) DEFAULT NULL,
  foto_usuario tinyblob DEFAULT NULL,
  estado_usuario varchar(30) DEFAULT NULL,
  idRolusuarioFK int(11) NOT NULL,
  foreign key (idRolusuarioFK) references rol_usuario (idRolusuario)
) ;

insert into usuario values(1,'TI','20201515','Danna','Perez','cra 35','3154030','Danna@gmail.com','123','','Activo',1);
insert into usuario values(2,'CC','60541837','Andres','Perez','calle 25','4690377','An20@gmail.com','158','','Activo',2);
insert into usuario values(3,'TI','20156915','Carla','Cuellar','cra 29','3195639','Carla01@gmail.com','537','','Activo',2);
insert into usuario values(4,'CC','1026621381','Santiago','Robayo','cra 49','3195639','santiago@gmail.com','222','','Activo',2);
select *from usuario;

CREATE TABLE producto (
  idproducto int(11) primary key NOT NULL auto_increment,
  descripProducto varchar(100) DEFAULT NULL,
  precioproducto double DEFAULT NULL,
  categoriaproducto varchar(40) DEFAULT NULL,
  estadoproducto varchar(30) DEFAULT NULL
);
INSERT INTO producto VALUES (1, 'Llavero de Estrella', 7990, 'Llavero', 'Disponible');
INSERT INTO producto VALUES (2,'Muñeco de Santa Claus', 14990, 'Muñeco', 'Disponible');
INSERT INTO producto VALUES (3, 'Títere de Animales', 18990, 'Títere', 'Disponible');
INSERT INTO producto VALUES (4, 'Peluche de Oso', 20990, 'Peluche', 'Disponible');
INSERT INTO producto VALUES (5, 'Llavero de Corazón', 6990, 'Llavero', 'Disponible');


CREATE TABLE pedido (
  idpedido int(11) primary key NOT NULL auto_increment,
  fechapedido date DEFAULT NULL,
  horapedido time DEFAULT NULL,
  totalpedido double DEFAULT NULL,
  estadopedido varchar(30) DEFAULT NULL,
  pedidoadomicilio char(3) DEFAULT NULL,
  idusuarioFK int(11) NOT NULL,
  idProductoFK int (11) NOT NULL,
  foreign key (idUsuarioFK) references usuario (id_usuario),
  foreign key (idProductoFK) references producto (idproducto)
) ;


INSERT INTO pedido VALUES (1,'2023-11-26', '12:30:00', 40950, 'En proceso', 'Sí', 1, 4);
INSERT INTO pedido VALUES (2,'2023-11-26', '15:45:00', 13980, 'Entregado', 'No', 2, 1);
INSERT INTO pedido VALUES (3,'2023-11-27', '09:00:00', 18990, 'En proceso', 'Sí', 3, 3);
INSERT INTO pedido VALUES (4,'2023-11-27', '11:30:00', 27980, 'Entregado', 'Sí', 4, 2);
select * from pedido;

CREATE TABLE domicilio (
  idDomicilio int(11) primary key NOT NULL auto_increment,
  horaDomicilio time DEFAULT NULL,
  estadoDomicilio varchar(30) DEFAULT NULL,
  idpedidoFK int(11) DEFAULT NULL,
  idDomicilioFK int(11) DEFAULT NULL
) ;

INSERT INTO domicilio VALUES (1, '13:30:00', 'En proceso', 1, 1);
INSERT INTO domicilio VALUES (2, '16:00:00', 'Entregado', 2, 2);
INSERT INTO domicilio VALUES (3, '10:15:00', 'En proceso', 3, 3);
INSERT INTO domicilio VALUES (4, '12:45:00', 'Entregado', 4, 4);

select * from domicilio;

select idRolusuarioFK from usuario where correo_usuario = 'Danna@gmail.com'
select * from usuario
select * from rol_usuario
drop database g;

