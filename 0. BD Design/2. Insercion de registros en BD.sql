USE bd_sistema_de_certificados_sediprano;

#____________________________________________________________________________________________
#______________________________ INSERTS DE AREAS DE SEDIPRO UNT _____________________________
#_____________________________________ (tabla: areas) _______________________________________
INSERT INTO `areas` (`id`, `nombre`, `abreviatura`) 
VALUES (NULL, 'Gestión del Talento Humano', 'GTH'), 
(NULL, 'Logística y Finanzas', 'LTK & FNZ'), 
(NULL, 'Marketing', 'MKT'), 
(NULL, 'Project Management Office', 'PMO'), 
(NULL, 'Tecnologías de la Información', 'TI');
#____________________________________________________________________________________________


#____________________________________________________________________________________________
#_____________________________ INSERTS DE CARGOS DE SEDIPRO UNT _____________________________
#_____________________________________ (tabla: cargos) ______________________________________

#____________________________________________________________________________________________


#____________________________________________________________________________________________
#___________________________ INSERTS DE ENTIDADES ALIADAS DE SEDIPRO UNT ____________________
#__________________________________ (tabla: entidades_aliadas) ______________________________

#____________________________________________________________________________________________


#____________________________________________________________________________________________
#_____________ INSERTS DE FUENTES PARA SECCIONES DE INFORMACIÓN DEL CERTIFICADO _____________
#_______________________________________ (tabla: fuentes) ___________________________________
INSERT INTO `fuentes` (`id`, `nombre`) 
VALUES (NULL, 'Arial'), 
(NULL, 'Calibri'), 
(NULL, 'Times New Roman');
#____________________________________________________________________________________________


#____________________________________________________________________________________________
#______________________ INSERTS DE IMAGENES PARA SISTEMA DE SEDIPRO UNT _____________________
#______________________________________ (tabla: imagenes) ___________________________________
INSERT INTO `imagenes` (`id`, `nombre`, `ruta`, `tipo`, `estado`,`extension`) 
VALUES (NULL, 'FIRMA PRESIDENTA SEDIPRO UNT 2025', 'firmas/firma_presidenta.jpg', 'Firma', 'Lista','jpg'), 
(NULL, 'FIRMA VICEPRESIDENTA SEDIPRO UNT 2025', 'firmas/firma_vicepresidenta.jpg', 'Firma', 'Lista','jpg'), 
(NULL, 'FIRMA DIRECTORA GTH SEDIPRO UNT 2025', 'firmas/firma_directoraGTH.jpg', 'Firma', 'Lista','jpg'), 
(NULL, 'FIRMA DIRECTOR LTK&FNZ SEDIPRO UNT 2025', 'firmas/firma_directorLTK&FNZ.jpg', 'Firma', 'Lista','jpg'), 
(NULL, 'FIRMA DIRECTOR MKT SEDIPRO UNT 2025', 'firmas/firma_directorMKT.jpg', 'Firma', 'Lista','jpg'), 
(NULL, 'FIRMA DIRECTORA PMO SEDIPRO UNT 2025', 'firmas/firma_directoraPMO.jpg', 'Firma', 'Lista','jpg'), 
(NULL, 'FIRMA DIRECTOR TI SEDIPRO UNT 2025', 'firmas/firma_directorTI.jpg', 'Firma', 'Lista','jpg'), 
(NULL, 'Foto de Perfil- Lucía de Fátima Amaya Cáceda', 'perfiles/LuciaDeFatimaAmayaCaceda.jpg', 'Perfil', 'Lista','jpg'), 
(NULL, 'Foto de Perfil- Silvana Valeria Pereda Llave', 'perfiles/SilvanaValeriaPeredaLlave.jpg', 'Perfil', 'Lista','jpg'), 
(NULL, 'Foto de Perfil- Marina Lizeth Gonzales Torres', 'perfiles/MarinaLizethGonzalesTorres.jpg', 'Perfil', 'Lista','jpg'), 
(NULL, 'Foto de Perfil- Diego Jesús Rodríguez Sabana', 'perfiles/DiegoJesusRodriguezSabana.jpg', 'Perfil', 'Lista','jpg'), 
(NULL, 'Foto de Perfil- Ángel Iparraguirre Aguilar', 'perfiles/AngelIparraguirreAguilar.jpg', 'Perfil', 'Lista','jpg'), 
(NULL, 'Foto de Perfil- María Fernanda de la Caridad Herrera Cerquín', 'perfiles/MariaFernandaHerreraCerquin.jpg', 'Perfil', 'Lista','jpg'), 
(NULL, 'Foto de Perfil- Cristian Anthony Morales Esquivel', 'perfiles/CristianAnthonyMoralesEsquivel.jpg', 'Perfil', 'Lista','jpg');
#____________________________________________________________________________________________


