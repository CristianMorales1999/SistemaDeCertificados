<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Persona;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /***
         * Estados posibles para usuarios:
         * .
                'Pendiente',
                'Activo',//Validado
                'Inactivo',
                'Rechazado',
                'Eliminado'
         */
        $users=[
            //DIRECTIVA 2025 - 7
            [
                'name' => 'lucia Amaya',
                'email' => 't1051300621@unitru.edu.pe',//lucia Amaya
                'profile_picture' =>'fotos_perfiles/Lucía de Fátima Amaya Cáceda.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('71467211'),
            ],
            [
                'name' => 'Valeria Pereda',
                'email' => 'speredal@unitru.edu.pe',//Silvana Pereda
                'profile_picture' =>'fotos_perfiles/Silvana Valeria Pereda Llave.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('70618936'),
            ],
            [
                'name' => 'Marina Gonzales',
                'email' => 't1510600121@unitru.edu.pe',//Marina Gonzales
                'profile_picture' =>'fotos_perfiles/Marina Lizeth Gonzales Torres.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('72673121'),
            ],
            [
                'name' => 'Diego Rodríguez',
                'email' => 't1010100421@unitru.edu.pe',//Diego Rodriguez
                'profile_picture' =>'fotos_perfiles/Diego Jesús Rodríguez Sabana.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('74028478'),
            ],
            [
                'name' => 'Ángel Iparraguirre',
                'email' => 't1024000721@unitru.edu.pe',//Angel Iparraguirre
                'profile_picture' =>'fotos_perfiles/Ángel Iparraguirre Aguilar.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('71046882'),
            ],
            [
                'name' => 'Mafer Herrera',
                'email' => 'mfherrerace@unitru.edu.pe',//Mafer Herrera
                'profile_picture' =>'fotos_perfiles/María Fernanda de la Caridad Herrera Cerquín.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('76554062'),
            ],
            [
                'name' => 'Cristian Morales',
                'email' => 'chmoralese@unitru.edu.pe',//Cristian Morales
                'profile_picture' =>'fotos_perfiles/Cristian Anthony Morales Esquivel.png',
                'status' => 'Activo',
                'password' =>  Hash::make('73179853'),
            ],

            //GESTIÓN DE TALENTO HUMANO - 21
            [
                'name' => 'Alisson Pretell',
                'email' => 't050601920@unitru.edu.pe',//Alisson Pretell
                'profile_picture' =>'fotos_perfiles/Alisson Milagros Pretell Canchas.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72712935'),
            ],
            [
                'name' => 'Ana Segura',
                'email' => 'anseguraa@unitru.edu.pe',//Ana Segura
                'profile_picture' =>'fotos_perfiles/Ana Nicoll Segura Aredo.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('71507469'),
            ],
            [
                'name' => 'Dulce Chavez',
                'email' => 't1051302521@unitru.edu.pe',//Dulce Chavez
                'profile_picture' =>'fotos_perfiles/Dulce Geraldine Chavez Padilla.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('70992230'),
            ],
            [
                'name' => 'Elber Pichén',
                'email' => 't1024000121@unitru.edu.pe',//Elber Pichén
                'profile_picture' =>'fotos_perfiles/Elber Isaí Pichén Zavaleta.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('71293533'),
            ],
            [
                'name' => 'Gerson Alfaro',
                'email' => 't1051500121@unitru.edu.pe',//Gerson Alfaro
                'profile_picture' =>'fotos_perfiles/Gerson Gabriel Alfaro Tandaypan.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('73479500'),
            ],
            [
                'name' => 'José Avila',
                'email' => 'jdavilas@unitru.edu.pe',//José Avila
                'profile_picture' =>'fotos_perfiles/José Daniel Avila Santillan.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('61758330'),
            ],
            [
                'name' => 'Lisseth Chávez',
                'email' => 'lichavezr@unitru.edu.pe',//Lisseth Chávez
                'profile_picture' =>'fotos_perfiles/Lisseth Adelaida Chávez Rosales.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('60778246'),
            ],
            [
                'name' => 'Mariann Fernández',
                'email' => 't1050102021@unitru.edu.pe',//Mariann Fernández
                'profile_picture' =>'fotos_perfiles/Mariann Estefany Fernández Leyva.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72282922'),
            ],
            [
                'name' => 'Michael García',
                'email' => 't1051300421@unitru.edu.pe',//Michael García
                'profile_picture' =>'fotos_perfiles/Michael Junior García García.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('70256048'),
            ],
            [
                'name' => 'Nashaly Alama',
                'email' => 'nalama@unitru.edu.pe',//Nashaly Alama
                'profile_picture' =>'fotos_perfiles/Nashaly Nicolle Alama Terrones.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('71340979'),
            ],
            [
                'name' => 'Renzo Carrasco',
                'email' => 'rgcarrascol@unitru.edu.pe',//Renzo Carrasco
                'profile_picture' =>'fotos_perfiles/Renzo Georkael Carrasco Lalangui.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72885589'),
            ],
            [
                'name' => 'Romina Seclen',
                'email' => 't1052500521@unitru.edu.pe',//Romina Seclen
                'profile_picture' =>'fotos_perfiles/Romina Alejandra Seclen Cespedes.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('60775617'),
            ],
            [
                'name' => 'Corina Sanchez',
                'email' => 'csanchezd@unitru.edu.pe',//Corina Sanchez
                'profile_picture' =>'fotos_perfiles/Corina Marilu Sanchez Delgado.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72572282'),
            ],
            [
                'name' => 'Andrweeu Urtecho',
                'email' => 'aurtechoa@unitru.edu.pe',//Andrweeu Urtecho
                'profile_picture' =>'fotos_perfiles/Andrweeu Daniel Urtecho Avila.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72223026'),
            ],
            [
                'name' => 'Anderson Saavedra',
                'email' => 'aasaavedrano@unitru.edu.pe',//Anderson Saavedra
                'profile_picture' =>'fotos_perfiles/Anderson Alexander Saavedra Nolasco.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('71545805'),
            ],
            [
                'name' => 'Luis Montoya',
                'email' => 'lemontoyaa@unitru.edu.pe',//Luis Enrique Montoya
                'profile_picture' =>'fotos_perfiles/Luis Enrique Montoya Aguirre.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('70766459'),
            ],
            [
                'name' => 'Cristhian Sanchez',
                'email' => 'clsanchezo@unitru.edu.pe',//Cristhian Sanchez
                'profile_picture' =>'fotos_perfiles/Cristhian Luis David Sanchez Obeso.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('74930588'),
            ],
            [
                'name' => 'Joaquin Bocanegra',
                'email' => 'jabocanegrap@unitru.edu.pe',//Joaquin Bocanegra
                'profile_picture' =>'fotos_perfiles/Joaquin Adriano Bocanegra Peláez.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('70959620'),
            ],
            [
                'name' => 'Emilly Zavaleta',
                'email' => 'enzavaletac@unitru.edu.pe',//Emilly Zavaleta
                'profile_picture' =>'fotos_perfiles/Emilly Nicoll Zavaleta Chigne.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('73626578'),
            ],
            [
                'name' => 'Eleanor Roca',
                'email' => 'emrocam@unitru.edu.pe',//Eleanor Roca
                'profile_picture' =>'fotos_perfiles/Eleanor Marycielo Roca Mendoza.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('73119588'),
            ],
            [
                'name' => 'Valeria Angelie',
                'email' => 'vavalderramam@unitru.edu.pe',//Valeria Angelie
                'profile_picture' =>'fotos_perfiles/Valeria Angelie Valderrama Muñoz.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('70632841'),
            ],
            //LOGÍSTICA Y FINANZAS - 22
            [
                'name' => 'Christian Valverde',
                'email' => 'crvalverdeca@unitru.edu.pe',//Christian Valverde
                'profile_picture' =>'fotos_perfiles/Christian Rodrigo Valverde Caspito.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('76753292'),
            ],
            [
                'name' => 'Eddie Jiménez',
                'email' => 'ejimenezv@unitru.edu.pe',//Eddie Jiménez
                'profile_picture' =>'fotos_perfiles/Eddie Alessandro Jiménez Vilchez.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('71080474'),
            ],
            [
                'name' => 'Fabián Paredes',
                'email' => 'fnparedesca@unitru.edu.pe',//Fabián Paredes
                'profile_picture' =>'fotos_perfiles/Fabián Nicolas Paredes Calderón.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('76393353'),
            ],
            [
                'name' => 'Fernanda Rojas',
                'email' => 't1510101721@unitru.edu.pe',//Fernanda Rojas
                'profile_picture' =>'fotos_perfiles/Fernanda Milagros Rojas Rodriguez.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('70398008'),
            ],
            [
                'name' => 'Grecia Paredes',
                'email' => 'gaparedesca@unitru.edu.pe',//Grecia Paredes
                'profile_picture' =>'fotos_perfiles/Grecia Alexandra Paredes Cachique.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72503219'),
            ],
            [
                'name' => 'Jhosmel Vigo',
                'email' => 't1511601421@unitru.edu.pe',//Jhosmel Vigo
                'profile_picture' =>'fotos_perfiles/Jhosmel Anderson Vigo Cepeda.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('71243325'),
            ],
            [
                'name' => 'Jimmy Cáceda',
                'email' => 'jcacedao@unitru.edu.pe',//Jimmy Cáceda
                'profile_picture' =>'fotos_perfiles/Jimmy Andersonn Cáceda Olivera.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('71116743'),
            ],
            [
                'name' => 'Kevin Rodríguez',
                'email' => 't1510101021@unitru.edu.pe',//Kevin Rodríguez
                'profile_picture' =>'fotos_perfiles/Kevin Gamaliel Rodríguez Alfaro.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('74908357'),
            ],
            [
                'name' => 'Kiara Rodriguez',
                'email' => 'krodriguezsi@unitru.edu.pe',//Kiara Rodriguez
                'profile_picture' =>'fotos_perfiles/Kiara Marife Rodriguez Sifuentes.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('71778514'),
            ],
            [
                'name' => 'Luis Laureano',
                'email' => 't1511300521@unitru.edu.pe',//Luis Laureano
                'profile_picture' =>'fotos_perfiles/Luis Angel Laureano Escobedo.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('76335297'),
            ],
            [
                'name' => 'Maria Pretell',
                'email' => 't1010700721@unitru.edu.pe',//Maria Pretell
                'profile_picture' =>'fotos_perfiles/Maria Fernanda Pretell Leon.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('73257054'),
            ],
            [
                'name' => 'Mixie Gil',
                'email' => 'magilza@unitru.edu.pe',//Mixie Gil
                'profile_picture' =>'fotos_perfiles/Mixie Arleni Gil Zapata.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('70498842'),
            ],
            [
                'name' => 'Nestor Placencia',
                'email' => 'nrplasenciade@unitru.edu.pe',//Nestor Placencia
                'profile_picture' =>'fotos_perfiles/Nestor Rafael Placencia De la Cruz.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72769554'),
            ],
            [
                'name' => 'Sebastian Facundo',
                'email' => 't1512400421@unitru.edu.pe',//Sebastian Facundo
                'profile_picture' =>'fotos_perfiles/Sebastian Emanuel Facundo Reyes.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72919451'),
            ],
            [
                'name' => 'Tatiana Aliaga',
                'email' => 'taliaga@unitru.edu.pe',//Tatiana Aliaga
                'profile_picture' =>'fotos_perfiles/Tatiana Yuleisy Aliaga Pretell.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('70941690'),
            ],
            [
                'name' => 'Nory Touzet',
                'email' => 'ntouzet@unitru.edu.pe',//Nory Touzet
                'profile_picture' =>'fotos_perfiles/Nory Ann Marie Touzet Meneses.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72919608'),
            ],
            [
                'name' => 'Priscila Villegas',
                'email' => 'pcvillegasdo@unitru.edu.pe',//Priscila Villegas
                'profile_picture' =>'fotos_perfiles/Priscila Crystal Villegas Dominguez.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72933504'),
            ],
            [
                'name' => 'Yamelyn Rios',
                'email' => 'yriost@unitru.edu.pe',//Yamelyn Rios
                'profile_picture' =>'fotos_perfiles/Yamelyn Leslie Rios Tandaypan.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('62806744'),
            ],
            [
                'name' => 'Cristhian Campos',
                'email' => 'cicamposc@unitru.edu.pe',//Cristhian Campos
                'profile_picture' =>'fotos_perfiles/Cristhian Imanol Campos Castro.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('60877849'),
            ],
            [
                'name' => 'Fabiana Sosa',
                'email' => 'fsosap@unitru.edu.pe',//Fabiana Sosa
                'profile_picture' =>'fotos_perfiles/Fabiana Belen Sosa Parra.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72577822'),
            ],
            [
                'name' => 'Diego Garro',
                'email' => 'dgarro@unitru.edu.pe',//Diego Garro
                'profile_picture' =>'fotos_perfiles/Diego Andree Garro Taboada.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('71204375'),
            ],
            [
                'name' => 'Dalia Garcia',
                'email' => 'digarciad@unitru.edu.pe',//Dalia Garcia
                'profile_picture' =>'fotos_perfiles/Dalia Irina Garcia De la Cruz.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('71152548'),
            ],
            //MARKETING - 23
            [
                'name' => 'Adriana Castillo',
                'email' => 'acastilloo@unitru.edu.pe',//Adriana Castillo
                'profile_picture' =>'fotos_perfiles/Adriana Gabriela Castillo Ochoa.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('71471404'),
            ],
            [
                'name' => 'Anderson Otiniano',
                'email' => 'aotinianom@unitru.edu.pe',//Anderson Morales
                'profile_picture' =>'fotos_perfiles/Anderson Abat Otiniano Morales.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('70725008'),
            ],
            [
                'name' => 'Angelo Chavarry',
                'email' => 'aschavarryb@unitru.edu.pe',//Angelo Chavarry
                'profile_picture' =>'fotos_perfiles/Angelo Salvattore Chavarry Bustamante.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('62443128'),
            ],
            [
                'name' => 'Angie Recuenco',
                'email' => 't1013600421@unitru.edu.pe',//Angie Recuento
                'profile_picture' =>'fotos_perfiles/Angie Tatiana Recuenco Tapia.png',
                'status' => 'Activo',
                'password' =>  Hash::make('74175282'),
            ],
            [
                'name' => 'Belinda Arroyo',
                'email' => 'barroyo@unitru.edu.pe',//Belinda Arroyo
                'profile_picture' =>'fotos_perfiles/Belinda Maricielo Arroyo Esquivel.jpeg',
                'status' => 'Activo',
                'password' =>  Hash::make('74232737'),
            ],
            [
                'name' => 'Cesar Quito',
                'email' => 'cquito@unitru.edu.pe',//Cesar Quito
                'profile_picture' =>'fotos_perfiles/Cesar Junior Quito Cruz.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('74759241'),
            ],
            [
                'name' => 'Cielo Abanto',
                'email' => 'cvabantor@unitru.edu.pe',//Cielo Abanto
                'profile_picture' =>'fotos_perfiles/Cielo Valentina Abanto Rojas.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('60879707'),
            ],
            [
                'name' => 'Diego Ullilén',
                'email' => 'dullilen@unitru.edu.pe',//Diego Ullilen
                'profile_picture' =>'fotos_perfiles/Diego Jesús Ullilén Chávez.png',
                'status' => 'Activo',
                'password' =>  Hash::make('73817362'),
            ],
            [
                'name' => 'Emelyn Aguirre',
                'email' => 't1520100421@unitru.edu.pe',//Emelyn Aguirre
                'profile_picture' =>'fotos_perfiles/Emelyn Yasmin Aguirre Valverde.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('75710225'),
            ],
            [
                'name' => 'Ghenary Esquivel',
                'email' => 't1053200921@unitru.edu.pe',//Ghenary Esquivel
                'profile_picture' =>'fotos_perfiles/Ghenary Tais Esquivel Davila.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('71642130'),
            ],
            [
                'name' => 'Jakori Hoyos',
                'email' => 'jnhoyoste@unitru.edu.pe',//Jakori Hoyos
                'profile_picture' =>'fotos_perfiles/Jakori Nayeli Hoyos Terrones.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('74968545'),
            ],
            [
                'name' => 'Jordyna Robles',
                'email' => 't1024100421@unitru.edu.pe',//Jordyna Robles
                'profile_picture' =>'fotos_perfiles/Jordyna Del Carmen Robles Solorzano.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('74540788'),
            ],
            [
                'name' => 'Juan Chávez',
                'email' => 'jchavezt@unitru.edu.pe',//Juan Chávez
                'profile_picture' =>'fotos_perfiles/Juan José Chávez Tenorio.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('75145089'),
            ],
            [
                'name' => 'Lorena Primo',
                'email' => 'lmprimob@unitru.edu.pe',//Lorena Primo
                'profile_picture' =>'fotos_perfiles/Lorena Midalís Primo Bueno.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('60878263'),
            ],
            [
                'name' => 'Luis Lecca',
                'email' => 'lleccac@unitru.edu.pe',//Luis Lecca
                'profile_picture' =>'fotos_perfiles/Luis Angel Lecca Cortez.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('75857054'),
            ],
            [
                'name' => 'Maite Palacios',
                'email' => 'mpalaciosas@unitru.edu.pe',//Maite Palacios
                'profile_picture' =>'fotos_perfiles/Maite Palacios Asto.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72539178'),
            ],
            [
                'name' => 'Malena Huamán',
                'email' => 'mshuaman@unitru.edu.pe',//Malena Huamán
                'profile_picture' =>'fotos_perfiles/Malena Shecid Huamán Arana.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('72079041'),
            ],
            [
                'name' => 'Maria Cárdenas',
                'email' => 'mcardenash@unitru.edu.pe',//María Fernanda Cardenas
                'profile_picture' =>'fotos_perfiles/Maria Fernanda Cárdenas Hidalgo.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('70988813'),
            ],
            [
                'name' => 'Melissa Muñoz',
                'email' => 'mdmunozu@unitru.edu.pe',//Melissa Muñoz
                'profile_picture' =>'fotos_perfiles/Melissa del Rosario Muñoz Uriarte.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('71340858'),
            ],
            [
                'name' => 'Milene Delgado',
                'email' => 'mxdelgados@unitru.edu.pe',//Milene Xiomara
                'profile_picture' =>'fotos_perfiles/Milene Xiomara Delgado Silva.jpeg',
                'status' => 'Activo',
                'password' =>  Hash::make('75327289'),
            ],
            [
                'name' => 'Stefany Gutierrez',
                'email' => 't1510101221@unitru.edu.pe',//Stefany Gutierrez
                'profile_picture' =>'fotos_perfiles/Stefany Isabel Gutierrez Vega.png',
                'status' => 'Activo',
                'password' =>  Hash::make('75278193'),
            ],
            [
                'name' => 'Yojhania Gonzales',
                'email' => 't1510102521@unitru.edu.pe',//Yojhania Gonzales
                'profile_picture' =>'fotos_perfiles/Yojhania Taitt Gonzales Contreras.jpeg',
                'status' => 'Activo',
                'password' =>  Hash::make('74482945'),
            ],
            [
                'name' => 'Adeli Valverde',
                'email' => 't1510100321@unitru.edu.pe',//Zulema Adeli Valverde Zavaleta
                'profile_picture' =>'fotos_perfiles/Zulema Adeli Valverde Zavaleta.jpeg',
                'status' => 'Activo',
                'password' =>  Hash::make('72910786'),
            ],

            //PROJECT MANAGEMENT OFFICE - 14
            [
                'name' => 'Abel Pereda',
                'email' => 'amperedaca@unitru.edu.pe',//Abel Pereda
                'profile_picture' =>'fotos_perfiles/Abel Maximiliano Pereda Cabanillas',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72533278'),
            ],
            [
                'name' => 'Aaron Arteaga',
                'email' => 't1452700121@unitru.edu.pe',//Aaron Arteaga
                'profile_picture' =>'fotos_perfiles/Aaron Kaleb Arteaga Rodriguez.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('73541426'),
            ],
            [
                'name' => 'Angela Loayza',
                'email' => 'axloayzag@unitru.edu.pe',//Angela Loayza
                'profile_picture' =>'fotos_perfiles/Angela Xiomara Loayza Gutierrez.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('77511764'),
            ],
            [
                'name' => 'Dalery Alayo',
                'email' => 'dnalayosi@unitru.edu.pe',//Dalery Alayo
                'profile_picture' =>'fotos_perfiles/Dalery Nicoll Alayo Sifuentes.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72563979'),
            ],
            [
                'name' => 'Daniel Sanchez',
                'email' => 'dasanchezca@unitru.edu.pe',//Daniel Sanchez
                'profile_picture' =>'fotos_perfiles/Daniel Angel Sanchez Cabrera.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('75377702'),
            ],
            [
                'name' => 'Diego Mostacero',
                'email' => 't1020100121@unitru.edu.pe',//Diego Mostacero
                'profile_picture' =>'fotos_perfiles/Diego Alejandro Mostacero Lecca.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('71318284'),
            ],
            [
                'name' => 'Diego Gutierrez',
                'email' => 'dgutierrezva@unitru.edu.pe',//Diego Gutierrez
                'profile_picture' =>'fotos_perfiles/Diego Alonso Gutierrez Vasquez.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('73122203'),
            ],
            [
                'name' => 'Ivanna Vela',
                'email' => 't510100520@unitru.edu.pe',//Ivanna Vela
                'profile_picture' =>'fotos_perfiles/Ivanna Sofia Vela Ocampo.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('76682970'),
            ],
            [
                'name' => 'Jeoselyn Espejo',
                'email' => 'jespejor@unitru.edu.pe',//Jeoselyn Espejo
                'profile_picture' =>'fotos_perfiles/Jeoselyn Maribel Espejo Rodriguez.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('71862255'),
            ],
            [
                'name' => 'Maria Huaman',
                'email' => 'mhuamanm@unitru.edu.pe',//Maria Huaman
                'profile_picture' =>'fotos_perfiles/Maria Celine Huaman Martinez.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('70362801'),
            ],
            [
                'name' => 'Ruben Alcantara',
                'email' => 't1051300821@unitru.edu.pe',//Ruben Alcantara
                'profile_picture' =>'fotos_perfiles/Ruben Dario Alcantara Toribio.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('71324932'),
            ],
            [
                'name' => 'Sebastian Vásquez',
                'email' => 'sjvasqueze@unitru.edu.pe',//Sebastian Vásquez
                'profile_picture' =>'fotos_perfiles/Sebastian Javier Vásquez Estrada.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('60994082'),
            ],
            [
                'name' => 'Ariana Morales',
                'email' => 'amoralesi@unitru.edu.pe',//Ariana Morales
                'profile_picture' =>'fotos_perfiles/Ariana Morales Ipanaqué.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('70498847'),
            ],
            [
                'name' => 'Rodrigo Quispe',
                'email' => 'raquispeco@unitru.edu.pe',//Rodrigo Quispe
                'profile_picture' =>'fotos_perfiles/Rodrigo Alexander Quispe Cortijo.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('73489846'),
            ],
            //TECNOLOGÍAS DE LA INFORMACIÓN - 10
             [
                'name' => 'Elder De la Cruz',
                'email' => 'edelacruzca@unitru.edu.pe',//Elder Eli De la Cruz Calderón
                'profile_picture' =>'fotos_perfiles/Elder Eli De la Cruz Calderón.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('70799149'),
            ],
            [
                'name' => 'Jhoanny Vargas',
                'email' => 'jjvargasr@unitru.edu.pe',//Jhoanny Jheimilyn Xiomara Vargas Ramos
                'profile_picture' =>'fotos_perfiles/Jhoanny Jheimilyn Xiomara Vargas Ramos.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('74142713'),
            ],
            [
                'name' => 'Luis Morales',
                'email' => 't012700620@unitru.edu.pe',//Luis Angel Morales Lino
                'profile_picture' =>'fotos_perfiles/Luis Angel Morales Lino.jpeg',
                'status' => 'Activo',
                'password' =>  Hash::make('72613310'),
            ],
            [
                'name' => 'Marco Toledo',
                'email' => 't022700720@unitru.edu.pe',//Marco Camilo Toledo Campos
                'profile_picture' =>'fotos_perfiles/Marco Camilo Toledo Campos.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('76847674'),
            ],
            [
                'name' => 'Mirella Gamboa',
                'email' => 'mgamboav@unitru.edu.pe',//Mirella Esteffany Gamboa Valderrama
                'profile_picture' =>'fotos_perfiles/Mirella Esteffany Gamboa Valderrama.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('71957561'),
            ],
            [
                'name' => 'Pablo Sánchez',
                'email' => 'psanchezca@unitru.edu.pe',//Pablo César Sánchez Cabrera
                'profile_picture' =>'fotos_perfiles/Pablo César Sánchez Cabrera.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('61220102'),
            ],
            [
                'name' => 'Paúl Lazaro',
                'email' => 't052700520@unitru.edu.pe',//Paúl Jamir Lazaro Solano
                'profile_picture' =>'fotos_perfiles/Paúl Jamir Lazaro Solano.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('77281057'),
            ],
            [
                'name' => 'Renato Martinez',
                'email' => 'ramartinezag@unitru.edu.pe',//Renato Alexander Martinez Aguilar
                'profile_picture' =>'fotos_perfiles/Renato Alexander Martinez Aguilar.jpg',
                'status' => 'Activo',
                'password' =>  Hash::make('71460867'),
            ],
            [
                'name' => 'Sadhu Rojas',
                'email' => 't012701020@unitru.edu.pe',//Sadhu Rojas García
                'profile_picture' =>'fotos_perfiles/Sadhu Rojas García.png',
                'status' => 'Activo',
                'password' =>  Hash::make('72763429'),
            ],
            [
                'name' => 'Zaleth Rivas',
                'email' => 'zvrivasca@unitru.edu.pe',//Zaleth Valentina Rivas Calderón
                'profile_picture' =>'fotos_perfiles/Zaleth Valentina Rivas Calderón.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('75490238'),
            ],
            [
                'name' => 'Rommel Ulco',
                'email' => 'rulco@unitru.edu.pe',//Rommel Eduardo Ulco Chavarria
                'profile_picture' =>'fotos_perfiles/Rommel Eduardo Ulco Chavarria.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('75704759'),
            ],
            [
                'name' => 'Jorge Vargas',
                'email' => 't012700120@unitru.edu.pe',//Jorge Luis Vargas Baltodano
                'profile_picture' =>'fotos_perfiles/Jorge Luis Vargas Baltodano.jpg',
                'status' => 'Eliminado',
                'password' =>  Hash::make('72503127'),
            ],
        ];
        foreach ($users as $user) {
            $user['persona_id'] = Persona::where('correo_institucional', $user['email'])->first()->id;
            User::create($user);
        }
    }
}
