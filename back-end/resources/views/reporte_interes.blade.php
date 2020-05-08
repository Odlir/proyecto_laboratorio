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
            margin:0;    
            margin-top: 30px;
            padding:0;
        }     

        *{
            font-family: 'Comfortaa', cursive!important;
        }

        .h1{
            font-size: 2em;
            margin: 0!important;
        }

        .h2{
            font-size: 1.5em;
            margin: 0!important;
        }

        .h3{
            font-size: 1.17em;
            margin: 0!important;
        }

        .h4{
            font-size: 1em;
            margin: 0!important;
        }

        .h5{
            font-size: .83em;
            margin: 0!important;
        }

        #header {
            text-align: right;
            position: fixed;
            top:5px;
            left: 0;
            right: 40px;
        }

        #header img {
            width: 60px;
        }

        .m-0
        {
            margin: 0 !important;
        }

        body
        {
            padding: 70px;
            font-size: 14px;
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

        .mt{
            margin-top:110px;
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

        .mt-3 {
            margin-top: 1rem !important;
        }

        .mt-5{
            margin-top: 3rem !important;
        }

        .pt-4{
            padding-top: 1.5rem !important;
        }

        .mx-2
        {
            margin-left: 0.5rem !important;
            margin-right: 0.5rem !important;
        }

        .table-interes {
            border-collapse: collapse;
            border: 1px solid;
        }
        
        .border{
            border: 1px solid;
        }

        .table-interes th{
            border-top: 1px solid;
            border-left: 1px solid;
            border-right: 1px solid;
        }

        .table-interes td{
            border-left: 1px solid;
            border-right: 1px solid;
        }

        .p-2 {
            padding: 0.5rem !important;
        }

        .height-graph
        {
            height: 25px;
            margin-top: 4px;
            margin-bottom: 4px;
            margin-left: 5px;
            margin-right: 5px;
            background: red;
        }

        .titulo{
            font-size: 35px;
        }

        .mt-persona{
            margin-top: 70px;
        }

        .mt-text{
            margin-top: 5px;
        }

        /* .font-weight-bold{
            font-weight: bold;
        } */

        #footer {
        text-align: right;
        position: fixed;
        left: 0;
        right: 70px;
        color: black;
        font-size: 20px;
        bottom: 70px;
        }

        .page-number:before {
        content: counter(page);
        }

        .table-resultado{
            border-collapse: collapse;
        }

        .table-resultado thead{
            font-size: 19px;
        }

        .table-resultado th, .table-resultado td, .table-resultado tr{
            padding-left : 4px;
            padding-right : 4px;
            padding-top : 8px;
            padding-bottom : 8px;
            border: 1px solid;
        }
    </style>
    </head>
    <body>
        <div class="text-center font-weight-bold">
            <p class="titulo text-secondary h1">TEST DE INTERESES</p>
            <img class="img-width mt-5 pt-4" src="{{ 'storage/logo_upc_red.png' }}" alt="">
          <div class="mt">
            <p class="text-secondary h1">Reporte de resultados</p>

            <div class="mt-persona text-secondary">
                <p class="h1">Evaluación de</p>
                <p class="h1 mt-text">{{$persona->apellido_paterno}} {{$persona->apellido_materno}}, {{$persona->nombres}}</p>
                <p class="h1 mt-text" style="bottom: 0;position:absolute;margin-left:240px!important;">@php
                    echo date('d-m-Y');
                @endphp</p>
            </div>
          </div>     
        </div>

        <div id="footer">
            <div class="page-number"></div>
        </div>
        
        <div class="page_break text-justify">
            <p class="font-weight-bold text-secondary h2">TEST DE INTERESES PROFESIONALES</p>
            <div>
                <p>
                    Una de las decisiones más importantes en la vida de una persona, es la relacionada a la elección de la carrera a seguir, pues su sentido de producción y felicidad futuras,
                    dependerán de la satisfacción que logre frente a la actividad que realice en su vida.
                </p>
                <p>
                    El test de intereses, evalúa los intereses profesionales a partir de tres aspectos: a. 
                    El gusto que tendrías por realizar alguna actividad en tu vida profesional, b. Las habilidades que tienes para aprender a 
                    realizar esta actividad, y c. La satisfacción que crees que te brindaría realizar esta actividad como parte de tu profesión.
                </p>
                <p>
                    Este instrumento ha sido elaborado y estandarizado por la prestigiosa firma de
                    Effectus Fischman Consultores, contando con los criterios de validez y confiabilidad que el programa demanda.
                </p>
            </div>
            <div>
                Esta evaluación permite recoger información sobre sus principales intereses, tanto
                en referencia a las profesiones o carreras, así como las actividades que podría
                realizar en una carrera determinada.
            </div>
            <div class="mt-3">
                A continuación encontrarás un perfil de tus intereses profesionales, agrupado por
                áreas de acuerdo a tus respuestas del test.
            </div>
            <div class="mt-3">
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

        <div id="header">
            <img src="{{ 'storage/logo_upc_red.png' }}" alt="">
        </div>

        <div class="page_break">
            <p class="font-weight-bold text-secondary h2">Tabla general de áreas y valores.</p>
            <br>
            <table class="w-100 text-secondary table-interes">
                <thead class="text-center" style="font-weight:bold; font-size: 17px;">
                    <tr>
                        <td width="55%" rowspan="2">
                            ÁREA DE INTERÉS
                        </td>
                        <td width="45%" colspan="4">
                            Puntaje
                        </td>
                    </tr>
                    <tr>
                        <td width="13%">
                            Valor
                        </td>
                        <td width="29%">
                            Bajo 
                        </td>
                        <td width="29%">
                            Medio
                        </td>
                        <td width="29%">
                            Alto
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($puntajes as $p)
                        <tr>
                            <td class="font-weight-bold p-2">
                                {{$p->carrera->nombre}}
                            </td>
                            <td class="text-center p-2">
                                {{$p->puntaje}}
                            </td>
                            <td colspan="3">
                                <div class="height-graph" style="width: {{$p->puntaje}}%">
    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
        </div> 
        
        @php
            $show=false;
        @endphp

        @foreach ($puntajes_sort as $p)
            @if ($p->puntaje>=75)
                @php
                    $show=true;
                @endphp
            @endif          
        @endforeach

        <div class="page_break">
            <p class="font-weight-bold text-secondary h2">Tabla de resultados</p>
            <p>A continuación encontrarás las áreas de interés que más has desarrollado y las
                carreras asociadas:</p>

            @if ($show)
            <table class="w-100 text-secondary table-resultado">
                <thead class="font-weight-bold text-center">
                    <tr>
                        <td width="60%" colspan="2">
                            Área
                        </td>
                        <td width="60%">
                            Carreras Asociadas
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($puntajes_sort as $p)
                        @if ($p->puntaje>=75)
                        <tr>
                            <td width="30%" class="font-weight-bold text-center">
                                {{ $p->carrera->nombre }} 
                            </td>
                            <td width="70%" class="mx-2 text-justify">
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
            <p class="font-weight-bold ml-4 h3">No tiene áreas de alto interes.</p>
            @endif
             
            <br>

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