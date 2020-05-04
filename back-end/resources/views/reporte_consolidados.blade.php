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
                font-family: 'Comfortaa', cursive;
            }

            body
            {           
                font-size: 14px;
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

            .ml-5
            {
                margin-left: 3rem !important;
            }

            .ml-4
            {
                margin-left: 1.5rem !important;
            }

            .mt-2 {
                margin-top: 0.5rem !important;
            }

            .mx-2 {
                margin-right: 0.5rem !important;
                margin-left: 0.5rem !important;
            }

            .mt-3 {
                margin-top: 1rem !important;
            }

            .mt-4{
                margin-top: 1.5rem !important;
            }
            
            .border{
                border: 1px solid;
            }

            .p-3{
                padding: 1rem !important;
            }

            .p-2 {
                padding: 0.5rem !important;
            }

            .font-weight-bold{
                font-weight: bold;
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
                width: 60px;
            }

            #footer {
                text-align: right;
                position: fixed;
                left: 0;
                right: 10px;
                color: black;;
                font-size: 15px;
                bottom: 10px;
            }

            .page-number:before {
                content: counter(page);
            }

            .border-bottom{
                border-bottom: 1px solid #6c757d!important;
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
                margin-top: 120px;
            }

            .titulo{
                font-size: 35px;
                margin-top: -20px;
                font-weight:bolder;
            }

            .subtitulo{
                font-size: 30px;
                margin-top: -20px;
                font-weight:bolder;
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

            .w-20{
                width: 20%;
            }

            .h-100{
                height:100%;
            }

            .w-95{
                width:95%;
            }

            .w-5{
                width: 5%;
            }

            .mb-0 {
                margin-bottom:0 !important;
            }
        
            .mb-1 {
                margin-bottom: 0.25rem !important;
            }

            .height-graph
            {   
                height: 93px;
                margin: 10px;
            }

            .barra-interes
            {
                height: 25px;
                margin-top: 4px;
                margin-bottom: 4px;
                margin-left: 5px;
                margin-right: 5px;
                background: red;
            }

            .linea
            {   margin-left: -17px;
                width: 100%;
                height:10px;
                background: #6c757d;
            }

            .border-0 {
                border: 0!important;
            }

            .barra{
                position: relative;
                width: 100%;
                background: red;
            }

            .table-temperamento{
                page-break-inside: avoid;
            }

            .table-intereses{
                border-collapse: collapse;
                border: 1px solid;
                font-size: 15px;
            }

            .table-intereses th{
                border-top: 1px solid;
                border-left: 1px solid;
                border-right: 1px solid;
            }

            .table-intereses td{
                border-left: 1px solid;
                border-right: 1px solid;
            }

            .text-table{
                color: #404342 ;
            }

            .table-resultado{
                border-collapse: collapse;
            }

            .table-resultado thead{
                font-size: 19px;
            }

            .table-resultado tbody{
                font-size: 14px;
            }

            .table-resultado th, .table-resultado td, .table-resultado tr{
                padding-left : 4px;
                padding-right : 4px;
                padding-top : 8px;
                padding-bottom : 8px;
                border: 1px solid;
            }

            .float-right {
                float: right!important;
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
            <h2 class="font-weight-bold">Descripción general de las evaluaciones:</h2>
            <h3 class="ml-4 font-weight-bold mb-0">- Test de Preferencias del Temperamento</h3>
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

            <h3 class="ml-4 font-weight-bold mb-0">- Test de Talentos</h3>
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

            <h3 class="ml-4 font-weight-bold mb-0">- Test de Intereses Profesionales</h3>
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
            <h2 class="font-weight-bold text-secondary">I. TEST DE PREFERENCIAS DEL TEMPERAMENTO</h2>
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
                            <img class="rueda" src="{{ 'storage/ruedas/pruebas.png' }}"/>
                        </div>

                        <table class="table-letras">
                            <tr>
                                <td width="50%" class="bottom text-right">
                                    @foreach ($a_temperamentos as $a)
                                        @if ($a->area_id==1)
                                            @if (ctype_lower($a->letra))
                                                <img class="minuscula m-2" src="{{ 'storage/ruedas/minuscula/'.$a->letra.'.png' }}"/>     
                                            @else
                                                <img class="mayuscula m-2" src="{{ 'storage/ruedas/mayuscula/'.$a->letra.'.png' }}"/>     
                                            @endif
                                        @endif
                                    @endforeach                        
                                                                               
                                </td>
                                <td width="50%" class="bottom"> 
                                    @foreach ($a_temperamentos as $a)
                                        @if ($a->area_id==4)
                                            @if (ctype_lower($a->letra))
                                                <img class="minuscula m-2" src="{{ 'storage/ruedas/minuscula/'.$a->letra.'.png' }}"/>     
                                            @else
                                                <img class="mayuscula m-2" src="{{ 'storage/ruedas/mayuscula/'.$a->letra.'.png' }}"/>     
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
                                                <img class="minuscula m-2" src="{{ 'storage/ruedas/minuscula/'.$a->letra.'.png' }}"/>     
                                            @else
                                                <img class="mayuscula m-2" src="{{ 'storage/ruedas/mayuscula/'.$a->letra.'.png' }}"/>     
                                            @endif
                                        @endif
                                    @endforeach           
                                </td>
                                <td width="50%" class="top">
                                    @foreach ($a_temperamentos as $a)
                                        @if ($a->area_id==2)
                                            @if (ctype_lower($a->letra))
                                                <img class="minuscula m-2" src="{{ 'storage/ruedas/minuscula/'.$a->letra.'.png' }}"/>     
                                            @else
                                                <img class="mayuscula m-2" src="{{ 'storage/ruedas/mayuscula/'.$a->letra.'.png' }}"/>     
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
                        <h2 class="font-weight-bold text-secondary">1.1 Descripción general del perfil:</h2>
                        <h2 class="font-weight-bold text-secondary">@foreach ($a_temperamentos as $a)
                            {{$a->palabra}}
                        @endforeach @php
                            echo '('.$palabra.')';
                        @endphp</h2>
                        <p class="text-justify">
                            {{$descripcion}}
                        </p>
                   </div>
            </div>
            <br>
            <div>
                <h2 class="font-weight-bold text-secondary">1.2 Descripción de los Elementos</h2>
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
                        <h2 class="font-weight-bold text-secondary">1.2.{{$loop->index +1}} Descripciones de los elementos del área {{$a->nombre}}</h2>
                    
                        <table class="w-100 table text-secondary text-center table-temperamento">
                            <tr>
                                <th>
                                    @foreach ($a->items as $i)
                                        @if ($i->posicion == '1')
                                            <h3>{{$i->nombre }}</h3>
                                        @endif
                                    @endforeach 
                                </th>
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
                                <th>
                                    @foreach ($a->items as $i)
                                        @if ($i->posicion == '0')
                                            <h3>{{$i->nombre }}</h3> 
                                        @endif
                                    @endforeach 
                                </th>
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
                                        <h3 class="font-weight-bold">- {{$i->nombre}}</h3>
                                        <p class="text-justify">{{$i->descripcion}}</p>
                                    </div> 
                                    @endif
                                @endforeach
                            @endif

                            @if ($p->transformacion<0)
                                @foreach ($p->formula->items as $i)
                                    @if ($i->posicion=='0')
                                    <div class="table-temperamento">
                                        <h3 class="font-weight-bold">- {{$i->nombre}}</h3>
                                        <p class="text-justify">{{$i->descripcion}}</p>
                                    </div>                
                                    @endif
                                @endforeach
                            @endif  
                                    
                            @if ($p->transformacion==0)
                                <div class="table-temperamento">
                                    <h3 class="font-weight-bold">- {{$p->formula->nombre}}</h3>
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
            <h2 class="font-weight-bold text-secondary ml-4">III. TEST DE INTERESES PROFESIONALES</h2>
            <div class="text-justify">
                <p>Esta evaluación permite recoger información sobre sus principales intereses, tanto
                    en referencia a las profesiones o carreras, así como las actividades que podría
                    realizar en una carrera determinada.</p>

                <p>A continuación encontrarás un perfil de tus intereses profesionales, agrupado por
                    áreas de acuerdo a tus respuestas del test.</p>
            </div>

            <div class="mt-2 text-justify">
                <table class="text-justify">
                    <tr>
                        <td width="2%">
                            <p style="position:absolute;top:-17px;">•</p>
                        </td>
                        <td width="98%">
                            Áreas de alto interés. Son aquellas áreas en las que la puntuación se encuentra
                            por encima de 75, significa que tienes muy desarrollado este interés y sería
                            recomendable que la profesión que elijas se vincule a las carreras que estas
                            áreas incluyen.
                        </td>
                    </tr>
                    <tr>
                        <td width="2%">
                            <p style="position:absolute;top:-17px;">•</p>
                        </td>
                        <td width="98%">
                            Áreas de mediano interés. Son aquellas áreas con puntuaciones entre 26 y 75.
                            Significa que tu interés no es tan desarrollado hacia estas actividades. En este
                            caso es recomendable que explores más las actividades relacionadas con estas
                            áreas.
                        </td>
                    </tr>
                    <tr>
                        <td width="2%">
                            <p style="position:absolute;top:-17px;">•</p>
                        </td>
                        <td width="98%">
                            Áreas de bajo interés. Son aquellas áreas con puntuaciones de 25 o menos,
                            significa que no has desarrollado interés por este tipo de actividades.
                        </td>
                    </tr>
                </table>
            </div>

        </div>      
        
        <div class="page_break ">
            <h2 class="font-weight-bold text-table">3.1 Tabla general de áreas y valores.</h2>
            <table class="w-100 table-intereses text-table">
                <thead class="font-weight-bold">
                    <tr>
                        <th width="55%" rowspan="2">
                            ÁREA DE INTERÉS
                        </th>
                        <th width="45%" colspan="4">
                            Puntaje
                        </th>
                    </tr>
                    <tr>
                        <th width="13%">
                            Valor
                        </th>
                        <th width="29%">
                            Bajo 
                        </th>
                        <th width="29%">
                            Medio
                        </th>
                        <th width="29%">
                            Alto
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($p_intereses as $p)
                        <tr>
                            <td class="font-weight-bold p-2">
                                {{$p->carrera->nombre}}
                            </td>
                            <td class="text-center p-2">
                                {{$p->puntaje}}
                            </td>
                            <td colspan="3">
                                <div class="barra-interes" style="width: {{$p->puntaje}}%">
    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 

            @php
            $show=false;
            @endphp

            @foreach ($p_intereses as $p)
                @if ($p->puntaje>=75)
                    @php
                        $show=true;
                    @endphp
                @endif          
            @endforeach

            <h2 class="font-weight-bold text-table">3.2 Tabla de resultados</h2>
            <p>A continuación encontrarás las áreas de interés que más has desarrollado y las
                carreras asociadas:</p>

            @if ($show)
            <table class="w-100 text-table table-resultado">
                <thead class="font-weight-bold">
                    <tr>
                        <th width="60%" colspan="2">
                            Área
                        </th>
                        <th width="60%">
                            Carreras Asociadas
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($p_intereses as $p)
                        @if ($p->puntaje>=75)
                        <tr>
                            <td width="30%" class="font-weight-bold text-center">
                                {{ $p->carrera->nombre }} 
                            </td>
                            <td width="70%" class="text-justify mx-2">
                                {{ $p->carrera->interes }} 
                            </td>
                            <td class="text-center">
                                @foreach ($p->carrera->intereses as $i)
                                    @if ($i->carrera_id == $p->carrera->id)
                                        <p class="m-0">{{$i->nombre}}</p>
                                    @endif  
                                @endforeach
                            </td>
                        </tr> 
                        @endif          
                    @endforeach            
                </tbody>
            </table> 
            @else
            <h3 class="font-weight-bold ml-4">No tiene áreas de alto interes.</h3>     
            @endif

            <div style="page-break-inside: avoid;">
                <div class="text-justify">
                    <p>
                        El perfil de intereses profesionales te permite identificar carreras, tomando en
                        cuenta tus preferencias por realizar estas actividades, tu percepción de qué
                        puedes aprender al realizarlas y el beneficio que las mismas te podrían traer. 
                    </p>
                    <p>
                        Para mayor información sobre las carreras ingresa a: <a href="https://www.upc.edu.pe/">www.upc.edu.pe</a></p>
                    </p>
                </div>
    
                <table class="w-100 mt-5">
                    <tbody>
                        <tr>
                            <td width="50%">
                               
                            </td>
                            <td width="40%" class="float-right">
                                <p class="font-weight-bold text-center">Coordinación de Colegios <br>
                                    Programa “Yo decido mi futuro” <br>
                                    UPC</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>   
    </body>
</html>