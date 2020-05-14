<!DOCTYPE html>
<html lang="es">
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <style>
               
            @page :first{    
                margin: 0;
                padding:0;
                margin-top: 60px;
            }
         
            @page{    
                margin: 60px;
                margin-top:110px;
            }

            body
            {           
                font-size: 13px;
            }

            *{
                font-family: 'Comfortaa', cursive!important;
            }

            .h1{
                font-size: 2em;
                margin: 0;
            }

            .h3{
                font-size: 1.17em;
                margin: 0;
            }

            .pad-doc
            {
                padding: 30px;
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

            .w-100
            {
                width:100%;
            }

            .text-secondary {
                color: #404342 ;
            }

            .text-caratula{
                color: #585E5C;
            }

            .img-width{
                width:170px;
            }

            .page_break { 
                page-break-before: always; 
            }

            #header {
                position: fixed;
                top:-110px;
                margin-left:-80px;
                margin-right: -80px;
                width: 100%;
            }

            #header img {
                width: 50px;
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

            .pt-5{
                padding-top: 3rem !important;
            }

            .titulo{
                font-size: 30px;
            }

            .h-footer{
                bottom: 0;
                position:absolute;
                height: 50px;
                width: 100%;
            }

            .mt-date{
                margin-top: 100px;
            }

            .text-right{
                text-align: right;
            }

            .ml-5
            {
                margin-left: 3rem !important;
            }

            .mr-5{
                margin-right: 3rem !important;
            }

            .font-weight-bold{
                font-weight: bold;
            }

            .top{
                position: relative;
                vertical-align: top;
            }

            .pr-2{
                padding-right: 0.5rem !important;
            }

            .margin-tr{
                border-spacing: 0px 8px;
            }

            .border{
                border: 4px solid;
            }

            .p-2{
                padding: 0.5rem !important;
            }

            .td-height{
                height:40px;
            }

            .font-10{
                font-size: 10px;
            }

            .d-inline-block{
                display: inline-block;
            }

            .break-avoid{
                page-break-inside: avoid;
            }
        </style>
    </head>
    
    <body>
        <div class="text-center text-caratula">
            <img class="img-width" src="{{ 'storage/logo_upc_red.png' }}" alt="">

            <div class="h1">
                <p>Universidad Peruana de Ciencias Aplicadas</p>
                <p>Coordinación de colegios</p>
            </div>
        
            <div class="bg-dark text-white py-3 px-0 mt-5 h1">
                <p>Dirección de Calidad Educativa</p>
            </div>
            <div class="pad-doc">
                <div class="h1">
                    <p>Informe Programa de Orientación Vocacional: “Yo Decido mi futuro”</p>
                </div>
                <div class="mt-5">
                    <p class="titulo">{{$colegio}}</p>
                    <p class="h1 mt-date">{{$date}}</p>
                </div>
            </div> 
            <div class="bg-dark h-footer bottom">
            </div>
        </div>

        <div class="page_break pt-5 text-secondary">
            <div>
                <p class="h3 font-weight-bold">
                    I. FICHA TÉCNICA:
                </p>
                <p>
                    Fecha de evaluación: <br>
                    {{$fecha_evaluacion}}
                </p>
            </div>

            <div class="mt-5 text-justify">
                <p class="h3 font-weight-bold">
                    II. INTRODUCCIÓN
                </p>
                <p>
                    El presente trabajo está basado en un modelo de psicología positiva. 
                    Esta nueva rama de la psicología se centra no solamente en arreglar 
                    lo que está mal, sino en estudiar las fortalezas que tienen las personas 
                    para lograr una mejor calidad de vida y bienestar.
                </p>
                <p>
                    En la actualidad, está científicamente comprobado que las personas que estudian y 
                    luego trabajan en sus talentos son más felices, motivadas, comprometidas y 
                    aportan al máximo su potencial (en López & Snyder, 2009). 
                </p>
                <p>
                    Sin embargo, la mayoría de alumnos que elige una carrera no toma en cuenta la compatibilidad 
                    entre esta y sus talentos. La Universidad Peruana de Ciencias Aplicadas (UPC) viene trabajando, 
                    desde hace más de cinco años, con la ciencia de la psicología positiva, que permite tomar en 
                    cuenta los talentos de los alumnos y los ayuda a conocerse mejor. De acuerdo con Seligman (1998), 
                    el tema fundamental de la psicología positiva es la búsqueda, el desarrollo y construcción de 
                    la expresión total del talento. 
                </p>

                <p class="h3 font-weight-bold">¿Qué es un talento?</p>

                <p>
                    El talento es una forma innata de pensar, sentir y comportarse, que puede aplicarse, 
                    productivamente, para obtener resultados positivos. Todas las personas son poseedoras 
                    de talentos; el problema es que la mayoría los desconoce (Clifton, Anderson & Schreiner, 2006). 
                    Se puede afirmar, luego de mucha investigación, que las personas más exitosas conocen sus talentos 
                    y construyen su vida en base a ellos (Gallup, 2009). 
                </p>
            </div>
        </div>

        <div id="header">
            <table class="w-100 bg-dark text-white">
                <tr>
                    <td>
                        <p class="titulo ml-5">Orientación Vocacional</p>
                    </td>
                    <td class="text-right">
                        <img class="mr-5" src="{{ 'storage/logo_upc_blanco.png' }}" alt="">
                    </td>
                </tr>
            </table>
        </div> 

        <div class="page_break text-justify text-secondary">
            <p>
                El talento puede definirse como aquello que uno hace muy bien, 
                en lo que destaca por encima de los demás y que, además, genera placer. 
            </p>

            <p class="h3 font-weight-bold">
                El enfoque tradicional vs. el enfoque moderno 
            </p>

            <p>
                En el enfoque tradicional de la educación, los profesores, los padres y los propios alumnos se 
                enfocan en desarrollar sus debilidades y descuidan el desarrollo de sus talentos. Sin embargo, 
                es el desarrollo de talentos lo que sostiene el éxito de una persona (Buckingham, 2007; Gallup, 2009). 
            </p>

            <p>
                Resulta clave ayudar a los estudiantes a pensar en sus talentos, para que sepan emplearlos en el 
                aula y en su vida. La premisa es que se enfoquen en lo que hacen mejor y que solo dediquen esfuerzo 
                en llevar sus debilidades a una valla mínima (si un alumno, por ejemplo, es desordenado, en general, 
                no puede ser totalmente desordenado, debe alcanzar una valla mínima de orden para destacar con sus talentos). 
            </p>

            <p>
                La revolución de los talentos y fortalezas ha trascendido las 
                fronteras del ambiente académico y se aplica hoy en el contexto laboral: 
                muchas empresas buscan conocer los talentos de los empleados con mejores 
                desempeños y, de ese modo, fijar sus expectativas. 
            </p>

            <p>
                Tomando como base lo importante que es enfocarse en los talentos, la UPC ha ideado 
                una herramienta para ayudar a identificar los talentos. 
            </p>

            <p>
                Linley, Willars y Biswas-Diener (2010) brindan algunas pautas que ayudan a identificar 
                los propios talentos y fortalezas y los de los demás: 
            </p>

            <table class="w-100 text-justify text-secondary">
                <tr>
                    <td class="top">
                        a)
                    </td>
                    <td>
                        ¿Qué recuerdos de infancia tiene? Aquí, ayudaría que la persona piense en aquellas “cosas” que hacía bien cuando era niño y que continúa haciendo hasta ahora.
                    </td>
                </tr>
                <tr>
                    <td class="top">
                        b)
                    </td>
                    <td>
                        ¿Qué actividades lo dejan lleno de energía? Es decir, hay actividades que al realizarse, dejan fortalecido a quien las ejecuta. 
                    </td>
                </tr>
                <tr>
                    <td class="top">
                        c)
                    </td>
                    <td>
                        ¿Qué actividades le son fáciles, que cuando las hace, parecen muy naturales y no le cuesta tanto esfuerzo? Generalmente estas tienen que ver con los talentos y fortalezas. 
                    </td>
                </tr>
                <tr>
                    <td class="top">
                        d)
                    </td>
                    <td>
                        ¿A qué “cosas” le pone atención? Aquello a lo que le prestamos atención indica algo. 
                    </td>
                </tr>
            </table>
        </div>

        <div class="page_break text-justify text-secondary">
            <table class="w-100 text-justify text-secondary">
                <tr>
                    <td class="top">
                        e)
                    </td>
                    <td>
                        ¿Qué cosas aprendió a hacer rápidamente? A veces aprendemos cosas que sentimos que no nos toma ni tanto tiempo ni tanto esfuerzo..
                    </td>
                </tr>
                <tr>
                    <td class="top">
                        f)
                    </td>
                    <td>
                        ¿Qué le motiva? ¿Qué actividades hace por el gusto de hacerlas? Estas son actividades que le motivan intrínsecamente, esto es, por el placer de hacerlas.
                    </td>
                </tr>
                <tr>
                    <td class="top">
                        g)
                    </td>
                    <td>
                        ¿Cuál es el tono de voz que usa? Si cuando habla de algo, su voz se torna más enérgica y apasionada, probablemente esté hablando de sus fortalezas y talentos.
                    </td>
                </tr>
                <tr>
                    <td class="top">
                        h)
                    </td>
                    <td>
                        ¿Qué palabras y frases usa para contar acerca de algo? Elegir determinadas palabras indican también nuestras preferencias por algo. Por ejemplo, si usa: me sentí bien…, me encanta … probablemente la persona esté hablando de sus talentos y fortalezas.
                    </td>
                </tr>
            </table>

            <p>
                La UPC ha ideado una herramienta para identificar los talentos. A continuación se presentan las áreas a las que corresponden estos talentos, así como las descripciones de los talentos (más y menos desarrollados). 
            </p>

            <p>
                La denominación de las siete grandes áreas consideradas en la estructura de la Prueba de Talentos son: 
            </p>

            <table class="w-100">
                @foreach ($tendencias as $item)
                <tr>
                    <td class="top" width="4%">
                        {{$loop->index+1}}
                    </td>
                    <td width="96%">
                        {{$item->nombre}}
                    </td>
                </tr>  
                @endforeach
            </table>
        </div>

        <div class="page_break">
            <p>
                A cada áreas considerada le corresponde un color. A continuación se presentan los talentos
                considerados al interior de cada una de las siete áreas:
            </p>

            <table class="w-100">
                <tr>
                    @foreach ($tendencias as $ten)
                    <td class="w-100 pr-2">
                        <table class="text-center margin-tr font-10">
                            <tr>
                                <td class="text-center border p-2" style="height:40px;border-color:{{$ten->color}}">
                                    {{$ten->nombre}}
                                </td>
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
        </div>

        <div class="page_break text-justify">
            <p>
                A continuación una breve descripción de cada área: 
            </p>

            @foreach ($tendencias as $ten)
            <div class="break-avoid">
                <p class="p-2 border d-inline-block" style="border-color:{{$ten->color}}">{{$ten->nombre}} ({{$ten->nombre_color}})
                <p>{{$ten->descripcion}}</p>
            </div>
            @endforeach
        </div>

        <div class="page_break text-justify">
            <p class="h3 font-weight-bold">
                III. OBJETIVOS
            </p>
            <p>
                El objetivo principal de la aplicación de los instrumentos del presente trabajo es que los alumnos cuenten con 
                información sobre sus talentos dominantes, características del temperamento y preferencias vocacionales  que les 
                permita discriminar los roles donde puedan desempeñarse y los campos profesionales en los cuales aplicarlos y 
                desarrollar fortalezas. 
            </p>

            <p class="h3 font-weight-bold mt-5">
                IV. MUESTRA
            </p>
            <p>
                La muestra estuvo conformada por los alumnos que sí han resuelto las tres encuestas: 
            </p>
        </div>
    </body>
</html>