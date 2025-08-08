CREATE DATABASE IF NOT EXISTS TapTaskServiceDB;

USE TAPTASKSERVICEDB;

CREATE TABLE IF NOT EXISTS USUARIOS (
iduser int auto_increment,
nombreUsuario varchar (100),
contrasena varchar (100),
constraint CLP_USUARIOS  PRIMARY KEY (iduser,nombreUsuario)
);

CREATE TABLE IF NOT EXISTS TELEFONOS (
iduser_telefonos int (100),
telefonos int (9),
constraint CLP_TELEFONOS  PRIMARY KEY (telefonos,iduser_telefonos),
constraint CLE_TELEFONOS  FOREIGN KEY (iduser_telefonos) REFERENCES usuarios(iduser)
);

CREATE TABLE IF NOT EXISTS CLIENTES (
iduser_clientes int (100),
reputacion_cl ENUM ("Faltan datos suficientes","Madera","Plata","Platino","Diamante","Radiante"),
fecha_nacimiento date,
nombre varchar (100),
apellido varchar (100),
foto_perfil VARCHAR (100),
email_cl varchar(100),
constraint CLP_CLIENTES  PRIMARY KEY (iduser_clientes),
constraint CLE_CLIENTES  FOREIGN KEY (iduser_clientes) REFERENCES usuarios(iduser)
);

CREATE TABLE IF NOT EXISTS ADMINISTRADORES (
iduser_administradores int (100),
constraint CLP_ADMINISTRADORES  PRIMARY KEY (iduser_administradores),
constraint CLE_ADMINISTRADORES  FOREIGN KEY (iduser_administradores) REFERENCES usuarios(iduser)
);

CREATE TABLE IF NOT EXISTS PROVEEDOR (
iduser_proveedor int (100),
reputacion_em ENUM ("Faltan datos suficientes","Madera","Plata","Platino","Diamante","Radiante"),
empresa_asociada varchar (100),
historial varchar (100),
rut_nit_cuit int (12),
codigo_postal int (5),
rubro_sector varchar (100),
cualificaciones text,
foto_logo VARCHAR(100),
email_em varchar(100),
constraint CLP_PROVEEDOR  PRIMARY KEY (iduser_proveedor),
constraint CLE_PROVEEDOR  FOREIGN KEY (iduser_proveedor) REFERENCES usuarios(iduser)
);

CREATE TABLE SERVICIO (
idservice int auto_increment,
titulo varchar (100),
descripcion text,
etiquetas varchar (100),
ubicacion varchar (255),
precio int (10.2),
disponibilidad enum ("Disponible","Ocupado"),
imagenes varchar (100),
constraint CLP_SERVICIO  PRIMARY KEY (idservice)
);

CREATE TABLE IF NOT EXISTS OFERTA(
idoferta int auto_increment,
iduser_oferta int(100),
idservice_oferta int(100),
fecha_inicio datetime not null,
fecha_final datetime,
constraint CLP_OFERTA PRIMARY KEY (idoferta,iduser_oferta,idservice_oferta),
constraint CLE_OFERTA FOREIGN KEY (iduser_oferta) REFERENCES clientes (iduser_clientes),
constraint CLE_OFERTA2 FOREIGN KEY (idservice_oferta) REFERENCES clientes (idservice)
);

CREATE TABLE IF NOT EXISTS CONTRATAR(
idcontratar int auto_increment,
iduser_contratar int(100),
idservice_contratar int(100),
fecha_inicio datetime not null,
fecha_final datetime,
constraint CLP_CONTRATAR PRIMARY KEY (idcontratar,iduser_contratar,idservice_contratar),
constraint CLE_CONTRATAR FOREIGN KEY (iduser_contratar) REFERENCES clientes (iduser_clientes),
constraint CLE_CONTRATAR2 FOREIGN KEY (idservice_contratar) REFERENCES clientes (idservice)
);

CREATE TABLE IF NOT EXISTS RESENAS (
idresenas int auto_increment,
iduser_resenas int (100) not null,
idservice_resenas int (100) not null,
iduser_empresa int (100) not null,
contenido text,
calificacion_r int (1),
constraint CLP_RESENAS  PRIMARY KEY (idresenas),
constraint CLE_RESENAS FOREIGN KEY (iduser_resenas) REFERENCES usuarios(iduser),
constraint CLE_RESENAS2 FOREIGN KEY (iduser_empresa) REFERENCES PROVEEDOR(iduser_proveedor),
constraint CLE_RESENAS3 FOREIGN KEY (idservice_resenas) REFERENCES servicio(idservice)
);