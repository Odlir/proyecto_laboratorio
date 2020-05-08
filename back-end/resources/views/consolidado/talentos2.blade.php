<!DOCTYPE html>
<html lang="es">
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <style>
                   
            @page{    
                margin: 0px;
            }

            .pad-doc{
                margin:80px;
            }

            body
            {           
                font-size: 14px;
            }

            *{
                font-family: 'Comfortaa', cursive!important;
            }

            .h1{
                font-size: 2em;
                margin: 0!important;
            }

            .text-secondary {
                color: #404342 ;
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
                color: black;
                font-size: 15px;
                bottom: 10px;
            }

            table,tr,td{
                border: 1px solid;
            }

            .p-2{
                padding: 0.5rem !important;
            }

            .border{
                border: 4px solid;
            }

            .tabla-resultado{
                font-size: 11px;
            }

            .text-center{
                text-align: center;
            }

            .pr-2{
                padding-right: 0.5rem !important;
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
            <p>
                De acuerdo a la evaluación que completaste, te presentamos los talentos que tienes
                más desarrollados.
                Primero los veremos por categoría y luego a más detalle
            </p>

            <p class="text-secondary h1">2.3 Talentos más desarrollados por categorías</p>

            <div>

            </div>
        </div>

        {{-- <table class="tabla-resultado w-100">
            <tr>
                @foreach ($tendencias as $ten)
                <td class="pr-2">
                    <table>
                        <tr>
                            <td class="border p-2" style="width: 20px!important;border-color:{{$ten->color}}">
                                {{$ten->nombre}}
                            </td>
                        </tr>
                    </table>   
                </td>
            @endforeach
            </tr>
        </table>
        <span class="pad-doc">*En este gráfico, no se incluyen los talentos específicos ni las virtudes.</span> --}}
    </body>
</html>