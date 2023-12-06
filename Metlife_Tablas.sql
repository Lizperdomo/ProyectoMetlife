create database metlife;

drop database metlife;

SELECT @@datadir;

use metlife;

show databases;

create table perfiles(
	id tinyint not null auto_increment,
	perfil varchar(20) not null unique,
	descripcion varchar(100),
	status boolean default true,
	created_at datetime,
	updated_at datetime null,
	deleted_at datetime null,
	primary key(id)
);


create table usuarios(
	id int not null auto_increment,
	username varchar(50) unique,
	password varchar(150),
	status boolean,
	perfil tinyint not null,
	index(perfil),
	created_at datetime,
	updated_at datetime null,
	deleted_at datetime null,
	foreign key(perfil) references perfiles(id),
	primary key(id)
);

create table userinfo(
	id int not null,
	nombre varchar(50),
	lastname varchar(80),
	birthday date null,
	genero char,
	edad int not null,
	celular varchar(15) null,
	photo varchar(250) null,
	bio text null,
	website varchar(255) null,
	status boolean default true,
	created_at datetime,
	updated_at datetime null,
	deleted_at datetime null,
	constraint id_usuario foreign key(id) references usuarios(id),
	primary key(id)
);

create table coberturas(
	id int not null auto_increment,
	nombre varchar(50) unique,
	descripcion varchar(100),
	status boolean,
	costo float not null,
	created_at datetime,
	updated_at datetime null,
	deleted_at datetime null,
	primary key(id)
);
create table clientes(
	id int not null,
	index (id),
	calle varchar(50) not null,
	colonia varchar(50) not null,
	municipio varchar(50) not null,
	estado varchar(50) not null, 
	ciudad varchar(50) not null,
	CURP varchar(30) not null unique,
	RFC varchar(20) not null unique,
	idCobertura int not null,
	created_at datetime,
	updated_at datetime null,
	deleted_at datetime null,
	index (idCobertura),
	foreign key(idCobertura) references coberturas(id),
	foreign key(id) references userinfo(id),
	primary key(id)
);

create table cobertura_cliente(
	id int not null auto_increment,
	primary key(id),
	cobertura int not null,
	index(cobertura),
	cliente int not null,
	index(cliente),
	foreign key(cobertura) references coberturas(id),
	foreign key(cliente) references clientes(id)
);

create table ventas(
	id int not null auto_increment,
	numero_tarjeta int not null unique,
	cvv int not null unique, 
	monto float not null,
	usuario int not null,
	index(usuario),
	created_at datetime,
	updated_at datetime null,
	deleted_at datetime null,
	foreign key(usuario) references usuarios(id),
	primary key(id)
);

create table usuario_venta(
	id int not null auto_increment primary key,
	usuario int not null,
	index(usuario),
	venta int not null,
	index(venta),
	foreign key(usuario) references usuarios(id),
	foreign key(venta) references ventas(id)
);



