<?php

use Illuminate\Database\Seeder;
use App\Carrera;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carreras=[
            ['nombre'=>'ADMINISTRACIÓN','siglas'=>'ADM','interes'=>'Interés en la planificación, organización, dirección y control de los
            recursos (máquinas, equipos, insumos, personas) de una empresa, hotel o
            fábrica con la finalidad de optimizar sus beneficios.'],

            ['nombre'=>'AGRARIO','siglas'=>'AGR','interes'=>'Interés por la mejora de la calidad de la producción y transformación de
            productos alimentarios para el consumo humano.'],

            ['nombre'=>'ARTÍSTICO','siglas'=>'ART','interes'=>'Interés por la producción o participación en presentaciones artísticas de
            teatro, danza o música.'],

            ['nombre'=>'COMUNICACIÓN','siglas'=>'COM','interes'=>'Interés en la realización de producciones verbales o gráficas con la
            finalidad de informar, publicitar o entretener a la población a través de
            diferentes medios.'],

            ['nombre'=>'CONSTRUCCIÓN','siglas'=>'CON','interes'=>'Interés en el diseño, construcción y mantenimiento de la infraestructura
            acorde a las necesidades de las personas.'],

            ['nombre'=>'CULINARIO','siglas'=>'CUL','interes'=>'Interés en la preparación de alimentos, la creación de nuevas recetas y la
            presentación atractiva de comidas, postres y pasteles.'],

            ['nombre'=>'DEPORTIVO','siglas'=>'DEP','interes'=>'Interés por el entrenamiento y rendimiento físico de las personas en
            actividades deportivas.'],

            ['nombre'=>'DISEÑO ARTÍSTICO','siglas'=>'DIS','interes'=>'Interés en la creación de diseños y objetos de arte que son empleados en
            campos como la decoración, moda, entre otros.'],

            ['nombre'=>'FINANCIERO','siglas'=>'FIN','interes'=>'Interés en la toma de decisiones sobre las finanzas, el registro y el control
            de los ingresos y egresos de una empresa u organización económica con la
            finalidad de obtener las mayores ganancias.'],

            ['nombre'=>'INFORMÁTICA','siglas'=>'INF','interes'=>'Interés en el diseño y control de los sistemas de almacenamiento,
            procesamiento y protección de la información.'],

            ['nombre'=>'JURÍDICO','siglas'=>'JUR','interes'=>'Interés en la defensa de los derechos y la asesoría jurídica y legal de las
            personas así como en ser mediador entre dos partes para llegar a acuerdos.'],

            ['nombre'=>'MARKETING','siglas'=>'MAR','interes'=>'Interés en la identificación de las necesidades de los clientes para
            ofrecerles productos y servicios competitivos en el mercado.'],

            ['nombre'=>'MECANICO/ELECTRONICO','siglas'=>'MEC','interes'=>'Interés en el funcionamiento y manejo de sistemas, máquinas y
            herramientas de tipo mecánico, eléctrico o electrónico.'],

            ['nombre'=>'MINERO','siglas'=>'MIN','interes'=>'Interés por el estudio, la búsqueda y la extracción de los recursos
            minerales.'],
           
            ['nombre'=>'PEDAGOGÍA','siglas'=>'PED','interes'=>'Interés en la mejora de los procesos de enseñanza y aprendizaje.'],

            ['nombre'=>'SALUD','siglas'=>'SAL','interes'=>'Interés en la atención de las necesidades de salud física y mental de las
            personas así como en la orientación para mejorar su calidad de vida'],

            ['nombre'=>'SOCIAL','siglas'=>'SOC','interes'=>'Interés y preocupación por el bienestar de las personas orientándolas hacia
            el logro de sus objetivos personales.'],

            ['nombre'=>'TRADUCCIÓN','siglas'=>'TRA','interes'=>'Interés en la interpretación de la producción oral y escrita de distintos
            grupos sociales como una manifestación de su cultura.'],

            ['nombre'=>'TURISMO','siglas'=>'TUR','interes'=>'Interés por la promoción y realización de la actividad turística y hotelera
            de un país.']       
        ];

        Carrera::insert($carreras);
    }
}
