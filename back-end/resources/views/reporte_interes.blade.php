<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <style>

        body
        {
            padding: 40px;
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
            width:375px;
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

        table {
        border-collapse: collapse;
        }
        
        .border{
            border: 1px solid;
        }

        th,td,tr{
            border: 1px solid;
        }

        .p-3{
            padding: 1rem !important;
        }

        .p-2 {
            padding: 0.5rem !important;
        }

        .height-graph
        {
            display:inline-block;
            height: 60px;
            margin: 10px;
            background: rgb(2,0,36);
            background: -moz-linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(255,255,255,1) 0%, rgba(0,173,255,1) 100%);
            background: -webkit-linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(255,255,255,1) 0%, rgba(0,173,255,1) 100%);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(255,255,255,1) 0%, rgba(0,173,255,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#020024",endColorstr="#00adff",GradientType=1);
        }

        .titulo{
            font-size: 45px;
        }

        .mt-persona{
            margin-top: 15px;
        }

        .mt-text{
            margin-top: 5px;
        }

        .font-weight-bold{
            font-weight: bold;
        }

        .text-table{
            color: rgb(104,104,104);
        }
    </style>
    </head>
    <body>
        <script type="text/php">
            if (isset($pdf)) {
                $x = 250;
                $y = 10;
                $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
                $font = null;
                $size = 14;
                $color = array(255,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
                $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            }
        </script>
        <div class="text-center">
            <h1 class="titulo text-secondary">Test de Intereses</h1>
         
          <div class="mt">
            <img class="img-width" src="{{ 'storage/logo_upc_red.png' }}" alt="">

            <h1 class="text-secondary">Reporte de resultados</h1>

            <div class="mt-persona text-secondary">
                {{-- <h1 class="text-secondary">Evaluación de <br> <span class="mt-text">{{$persona->apellido_paterno}}</span>, {{$persona->nombres}} <br> 
                <span class="mt-text">@php
                    echo date('d-m-Y');
                @endphp</span>
                </h1> --}}
                <h1>Evaluación de</h1>
                <h1 class="mt-text">{{$persona->apellido_paterno}}, {{$persona->nombres}}</h1>
                <h1 class="mt-text">@php
                    echo date('d-m-Y');
                @endphp</h1>
            </div>
          </div>     
        </div>
        
        <div class="page_break">
            <div>
                En este informe te brindamos los resultados del Test de Intereses, que evaluó diecinueve
                áreas de intereses profesionales a partir de tres aspectos:
            </div>
            <div class="ml-4">
                <p>1. Tu gusto por realizar ciertas actividades vinculadas a estos intereses.</p>
                <p>2. La percepción de tu habilidad para desarrollarlas.</p>
                <p>3. La expectativa de los beneficios que te brindarían.</p>
            </div>
            <div class="mt-3">
                Encontrarás <B>un perfil de tus intereses profesionales</B>, de acuerdo a las respuestas que diste
                para las diecinueve áreas.
            </div>
            <div class="mt-3">
                <p>• Si la puntuación del área se encuentra <B>por encima de 37</B> significa que tienes muy
                    desarrollado este interés y sería recomendable que la profesión que elijas o estés
                    estudiando esté vinculada a las actividades que éste incluye.</p>
                <p>• Las puntuaciones <B>entre 13 y 37</B> indican áreas en las que tienes un interés mediano. Sería
                    bueno que explores más las actividades relacionadas con ésta área.</p>
                <p>• Si tu puntuación es de <B>12 o menos</B>, significa que no has desarrollado interés por este tipo
                    de actividades.</p>
            </div>
            <div class="mt-4">
                En la página siguiente, encontrarás tus puntuaciones en las diferentes áreas evaluadas. Para
                una mayor descripción de las áreas de interés, ver la última tabla.
            </div>
        </div>

        <table class="page_break w-100 text-table font-weight-bold">
            <thead>
                <tr>
                    <th width="40%" rowspan="2">
                        ÁREA DE INTERÉS
                    </th>
                    <th width="60%" colspan="5">
                        Puntaje
                    </th>
                </tr>
                <tr>
                    <th width="12%">
                        PD
                    </th>
                    <th width="21%">
                        Muy Bajo
                    </th>
                    <th width="21%">
                        Bajo
                    </th>
                    <th width="21%">
                        Alto
                    </th>
                    <th width="22%">
                        Muy Alto
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puntajes as $p)
                    <tr>
                        <td class="text-center">
                            {{$p->carrera->nombre}}
                        </td>
                        <td class="text-center p-2">
                            {{$p->puntaje}}
                        </td>
                        <td colspan="4">
                            <div class="height-graph" style="width: {{$p->puntaje}}%">

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>     


        <div class="page_break">
            <h1 class="text-secondary">DESCRIPCIÓN DE LAS ÁREAS</h1>    
            <table class="text-table">
                <thead>
                    <tr>
                        <th colspan="2">
                            ÁREA
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carreras as $c)
                        <tr>
                            <td class="text-center font-weight-bold" width="30%">
                                {{$c->nombre}}({{$c->siglas}})
                            </td>
                            <td class="text-justify p-2" width="70%">
                                {{$c->interes}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>      
        </div>
    </body>
</html>