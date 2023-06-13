CREATE DATABASE piuc;

USE piuc;

CREATE TABLE usuario(
idUsuario INT PRIMARY KEY AUTO_INCREMENT,
nomeUsuario VARCHAR(25) NOT NULL,
emailUsuario varchar(191) UNIQUE NOT NULL,
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


CREATE TABLE perfil(
idPerfil INT PRIMARY KEY AUTO_INCREMENT,
idUsuario INT UNIQUE,
idTipoPerfil INT,
fotoPerfil VARCHAR(191),
newsLetter BOOLEAN,
temaPerfil varchar(10),
FOREIGN KEY(idTipoPerfil) REFERENCES tipo_perfil(idTipoPerfil),
FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario) ON DELETE CASCADE
);




CREATE TABLE token(
idToken INT PRIMARY KEY,
idUsuario INT NOT NULL,
token VARCHAR(60) NOT NULL,
tempoSessao DATE,
createdAt DATE,
FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario) ON DELETE CASCADE
);

CREATE VIEW vw_infoUsuario AS SELECT 
usuario.idUsuario,
usuario.nomeUsuario AS nome,
usuario.emailUsuario,
perfil.idTipoPerfil AS tipoPerfil,
perfil.fotoPerfil,
perfil.newsLetter,
perfil.temaPerfil As tema
FROM usuario INNER JOIN perfil ON usuario.idUsuario = perfil.idUsuario; 


CREATE TABLE contato(
nomeContato VARCHAR(64),
emailContato VARCHAR(191),
assuntoContato VARCHAR(64),
mensagemContato TEXT
);
