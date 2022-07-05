use marote;

drop table if exists mpcomprado;
drop table if exists mocomprado;
drop table if exists mproducido;
drop table if exists mbruto;
drop table if exists material;
drop table if exists proveedores;
drop table if exists productos;
drop table if exists inyeccion;
drop table if exists rotomoldeo;
drop table if exists triturado;
drop table if exists produccion;

/*proveedores*/
create table proveedores(
	id_proveedor int unsigned auto_increment primary key,
	nombre varchar(150) not null,
	telefono int(30) not null,
	mail varchar(320) not null,
	web varchar(320) not null,
	contacto varchar(80) not null,
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
	precio float(6) not null,
	cantidad int(4) not null,
	fecha date not null,
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
	precio float(6) not null,
	cantidad int(4) not null,
	fecha date not null,
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
	cantidad float(6) not null,
	estado varchar(40) not null,
	fecha date not null,
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_procedencia) references material(id_procedencia)
);

create table mbruto(
	id_materia int unsigned auto_increment primary key,
	id_procedencia int unsigned,
	forma varchar(70) not null,
	color varchar(70) not null,
	tipo_plastico varchar(50) not null,
	cantidad float(6) not null,
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
	molde varchar(70) not null,
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
	molde varchar(70) not null,
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
	cantidad float(6) not null, 
	tipo_de_plastico varchar(60) not null,
	color varchar(70) not null,
	fecha date not null,
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_tipo_procesado) references produccion(id_tipo_procesado)
);

/* productos */
create table productos(
	id_producto int unsigned auto_increment primary key,
	id_tipo_procesado int unsigned,
	precio float(6) not null,
	nombre varchar(150) not null,
	color varchar(70) not null,
	stock_disponible int(4) not null,
	descripcion varchar(320),
	creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	actualizada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_tipo_procesado) references produccion(id_tipo_procesado)
);

/*inserts*/

/*produccion*/
insert into produccion(area) values 
	('Rotomoldeo'),
	('Inyeccion'),
	('Triturado');

/*material*/
insert into material(area) values 
	('Comprado'),
	('Producido'),
	('Bruto');