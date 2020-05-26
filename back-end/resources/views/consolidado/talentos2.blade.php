<!DOCTYPE html>
<html lang="es">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <style>
        @page {
            margin: 0px;
        }

        .pad-doc {
            margin: 80px;
        }

        body {
            font-size: 14px;
        }

        * {
            font-family: 'Comfortaa', cursive !important;
        }

        .h2 {
            font-size: 1.5em;
            margin: 0 !important;
        }

        .text-secondary {
            color: #404342;
        }

        .text-white {
            color: white;
        }

        #header {
            text-align: right;
            position: fixed;
            top: 40px;
            left: 0;
            right: 80px;
        }

        #header img {
            width: 50px;
        }

        #footer {
            text-align: right;
            position: fixed;
            left: 0;
            right: 80px;
            color: black;
            font-size: 15px;
            bottom: 80px;
        }

        .py-2 {
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
        }

        .py-3 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .border {
            border: 4px solid;
        }

        .tabla-resultado {
            margin-left: 15px;
            margin-right: 15px;
        }

        .text-center {
            text-align: center;
        }

        .font-11 {
            font-size: 11px;
        }

        .mt-1 {
            margin-top: 0.25rem !important;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .pie {
            width: 450px;
            height: 450px;
            margin-bottom: -50px;
        }

        .z-index {
            position: relative;
            z-index: 1;
        }

        .cuadrado {
            width: 8px;
            height: 8px;
        }

        .ml-4 {
            margin-left: 1.5rem !important;
        }

        .mb-1 {
            margin-bottom: 0.25rem !important;
        }

        .leyenda {
            font-size: 10px;
            margin-left: -80px;
        }
    </style>
</head>

<body>
    <div id="header">
        <img src="{{ 'storage/logo_upc_red.png' }}" alt="">
    </div>

    <div id="footer">
        12
    </div>

    <div class="pad-doc">
        <div class="z-index">
            <p>
                De acuerdo a la evaluación que completaste, te presentamos los talentos que tienes
                más desarrollados.
            </p>

            <p>
                Primero los veremos por categoría y luego a más detalle
            </p>
            <br><br>
            <p class="text-secondary h2">2.3 Talentos más desarrollados por categorías</p>
        </div>
        <table class="w-100 leyenda">
            <tr>
                <td>
                    <img src="{{$pie}}" class="pie">
                </td>
                <td>
                    @foreach ($tendencias as $ten)
                    <table class="ml-4 mb-1 ">
                        <tr>
                            <td>
                                <div class="cuadrado" style="background:{{$ten->color}}"></div>
                            </td>
                            <td>
                                &nbsp;{{$ten->nombre}}
                            </td>
                        </tr>
                    </table>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>

    <table class="tabla-resultado z-index">
        <tr>
            @foreach ($tendencias as $ten)
            <td>
                <table>
                    <tr>
                        <td class="border text-center py-2 font-11" style="border-color:{{$ten->color}}">
                            {{$ten->nombre}}
                        </td>
                    </tr>
                    <tr class="">
                        <td class="text-center py-3 font-11 mt-1 text-white" style="background:{{$ten->color}}">
                            @foreach ($puntajes as $item)
                            @if ($item->tendencia_id == $ten->id)
                            {{$item->puntaje}}%
                            @endif
                            @endforeach
                        </td>
                    </tr>
                </table>
            </td>
            @endforeach
        </tr>
    </table>
    <p class="pad-doc mt-5">*En este gráfico, no se incluyen los talentos específicos ni las virtudes.</p>
</body>

</html>