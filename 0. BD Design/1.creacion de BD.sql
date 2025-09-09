CREATE DATABASE IF NOT EXISTS bd_sistema_de_certificados_sediprano;

USE bd_sistema_de_certificados_sediprano;

#____________________________________________________________________
#________________TABLAS SIN REFERENCIA A OTRAS TABLAS________________
#____________________________________________________________________
#TABLA O1
CREATE TABLE areas (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(40) NOT NULL,
  abreviatura VARCHAR(10) NULL,
  estado ENUM('Activa','Inactiva') NOT NULL DEFAULT 'Activa',
  PRIMARY KEY(id)
);
#TABLA O2
CREATE TABLE cargos (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(150) NOT NULL,
  nombre_femenino VARCHAR(150) NULL,
  cargo_interno BOOLEAN NOT NULL DEFAULT TRUE,
  PRIMARY KEY(id),
  UNIQUE INDEX cargos_nombre_unique(nombre),
  UNIQUE INDEX cargos_nombre_femenino_unique(nombre_femenino)
);
#TABLA O3
CREATE TABLE entidades_aliadas (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  acronimo VARCHAR(15) NULL,
  cargo_representante_id INTEGER UNSIGNED NULL,
  PRIMARY KEY(id),
  UNIQUE INDEX entidades_aliadas_nombre_unique(nombre),
  UNIQUE INDEX entidades_aliadas_acronimo_unique(acronimo),
  INDEX entidades_aliadas_FKIndex1(cargo_representante_id)
);
#TABLA O4
CREATE TABLE fuentes (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
);
#TABLA O5
CREATE TABLE imagenes (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(255) NULL,
  ruta VARCHAR(300) NOT NULL,
  tipo ENUM('Logo','Plantilla','Sello') NOT NULL,
  estado ENUM('Activa','Inactiva','Archivada','Eliminada') NOT NULL DEFAULT 'Activa',
  extension VARCHAR(10) NULL,
  PRIMARY KEY(id)
);
#TABLA O6
CREATE TABLE roles (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NULL,
  descripcion VARCHAR(255) NULL,
  PRIMARY KEY(id)
);
#TABLA O7
CREATE TABLE secciones_de_informacion (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  PRIMARY KEY(id)
);
#TABLA O8
CREATE TABLE tipos_de_certificacion (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(150) NOT NULL,
  descripcion TEXT NULL,
  codigo VARCHAR(30) NULL,
  PRIMARY KEY(id)
);
#TABLA O9
CREATE TABLE valores_destacados (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  PRIMARY KEY(id)
);
#____________________________________________________________________
#________________TABLAS CON REFERENCIA A OTRAS TABLAS________________
#____________________________________________________________________
#TABLA 10
CREATE TABLE personas (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombres VARCHAR(150) NOT NULL,
  apellidos VARCHAR(150) NOT NULL,
  correo_personal VARCHAR(150) NULL,
  correo_institucional VARCHAR(150) NULL,
  sexo ENUM('Masculino','Femenino') NOT NULL,
  codigo VARCHAR(10) NULL,
  imagen_firma VARCHAR(300) NULL,
  PRIMARY KEY(id),
  UNIQUE INDEX personas_correo_personal_unique(correo_personal),
  UNIQUE INDEX personas_correo_institucional_unique(correo_institucional)
);
#TABLA 11
CREATE TABLE users (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  persona_id INTEGER UNSIGNED NOT NULL,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  profile_picture VARCHAR(300) NULL,
  estado ENUM('Pendiente','Activo','Inactivo','Rechazado','Eliminado') NULL DEFAULT 'Pendiente',
  email_verified_at TIMESTAMP NULL,
  password VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  INDEX users_FKIndex2(persona_id),
  UNIQUE INDEX users_email_unique(email)
);
#____________________________________________________________________

#____________________________________________________________________
#_____________________TABLAS INTERMEDIAS(CON ID)_____________________
#____________________________________________________________________
#TABLA 12
CREATE TABLE area_persona (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  area_id INTEGER UNSIGNED NOT NULL,
  persona_id INTEGER UNSIGNED NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NULL,
  estado_inicial ENUM('Miembro activo','Cambio de área','Cargo en Directiva','Retiro voluntario','Retiro por bajo rendimiento','Egresado') NOT NULL DEFAULT 'Miembro activo',
  estado_final ENUM('Miembro activo','Cambio de área','Cargo en Directiva','Retiro voluntario','Retiro por bajo rendimiento','Egresado') NULL DEFAULT NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  INDEX area_persona_FKIndex1(persona_id),
  INDEX area_persona_FKIndex2(area_id)
);
#TABLA 13
CREATE TABLE area_persona_cargo (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  area_persona_id INTEGER UNSIGNED NOT NULL,
  cargo_id INTEGER UNSIGNED NOT NULL,
  proyecto_coordinado_id INTEGER UNSIGNED NULL,
  fecha_inicio DATE NULL,
  fecha_fin DATE NULL,
  estado_inicial ENUM('Cargo activo','Cambio de cargo','Retiro voluntario de cargo' ,'Retiro de cargo por bajo rendimiento' , 'Cargo finalizado') NOT NULL DEFAULT 'Cargo activo',
  estado_final ENUM('Cargo activo','Cambio de cargo','Retiro voluntario de cargo' ,'Retiro de cargo por bajo rendimiento' , 'Cargo finalizado') NULL DEFAULT NULL,
  PRIMARY KEY(id),
  INDEX area_persona_cargo_FKIndex1(area_persona_id),
  INDEX area_persona_cargo_FKIndex2(cargo_id),
  INDEX area_persona_cargo_FKIndex4(proyecto_coordinado_id)
);
#____________________________________________________________________

