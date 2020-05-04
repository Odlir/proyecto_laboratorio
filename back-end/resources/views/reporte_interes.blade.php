<!DOCTYPE html>
<html lang="es">
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap" rel="stylesheet">

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
            font-family: 'Comfortaa', cursive;
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
            font-size: 15px;
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
            margin-top:250px;
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

        .mt-3 {
            margin-top: 1rem !important;
        }

        .mt-4{
            margin-top: 1.5rem !important;
        }

        .my-1{
            margin-top: 0.25rem !important;
            margin-bottom: 0.25rem !important;
        }

        .mx-1
        {
            margin-left: 0.25rem !important;
            margin-right: 0.25rem !important;
        }

        .table-interes {
            border-collapse: collapse;
            border: 1px solid;
            font-size: 15px;
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

        .p-3{
            padding: 1rem !important;
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
            font-size: 45px;
        }

        .mt-persona{
            margin-top: 70px;
        }

        .mt-text{
            margin-top: 5px;
        }

        .font-weight-bold{
            font-weight: bold;
        }

        .text-table{
            color: #404342 ;
        }

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

        .caratula{
            font-family: 'Hammersmith One', sans-serif;
        }
    </style>
    </head>
    <body>
        <div class="text-center caratula">
            <h1 class="titulo text-secondary">Test de Intereses</h1>
         
          <div class="mt">
            <img class="img-width" src="{{ 'storage/logo_upc_red.png' }}" alt="">

            <br><br><br><br><br>
            <h1 class="text-secondary">Reporte de resultados</h1>

            <div class="mt-persona text-secondary">
                <h1>Evaluación de</h1>
                <h1 class="mt-text">{{$persona->apellido_paterno}} {{$persona->apellido_materno}}, {{$persona->nombres}}</h1>
                <h1 class="mt-text">@php
                    echo date('d-m-Y');
                @endphp</h1>
            </div>
          </div>     
        </div>

        <div id="footer">
            <div class="page-number"></div>
        </div>
        
        <div class="page_break text-justify">
            <h2 class="font-weight-bold text-secondary">TEST DE INTERESES PROFESIONALES</h2>
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
            <h2 class="font-weight-bold text-table">Tabla general de áreas y valores.</h2>

            <table class="w-100 text-table table-interes">
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

        @foreach ($puntajes as $p)
            @if ($p->puntaje>=75)
                @php
                    $show=true;
                @endphp
            @endif          
        @endforeach

        <div class="page_break">
            <h2 class="font-weight-bold text-table">Tabla de resultados</h2>
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
                    @foreach ($puntajes as $p)
                        @if ($p->puntaje>=75)
                        <tr>
                            <td width="30%" class="font-weight-bold text-center">
                                {{ $p->carrera->nombre }} 
                            </td>
                            <td width="70%" class="mx-2 text-center">
                                {{ $p->carrera->interes }} 
                            </td>
                            <td>
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
    
                <table class="w-100">
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