create database BELLEZA;

use BELLEZA;

CREATE TABLE rol_usuario (
  idRolusuario int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  descripRolusuario varchar(30) DEFAULT NULL,
  estadoRolusuario varchar(30) DEFAULT NULL
);

-- Insert rol--
insert into rol_usuario values (1,'Administrador', 'Activo');
insert into rol_usuario values (2,'Usuario', 'Activo');
insert into rol_usuario values (3,'Prueba', 'Activo');

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

-- Insert usuraios --
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

-- Inserts Producto --
INSERT INTO producto VALUES (1, 'Llavero de Estrella', 7990, 'Llavero', 'Disponible');
INSERT INTO producto VALUES (2,'Muñeco de Santa Claus', 14990, 'Muñeco', 'Disponible');
INSERT INTO producto VALUES (3, 'Títere de Animales', 18990, 'Títere', 'Disponible');
INSERT INTO producto VALUES (4, 'Peluche de Oso', 20990, 'Peluche', 'Disponible');
INSERT INTO producto VALUES (5, 'Llavero de Corazón', 6990, 'Llavero', 'Disponible');
INSERT INTO producto VALUES (6, 'Collar de Perlas', 34990, 'Collar', 'Disponible');
INSERT INTO producto VALUES (7, 'Reloj de Pulsera', 27990, 'Reloj', 'Disponible');
INSERT INTO producto VALUES (8, 'Bufanda de Lana', 18990, 'Bufanda', 'Disponible');
INSERT INTO producto VALUES (9, 'Caja de Chocolates', 9990, 'Chocolate', 'Disponible');
INSERT INTO producto VALUES (10, 'Botella de Perfume', 45990, 'Perfume', 'Disponible');


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

-- Inserts Pedidos--
INSERT INTO pedido VALUES (1, '2023-11-28', '14:30:00', 20990, 'Procesando', 'Sí', 1, 1);
INSERT INTO pedido VALUES (2, '2023-11-28', '15:30:00', 15990, 'Procesando', 'No', 2, 1);
INSERT INTO pedido VALUES (3, '2023-11-28', '16:30:00', 18990, 'Procesando', 'Sí', 3, 1);
INSERT INTO pedido VALUES (4, '2023-11-28', '17:30:00', 27990, 'Procesando', 'No', 4, 1);

INSERT INTO pedido VALUES (5, '2023-11-28', '16:45:00', 68990, 'Enviado', 'No', 1, 3);
INSERT INTO pedido VALUES (6, '2023-11-28', '17:45:00', 42990, 'Enviado', 'Sí', 2, 3);
INSERT INTO pedido VALUES (7, '2023-11-28', '18:45:00', 55990, 'Enviado', 'No', 3, 3);
INSERT INTO pedido VALUES (8, '2023-11-28', '19:45:00', 74990, 'Enviado', 'Sí', 4, 3);

INSERT INTO pedido VALUES (9, '2023-11-29', '10:15:00', 48990, 'Enviado', 'Sí', 1, 4);
INSERT INTO pedido VALUES (10, '2023-11-29', '11:15:00', 26990, 'Entregado', 'No', 2, 4);
INSERT INTO pedido VALUES (11, '2023-11-29', '12:15:00', 40990, 'Enviado', 'Sí', 3, 4);
INSERT INTO pedido VALUES (12, '2023-11-29', '13:15:00', 49990, 'Entregado', 'No', 4, 4);

INSERT INTO pedido VALUES (13, '2023-11-29', '12:45:00', 75990, 'Procesando', 'Sí', 1, 5);
INSERT INTO pedido VALUES (14, '2023-11-29', '13:45:00', 35990, 'Procesando', 'Sí', 2, 5);
INSERT INTO pedido VALUES (15, '2023-11-29', '14:45:00', 67990, 'Procesando', 'Sí', 3, 5);
INSERT INTO pedido VALUES (16, '2023-11-29', '15:45:00', 58990, 'Procesando', 'Sí', 4, 5);

INSERT INTO pedido VALUES (17, '2023-11-30', '08:30:00', 32990, 'Enviado', 'No', 1, 2);
INSERT INTO pedido VALUES (18, '2023-11-30', '09:30:00', 21990, 'Procesando', 'Sí', 2, 2);
INSERT INTO pedido VALUES (19, '2023-11-30', '10:30:00', 34990, 'Enviado', 'No', 3, 2);
INSERT INTO pedido VALUES (20, '2023-11-30', '11:30:00', 44990, 'Procesando', 'Sí', 4, 2);

INSERT INTO pedido VALUES (21, '2023-11-30', '11:00:00', 12990, 'Entregado', 'Sí', 1, 8);
INSERT INTO pedido VALUES (22, '2023-11-30', '12:00:00', 68990, 'Entregado', 'Sí', 2, 8);
INSERT INTO pedido VALUES (23, '2023-11-30', '13:00:00', 14990, 'Entregado', 'Sí', 3, 8);
INSERT INTO pedido VALUES (24, '2023-11-30', '14:00:00', 91990, 'Entregado', 'Sí', 4, 8);