#____________________________________________________________________________________________
#_______________________________ INSERTS DE ROLES DEL SISTEMA _______________________________
#______________________________________ (tabla: roles) ______________________________________
INSERT INTO `roles` (`id`, `nombre`, `descripcion`) 
VALUES (NULL, 'Administrador', 'Rol encargado de administrar todo el dashboard e información sensible del sistema, realiza validaciones importantes.'), 
(NULL, 'Marketing', 'Rol encargado de la generación y configuración del diseño de los diferentes grupos de certificación.');
#____________________________________________________________________________________________


#____________________________________________________________________________________________
#____________________ INSERTS DE SECCIONES DE INFORMACIÓN DEL CERTIFICADO ___________________
#_______________________________ (tabla: secciones_de_informacion) __________________________
INSERT INTO `secciones_de_informacion` (`id`, `nombre`) 
VALUES (NULL, 'Titulo de certificación'), 
(NULL, 'Subtitulo de certificación'), 
(NULL, 'Texto previo a titular de certificación'), 
(NULL, 'Titular de certificación'), 
(NULL, 'Línea debajo de la sección del Titular'), 
(NULL, 'Cuerpo del certificado'), 
(NULL, 'Lugar y fecha del certificado'), 
(NULL, 'Firmantes del certificado'), 
(NULL, 'Líneas debajo de la sección de firmantes'), 
(NULL, 'Cargos de los firmantes');
#____________________________________________________________________________________________


#____________________________________________________________________________________________
#_____________________________ INSERTS DE TIPOS DE CERTIFICACIÓN ____________________________
#_______________________________ (tabla: tipos_de_certificacion) _____________________________

#____________________________________________________________________________________________


#____________________________________________________________________________________________
#_______________________ INSERTS DE VALORES DESTACADOS DE SEDIPRO UNT _______________________
#_______________________________ (tabla: valores_destacados) ________________________________

#____________________________________________________________________________________________
INSERT INTO `tipos_de_certificacion` (`id`, `nombre`, `descripcion`, `codigo`) 
VALUES (NULL, 'Egresados', NULL, 'EG'), 
(NULL, 'Retiro Voluntario', NULL, 'RV'), 
(NULL, 'Directiva', NULL, 'DIR'), 
(NULL, 'Director de Proyecto', NULL, 'DP'), 
(NULL, 'Co-Director de Proyecto', NULL, 'CODP'), 
(NULL, 'Coordinadores de Proyecto', NULL, 'CORD'), 
(NULL, 'Miembros Internos de Proyecto', NULL, 'MIP'), 
(NULL, 'Miembros Externos de Proyecto', NULL, 'MEP'), 
(NULL, 'Staff Interno de Proyecto', NULL, 'STFI'), 
(NULL, 'Staff Externo de Proyecto', NULL, 'STFE'), 
(NULL, 'Ponentes de Eventos Generales de la sección', NULL, 'PONEG'), 
(NULL, 'Ponentes de Proyectos', NULL, 'PONPR'),
(NULL, 'Participación en Taller Sedipro', NULL, 'PARTS'), 
(NULL, 'Participación en Capacitación Sedipro', NULL, 'PARCS'), 
(NULL, 'Participación en Taller de Proyecto', NULL, 'PARTP'), 
(NULL, 'Participación en Capacitación de Proyecto', NULL, 'PARCP'), 
(NULL, 'Participación en Ejecución de Proyecto', NULL, 'PAREP'), 
(NULL, 'Valores destacados', NULL, 'VD');

