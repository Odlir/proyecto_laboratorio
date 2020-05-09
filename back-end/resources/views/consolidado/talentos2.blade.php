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

            .text-white {
                color: white;
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

            .py-2{
                padding-top: 0.5rem !important;
                padding-bottom: 0.5rem !important;
            }

            .py-3{
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;
            }

            .border{
                border: 4px solid;
            }

            .tabla-resultado{
                margin-left: 15px;
                margin-right: 15px;
            }

            .text-center{
                text-align: center;
            }

            .font-11{
                font-size: 11px;
            }

            .mt-1{
                margin-top: 0.25rem!important;
            }

            .mt-5{
                margin-top: 3rem !important;
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

            <div style="height:300px;">

            </div>
        </div>

        <table class="tabla-resultado">
            <tr>
                @foreach ($tendencias as $ten)
                @if ($ten->id!=7)
                <td>
                    <table>
                        <tr>
                            <td class="border text-center py-2 font-11" style="border-color:{{$ten->color}}">
                                {{$ten->nombre}}            
                            </td>          
                        </tr>
                        <tr class="">
                            <td class="text-center py-3 font-11 mt-1 text-white" style="background:{{$ten->color}}">
                                %    
                            </td>
                        </tr>
                    </table>   
                </td>
                @endif
            @endforeach
            </tr>
        </table>
        <p class="pad-doc mt-5">*En este gráfico, no se incluyen los talentos específicos ni las virtudes.</p>
    </body>
</html>