#____________________________________________________________________
#________________TABLAS CON REFERENCIA A OTRAS TABLAS________________
#____________________________________________________________________
#TABLA 14 (area_id en caso se realice un proyecto interno de un área)
CREATE TABLE proyectos (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  area_persona_cargo_id_dp INTEGER UNSIGNED NOT NULL,
  area_persona_cargo_id_codp INTEGER UNSIGNED NULL,
  area_id INTEGER UNSIGNED NULL,
  nombre VARCHAR(150) NOT NULL,
  imagen_logo VARCHAR(300) NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NULL,
  PRIMARY KEY(id),
  INDEX proyectos_FKIndex2(area_persona_cargo_id_dp),
  INDEX proyectos_FKIndex3(area_persona_cargo_id_codp),
  INDEX proyectos_FKIndex4(area_id)
);
#TABLA 15
CREATE TABLE eventos (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  proyecto_id INTEGER UNSIGNED NULL,
  nombre VARCHAR(255) NULL,
  fecha DATE NULL,
  tipo ENUM('Taller','Capacitación','Conferencia' ,'Seminario' ,'Ejecución de proyecto') NOT NULL DEFAULT 'Ejecución de proyecto',
  PRIMARY KEY(id),
  INDEX eventos_FKIndex1(proyecto_id)
);
#____________________________________________________________________

#____________________________________________________________________
#________________________TABLA INTERMEDIA PURA_______________________
#____________________________________________________________________
#TABLA 16
CREATE TABLE area_persona_proyecto (
  area_persona_id INTEGER UNSIGNED NOT NULL,
  proyecto_id INTEGER UNSIGNED NOT NULL,
  rol ENUM('Miembro','Staff de apoyo') NOT NULL DEFAULT 'Miembro',
  PRIMARY KEY(area_persona_id, proyecto_id),
  INDEX area_persona_proyecto_FKIndex1(area_persona_id),
  INDEX area_persona_proyecto_FKIndex2(proyecto_id)
);
#____________________________________________________________________

#____________________________________________________________________
#_____________________TABLAS INTERMEDIAS(CON ID)_____________________
#____________________________________________________________________
#TABLA 17
CREATE TABLE area_persona_valor_destacado (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  area_persona_id INTEGER UNSIGNED NOT NULL,
  valor_destacado_id INTEGER UNSIGNED NOT NULL,
  anio YEAR NOT NULL,
  periodo ENUM('I','II') NOT NULL,
  PRIMARY KEY(id),
  INDEX area_persona_valor_destacado_FKIndex1(valor_destacado_id),
  INDEX area_persona_valor_destacado_FKIndex2(area_persona_id)
);
#TABLA 18
CREATE TABLE entidad_aliada_persona (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  entidad_aliada_id INTEGER UNSIGNED NOT NULL,
  persona_id INTEGER UNSIGNED NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NULL,
  rol ENUM('Miembro','Representante') NOT NULL DEFAULT 'Miembro',
  estado ENUM('Activo','Inactivo','Retirado') NOT NULL DEFAULT 'Activo',
  PRIMARY KEY(id),
  INDEX entidad_aliada_persona_FKIndex1(entidad_aliada_id),
  INDEX entidad_aliada_persona_FKIndex2(persona_id)
);
#____________________________________________________________________

