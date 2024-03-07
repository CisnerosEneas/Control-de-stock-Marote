/*
	ADVERTENCIA
	Ejecutar este script.sql hara que los datos y las tablas ingresadas en la base de datos sean eliminados, 
	asegurese de migrarlos antes, del contrario estos seran borrados permanentemente.
*/

/*Seleccionamos la base de datos a usar*/
use marote;

/*Borrado de tablas que caso de su existencia en la base de datos*/
drop table if exists productosalmacen;
drop table if exists precioslista;
drop table if exists preciosmayorista;
drop table if exists detalle_pedido;
drop table if exists pedidos;
drop table if exists productos;
drop table if exists mpcomprado;
drop table if exists mocomprado;
drop table if exists mproducido;
drop table if exists proveedores;
drop table if exists mbruto;
drop table if exists material;
drop table if exists cantmayorista;
drop table if exists categoria;
drop table if exists inyeccion;
drop table if exists rotomoldeo;
drop table if exists triturado;
drop table if exists produccion;

/*
	proveedores
	Relaciones:
		-Sin relaciones
*/
create table proveedores(
	id_proveedor int unsigned auto_increment primary key,
	nombre varchar(150) not null,
	telefono varchar(30),
	mail varchar(320),
	web varchar(320),
	contacto varchar(80) not null,
	direccion varchar(320) not null,
	provee varchar(20) not null,
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

/*
	Material
	Relaciones:
		-Material
		-Proveedores
*/
create table material(
	id_procedencia int unsigned auto_increment primary key, /* primaria */
	area varchar(30) not null
);

/*
	Otros Mat. comprados Ej. Tornillos
	Relaciones:
		-Material
		-Proveedores
*/
create table mocomprado(
	id_mocompra int unsigned auto_increment primary key,
	id_procedencia int unsigned,
	id_proveedor int unsigned,
	material varchar(50) not null,
	precio float(9),
	cantidad int(4) not null,
	fecha date,
	codigo varchar(20),
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_procedencia) references material(id_procedencia),
	foreign key (id_proveedor) references proveedores(id_proveedor)
);

/*
	Material plastico comprado
	Relaciones:
		-Material
		-Proveedores
*/
create table mpcomprado(
	id_mpcompra int unsigned auto_increment primary key,
	id_procedencia int unsigned,
	id_proveedor int unsigned,
	estado varchar(40) not null,
	tipo_plastico varchar(40) not null,
	color varchar(90) not null,
	precio float(9) not null,
	cantidad int(4) not null,
	fecha date,
	codigo varchar(20),
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_procedencia) references material(id_procedencia),
	foreign key (id_proveedor) references proveedores(id_proveedor)
);

/*
	Material plastico producido
	Relaciones:
		-Material
*/
create table mproducido(
	id_producido int unsigned auto_increment primary key,
	id_procedencia int unsigned,
	tipo_molienda varchar(50) not null,
	tipo_plastico varchar(50) not null,
	cantidad float(9),
	color varchar(90) not null,
	estado varchar(40) not null,
	fecha date,
	codigo varchar(20),
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_procedencia) references material(id_procedencia)
);

/*
	Materia bruta Ej. Tacho de helado
	Relaciones:
		-Material
*/
create table mbruto(
	id_materia int unsigned auto_increment primary key,
	id_procedencia int unsigned,
	forma varchar(90) not null,
	color varchar(90) not null,
	tipo_plastico varchar(50) not null,
	cantidad float(9) not null,
	codigo varchar(20),
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_procedencia) references material(id_procedencia)
);

/*
	Produccion
	Relaciones:
		-Sin relaciones
*/
create table produccion(
	id_tipo_procesado int unsigned auto_increment primary key,/* primaria */
	area varchar(30) not null
);

/*
	Inyeccion
	Relaciones:
		-Produccion
*/
create table inyeccion(
	id_inyeccion int unsigned auto_increment primary key,
	id_tipo_procesado int unsigned,
	molde varchar(90) not null,
	duracion time not null,
	cantidad int(4) not null,
	fecha date not null,
	material1 varchar(200) not null,
	cm1 int(20) not null,
	material2 varchar(200),
	cm2 int(20),
	material3 varchar(200),
	cm3 int(20),
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_tipo_procesado) references produccion(id_tipo_procesado)
);

/*
	Rotomoldeo
	Relaciones:
		-Produccion
*/
create table rotomoldeo(
	id_rotomoldeo int unsigned auto_increment primary key,
	id_tipo_procesado int unsigned,
	molde varchar(90) not null,
	duracion time not null,
	cantidad int(4) not null,
	fecha date not null,
	material1 varchar(200) not null,
	cm1 int(20) not null,
	material2 varchar(200),
	cm2 int(20),
	material3 varchar(200),
	cm3 int(20),
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_tipo_procesado) references produccion(id_tipo_procesado)
);

