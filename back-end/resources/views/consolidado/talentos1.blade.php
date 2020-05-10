<!DOCTYPE html>
<html lang="es">
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <style>     
            @page{    
                margin:60px;
                padding:0;
                margin-bottom:40px;
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
                width:100%!important;
            }

            .text-secondary {
                color: #404342 ;
            }
    

            #header {
                text-align: right;
                position: fixed;
                top:-30px;
                left: 0;
                right: -20px;
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
                bottom: 20px;
            }


            .text-white {
                color: #fff!important;
            }

            .border{
                border: 4px solid;
            }

            table{
                width: 100%;
            }

            .td-height{
                height:40px;
            }

            .p-2{
                padding: 0.5rem !important;
            }

            .margin-tr{
                border-spacing: 0px 8px;
            }

            .pr-2{
                padding-right: 0.5rem !important;
            }

            table{
                padding: 0;
                margin: 0;
            }

            .mx-3 {
                margin-left: 1rem !important;
                margin-right: 1rem !important;
            }

            .mb-0{
                margin-bottom: 0;
            }
        </style>
    </head>
    <body>
        <div id="header">
            <img src="{{ 'storage/logo_upc_red.png' }}" alt="">
        </div>

        <div id="footer">
            11
        </div>

        <div class="text-center">
            <p class="h1 text-secondary">2.2 Talentos</p>        
        </div>
        <div>
            <p class="text-justify mx-3 mb-0">Tomando como base lo importante que es enfocarse en los talentos, la UPC ha desarrollado una herramienta para ayudar
                a identificar los talentos. A continuación se presenta un panorama de las categorías y de los talentos que se encuentran en
                cada una de ellas.</p>
        </div>

        <table>
            <tr>
                @foreach ($tendencias as $ten)
                <td class="w-100 pr-2">
                    <table class="text-center margin-tr">
                        <tr>
                            <td class="border p-2" style="border-color:{{$ten->color}}">{{$ten->nombre}}</td>
                        </tr>
                        @foreach ($talentos as $tal)
                            @if ($tal->tendencia->id==$ten->id)
                            <tr>
                                <td class="td-height text-white" style="background: {{$ten->color}}"> 
                                    {{$tal->nombre}}                      
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </table>   
                </td>
            @endforeach
            </tr>
        </table>
    </body>
</html>