<!DOCTYPE html>
<html lang="es">
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <style>
               
            @page :first{    
                margin: 0;
                padding:0;
            }
         
            @page{    
                margin: 80px;
            }

            body
            {           
                font-size: 14px;
            }

            *{
                font-family: 'Comfortaa', cursive!important;
            }

            .h2{
                font-size: 1.5em;
                margin: 0!important;
            }

            .h3{
                font-size: 1.17em;
                margin: 0!important;
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

            .ml-4
            {
                margin-left: 1.5rem !important;
            }
            
            .border{
                border: 1px solid;
            }

            .text-right{
                text-align: right;
            }

            #header {
                text-align: right;
                position: fixed;
                top:-60px;
                left: 0;
                right: -30px;
            }

            #header img {
                width: 50px;
            }

            #footer {
                text-align: right;
                position: fixed;
                left: 0;
                right: 10px;
                color: black;
                font-size: 15px;
                bottom: 10px;
            }

            .page-number:before {
                content: counter(page);
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

            .mt-caratula
            {
                margin-top: 60px;
            }

            .titulo{
                font-size: 35px;
                margin-top: -20px;
            }

            .subtitulo{
                font-size: 30px;
                margin-top: -20px;
            }

            .barra_tabla{
                height: 220px;
                width: 8px;
                background: #6c757d;
                margin-left: -1px;
            }

            .table{
                padding-left: 20px;
                padding-right: 20px;
            }

            .w-95{
                width:95%;
            }

            .w-5{
                width: 5%;
            }

            .height-graph
            {   
                height: 93px;
                margin: 10px;
            }

            .linea
            {   margin-left: -17px;
                width: 100%;
                height:10px;
                background: #6c757d;
            }

            .barra{
                position: relative;
                width: 100%;
                background: red;
            }

            .table-temperamento{
                page-break-inside: avoid;
            }

            .p-rueda{
                border: 2.5px solid;
                margin-left: 33%;
                margin-right: 33%;
                padding-top: 18px;
                padding-bottom: 14px;
                font-size: 25px;
            }

            .m-rueda{
                margin-left:-3px;
                margin-right: -3px;
            }

            .cont-rueda{
                width: 100%;
                text-align: center;
                position: absolute;
            }

            .rueda{
                width: 600px;
                height: 380px;
            }

            .minuscula{
                width:50px;
                height: 50px;
            }

            .mayuscula{
                width:100px;
                height:100px;
            }

            .table-letras{
                position: relative;
                z-index: 1;
                width: 100%;
                height: 380px;
            }

            .bottom{
                position: relative;
                vertical-align: bottom;
            }

            .top{
                position: relative;
                vertical-align: top;
            }

            .table-letras td{
                height: 190px;
            }

            .m-2{
                margin-left: 0.5rem !important;
                margin-right: 0.5rem !important;
                margin-top: 0.5rem !important;
                margin-bottom: 0.5rem !important;
            }

            .mb-0{
                margin-bottom: 0;
            }
        </style>
    </head>
    <body>
        <div class="text-center text-caratula mt-caratula">
            <img class="img-width" src="{{ 'storage/logo_upc_red.png' }}" alt="">

            <div class="titulo">
                <p>Programa de Orientación <br> Vocacional</p>
                <p>“Yo Decido mi futuro”</p>
            </div>
        
            <div class="bg-dark text-white py-3 px-0 mt-5 subtitulo">
                <p>Reporte de Resultados UPC</p>
            </div>
          <div class="pad-doc">
            <div class="subtitulo" style="margin-top:-10px;">
                <br>
                <p class="m-0">Test de Preferencias de Temperamentos</p>
                <p class="m-0">Test de Talentos</p>
                <p class="m-0">Test de Intereses</p>
            </div>
            <div class="subtitulo" style="margin-top:5px;">
                <p>Alumno:</p>
                <p>{{$persona->nombres}} {{$persona->apellido_paterno}} {{$persona->apellido_materno}}</p>
                <p>@php
                    echo date('d-m-Y');
                @endphp</p>
            </div>
          </div>     
        </div>

        <div class="page_break">
            <p class="font-weight-bold h2">Descripción general de las evaluaciones:</p>
            <br>
            <p class="ml-4 font-weight-bold mb-0 h3">- Test de Preferencias del Temperamento</p>
            <div class="text-justify">
                <p>El objetivo de este test es brindar información acerca de las características más
                    importantes de la personalidad. En primer lugar, encontrarás una descripción de los cuatro
                    ejes de personalidad que se trabajan en este test: a) Extrovertido –Introvertido, b) Intuitivo -
                    Sensorial, c) Racional -Emocional y d) Organizado-Casual. Posteriormente, te
                    presentaremos una descripción de los elementos que conforman a cada uno de estos ejes.
                    </p>
                <p>Este instrumento, ha sido desarrollado como una forma aplicativa de utilizar la teoría de la
                    personalidad de Carl Jung. Los resultados te ayudarán a conocerte mejor, lo cual puede
                    favorecer tu interacción con el entorno social.</p>
            </div>

            <p class="ml-4 font-weight-bold mb-0 h3">- Test de Talentos</p>
            <div class="text-justify">
                <p>El talento es una forma innata de pensar, sentir y comportarse, que puede aplicarse,
                    productivamente, para obtener resultados positivos. Todas las personas son poseedoras de
                    talentos; el problema es que la mayoría los desconoce. Se sabe, luego de mucha
                    investigación, que las personas más exitosas conocen sus talentos y construyen su vida en
                    base a ellos. Entonces, el talento puede definirse como aquello que uno hace muy bien, en
                    lo que destaca por encima de los demás y que, además, le genera placer.
                    </p>
                <p>
                    El test de Talentos, es una herramienta que permite identificar aquellos talentos, que con
                    esfuerzo y perseverancia, pueden llegar a convertirse en nuestras fortalezas o atributos que
                    nos hacen diferente de los demás en aquellas actividades que emprendamos o
                    realicemos.
                </p>
            </div>

            <p class="ml-4 font-weight-bold mb-0 h3">- Test de Intereses Profesionales</p>
            <div class="text-justify">
                <p>Una de las decisiones más importantes en la vida de una persona, es la relacionada a la
                    elección de la carrera a seguir, pues su sentido de producción y felicidad futuras,
                    dependerán de la satisfacción que logre frente a la actividad que realice en su vida.      
                </p>
                <p>
                    El test de intereses, evalúa los intereses profesionales a partir de tres aspectos: a. El gusto
                    que tendrías por realizar alguna actividad en tu vida profesional, b. Las habilidades que
                    tienes para aprender a realizar esta actividad, y c. La satisfacción que crees que te
                    brindaría realizar esta actividad como parte de tu profesión.
                </p>
                <p> 
                    Los tres instrumentos han sido elaborados y estandarizados por la prestigiosa firma de
                    Effectus Fischman Consultores, contando con los criterios de validez y confiabilidad que el
                    programa demanda.
                </p>
            </div>
        </div>

        <div id="header">
            <img src="{{ 'storage/logo_upc_red.png' }}" alt="">
        </div>

        <div id="footer">
            <div class="page-number"></div>
        </div>

        <div class="page_break">
            <p class="font-weight-bold text-secondary h2">I. TEST DE PREFERENCIAS DEL TEMPERAMENTO</p>
            <div>
                <p class="text-justify">A continuación presentamos una rueda con tus resultados y la preferencia del
                    temperamento que tienes en general. Aquí verás un perfil general de cómo eres tú. Este
                    perfil general está compuesto por letras mayúsculas y minúsculas. Las mayúsculas reflejan
                    las preferencias que más priman en ti y dirigen más tu forma de actuar. Por otro lado, las
                    minúsculas también influyen en cómo eres tú pero no reflejan preferencias tan marcadas
                    como las que aparecen en mayúsculas.</p>

                   <div>

                        @php
                            $palabra="";
                            $descripcion="";
                            foreach ($a_temperamentos as $item) {
                                $palabra = $palabra . $item->letra;
                            }

                            foreach ($ruedas as $r) {
                                if(strnatcasecmp($r->nombre, $palabra) == 0)
                                {
                                    $descripcion =  $r->descripcion;
                                }
                            }
                            
                        @endphp

                        <div class="cont-rueda">
                            <img class="rueda" src="{{ 'storage/ruedas/pruebas.jpg' }}"/>
                        </div>

                        <table class="table-letras">
                            <tr>
                                <td width="50%" class="bottom text-right">
                                    @foreach ($a_temperamentos as $a)
                                        @if ($a->area_id==1)
                                            @if (ctype_lower($a->letra))
                                                <img class="minuscula m-2" src="{{ 'storage/ruedas/minuscula/'.$a->letra.'.jpg' }}"/>     
                                            @else
                                                <img class="mayuscula m-2" src="{{ 'storage/ruedas/mayuscula/'.$a->letra.'.jpg' }}"/>     
                                            @endif
                                        @endif
                                    @endforeach                        
                                                                               
                                </td>
                                <td width="50%" class="bottom"> 
                                    @foreach ($a_temperamentos as $a)
                                        @if ($a->area_id==4)
                                            @if (ctype_lower($a->letra))
                                                <img class="minuscula m-2" src="{{ 'storage/ruedas/minuscula/'.$a->letra.'.jpg' }}"/>     
                                            @else
                                                <img class="mayuscula m-2" src="{{ 'storage/ruedas/mayuscula/'.$a->letra.'.jpg' }}"/>     
                                            @endif
                                        @endif
                                    @endforeach                
                                </td>                         
                            </tr>
                            <tr>
                                <td width="50%" class="top text-right">
                                    @foreach ($a_temperamentos as $a)
                                        @if ($a->area_id==3)
                                            @if (ctype_lower($a->letra))
                                                <img class="minuscula m-2" src="{{ 'storage/ruedas/minuscula/'.$a->letra.'.jpg' }}"/>     
                                            @else
                                                <img class="mayuscula m-2" src="{{ 'storage/ruedas/mayuscula/'.$a->letra.'.jpg' }}"/>     
                                            @endif
                                        @endif
                                    @endforeach           
                                </td>
                                <td width="50%" class="top">
                                    @foreach ($a_temperamentos as $a)
                                        @if ($a->area_id==2)
                                            @if (ctype_lower($a->letra))
                                                <img class="minuscula m-2" src="{{ 'storage/ruedas/minuscula/'.$a->letra.'.jpg' }}"/>     
                                            @else
                                                <img class="mayuscula m-2" src="{{ 'storage/ruedas/mayuscula/'.$a->letra.'.jpg' }}"/>     
                                            @endif
                                        @endif
                                    @endforeach     
                                </td>
                            </tr>
                        </table>

                        <div>
                            
                        </div>
                        
                        <br><br>
                        <div class="text-center w-100">
                            <div class="p-rueda">
                                @foreach ($a_temperamentos as $a)
                                @if ($a->area_id==1)
                                    <label class="m-rueda" style="color:#0A8DFF">{{$a->letra}}</label>
                                @endif

                                @if ($a->area_id==2)
                                    <label class="m-rueda" style="color:#FF9100">{{$a->letra}}</label>
                                @endif

                                @if ($a->area_id==3)
                                    <label class="m-rueda" style="color:#39AC00">{{$a->letra}}</label>
                                @endif

                                @if ($a->area_id==4)
                                    <label class="m-rueda" style="color:black">{{$a->letra}}</label>
                                @endif
                            @endforeach
                            </div>                 
                        </div>
                        <br>
                        <p class="font-weight-bold text-secondary h2">1.1 Descripción general del perfil:</p>
                        <p class="font-weight-bold text-secondary h2">@foreach ($a_temperamentos as $a)
                            {{$a->palabra}}
                        @endforeach @php
                            echo '('.$palabra.')';
                        @endphp</p>
                        <p class="text-justify">
                            {{$descripcion}}
                        </p>
                   </div>
            </div>
            <br>
            <div>
                <p class="font-weight-bold text-secondary h2">1.2 Descripción de los Elementos</p>
                <div class="text-justify">
                    <p>A continuación se presentan 4 gráficos de barras donde aparecen tus elementos
                        predominantes. La barra más alta representa el elemento que describe de manera más
                        precisa cómo eres tú, de acuerdo con tus respuestas.
                    </p>
                    <p>
                        En este gráfico de barras se muestran características específicas. Las barras pueden ir
                        hacia arriba o hacia abajo. Las barras hacia arriba expresan las características de las
                        personas extrovertidas, intuitivas, racionales y organizadas. Las barras hacia abajo
                        representan las características de las personas introvertidas, sensoriales, emocionales y
                        casuales.
                    </p>
                </div>
    
                @foreach ($areas as $a)
                <div>

                    <div class="table-temperamento">
                        <p class="font-weight-bold text-secondary h2">1.2.{{$loop->index +1}} Descripciones de los elementos del área {{$a->nombre}}</p>
                        <br>
                        <table class="w-100 table text-secondary text-center table-temperamento">
                            <tr>
                                <td>
                                    @foreach ($a->items as $i)
                                        @if ($i->posicion == '1')
                                            <p class="h3">{{$i->nombre }}</p>
                                        @endif
                                    @endforeach 
                                </td>
                                @foreach ($a->items as $a_i)
                                    @foreach ($a_i->items as $i_i)
                                        @if ($i_i->posicion=='1')
                                            <td width="120px;">{{$i_i->nombre}}</td>
                                        @endif
                                    @endforeach
                                @endforeach 
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <table class="text-secondary w-100">
                                        <tr class="w-100">
                                            <td class="w-95 text-right p-0">
                                                <p class="mb-2">3 -</p>
                                                <p class="mb-2">2 -</p>
                                                <p class="mb-2">1 -</p>
                                                <p class="mb-2">0 -</p>
                                                <p class="mb-2">1 -</p>
                                                <p class="mb-2">2 -</p>
                                                <p>3 -</p>
                                            </td>
                                            <td class="w-5 p-0">
                                                <div class="barra_tabla">
        
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                @foreach ($p_temperamentos as $p)
                                    @if ($a->id == $p->formula->area->id)
                                        <td class="p-0 m-0">
                                            <div class="height-graph">
                                                @if ($p->transformacion>0)
                                                    @php
                                                        $tamaño= (abs($p->transformacion)*31);
                                                        $top = 100 - $tamaño;
                                                    @endphp
                                                    <div class="barra"  style="height: {{$tamaño}}px;top:{{$top}}px">
                                                        
                                                    </div>
                                                @endif  
                                                
                                                @if ($p->transformacion==0)
                                                    <div class="barra"  style="height: 15px;top:85px;">
                                                        
                                                    </div>
                                                @endif 
                                            </div>
                                                                
                                            <div class="linea">
    
                                            </div>
    
                                            <div class="height-graph">
                                                @if ($p->transformacion<0)
                                                    @php
                                                        $tamaño= (abs($p->transformacion)*31);
                                                    @endphp
                                                    <div class="barra" style="height: {{$tamaño}}px;top:-7px;">
                                                        
                                                    </div>
                                                @endif
                                                @if ($p->transformacion==0)
                                                    <div class="barra"  style="height: 15px;top:-7px;">
                                                        
                                                    </div>
                                                @endif      
                                            </div>        
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr>
                                <td>
                                    @foreach ($a->items as $i)
                                        @if ($i->posicion == '0')
                                            <p class="h3">{{$i->nombre }}</p> 
                                        @endif
                                    @endforeach 
                                </td>
                                @foreach ($a->items as $a_i)
                                    @foreach ($a_i->items as $i_i)
                                        @if ($i_i->posicion=='0')
                                            <td>{{$i_i->nombre}}</td>
                                        @endif
                                    @endforeach
                                @endforeach 
                            </tr>
                        </table>
                    </div>

                    <br>
                    @foreach ($p_temperamentos as $p)
                        @if ($a->id == $p->formula->area->id)
                            @if ($p->transformacion>0)
                                @foreach ($p->formula->items as $i)
                                    @if ($i->posicion=='1')
                                    <div class="table-temperamento">
                                        <p class="font-weight-bold h3">- {{$i->nombre}}</p>
                                        <p class="text-justify">{{$i->descripcion}}</p>
                                    </div> 
                                    @endif
                                @endforeach
                            @endif

                            @if ($p->transformacion<0)
                                @foreach ($p->formula->items as $i)
                                    @if ($i->posicion=='0')
                                    <div class="table-temperamento">
                                        <p class="font-weight-bold h3">- {{$i->nombre}}</p>
                                        <p class="text-justify">{{$i->descripcion}}</p>
                                    </div>                
                                    @endif
                                @endforeach
                            @endif  
                                    
                            @if ($p->transformacion==0)
                                <div class="table-temperamento">
                                    <p class="font-weight-bold h3">- {{$p->formula->nombre}}</p>
                                    <p class="text-justify">{{$p->formula->descripcion}}</p>
                                </div>
                            @endif 
                        @endif
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>

        <div class="page_break">
            <p class="font-weight-bold text-secondary ml-4 h2">II. TEST DE TALENTOS</p>
            <div class="text-justify">
                <p>En la actualidad, está científicamente comprobado que las personas que estudian y
                    luego trabajan en sus talentos son más felices, motivadas, comprometidas y aportan
                    al máximo su potencial (Snyder & Shane, 2008).</p>

                <p>Sin embargo, la mayoría de alumnos que elige una carrera no toma en cuenta la
                    compatibilidad entre esta y sus talentos. La Universidad Peruana de Ciencias
                    Aplicadas (UPC) viene trabajando, desde hace más de cinco años, con la ciencia
                    de la psicología positiva, que permite tomar en cuenta los talentos de los alumnos y
                    los ayuda a conocerse mejor. De acuerdo con Seligman (1998), el tema fundamental
                    de la psicología positiva “es la búsqueda y la construcción de la expresión total del
                    gran talento”.</p>

                <p>El talento es una forma innata de pensar, sentir y comportarse, que puede aplicarse,
                    productivamente, para obtener resultados positivos. Todas las personas son
                    poseedoras de talentos; el problema es que la mayoría los desconoce (Clifton,
                    Anderson & Schreiner, 2006). Se puede afirmar, luego de mucha investigación, que
                    las personas más exitosas conocen sus talentos y construyen su vida en base a ellos
                    (Gallup, 2009).</p>

                <p>El talento puede definirse como aquello que uno hace muy bien, en lo que destaca
                    por encima de los demás y que, además, genera placer.</p>
            </div>

            <div>
                <p class="font-weight-bold text-secondary h2">2.1 El enfoque tradicional vs. el enfoque moderno</p>

                <p>
                    En el enfoque tradicional de la educación, los profesores, los padres y los propios
                    alumnos se enfocan en desarrollar sus debilidades y descuidan el desarrollo de sus
                    talentos. Sin embargo, es el desarrollo de talentos lo que sostiene el éxito de una
                    persona (Buckingham, 2007; Gallup, 2009).
                </p>
                <p>
                    Resulta clave ayudar a los estudiantes a pensar en sus talentos, para que sepan
                    emplearlos en el aula y en su vida. La premisa es que se enfoquen en lo que hacen
                    mejor y que solo dediquen esfuerzo en llevar sus debilidades a una valla mínima (si un
                    alumno, por ejemplo, es desordenado, en general, no puede ser totalmente
                    desordenado, debe alcanzar una valla mínima de orden para destacar con sus
                    talentos).
                </p>
                <p>
                    La revolución de los talentos y fortalezas ha trascendido las fronteras del ambiente
                    académico y se aplica hoy en el contexto laboral: muchas empresas buscan
                    conocer los talentos de los empleados con mejores desempeños y, de ese modo, fijar
                    sus expectativas.
                </p>
            </div>
        </div>

       
        </div>   
    </body>
</html>