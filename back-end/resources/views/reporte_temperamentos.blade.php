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
                padding: 35px;
                font-family: 'Verdana, Geneva, sans-serif';
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
                margin-top:180px;
            }

            .img-width{
                width:300px;
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

            /* table {
            border-collapse: collapse;
            } */
            
            .border{
                border: 1px solid;
            }

            /* th,td,tr{
                border: 1px solid;
            } */

            .p-3{
                padding: 1rem !important;
            }

            .p-2 {
                padding: 0.5rem !important;
            }

            .titulo{
                font-size: 35px;
            }

            .font-weight-bold{
                font-weight: bold;
            }

            .text-table{
                color: rgb(104,104,104);
            }

            .text-right{
                text-align: right;
            }

            #header {
                text-align: right;
                position: fixed;
                top:0px;
                left: 0;
                right: 20px;
                color: #aaa;
            }

            #header img {
                width: 60px;
            }

            #footer {
                text-align: right;
                position: fixed;
                left: 0;
                right: 20px;
                color: #aaa;
                font-size: 20px;
                bottom: 15px;
            }

            .page-number:before {
                content: counter(page);
            }

            .mt-persona{
                margin-top: 260px;
            }

            .border-bottom{
                border-bottom: 1px solid #6c757d!important;
            }
        </style>
    </head>
    <body>
        <div class="text-center">
            <h1 class="titulo text-secondary">Evaluación de las Preferencias del Temperamento (EPT)</h1>
         
          <div class="mt">
            <img class="img-width" src="{{ 'storage/logo_temperamentos.png' }}" alt="">

            <div class="mt-persona text-secondary">
                <h1>Informe preparado para</h1>
                <h1 class="mt-text">{{$persona->nombres}} {{$persona->apellido_paterno}} {{$persona->apellido_materno}}</h1>
                <h1 class="mt-text">@php
                    echo date('d-m-Y');
                @endphp</h1>
            </div>
          </div>     
        </div>

        <div class="page_break text-secondary">
            <h2 class="text-center"><span class="border-bottom">Tabla de contenidos</span></h2>    
            <br><br><br>
            <table class="w-100">
                <tr>
                    <td width="98%">
                        Descripción general de la evaluación de preferencias del Temperamento……………………………………………………………….
                    </td>
                    <td class="text-right" width="2%">
                        3
                    </td>
                </tr>
                <tr>
                    <td width="98%">
                        Resultados generales del EPT………………………………………………
                    </td>
                    <td class="text-right" width="2%">
                        6
                    </td>
                </tr>
                <tr>
                    <td width="98%">
                        Descripción general del perfil……..……………………………………..
                    </td>
                    <td class="text-right" width="2%">
                        7
                    </td>
                </tr>
                <tr>
                    <td width="98%">
                        Elementos de cada eje del temperamento........................................
                    </td>
                    <td class="text-right" width="2%">
                        8
                    </td>
                </tr>
                <tr>
                    <td width="98%">
                        Cómo leer los resultados de los elementos…………………………….
                    </td>
                    <td class="text-right" width="2%">
                        8
                    </td>
                </tr>
                <tr>
                    <td width="98%">
                        Descripción de las fortalezas………………………………………………
                    </td>
                    <td class="text-right" width="2%">
                        16
                    </td>
                </tr>
                <tr>
                    <td width="98%">
                        Referencias bibliográficas…………………………………………………
                    </td>
                    <td class="text-right" width="2%">
                        17
                    </td>
                </tr>
            </table>
        </div>

        <div id="header">
            <img src="{{ 'storage/logo_temperamentos.png' }}" alt="">
        </div>

        <div id="footer">
            <div class="page-number"></div>
        </div>
    </body>
</html>