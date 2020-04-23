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

        .text-secondary {
            color: #6c757d!important;
        }

        .mt{
            margin-top:400px;
        }

        .img-width{
            width:400px;
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

    </style>
    </head>
    <body>
        <div class="text-center">
            <h1 class="text-secondary">TEST DE INTERESES</h1>
         
          <div class="mt">
            <img class="img-width" src="{{ 'storage/logo_upc_red.png' }}" alt="">

            <h2 class="text-secondary">REPORTE DE RESULTADOS</h2>
            {{-- <h2 class="text-secondary">EVALUACIÓN DE <br> GUTIERREZ, LUIS <br> @php
                echo date('d-m-Y');
            @endphp </h2> --}}
            <h2 class="text-secondary">EVALUACIÓN DE <br> {{$persona->apellido_paterno}}, {{$persona->nombres}} <br> @php
                echo date('d-m-Y');
            @endphp </h2>
          </div>     
        </div>

        <table class="page_break">
            <thead>
                <tr>
                    <th rowspan="2">
                        ÁREA DE INTERÉS
                    </th>
                    <th>
                        Puntaje
                    </th>
                </tr>
                <tr>
                    <th>
                        PD
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puntajes as $p)
                    <tr>
                        <td class="text-center">
                            {{$p->carrera->nombre}}
                        </td>
                        <td class="text-justify p-2">
                            {{$p->puntaje}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>      

        @foreach ($puntajes as $p)
            <div>

            </div>
        @endforeach
        
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
        <div class="page_break">    
            <table>
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
                            <td class="text-center">
                                {{$c->nombre}}({{$c->siglas}})
                            </td>
                            <td class="text-justify p-2">
                                {{$c->interes}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>      
        </div>
    </body>
</html>