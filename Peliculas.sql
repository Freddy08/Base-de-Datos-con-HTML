#Datos de peliculas
#Freddy Serrano Ochoa

create database datos_peliculas;

use datos_peliculas;

create table peliculas
(
	id_pelicula int(3) primary key not null AUTO_INCREMENT,
	nombre varchar(40) not null,
	nombre_autor varchar(40) not null,
	ano_creacion varchar(40),
	duracion varchar(40) not null,
	sipnasis varchar(40)
);

