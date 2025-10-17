CREATE DATABASE IF NOT EXISTS TapTaskServiceDB;

USE TAPTASKSERVICEDB;

CREATE TABLE IF NOT EXISTS USUARIOS (
iduser int auto_increment,
nombreUsuario varchar (100),
contrasena varchar (100),
creacion datetime,
suspension boolean,
eliminacion boolean,
constraint CLP_USUARIOS  PRIMARY KEY (iduser),
constraint CLU_USUARIOS UNIQUE KEY (nombreUsuario)
);

CREATE TABLE IF NOT EXISTS TELEFONOS (
iduser_telefonos int (100),
telefonos int (9),
constraint CLP_TELEFONOS  PRIMARY KEY (telefonos,iduser_telefonos),
constraint CLE_TELEFONOS  FOREIGN KEY (iduser_telefonos) REFERENCES usuarios(iduser)
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
constraint CLE_CLIENTES  FOREIGN KEY (iduser_clientes) REFERENCES usuarios(iduser)
);

CREATE TABLE IF NOT EXISTS ADMINISTRADORES (
iduser_administradores int auto_increment,
constraint CLP_ADMINISTRADORES  PRIMARY KEY (iduser_administradores),
constraint CLE_ADMINISTRADORES  FOREIGN KEY (iduser_administradores) REFERENCES usuarios(iduser)
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
idubicacion_proveedor int (100) NOT NULL,
constraint CLP_PROVEEDOR  PRIMARY KEY (iduser_proveedor),
constraint CLE_PROVEEDOR  FOREIGN KEY (iduser_proveedor) REFERENCES usuarios(iduser),
constraint CLE_PROVEEDOR2  FOREIGN KEY (idubicacion_proveedor) REFERENCES ubicacion(idubicacion)
);

CREATE TABLE IF NOT EXISTS UBICACION (
idubicacion int auto_increment,
departamento varchar (25),
localidad varchar (25),
barrios_montevideo enum ("Parque Rodo","Palermo","Punta Carretas","Barrio Sur","Punta Gorda",
       "Malvin","Buceo","Pocitos","Cordon","Carrasco","Ciudad Vieja","Aguada",
       "Carrasco Norte","Paso de las Duranas","La Comercial","Colon Sureste, Abayuba",
       "Centro","Malvin Norte","Parque Battle, Villa Dolores","Tres Cruces","Larrañaga",
       "Jacinto Vera","La Blanqueada","Bañados de Carrasco","Aires Puros","Prado, Nueva Savona",
       "La Figurita","Lezica, Melilla","Brazo Oriental","Villa Garcia, Manga Rural","Capurro, Bella Vista",
       "Las Canteras","Atahualpa","Reducto","Tres Ombues, Victoria","Paseo de la arena","Villa Española",
       "Mercado Modelo, Bolivar","Villa Muñóz, Retiro","Peñarol, Lavalleja","Cerrito",
       "Conciliacion","Nuevo Paris","Sayago","Colon Centro y Noroeste","Castro, Perez Castellanos",
       "La Teja","Manga, Toledo chico","Ituzaingo","Manga","Jardines del Hipodromo",
       "Maroñas, Parque Guarani","La Paloma, Tomkinson"," Casabo, Pajas Blancas",
       "Punta Rieles, Bella Italia","Las Acacias","Piedras Blancas","Union","Belvedere",
       "Casavalle","Flor de Maroñas","Cerro"),
calle text,
numero varchar (5),
constraint CLP_UBICACION PRIMARY KEY (idubicacion)
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
idimagenes int (100),
constraint CLP_SERVICIO  PRIMARY KEY (idservice),
constraint CLE_IMAGENES FOREIGN KEY (idimagenes) REFERENCES imagenes(idimagenes),
constraint CLE_SERVICIO FOREIGN KEY (iduser_servicio) REFERENCES PROVEEDOR(iduser_proveedor)
);

CREATE TABLE IF NOT EXISTS IMAGENES (
idservice_imagenes int (100),
imagenes varchar (100),
constraint CLP_IMAGENES PRIMARY KEY (idservice_imagenes,imagenes),
constraint CLE_IMAGENES FOREIGN KEY (idservice_imagenes) REFERENCES servicio(idservice)
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
constraint CLE_RESERVAS FOREIGN KEY (iduser_reserva) REFERENCES usuarios(iduser_clientes),
constraint CLE_RESERVAS2 FOREIGN KEY (idservice_reserva) REFERENCES servicio(idservice)
);

