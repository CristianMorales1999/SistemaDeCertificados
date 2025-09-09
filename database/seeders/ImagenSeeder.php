<?php

namespace Database\Seeders;

use App\Models\Imagen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Para crear el acceso directo para las rutas de las imagenes ejecutar el comando "php artisan storage:link"
        $imagenes=[
            /*****************************
             ****** FOTOS DE PERFIL ******
             ***************************** */
            //DIRECTIVA
            /*[
                'nombre' => 'LUCÍA AMAYA CÁCEDA',
                'ruta' => 'fotos_perfiles/Lucía de Fátima Amaya Cáceda.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'VALERIA PEREDA LLAVE',
                'ruta' => 'fotos_perfiles/Silvana Valeria Pereda Llave.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'MARINA GONZALES TORRES',
                'ruta' => 'fotos_perfiles/Marina Lizeth Gonzales Torres.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'DIEGO RODRÍGUEZ SABANA',
                'ruta' => 'fotos_perfiles/Diego Jesús Rodríguez Sabana.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'ÁNGEL IPARRAGUIRRE AGUILAR',
                'ruta' => 'fotos_perfiles/Ángel Iparraguirre Aguilar.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'MAFER HERRERA CERQUÍN',
                'ruta' => 'fotos_perfiles/María Fernanda de la Caridad Herrera Cerquín.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'CRISTIAN MORALES',
                'ruta' => 'fotos_perfiles/Cristian Anthony Morales Esquivel.png',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            //TECNOLOGÍAS DE LA INFORMACIÓN
            [
                'nombre' => 'ELDER DE LA CRUZ CALDERÓN',
                'ruta' => 'fotos_perfiles/Elder Eli De la Cruz Calderón.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'JHOANNY VARGAS RAMOS',
                'ruta' => 'fotos_perfiles/Jhoanny Jheimilyn Xiomara Vargas Ramos.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'LUIS MORALES LINO',
                'ruta' => 'fotos_perfiles/Luis Angel Morales Lino.jpeg',
                'tipo' => 'Perfil',
                'extension' => '.jpeg',
            ],
            [
                'nombre' => 'MARCO TOLEDO CAMPOS',
                'ruta' => 'fotos_perfiles/Marco Camilo Toledo Campos.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'MIRELLA GAMBOA VALDERRAMA',
                'ruta' => 'fotos_perfiles/Mirella Esteffany Gamboa Valderrama.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'PABLO SÁNCHEZ CABRERA',
                'ruta' => 'fotos_perfiles/Pablo César Sánchez Cabrera.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'PAÚL LAZARO SOLANO',
                'ruta' => 'fotos_perfiles/Paúl Jamir Larazo Solano.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'RENATO MARTINEZ AGUILAR',
                'ruta' => 'fotos_perfiles/Renato Alexander Martinez Aguilar.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'SADHÚ ROJAS GARCÍA',
                'ruta' => 'fotos_perfiles/Sadhu Rojas García.png',
                'tipo' => 'Perfil',
                'extension' => '.png',
            ],
            //MARKETING
            [
                'nombre' => 'ADRIANA CASTILLO OCHOA',
                'ruta' => 'fotos_perfiles/Adriana Gabriela Castillo Ochoa.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'ANDERSON OTINIANO MORALES',
                'ruta' => 'fotos_perfiles/Anderson Abat Otiniano Morales.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'ANGELO CHAVARRY BUSTAMANTE',
                'ruta' => 'fotos_perfiles/Angelo Salvattore Chavarry Bustamante.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'ANGIE RECUENCO TAPIA',
                'ruta' => 'fotos_perfiles/Angie Tatiana Recuenco Tapia.png',
                'tipo' => 'Perfil',
                'extension' => '.png',
            ],
            [
                'nombre' => 'BELINDA ARROYO ESQUIVEL',
                'ruta' => 'fotos_perfiles/Belinda Maricielo Arroyo Esquivel.jpeg',
                'tipo' => 'Perfil',
                'extension' => '.jpeg',
            ],
            [
                'nombre' => 'CESAR QUITO CRUZ',
                'ruta' => 'fotos_perfiles/Cesar Junior Quito Cruz.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'CIELO ABANTO ROJAS',
                'ruta' => 'fotos_perfiles/Cielo Valentina Abanto Rojas.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'DIEGO ULLILÉN CHÁVEZ',
                'ruta' => 'fotos_perfiles/Diego Jesús Ullilén Chávez.png',
                'tipo' => 'Perfil',
                'extension' => '.png',
            ],
            [
                'nombre' => 'EMELYN AGUIRRE VALVERDE',
                'ruta' => 'fotos_perfiles/Emelyn Yasmin Aguirre Valverde.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'GHENARY ESQUIVEL DAVILA',
                'ruta' => 'fotos_perfiles/Ghenary Tais Esquivel Davila.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'JAKORI HOYOS TERRONES',
                'ruta' => 'fotos_perfiles/Jakori Nayeli Hoyos Terrones.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'JORDYNA ROBLES SOLORZANO',
                'ruta' => 'fotos_perfiles/Jordyna Del Carmen Robles Solorzano.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'JUAN CHÁVEZ TENORIO',
                'ruta' => 'fotos_perfiles/Juan José Chávez Tenorio.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'LORENA PRIMO BUENO',
                'ruta' => 'fotos_perfiles/Lorena Midalís Primo Bueno.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'LUIS LECCA CORTEZ',
                'ruta' => 'fotos_perfiles/Luis Angel Lecca Cortez.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'MALENA HUAMÁN ARANA',
                'ruta' => 'fotos_perfiles/Malena Shecid Huamán Arana.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'MARIA CÁRDENAS HIDALGO',
                'ruta' => 'fotos_perfiles/Maria Fernanda Cárdenas Hidalgo.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'MELISSA MUÑOZ URIARTE',
                'ruta' => 'fotos_perfiles/Melissa del Rosario Muñoz Uriarte.jpg',
                'tipo' => 'Perfil',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'MILENE DELGADO SILVA',
                'ruta' => 'fotos_perfiles/Milene Xiomara Delgado Silva.jpeg',
                'tipo' => 'Perfil',
                'extension' => '.jpeg',
            ],
            [
                'nombre' => 'STEFANY GUTIERREZ VEGA',
                'ruta' => 'fotos_perfiles/Stefany Isabel Gutierrez Vega.png',
                'tipo' => 'Perfil',
                'extension' => '.png',
            ],
            [
                'nombre' => 'YOJHANIA GONZALES CONTRERAS',
                'ruta' => 'fotos_perfiles/Yojhania Taitt Gonzales Contreras.jpeg',
                'tipo' => 'Perfil',
                'extension' => '.jpeg',
            ],
            [
                'nombre' => 'ZULEMA ADELI VALVERDE ZAVALETA',
                'ruta' => 'fotos_perfiles/Zulema Adeli Valverde Zavaleta.jpeg',
                'tipo' => 'Perfil',
                'extension' => '.jpeg',
            ],*/
            //
            /*****************************
             ****** FOTOS DE FIRMAS ******
             ***************************** */
            // [
            //     'nombre' => '',
            //     'ruta' => 'fotos_firmas/',
            //     'tipo' => 'Firma',
            //     'extension' => '.jpg',
            // ],
            //
            /*****************************
             ****** FOTOS DE LOGOS *******
             ***************************** */
            // [
            //     'nombre' => '',
            //     'ruta' => 'fotos_logos/',
            //     'tipo' => 'Logo',
            //     'extension' => '.jpg',
            // ],
            //
            /*********************************
             ****** FOTOS DE PLANTILLAS ******
             ********************************* */
            // [
            //     'nombre' => '',
            //     'ruta' => 'fotos_plantillas/',
            //     'tipo' => 'Plantilla',
            //     'extension' => '.jpg',
            // ],
            //
            /*****************************
             ****** FOTOS DE SELLOS ******
             ***************************** */
            // [
            //     'nombre' => '',
            //     'ruta' => 'fotos_sellos/',
            //     'tipo' => 'Sello',
            //     'extension' => '.jpg',
            // ],
        ];

        foreach ($imagenes as $imagen) {
            Imagen::create($imagen);
        }
    }
}
