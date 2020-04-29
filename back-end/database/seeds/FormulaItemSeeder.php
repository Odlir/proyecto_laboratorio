<?php

use App\FormulaItem;
use Illuminate\Database\Seeder;

class FormulaItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items=[
            ['nombre'=>'Ambientes Dinámicos','formula_id'=>1,'descripcion'=>'Las personas que tienen preferencias por ambientes dinámicos sienten placer de conversar con personas en situaciones donde hay una gran cantidad de gente y muchos estímulos alrededor (Avia, Sanz y Sila, 1999). Son más eficientes en situaciones donde hay muchos estímulos que los puede activar, por lo que en ambientes silenciosos suelen sentir poca energía y aburrimiento (Briggs, McCaulley y Hammer, 2009; Costa y Mcrae, 1992; Yerkes & Dodson, 1908).','area_item_id'=>1,'posicion'=>'1'],
            ['nombre'=>'Ambientes Tranquilos','formula_id'=>1,'descripcion'=>'Las personas que prefieren ambientes tranquilos sienten mayor comodidad cuando están en ambientes donde no hay mucho ruido, muchos estímulos, ni un gran tumulto de gente (Zuckerman y Habr, 1965; Zuckerman, Persky y Link, 1968). Estas personas, en situaciones donde hay grandes grupos y fuerte bullicio, se sienten incómodas y con la sensación de que no pueden conversar o relacionarse con agrado (Briggs, McCaulley y Hammer, 2009; Zuckerman, 1969).','area_item_id'=>2,'posicion'=>'0'],
            ['nombre'=>'Sociable','formula_id'=>2,'descripcion'=>'A las personas con una faceta más sociable les gusta tener amigos y tener diversos grupos sociales. Para ellas, es muy importante la cantidad de amistades que tienen así como la variedad de las mismas, porque tienen gran interés en socializar con el resto. En ese caso, no tienen dificultad de hablar con una persona que no conocen (Costa y Mcrae, 1992). Esto es sumamente importante ya que les permite realizar diversas actividades y la heterogeneidad de sus grupos sociales les permite poder construir su propia identidad (Baron & Byrne, 2005).','area_item_id'=>1,'posicion'=>'1'],
            ['nombre'=>'Intimo','formula_id'=>2,'descripcion'=>'Las personas con facetas más íntimas están más orientadas a relacionarse con grupos pequeños que los conocen bastante bien (Viney y King, 2003). Por eso, prefieren tener un pequeño grupo de amigos y pocas redes sociales, ya que pueden ser selectivos con la información que comparten ya que orientan su energía hacia adentro y hacia sus aspectos íntimos (Di Caprio, 1989; Jung, 1933).','area_item_id'=>2,'posicion'=>'0'],
            ['nombre'=>'Entusiasta','formula_id'=>3,'descripcion'=>'Las personas con facetas entusiastas son personas con mucha energía e interés por conversar (John, 1990). Para ellos, las conversaciones son vistas como estimulantes y como situaciones que pueden generar que obtengan una gran cantidad de energía. Por ello, la gente con faceta entusiasta es percibida por los demás como individuos con gran energía y que disfrutan enormemente de las conversaciones grupales (DeYoung, Quilty y Peterson, 2007). Además, la gran energía que despliegan durante las conversaciones hace que sean personas con mucha vitalidad y que la gente sepa los temas de su interés (Ashton, Lee y Paunonen, 2002).','area_item_id'=>1,'posicion'=>'1'],
            ['nombre'=>'Calmado','formula_id'=>3,'descripcion'=>'Las personas con facetas calmadas suelen ser personas parsimoniosas incluso en situaciones donde la conversación es dinámica y llena de energía. Ellas simplemente parecen tener una menor energía y la interacción con los demás los emociona menos que a otras personas (Cloninger, 1996). Al hablar, su lenguaje corporal no suele ser muy expresivo y no se expresan de manera muy efusiva y la gente podría percibirlas como no muy apasionadas. Sin embargo, transmiten una gran calma a quienes los rodean  (Costa y Widiger, 2002).','area_item_id'=>2,'posicion'=>'0'],
            ['nombre'=>'Comunicativo','formula_id'=>4,'descripcion'=>'Las personas con facetas más comunicativas están dispuestas a compartir experiencias, emociones, ideas y casi siempre suelen tener algo que decir. Para ellos, comunicar es importante porque estrechan las relaciones interpersonales (Liebert, y Spiegler, (2000). Prefieren ser honestos y abiertos a lo que piensan, sienten y opinan, si la situación lo permite. Por ello, no es complicado conocer a estas personas ya que ellas comunican lo que piensan de manera abierta (Avia, y Sánchez, 1995; Dolcet i Serra, 2006; Digman, 1990).','area_item_id'=>1,'posicion'=>'1'],
            ['nombre'=>'Reservado','formula_id'=>4,'descripcion'=>'Las personas con facetas más reservadas son selectivas con la información que comparten con los demás y a quién le comunican ésta. Suelen revelar lo que piensan cuando un tema que es acorde a sus intereses, es expuesto (Eysenck y Eysenck, 1975). Por ello, es difícil conocer con rapidez a una persona con una faceta más reservada, ya que suelen ser personas tímidas y selectivas con la información que comparten (Catell, 1965).','area_item_id'=>2,'posicion'=>'0'],

            ['nombre'=>'Instintivo','formula_id'=>5,'descripcion'=>'Las personas que prefieren la faceta instintiva sienten que la importancia de la información está en lo abstracto y en el significado que tienen las cosas. Prefieren guiarse de su intuición para tomar decisiones, en lugar de basarse en hechos concretos y medibles (Hjelle y Ziegler, 1992). Para las personas con faceta instintiva, seguir su intuición y lo que consideran que es adecuado es mucho más beneficioso ya que anteponen ésta para evaluar todo tipo de situaciones incluso las nuevas (Schultz y Schultz, 2010).','area_item_id'=>3,'posicion'=>'1'],
            ['nombre'=>'Escéptico','formula_id'=>5,'descripcion'=>'Las personas con faceta escéptica prefieren la información fáctica en lugar de los datos que pueden ser abstractos o sin sustento. Estas personas tienen preferencia por llevar a la práctica las ideas basándose en información o cifras concretas en lugar de hechos que no son concretos (Hjelle y Ziegler, 1992). Suelen ser personas que tienen interés en analizar las situaciones pero siempre basándose en hechos que son pragmáticos y medibles. En ese caso, la información valiosa es la que es capaz de ser medible y verificable (Briggs, McCaulley y Hammer, 2009).','area_item_id'=>4,'posicion'=>'0'],
            ['nombre'=>'Original','formula_id'=>6,'descripcion'=>'Las personas con faceta original están más interesadas en las ideas nuevas y diferentes. Esto no quiere decir que desechen las tradiciones, pero prefieren crear situaciones y caminos nuevos. Estas personas prefieren variar lo convencional ya que sienten que es el cambio lo que les permite expresarse tal y como son. Las personas con faceta original necesitan situaciones en los cuales se puede promover su creatividad y hacer cosas únicas, ya que es la manera de expresar su originalidad (Briggs, McCaulley y Hammer, 2009).','area_item_id'=>3,'posicion'=>'1'],
            ['nombre'=>'Tradicional','formula_id'=>6,'descripcion'=>'Las personas con faceta tradicional prefieren realizar actividades en base a lo que el consenso social propone (John, Pals y Westenberg, 1998). Se sienten seguras y cómodas de pertenecer a una comunidad y le dan gran importancia a las tradiciones ya que les da una sensación de pertenecer a un grupo. Esto genera que sus ideas estén dirigidas hacia las situaciones más habituales para su comunidad (Schultz y Schultz, 2010). Se sienten cómodos con la convención social ya que sus ideas están regidas por ésta. Asimismo, los valores tradicionales y consensuados son vistos como los correctos y los más adecuados (Briggs, McCaulley y Hammer, 2009).','area_item_id'=>4,'posicion'=>'0'],
            ['nombre'=>'Creativo','formula_id'=>7,'descripcion'=>'Las personas con esta faceta sienten que los objetos tangibles no son tan importantes sino más bien, las diferentes posibilidades que éstos permiten conseguir. La persona creativa goza de conectar diversas ideas en base a la imaginación (McCrae, 1996). Son amantes de la creatividad y gustan de jugar con las ideas, imaginarlas y valoran mucho los proyectos obtenidos de la propia inspiración (Hampson, 1989). Ello hace que algunas personas puedan verlos como soñadores ya que suelen estar interesados en innovar y cambiar las cosas (Millon, 1990).','area_item_id'=>3,'posicion'=>'1'],
            ['nombre'=>'Realista','formula_id'=>7,'descripcion'=>'Las personas con faceta realista suelen ser prácticas y que valoran rutinas y hechos que son de carácter concreto y que pueden desencadenar en un proyecto aplicativo. Estas personas valoran fuertemente la eficiencia en el uso de los diferentes recursos que utilicen y ven la importancia de hacer las ideas concretas y reales (Fadiman y Frager, 1979). Le dan importancia a los hechos prácticos que tengan un impacto que puede ser observable (Mischel, 1979). Por ello, son personas vistas como muy realistas y que no suelen soñar mucho, viven en el presente y las oportunidades que éste les da, en lugar de lo que puede pasar en el futuro lejano (Briggs, McCaulley y Hammer, 2009).','area_item_id'=>4,'posicion'=>'0'],
            ['nombre'=>'Conceptual','formula_id'=>8,'descripcion'=>'Las personas que tienen una faceta conceptual buscan el lado teórico que está detrás del análisis. Su enfoque está en realizar inferencias de carácter teórico y estas inferencias pueden generar diversas ideas que luego podrían ser aplicadas (Schultz y Schultz, 2010). Estas personas están interesadas en desarrollar las ideas que tienen y elaborar diferentes conexiones con las mismas (Fadiman y Frager, 1979). Además, valoran discursos que son intelectuales y de carácter abstracto.','area_item_id'=>3,'posicion'=>'1'],
            ['nombre'=>'Aplicador','formula_id'=>8,'descripcion'=>'Las personas que tienen una faceta aplicadora tienen preferencia por las ideas prácticas y de sentido común. Para ellas, las ideas son sumamente valoradas cuando pueden ser aplicadas y están diseñadas para ser utilizadas en problemas concretos (Schultz y Schultz, 2010). En ese caso, optan por ideas más concretas que tienen aplicación práctica en lugar de situaciones abstractas y que pueden ser hipotéticas, simbólicas o de carácter puramente teórico (Briggs, McCaulley y Hammer, 2009).','area_item_id'=>4,'posicion'=>'0'],

            ['nombre'=>'Objetivo','formula_id'=>9,'descripcion'=>'Las personas con faceta objetiva piensan que el mundo se ajusta mejor con la lógica y el sentido común. Para ellas, el análisis de una situación es aceptable cuando ésta es evaluada utilizando la lógica y la razón (Hjelle y Ziegler, 1992). En ese caso, cuando no entienden algo intentan buscar el sentido lógico y cuál es la premisa que está detrás de la idea (Jacobi, 1963). Asimismo, pueden tener dificultades para aceptar y comprender explicaciones que carecen de un sentido lógico (Fadiman y Frager, 1979; Schultz y Schultz, 2010).','area_item_id'=>5,'posicion'=>'1'],
            ['nombre'=>'Compasivo','formula_id'=>9,'descripcion'=>'Las personas con faceta compasiva evalúan las relaciones interpersonales, los sentimientos y la experiencia de la gente como hechos sumamente importantes. En ese caso, la verdad no está separada de las vivencias y emociones de las personas (Hjelle y Ziegler, 1992). Además, toman las decisiones de lo que van a hacer tomando en cuenta cómo se siente el otro, lo cual en algunas situaciones pueden traerles problemas sobre todo si el otro está muy involucrado emocionalmente (Jacobi, 1963).','area_item_id'=>6,'posicion'=>'0'],
            ['nombre'=>'Distante','formula_id'=>10,'descripcion'=>'Las personas con faceta distante no suelen involucrarse del todo con los sentimientos de los demás. Suelen ser personas más prácticas y menos emotivas. En ese caso, en situaciones intensas donde hay un despliegue emocional intenso, ellas se mantienen ecuánimes y no se quiebran (Briggs, McCaulley y Hammer, 2009). Por ello, les es difícil involucrarse en este tipo de situaciones y sentir con otras personas. Esto no quiere decir que no les importen los sentimientos de los demás, sino que les dificulta conectarse con el sentir del otro (Fadiman y Frager, 1979).','area_item_id'=>5,'posicion'=>'1'],
            ['nombre'=>'Susceptible','formula_id'=>10,'descripcion'=>'Las personas con faceta susceptible tienen la habilidad de identificarse con el sentimiento de la otra persona y compartir esa emoción con ella (Avia y Sanchez, 1995). Se muestran como personas emotivas que pueden verse afectadas en situaciones sumamente conmovedoras. En ciertos momentos pueden identificarse tanto con las emociones que pueden llegar a sentirse afectados por éstas. Por ello, tienen la habilidad para acompañar a la otra persona ya que comparten su sentir (Briggs, McCaulley y Hammer, 2009).','area_item_id'=>6,'posicion'=>'0'],
            ['nombre'=>'Cuestionador','formula_id'=>11,'descripcion'=>'Las personas con faceta cuestionadora suelen discutir las ideas y planteamientos de los demás. Su posición no está motivada por el hecho de atacar al otro sino que su interés es que mediante el cuestionamiento podrán conseguir la verdad (Schultz y Schultz, 2010). Estas personas no suelen estar de acuerdo con los demás inmediatamente sino que se toman su tiempo para analizar el discurso y poder encontrar si existe algo que no es lógico o coherente (Fadiman y Frager, 1979).','area_item_id'=>5,'posicion'=>'1'],
            ['nombre'=>'Conciliador','formula_id'=>11,'descripcion'=>'Las personas con faceta conciliadora están más interesadas en llegar a un acuerdo con los demás que en tener la razón y encontrar la idea correcta en una discusión. Su mayor interés es armar grupos de discusión en los cuales haya armonía y en donde los demás se sientan cómodos (Freed, 1970). Asimismo, estas personas consideran que el fuerte cuestionamiento puede ser incluso un ataque hacia la integridad de la otra persona (Briggs, McCaulley y Hammer, 2009).','area_item_id'=>6,'posicion'=>'0'],
            ['nombre'=>'Directo','formula_id'=>12,'descripcion'=>'Las personas con faceta directa son firmes, no cambian de parecer con facilidad ante las opiniones que tienen de los demás y en su punto de vista prima la razón y la lógica (Shibutani, 1961). Ellas no temen decir lo que piensan y creen y pueden enfrentar conflictos con facilidad. A pesar de que en ciertas oportunidades pueden afectar la susceptibilidad de los demás, las personas con faceta directa prefieren decir las cosas tal y como son en vez de diluir el comentario para evitar complicaciones con los demás. Sin embargo, en ciertas situaciones por ser tan directos pueden generar conflictos con los demás (Briggs, McCaulley y Hammer, 2009).','area_item_id'=>5,'posicion'=>'1'],
            ['nombre'=>'Empático','formula_id'=>12,'descripcion'=>'Las personas con faceta empática son muy cuidadosas con los sentimientos de las otras personas (Allport, 1961). Asimismo, están muy atentas hacia los sentimientos de los demás y modulan sus comentarios de tal manera que no afecten la integridad del otro (McCrae, et al. 1996). En ese caso, cuando toman decisiones suelen comunicar las mismas de manera empática y asertiva tomando en cuenta lo que piensan y sienten lo demás. Al referirse a los otros piensan cuidadosamente qué palabras utilizar de tal manera que sean comprendidos pero evitando afectar al otro (Briggs, McCaulley y Hammer, 2009).','area_item_id'=>6,'posicion'=>'0'],

            ['nombre'=>'Planificado','formula_id'=>13,'descripcion'=>'Las personas con faceta planificada prefieren planear las diversas actividades que van a realizar así sean de trabajo o de ocio. Estas personas, en cierta manera,  tienen la habilidad para tener idea de qué tareas van a hacer en el futuro de tal modo que puedan planificarlas (Fadiman y Frager, 1979). Prefieren conocer las fechas, los días y las horas de las diferentes reuniones (u otras actividades) que van a tener. Como suelen ser personas sumamente ordenadas no están cómodas cuando se les avisa de un evento con poca anticipación ya que puede sorprenderlas (Lazarus, 1965).','area_item_id'=>7,'posicion'=>'1'],
            ['nombre'=>'Espontaneo','formula_id'=>13,'descripcion'=>'Las personas con faceta espontánea sienten que planificar puede quitarles la libertad de aceptar posteriormente otras actividades que incluso podrían ser más interesantes y entretenidas. En ese caso, prefieren que sus horarios no estén planificados sino más bien libres y abiertos (Briggs, McCaulley y Hammer, 2009). Estas personas, disfrutan de la espontaneidad de los eventos y les genera entusiasmo vivir el presente y las situaciones que pueden aparecer en ese mismo momento (Costa y McCrae, 1992).','area_item_id'=>8,'posicion'=>'0'],
            ['nombre'=>'Metódico','formula_id'=>14,'descripcion'=>'Las personas con faceta metódica tienen una orientación sistemática de cómo enfrentar la vida. Ellas utilizan estructuras y rutinas para ordenar su tiempo de manera eficiente (Rotter, 1966). Su fuerte planificación les permite incluso no agotar toda su energía sino guardarla y mantenerla. En ese caso, se describen como personas ordenadas y sistemáticas que pueden incluso tener actividades establecidas de manera diaria y un orden específico el cual las hace sentir muy cómodas (Briggs, McCaulley y Hammer, 2009).','area_item_id'=>7,'posicion'=>'1'],
            ['nombre'=>'Eventual','formula_id'=>14,'descripcion'=>'Las personas con faceta eventual suelen emocionarse cuando se encuentran con actividades que son inesperadas y que rompen las actividades cotidianas (Avia y Sanchez, 1995). Las personas con faceta eventual tienen preferencias por situaciones más espontáneas. Ellas sienten que las rutinas los aprisionan y limitan las diferentes actividades que podrían realizar. En ese caso, están más cómodas con horarios flexibles y sienten que las actividades que realizan deben ser más llevaderas y menos organizadas y rutinarias (Briggs, McCaulley y Hammer, 2009).','area_item_id'=>8,'posicion'=>'0'],
            ['nombre'=>'Estructurado','formula_id'=>15,'descripcion'=>'Las personas con faceta estructurada prefieren tener la mayor cantidad de espacios de su vida estructurados, controlados y que el orden de estos espacios dependa de ellos (Rotter, 1966). Prefieren planear las actividades que piensan hacer ya que esto les da una estructura de cómo actuar. Cuando estos planes no se cumplen, estas personas se sienten incómodas ya que sienten que su estructura habitual ha cambiado (Lazarus, 1965). Asimismo, cuando la estructura se ve alterada, estas personas buscan rápidamente recuperar el orden para poder continuar con sus actividades de la manera que suelen hacerlo cotidianamente.','area_item_id'=>7,'posicion'=>'1'],
            ['nombre'=>'Flexible','formula_id'=>15,'descripcion'=>'Las personas con faceta flexible suelen tener amplia habilidad para adaptarse ante situaciones inesperadas que les cambian los planes que se habían trazado (Showers y Ziegler-Hill, 2012). Ellas prefieren tener un ritmo de vida más espontáneo, flexible y poco ordenado.  Esto no quiere decir que la vida es desordenada, sino que prefieren poder escoger las diferentes situaciones y no tener un esquema determinado (Briggs, McCaulley y Hammer, 2009). Ello, les permite sentir que tienen un mejor manejo de sus tiempos y su actuar en general (Lazarus, 1965).','area_item_id'=>8,'posicion'=>'0'],
            ['nombre'=>'Cerrar e implementar','formula_id'=>16,'descripcion'=>'Las personas con faceta de cerrar e implementar prefieren implementar velozmente y realizar las actividades en vez de evaluar varias alternativas. Estas personas, están bien enfocadas en la tarea y escogen las primeras alternativas que aparecen de tal manera que puedan desarrollar la actividad en ese momento. Además, tienen la sensación que evaluar y explorar ideas por un tiempo prolongado es utilizar el tiempo de manera ineficiente. En ese caso, prefieren hacer pocos proyectos a la vez de tal manera que pueden manejar su tiempo eficientemente (Briggs, McCaulley y Hammer, 2009).','area_item_id'=>7,'posicion'=>'1'],
            ['nombre'=>'Explorar alternativas','formula_id'=>16,'descripcion'=>'Las personas con faceta de explorar más alternativas prefieren evaluar todas las opciones posibles antes de implementar un proyecto. Asimismo, piensan que utilizar el tiempo para evaluar las diferentes ideas es una inversión productiva de éste y va a permitir obtener un producto adecuado y de calidad (Briggs, McCaulley y Hammer, 2009). Además, en ciertas oportunidades pueden preferir hacer varios proyectos a la vez ya que les permite explorar diferentes ideas (Millon, 1990).','area_item_id'=>8,'posicion'=>'0'],
        ];

        FormulaItem::insert($items);
    }
}