#____________________________________________________________________________________________
#______________________ INSERTS DE PERSONAS DEL SISTEMA DE CERTIFICADOS _____________________
#___________________________________ (tabla: personas) ______________________________________
INSERT INTO `personas` (`id`, `imagen_firma_id`, `nombres`, `apellidos`, `correo_personal`, `sexo`) VALUES
#DIRECTIVA(1-7)
(NULL, NULL, 'Lucía De Fátima', 'Amaya Cáceda', 't1051300621@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Silvana Valeria', 'Pereda Llave', 'speredal@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Marina Lizeth', 'Gonzales Torres', 't1510600121@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Diego Jesús', 'Rodríguez Sabana', 't1010100421@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Ángel', 'Iparraguirre Aguilar', 't1024000721@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'María Fernanda De La Caridad', 'Herrera Cerquín', 'mfherrerace@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Christian Anthony', 'Morales Esquivel', 'chmoralese@unitru.edu.pe', 'Masculino'),

#GTH(8-28)
(NULL, NULL, 'Alisson Milagros', 'Pretell Canchas', 'pretellalisson@gmail.com', 'Femenino'),
(NULL, NULL, 'Ana Nicoll', 'Segura Aredo', 'anseguraa@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Dulce Geraldine', 'Chavez Padilla', 't1051302521@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Elber Isaí', 'Pichén Zavaleta', 'pichenzavaleta@gmail.com', 'Masculino'),
(NULL, NULL, 'Fernando Felipe', 'Sanchez Palacios', 't054000920@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Gerson Gabriel', 'Alfaro Tandaypan', 'gersonalfa20@gmail.com', 'Masculino'),
(NULL, NULL, 'José Daniel', 'Avila Santillan', 'Josedanielsantiavila@gmail.com', 'Masculino'),
(NULL, NULL, 'Juan Diego', 'Hernández Jáuregui', 'juanhjauregui15@gmail.com', 'Masculino'),
(NULL, NULL, 'Lisseth Adelaida', 'Chávez Rosales', 'Chavezadelaida25@gmail.com', 'Femenino'),
(NULL, NULL, 'Luz Karina', 'Angulo Urbina', 'lkangulour@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Mariann Estefany', 'Fernández Leyva', 'maryferley.2004@gmail.com', 'Femenino'),
(NULL, NULL, 'Michael Junior', 'García García', 't1051300421@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Nashaly Nicolle', 'Alama Terrones', 'nashalyalamaterrones@gmail.com', 'Femenino'),
(NULL, NULL, 'Santos Maria', 'Juarez Cruz', 'sjuarez@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Renzo Georkael', 'Carrasco Lalangui', 'rgcarrascol@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Rodrigo Marcial', 'Gamboa Gonzáles', 'rodrigogg0812@gmail.com', 'Masculino'),
(NULL, NULL, 'Yrma Lucero', 'Carruitero Aspiros', 'ycarruitero@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Yuliana Zarai', 'Cuadra Rodriguez', 'Zaraicuadra18@gmail.com', 'Femenino'),
(NULL, NULL, 'Romina Alejandra', 'Seclen Cespedes', 'rominaalejandraseclen@gmail.com', 'Femenino'),
(NULL, NULL, 'Corina Marilu', 'Sanchez Delgado', 'Csanchezd@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Andrweeu Daniel', 'Urtecho Avila', 'aurtechoa@gmail.com', 'Masculino'),

#LTK & FNZ(29-43)
(NULL, NULL, 'Christian Rodrigo', 'Valverde Caspito', 'christiancvalverdecaspito@gmail.com', 'Masculino'),
(NULL, NULL, 'Eddie Alessandro', 'Jiménez Vílchez', 'eajimenezv04@gmail.com', 'Masculino'),
(NULL, NULL, 'Fabián Nicolas', 'Paredes Calderón', 'fnparedesca@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Fernanda Milagros', 'Rojas Rodriguez', 't1510101721@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Grecia Alexandra', 'Paredes Cachique', 'Gaparedesca@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Jhosmel Anderson', 'Vigo Cepeda', 'jhosmelvigoc4@gmail.com', 'Masculino'),
(NULL, NULL, 'Jimmy Andersonn', 'Cáceda Olivera', 'jcacedao@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Kevin Gamaliel', 'Rodríguez Alfaro', 'T1510101021@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Kiara Marife', 'Rodriguez Sifuentes', 'krodriguezsi@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Luis Angel', 'Laureano Escobedo', 't1511300521@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'María Fernanda', 'Pretell Leon', 'maferp1827@gmail.com', 'Femenino'),
(NULL, NULL, 'Mixie Arleni', 'Gil Zapata', 'magilza@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Nestor Rafael', 'Plasencia De La Cruz', 'nrplasenciade@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Sebastian Emanuel', 'Facundo Reyes', 't1512400421@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Tatiana Yuleisy', 'Aliaga Pretell', 'taliaga@unitru.edu.pe', 'Femenino'),

#MKT(44-58)
(NULL, NULL, 'Anderson Abat', 'Otiniano Morales', 'aotinianom@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Angie Tatiana', 'Recuenco Tapia', 't1013600421@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Belinda Maricielo', 'Arroyo Esquivel', 'bm.arroyoesquivel@gmail.com', 'Femenino'),
(NULL, NULL, 'Cielo Valentina', 'Abanto Rojas', 'cvabantor@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Diego Jesús', 'Ullilén Chávez', 'diegoullilen250503@gmail.com', 'Masculino'),
(NULL, NULL, 'Emelyn Yasmin', 'Aguirre Valverde', 't1520100421@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Ghenary Tais', 'Esquivel Davila', 't1053200921@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Jakori Nayeli', 'Hoyos Terrones', 'jnhoyoste@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Jordyna', 'Robles Solorzano', 'T1024100421@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Luis Angel', 'Lecca Cortez', 'lleccac@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Maite', 'Palacios Asto', 'mpalaciosas@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Maria Fernanda', 'Cárdenas Hidalgo', 'Mcardenash@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Stefany Isabel', 'Gutierrez Vega', 't1510101221@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Yojhania Taitt', 'Gonzales Contreras', 't1510102521@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Zulema Adeli', 'Valverde Zavaleta', 't1510100321@unitru.edu.pe', 'Femenino'),

#PMO(59-68)
(NULL, NULL, 'Abel Maximiliano', 'Pereda Cabanillas', 'amperedaca@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Angela Xiomara', 'Loayza Gutierrez', 'Axloayzag@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Dalery Nicoll', 'Alayo Sifuentes', 'nicollalayo5@gmail.com', 'Femenino'),
(NULL, NULL, 'Daniel Angel', 'Sánchez Cabrera', 'dasanchezca@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Diego Alejandro', 'Mostacero Lecca', 't1020100121@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Diego Alonso', 'Gutierrez Vasquez', 'dgutierrezva@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Ivanna Sofia', 'Vela Ocampo', 't510100520@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Jeoselyn Maribel', 'Espejo Rodríguez', 'jespejor@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'María Celine', 'Huamán Martínez', 'celineehm51@gmail.com', 'Femenino'),
(NULL, NULL, 'Rubén Darío', 'Alcántara Toribio', 'rdalcantarat@gmail.com', 'Masculino'),

#TI(69-81)
(NULL,NULL,'Anthony Jhonatan','Osorio Trujillo','ajosoriot@unitru.edu.pe','Masculino'),
(NULL,NULL,'Braggi Jayson',' Bamberger Plasencia','bbamberger@unitru.edu.pe','Masculino'),
(NULL, NULL, 'Elder Eli', 'De la Cruz Calderón', 'edelacruzca@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Jean Pierre Camilo', 'Liñer Sagástegui', 'jliner@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Jhoanny Jheimilyn Xiomara', 'Vargas Ramos', 'jjvargasr@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Luis Angel', 'Morales Lino', 't012700620@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Marco Camilo', 'Toledo Campos', 't022700720@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Mirella Esteffany', 'Gamboa Valderrama', 'mgamboav@unitru.edu.pe', 'Femenino'),
(NULL, NULL, 'Pablo Cesar', 'Sánchez Cabrera', 'psanchezca@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Paul Jamir', 'Lázaro Solano', 't052700520@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Renato Alexander', 'Martínez Aguilar', 'ramartinezag@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Sadhú', 'Rojas García', 't012701020@unitru.edu.pe', 'Masculino'),
(NULL, NULL, 'Zaleth Valentina', 'Rivas Calderón', 'zvrivasca@unitru.edu.pe', 'Femenino');

#____________________________________________________________________________________________


#____________________________________________________________________________________________
#______________________ INSERTS DE USUARIOS DEL SISTEMA DE CERTIFICADOS _____________________
#____________________________________ (tabla: users) _____________________________________
INSERT INTO `users` (`id`, `persona_id`, `imagen_perfil_id`, `name`, `email`,`estado`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) 
VALUES (NULL, '1', '8', 'Lucía de Fátima Amaya Cáceda', 't1051300621@unitru.edu.pe', 'Pendiente', NULL, '$2y$12$PwbxqOXisFXP1xYPgHKY0OZy7i7ZzgSTMRv4q.gB9goXyJ1EHhjNO', NULL, '2025-08-09 21:05:15', NULL), 
(NULL, '2', '9', 'Silvana Valeria Pereda Llave', 'speredal@unitru.edu.pe', 'Pendiente', NULL, '$2y$12$yvXB/ZMJ.e4fDflha8TMsOTVQ9GWaK3/APVwqCfaJaiGa5fnZlWgG', NULL, '2025-08-09 21:05:15', NULL), 
(NULL, '3', '10', 'Marina Lizeth Gonzales Torres', 't1510600121@unitru.edu.pe', 'Pendiente', NULL, '$2y$12$UK/8w53a3tgN.S465Ty4ZenU/Fyoo7RVyhXjZKG9vRHKLpOBi9Bnm', NULL, '2025-08-09 21:10:02', NULL), 
(NULL, '4', '11', 'Diego Jesús Rodríguez Sabana', 't1010100421@unitru.edu.pe', 'Pendiente', NULL, '$2y$12$LDxzWCz1tmJfcuu3N4L12./GRllzpjebHwhzfbZS5ccwfhbSeDsTC', NULL, '2025-08-09 21:11:44', NULL), 
(NULL, '5', '12', 'Ángel Iparraguirre Aguilar', 't1024000721@unitru.edu.pe', 'Pendiente', NULL, '$2y$12$VPKpGMM4573zLbIthjunSuXkTNpHIgfLU9nqQ/cV.m6tRkCxY3jqO', NULL, '2025-08-09 21:12:57', NULL), 
(NULL, '6', '13', 'María Fernanda de la Caridad Herrera Cerquín', 'mfherrerace@unitru.edu.pe', 'Pendiente', NULL, '$2y$12$cGRiQ7Xu1ycNq6dGgp9vYOjk/HLHFrb29WEFpmrXFayC2pCOI3Xve', NULL, '2025-08-09 21:22:14', NULL), 
(NULL, '7', '14', 'Christian Anthony Morales Esquivel', 'chmoralese@unitru.edu.pe', 'Pendiente', NULL, '$2y$12$tUy7fekex3zfuT0KVaXuhuuf989H6SgQUrnpFR21e8ifsxumMze1C', NULL, '2025-08-09 21:20:22', NULL);
#____________________________________________________________________________________________


#____________________________________________________________________________________________
#_________________________ INSERTS DE PERSONAS A AREAS DE SEDIPRO UNT _______________________
#__________________________________ (tabla: area_persona) ____________________________________
INSERT INTO `area_persona` (`id`, `area_id`, `persona_id`, `fecha_inicio`, `fecha_fin`, `estado_inicial`, `estado_final`, `created_at`, `updated_at`) VALUES 
#Lucia de Fátima Amaya Cáceda
(NULL, '4', '1', '2024-06-01', '2025-03-19', 'Miembro activo', 'Cargo en Directiva', NULL, NULL), #Periodo inicial en PMO
(NULL, '4', '1', '2025-03-19', NULL, 'Cargo en Directiva', NULL, NULL, NULL),#Periodo actual en Directiva
#Silvana Valeria Pereda Llave
(NULL, '1', '2', '2024-06-01', '2025-03-19', 'Miembro activo', 'Cargo en Directiva', NULL, NULL), #Periodo inicial en GTH
(NULL, '1', '2', '2025-03-19', NULL, 'Cargo en Directiva', NULL, NULL, NULL),#Periodo actual en Directiva
#Marina Lizeth Gonzales Torres
(NULL, '1', '3', '2022-05-10', '2025-03-19', 'Miembro activo', 'Cargo en Directiva', NULL, NULL), #Periodo inicial en GTH
(NULL, '1', '3', '2025-03-19', NULL, 'Cargo en Directiva', NULL, NULL, NULL),#Periodo actual en Directiva
#Diego Jesús Rodríguez Sabana
(NULL, '2', '4', '2024-06-01', '2025-03-19', 'Miembro activo', 'Cargo en Directiva', NULL, NULL), #Periodo inicial en LTK & FNZ
(NULL, '2', '4', '2025-03-19', NULL, 'Cargo en Directiva', NULL, NULL, NULL),#Periodo actual en Directiva
#Ángel Iparraguirre Aguilar
(NULL, '3', '5', '2023-06-13', '2025-03-19', 'Miembro activo', 'Cargo en Directiva', NULL, NULL), #Periodo inicial en MKT
(NULL, '3', '5', '2025-03-19', NULL, 'Cargo en Directiva', NULL, NULL, NULL),#Periodo actual en Directiva
#María Fernanda de la Caridad Herrera Cerquín
(NULL, '4', '6', '2023-06-13', '2025-03-19', 'Miembro activo', 'Cargo en Directiva', NULL, NULL), #Periodo inicial en PMO
(NULL, '4', '6', '2025-03-19', NULL, 'Cargo en Directiva', NULL, NULL, NULL),#Periodo actual en Directiva
#Christian Anthony Morales Esquivel
(NULL, '4', '7', '2023-06-13', '2024-04-20', 'Miembro activo', 'Cargo en Directiva', NULL, NULL), #Periodo inicial en TI
(NULL, '4', '7', '2024-04-20', NULL, 'Cargo en Directiva', NULL, NULL, NULL),#Periodo actual en Directiva

#GTH(8-28)
(NULL, '1', '8', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Alisson Milagros Pretell Canchas
(NULL, '1', '9', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Ana Nicoll Segura Aredo
(NULL, '1', '10', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Dulce Geraldine Chavez Padilla
(NULL, '1', '11', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Elber Isaí Pichén Zavaleta
(NULL, '1', '12', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Fernando Sanchez Palacios
(NULL, '1', '13', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Gerson Gabriel Alfaro Tandaypan
(NULL, '1', '14', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#José Daniel Avila Santillan
(NULL, '1', '15', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Juan Diego Hernández Jáuregui
(NULL, '1', '16', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Lisseth Adelaida Chávez Rosales
(NULL, '1', '17', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Luz Karina Angulo Urbina
(NULL, '1', '18', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Mariann Estefany Fernández Leyva
(NULL, '1', '19', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Michael Junior García García
(NULL, '1', '20', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Nashaly Nicolle Alama Terrones
(NULL, '1', '21', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Santos Maria Juarez Cruz
(NULL, '1', '22', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Renzo Georkael Carrasco Lalangui
(NULL, '1', '23', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Rodrigo Marcial Gamboa Gonzáles
(NULL, '1', '24', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Yrma Lucero Carruitero Aspiros
(NULL, '1', '25', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Yuliana Zarai Cuadra Rodriguez
(NULL, '1', '26', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Romina Alejandra Seclen Cespedes
(NULL, '1', '27', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Corina Marilu Sanchez Delgado
(NULL, '1', '28', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Andrweeu Daniel Urtecho Avila

#LTK & FNZ(29-43)
(NULL, '2', '29', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Christian Rodrigo Valverde Caspito
(NULL, '2', '30', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Eddie Alessandro Jiménez Vílchez
(NULL, '2', '31', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Fabián Nicolas Paredes Calderón
(NULL, '2', '32', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Fernanda Milagros Rojas Rodriguez
(NULL, '2', '33', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Grecia Alexandra Paredes Cachique
(NULL, '2', '34', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Jhosmel Anderson Vigo Cepeda
(NULL, '2', '35', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Jimmy Andersonn Cáceda Olivera
(NULL, '2', '36', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Kevin Gamaliel Rodríguez Alfaro
(NULL, '2', '37', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Kiara Marife Rodriguez Sifuentes
(NULL, '2', '38', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Luis Angel Laureano Escobedo
(NULL, '2', '39', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#María Fernanda Pretell Leon
(NULL, '2', '40', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Mixie Arleni Gil Zapata
(NULL, '2', '41', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Nestor Rafael Plasencia De La Cruz
(NULL, '2', '42', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Sebastian Emanuel Facundo Reyes
(NULL, '2', '43', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Tatiana Yuleisy Aliaga Pretell    

#MKT(44-58)
(NULL, '3', '44', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Anderson Abat Otiniano Morales
(NULL, '3', '45', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Angie Tatiana Recuenco Tapia
(NULL, '3', '46', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Belinda Maricielo Arroyo Esquivel
(NULL, '3', '47', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Cielo Valentina Abanto Rojas
(NULL, '3', '48', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Diego Jesús Ullilén Chávez
(NULL, '3', '49', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Emelyn Yasmin Aguirre Valverde
(NULL, '3', '50', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Ghenary Tais Esquivel Davila
(NULL, '3', '51', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Jakori Nayeli Hoyos Terrones
(NULL, '3', '52', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Jordyna Robles Solorzano
(NULL, '3', '53', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Luis Angel Lecca Cortez
(NULL, '3', '54', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Maite Palacios Asto
(NULL, '3', '55', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Maria Fernanda Cárdenas Hidalgo
(NULL, '3', '56', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Stefany Isabel Gutierrez Vega
(NULL, '3', '57', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Yojhania Taitt Gonzales Contreras
(NULL, '3', '58', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Zulema Adeli Valverde Zavaleta

#PMO(59-68)
(NULL, '4', '59', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Abel Maximiliano Pereda Cabanillas
(NULL, '4', '60', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Angela Xiomara Loayza Gutierrez
(NULL, '4', '61', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Dalery Nicoll Alayo Sifuentes
(NULL, '4', '62', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Daniel Angel Sanchez Cabrera
(NULL, '4', '63', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Diego Alejandro Mostacero Lecca
(NULL, '4', '64', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Diego Alonso Gutierrez Vasquez
(NULL, '4', '65', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Ivanna Sofia Vela Ocampo
(NULL, '4', '66', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Jeoselyn Maribel Espejo Rodriguez
(NULL, '4', '67', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#María Celine Huamán Martínez
(NULL, '4', '68', '2023-06-13', NULL, 'Miembro activo',NULL, NULL, NULL),#Rubén Darío Alcántara Toribio

#TI(69-81)
(NULL, '5', '69', '2023-06-13', NULL, 'Egresado',NULL, NULL, NULL),#Anthony Jhonatan Osorio Trujillo
(NULL, '5', '70', '2023-06-13', NULL, 'Egresado',NULL, NULL, NULL),#Braggi Jayson Bamberger Plasencia
(NULL, '5', '71', '2025-05-02', NULL, 'Miembro activo',NULL, NULL, NULL),#Elder Eli De la Cruz Calderón
(NULL, '5', '72', '2023-06-13', NULL, 'Retiro por bajo rendimiento',NULL, NULL, NULL),#Jean Pierre Camilo Liñer Sagástegui
(NULL, '5', '73', '2025-05-02', NULL, 'Miembro activo',NULL, NULL, NULL),#Jhoanny Jheimilyn Xiomara Vargas Ramos
(NULL, '5', '74', '2024-12-10', NULL, 'Miembro activo',NULL, NULL, NULL),#Luis Angel Morales Lino
(NULL, '5', '75', '2024-12-10', NULL, 'Miembro activo',NULL, NULL, NULL),#Marco Camilo Toledo Campos
(NULL, '5', '76', '2024-12-10', NULL, 'Miembro activo',NULL, NULL, NULL),#Mirella Esteffany Gamboa Valderrama
(NULL, '5', '77', '2025-05-02', NULL, 'Miembro activo',NULL, NULL, NULL),#Pablo Cesar Sanchez Cabrera
(NULL, '5', '78', '2024-12-10', NULL, 'Miembro activo',NULL, NULL, NULL),#Paul Jamir Lazaro Solano
(NULL, '5', '79', '2025-05-02', NULL, 'Miembro activo',NULL, NULL, NULL),#Renato Alexander Martinez Aguilar
(NULL, '5', '80', '2024-12-10', NULL, 'Miembro activo',NULL, NULL, NULL),#Sadhú Rojas Garcia
(NULL, '5', '81', '2025-05-02', NULL, 'Miembro activo',NULL, NULL, NULL);#Zaleth Valentina Rivas Calderón


#____________________________________________________________________________________________


#____________________________________________________________________________________________
#___________________ INSERTS DE PERSONAS EN AREAS A CARGOS DE SEDIPRO UNT ___________________
#_______________________________ (tabla: area_persona_cargo) _________________________________

#____________________________________________________________________________________________


#____________________________________________________________________________________________
#____________________________ INSERTS DE PROYECTOS DE SEDIPRO UNT ___________________________
#____________________________________ (tabla: proyectos) ____________________________________

#____________________________________________________________________________________________


#____________________________________________________________________________________________
#_____________________________ INSERTS DE EVENTOS DE SEDIPRO UNT ____________________________
#_____________________________________ (tabla: eventos) _____________________________________

#____________________________________________________________________________________________


#____________________________________________________________________________________________
#__________________ INSERTS DE PERSONAS EN AREAS A PROYECTOS DE SEDIPRO UNT _________________
#_______________________________ (tabla: area_persona_proyecto) ______________________________

#____________________________________________________________________________________________


#____________________________________________________________________________________________
#_______________ INSERTS DE PERSONAS EN AREAS A VALOR DESTACADO DE SEDIPRO UNT ______________
#______________________________ (tabla: area_persona_valor_destacado) ________________________

#____________________________________________________________________________________________


#____________________________________________________________________________________________
#__________________ INSERTS DE PERSONAS A ENTIDADES ALIADAS DE SEDIPRO UNT __________________
#_______________________________ (tabla: entidad_aliada_persona) _____________________________

#____________________________________________________________________________________________


#____________________________________________________________________________________________
#_______________________ INSERTS DE PERSONAS A EVENTOS DE SEDIPRO UNT _______________________
#_________________________________ (tabla: evento_persona) __________________________________

#____________________________________________________________________________________________


#____________________________________________________________________________________________
#___________ INSERTS DE PERSONAS DE ENTIDADES ALIADAS A PROYECTOS DE SEDIPRO UNT ____________
#_________________________ (tabla: entidad_aliada_persona_proyecto) _________________________

#____________________________________________________________________________________________


#____________________________________________________________________________________________
#____________________________ INSERTS DE GRUPOS DE CERTIFICACIÓN ____________________________
#_____________________________ (tabla: grupos_de_certificacion) _____________________________
INSERT INTO `grupos_de_certificacion` (`id`, `tipo_de_certificacion_id`, `imagen_plantilla_id`, `imagen_logo_sediprano_id`, `proyecto_id`, `evento_id`, `usuario_creador_id`, `usuario_generador_id`, `nombre`, `descripcion`, `fecha_emision`, `fecha_generacion`, `estado`)
VALUES (NULL, '1', NULL, NULL, NULL, NULL, '7', NULL, 'Egresados-2025', NULL, '2026-01-01', '2026-03-01', 'Pendiente');
#____________________________________________________________________________________________


#____________________________________________________________________________________________
#_______________________ INSERTS DE PERSONAS A GRUPOS DE CERTIFICACIÓN ______________________
#_________________________________ (tabla: certificados) ____________________________________

#____________________________________________________________________________________________


#____________________________________________________________________________________________
#____________ INSERTS DE CONFIGURACIONES DE FUENTE DE SECCIONES DE INFORMACIÓN ______________
#_______________________________ (tabla: configuraciones) ___________________________________
INSERT INTO `configuraciones` (`id`, `grupo_de_certificacion_id`, `seccion_de_informacion_id`, `fuente_id`, `tamanio_fuente`, `estilo_fuente`, `capitalizacion`, `color_inicial`, `color_medio`, `color_final`) 
VALUES (NULL, '1', '1', '3', '16', 'Cursiva', 'Todo mayúscula', '#000000', NULL, NULL);
#____________________________________________________________________________________________


#____________________________________________________________________________________________
#__________________________ INSERTS DE ROLES A USUARIOS DEL SISTEMA _________________________
#____________________________________ (tabla: rol_usuario) __________________________________
INSERT INTO `user_rol` (`user_id`, `rol_id`) 
VALUES ('7', '1'), 
('5', '2');
#____________________________________________________________________________________________