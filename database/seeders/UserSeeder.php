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
            //DIRECTIVA 2025
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

            //TECNOLOGÍAS DE LA INFORMACIÓN
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

            //MARKETING
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
        ];
        foreach ($users as $user) {
            $user['persona_id'] = Persona::where('correo_institucional', $user['email'])->first()->id;
            User::create($user);
        }
    }
}
