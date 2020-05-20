<!DOCTYPE html>
<html lang="es">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <style>
        @page {
            margin: 60px;
            padding: 0;
            margin-bottom: 40px;
        }

        body {
            font-size: 14px;
        }

        * {
            font-family: 'Comfortaa', cursive !important;
        }

        .h1 {
            font-size: 2em;
            margin: 0 !important;
        }

        .text-secondary {
            color: #404342;
        }

        #header {
            text-align: right;
            position: fixed;
            top: -30px;
            left: 0;
            right: -20px;
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
            bottom: 20px;
        }

        .pr-2 {
            padding-right: 0.5rem !important;
        }

        .margin-tr {
            border-spacing: 0px 8px;
        }

        .text-white {
            color: #fff !important;
        }

        .p-2 {
            padding: 0.5rem !important;
        }

        .border {
            border: 4px solid;
        }

        table {
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        .table-height {
            height: 600px;
        }

        .bottom {
            position:absolute;
            bottom:90px;
        }
    </style>
</head>

<body>
    <div id="header">
        <img src="{{ 'storage/logo_upc_red.png' }}" alt="">
    </div>

    <div id="footer">
        13
    </div>

    <div>
        <p class="text-secondary h1 text-center">2.4 &nbsp;&nbsp;12 talentos más desarrollados y talentos específicos*
        </p>
    </div>

    <table class="table-height">
        <tr>
            @foreach ($tendencias as $ten)
            <td class="w-100 pr-2">
                <div class="bottom">
                    <table class="text-center margin-tr">
                        @foreach ($talentos as $item)
                        @if ($item->talento->tendencia_id==$ten->id)
                        <tr>
                            <td class="border p-2" style="border-color:{{$ten->color}}">{{$item->talento->nombre}}</td>
                        </tr>
                        @endif
                        @endforeach
                        @foreach ($talentos_e as $item)
                        @if ($item->talento->tendencia_id==$ten->id)
                        <tr>
                            <td class="border p-2" style="border-color:{{$ten->color}}">{{$item->talento->nombre}}</td>
                        </tr>
                        @endif
                        @endforeach
                        <tr>
                            <td class="border p-2" style="border-color:{{$ten->color}}">{{$ten->nombre}}</td>
                        </tr>
                    </table>
                </div>
            </td>
            @endforeach
        </tr>
    </table>

    <span>*En caso los hayas elegido en el test</span>
</body>

</html>