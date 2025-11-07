CREATE DATABASE IF NOT EXISTS TapTaskServiceDB;

USE TapTaskServiceDB;

CREATE TABLE IF NOT EXISTS USUARIOS (
iduser int auto_increment,
nombreUsuario varchar (100),
contrasena varchar (100),
2fa boolean,
creacion datetime,
suspension boolean,
eliminacion boolean,
constraint CLP_USUARIOS  PRIMARY KEY (iduser),
constraint CLU_USUARIOS UNIQUE KEY (nombreUsuario)
);

CREATE TABLE IF NOT EXISTS TELEFONOS (
iduser_telefonos int,
telefonos int,
constraint CLP_TELEFONOS  PRIMARY KEY (telefonos,iduser_telefonos),
constraint CLE_TELEFONOS  FOREIGN KEY (iduser_telefonos) REFERENCES USUARIOS(iduser) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS CLIENTES (
iduser_clientes int auto_increment,
reputacion_cl ENUM ("Faltan datos suficientes","Madera","Plata","Platino","Diamante","Radiante"),
fecha_nacimiento date,
nombre varchar (100),
apellido varchar (100),
foto_perfil VARCHAR(100),
email_cl varchar(100),
constraint CLP_CLIENTES  PRIMARY KEY (iduser_clientes),
constraint CLE_CLIENTES  FOREIGN KEY (iduser_clientes) REFERENCES USUARIOS(iduser) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS ADMINISTRADORES (
iduser_administradores int auto_increment,
tipo_admin ENUM('admin', 'moderador', 'soporte') NOT NULL,
email_admin varchar (100),
constraint CLP_ADMINISTRADORES  PRIMARY KEY (iduser_administradores),
constraint CLE_ADMINISTRADORES  FOREIGN KEY (iduser_administradores) REFERENCES USUARIOS(iduser) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS UBICACION (
idubicacion int auto_increment,
departamento varchar (25),
localidad varchar (25),
barrios_montevideo enum ("Parque Rodo","Palermo","Punta Carretas","Barrio Sur","Punta Gorda",
       "Malvin","Buceo","Pocitos","Cordon","Carrasco","Ciudad Vieja","Aguada",
       "Carrasco Norte","Paso de las Duranas","La Comercial","Colon Sureste, Abayuba",
       "Centro","Malvin Norte","Parque Battle, Villa Dolores","Tres Cruces","Larranaga",
       "Jacinto Vera","La Blanqueada","Banados de Carrasco","Aires Puros","Prado, Nueva Savona",
       "La Figurita","Lezica, Melilla","Brazo Oriental","Villa Garcia, Manga Rural","Capurro, Bella Vista",
       "Las Canteras","Atahualpa","Reducto","Tres Ombues, Victoria","Paseo de la arena","Villa Espanola",
       "Mercado Modelo, Bolivar","Villa Munoz, Retiro","Penarol, Lavalleja","Cerrito",
       "Conciliacion","Nuevo Paris","Sayago","Colon Centro y Noroeste","Castro, Perez Castellanos",
       "La Teja","Manga, Toledo chico","Ituzaingo","Manga","Jardines del Hipodromo",
       "Maronas, Parque Guarani","La Paloma, Tomkinson"," Casabo, Pajas Blancas",
       "Punta Rieles, Bella Italia","Las Acacias","Piedras Blancas","Union","Belvedere",
       "Casavalle","Flor de Maronas","Cerro"),
calle text,
numero varchar (5),
constraint CLP_UBICACION PRIMARY KEY (idubicacion)
);
CREATE TABLE IF NOT EXISTS PROVEEDOR (
iduser_proveedor int auto_increment,
reputacion_em ENUM ("Faltan datos suficientes","Madera","Plata","Platino","Diamante","Radiante"),
empresa_asociada varchar (100),
historial varchar (100),
rut varchar (12),
codigo_postal varchar (5),
rubro_sector varchar (100),
cualificaciones text,
foto_logo VARCHAR(100),
email_em varchar(100),
idubicacion_proveedor int NOT NULL,
constraint CLP_PROVEEDOR  PRIMARY KEY (iduser_proveedor),
constraint CLE_PROVEEDOR  FOREIGN KEY (iduser_proveedor) REFERENCES USUARIOS(iduser) ON DELETE CASCADE,
constraint CLE_PROVEEDOR2  FOREIGN KEY (idubicacion_proveedor) REFERENCES UBICACION(idubicacion) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS SERVICIO(
idservice int auto_increment,
iduser_servicio int NOT NULL,
titulo varchar (100),
descripcion text,
etiquetas varchar (100),
ubicacion varchar (255),
precio DECIMAL(10,2),
disponibilidad enum ("Disponible","Ocupado"),
tiposervicio enum ("Online","A domicilio","En sitio"),
duracion time,
constraint CLP_SERVICIO  PRIMARY KEY (idservice),
constraint CLE_SERVICIO FOREIGN KEY (iduser_servicio) REFERENCES PROVEEDOR(iduser_proveedor) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS IMAGENES (
id INT AUTO_INCREMENT,
idservice_imagenes int,
imagenes varchar (255),
constraint CLP_IMAGENES PRIMARY KEY (id),
constraint CLE_IMAGENES FOREIGN KEY (idservice_imagenes) REFERENCES SERVICIO(idservice) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS RESERVAS (
idreserva int NOT NULL AUTO_INCREMENT,
iduser_reserva int NOT NULL,
idservice_reserva int NOT NULL,
disponibilidad date,
fecha_inicio datetime NOT NULL,
fecha_final datetime,
cancelacion boolean,
confirmacion boolean,
constraint CLP_RESERVAS PRIMARY KEY (idreserva),
constraint CLE_RESERVAS FOREIGN KEY (iduser_reserva) REFERENCES USUARIOS(iduser) ON DELETE CASCADE,
constraint CLE_RESERVAS2 FOREIGN KEY (idservice_reserva) REFERENCES SERVICIO(idservice) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS RESENAS (
idreview int auto_increment,
iduser_resenas int NOT NULL,
idservice_resenas int NOT NULL,
iduser_empresa int NOT NULL,
contenido text,
calificacion_r int,
constraint CLP_RESENAS  PRIMARY KEY (idreview),
constraint CLE_RESENAS FOREIGN KEY (iduser_resenas) REFERENCES CLIENTES(iduser_clientes) ON DELETE CASCADE,
constraint CLE_RESENAS2 FOREIGN KEY (iduser_empresa) REFERENCES PROVEEDOR(iduser_proveedor) ON DELETE CASCADE,
constraint CLE_RESENAS3 FOREIGN KEY (idservice_resenas) REFERENCES SERVICIO(idservice) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS PREGUNTAS (
idpreguntas int auto_increment,
iduser_preguntas int NOT NULL,
contenido text,
tipo enum ("Compra","Sistema","General"),
prioridad enum ("Muy baja","Baja","Moderada","Alta","Urgente"),
solucion boolean,
constraint CLP_PREGUNTAS PRIMARY KEY (idpreguntas),
constraint CLE_PREGUNTAS FOREIGN KEY (iduser_preguntas) REFERENCES USUARIOS(iduser) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS CHAT (
idchat int NOT NULL AUTO_INCREMENT,
iduser_1 int NOT NULL,
iduser_2 int NOT NULL,
creacion datetime DEFAULT CURRENT_TIMESTAMP,
eliminacion boolean,
constraint CLP_CHAT PRIMARY KEY (idchat),
constraint CLU_CHAT UNIQUE KEY (iduser_1, iduser_2),
constraint CLE_CHAT FOREIGN KEY (iduser_1) REFERENCES USUARIOS(iduser) ON DELETE CASCADE,
constraint CLE_CHAT2 FOREIGN KEY (iduser_2) REFERENCES USUARIOS(iduser) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS MENSAJES(
idmensajes int auto_increment,
idchat_mensajes int NOT NULL,
iduser_mensajes int NOT NULL,
contenido text,
constraint CLP_MENSAJES PRIMARY KEY (idmensajes),
constraint CLE_MENSAJES FOREIGN KEY (idchat_mensajes) REFERENCES CHAT(idchat) ON DELETE CASCADE,
constraint CLE_MENSAJES2 FOREIGN KEY (iduser_mensajes) REFERENCES USUARIOS(iduser)  ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS ESTADO (
idmensajes_estado int NOT NULL,
enviado datetime DEFAULT CURRENT_TIMESTAMP,
entregado  datetime DEFAULT CURRENT_TIMESTAMP,
leido datetime DEFAULT CURRENT_TIMESTAMP,
editado boolean,
eliminado boolean,
constraint CLE_ESTADO FOREIGN KEY (idmensajes_estado) REFERENCES MENSAJES(idmensajes) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS REPORTES_S (
idreporte int auto_increment,
idservicio_reportes int,
iduser_reportes int,
tipo int,
contenido text,
solucion boolean,
constraint CLP_REPORTES_S PRIMARY KEY (idreporte),
constraint CLE_REPORTES_S FOREIGN KEY (idservicio_reportes) REFERENCES SERVICIO(idservice) ON DELETE CASCADE,
constraint CLE_REPORTES_S2 FOREIGN KEY (iduser_reportes) REFERENCES CLIENTES (iduser_clientes) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS REPORTES_P (
idreporte int auto_increment,
iduser_reportado int,
iduser_reportes int,
tipo int,
contenido text,
solucion boolean,
constraint CLP_REPORTES_P PRIMARY KEY (idreporte),
constraint CLE_REPORTES_P FOREIGN KEY (iduser_reportado) REFERENCES PROVEEDOR (iduser_proveedor) ON DELETE CASCADE,
constraint CLE_REPORTES_P2 FOREIGN KEY (iduser_reportes) REFERENCES CLIENTES (iduser_clientes) ON DELETE CASCADE
);
INSERT INTO USUARIOS (idUser, nombreUsuario, contrasena, creacion, suspension, eliminacion)
VALUES 
(1, 'administrador', '$2y$10$Mq8vlkGxqfap95Mk/tyaQek8EC1egAPi7UYTkjbFtvfUNQUmKPnhS', NOW(), 0, 0),
(2, 'moderador', '$2y$10$gXMA9SlHbF5d4mgq8kbrpusImKcjni7zkY.0.5J.1HIBUb1ogcIaa', NOW(), 0, 0),
(3, 'soporte', '$2y$10$PwSjK0ItL.VkExqs0wlVcegpBRuzOEGGo3hFpC2l.m/QifouvSehO', NOW(), 0, 0);
INSERT INTO ADMINISTRADORES (iduser_administradores, tipo_admin, email_admin)
VALUES 
(1, 'admin', 'administrador@gmail.com'),
(2, 'moderador', 'moderador@gmail.com'),
(3, 'soporte', 'soporte@gmail.com');