CREATE TABLE IF NOT EXISTS RESENAS (
idreview int auto_increment,
iduser_resenas int (100) NOT NULL,
idservice_resenas int (100) NOT NULL,
iduser_empresa int (100) NOT NULL,
contenido text,
calificacion_r int (1),
constraint CLP_RESENAS  PRIMARY KEY (idreview),
constraint CLE_RESENAS FOREIGN KEY (iduser_resenas) REFERENCES usuarios(iduser_clientes),
constraint CLE_RESENAS2 FOREIGN KEY (iduser_empresa) REFERENCES PROVEEDOR(iduser_proveedor),
constraint CLE_RESENAS3 FOREIGN KEY (idservice_resenas) REFERENCES servicio(idservice)
);

CREATE TABLE IF NOT EXISTS PREGUNTAS (
idpreguntas int auto_increment,
iduser_preguntas int (100) NOT NULL,
contenido text,
tipo enum ("Compra","Sistema","General"),
prioridad enum ("Muy baja","Baja","Moderada","Alta","Urgente"),
solucion boolean,
constraint CLP_PREGUNTAS PRIMARY KEY (idpreguntas),
constraint CLE_PREGUNTAS FOREIGN KEY (iduser_preguntas) REFERENCES CLIENTES(iduser)
);

CREATE TABLE IF NOT EXISTS MENSAJES(
idmensajes int auto_increment,
idchat_mensajes int (100) NOT NULL,
iduser_mensajes int (100) NOT NULL,
contenido text,
constraint CLP_MENSAJES PRIMARY KEY (idmensajes),
constraint CLE_MENSAJES FOREIGN KEY (idchat_mensajes) REFERENCES CHAT(idchat),
constraint CLE_MENSAJES2 FOREIGN KEY (iduser_mensajes) REFERENCES USUARIOS(iduser) -- modificar después
);

CREATE TABLE IF NOT EXISTS CHAT (
idchat int NOT NULL AUTO_INCREMENT,
<<<<<<< HEAD
iduser_1 int (100) NOT NULL,
iduser_2 int (100) NOT NULL,
creacion datetime DEFAULT CURRENT_TIMESTAMP,
eliminacion boolean,
constraint CLP_CHAT PRIMARY KEY (idchat),
constraint CLU_CHAT UNIQUE KEY (iduser_1),
constraint CLU_CHAT2 UNIQUE KEY (iduser_2),
=======
iduser_1 int NOT NULL,
iduser_2 int NOT NULL,
creacion datetime DEFAULT CURRENT_TIMESTAMP,
eliminacion boolean,
constraint CLP_CHAT PRIMARY KEY (idchat),
constraint CLU_CHAT UNIQUE KEY (iduser_1, iduser_2),
>>>>>>> b7ede9e (Avances en chat)
constraint CLE_CHAT FOREIGN KEY (iduser_1) REFERENCES USUARIOS(iduser),
constraint CLE_CHAT2 FOREIGN KEY (iduser_2) REFERENCES USUARIOS(iduser)
);

CREATE TABLE IF NOT EXISTS ESTADO (
idmensajes_estado int(100) NOT NULL,
<<<<<<< HEAD
enviado datetime DEFAULT CURRENT_TIMESTAMP, 
=======
enviado datetime DEFAULT CURRENT_TIMESTAMP,
>>>>>>> b7ede9e (Avances en chat)
entregado  datetime DEFAULT CURRENT_TIMESTAMP,
leido datetime DEFAULT CURRENT_TIMESTAMP,
editado boolean,
eliminado boolean,
constraint CLE_ESTADO FOREIGN KEY (idmensajes_estado) REFERENCES MENSAJES(idmensajes)
);

CREATE TABLE IF NOT EXISTS REPORTES (
idreporte int auto_increment,
idservicio_reportes int (100),
<<<<<<< HEAD
iduser_reportes int (100)
);
=======
iduser_reportes int (100),
contenido text,
solucion boolean,
constraint CLP_REPORTES PRIMARY KEY (idreporte)
constraint CLE_REPORTES FOREIGN KEY (idservicio_reportes) REFERENCES servicio(idservice),
constraint CLE_REPORTES2 FOREIGN KEY (iduser_reportes) REFERENCES CLIENTES (iduser)
);

>>>>>>> b7ede9e (Avances en chat)
