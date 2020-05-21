<!DOCTYPE html>
<html lang="es">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <style>
        @page {
            margin: 80px;
        }

        body {
            font-size: 14px;
            counter-reset: page 13;
            counter-increment: page;
        }


        * {
            font-family: 'Comfortaa', cursive !important;
        }

        .h2 {
            font-size: 1.5em;
            margin: 0 !important;
        }

        .h3 {
            font-size: 1.17em;
            margin: 0 !important;
        }

        .m-0 {
            margin: 0 !important;
        }

        .text-center {
            text-align: center;
        }

        .text-justify {
            text-align: justify;
        }

        .w-100 {
            width: 100%;
        }

        .text-secondary {
            color: #404342;
        }

        .page_break {
            page-break-before: always;
        }

        .ml-4 {
            margin-left: 1.5rem !important;
        }

        .mt-2 {
            margin-top: 0.5rem !important;
        }

        .mx-2 {
            margin-right: 0.5rem !important;
            margin-left: 0.5rem !important;
        }

        .border {
            border: 1px solid;
        }

        .p-2 {
            padding: 0.5rem !important;
        }

        #header {
            text-align: right;
            position: fixed;
            top: -60px;
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

        .mt-5 {
            margin-top: 3rem !important;
        }

        .barra-interes {
            height: 25px;
            margin-top: 4px;
            margin-bottom: 4px;
            margin-left: 5px;
            margin-right: 5px;
            background: red;
        }

        .table-intereses {
            border-collapse: collapse;
            border: 1px solid;
            font-size: 15px;
        }

        .table-intereses th {
            border-top: 1px solid;
            border-left: 1px solid;
            border-right: 1px solid;
        }

        .table-intereses td {
            border-left: 1px solid;
            border-right: 1px solid;
        }

        .table-resultado {
            border-collapse: collapse;
        }

        .table-resultado thead {
            font-size: 19px;
        }

        .table-resultado th,
        .table-resultado td,
        .table-resultado tr {
            padding-left: 4px;
            padding-right: 4px;
            padding-top: 8px;
            padding-bottom: 8px;
            border: 1px solid;
        }

        .float-right {
            float: right !important;
        }

        .top {
            position: relative;
            vertical-align: top;
        }

        .span-color {
            color: #7F7E80;
            font-size: 25px;
            padding-top: 10px;
        }

        .border-table {
            /* margin-left: 55px;
            margin-right: 55px; */
            padding-top: 20px;
            padding-bottom: 20px;
            font-size: 16px;
        }

        .text-white {
            color: white;
        }

        .table-desarrollado {
            line-height: 10px;
        }

        .ml-5 {
            margin-left: 3rem !important;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }
    </style>
</head>

<body>
    <div id="header">
        <img src="{{ 'storage/logo_upc_red.png' }}" alt="">
    </div>

    <div id="footer">
        <div class="page-number"></div>
    </div>

    <div class="text-secondary">
        <p class="font-weight-bold h3 m-0">2.5 Descripción personal a través de tus talentos más
            desarrollados:</p>

        @foreach ($talentos as $item)
        <table class="w-100 mt-4">
            <tr>
                <td width="20%" class="text-center top">
                    <div class="border-table text-white" style="background:{{$item->talento->tendencia->color}}">
                        {{$item->talento->nombre}}
                    </div>
                </td>
                <td width="80%">
                    <table class="table-desarrollado ml-5">
                        @foreach ($item->talento->descripciones as $d)
                        <tr>
                            <td class="span-color">
                                •
                            </td>
                            <td class="text-justify">
                                {{$d->descripcion}}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>
        @endforeach
    </div>

    <div class="page_break">
        <p class="font-weight-bold text-secondary ml-4 h2">III. TEST DE INTERESES PROFESIONALES</p>
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

    <div class="page_break">
        <p class="font-weight-bold text-secondary h2">3.1 Tabla general de áreas y valores.</p>
        <br>
        <table class="w-100 table-intereses text-secondary">
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
    </div>

    <div class="page_break">
        <p class="font-weight-bold text-secondary h2">3.2 Tabla de resultados</p>
        <p>A continuación encontrarás las áreas de interés que más has desarrollado y las
            carreras asociadas:</p>

        @if ($show)
        <table class="w-100 text-secondary table-resultado">
            <thead class="font-weight-bold">
                <tr>
                    <td width="60%" colspan="2" class="text-center">
                        Área
                    </td>
                    <td width="60%" class="text-center">
                        Carreras Asociadas
                    </td>
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
        <p class="font-weight-bold ml-4 h3">No tiene áreas de alto interes.</p>
        @endif

        <div style="page-break-inside: avoid;">
            <div class="text-justify">
                <p>
                    El perfil de intereses profesionales te permite identificar carreras, tomando en
                    cuenta tus preferencias por realizar estas actividades, tu percepción de qué
                    puedes aprender al realizarlas y el beneficio que las mismas te podrían traer.
                </p>
                <p>
                    Para mayor información sobre las carreras ingresa a: <a
                        href="https://www.upc.edu.pe/">www.upc.edu.pe</a></p>
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