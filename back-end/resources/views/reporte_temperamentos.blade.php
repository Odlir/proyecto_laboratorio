<!DOCTYPE html>
<html lang="es">
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">

        <meta charset="UTF-8">
        <style>

            @page{    
                margin: 0;
                padding:0;
                font-family: 'Comfortaa', cursive;
            }
            
            body
            {
                padding: 70px;         
            }

            .w-95{
                width:95%;
            }

            .w-5{
                width: 5%;
            }

            .text-center
            {
                text-align:center;
            }

            .text-justify
            {
                text-align: justify;
            }

            .img-fluid
            {
                width:100%;
            }

            .w-100
            {
                width:100%;
            }

            .text-secondary {
                color: #6c757d!important;
            }

            .mt{
                margin-top:180px;
            }

            .img-width{
                width:300px;
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

            .font-weight-bold{
                font-weight: bold;
            }

            .text-table{
                color: #404342 ;
            }

            .text-right{
                text-align: right;
            }

            #header {
                text-align: right;
                position: fixed;
                top:30px;
                left: 0;
                right: 50px;
            }

            #header img {
                width: 60px;
            }

            #footer {
                text-align: right;
                position: fixed;
                left: 0;
                right: 20px;
                color: #aaa;
                font-size: 20px;
                bottom: 15px;
            }

            .page-number:before {
                content: counter(page);
            }

            .mt-persona{
                margin-top: 220px;
            }

            .border-bottom{
                border-bottom: 1px solid #6c757d!important;
            }

            .text-caratula{
                color: #585E5C;
            }

            .mt-text{
                margin-bottom: 30px;
            }

            .mt-caratula
            {
                margin-top: 80px;
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

            .linea
            {   margin-left: -17px;
                width: 100%;
                height:10px;
                background: #6c757d;
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

            .p-rueda{
                border: 2.5px solid;
                margin-left: 33%;
                margin-right: 33%;
                padding-top: 18px;
                padding-bottom: 14px;
                font-size: 25px;
            }

            .table-temperamento{
                page-break-inside: avoid;
            }

            .table{
                padding-left: 20px;
                padding-right: 20px;
            }

            .barra_tabla{
                height: 220px;
                width: 8px;
                background: #6c757d;
                margin-left: -1px;
            }

            .barra{
                position: relative;
                width: 100%;
                background: red;
            }

            .height-graph
            {   
                height: 93px;
                margin: 10px;
            }

        </style>
    </head>
    <body>
        <div class="text-center text-caratula mt-caratula">
            <p class="titulo">Evaluación de las Preferencias del Temperamento (EPT)</p>
         
          <div class="mt">
            <img class="img-width" src="{{ 'storage/logo_temperamentos.png' }}" alt="">

            <div class="mt-persona">
                <p class="subtitulo mt-text">Informe preparado para</p>
                <p class="subtitulo mt-text">{{$persona->nombres}} {{$persona->apellido_paterno}} {{$persona->apellido_materno}}</p>
                <p class="subtitulo mt-text">@php
                    echo date('d-m-Y');
                @endphp</p>
            </div>
          </div>     
        </div>

        {{-- <div class="page_break text-secondary">
            <h2 class="text-center"><span class="border-bottom">Tabla de contenidos</span></h2>    
            <br><br><br>
            <table class="w-100">
                <tr>
                    <td width="98%">
                        Descripción general de la evaluación de preferencias del Temperamento……………………………………………………………….
                    </td>
                    <td class="text-right" width="2%">
                        3
                    </td>
                </tr>
                <tr>
                    <td width="98%">
                        Resultados generales del EPT………………………………………………
                    </td>
                    <td class="text-right" width="2%">
                        6
                    </td>
                </tr>
                <tr>
                    <td width="98%">
                        Descripción general del perfil……..……………………………………..
                    </td>
                    <td class="text-right" width="2%">
                        7
                    </td>
                </tr>
                <tr>
                    <td width="98%">
                        Elementos de cada eje del temperamento........................................
                    </td>
                    <td class="text-right" width="2%">
                        8
                    </td>
                </tr>
                <tr>
                    <td width="98%">
                        Cómo leer los resultados de los elementos…………………………….
                    </td>
                    <td class="text-right" width="2%">
                        8
                    </td>
                </tr>
                <tr>
                    <td width="98%">
                        Descripción de las fortalezas………………………………………………
                    </td>
                    <td class="text-right" width="2%">
                        16
                    </td>
                </tr>
                <tr>
                    <td width="98%">
                        Referencias bibliográficas…………………………………………………
                    </td>
                    <td class="text-right" width="2%">
                        17
                    </td>
                </tr>
            </table>
        </div> --}}

        <div class="page_break text-justify">
            <br>
            <h2 class="font-weight-bold text-secondary">TEST DE PREFERENCIAS DEL TEMPERAMENTO</h2>
            <div>
                <p>
                    El objetivo de este test es brindar información acerca de las características más
                    importantes de la personalidad. En primer lugar, encontrarás una descripción de los cuatro
                    ejes de personalidad que se trabajan en este test: a) Extrovertido –Introvertido, b) Intuitivo -
                    Sensorial, c) Racional -Emocional y d) Organizado-Casual. Posteriormente, te
                    presentaremos una descripción de los elementos que conforman a cada uno de estos ejes. 
                </p>
                <p>
                    Este instrumento, ha sido desarrollado como una forma aplicativa de utilizar la teoría de la
                    personalidad de Carl Jung. Los resultados te ayudarán a conocerte mejor, lo cual puede
                    favorecer tu interacción con el entorno social. 
                </p>
            </div>
        </div>

        <div id="header">
            <img src="{{ 'storage/logo_temperamentos.png' }}" alt="">
        </div>

        <div class="page_break">
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
                        <h2 class="font-weight-bold text-secondary">Descripción general del perfil:</h2>
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
                <h2 class="font-weight-bold text-secondary">Descripción de los Elementos</h2>
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
                        <h2 class="font-weight-bold text-secondary">Descripciones de los elementos del área {{$a->nombre}}</h2>
                    
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

        <div id="footer">
            <div class="page-number"></div>
        </div>
    </body>
</html>