/*
	Triturado
	Relaciones:
		-Produccion
*/
create table triturado(
	id_triturado int unsigned auto_increment primary key,
	id_tipo_procesado int unsigned,
	cantidad float(9) not null, 
	tipo_de_plastico varchar(60) not null,
	color varchar(90) not null,
	fecha date not null,
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_tipo_procesado) references produccion(id_tipo_procesado)
);

/*
	Productos
	Relaciones:
		-Sin relaciones
*/
create table categoria(
	id_categoria int unsigned auto_increment primary key,
	nombre_cat varchar(90) not null
);

/*
	Cantidades para compras mayoristas
	Relaciones:
		-Sin relaciones
*/
create table cantmayorista(
	id_cantmayorista int unsigned auto_increment primary key,
	cantidad varchar(15),
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

/*
	Productos
	Relaciones:
		-Produccion
		-Categoria
*/
create table productos(
	id_producto int unsigned auto_increment primary key,
	id_tipo_procesado int unsigned,
	id_categoria int unsigned,
	nomproducto varchar(150) not null,
	codigo varchar(20),
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_tipo_procesado) references produccion(id_tipo_procesado),
	foreign key (id_categoria) references categoria(id_categoria)
);

/*
	Pedidos
	Relaciones:
		-Sin relaciones
*/
create table pedidos(
	id_pedido int unsigned auto_increment primary key,
	prioridad int unsigned not null,
	nombre_cliente text(150) not null,
	dni int(8),
	telefono varchar(50),
	direccion varchar(320) not null,
	nombre_pedido text(150) not null,
	fechapedido date,
	diaentrega date,
	fechalimite date,
	responsable varchar(50),
	controla varchar(50),
	observaciones text(50),
	entrega varchar (50),
	estado tinyint(1)
);

/*
	Detalle de pedidos
	Relaciones:
		-Productos
		-Pedidos
*/
create table detalle_pedido(
	id_pedido_detalle int unsigned auto_increment primary key,
	id_pedido int unsigned,
	id_producto int unsigned,
	detalle_pedido varchar(320),
	cantidad int(10),
	embalaje varchar(50),
	color varchar(50),
	controla varchar(50),
	foreign key (id_producto) references productos(id_producto),
	foreign key (id_pedido) references pedidos(id_pedido)
);

/*
	Precios de lista
	Relaciones:
		-Productos
*/
create table precioslista(
	id_preciol int unsigned auto_increment primary key,
	id_producto int unsigned,
	preciol float(9),
	foreign key (id_producto) references productos(id_producto)
);

/*
	Precios para las cantidades mayoristas
	Relaciones:
		-Productos
		-Cantmayorista
*/
create table preciosmayorista(
	id_preciom int unsigned auto_increment primary key,
	id_producto int unsigned,
	id_cantmayorista int unsigned,
	preciom float(9),
	foreign key (id_producto) references productos(id_producto),
	foreign key (id_cantmayorista) references cantmayorista(id_cantmayorista)
);	

/*
	Productos/stock guardado/s en el almacen.
	Relaciones:
		-Categoria
		-Productos
*/
create table productosalmacen(
	id_stock int unsigned auto_increment primary key,
	id_producto int unsigned,
	id_categoria int unsigned,
	codigo varchar(20),
	nombre varchar(150) not null,
	color varchar(90) not null,
	stock_disponible int(4) not null,
	descripcion varchar(320),
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	foreign key (id_categoria) references categoria(id_categoria),
  	foreign key (id_producto) references productos(id_producto)
);

/*Inserts*/
/*Produccion*/
insert into produccion(area) values
	('Rotomoldeo'),
	('Inyeccion'),
	('Triturado'),
	('Otro');

/*Material*/
insert into material(area) values
	('Comprado'),
	('Producido'),
	('Bruto');

/*Categorias*/
insert into categoria(nombre_cat) values
	('Llaveros'),
	('Contenedores'),
	('Envases'),
	('Soportes'),
	('Baño'),
	('Vialidad'),
	('Macetas'),
	('Mascotas'),
	('Cestos'),
	('Asientos');

/*Cantidades compra mayorista*/
insert into cantmayorista(cantidad) values
	('5'),
	('5 o mas'),
	('10'),
	('10 o mas'),
	('30'),
	('30 o mas'),
	('50'),
	('50 o mas'),
	('100'),
	('100 o mas'),
	('200'),
	('200 o mas'),
	('500'),
	('500 o mas'),
	('50 a 100'),
	('50 a 500'),
	('100 a 500'),
	(null);