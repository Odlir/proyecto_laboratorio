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
                font-family: 'Verdana, Geneva, sans-serif';
            }

            .pad-doc
            {
                padding: 35px;
            }

            .p-0
            {
                padding: 0 !important;
            }

            
            .m-0
            {
                margin: 0 !important;
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
            
            .border{
                border: 1px solid;
            }

            .p-3{
                padding: 1rem !important;
            }

            .p-2 {
                padding: 0.5rem !important;
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

            .border-bottom{
                border-bottom: 1px solid #6c757d!important;
            }

            .bg-dark {
                background-color: #343a40!important;
            }

            .text-white {
                color: #fff!important;
            }

            .py-3 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;
            }

            .px-0
            {
                padding-left: 0;
                padding-right: 0;
            }

            .mt-5
            {
                margin-top: 3rem !important;
            }

            .mt-caratula
            {
                margin-top: 120px;
            }

            .titulo{
            font-size: 20px;
            margin-top: -20px;
            }
        </style>
    </head>
    <body>
        <div class="text-center text-secondary mt-caratula">
            <img class="img-width" src="{{ 'storage/logo_upc_red.png' }}" alt="">

            <div class="titulo">
                <h1>Programa de Orientación <br> Vocacional</h1>
                <h1>“Yo Decido mi futuro”</h1>
            </div>
        
            <div class="bg-dark text-white py-3 px-0 mt-5">
                <h1>Reporte de Resultados UPC</h1>
            </div>
          <div class="pad-doc">
            <div>
                <h1 class="m-0">Test de preferencias del Temperamentos</h1>
                <h1 class="m-0">Test de Talentos</h1>
                <h1 class="m-0">Test de Intereses</h1>
            </div>
            <br><br>
            <div>
                <h1>ALUMNO:</h1>
                <h1 class="mt-text">{{$persona->nombres}} {{$persona->apellido_paterno}} {{$persona->apellido_materno}}</h1>
                <h1 class="mt-text">@php
                    echo date('d-m-Y');
                @endphp</h1>
            </div>
          </div>     
        </div>
        
        <div class="page_break text-secondary pad-doc">
        
        </div>

        <div id="header">
            <img src="{{ 'storage/logo_temperamentos.png' }}" alt="">
        </div>

        <div id="footer">
            <div class="page-number"></div>
        </div>
    </body>
</html>