INSERT INTO pedido VALUES (25, '2023-12-01', '13:30:00', 20990, 'Procesando', 'No', 1, 9);
INSERT INTO pedido VALUES (26, '2023-12-01', '14:30:00', 35990, 'Enviado', 'No', 2, 9);
INSERT INTO pedido VALUES (27, '2023-12-01', '15:30:00', 22990, 'Procesando', 'No', 3, 9);
INSERT INTO pedido VALUES (28, '2023-12-01', '16:30:00', 58990, 'Enviado', 'No', 4, 9);

INSERT INTO pedido VALUES (29, '2023-12-01', '16:00:00', 58990, 'Entregado', 'Sí', 1, 7);
INSERT INTO pedido VALUES (30, '2023-12-01', '17:00:00', 48990, 'Procesando', 'Sí', 2, 7);
INSERT INTO pedido VALUES (31, '2023-12-01', '18:00:00', 50990, 'Entregado', 'Sí', 3, 7);
INSERT INTO pedido VALUES (32, '2023-12-01', '19:00:00', 71990, 'Procesando', 'Sí', 4, 7);

INSERT INTO pedido VALUES (33, '2023-12-02', '09:45:00', 45990, 'Enviado', 'Sí', 1, 6);
INSERT INTO pedido VALUES (34, '2023-12-02', '10:45:00', 74990, 'Entregado', 'Sí', 2, 6);
INSERT INTO pedido VALUES (35, '2023-12-02', '11:45:00', 37990, 'Enviado', 'Sí', 3, 6);
INSERT INTO pedido VALUES (36, '2023-12-02', '12:45:00', 97990, 'Entregado', 'Sí', 4, 6);

INSERT INTO pedido VALUES (37, '2023-12-02', '11:30:00', 18990, 'Procesando', 'No', 1, 10);
INSERT INTO pedido VALUES (38, '2023-12-02', '12:30:00', 30990, 'Enviado', 'No', 2, 10);
INSERT INTO pedido VALUES (39, '2023-12-02', '13:30:00', 20990, 'Procesando', 'No', 3, 10);
INSERT INTO pedido VALUES (40, '2023-12-02', '14:30:00', 53990, 'Enviado', 'No', 4, 10);

CREATE TABLE domicilio (
  idDomicilio int(11) primary key NOT NULL auto_increment,
  horaDomicilio time DEFAULT NULL,
  estadoDomicilio varchar(30) DEFAULT NULL,
  idpedidoFK int(11) DEFAULT NULL,
  idDomicilioFK int(11) DEFAULT NULL
) ;

-- Inserts para Domicilio
INSERT INTO domicilio VALUES (1, '13:30:00', 'En proceso', 1, 1);
INSERT INTO domicilio VALUES (2, '14:45:00', 'En proceso', 2, 2);
INSERT INTO domicilio VALUES (3, '16:15:00', 'Entregado', 3, 3);
INSERT INTO domicilio VALUES (4, '17:30:00', 'Procesando', 4, 4);
INSERT INTO domicilio VALUES (5, '18:45:00', 'Entregado', 5, 5);
INSERT INTO domicilio VALUES (6, '12:00:00', 'En proceso', 6, 6);
INSERT INTO domicilio VALUES (7, '13:15:00', 'Enviado', 7, 7);
INSERT INTO domicilio VALUES (8, '14:30:00', 'Procesando', 8, 8);
INSERT INTO domicilio VALUES (9, '15:45:00', 'En proceso', 9, 9);
INSERT INTO domicilio VALUES (10, '17:00:00', 'Entregado', 10, 10);
INSERT INTO domicilio VALUES (11, '18:15:00', 'Enviado', 11, 1);
INSERT INTO domicilio VALUES (12, '19:30:00', 'Procesando', 12, 2);
INSERT INTO domicilio VALUES (13, '10:45:00', 'En proceso', 13, 3);
INSERT INTO domicilio VALUES (14, '12:00:00', 'En proceso', 14, 4);
INSERT INTO domicilio VALUES (15, '13:15:00', 'Entregado', 15, 5);
INSERT INTO domicilio VALUES (16, '14:30:00', 'Procesando', 16, 6);
INSERT INTO domicilio VALUES (17, '15:45:00', 'Entregado', 17, 7);
INSERT INTO domicilio VALUES (18, '17:00:00', 'Procesando', 18, 8);
INSERT INTO domicilio VALUES (19, '18:15:00', 'En proceso', 19, 9);
INSERT INTO domicilio VALUES (20, '19:30:00', 'Enviado', 20, 10);