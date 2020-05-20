<?php

use Illuminate\Database\Seeder;
use App\Talento;

class TalentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $talentos=[
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Cálido','descripcion'=>'Eres afectuoso y cercano con las personas. Haces sentir cómoda a la gente 
            que está a tu alrededor. Las personas se sienten bien cuando están contigo. Sabes encontrar cosas que sean de interés para ti y para otras personas, 
            por lo que tienes facilidad para establecer una relación. Eres cordial y amable.','imagen'=>'Calido.png','imagen_espalda'=>'Espalda Calido.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Servicial','descripcion'=>'Tienes valores fuertes y duraderos. Eres una persona altruista, responsable, ética 
            y espiritual. Le das a la vida un significado especial y te brinda satisfacción lo que haces por el prójimo. Ayudar a las personas es la base de tus relaciones. 
            Te gusta hacer más de lo que debes: sobrepasas, con frecuencia, las expectativas de las personas. Te preocupas por satisfacer las necesidades de las personas y 
            cumplir con sus requerimientos; nada te resulta un gran problema. Necesitas un trabajo que concuerde con tus valores y que sea gratificante. ','imagen'=>'Servicial.png','imagen_espalda'=>'Espalda Servicial.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Sensible','descripcion'=>'Te dejas llevar por sentimientos de ternura, compasión y afecto. Te puedes sentir 
            emocionado o herido con facilidad. Sientes emociones con facilidad. Te dejas llevar por las emociones y, en ocasiones, puedes sentirte vulnerable.',
            'imagen'=>'Sensible.png','imagen_espalda'=>'Espalda Sensible.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Empático','descripcion'=>'Percibes los afectos de las personas que te rodean. Eres capaz de observar el mundo 
            con los ojos de los demás y compartes su perspectiva, aunque no estés de acuerdo con esta. Comprendes al prójimo. No necesariamente significa que los disculpes, 
            sino que los comprendes. Al “ponerte en los zapatos” de otro, anticipas sus necesidades: encuentras las palabras y tonos adecuados para comunicarte con él y 
            lo ayudas a que exprese lo que siente.','imagen'=>'Empatico.png','imagen_espalda'=>'Espalda Empatico.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Asertivo','descripcion'=>'Expresas lo que piensas y sientes, con respeto a los demás y a ti mismo. Te sientes 
            libre de expresarte de la manera que requiere cada situación. Mantienes una comunicación madura: no agredes ni te sometes a la voluntad de los demás. 
            Expresas tus convicciones y defiendes tus derechos. Comunicas tus ideas y sentimientos; defiendes tus derechos sin intención de herir o perjudicar. Eres 
            abierto a las opiniones de otros y les das la misma importancia que a las propias. Aceptas que la postura de los demás no tiene por qué coincidir con la 
            tuya y, aunque evitas los conflictos, expresas lo que piensas de forma directa y honesta.','imagen'=>'Asertivo.png','imagen_espalda'=>'Espalda Asertivo.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Abierto a los demás','descripcion'=>'Valoras la diversidad: acoges a las personas que son diferentes a ti mismo. Estás dispuesto a 
            establecer relaciones interpersonales con personas diferentes a ti. Eres inclusivo a la hora de organizar tus reuniones: te preocupas por las personas que parecen aisladas o excluidas. 
            Encuentras, en cada persona, una característica individual que la distingue y aprecias interactuar con ella.','imagen'=>'Abierto a los demas.png','imagen_espalda'=>'Espalda Abierto a los demas.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Armonizador','descripcion'=>'Buscas resolver y minimizar conflictos y discusiones: para ti, no se gana nada con ellos. 
            Cuando las personas a tu alrededor tienen diferentes puntos de vista, procuras enlazar lo que tienen en común. Promueves la armonía y te alejas de la confrontación. 
            Te sorprende el tiempo que pierde la gente cuando trata de imponer su punto de vista a los demás. Tú, por el contrario, armonizas tu opinión con la de los otros. 
            Cuando otros argumentan sus ideas, notas cómo todas pueden dirigirse a un punto común.','imagen'=>'Armonizador.png','imagen_espalda'=>'Espalda Armonizador.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Abierto a escuchar','descripcion'=>'Escuchas a otros con mucho interés y ganas de ayudar: no comienzas hablando de ti mismo. 
            Muestras interés en lo que los otros tienen que decir y en la manera en que lo dicen. Cuando las personas te hablan, te centras en ellos. Escuchas realmente lo que te están diciendo. 
            No solo escuchas las palabras: tratas de captar el mensaje real detrás de ellas.  Para ti, todo lo que dice una persona es importante y merece ser escuchado.','imagen'=>'Sabe escuchar.png',
            'imagen_espalda'=>'Espalda Sabe escuchar.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Sociable','descripcion'=>'Te gusta conocer personas nuevas y ayudar a que se lleven bien entre ellas. Los extraños no se sienten intimidados por 
            ti; por el contrario, se sienten bien cuando están contigo. Te esmeras en saber los nombres de los demás, en hacerles preguntas y en encontrar cosas en común que construyan un vínculo. 
            No rehúyes el iniciar una conversación. Siempre tienes algo que decir. Te resulta fácil romper el hielo. Cuando estableces un lazo con una persona, estás feliz de pasar a la siguiente conversación, 
            porque quieres conocer a mucha gente. Para ti, los demás no son extraños, sino amigos potenciales.','imagen'=>'Sociable.png','imagen_espalda'=>'Espalda Sociable.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Entusiasta','descripcion'=>'Le pones entusiasmo y energía a todos tus proyectos. Eres una persona vital, despierta y alerta.',
            'imagen'=>'Entusiasta.png','imagen_espalda'=>'Espalda Entusiasta.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Comercial','descripcion'=>'Buscas oportunidades para hacer negocio y ganar dinero. Piensas en proyectos que puedan convertirse 
            en negocios rentables.','imagen'=>'Comercial.png','imagen_espalda'=>'Espalda Comercial.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Positivo','descripcion'=>'Eres generoso con los elogios y las sonrisas; ves la parte positiva de las situaciones adversas. 
            Te convences de que las cosas funcionarán bien en el futuro. Te mantienes positivo, incluso cuando las circunstancias se ponen más difíciles. Tu optimismo ayuda a que 
            los demás no se sientan aburridos, presionados o tensos. Encuentras la manera de aligerar estas trabas. Celebras cada logro y permites que todo sea más excitante y vital. 
            No te amilana que otras personas te consideren despreocupado. Tienes la convicción de que la vida es buena y que el trabajo puede ser entretenido, a pesar de los traspiés.',
            'imagen'=>'Positivo.png','imagen_espalda'=>'Espalda Positivo.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Emprendedor','descripcion'=>'Tienes decisión e iniciativa para sacar adelante proyectos nuevos que implican riesgos. 
            Te gusta empezar proyectos nuevos y poner todo tu empeño para lograrlos. Te definen tus ganas de enfrentar lo desconocido para lograr grandes beneficios (frutos de la acción realizada) 
            y también tu capacidad de trabajar frente a la incertidumbre. No temes cometer errores y, si los cometes, aprendes de ellos.','imagen'=>'Emprendedor.png','imagen_espalda'=>'Espalda Emprendedor.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Ejecutor','descripcion'=>'Sacas adelante los proyectos y llevas a la práctica lo planificado. Superas obstáculos y cumples con los objetivos. 
            Te gusta materializar los proyectos: no te quedas en las ideas.','imagen'=>'Ejecutor.png','imagen_espalda'=>'Espalda Ejecutor.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Con coraje','descripcion'=>'Afrontas y superas tus miedos y temores. Participas en actividades que te desafían, incluso cuando pueden asustarte 
            o ponerte nervioso. Tienes una disposición a actuar, tal vez con miedo, en situaciones peligrosas. Siempre, sin embargo, evalúas los riesgos razonables para obtener o preservar algo que 
            percibes como bueno. Entiendes el riesgo y aceptas las consecuencias de la acción; dominas el miedo.','imagen'=>'Con coraje.png','imagen_espalda'=>'Espalda Con coraje.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Estratégico','descripcion'=>'Te anticipas: observas las oportunidades y te adelantas para ganar ventaja. Atraviesas el “desorden” y escoges la mejor ruta. 
            Tienes una perspectiva distinta del mundo, que te permite advertir patrones donde los demás ven solo complejidad. Consciente de estos patrones, interactúas en diferentes espacios. Sueles preguntarte: 
            “¿Qué pasaría si esto sucediera?”. Descartas los patrones que llevan a la resistencia o la confusión. Escoges siempre el camino más directo.','imagen'=>'Estrategico.png','imagen_espalda'=>'Espalda Estrategico.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Orientado al logro','descripcion'=>'Para ti, cada día comienza en cero y, al final del mismo, debes lograr algo tangible para sentirte bien. 
            Esto ocurre en los días de trabajo, los fines de semana y las vacaciones. Necesitas, a menudo, de retroalimentación positiva. Disfrutas el desafío de trabajar en un problema, aunque signifique 
            cargar con la responsabilidad personal del éxito o fracaso. Te gusta sentir que el resultado (éxito o fracaso) depende de tus acciones. No importa cuánto se necesite un día de descanso: si no 
            consigues algún logro, te sientes insatisfecho. Tienes un “fuego interno” que te empuja a conseguir más. Luego de cada logro, ese fuego disminuye, pero rápidamente renace y te empuja al siguiente reto. 
            Puedes trabajar largas jornadas sin llegar necesariamente al burn-out (síndrome del trabajador desgastado o del desgaste profesional).','imagen'=>'Orientado al logro.png','imagen_espalda'=>'Espalda Orientado al logro.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Con iniciativa','descripcion'=>'Te adelantas a los demás en formular propuestas y buscar soluciones. Te impacientas por comenzar una nueva acción. Te gusta tomar la iniciativa, 
            pues solo la acción permite que las cosas sucedan: cuando tomas una decisión, actúas.','imagen'=>'Con iniciativa.png','imagen_espalda'=>'Espalda Con iniciativa.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Ingenioso','descripcion'=>'Eres bueno para crear e inventar cosas. Eres bueno para resolver problemas de forma rápida y astuta.','imagen'=>'Ingenioso.png','imagen_espalda'=>'Espalda Ingenioso.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Flexible','descripcion'=>'Puedes cambiar tu manera de actuar o de pensar para adaptarte a diferentes circunstancias o necesidades. Vives el momento: 
            no ves el futuro como un destino fijo, sino como algo que se construye con las decisiones de hoy. Desarrollas planes, pero te adaptas a las situaciones, incluso si estas se alejan de tu plan original. 
            No sufres por los cambios; más bien, los esperas, pues te gusta responder a las demandas de manera productiva.','imagen'=>'Flexible.png','imagen_espalda'=>'Espalda Flexible.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Creativo','descripcion'=>'Promueves ideas y comportamientos originales, novedosos, sorpresivos e inusuales. Aplicas soluciones en ámbitos diferentes 
            (por ejemplo, la casa y el trabajo). Te gusta diseñar y crear cosas que sean mejores que las que se han hecho antes. Observas las cosas desde una perspectiva distinta; te gusta pensar 
            “fuera de la caja”. Tus ideas permiten que las cosas avancen.','imagen'=>'Creativo.png','imagen_espalda'=>'Espalda Creativo.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Prefiere la novedad','descripcion'=>'Tienes un deseo interno por nuevas experiencias y conocimientos. Estás abierto a lo nuevo 
            y te orientas al futuro; es probable que disfrutes de resolver problemas. Estás motivacionalmente abierto a lo novedoso.','imagen'=>'Prefiere la novedad.png','imagen_espalda'=>'Espalda Prefiere la novedad.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Intuitivo','descripcion'=>'Tomas decisiones en base a tus presentimientos, a los indicios y señales que percibes. Basas tus decisiones más en la intuición que en la lógica. 
            Comprendes las cosas instantáneamente, sin necesidad de razonarlas. Sabes relacionar ese conocimiento o información con experiencias previas, aunque, por lo general, te resulta difícil explicar cómo llegas a una determinada 
            conclusión.','imagen'=>'Intuitivo.png','imagen_espalda'=>'Espalda Intuitivo.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Original','descripcion'=>'Te cuesta aceptar las reglas y convenciones porque necesitas hacer cosas que nadie más hace. Te aproximas a las situaciones de manera original e 
            ingeniosa; luchas por presentar nuevas y diferentes aplicaciones.','imagen'=>'Original.png','imagen_espalda'=>'Espalda Original.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Visionario','descripcion'=>'Imaginas el futuro e inspiras a otros con tu visión. Ves el camino más allá del horizonte. 
            El futuro te fascina: lo proyectas, evalúas lo que ofrece y te encaminas hacia el mañana. Eres soñador: tienes una visión y la valoras. Cuando el presente es frustrante y la gente se muestra muy pragmática, 
            acudes a tus proyecciones del futuro.','imagen'=>'Visionario.png','imagen_espalda'=>'Espalda Visionario.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Sentido del humor','descripcion'=>'Puedes reírte de ti mismo y encuentras el lado divertido de las situaciones. 
            Te gusta hacer reír a los demás. Compartes, con las personas que te rodean, un espíritu alegre. Sabes hacer una broma, contar una historia que mejore los 
            ánimos y ayudas a que las personas se relajen. Cuando las cosas son adversas, aminoras su gravedad. Los otros aprecian que seas una persona divertida; 
            les gusta estar contigo.','imagen'=>'Sentido del humor.png','imagen_espalda'=>'Espalda Sentido del humor.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Curioso intelectual','descripcion'=>'Amas aprender, cualquiera sea el tema que te interese. Te estimula más el 
            proceso que el contenido o el resultado. Disfrutas el paso de la ignorancia al conocimiento. Te gusta aprender cosas nuevas. Te gusta emprender proyectos 
            que te permitan aprender y desarrollar tus intereses.','imagen'=>'Curioso intelectual.png','imagen_espalda'=>'Espalda Curioso intelectual.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Organizado','descripcion'=>'Te gusta identificar los pasos a seguir y las etapas o periodos de trabajo. Asignas roles y 
            responsabilidades; programas tareas y reconoces el objetivo fundamental de cada una.','imagen'=>'Organizado.png','imagen_espalda'=>'Espalda Organizado.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Anticipado','descripcion'=>'Empiezas los proyectos apenas los recibes. Disfrutas al terminar los proyectos mucho antes 
            de la fecha límite. No te gusta lidiar con presiones de último minuto; por ello, inicias lo encomendado apenas lo recibes.','imagen'=>'Anticipado.png','imagen_espalda'=>'Espalda Anticipado.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Detallista','descripcion'=>'Cuando trabajas en algún proyecto, profundizas en los detalles. Eres meticuloso al ejecutar 
            un proyecto o tarea. Puedes desarrollar un tema e identificar sus partes hasta describirlas de manera específica. Adviertes, de inmediato, los errores e inconsistencias. 
            Te gusta ser capaz de corregir los errores. Disfrutas corregir y completar los detalles pendientes. Te resulta importante prestar atención a los detalles.',
            'imagen'=>'Detallista.png','imagen_espalda'=>'Espalda Detallista.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Disciplinado','descripcion'=>'Controlas las distracciones y los impulsos para lograr la meta que te propones. 
            Trabajas con rigor en lo que te planteas, llevando de la mejor manera las molestias y postergaciones que esto puede ocasionar. Actúas ordenada y perseverantemente 
            para conseguir lo propuesto Exiges orden y lineamientos para lograr con mayor rapidez los objetivos deseados.','imagen'=>'Disciplinado.png','imagen_espalda'=>'Espalda Disciplinado.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Enfocado','descripcion'=>'Te concentras en pocos proyectos, para cumplirlos con rigurosidad. Evitas dispersarte en otras actividades. 
            Eres impaciente con los retrasos u obstáculos. Haces recordar al resto que, si algo no ayuda a caminar hacia la meta, no es importante ni merece inversión de tiempo. Ayudas a que los 
            otros no divaguen y retomen el curso de acción.','imagen'=>'Enfocado.png','imagen_espalda'=>'Espalda Enfocado.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Planificado','descripcion'=>'Programas las actividades de un proyecto para evitar sorpresas y cumplir con los objetivos y fechas previstas. 
            Tienes habilidad para planear y planificar: tienes una aproximación metódica a lo que haces. Antes de emprender una tarea, te organizas, verificas los tiempos disponibles y evalúas los recursos que tienes. 
            Te gusta saber que has cubierto las posibles sorpresas y eventualidades.','imagen'=>'Planificado.png','imagen_espalda'=>'Espalda Planificado.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Ordenado','descripcion'=>'Colocas las cosas en el lugar que les corresponde y te esfuerzas por mantenerlas así. 
            Sabes dónde están las cosas. Necesitas que el mundo sea predecible y estructurado. Ante el caos de la vida, necesitas sentirte en control. Tu orden y tu organización 
            te ayudan a ser eficiente en lo que haces. Sin llegar a la rigidez, el orden te permite cuidar el progreso y la productividad.','imagen'=>'Ordenado.png','imagen_espalda'=>'Espalda Ordenado.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Monitor','descripcion'=>'Realizas un seguimiento cercano a los proyectos o tareas a tu cargo. Sigues el avance de los proyectos o tareas a 
            tu cargo con meticulosidad.','imagen'=>'Monitor.png','imagen_espalda'=>'Espalda Monitor.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Director','descripcion'=>'Organizas y diriges a las personas para lograr metas y objetivos. Fijada una meta, te preocupas en cómo 
            alinear a los demás para cumplirla. Compartes tu punto de vista con otras personas, aunque confrontes sus posiciones: sabes que es la única manera de resolver dificultades y avanzar 
            hacia la meta. Te gusta ser claro con los demás y dirigir a la gente, aunque a veces implique tomar riesgos.','imagen'=>'Director.png','imagen_espalda'=>'Espalda Director.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Argumentador','descripcion'=>'Eres bueno para dar razones/argumentos a favor o en contra de alguien o de algo. Elaboras argumentos y razones 
            con facilidad para defender una posición específica.','imagen'=>'Argumentador.png','imagen_espalda'=>'Espalda Argumentador.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Persuasivo','descripcion'=>'Tienes facilidad para convencer a las personas de hacer algo o de pensar de cierta manera. 
            Tienes una persuasión eficaz para que otros cambien su manera de pensar. Elaboras nuevos argumentos para lo que quieres, eliges el lenguaje adecuado y planificas cómo 
            convencer a los otros.','imagen'=>'Persuasivo.png','imagen_espalda'=>'Espalda Persuasivo.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Orientador','descripcion'=>'Enseñas, aconsejas y ayudas a otros a ser mejores personas. Comprendes las necesidades y sentimientos 
            de los otros; te preocupas por ayudarlos. Te relacionas con las preocupaciones de los otros: los reconfortas, ofreces tu consejo y ayudas con amabilidad; eres amigable y atento 
            con las personas.','imagen'=>'Orientador.png','imagen_espalda'=>'Espalda Orientador.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Comunicador escrito','descripcion'=>'Escribes de manera clara, precisa y efectiva. Eres bueno con los textos escritos. 
            Tienes facilidad para la lectura, la comprensión y la expresión escrita. Tienes habilidad para comunicar ideas y lograr metas por medios lingüísticos. Te gusta jugar 
            con las palabras y disfrutas del lenguaje escrito. Escribir te ayuda a aclarar el pensamiento y ser más preciso. Te gusta escribir textos para que otros los lean. 
            Te gusta narrar, leer, jugar con rimas, entre otros ejercicios de redacción.','imagen'=>'Comunicador escrito.png','imagen_espalda'=>'Espalda Comunicador escrito.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Informado','descripcion'=>'Estás actualizado, al día de lo que pasa en el país o en el mundo. Buscas diversas fuentes de información 
            sobre lo que sucede en el país o en el mundo: periódicos, web, libros, entre otros.','imagen'=>'Informado.png','imagen_espalda'=>'Espalda Informado.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Negociador','descripcion'=>'Te encargas de una situación para llegar a un acuerdo o una solución. Tienes facilidad 
            para tratar con las personas y para establecer pactos.','imagen'=>'Negociador.png','imagen_espalda'=>'Espalda Negociador.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Comunicador verbal','descripcion'=>'Expresas ideas, en forma oral, con claridad, facilidad y entusiasmo. Captas la atención 
            de tu audiencia (así sea una o muchas personas). Te gusta explayarte, describir, ser anfitrión y hablar en público. Te gusta darle vida a los hechos a través de las palabras. 
            Te gusta convertir los eventos en historias: recurres a ejemplos y metáforas. Requieres de ideas, eventos, productos, descubrimientos y lecciones para sobrevivir con tal de 
            atraer la atención y capturarla. Empleas palabras dramáticas y poderosas. A las personas les gusta escucharte.','imagen'=>'Comunicador verbal.png','imagen_espalda'=>'Espalda Comunicador verbal.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Expresivo','descripcion'=>'Hablas y actúas con muchos gestos y expresiones. Manifiestas vívidamente lo que piensas o sientes. 
            Gesticulas: recurres a muecas, palabras y/o expresiones para reflejar lo que sientes.','imagen'=>'Expresivo.png','imagen_espalda'=>'Espalda Expresivo.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Coherente','descripcion'=>'Actúas de acuerdo a las ideas que expresas. Te gusta hacer lo que predicas: tus actos reflejan tus palabras.'
            ,'imagen'=>'Coherente.png','imagen_espalda'=>'Espalda Coherente.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Numérico','descripcion'=>'Tienes facilidad con los números y las matemáticas. Buscas información fáctica que 
            te provea de data. Te gusta sistematizar la información que encuentras. Le encuentras sentido a los cuadros y las cifras y estableces relaciones entre las cantidades. 
            Memorizas códigos, cifras y años, entre otros datos numéricos.','imagen'=>'Numerico.png','imagen_espalda'=>'Espalda Numerico.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Reflexivo','descripcion'=>'Eres cuidadoso y te gusta pensar. Para hacer algo, necesitas una razón. El mundo es, 
            para ti, un lugar impredecible: sabes que el mundo, aunque aparente ser ordenado, plantea riesgos que se deben identificar, evaluar y reducir. Eres serio y te 
            acercas a la vida con cautela. Te gusta planear las cosas y seleccionas cuidadosamente a tus amigos. Te gusta la actividad mental y pensar las cosas con calma; 
            eres introspectivo y disfrutas tu tiempo a solas.','imagen'=>'Reflexivo.png','imagen_espalda'=>'Espalda Reflexivo.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Ecuánime','descripcion'=>'Eres equilibrado y sereno. No te alteras ni reaccionas de manera violenta o pasional ante 
            situaciones difíciles. Mantienes la calma casi sin esfuerzo. Mantienes la compostura en diferentes circunstancias y las personas te admiran por esta cualidad.',
            'imagen'=>'Ecuanime.png','imagen_espalda'=>'Espalda Ecuanime.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Crítico','descripcion'=>'Cuestionas y te anticipas a los problemas. Evalúas las situaciones a través de 
            la observación, la experiencia y el razonamiento. Procuras entender y evaluar los argumentos: distinguir lo razonable de lo ilógico y lo verdadero de lo falso.',
            'imagen'=>'Critico.png','imagen_espalda'=>'Espalda Critico.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Autodidacta','descripcion'=>'Te gusta aprender por ti mismo. Buscas los medios para aprender sin ninguna tutela. Eres 
            autónomo para aprender lo que te interesa.','imagen'=>'Autodidacta.png','imagen_espalda'=>'Espalda Autodidacta.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Científico','descripcion'=>'Estás actualizado y te gusta conocer los últimos avances de una ciencia determinada. 
            Te apasiona un área de interés (una ciencia específica) y profundizas en los últimos avances.','imagen'=>'Cientifico.png','imagen_espalda'=>'Espalda Cientifico.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Aprendiz','descripcion'=>'Disfrutas aquello que te permite aprender, crecer y desarrollarte. Te gusta estar inmerso en 
            el proceso de aprender. Buscas oportunidades que te permitan desarrollar tus capacidades e intereses. Te emocionan los nuevos hechos, los primeros esfuerzos de llevar 
            a la práctica lo aprendido, la adquisición de confianza progresiva, esto es lo que te atrae. Te gusta involucrarte en aquello que te permite aprender algo nuevo: 
            clases de piano, de algún idioma, de cocina, o profundizar en diferentes temas que capten tu interés.','imagen'=>'Aprendiz.png','imagen_espalda'=>'Espalda Aprendiz.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Analítico','descripcion'=>'Te gusta que las afirmaciones tengan pruebas: Cuando alguien sostiene algo, debe demostrarte 
            que es verdad. Usualmente, necesitas datos que den valor a las ideas. Te gusta entender cómo algunos modelos afectan a otros, cómo se combinan, cuáles son sus resultados 
            y cómo estos resultados encajan en la situación que enfrentas. Te gusta escarbar hasta encontrar la raíz: que las causas se revelen de manera lógica y rigurosa.',
            'imagen'=>'Analitico.png','imagen_espalda'=>'Espalda Analitico.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Investigador','descripcion'=>'Buscas información en diversas fuentes para comprender algo que no conoces. Eres perceptivo y 
            extraordinariamente observador, tu curiosidad es permanente y tu mente se encuentra alerta. Formulas preguntas adecuadas; te concentras y enfocas en lo que llama tu atención 
            y puedes predecir el desenlace de una cadena de eventos. Te gusta aprender y te entusiasma poseer conocimientos: puedes convertirte en experto en algún campo. Puedes desarrollar 
            ideas muy valiosas.','imagen'=>'Investigador.png','imagen_espalda'=>'Espalda Investigador.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Visual','descripcion'=>'Tienes facilidad para pensar en imágenes. Te resulta fácil transformar las ideas en imágenes.',
            'imagen'=>'Visual.png','imagen_espalda'=>'Espalda Visual.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Espacial','descripcion'=>'Imaginas figuras: puedes rotarlas y cambiarlas de posición mentalmente.','imagen'=>'Espacial.png','imagen_espalda'=>'Espalda Espacial.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Facilidad con los idiomas','descripcion'=>'Tienes facilidad para aprender nuevos idiomas. Cuando entras en 
            contacto con otro idioma, te resulta fácil entenderlo y/o hablarlo.','imagen'=>'Facilidad con los idiomas.png','imagen_espalda'=>'Espalda Facilidad con los idiomas.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Artístico','descripcion'=>'Disfrutas de lo bello, de aquello que es realizado con una noción estética.',
            'imagen'=>'Artistico.png','imagen_espalda'=>'Espalda Artistico.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Buen oído','descripcion'=>'Tienes facilidad para la música. Asimilas el ritmo de la música sin mayor complicación.','imagen'=>'Buen oido.png','imagen_espalda'=>'Espalda Buen oido.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Ciencias Naturales','descripcion'=>'Manejas con facilidad temas de biología, química o física.','imagen'=>'Ciencias naturales.png','imagen_espalda'=>'Espalda Ciencias naturales.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Estético','descripcion'=>'Disfrutas y aprecias la belleza.','imagen'=>'Estetico.png','imagen_espalda'=>'Espalda Estetico.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Motriz','descripcion'=>'Tienes facilidad para las actividades que requieren de motricidad fina.','imagen'=>'Motriz.png','imagen_espalda'=>'Espalda Motriz.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Deportivo','descripcion'=>'Tienes aptitud para diferentes tipos de deportes. Te gusta practicar diferentes disciplinas deportivas. 
            Te muestras interesado en las actividades físicas y en las competencias atléticas.','imagen'=>'Deportivo.png','imagen_espalda'=>'Espalda Deportivo.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Espiritualidad','descripcion'=>'Espiritualidad','imagen'=>'Espiritualidad.png','imagen_espalda'=>'Espalda Espiritualidad.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Gratitud','descripcion'=>'Gratitud','imagen'=>'Gratitud.png','imagen_espalda'=>'Espalda Gratitud.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Honestidad','descripcion'=>'Honestidad','imagen'=>'Honestidad.png','imagen_espalda'=>'Espalda Honestidad.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Humildad','descripcion'=>'Humildad','imagen'=>'Humildad.png','imagen_espalda'=>'Espalda Humildad.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Justicia','descripcion'=>'Justicia','imagen'=>'Justicia.png','imagen_espalda'=>'Espalda Justicia.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Lealtad','descripcion'=>'Lealtad','imagen'=>'Lealtad.png','imagen_espalda'=>'Espalda Lealtad.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Perdón','descripcion'=>'Perdón','imagen'=>'Perdon.png','imagen_espalda'=>'Espalda Perdon.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Prudencia','descripcion'=>'Prudencia','imagen'=>'Prudencia.png','imagen_espalda'=>'Espalda Prudencia.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Responsabilidad','descripcion'=>'Responsabilidad','imagen'=>'RESPONSABILIDAD SOCIAL.png','imagen_espalda'=>'Espalda RESPONSABILIDAD SOCIAL.png']
        ];

        Talento::insert($talentos);
    }
}
