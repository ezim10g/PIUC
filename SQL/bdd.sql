CREATE DATABASE PIUC;

USE PIUC;

CREATE TABLE usuario(
idUsuario INT PRIMARY KEY AUTO_INCREMENT,
nomeUsuario VARCHAR(25) NOT NULL,
email varchar(255) UNIQUE NOT NULL,
senhaUsuario CHAR(60) NOT NULL
);

CREATE TABLE tipo_perfil(
idTipoPerfil INT PRIMARY KEY AUTO_INCREMENT,
nomeTipoPerfil VARCHAR(20)
);

INSERT INTO tipo_perfil (nomeTipoPerfil)VALUES
("administrador"),
("membro"),
("usuário");

CREATE TABLE tag(
idTag INT PRIMARY KEY AUTO_INCREMENT,
nomeTag VARCHAR(30)
);

CREATE TABLE post(
idPost INT PRIMARY KEY AUTO_INCREMENT,
tituloPost VARCHAR(100) NOT NULL,
imagemPost VARCHAR(255),
conteudoPost TEXT NOT NULL,
dataPost DATETIME NOT NULL
);

CREATE TABLE perfil(
idPerfil INT PRIMARY KEY AUTO_INCREMENT,
idUsuario INT UNIQUE,
idTipoPerfil INT,
fotoPerfil VARCHAR(255),
newsLetter BOOLEAN,
FOREIGN KEY(idTipoPerfil) REFERENCES tipo_perfil(idTipoPerfil)
FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario)
);

CREATE TABLE perfil_tag(
idTag INT  NOT NULL,
idPerfil INT  NOT NULL,
PRIMARY KEY(idTag, idPerfil),
FOREIGN KEY(idTag) REFERENCES tag(idTag),
FOREIGN KEY(idPerfil) REFERENCES perfil(idPerfil)
);


CREATE TABLE post_tag(
idTag INT  NOT NULL,
idPost INT  NOT NULL,
PRIMARY KEY(idTag, idPost),
FOREIGN KEY(idTag) REFERENCES tag(idTag),
FOREIGN KEY(idPost) REFERENCES post(idPost)
);

CREATE TABLE comentario(
idComentario INT PRIMARY KEY AUTO_INCREMENT,
conteudoComentario varchar(500) NOT NULL,
idPerfil INT NOT NULL,
idPost INT NOT NULL,
FOREIGN KEY(idPerfil) REFERENCES perfil(idPerfil),
FOREIGN KEY(idPost) REFERENCES post(idPost)
);

CREATE TABLE resposta(
idResposta INT PRIMARY KEY AUTO_INCREMENT,
conteudoResposta VARCHAR(500) NOT NULL,
idPerfil INT NOT NULL,
idComentario INT NOT NULL,
FOREIGN KEY(idPerfil) REFERENCES perfil(idPerfil),
FOREIGN KEY(idComentario) REFERENCES comentario(idComentario)
)

CREATE VIEW vw_infoUsuario AS SELECT 
usuario.nomeUsuario AS nome,
usuario.email,
perfil.idTipoPerfil AS tipoPerfil,
perfil.fotoPerfil,
perfil.newsLetter 
FROM usuario INNER JOIN perfil ON usuario.idUsuario = perfil.idUsuario; 