#____________________________________________________________________
#________________________TABLA INTERMEDIA PURA_______________________
#____________________________________________________________________
#TABLA 19
CREATE TABLE evento_persona (
  persona_id INTEGER UNSIGNED NOT NULL,
  evento_id INTEGER UNSIGNED NOT NULL,
  rol ENUM('Ponente','Participante') NOT NULL,
  PRIMARY KEY(persona_id, evento_id),
  INDEX evento_persona_FKIndex1(evento_id),
  INDEX evento_persona_FKIndex2(persona_id)
);
#TABLA 20
CREATE TABLE entidad_aliada_persona_proyecto (
  entidad_aliada_persona_id INTEGER UNSIGNED NOT NULL,
  proyecto_id INTEGER UNSIGNED NOT NULL,
  rol ENUM('Miembro externo','Staff de apoyo externo') NOT NULL DEFAULT 'Miembro externo',
  PRIMARY KEY(entidad_aliada_persona_id, proyecto_id),
  INDEX entidad_aliada_persona_proyecto_FKIndex1(entidad_aliada_persona_id),
  INDEX entidad_aliada_persona_proyecto_FKIndex2(proyecto_id)
);
#____________________________________________________________________

#____________________________________________________________________
#_________________TABLA CON REFERENCIA A OTRAS TABLAS________________
#____________________________________________________________________
#TABLA 21
CREATE TABLE grupos_de_certificacion (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo_de_certificacion_id INTEGER UNSIGNED NOT NULL,
  imagen_plantilla_id INTEGER UNSIGNED NULL,
  imagen_logo_sediprano_id INTEGER UNSIGNED NULL,
  imagen_sello_id INTEGER UNSIGNED NULL,
  proyecto_id INTEGER UNSIGNED NULL,
  evento_id INTEGER UNSIGNED NULL,
  usuario_creador_id INTEGER UNSIGNED NULL,
  usuario_generador_id INTEGER UNSIGNED NULL,
  nombre VARCHAR(255) NOT NULL,
  descripcion TEXT NULL,
  fecha_emision DATE NOT NULL,
  fecha_generacion DATE NULL,
  estado ENUM('Pendiente','Validado','Rechazado','Generado','Anulado') NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY(id),
  INDEX grupos_de_certificacion_FKIndex1(tipo_de_certificacion_id),
  INDEX grupos_de_certificacion_FKIndex2(usuario_creador_id),
  INDEX grupos_de_certificacion_FKIndex3(usuario_generador_id),
  INDEX grupos_de_certificacion_FKIndex4(proyecto_id),
  INDEX grupos_de_certificacion_FKIndex5(evento_id),
  INDEX grupos_de_certificacion_FKIndex6(imagen_plantilla_id),
  INDEX grupos_de_certificacion_FKIndex7(imagen_logo_sediprano_id),
  INDEX grupos_de_certificacion_FKIndex8(imagen_sello_id)
);
#TABLA 22
CREATE TABLE certificados (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  persona_id INTEGER UNSIGNED NOT NULL,
  grupo_de_certificacion_id INTEGER UNSIGNED NOT NULL,
  codigo VARCHAR(100) NULL,
  ruta_qr VARCHAR(255) NULL,
  estado ENUM('Pendiente','Validado','Rechazado','Generado','Anulado') NOT NULL DEFAULT 'Validado',
  PRIMARY KEY(id),
  INDEX certificados_FKIndex1(persona_id),
  INDEX certificados_FKIndex2(grupo_de_certificacion_id),
  UNIQUE INDEX certificados_persona_id_grupo_id_unique(persona_id, grupo_de_certificacion_id)
);
#____________________________________________________________________

#____________________________________________________________________
#_______________________TABLAS INTERMEDIAS PURAS_____________________
#____________________________________________________________________
#TABLA 23
CREATE TABLE configuraciones (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  seccion_de_informacion_id INTEGER UNSIGNED NOT NULL,
  grupo_de_certificacion_id INTEGER UNSIGNED NOT NULL,
  fuente_id INTEGER UNSIGNED NOT NULL,
  tamanio_fuente INTEGER UNSIGNED NOT NULL DEFAULT 16,
  estilo_fuente ENUM('Normal','Negrita','Cursiva','Negrita Cursiva') NOT NULL DEFAULT 'Normal',
  capitalizacion ENUM('Tipo oración','Mayúsculas','Minúsculas','Mayúsculas primera letra de cada palabra','Alternar mayúsculas y minúsculas') NOT NULL DEFAULT 'Tipo oración',
  color_inicial VARCHAR(7) NOT NULL,
  color_medio VARCHAR(7) NULL,
  color_final VARCHAR(7) NULL,
  PRIMARY KEY(id),
  INDEX configuraciones_FKIndex1(seccion_de_informacion_id),
  INDEX configuraciones_FKIndex2(fuente_id),
  INDEX configuraciones_FKIndex3(grupo_de_certificacion_id),
  UNIQUE INDEX configuraciones_seccion_id_grupo_id_unique(seccion_de_informacion_id, grupo_de_certificacion_id)
);
#TABLA 24
CREATE TABLE user_rol (
  user_id INTEGER UNSIGNED NOT NULL,
  rol_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(user_id, rol_id),
  INDEX user_rol_FKIndex1(user_id),
  INDEX user_rol_FKIndex2(rol_id)
);
#____________________________________________________________________