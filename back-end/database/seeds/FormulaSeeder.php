<?php

use App\Formula;
use Illuminate\Database\Seeder;

class FormulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formulas=[
            ['nombre'=>'Ambientes dinámicos-Ambientes tranquilos','descripcion'=>'Las personas que tienen un balance entre Ambientes Dinámicos y Ambientes Tranquilos, son personas, que en ocasiones se sienten cómodas en ambientes con mucha gente, ruido y movimiento y en otras se sienten más cómodos en ambientes calmados y tranquilos.','area_id'=>1],
            ['nombre'=>'Sociable-Intimo','descripcion'=>'Las personas que tienen un balance entre Sociable e Íntimo, son personas, que en ocasiones ante eventos emocionales pueden reaccionar de una forma más emocional y en otros de una manera más distante.','area_id'=>1],
            ['nombre'=>'Entusiasta-Calmado','descripcion'=>'Las personas que tienen un balance entre Entusiasta y Calmado, son personas, que en ciertas ocasiones contagian su energía, son más expresivas y/o son fáciles de darse a conocer. En cambio en otras ocasiones son más reservadas y poco expresivas.','area_id'=>1],
            ['nombre'=>'Comunicativo-Reservado','descripcion'=>'Las personas que tienen un balance entre comunicativo y reservado, son personas, que en ciertas cicunstancias son más comunicativas, es decir, más conversadoras, más propensos a dar su opinion y en otras más reservadas, es decir, más silenciosas y prefieren escuchar más que hablar.','area_id'=>1],

            ['nombre'=>'Instintivo-Escéptico','descripcion'=>'Las personas que tienen un balance entre Instintivo y Escéptico, son personas, que en ciertas ocasiones para tomar una decisión confían más en su intuición que en los hechos, cifras y datos, y en otras  ocasiones para tomar decisiones, confïan más en los hechos, cifras y datos que en su intuición.','area_id'=>2],
            ['nombre'=>'Original-Tradicional','descripcion'=>'Las personas que tienen un balance entre Original y Tradicional, son personas, que en ocasiones disfrutan hacer las cosas de manera original, más informal y poco convencional. En cambio en otras ocasiones son más conservadoras, y formales.','area_id'=>2],
            ['nombre'=>'Creativo-Realista','descripcion'=>'Las personas que tienen un balance entre Creativo y Realista, son personas, que ocasionalmente disfrutan dejar volar su imaginación y generan ideas creativas. En cambio, en otras circunstancias son más realistas y prefieren aterrizar e implementar sus ideas o las ideas de los demás.','area_id'=>2],
            ['nombre'=>'Conceptual-Aplicador','descripcion'=>'Las personas que tienen un balance entre Conceptual y Aplicador, son personas, que en ocasiones prefieren entender la teoría que hay detrás de los conceptos y en otras circustancias, les cansa la explicación teórica y prefieren que les den los pasos a seguir para aplicarlos.','area_id'=>2],

            ['nombre'=>'Objetivo-Compasivo','descripcion'=>'Las personas que tienen un balance entre Objetivo y Compasivo, son personas, que en ciertas circunstancias para tomar una decisión, se centran en los hechos, sin darle tanta importancia a las emociones de los involucrados en la decision. En cambio, en otras circunstancias estan más conscientes de las emociones de los demás al tomar una decision.','area_id'=>3],
            ['nombre'=>'Distante-Susceptible','descripcion'=>'Las personas que tienen un balance entre Distante y Susceptible, son personas, que en ocasiones suelen ser muy prácticas y menos emotivas y en otras más bien tienen la habilidad para acompañar emocionalmente a la otra persona ya que comparten su sentir.','area_id'=>3],
            ['nombre'=>'Cuestionador-Conciliador','descripcion'=>'Las personas que tienen un balance entre Cuestionador y Conciliador, son personas, que en ciertas ocasiones valoran las discusiones, dicen lo que piensan y pueden contradecir al resto si es necesario y en otras circunstancias prefieren evitar las discusiones acaloradas y mantener la armonia del grupo.','area_id'=>3],
            ['nombre'=>'Directo-Empático','descripcion'=>'Las personas que tienen un balance entre Directo y Empático, son personas, que ante ciertos eventos dicen lo que piensan aunque sus comentarios puedan afectar emocionalmente a algunos, y en otras cuidan lo que dicen para no afectar negativamente a los demás.','area_id'=>3],

            ['nombre'=>'Planificado-Espontaneo','descripcion'=>'Las personas que tienen un balance entre Planificado y Espontáneo, son personas, que en ciertas circunstancias son más organizadas y  planificadas y en otras oportunidades trabajan de forma más espontánea y planifican menos.','area_id'=>4],
            ['nombre'=>'Metódico-Eventual','descripcion'=>'Las personas que tienen un balance entre Metódico y Eventual, son personas, que en ciertas ocasiones siguen rutinas, son más sistemáticos y cuidadosos y en otras circunstancias, no siguen rutinas y priorizan la rapidez antes que el método.','area_id'=>4],
            ['nombre'=>'Estructurado-Flexible','descripcion'=>'Las personas que tienen un balance entre Estructurado y Flexible, son personas, que en ocasiones son más estructuradas y rigurosas con el cumplimiento de los planes, y en otras circunstancias son más flexibles y se adaptan al cambio de planes.','area_id'=>4],
            ['nombre'=>'Cerrar-Implementar','descripcion'=>'Las personas que tienen un balance entre Cerrar e Implementar y Explorar más Alternativas, son personas, que en ocasiones deciden rápidamente y pasan a la implementación; y en otras, invierten más tiempo en pensar y buscar alternativas de solución al problema.','area_id'=>4],
        ];

        Formula::insert($formulas);
    }
}
