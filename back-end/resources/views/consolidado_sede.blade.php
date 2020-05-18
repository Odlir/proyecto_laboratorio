<!DOCTYPE html>
<html lang="es">
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <style>
               
            @page :first{    
                margin: 0;
                padding:0;
                margin-top: 60px;
            }
         
            @page{    
                margin: 60px;
                margin-top:110px;
            }

            body
            {           
                font-size: 13px;
            }

            *{
                font-family: 'Comfortaa', cursive!important;
            }

            .h1{
                font-size: 2em;
                margin: 0;
            }

            .h3{
                font-size: 1.17em;
                margin: 0;
            }

            .pad-doc
            {
                padding: 30px;
            }

            .p-0
            {
                padding: 0 !important;
            }
            
            .m-0
            {
                margin: 0 !important;
            }

            .text-center
            {
                text-align:center;
            }

            .text-justify
            {
                text-align: justify;
            }

            .w-100
            {
                width:100%;
            }

            .text-secondary {
                color: #404342 ;
            }

            .text-caratula{
                color: #585E5C;
            }

            .img-width{
                width:170px;
            }

            .page_break { 
                page-break-before: always; 
            }

            #header {
                position: fixed;
                top:-110px;
                margin-left:-80px;
                margin-right: -80px;
                width: 100%;
            }

            #header img {
                width: 50px;
            }

            .bg-dark {
                background-color: #343a40!important;
            }

            .text-white {
                color: #fff!important;
            }

            .py-3 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;
            }

            .px-0
            {
                padding-left: 0;
                padding-right: 0;
            }

            .mt-5
            {
                margin-top: 3rem !important;
            }

            .pt-5{
                padding-top: 3rem !important;
            }

            .titulo{
                font-size: 30px;
            }

            .subtitulo{
                font-size: 25px;
            }

            .h-footer{
                bottom: 0;
                position:absolute;
                height: 50px;
                width: 100%;
            }

            .mt-date{
                margin-top: 100px;
            }

            .text-right{
                text-align: right;
            }

            .ml-5
            {
                margin-left: 3rem !important;
            }

            .mr-5{
                margin-right: 3rem !important;
            }

            .font-weight-bold{
                font-weight: bold;
            }

            .top{
                position: relative;
                vertical-align: top;
            }

            .pr-2{
                padding-right: 0.5rem !important;
            }

            .margin-tr{
                border-spacing: 0px 8px;
            }

            .border{
                border: 4px solid;
            }

            .p-2{
                padding: 0.5rem !important;
            }

            .td-height{
                height:40px;
            }

            .font-10{
                font-size: 10px;
            }

            .d-inline-block{
                display: inline-block;
            }

            .break-avoid{
                page-break-inside: avoid;
            }

            .italic{
                font-style: italic;
            }

            .w-80{
                width: 80%;
            }

            .bg-sexo{
                background: #327DB2;
            }

            .bg-sexo2{
                background: #D8E5F8;
            }

            .bg-sexo3{
                background: #E5E9EE;
            }

            .mb-0{
                margin-bottom: 0!important;
            }
            
        </style>
    </head>
    
    <body>
        <div class="text-center text-caratula">
            <img class="img-width" src="{{ 'storage/logo_upc_red.png' }}" alt="">

            <div class="h1">
                <p>Universidad Peruana de Ciencias Aplicadas</p>
                <p>Coordinación de colegios</p>
            </div>
        
            <div class="bg-dark text-white py-3 px-0 mt-5 h1">
                <p>Dirección de Calidad Educativa</p>
            </div>
            <div class="pad-doc">
                <div class="h1">
                    <p>Informe Programa de Orientación Vocacional: “Yo Decido mi futuro”</p>
                </div>
                <div class="mt-5">
                    <p class="titulo">{{$colegio}}</p>
                    <p class="h1 mt-date">{{$date}}</p>
                </div>
            </div> 
            <div class="bg-dark h-footer bottom">
            </div>
        </div>

        <div class="page_break pt-5 text-secondary">
            <div>
                <p class="h3 font-weight-bold">
                    I. FICHA TÉCNICA:
                </p>
                <p>
                    Fecha de evaluación: <br>
                    {{$fecha_evaluacion}}
                </p>
            </div>

            <div class="mt-5 text-justify">
                <p class="h3 font-weight-bold">
                    II. INTRODUCCIÓN
                </p>
                <p>
                    El presente trabajo está basado en un modelo de psicología positiva. 
                    Esta nueva rama de la psicología se centra no solamente en arreglar 
                    lo que está mal, sino en estudiar las fortalezas que tienen las personas 
                    para lograr una mejor calidad de vida y bienestar.
                </p>
                <p>
                    En la actualidad, está científicamente comprobado que las personas que estudian y 
                    luego trabajan en sus talentos son más felices, motivadas, comprometidas y 
                    aportan al máximo su potencial (en López & Snyder, 2009). 
                </p>
                <p>
                    Sin embargo, la mayoría de alumnos que elige una carrera no toma en cuenta la compatibilidad 
                    entre esta y sus talentos. La Universidad Peruana de Ciencias Aplicadas (UPC) viene trabajando, 
                    desde hace más de cinco años, con la ciencia de la psicología positiva, que permite tomar en 
                    cuenta los talentos de los alumnos y los ayuda a conocerse mejor. De acuerdo con Seligman (1998), 
                    el tema fundamental de la psicología positiva es la búsqueda, el desarrollo y construcción de 
                    la expresión total del talento. 
                </p>

                <p class="h3 font-weight-bold">¿Qué es un talento?</p>

                <p>
                    El talento es una forma innata de pensar, sentir y comportarse, que puede aplicarse, 
                    productivamente, para obtener resultados positivos. Todas las personas son poseedoras 
                    de talentos; el problema es que la mayoría los desconoce (Clifton, Anderson & Schreiner, 2006). 
                    Se puede afirmar, luego de mucha investigación, que las personas más exitosas conocen sus talentos 
                    y construyen su vida en base a ellos (Gallup, 2009). 
                </p>
            </div>
        </div>

        <div class="page_break text-justify text-secondary">
            <p>
                El talento puede definirse como aquello que uno hace muy bien, 
                en lo que destaca por encima de los demás y que, además, genera placer. 
            </p>

            <p class="h3 font-weight-bold">
                El enfoque tradicional vs. el enfoque moderno 
            </p>

            <p>
                En el enfoque tradicional de la educación, los profesores, los padres y los propios alumnos se 
                enfocan en desarrollar sus debilidades y descuidan el desarrollo de sus talentos. Sin embargo, 
                es el desarrollo de talentos lo que sostiene el éxito de una persona (Buckingham, 2007; Gallup, 2009). 
            </p>

            <p>
                Resulta clave ayudar a los estudiantes a pensar en sus talentos, para que sepan emplearlos en el 
                aula y en su vida. La premisa es que se enfoquen en lo que hacen mejor y que solo dediquen esfuerzo 
                en llevar sus debilidades a una valla mínima (si un alumno, por ejemplo, es desordenado, en general, 
                no puede ser totalmente desordenado, debe alcanzar una valla mínima de orden para destacar con sus talentos). 
            </p>

            <p>
                La revolución de los talentos y fortalezas ha trascendido las 
                fronteras del ambiente académico y se aplica hoy en el contexto laboral: 
                muchas empresas buscan conocer los talentos de los empleados con mejores 
                desempeños y, de ese modo, fijar sus expectativas. 
            </p>

            <p>
                Tomando como base lo importante que es enfocarse en los talentos, la UPC ha ideado 
                una herramienta para ayudar a identificar los talentos. 
            </p>

            <p>
                Linley, Willars y Biswas-Diener (2010) brindan algunas pautas que ayudan a identificar 
                los propios talentos y fortalezas y los de los demás: 
            </p>

            <table class="w-100 text-justify text-secondary">
                <tr>
                    <td class="top">
                        a)
                    </td>
                    <td>
                        ¿Qué recuerdos de infancia tiene? Aquí, ayudaría que la persona piense en aquellas “cosas” que hacía bien cuando era niño y que continúa haciendo hasta ahora.
                    </td>
                </tr>
                <tr>
                    <td class="top">
                        b)
                    </td>
                    <td>
                        ¿Qué actividades lo dejan lleno de energía? Es decir, hay actividades que al realizarse, dejan fortalecido a quien las ejecuta. 
                    </td>
                </tr>
                <tr>
                    <td class="top">
                        c)
                    </td>
                    <td>
                        ¿Qué actividades le son fáciles, que cuando las hace, parecen muy naturales y no le cuesta tanto esfuerzo? Generalmente estas tienen que ver con los talentos y fortalezas. 
                    </td>
                </tr>
                <tr>
                    <td class="top">
                        d)
                    </td>
                    <td>
                        ¿A qué “cosas” le pone atención? Aquello a lo que le prestamos atención indica algo. 
                    </td>
                </tr>
            </table>
        </div>

        <div class="page_break text-justify text-secondary">
            <table class="w-100 text-justify text-secondary">
                <tr>
                    <td class="top">
                        e)
                    </td>
                    <td>
                        ¿Qué cosas aprendió a hacer rápidamente? A veces aprendemos cosas que sentimos que no nos toma ni tanto tiempo ni tanto esfuerzo..
                    </td>
                </tr>
                <tr>
                    <td class="top">
                        f)
                    </td>
                    <td>
                        ¿Qué le motiva? ¿Qué actividades hace por el gusto de hacerlas? Estas son actividades que le motivan intrínsecamente, esto es, por el placer de hacerlas.
                    </td>
                </tr>
                <tr>
                    <td class="top">
                        g)
                    </td>
                    <td>
                        ¿Cuál es el tono de voz que usa? Si cuando habla de algo, su voz se torna más enérgica y apasionada, probablemente esté hablando de sus fortalezas y talentos.
                    </td>
                </tr>
                <tr>
                    <td class="top">
                        h)
                    </td>
                    <td>
                        ¿Qué palabras y frases usa para contar acerca de algo? Elegir determinadas palabras indican también nuestras preferencias por algo. Por ejemplo, si usa: me sentí bien…, me encanta … probablemente la persona esté hablando de sus talentos y fortalezas.
                    </td>
                </tr>
            </table>

            <p>
                La UPC ha ideado una herramienta para identificar los talentos. A continuación se presentan las áreas a las que corresponden estos talentos, así como las descripciones de los talentos (más y menos desarrollados). 
            </p>

            <p>
                La denominación de las siete grandes áreas consideradas en la estructura de la Prueba de Talentos son: 
            </p>

            <table class="w-100">
                @foreach ($tendencias as $item)
                <tr>
                    <td class="top" width="4%">
                        {{$loop->index+1}}
                    </td>
                    <td width="96%">
                        {{$item->nombre}}
                    </td>
                </tr>  
                @endforeach
            </table>
        </div>

        <div class="page_break text-secondary">
            <p>
                A cada áreas considerada le corresponde un color. A continuación se presentan los talentos
                considerados al interior de cada una de las siete áreas:
            </p>

            <table class="w-100">
                <tr>
                    @foreach ($tendencias as $ten)
                    <td class="w-100 pr-2">
                        <table class="text-center margin-tr font-10">
                            <tr>
                                <td class="text-center border p-2" style="height:40px;border-color:{{$ten->color}}">
                                    {{$ten->nombre}}
                                </td>
                            </tr>
                            @foreach ($talentos as $tal)
                                @if ($tal->tendencia->id==$ten->id)
                                <tr>
                                    <td class="td-height text-white" style="background: {{$ten->color}}"> 
                                        {{$tal->nombre}}                      
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </table>   
                    </td>
                    @endforeach
                </tr>
            </table>
        </div>

        <div class="page_break text-justify text-secondary">
            <p>
                A continuación una breve descripción de cada área: 
            </p>

            @foreach ($tendencias as $ten)
            <div class="break-avoid">
                <p class="p-2 border d-inline-block" style="border-color:{{$ten->color}}">{{$ten->nombre}} ({{$ten->nombre_color}})
                <p>{{$ten->descripcion}}</p>
            </div>
            @endforeach
        </div>

        <div class="page_break text-justify text-secondary">
            <p class="h3 font-weight-bold">
                III. OBJETIVOS
            </p>
            <p>
                El objetivo principal de la aplicación de los instrumentos del presente trabajo es que los alumnos cuenten con 
                información sobre sus talentos dominantes, características del temperamento y preferencias vocacionales  que les 
                permita discriminar los roles donde puedan desempeñarse y los campos profesionales en los cuales aplicarlos y 
                desarrollar fortalezas. 
            </p>

            <p class="h3 font-weight-bold mt-5">
                IV. MUESTRA
            </p>
            <p>
                La muestra estuvo conformada por los alumnos que sí han resuelto las tres encuestas:
            </p>

            @php
                $total=0;
            @endphp

            @foreach ($muestra as $m)
                <span>
                    {{$m->muestra}}
                    @if ($m->muestra>1)
                        alumnos
                    @else
                        alumno
                    @endif

                    de la promoción
                    {{$m->anio}}
                </span> 
                <br>
                @php
                    $total= $total+$m->muestra;
                @endphp
            @endforeach

            <span>del Colegio: {{$colegio}}</span><br>

            <p>A continuación, se describirá la misma según género y edad:</p>

            <div>
                <span class="font-weight-bold italic">Tabla 1. Distribución de alumnos según Género</span><br><br>
                <table class="w-80 font-weight-bold text-center">
                    <thead class="text-white bg-sexo">
                        <tr>
                            <td>
                                GÉNERO
                            </td>
                            <td>
                                CANTIDAD
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-white bg-sexo">
                                MASCULINO
                            </td>
                            <td class="bg-sexo2">    
                                {{$sexo['masculino']}} 
                            </td>
                        </tr>
                        <tr>
                            <td class="text-white bg-sexo">
                                FEMENINO
                            </td>
                            <td class="bg-sexo3">
                                {{$sexo['femenino']}} 
                            </td>
                        </tr>
                        <tr>
                            <td class="text-white bg-sexo">
                                TOTAL
                            </td>
                            <td class="bg-sexo2">
                                {{$total}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="page_break text-justify text-secondary">
            <p class="h3 font-weight-bold mt-5">
                V. INSTRUMENTOS
            </p>
            <br>

            <p class="font-weight-bold h3 italic">
                - Evaluación de Preferencias del Temperamento
            </p>

            <p>
                El EPT fue desarrollado como una forma aplicativa de utilizar la teoría de la personalidad de 
                Carl Jung. Esta teoría menciona que la personalidad está regida por opuestos. Jung clasificó dos 
                tipos de opuestos, las actitudes que son Extroversión e Introversión y las funciones, Pensar, Sentir, 
                Intuir y Percibir (Viney y King, 2003). Dichas actitudes y funciones regulan cómo la persona va a actuar 
                en las diferentes situaciones de su vida. En ese caso, la persona tenía una de las dos actitudes y sobre la 
                base de una de ellas, operaban las cuatro funciones. Jung planteaba que una función primaba, mientras que las 
                otras actuaban como auxiliares y la función contraria a la que prima, actúa en raras ocasiones. 
            </p>

            <p>
                El EPT es un cuestionario que presenta 130 preguntas vinculadas a preferencias personales. 
                De acuerdo a la descripción de la pregunta, la persona responde a las preferencias que más se 
                asemejan a ella. En este proceso, menciona cuan de acuerdo o en desacuerdo está con las situaciones 
                que se le plantean. Todas las preguntas se responden en una escala Likert de acuerdo de 7 opciones. 
                El instrumento es de integra aplicación virtual.
            </p>

            <p class="font-weight-bold h3">
                Áreas del EPT 
            </p>

            <p>
                El EPT está compuesto por 4 grandes áreas, dichas áreas conforman facetas más pequeñas. 
                La colección de todas estas componen las áreas grandes previamente mencionadas. 
                A continuación, se mostrará un breve resumen de las cuatro áreas:  
            </p>

            <p class="font-weight-bold h3">
                EXTROVERSIÓN versus INTROVERSIÓN 
            </p>

            <p>
                Las personas con preferencias hacia la extraversión tienden a centrarse en el mundo exterior y el medio ambiente (Jung, 1933). Están más dirigidos hacia el afuera y por 
                ende su energía está dirigida hacia el exterior (Jung, 1964; Fordham, 1970). Estas personas prefieren relacionarse con los demás hablando y entablando conversaciones. 
                En sí, esta preferencia está primordialmente dirigida hacia la cantidad e intensidad de interacciones entre las personas (Avia y Sanchez, 1995). Por ello, ellas suelen ser 
                más conversadoras y les gusta tener varios y diversos grupos de amigos. Además, suelen compartir lo que sienten y piensan con varias personas y lo pueden hacer de manera muy 
                entusiasta y transmiten gran energía a los demás (Briggs, McCaulley Y Hammer, 1992). 
            </p>

            <p>
                Las personas con preferencias hacia la introversión están más enfocadas en su mundo interior (Jung, 1933), hacia la calma e incluso está 
                asociado con la timidez (Viney y King, 2003). Están más dirigidos hacia el interior y su energía está orientada hacia dentro (Jung, 1964; Fordham, 1970). 
                Por ello, prefieren actividades las cuales deben desempeñar sin la necesidad de relacionarse en demasía con el resto. 
            </p>
        </div>

        <div class="page_break text-justify text-secondary">
            <p>
                Prefieren primero comprender el mundo y pensar en este antes de hacer algún tipo de actividad (Briggs, McCaulley Y Hammer, 1992). 
            </p>

            <p>
                Por ello, prefieren ambientes más calmados, donde no haya mucha gente, ni ruido el cual les permite reflexionar sobre lo que ocurre alrededor de ellos. 
                Además, suelen tener pocos grupos de amigos lo cuales suelen ser muy cercanos. Estas personas no suelen compartir lo que piensan y sienten con mucha 
                gente sino solo con la gente con la que sienten una profunda confianza. Asimismo, estas personas transmiten gran calma cuando conversan con los demás.
            </p>

            <p>
                Aspectos evaluados:
            </p>

            <div class="text-center">
                <p>Sociable – Íntimo</p>
                <p>Comunicativo – Reservado</p>
                <p>Entusiasta – Calmado</p>
                <p>Ambientes dinámicos  - Ambientes tranquilos</p>
            </div>

            <br>

            <p class="font-weight-bold h3">
                INTUITIVO versus SENSORIAL 
            </p>

            <p>
                Las personas más orientadas hacia lo intuitivo se centran en los significados, alternativas y relaciones que van más 
                allá de los cinco sentidos. Las personas con esta preferencia tienen un enfoque más global de las cosas (Jacobi, 1963). 
                Además, tienden a valorar la imaginación, la inspiración y se concentran en buscar nuevas posibilidades y maneras de hacer 
                las cosas (Briggs, McCaulley Y Hammer, 1992). Por ello, estas personas suelen interesarse bastante por los conceptos y los 
                aspectos teóricos. Tienen interés en conocer qué hay detrás de lo práctico y aplicado, así les genera placer aprender la teoría 
                por el hecho de conocerla. Muchas veces, estas personas suelen ser originales y están a la búsqueda de su propio estilo más que 
                seguir lo convencional (Costa y Mcrae, 1992). Además, tienen un fuerte enfoque en crear ideas nuevas y cambiar lo ya establecido 
                mediante el uso de su creatividad. Por ello, pueden llegar a guiarse bastante de su intuición, no analizar tanto con hechos tangibles 
                sino en lo que perciben que es lo correcto y la mejor opción en base a lo que creen y a su experiencia (Viney y King, 2003).
            </p>

            <p>
                Las personas que están más orientadas hacia lo sensorial utilizan sus sentidos o habilidad sensorial para recabar información (Mischel, 1979). 
                Las personas con esta preferencia tienden a aceptar y trabajar con lo que está pasando en el presente, en otras palabras en el aquí y el ahora. 
                Por ello, suelen ser personas muy prácticas, realistas y con gran habilidad para recordar y trabajar con grandes cantidades de información (Briggs, McCaulley Y Hammer, 1992). 
                Por ello, estas personas suelen tener mayor interés en aplicar los conceptos que han aprendido y muestran gran interés en la implicación práctica. 
            </p>
        </div>

        <div class="page_break text-justify text-secondary">
            <p>
                Asimismo, se centran en los detalles, por lo que pueden en ciertos casos, ser sumamente minuciosos con las labores que realizan. En general, 
                estas personas suelen tener un estilo más tradicional de pensar y enfocar el mundo, se sienten cómodos con las convenciones sociales y lo que la sociedad ha establecido. 
                Al tomar una decisión prefieren hacerlo utilizando información que puede ser medida y verificada. 
            </p>

            <p>
                Aspectos evaluados:
            </p>

            <div class="text-center">
                <p>Instintivo – Escéptico</p>
                <p>Original – Tradicional</p>
                <p>Creativo – Realista</p>
            </div>

            <br>

            <p class="font-weight-bold h3">
                RACIONAL versus EMOCIONAL
            </p>

            <p>
                Las personas con preferencia hacia lo racional tienden a tomar decisiones en base a la razón. Se basan en las causas y en las posibles consecuencias que pueden traer 
                las decisiones que toman. Suelen analizar toda la información, tanto los factores positivos así como los negativos (Hjelle y Ziegler, 1992). Buscan una forma objetiva de 
                analizar la situación y se muestran hábiles para encontrar algo equivocado o malo en las situaciones que evalúan (Briggs, McCaulley Y Hammer, 1992). Al considerar la razón 
                como lo más importante, pueden mostrar un gran interés hacia encontrar la verdad objetiva y muchas veces, en su búsqueda, pueden dejar de lado lo que sienten los demás. 
                Por ello, no suelen tener dificultades expresando lo que piensan y lo hacen de manera directa, pues en sí, tienen un gran interés en decir las cosas tal cual son. 
                En general, su estilo racional o lógico puede hacer que los vean como personas mesuradas y hasta incluso distantes (Fadiman y Frager, 1979). Asimismo, estas personas pueden 
                conectarse emocionalmente con los demás, sin embargo ante una situación muy emotiva no suelen verse muy afectados ya que cuentan con la habilidad para guardar su distancia y 
                ver la situación emotiva de manera más objetiva y lógica. 
            </p>

            <p>
                Las personas con preferencia emotiva se basan más en las emociones para tomar decisiones. Se centran en lo que es importante para ellos mismos y 
                los demás y su razonamiento no se basa en la lógica para evaluar las situaciones (Jacobi, 1963). A las personas con preferencia emotiva les gusta tratar con los demás, son 
                comprensivas y pueden llegar a ser empáticas con las emociones de los otros. Estas personas toman decisiones en base a sus propios valores, las emociones y los sentimientos 
                (Briggs, McCaulley Y Hammer, 1992). 
            </p>
        </div>

        <div class="page_break text-justify text-secondary">
            <p>
                En ese caso, estas personas son vistas como conciliadoras, se centran mucho en que haya armonía dentro del grupo y en cómo se sienten las otras personas. Por ello, se enfocan en 
                fomentar un adecuado ambiente en donde las personas se sientan cómodas. Por esto, tienen gran facilidad en llevarse bien con las personas quienes los perciben como cálidos y con 
                una gran habilidad para ponerse en la posición que está viviendo la otra persona (McCrae, et al. 1996). Asimismo, tienen un fuerte interés en su propio sentir y en el de los demás 
                incluso en situaciones donde se requiere tomar decisiones de carácter más objetivo (Avia y Sanchez, 1995). Estas personas, al tener una preferencia emocional, ante situaciones donde 
                hay sentimientos de por medio, pueden identificarse tanto con el sentir del otro, que incluso podrían experimentar lo que siente el otro. Ello puede llevarlos a sentirse afectados por 
                la emoción que está sintiendo la otra persona.
            </p>

            <p>
                Aspectos evaluados:
            </p>

            <div class="text-center">
                <p>Objetivo – Compasivo</p>
                <p>Distante – Susceptible</p>
                <p>Directo – Empático</p>
            </div>

            <br>

            <p class="font-weight-bold h3">
                ORGANIZADO versus CASUAL
            </p>

            <p>
                Las personas con preferencia hacia lo organizado tienden a planear y desean en la medida de lo posible, organizar su vida. Estas personas gustan de tomar decisiones, prefieren 
                la estructura, la planificación y que las situaciones tengan un orden establecido (Fadiman y Frager, 1979). La preferencia hacia lo organizado se refiere a que las personas 
                prefieren mantener una estructura en su vida, la cual les permite vivir cómodamente (Briggs, McCaulley y Hammer, 1992). Por eso, son personas que realizan sus actividades con 
                bastante anticipación, planean con antelación alguna actividad. Para entregar un trabajo o hacer una labor arman un cronograma de tal manera que lleguen con calma a la fecha límite 
                y con todo el trabajo terminado. Estas personas suelen intentar tener la mayor cantidad posible de situaciones controladas por lo que no se sienten del todo cómodos cuando hacen muchos 
                cambios en sus rutinas o les cambian repetidas veces las actividades que ya organizaron (Rotter, 1966). Es por ello, que estas personas crean rutinas y las siguen, ya que sienten que les 
                permiten hacer todas las actividades que tienen interés en realizar. 
            </p>
        </div>

        <div class="page_break text-justify text-secondary">
            <p>
                Las personas con preferencia hacia lo casual gustan vivir de manera más flexible y evitar tener todo organizado y planificado. Estas personas prefieren dejar varias 
                opciones abiertas y se centran más en comprender la vida más que planificarla. Las personas casuales prefieren estar abiertos a las experiencias nuevas y disfrutan adaptarse y confían 
                en su capacidad para acomodarse a los diferentes momentos que enfrentan (Briggs, McCaulley Y Hammer, 1992). Por ello, estas personas están sumamente interesadas en ser espontáneas, mientras menos 
                cosas planeen, mejor ya que les gusta manejar sus tiempos de manera flexible. Esto les permite tener una gran habilidad para adaptarse a los cambios y acomodarse ante los imprevistos que puede haber 
                (Showers y Ziegler-Hill, 2012). En ese caso, estas personas tienen la sensación de que las rutinas pueden llegar a encasillarlas por lo que prefieren guiarse más de cómo se sienten en ese momento y 
                sobre la base de ello, toman la decisión de qué actividades realizar (Costa y McCrae, 1992). 
            </p>

            <p>
                Aspectos evaluados:
            </p>

            <div class="text-center">
                <p>Planificado – Espontáneo</p>
                <p>Metódico – Eventual</p>
                <p>Estructurado – Flexible</p>
            </div>

            <br>

            <p class="font-weight-bold h3 italic">
                - Test de Talentos
            </p>

            <p>
                El Test de Talentos es una herramienta que permite identificar los talentos  de un 
                individuo visto desde la perspectiva del modelo de la Psicología Positiva. Este instrumento se aplica 
                por Internet y  presenta 63 “tarjetas” de talentos , de los cuales la persona seleccionará los 12 talentos 
                más desarrollado y adicionalmente puede elegir hasta 3 talentos específicos como más desarrollados.
            </p>

            <p>
                Luego de aplicar el cuestionario, el participante recibe sus resultados en el que se le indica cuáles 
                son sus  talentos dominantes de un total de 63 talentos. A continuación, describiremos cada uno de ellos:
            </p>

            @foreach ($talentos_ordenados as $tal)
                <div class="break-avoid">
                    <p class="font-weight-bold h3">
                        {{$tal->nombre}}
                    </p>
                    <p style="margin-top: -1px;">
                        {{$tal->descripcion}}
                    </p>
                </div>
            @endforeach
            
            <div>
                <p class="h3 font-weight-bold mt-5">
                    VI. PROCEDIMIENTO
                </p>
    
                <p>
                    La evaluación se llevó a cabo con {{$total}} alumnos que han resuelto las tres encuestas.
                </p>
    
                <p>
                    El proceso se inició dividiendo a los alumnos por sus respectivas secciones en dos salas de laboratorio del colegio.
                </p>
    
                <p>
                    En la primera parte de la evaluación, el equipo de psicólogos evaluadores explicó a los alumnos, las instrucciones de acceso para la realización de cada uno de las pruebas virtuales. 
                </p>
    
                <p>
                    En dicha fecha, los alumnos se mostraron interesados y atentos ante las consignas brindadas por los evaluadores, realizando la prueba con concentración y rapidez. Las evaluaciones transcurrieron de manera fluida y sin ningún inconveniente.
                </p>
            </div>

            <div>
                <p class="h3 font-weight-bold mt-5">
                    VII. RESULTADOS
                </p>

                <p>
                    A continuación, se presentan los resultados encontrados. Estos están divididos en 
                    cuatro grandes bloques correspondientes a los cuatro instrumentos de evaluación. 
                </p>
    
                <p class="font-weight-bold h3">
                    Evaluación de Preferencias del Temperamento (EPT)
                </p>
    
                <p>
                    Las Tablas 3, 4, 5 y 6, presenta cuántos alumnos de la muestra total del colegio caen dentro de cada categoría para cada una de las dimensiones del EPT, 
                    así como el porcentaje (normal y acumulado) que esto representa dentro del grupo evaluado. 
                </p>
            </div>
        </div>

        <div id="header">
            <table class="w-100 bg-dark text-white">
                <tr>
                    <td>
                        <p class="subtitulo ml-5">Orientación Vocacional</p>
                    </td>
                    <td class="text-right">
                        <img class="mr-5" src="{{ 'storage/logo_upc_blanco.png' }}" alt="">
                    </td>
                </tr>
            </table>
        </div> 

        <div class="page_break text-justify text-secondary">
            hola mundo
        </div>

        <div id="header">
            <table class="w-100 bg-dark text-white">
                <tr>
                    <td>
                        <p class="subtitulo ml-5">Resultados de la Prueba de Temperamentos</p>
                    </td>
                    <td class="text-right">
                        <img class="mr-5" src="{{ 'storage/logo_upc_blanco.png' }}" alt="">
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>