--
-- Creamos la base de datos
--

  
  CREATE database gestion_venta;
  
--
-- Seleccionamos la base de datos para poder crear las tablas.
--

  USE gestion_venta;
  
  --
-- Creamos la tabla usuario
--

CREATE TABLE usuario (
  idusuario int(11) auto_increment NOT NULL,
  nombre varchar(100) NOT NULL,
  correo varchar(100) NOT NULL,
  usuario varchar(20) NOT NULL,
  clave varchar(50) NOT NULL,
  PRIMARY KEY(idusuario)
);

--
-- Agregar primeros usuarios
--

INSERT INTO usuario (nombre, correo, usuario, clave) VALUES
( 'kevin ramirez', 'kevin.test@gmail.com', 'vendedor1', 'test1'),
( 'kanye west', 'kanyeWest@gmail.com', 'vendedor2', 'test2');


--
-- Creamos nuestra tabla clientes
--

CREATE TABLE cliente (
  idcliente int(11) auto_increment NOT NULL,
  nombre varchar(100) NOT NULL,
  telefono varchar(15) NOT NULL,
  direccion varchar(200) NOT NULL,
  usuario_id int(11) NOT NULL,
  FOREIGN KEY(usuario_id) REFERENCES usuario(idusuario),
  PRIMARY KEY (idcliente)
  
);
--
--  Insertamos los primeros clientes.
--


INSERT INTO cliente (idcliente, nombre, telefono, direccion, usuario_id) VALUES
(1, 'carlos gonzales', '8296826298', 'Centro', 1),
(2, 'samuel flores', '2147483647', 'Carrera 28 entre 9 y 10', 2);

--
-- Se crea la tabla para productos
--


CREATE TABLE producto (
  id int(11) auto_increment NOT NULL,
  imagen varchar(300) NOT NULL,
  descripcion varchar(200) NOT NULL,
  precio NUMERIC(10,2) NOT NULL,
  categoria varchar(30),
  existencia int(11) NOT NULL,
  usuario_id int(11) NOT NULL,
  FOREIGN KEY(usuario_id) REFERENCES usuario(idusuario),
  PRIMARY KEY(id)
);

--
-- Agregar primeros productos
--

INSERT INTO producto (imagen, descripcion, precio, categoria ,existencia, usuario_id) VALUES
( 'https://ecuador.clorox.com/wp-content/uploads/sites/6/2019/05/Botella-de-1000ml-original-960x500-1.png', ' Cloro', 1.99, 'limpieza',180, 1),
( 'https://costazul.sigo.com.ve/images/thumbs/0010613_limpia-vidrios-y-espejos-cristal-glax-brite-1-l_450.jpeg', 'Limpia Vidrios', 4.8,'limpia_vidrios', 50, 1),
( 'https://www.laranitadelapaz.com.mx/images/thumbs/0005808_detergente-en-polvo-ariel-10850g_360.jpeg', 'Ariel Detergente en polvo', 5.8,'jabon_polvo', 50, 2);


-- Creamos la tabla para detalles de las ventas.
--


CREATE TABLE detalle_venta (
  id int(11) auto_increment NOT NULL,
  cantidad int(11) NOT NULL,
  precio NUMERIC(10,2) NOT NULL,
  id_usuario int(11) NOT NULL,
  id_producto int(11) NOT NULL,
  FOREIGN KEY (id_producto) REFERENCES producto(id),
  FOREIGN KEY (id_usuario) REFERENCES usuario(idusuario),
  PRIMARY KEY (id)
);

--
--  Se inserta los primeros datos 
--

INSERT INTO detalle_venta (id_usuario,id_producto, cantidad, precio) VALUES
( 2,1, 1,2),
( 2,2, 1,2),
( 1,3, 2,1);


--
-- Creamos tabla para las ventas
--


CREATE TABLE ventas (
  id int(11) auto_increment NOT NULL,
  id_cliente int(11) NOT NULL,
  total NUMERIC(10,2) NOT NULL,
  id_usuario int(11) NOT NULL,
  fecha timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  FOREIGN KEY (id_cliente) REFERENCES cliente(idcliente),
  FOREIGN KEY (id_usuario) REFERENCES usuario(idusuario),
  PRIMARY KEY(id)
  
);

--
--  Agregamos las primeras ventas
--

INSERT INTO ventas ( id_cliente, total, id_usuario, fecha) VALUES
( 1, '42.00', 1, '2021-05-16 14:35:54'),
( 1, '39.00', 1, '2021-05-16 14:39:39');


--
-- Indices de tablas con la busqueda mas comun.
--

ALTER TABLE cliente ADD INDEX idx_cliente (nombre,idcliente);

ALTER TABLE producto ADD INDEX idx_producto (id,descripcion,categoria,precio,imagen);

ALTER TABLE usuario ADD INDEX idx_usuario (nombre, correo);



SELECT * producto;

