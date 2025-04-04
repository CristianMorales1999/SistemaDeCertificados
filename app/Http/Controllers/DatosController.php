<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatosController extends Controller
{
    // Array de usuarios (expandido a 20)
    public $usuarios = [
        ['id' => 1, 'nombre' => 'Juan Mateo', 'apellido' => 'Gonzales Perez', 'email' => 'juan@example.com', 'rol' => 'administrador'],
        ['id' => 2, 'nombre' => 'María Gómez', 'apellido' => 'Gonzales Perez', 'email' => 'maria@example.com', 'rol' => 'administrador'],
        ['id' => 3, 'nombre' => 'Carlos López', 'apellido' => 'Gonzales Perez', 'email' => 'carlos@example.com', 'rol' => 'administrador'],
        ['id' => 4, 'nombre' => 'Ana Martínez', 'apellido' => 'Gonzales Perez', 'email' => 'ana@example.com', 'rol' => 'administrador'],
        ['id' => 5, 'nombre' => 'Roberto Silva', 'apellido' => 'Gonzales Perez', 'email' => 'roberto@example.com', 'rol' => 'administrador'],
        ['id' => 6, 'nombre' => 'Laura Torres', 'apellido' => 'Gonzales Perez', 'email' => 'laura@example.com', 'rol' => 'administrador'],
        ['id' => 7, 'nombre' => 'Pedro Ramírez', 'apellido' => 'Gonzales Perez', 'email' => 'pedro@example.com', 'rol' => 'administrador'],
        ['id' => 8, 'nombre' => 'Carmen Ruiz', 'apellido' => 'Gonzales Perez', 'email' => 'carmen@example.com', 'rol' => 'administrador'],
        ['id' => 9, 'nombre' => 'Miguel Soto', 'apellido' => 'Gonzales Perez', 'email' => 'miguel@example.com', 'rol' => 'administrador'],
        ['id' => 10, 'nombre' => 'Isabel Castro', 'apellido' => 'Gonzales Perez', 'email' => 'isabel@example.com', 'rol' => 'administrador'],
        ['id' => 11, 'nombre' => 'Fernando Díaz', 'apellido' => 'Gonzales Perez', 'email' => 'fernando@example.com', 'rol' => 'administrador'],
        ['id' => 12, 'nombre' => 'Patricia Vargas', 'apellido' => 'Gonzales Perez', 'email' => 'patricia@example.com', 'rol' => 'administrador'],
        ['id' => 13, 'nombre' => 'Ricardo Morales', 'apellido' => 'Gonzales Perez', 'email' => 'ricardo@example.com', 'rol' => 'administrador'],
        ['id' => 14, 'nombre' => 'Diana Flores', 'apellido' => 'Gonzales Perez', 'email' => 'diana@example.com', 'rol' => 'administrador'],
        ['id' => 15, 'nombre' => 'Gabriel Rojas', 'apellido' => 'Gonzales Perez', 'email' => 'gabriel@example.com', 'rol' => 'administrador'],
        ['id' => 16, 'nombre' => 'Mónica Herrera', 'apellido' => 'Gonzales Perez', 'email' => 'monica@example.com', 'rol' => 'administrador'],
        ['id' => 17, 'nombre' => 'Andrés Mendoza', 'apellido' => 'Gonzales Perez', 'email' => 'andres@example.com', 'rol' => 'administrador'],
        ['id' => 18, 'nombre' => 'Valentina Cruz', 'apellido' => 'Gonzales Perez', 'email' => 'valentina@example.com', 'rol' => 'administrador'],
        ['id' => 19, 'nombre' => 'Héctor Ortiz', 'apellido' => 'Gonzales Perez', 'email' => 'hector@example.com', 'rol' => 'administrador'],
        ['id' => 20, 'nombre' => 'Lucía Paredes', 'apellido' => 'Gonzales Perez', 'email' => 'lucia@example.com', 'rol' => 'administrador'],
    ];

    // Array de códigos de certificados
    public $codigos = [
        ['id' => 1, 'codigo' => 'CERT-2024-001'],
        ['id' => 2, 'codigo' => 'CERT-2024-002'],
        ['id' => 3, 'codigo' => 'CERT-2024-003'],
        ['id' => 4, 'codigo' => 'CERT-2024-004'],
        ['id' => 5, 'codigo' => 'CERT-2024-005'],
        ['id' => 6, 'codigo' => 'CERT-2024-006'],
        ['id' => 7, 'codigo' => 'CERT-2024-007'],
        ['id' => 8, 'codigo' => 'CERT-2024-008'],
        ['id' => 9, 'codigo' => 'CERT-2024-009'],
        ['id' => 10, 'codigo' => 'CERT-2024-010'],
        ['id' => 11, 'codigo' => 'CERT-2024-011'],
        ['id' => 12, 'codigo' => 'CERT-2024-012'],
        ['id' => 13, 'codigo' => 'CERT-2024-013'],
        ['id' => 14, 'codigo' => 'CERT-2024-014'],
        ['id' => 15, 'codigo' => 'CERT-2024-015'],
        ['id' => 16, 'codigo' => 'CERT-2024-016'],
        ['id' => 17, 'codigo' => 'CERT-2024-017'],
        ['id' => 18, 'codigo' => 'CERT-2024-018'],
        ['id' => 19, 'codigo' => 'CERT-2024-019'],
        ['id' => 20, 'codigo' => 'CERT-2024-020'],
    ];

    // Array de grupos de certificación
    public $grupos_certificacion = [
        ['id' => 1, 'nombre' => 'Grupo de Certificación PMI 2024-I', 'tipo' => 'Certificado de voluntariado', 'descripcion' => 'Certificado de voluntariado para Enero 2024', 'fechainicio' => '2024-01-01', 'fechafin' => '2024-01-31', 'creadorgrupo' => 'Luis Perez', 'generadorcertificado' => 'Maria Lopez', 'firmante1' => 'Luis Perez', 'firmante2' => 'Lucia Gomez', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/voluntariado.png'],
        ['id' => 2, 'nombre' => 'Grupo de Certificación SCRUM 2024-I', 'tipo' => 'Certificado de metodología', 'descripcion' => 'Certificación en Scrum para el primer semestre 2024', 'fechainicio' => '2024-02-01', 'fechafin' => '2024-03-15', 'creadorgrupo' => 'Ana Martinez', 'generadorcertificado' => 'Carlos Rodríguez', 'firmante1' => 'Ana Martinez', 'firmante2' => 'Jorge Peña', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/scrum.png'],
        ['id' => 3, 'nombre' => 'Grupo de Certificación AGILE 2024-I', 'tipo' => 'Certificado de metodología', 'descripcion' => 'Certificación en metodologías ágiles', 'fechainicio' => '2024-03-01', 'fechafin' => '2024-04-30', 'creadorgrupo' => 'Pedro Sanchez', 'generadorcertificado' => 'Lucia Ramos', 'firmante1' => 'Pedro Sanchez', 'firmante2' => 'Sofia Nuñez', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/agile.png'],
        ['id' => 4, 'nombre' => 'Grupo de Certificación PRINCE2 2024-I', 'tipo' => 'Certificado de gestión de proyectos', 'descripcion' => 'Certificación en PRINCE2 para gestión de proyectos', 'fechainicio' => '2024-05-01', 'fechafin' => '2024-06-15', 'creadorgrupo' => 'Elena Vargas', 'generadorcertificado' => 'Antonio Herrera', 'firmante1' => 'Elena Vargas', 'firmante2' => 'Raul Diaz', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/prince2.png'],
        ['id' => 5, 'nombre' => 'Grupo de Certificación ITIL 2024-I', 'tipo' => 'Certificado de IT Service Management', 'descripcion' => 'Certificación en ITIL para la gestión de servicios TI', 'fechainicio' => '2024-06-01', 'fechafin' => '2024-07-15', 'creadorgrupo' => 'Laura Mendoza', 'generadorcertificado' => 'Ricardo Suarez', 'firmante1' => 'Laura Mendoza', 'firmante2' => 'Diego Torres', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/itil.png'],
        ['id' => 6, 'nombre' => 'Grupo de Certificación DevOps 2024-I', 'tipo' => 'Certificado de desarrollo y operaciones', 'descripcion' => 'Certificación en prácticas de DevOps', 'fechainicio' => '2024-07-01', 'fechafin' => '2024-08-15', 'creadorgrupo' => 'Roberto Ortega', 'generadorcertificado' => 'Sonia Herrera', 'firmante1' => 'Roberto Ortega', 'firmante2' => 'Carmen Ruiz', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/devops.png'],
        ['id' => 7, 'nombre' => 'Grupo de Certificación CISSP 2024-II', 'tipo' => 'Certificado de seguridad informática', 'descripcion' => 'Certificación en seguridad de la información CISSP', 'fechainicio' => '2024-08-01', 'fechafin' => '2024-09-30', 'creadorgrupo' => 'Juan Ramirez', 'generadorcertificado' => 'Beatriz Correa', 'firmante1' => 'Juan Ramirez', 'firmante2' => 'Hector Medina', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/cissp.png'],
        ['id' => 8, 'nombre' => 'Grupo de Certificación CCNA 2024-II', 'tipo' => 'Certificado de redes', 'descripcion' => 'Certificación Cisco CCNA en redes de comunicación', 'fechainicio' => '2024-09-01', 'fechafin' => '2024-10-15', 'creadorgrupo' => 'Silvia Mendoza', 'generadorcertificado' => 'Luis Campos', 'firmante1' => 'Silvia Mendoza', 'firmante2' => 'Hugo Paredes', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/ccna.png'],
        ['id' => 9, 'nombre' => 'Grupo de Certificación Python 2024-II', 'tipo' => 'Certificado de programación', 'descripcion' => 'Certificación en Python para desarrollo backend', 'fechainicio' => '2024-10-01', 'fechafin' => '2024-11-30', 'creadorgrupo' => 'Alberto Sandoval', 'generadorcertificado' => 'Mariana Castro', 'firmante1' => 'Alberto Sandoval', 'firmante2' => 'Fernando Pacheco', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/python.png'],
        ['id' => 10, 'nombre' => 'Grupo de Certificación Java 2024-II', 'tipo' => 'Certificado de programación', 'descripcion' => 'Certificación en desarrollo de aplicaciones Java', 'fechainicio' => '2024-11-01', 'fechafin' => '2024-12-15', 'creadorgrupo' => 'Erika Fernández', 'generadorcertificado' => 'Jose Luis Orozco', 'firmante1' => 'Erika Fernández', 'firmante2' => 'Daniela Herrera', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/java.png'],
        ['id' => 11, 'nombre' => 'Grupo de Certificación Red Hat 2024-II', 'tipo' => 'Certificado de administración de sistemas', 'descripcion' => 'Certificación en administración de servidores Red Hat', 'fechainicio' => '2024-11-01', 'fechafin' => '2024-12-15', 'creadorgrupo' => 'Miguel Rojas', 'generadorcertificado' => 'Sergio Medina', 'firmante1' => 'Miguel Rojas', 'firmante2' => 'Paula Gómez', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/redhat.png'],
        ['id' => 12, 'nombre' => 'Grupo de Certificación AWS 2024-II', 'tipo' => 'Certificado de computación en la nube', 'descripcion' => 'Certificación en soluciones de Amazon Web Services', 'fechainicio' => '2024-10-01', 'fechafin' => '2024-11-30', 'creadorgrupo' => 'Javier Ortega', 'generadorcertificado' => 'Clara Villanueva', 'firmante1' => 'Javier Ortega', 'firmante2' => 'Marina Estrada', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/aws.png'],
        ['id' => 13, 'nombre' => 'Grupo de Certificación Azure 2024-II', 'tipo' => 'Certificado de computación en la nube', 'descripcion' => 'Certificación en soluciones de Microsoft Azure', 'fechainicio' => '2024-09-01', 'fechafin' => '2024-10-15', 'creadorgrupo' => 'Fernando Paredes', 'generadorcertificado' => 'Carmen Torres', 'firmante1' => 'Fernando Paredes', 'firmante2' => 'Roberto Peña', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/azure.png'],
        ['id' => 14, 'nombre' => 'Grupo de Certificación CCNA 2024-II', 'tipo' => 'Certificado de redes', 'descripcion' => 'Certificación Cisco Certified Network Associate (CCNA)', 'fechainicio' => '2024-08-01', 'fechafin' => '2024-09-15', 'creadorgrupo' => 'Alberto Jiménez', 'generadorcertificado' => 'Sandra López', 'firmante1' => 'Alberto Jiménez', 'firmante2' => 'Luis Domínguez', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/ccna.png'],
        ['id' => 15, 'nombre' => 'Grupo de Certificación Python 2024-II', 'tipo' => 'Certificado de programación', 'descripcion' => 'Certificación en programación con Python', 'fechainicio' => '2024-07-01', 'fechafin' => '2024-08-30', 'creadorgrupo' => 'Sofia Herrera', 'generadorcertificado' => 'Martín Chávez', 'firmante1' => 'Sofia Herrera', 'firmante2' => 'Esteban Ríos', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/python.png'],
        ['id' => 16, 'nombre' => 'Grupo de Certificación Java 2024-II', 'tipo' => 'Certificado de programación', 'descripcion' => 'Certificación en desarrollo con Java', 'fechainicio' => '2024-06-01', 'fechafin' => '2024-07-30', 'creadorgrupo' => 'Natalia Gómez', 'generadorcertificado' => 'Andrés Espinoza', 'firmante1' => 'Natalia Gómez', 'firmante2' => 'Victor Muñoz', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/java.png'],
        ['id' => 17, 'nombre' => 'Grupo de Certificación C++ 2024-II', 'tipo' => 'Certificado de programación', 'descripcion' => 'Certificación en desarrollo con C++', 'fechainicio' => '2024-05-01', 'fechafin' => '2024-06-30', 'creadorgrupo' => 'Rodrigo Sánchez', 'generadorcertificado' => 'Liliana Duarte', 'firmante1' => 'Rodrigo Sánchez', 'firmante2' => 'Marta Ruiz', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/cpp.png'],
        ['id' => 18, 'nombre' => 'Grupo de Certificación SQL 2024-II', 'tipo' => 'Certificado de bases de datos', 'descripcion' => 'Certificación en manejo de bases de datos SQL', 'fechainicio' => '2024-04-01', 'fechafin' => '2024-05-31', 'creadorgrupo' => 'Verónica Medina', 'generadorcertificado' => 'Joaquín Ferrer', 'firmante1' => 'Verónica Medina', 'firmante2' => 'Gabriel Orozco', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/sql.png'],
        ['id' => 19, 'nombre' => 'Grupo de Certificación Docker 2024-II', 'tipo' => 'Certificado de virtualización', 'descripcion' => 'Certificación en contenedores con Docker', 'fechainicio' => '2024-03-01', 'fechafin' => '2024-04-15', 'creadorgrupo' => 'Ricardo Fuentes', 'generadorcertificado' => 'Beatriz Solís', 'firmante1' => 'Ricardo Fuentes', 'firmante2' => 'Francisco Lara', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/docker.png'],
        ['id' => 20, 'nombre' => 'Grupo de Certificación Kubernetes 2024-II', 'tipo' => 'Certificado de orquestación de contenedores', 'descripcion' => 'Certificación en administración de Kubernetes', 'fechainicio' => '2024-02-01', 'fechafin' => '2024-03-31', 'creadorgrupo' => 'Gustavo Varela', 'generadorcertificado' => 'Daniela Acosta', 'firmante1' => 'Gustavo Varela', 'firmante2' => 'Rodrigo Mena', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/kubernetes.png'],
    ];
    

    // Array de fechas de emisión
    public $fechas_emision = [
        ['id' => 1, 'fecha' => '2024-01-15'],
        ['id' => 2, 'fecha' => '2024-02-20'],
        ['id' => 3, 'fecha' => '2024-03-10'],
        ['id' => 4, 'fecha' => '2024-03-25'],
        ['id' => 5, 'fecha' => '2024-04-05'],
        ['id' => 6, 'fecha' => '2024-04-20'],
        ['id' => 7, 'fecha' => '2024-05-15'],
        ['id' => 8, 'fecha' => '2024-05-30'],
        ['id' => 9, 'fecha' => '2024-06-10'],
        ['id' => 10, 'fecha' => '2024-06-25'],
        ['id' => 11, 'fecha' => '2024-07-15'],
        ['id' => 12, 'fecha' => '2024-07-30'],
        ['id' => 13, 'fecha' => '2024-08-10'],
        ['id' => 14, 'fecha' => '2024-08-25'],
        ['id' => 15, 'fecha' => '2024-09-15'],
        ['id' => 16, 'fecha' => '2024-09-30'],
        ['id' => 17, 'fecha' => '2024-10-15'],
        ['id' => 18, 'fecha' => '2024-10-30'],
        ['id' => 19, 'fecha' => '2024-11-15'],
        ['id' => 20, 'fecha' => '2024-11-30'],
    ];

    public $personas = [
        ['id' => 1, 'nombres' => 'Luis Sandro', 'apellidos' => 'Perez Tutcto', 'correo' => 'luis.perez@example.com', 'area' => 'TI', 'cargo' => 'Sin Cargo', 'firma' => 'Sin firma', 'contacto' => '9542154352', 'sexo' => 'Masculino'],
        ['id' => 2, 'nombres' => 'María Fernanda', 'apellidos' => 'Lopez García', 'correo' => 'maria.lopez@example.com', 'area' => 'Recursos Humanos', 'cargo' => 'Jefa de RRHH', 'firma' => 'Con firma', 'contacto' => '9876543210', 'sexo' => 'Femenino'],
        ['id' => 3, 'nombres' => 'Carlos Alberto', 'apellidos' => 'Gomez Torres', 'correo' => 'carlos.gomez@example.com', 'area' => 'TI', 'cargo' => 'Desarrollador', 'firma' => 'Con firma', 'contacto' => '9517534567', 'sexo' => 'Masculino'],
        ['id' => 4, 'nombres' => 'Ana Patricia', 'apellidos' => 'Ramirez Salas', 'correo' => 'ana.ramirez@example.com', 'area' => 'Marketing', 'cargo' => 'Gerente', 'firma' => 'Con firma', 'contacto' => '9632587410', 'sexo' => 'Femenino'],
        ['id' => 5, 'nombres' => 'Javier Ernesto', 'apellidos' => 'Mendoza Castro', 'correo' => 'javier.mendoza@example.com', 'area' => 'Ventas', 'cargo' => 'Vendedor', 'firma' => 'Sin firma', 'contacto' => '9871236548', 'sexo' => 'Masculino'],
        ['id' => 6, 'nombres' => 'Daniela Beatriz', 'apellidos' => 'Rojas Fernández', 'correo' => 'daniela.rojas@example.com', 'area' => 'Administración', 'cargo' => 'Coordinadora', 'firma' => 'Con firma', 'contacto' => '9123456789', 'sexo' => 'Femenino'],
        ['id' => 7, 'nombres' => 'Fernando Andrés', 'apellidos' => 'Silva Torres', 'correo' => 'fernando.silva@example.com', 'area' => 'TI', 'cargo' => 'Analista', 'firma' => 'Con firma', 'contacto' => '9234567891', 'sexo' => 'Masculino'],
        ['id' => 8, 'nombres' => 'Valeria Soledad', 'apellidos' => 'Herrera Gómez', 'correo' => 'valeria.herrera@example.com', 'area' => 'Finanzas', 'cargo' => 'Contadora', 'firma' => 'Con firma', 'contacto' => '9564783214', 'sexo' => 'Femenino'],
        ['id' => 9, 'nombres' => 'Ricardo Esteban', 'apellidos' => 'Pérez Sánchez', 'correo' => 'ricardo.perez@example.com', 'area' => 'Logística', 'cargo' => 'Supervisor', 'firma' => 'Sin firma', 'contacto' => '9786543120', 'sexo' => 'Masculino'],
        ['id' => 10, 'nombres' => 'Camila Alejandra', 'apellidos' => 'Ortega Díaz', 'correo' => 'camila.ortega@example.com', 'area' => 'TI', 'cargo' => 'Programadora', 'firma' => 'Con firma', 'contacto' => '9456123789', 'sexo' => 'Femenino'],
        ['id' => 11, 'nombres' => 'Sebastián Enrique', 'apellidos' => 'Fernández Ruiz', 'correo' => 'sebastian.fernandez@example.com', 'area' => 'TI', 'cargo' => 'Ingeniero de Software', 'firma' => 'Con firma', 'contacto' => '9873216547', 'sexo' => 'Masculino'],
        ['id' => 12, 'nombres' => 'Luciana Isabel', 'apellidos' => 'Chávez López', 'correo' => 'luciana.chavez@example.com', 'area' => 'Recursos Humanos', 'cargo' => 'Asistente', 'firma' => 'Sin firma', 'contacto' => '9568741230', 'sexo' => 'Femenino'],
        ['id' => 13, 'nombres' => 'Alejandro Javier', 'apellidos' => 'Muñoz Castillo', 'correo' => 'alejandro.munoz@example.com', 'area' => 'Ventas', 'cargo' => 'Ejecutivo de Ventas', 'firma' => 'Con firma', 'contacto' => '9321457896', 'sexo' => 'Masculino'],
        ['id' => 14, 'nombres' => 'Sofía Antonella', 'apellidos' => 'García Méndez', 'correo' => 'sofia.garcia@example.com', 'area' => 'Administración', 'cargo' => 'Secretaria', 'firma' => 'Sin firma', 'contacto' => '9645287913', 'sexo' => 'Femenino'],
        ['id' => 15, 'nombres' => 'Tomás Emiliano', 'apellidos' => 'Vega Ríos', 'correo' => 'tomas.vega@example.com', 'area' => 'Finanzas', 'cargo' => 'Analista Financiero', 'firma' => 'Con firma', 'contacto' => '9754623189', 'sexo' => 'Masculino'],
        ['id' => 16, 'nombres' => 'Gabriela Mariana', 'apellidos' => 'Flores Campos', 'correo' => 'gabriela.flores@example.com', 'area' => 'Logística', 'cargo' => 'Encargada de Inventarios', 'firma' => 'Con firma', 'contacto' => '9123645789', 'sexo' => 'Femenino'],
        ['id' => 17, 'nombres' => 'Rodrigo Manuel', 'apellidos' => 'Cárdenas Ortiz', 'correo' => 'rodrigo.cardenas@example.com', 'area' => 'TI', 'cargo' => 'Administrador de Redes', 'firma' => 'Con firma', 'contacto' => '9874562314', 'sexo' => 'Masculino'],
        ['id' => 18, 'nombres' => 'Isabella Victoria', 'apellidos' => 'Navarro Medina', 'correo' => 'isabella.navarro@example.com', 'area' => 'Marketing', 'cargo' => 'Community Manager', 'firma' => 'Sin firma', 'contacto' => '9547896321', 'sexo' => 'Femenino'],
        ['id' => 19, 'nombres' => 'Francisco Antonio', 'apellidos' => 'Jiménez Guzmán', 'correo' => 'francisco.jimenez@example.com', 'area' => 'Ventas', 'cargo' => 'Gerente de Cuentas', 'firma' => 'Con firma', 'contacto' => '9213648752', 'sexo' => 'Masculino'],
        ['id' => 20, 'nombres' => 'Elena Rocío', 'apellidos' => 'Hernández Palacios', 'correo' => 'elena.hernandez@example.com', 'area' => 'Recursos Humanos', 'cargo' => 'Capacitadora', 'firma' => 'Con firma', 'contacto' => '9875123648', 'sexo' => 'Femenino'],
    ];

    public $plantillas = [
        ['id' => 1, 'nombre' => 'Plantilla Voluntariado', 'imagen' => 'public/imagenes/firma01'],
        ['id' => 2, 'nombre' => 'Plantilla Taller', 'imagen' => 'public/imagenes/firma02'],
        ['id' => 3, 'nombre' => 'Plantilla Directiva', 'imagen' => 'public/imagenes/firma03'],
        ['id' => 4, 'nombre' => 'Plantilla Director de Proyecto', 'imagen' => 'public/imagenes/firma04'],
        ['id' => 5, 'nombre' => 'Plantilla Ponencia', 'imagen' => 'public/imagenes/firma05'],
        ['id' => 6, 'nombre' => 'Plantilla Certificación', 'imagen' => 'public/imagenes/firma06'],
        ['id' => 7, 'nombre' => 'Plantilla Reconocimiento', 'imagen' => 'public/imagenes/firma07'],
        ['id' => 8, 'nombre' => 'Plantilla Evento Académico', 'imagen' => 'public/imagenes/firma08'],
        ['id' => 9, 'nombre' => 'Plantilla Mérito', 'imagen' => 'public/imagenes/firma09'],
        ['id' => 10, 'nombre' => 'Plantilla Constancia', 'imagen' => 'public/imagenes/firma10'],
        ['id' => 11, 'nombre' => 'Plantilla Participación', 'imagen' => 'public/imagenes/firma11'],
        ['id' => 12, 'nombre' => 'Plantilla Distinción', 'imagen' => 'public/imagenes/firma12'],
        ['id' => 13, 'nombre' => 'Plantilla Convenio', 'imagen' => 'public/imagenes/firma13'],
        ['id' => 14, 'nombre' => 'Plantilla Agradecimiento', 'imagen' => 'public/imagenes/firma14'],
        ['id' => 15, 'nombre' => 'Plantilla Coordinación', 'imagen' => 'public/imagenes/firma15'],
        ['id' => 16, 'nombre' => 'Plantilla Asesoría', 'imagen' => 'public/imagenes/firma16'],
        ['id' => 17, 'nombre' => 'Plantilla Evaluación', 'imagen' => 'public/imagenes/firma17'],
        ['id' => 18, 'nombre' => 'Plantilla Organización', 'imagen' => 'public/imagenes/firma18'],
        ['id' => 19, 'nombre' => 'Plantilla Conferencia', 'imagen' => 'public/imagenes/firma19'],
        ['id' => 20, 'nombre' => 'Plantilla Capacitación', 'imagen' => 'public/imagenes/firma20'],
    ];

    public $certificados;

    public function __construct()
    {
        $this->certificados = array_map(function($i) {
            return [
                'id' => $i + 1,
                'codigo' => $this->codigos[$i]['codigo'],
                'titular' => $this->usuarios[$i]['nombre'] . ' ' . $this->usuarios[$i]['apellido'],
                'grupo_certificacion' => $this->grupos_certificacion[$i]['nombre'],
                'fecha_emision' => $this->fechas_emision[$i]['fecha'],
                'estado' => rand(0,1) ? 'Creado' : 'Validado'
            ];
        }, range(0, 19));
    }


}
