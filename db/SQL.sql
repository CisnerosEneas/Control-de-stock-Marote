use marote;

drop table if exists mpcomprado;
drop table if exists mocomprado;
drop table if exists mproducido;
drop table if exists mbruto;
drop table if exists material;
drop table if exists proveedores;
drop table if exists productosalmacen;
drop table if exists precioslista;
drop table if exists preciosmayorista;
drop table if exists productos;
drop table if exists cantmayorista;
drop table if exists categoria;
drop table if exists inyeccion;
drop table if exists rotomoldeo;
drop table if exists triturado;
drop table if exists produccion;

/*proveedores*/
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

/*material*/
create table material(
	id_procedencia int unsigned auto_increment primary key, /* primaria */
	area varchar(30) not null
);


create table mocomprado(
	id_compra int unsigned auto_increment primary key,
	id_procedencia int unsigned,
	id_proveedor int unsigned,
	material varchar(50) not null,
	precio float(9) not null,
	cantidad int(4) not null,
	fecha date,
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_procedencia) references material(id_procedencia),
	foreign key (id_proveedor) references proveedores(id_proveedor)
);

create table mpcomprado(
	id_compra int unsigned auto_increment primary key,
	id_procedencia int unsigned,
	id_proveedor int unsigned,
	estado varchar(40) not null,
	tipo_plastico varchar(40) not null,
	color varchar(90) not null,
	precio float(9),
	cantidad int(4) not null,
	fecha date,
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_procedencia) references material(id_procedencia),
	foreign key (id_proveedor) references proveedores(id_proveedor)
);

create table mproducido(
	id_producido int unsigned auto_increment primary key,
	id_procedencia int unsigned,
	tipo_molienda varchar(50) not null,
	tipo_plastico varchar(50) not null,
	cantidad float(9) not null,
	color varchar(90) not null,
	estado varchar(40) not null,
	fecha date not null,
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_procedencia) references material(id_procedencia)
);

create table mbruto(
	id_materia int unsigned auto_increment primary key,
	id_procedencia int unsigned,
	forma varchar(90) not null,
	color varchar(90) not null,
	tipo_plastico varchar(50) not null,
	cantidad float(9) not null,
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_procedencia) references material(id_procedencia)
);

/*produccion*/
create table produccion(
	id_tipo_procesado int unsigned auto_increment primary key,/* primaria */
	area varchar(30) not null
);

create table inyeccion(
	id_inyeccion int unsigned auto_increment primary key,
	id_tipo_procesado int unsigned,
	molde varchar(90) not null,
	duracion time not null,
	cantidad int(4) not null,
	fecha date not null,
	material_utilizado varchar(320) not null,
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_tipo_procesado) references produccion(id_tipo_procesado)
);

create table rotomoldeo(
	id_rotomoldeo int unsigned auto_increment primary key,
	id_tipo_procesado int unsigned,
	molde varchar(90) not null,
	duracion time not null,
	cantidad int(4) not null,
	fecha date not null,
	material_utilizado varchar(200) not null,
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_tipo_procesado) references produccion(id_tipo_procesado)
);

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

/* productos */
create table categoria(
	id_categoria int unsigned auto_increment primary key,
	nombre_cat varchar(90) not null
);

create table cantmayorista(
	id_cantmayorista int unsigned auto_increment primary key,
	cantidad varchar(15),
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table productos(
	id_producto int unsigned auto_increment primary key,
	id_tipo_procesado int unsigned,
	id_categoria int unsigned,
	nomproducto varchar(150) not null,
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_tipo_procesado) references produccion(id_tipo_procesado),
	foreign key (id_categoria) references categoria(id_categoria)
);

create table precioslista(
	id_preciol int unsigned auto_increment primary key,
	id_producto int unsigned,
	preciol float(9),
	foreign key (id_producto) references productos(id_producto)
);

create table preciosmayorista(
	id_preciom int unsigned auto_increment primary key,
	id_producto int unsigned,
	id_cantmayorista int unsigned,
	preciom float(9),
	foreign key (id_producto) references productos(id_producto),
	foreign key (id_cantmayorista) references cantmayorista(id_cantmayorista)
);	

create table productosalmacen(
	id_stock int unsigned auto_increment primary key,
	id_producto int unsigned,
	id_categoria int unsigned,
	nombre varchar(150) not null,
	color varchar(90) not null,
	stock_disponible int(4) not null,
	descripcion varchar(320),
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	foreign key (id_categoria) references categoria(id_categoria),
  	foreign key (id_producto) references productos(id_producto)
);

/*inserts*/

/*produccion*/
insert into produccion(area) values
	('Rotomoldeo'),
	('Inyeccion'),
	('Triturado'),
	('Otro');

/*material*/
insert into material(area) values
	('Comprado'),
	('Producido'),
	('Bruto');

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