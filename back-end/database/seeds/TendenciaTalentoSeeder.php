<?php

use App\TendenciaTalento;
use Illuminate\Database\Seeder;

class TendenciaTalentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tendencias=[
            ['nombre'=>'Orientados a las Personas','descripcion'=>'Estas personas pueden sentir los 
            afectos de las personas que los rodean encontrando para los otros, las palabras y 
            los tonos adecuados para expresar lo que sienten, anticipándose a las necesidades de los demás, 
            de acuerdo a cada situación. Las personas a su alrededor se sienten bien a su lado, por ello les resulta 
            sencillo trabajar en equipo ya que logran una integración armónica entre las funciones, las actividades y 
            las personas. Es respetuoso de las características del “otro”, ya que aprecian las relaciones interpersonales, 
            preocupándose por el bienestar de los demás. Gustan de hacer redes de amigos y de conocer personas distintas. 
            Les gusta escuchar y cuando le dicen algo a una persona, lo hacen cuidando tanto lo que dicen como también el cómo lo dicen, 
            siendo respetuosos en todo momento. Se muestran dispuestos a ayudar a los demás con generosidad.','color'=>'#EA2F0A','nombre_color'=>'ROJO'],
            ['nombre'=>'Orientados al Emprendimiento','descripcion'=>'Les gusta empezar proyectos nuevos y ponen todo su empeño para lograrlos, 
            identifican oportunidades organizando los recursos necesarios para poner las cosas en marcha, llevan las ideas a la acción ya que 
            creen que ésta es la mejor manera de hacer las cosas, por ello continúan persiguiendo su meta sin importar los obstáculos, el desaliento 
            o que todo no salga exactamente como pensaban. Ven la aplicación de los conocimientos obtenidos a la realidad. Les gusta el desafío de 
            trabajar en un problema y cargar con la responsabilidad de hacerlo. Cuando tienen que trabajar con otras personas escogen gente con alto 
            desempeño, pues al momento de trabajar en equipo son canalizadores disfrutando de manejar todas las variables, alineándolas y realineándolas
            hasta que estén configuradas de la manera más productiva posible.','color'=>'#FF7700','nombre_color'=>'ANARANJADO'],
            ['nombre'=>'Orientados a la Innovación','descripcion'=>'Personas curiosas y abiertas a valores e ideas diferentes a las propias, 
            las cuales son revisadas en vista de la nueva evidencia; el futuro no es un destino fijo sino un lugar que se crea con las decisiones 
            que se toman hoy. Su entusiasmo es contagioso, no dejan de tener la convicción de que la vida es buena, el trabajo puede ser divertido, 
            y que no importa cuántas dificultades se tengan, no se debe perder el sentido del humor así como encontrar la parte divertida de las 
            situaciones. Estas personas se van adaptando conforme las situaciones se presenten, produciendo ideas o comportamientos que se reconocen 
            como originales y que generan soluciones. Sus apreciaciones pueden basarse en claves que existen en el entorno desatendiendo la información 
            innecesaria.','color'=>'#FFE700','nombre_color'=>'AMARILLO'],
            ['nombre'=>'Orientados a la Estructura','descripcion'=>'Estas personas son minuciosas a la hora de realizar una tarea, actúan de manera ordenada 
            y son perseverantes para lograrlas, necesitan metas claras que les permitan dirigir sus esfuerzos siendo importante conocer los plazos de tiempo 
            y fechas límites. Son capaces de asignar las funciones que cada uno debe seguir y de establecer una secuencia para ello. Son personas que suelen 
            tomarse las cosas muy en serio, por lo cual cumplen con las cosas que se comprometen.','color'=>'#73BE21','nombre_color'=>'VERDE'],
            ['nombre'=>'Orientados a la Persuasión','descripcion'=>'Son personas que ponen entusiasmo y energía a todos los 
            proyectos que emprenden. Son personas que se sienten vitales y alertas. Creen en ellos mismos y son capaces de tomar riesgos. 
            A los demás les gusta escucharlos ya que sus palabras y su modo de comunicar atraen el interés, les gusta compartir sus ideas y 
            buscan cambiar las actitudes y/o comportamientos de una persona o de un grupo empleando las palabras para ello. Piensan que deben 
            presentar sus puntos de vista y lo hacen estando bien informados y de manera estratégica. No temen a la confrontación y creen en sus 
            capacidades de comunicar, persuadir y negociar.','color'=>'#8A0A0A','nombre_color'=>'GUINDA'],
            ['nombre'=>'Orientados a la Cognición','descripcion'=>'Son personas a las que les gusta la actividad mental, encontrar la raíz de las 
            situaciones, analizar las causas de manera lógica, son rigurosos, piensan las cosas cuidadosamente, son introspectivos y disfrutan su tiempo 
            con ellos mismos. Buscan constantemente información en diversas fuentes para comprender algo que desconocen. Entienden y evalúan los argumentos 
            en su contexto ya que poseen herramientas intelectuales que los ayudan a distinguir lo razonable de lo no razonable, lo verdadero de lo falso, 
            anticipándose a los problemas y prediciendo el probable desenlace de alguna cadena de eventos. La vida para ellos es de continuo aprendizaje.',
            'color'=>'#216FBE','nombre_color'=>'AZUL'],
            ['nombre'=>'Talentos Específicos','descripcion'=>'En este grupo se ubicaron una serie de talentos específicos a determinados campos de interés 
            pues hay personas que sienten que tienen un talento marcado muy específico tales como: buen oído, espacialidad, ser artístico, deportivo, entre 
            otros. No significa que no existan otros talentos específicos, solo que aquí agrupamos los que consideramos pertinentes en ese momento.',
            'color'=>'#A25DBB','nombre_color'=>'LILA'],
        ];

        TendenciaTalento::insert($tendencias);
    }
}
