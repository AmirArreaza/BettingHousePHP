
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- LUGAR
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `LUGAR`;


CREATE TABLE `LUGAR`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`ciudad` VARCHAR(255)  NOT NULL,
	`estado` VARCHAR(255)  NOT NULL,
	`pais` VARCHAR(255)  NOT NULL,
	`avenida` VARCHAR(255)  NOT NULL,
	`calle` VARCHAR(255)  NOT NULL,
	`casa` INTEGER,
	`edificio` VARCHAR(255),
	`apartamento` INTEGER,
	`expires_at` DATETIME  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- USUARIO
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `USUARIO`;


CREATE TABLE `USUARIO`
(
	`nick` VARCHAR(255)  NOT NULL,
	`nombre` VARCHAR(255)  NOT NULL,
	`apellido` VARCHAR(255)  NOT NULL,
	`correo` VARCHAR(255)  NOT NULL,
	`credito` FLOAT  NOT NULL,
	`password` VARCHAR(255)  NOT NULL,
	`estado` TINYINT default 0 NOT NULL,
	`fkLugar` INTEGER  NOT NULL,
	PRIMARY KEY (`nick`),
	INDEX `USUARIO_FI_1` (`fkLugar`),
	CONSTRAINT `USUARIO_FK_1`
		FOREIGN KEY (`fkLugar`)
		REFERENCES `LUGAR` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- TELEFONO
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `TELEFONO`;


CREATE TABLE `TELEFONO`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`Telefono` INTEGER  NOT NULL,
	`fkUsuario` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `TELEFONO_FI_1` (`fkUsuario`),
	CONSTRAINT `TELEFONO_FK_1`
		FOREIGN KEY (`fkUsuario`)
		REFERENCES `USUARIO` (`nick`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- FORMAPAGO
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `FORMAPAGO`;


CREATE TABLE `FORMAPAGO`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`metodoPago` VARCHAR(255)  NOT NULL,
	`estado` TINYINT default 0 NOT NULL,
	`montoMax` FLOAT  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- DEPOSITO
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `DEPOSITO`;


CREATE TABLE `DEPOSITO`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`monto` FLOAT  NOT NULL,
	`fecha` DATE  NOT NULL,
	`fkFormaPago` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `DEPOSITO_FI_1` (`fkFormaPago`),
	CONSTRAINT `DEPOSITO_FK_1`
		FOREIGN KEY (`fkFormaPago`)
		REFERENCES `FORMAPAGO` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- USUARIOFORMAPAGO
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `USUARIOFORMAPAGO`;


CREATE TABLE `USUARIOFORMAPAGO`
(
	`fkUsuario` VARCHAR(255)  NOT NULL,
	`fkFormaPago` INTEGER  NOT NULL,
	PRIMARY KEY (`fkUsuario`,`fkFormaPago`),
	CONSTRAINT `USUARIOFORMAPAGO_FK_1`
		FOREIGN KEY (`fkUsuario`)
		REFERENCES `USUARIO` (`nick`)
		ON DELETE CASCADE,
	INDEX `USUARIOFORMAPAGO_FI_2` (`fkFormaPago`),
	CONSTRAINT `USUARIOFORMAPAGO_FK_2`
		FOREIGN KEY (`fkFormaPago`)
		REFERENCES `FORMAPAGO` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- CATEGORIA
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `CATEGORIA`;


CREATE TABLE `CATEGORIA`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombreCategoria` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- EVENTO
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `EVENTO`;


CREATE TABLE `EVENTO`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(255)  NOT NULL,
	`fechaIni` DATE  NOT NULL,
	`horaIni` TIME  NOT NULL,
	`resultado` VARCHAR(255),
	`fkCategoria` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `EVENTO_FI_1` (`fkCategoria`),
	CONSTRAINT `EVENTO_FK_1`
		FOREIGN KEY (`fkCategoria`)
		REFERENCES `CATEGORIA` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- APUESTA
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `APUESTA`;


CREATE TABLE `APUESTA`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`monto` FLOAT  NOT NULL,
	`fkUsuario` VARCHAR(255)  NOT NULL,
	`fkEvento` INTEGER  NOT NULL,
	`fkEquipo` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `APUESTA_FI_1` (`fkUsuario`),
	CONSTRAINT `APUESTA_FK_1`
		FOREIGN KEY (`fkUsuario`)
		REFERENCES `USUARIO` (`nick`),
	INDEX `APUESTA_FI_2` (`fkEvento`),
	CONSTRAINT `APUESTA_FK_2`
		FOREIGN KEY (`fkEvento`)
		REFERENCES `EVENTO` (`id`),
	INDEX `APUESTA_FI_3` (`fkEquipo`),
	CONSTRAINT `APUESTA_FK_3`
		FOREIGN KEY (`fkEquipo`)
		REFERENCES `EQUIPO` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- EQUIPO
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `EQUIPO`;


CREATE TABLE `EQUIPO`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(255)  NOT NULL,
	`nivel` INTEGER  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- EQUIPOEVENTO
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `EQUIPOEVENTO`;


CREATE TABLE `EQUIPOEVENTO`
(
	`fkEquipo` INTEGER  NOT NULL,
	`fkEvento` INTEGER  NOT NULL,
	PRIMARY KEY (`fkEquipo`,`fkEvento`),
	CONSTRAINT `EQUIPOEVENTO_FK_1`
		FOREIGN KEY (`fkEquipo`)
		REFERENCES `EQUIPO` (`id`)
		ON DELETE CASCADE,
	INDEX `EQUIPOEVENTO_FI_2` (`fkEvento`),
	CONSTRAINT `EQUIPOEVENTO_FK_2`
		FOREIGN KEY (`fkEvento`)
		REFERENCES `EVENTO` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
