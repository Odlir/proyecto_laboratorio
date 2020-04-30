<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <style>

        @page{    
            margin: 0;
            padding:0;
        }

        body
        {
            padding: 70px;
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

        table {
            border-collapse: collapse;
            border: 1px solid;
        }

        table tbody{
            font-size: 12px;
        }
        
        .border{
            border: 1px solid;
        }

        .table-areas th, .table-areas td, .table-areas tr{
            border: 1px solid;
        }

        .table-areas{
            font-size: 14px;
        }

        th{
            border-top: 1px solid;
            border-left: 1px solid;
            border-right: 1px solid;
        }

        td{
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
            height: 50px;
            margin-top: 4px;
            margin-bottom: 4px;
            margin-left: 5px;
            margin-right: 5px;
            background: #0386E1;
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
            color: rgb(104,104,104);
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
    </style>
    </head>
    <body>
        <div class="text-center">
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

        <table class="w-100 text-table page_break ">
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

        <br>
        
        <h1 class="text-secondary">DESCRIPCIÓN DE LAS ÁREAS</h1>    
        <table class="text-table table-areas">
            <thead>
                <tr>
                    <th class="my-1" colspan="2">
                        ÁREA
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carreras as $c)
                    <tr>
                        <td class="text-center font-weight-bold mx-1" width="30%">
                            {{$c->nombre}} ({{$c->siglas}})
                        </td>
                        <td class="text-justify p-2" width="70%">
                            {{$c->interes}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>      
    </body>
</html>