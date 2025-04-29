CREATE DATABASE IF NOT EXISTS certificate_system_database;

USE certificate_system_database;

#TABLA 1
CREATE TABLE image_statuses (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  PRIMARY KEY(id)
);
#TABLA 2
CREATE TABLE image_types (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
);
#TABLA 3
CREATE TABLE font_styles (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  PRIMARY KEY(id)
);
#TABLA 4
CREATE TABLE certification_types (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(150) NOT NULL,
  abbreviation VARCHAR(5) NULL,
  PRIMARY KEY(id),
  UNIQUE INDEX certification_types_abbreviation_unique(abbreviation)
);
#TABLA 5
CREATE TABLE fonts (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
);
#TABLA 6
CREATE TABLE roles (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  description VARCHAR(255) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id)
);
#TABLA USER 7 | CACHE 8 | JOBS 9
CREATE TABLE users (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(300) NOT NULL,
  email VARCHAR(255) NOT NULL,
  email_verified_at TIMESTAMP NULL,
  password VARCHAR(255) NOT NULL,
  remember_token VARCHAR(255) NOT NULL,
  is_active BOOL NOT NULL DEFAULT 1,
  profile_image_url VARCHAR(300) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  UNIQUE INDEX users_email_unique(email)
);
#TABLA 10
CREATE TABLE positions (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  is_internal_position BOOL NOT NULL DEFAULT 0,
  PRIMARY KEY(id),
  INDEX positions_name_index(name)
);
#TABLA 11
CREATE TABLE outstanding_values (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  PRIMARY KEY(id)
);
#TABLA 12
CREATE TABLE people (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(150) NOT NULL,
  last_name VARCHAR(150) NOT NULL,
  email VARCHAR(255) NOT NULL,
  gender ENUM('masculino','femenino') NOT NULL,
  signature_image_url VARCHAR(300) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  UNIQUE INDEX people_email_unique(email)
);
#TABLA 13
CREATE TABLE certificate_text_types (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  PRIMARY KEY(id)
);
#TABLA 14
CREATE TABLE certificate_statuses (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  PRIMARY KEY(id)
);
#TABLA 15
CREATE TABLE areas (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  abbreviation VARCHAR(10) NULL,
  PRIMARY KEY(id),
  INDEX areas_name_index(name),
  UNIQUE INDEX areas_abbreviation_unique(abbreviation)
);
#TABLA 16
CREATE TABLE area_person (
  person_id INTEGER UNSIGNED NOT NULL,
  area_id INTEGER UNSIGNED NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NULL,
  is_active BOOL NOT NULL DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(person_id, area_id),
  INDEX area_person_FKIndex1(area_id),
  INDEX area_person_FKIndex2(person_id),
  FOREIGN KEY(area_id)
    REFERENCES areas(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(person_id)
    REFERENCES people(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);
#TABLA 17
CREATE TABLE person_position (
  person_id INTEGER UNSIGNED NOT NULL,
  position_id INTEGER UNSIGNED NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NULL,
  is_active BOOL NOT NULL DEFAULT 0,
  PRIMARY KEY(person_id, position_id),
  INDEX person_position_FKIndex1(person_id),
  INDEX person_position_FKIndex2(position_id),
  FOREIGN KEY(person_id)
    REFERENCES people(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(position_id)
    REFERENCES positions(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);
#TABLA 18
CREATE TABLE projects (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  area_person_area_id_dp INTEGER UNSIGNED NOT NULL,
  area_person_person_id_dp INTEGER UNSIGNED NOT NULL,
  area_person_area_id_codp INTEGER UNSIGNED NULL,
  area_person_person_id_codp INTEGER UNSIGNED NULL,
  name VARCHAR(300) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NULL,
  PRIMARY KEY(id),
  INDEX projects_FKIndex1(area_person_person_id_dp, area_person_area_id_dp),
  INDEX projects_FKIndex2(area_person_person_id_codp, area_person_area_id_codp),
  FOREIGN KEY(area_person_person_id_dp, area_person_area_id_dp)
    REFERENCES area_person(person_id, area_id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(area_person_person_id_codp, area_person_area_id_codp)
    REFERENCES area_person(person_id, area_id)
      ON DELETE SET NULL
      ON UPDATE CASCADE
);
#TABLA 19
CREATE TABLE area_person_outstanding_value (
  area_person_area_id INTEGER UNSIGNED NOT NULL,
  area_person_person_id INTEGER UNSIGNED NOT NULL,
  outstanding_value_id INTEGER UNSIGNED NOT NULL,
  date DATE NOT NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(area_person_area_id, area_person_person_id, outstanding_value_id),
  INDEX area_person_outstanding_value_FKIndex1(area_person_person_id, area_person_area_id),
  INDEX area_person_outstanding_value_FKIndex2(outstanding_value_id),
  FOREIGN KEY(area_person_person_id, area_person_area_id)
    REFERENCES area_person(person_id, area_id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(outstanding_value_id)
    REFERENCES outstanding_values(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);
#TABLA 20
CREATE TABLE font_font_style (
  font_style_id INTEGER UNSIGNED NOT NULL,
  font_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(font_style_id, font_id),
  INDEX font_font_style_FKIndex1(font_id),
  INDEX font_font_style_FKIndex2(font_style_id),
  FOREIGN KEY(font_id)
    REFERENCES fonts(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(font_style_id)
    REFERENCES font_styles(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);
#TABLA 21
CREATE TABLE role_user (
  user_id INTEGER UNSIGNED NOT NULL,
  role_id INTEGER UNSIGNED NOT NULL,
  is_active BOOL NOT NULL DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(user_id, role_id),
  INDEX role_user_FKIndex1(role_id),
  INDEX role_user_FKIndex2(user_id),
  FOREIGN KEY(role_id)
    REFERENCES roles(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(user_id)
    REFERENCES users(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);
#TABLA 22
CREATE TABLE events (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  person_id_rapporteur INTEGER UNSIGNED NOT NULL,
  project_id INTEGER UNSIGNED NULL,
  name VARCHAR(300) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NULL,
  event_type ENUM('taller','capacitacion') NOT NULL,
  PRIMARY KEY(id),
  INDEX events_FKIndex2(project_id),
  INDEX events_FKIndex3(person_id_rapporteur),
  FOREIGN KEY(project_id)
    REFERENCES projects(id)
      ON DELETE SET NULL
      ON UPDATE CASCADE,
  FOREIGN KEY(person_id_rapporteur)
    REFERENCES people(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);
#TABLA 23
CREATE TABLE images (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  image_type_id INTEGER UNSIGNED NOT NULL,
  image_status_id INTEGER UNSIGNED NOT NULL,
  name VARCHAR(255) NOT NULL,
  url VARCHAR(300) NOT NULL,
  PRIMARY KEY(id),
  INDEX images_FKIndex1(image_status_id),
  INDEX images_FKIndex2(image_type_id),
  INDEX images_image_type_id_image_status_id_index(image_type_id, image_status_id),
  FOREIGN KEY(image_status_id)
    REFERENCES image_statuses(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(image_type_id)
    REFERENCES image_types(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);
#TABLA 24
CREATE TABLE certification_groups (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  created_by_user_id INTEGER UNSIGNED NULL,
  certified_by_user_id INTEGER UNSIGNED NULL,
  certification_type_id INTEGER UNSIGNED NOT NULL,
  project_id INTEGER UNSIGNED NULL,
  event_id INTEGER UNSIGNED NULL,
  name VARCHAR(300) NOT NULL,
  description TEXT NULL,
  start_date DATE NOT NULL,
  end_date DATE NULL,
  issue_date DATE NOT NULL,
  is_validated BOOL NOT NULL DEFAULT 0,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  INDEX certification_groups_FKIndex1(certification_type_id),
  INDEX certification_groups_FKIndex2(certified_by_user_id),
  INDEX certification_groups_FKIndex3(created_by_user_id),
  INDEX certification_groups_FKIndex4(project_id),
  INDEX certification_groups_FKIndex5(event_id),
  FOREIGN KEY(certification_type_id)
    REFERENCES certification_types(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(certified_by_user_id)
    REFERENCES users(id)
      ON DELETE SET NULL
      ON UPDATE CASCADE,
  FOREIGN KEY(created_by_user_id)
    REFERENCES users(id)
      ON DELETE SET NULL
      ON UPDATE CASCADE,
  FOREIGN KEY(project_id)
    REFERENCES projects(id)
      ON DELETE SET NULL
      ON UPDATE CASCADE,
  FOREIGN KEY(event_id)
    REFERENCES events(id)
      ON DELETE SET NULL
      ON UPDATE CASCADE
);
#TABLA 25
CREATE TABLE font_configurations (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  font_font_style_font_id INTEGER UNSIGNED NULL,
  font_font_style_font_style_id INTEGER UNSIGNED NULL,
  font_size INTEGER UNSIGNED NOT NULL,
  initial_color_code VARCHAR(7) NOT NULL,
  intermediate_color_code VARCHAR(7) NULL,
  final_color_code VARCHAR(7) NULL,
  PRIMARY KEY(id),
  INDEX font_configurations_FKIndex1(font_font_style_font_style_id, font_font_style_font_id),
  FOREIGN KEY(font_font_style_font_style_id, font_font_style_font_id)
    REFERENCES font_font_style(font_style_id, font_id)
      ON DELETE SET NULL
      ON UPDATE CASCADE
);
#TABLA 26
CREATE TABLE area_person_project (
  area_person_area_id INTEGER UNSIGNED NOT NULL,
  area_person_person_id INTEGER UNSIGNED NOT NULL,
  project_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(area_person_area_id, area_person_person_id, project_id),
  INDEX area_person_project_FKIndex1(area_person_person_id, area_person_area_id),
  INDEX area_person_project_FKIndex2(project_id),
  FOREIGN KEY(area_person_person_id, area_person_area_id)
    REFERENCES area_person(person_id, area_id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(project_id)
    REFERENCES projects(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);
#TABLA 27
CREATE TABLE certification_group_image (
  image_id INTEGER UNSIGNED NOT NULL,
  certification_group_id INTEGER UNSIGNED NOT NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(image_id, certification_group_id),
  INDEX certification_group_image_FKIndex1(certification_group_id),
  INDEX certification_group_image_FKIndex2(image_id),
  FOREIGN KEY(certification_group_id)
    REFERENCES certification_groups(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(image_id)
    REFERENCES images(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);
#TABLA 28
CREATE TABLE certification_group_person_position (
  person_position_position_id INTEGER UNSIGNED NOT NULL,
  person_position_person_id INTEGER UNSIGNED NOT NULL,
  certification_group_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(person_position_position_id, person_position_person_id, certification_group_id),
  INDEX certification_group_person_position_FKIndex1(certification_group_id),
  INDEX certification_group_person_position_FKIndex2(person_position_person_id, person_position_position_id),
  FOREIGN KEY(certification_group_id)
    REFERENCES certification_groups(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(person_position_person_id, person_position_position_id)
    REFERENCES person_position(person_id, position_id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);
#TABLA 29
CREATE TABLE certificate_text_type_certification_group (
  certificate_text_type_id INTEGER UNSIGNED NOT NULL,
  certification_group_id INTEGER UNSIGNED NOT NULL,
  font_configuration_id INTEGER UNSIGNED NOT NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(certificate_text_type_id, certification_group_id),
  INDEX certificate_text_type_certification_group_FKIndex1(certificate_text_type_id),
  INDEX certificate_text_type_certification_group_FKIndex2(certification_group_id),
  INDEX certificate_text_type_certification_group_FKIndex3(font_configuration_id),
  FOREIGN KEY(certificate_text_type_id)
    REFERENCES certificate_text_types(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(certification_group_id)
    REFERENCES certification_groups(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(font_configuration_id)
    REFERENCES font_configurations(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);
#TABLA 30
CREATE TABLE certificates (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  person_id INTEGER UNSIGNED NOT NULL,
  certification_group_id INTEGER UNSIGNED NOT NULL,
  certificate_status_id INTEGER UNSIGNED NOT NULL,
  code VARCHAR(100) NOT NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  INDEX certificates_FKIndex1(certificate_status_id),
  INDEX certificates_FKIndex2(certification_group_id),
  INDEX certificates_FKIndex3(person_id),
  UNIQUE INDEX certificates_person_id_certification_group_id_unique(person_id, certification_group_id),
  INDEX certificates_code_index(code),
  FOREIGN KEY(certificate_status_id)
    REFERENCES certificate_statuses(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(certification_group_id)
    REFERENCES certification_groups(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(person_id)
    REFERENCES people(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

