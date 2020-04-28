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
                padding: 62px;
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
                top:30px;
                left: 0;
                right: 70px;
            }

            #header img {
                width: 60px;
            }

            #footer {
                text-align: right;
                position: fixed;
                left: 0;
                right: 70px;
                color: black;;
                font-size: 20px;
                bottom: 70px;
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
                <h1>Alumno:</h1>
                <h1 class="mt-text">{{$persona->nombres}} {{$persona->apellido_paterno}} {{$persona->apellido_materno}}</h1>
                <h1 class="mt-text">@php
                    echo date('d-m-Y');
                @endphp</h1>
            </div>
          </div>     
        </div>

        <div class="page_break pad-doc">
            <h2 class="font-weight-bold">Descripción general de las evaluaciones:</h2>
            <p class="ml-4 font-weight-bold">- Test de Preferencias del Temperamento</p>
            <div>
                <p>El objetivo de este test es brindar información acerca de las características más
                    importantes de la personalidad. En primer lugar, encontrarás una descripción de los cuatro
                    ejes de personalidad que se trabajan en este test: a) Extrovertido –Introvertido, b) Intuitivo -
                    Sensorial, c) Racional -Emocional y d) Organizado-Casual. Posteriormente, te
                    presentaremos una descripción de los elementos que conforman a cada uno de estos ejes.
                    Este instrumento, ha sido desarrollado como una forma aplicativa de utilizar la teoría de la
                    personalidad de Carl Jung. Los resultados te ayudarán a conocerte mejor, lo cual puede
                    favorecer tu interacción con el entorno social.</p>
            </div>

            <p class="ml-4 font-weight-bold">- Test de Talentos</p>
            <div>
                <p>El talento es una forma innata de pensar, sentir y comportarse, que puede aplicarse,
                    productivamente, para obtener resultados positivos. Todas las personas son poseedoras de
                    talentos; el problema es que la mayoría los desconoce. Se sabe, luego de mucha
                    investigación, que las personas más exitosas conocen sus talentos y construyen su vida en
                    base a ellos. Entonces, el talento puede definirse como aquello que uno hace muy bien, en
                    lo que destaca por encima de los demás y que, además, le genera placer.
                    El test de Talentos, es una herramienta que permite identificar aquellos talentos, que con
                    esfuerzo y perseverancia, pueden llegar a convertirse en nuestras fortalezas o atributos que
                    nos hacen diferente de los demás en aquellas actividades que emprendamos o
                    realicemos.</p>
            </div>

            <p class="ml-4 font-weight-bold">- Test de Intereses Profesionales</p>
            <div>
                <p>Una de las decisiones más importantes en la vida de una persona, es la relacionada a la
                    elección de la carrera a seguir, pues su sentido de producción y felicidad futuras,
                    dependerán de la satisfacción que logre frente a la actividad que realice en su vida.
                    El test de intereses, evalúa los intereses profesionales a partir de tres aspectos: a. El gusto
                    que tendrías por realizar alguna actividad en tu vida profesional, b. Las habilidades que
                    tienes para aprender a realizar esta actividad, y c. La satisfacción que crees que te
                    brindaría realizar esta actividad como parte de tu profesión.
                    Los tres instrumentos han sido elaborados y estandarizados por la prestigiosa firma de
                    Effectus Fischman Consultores, contando con los criterios de validez y confiabilidad que el
                    programa demanda.</p>
            </div>
        </div>

        <div id="header">
            <img src="{{ 'storage/logo_upc_red.png' }}" alt="">
        </div>

        <div id="footer">
            <div class="page-number"></div>
        </div>

        <div class="page_break pad-doc">
            <h4 class="font-weight-bold text-secondary">I. TEST DE PREFERENCIAS DEL TEMPERAMENTO</h4>
            <div>
                <p>A continuación presentamos una rueda con tus resultados y la preferencia del
                    temperamento que tienes en general. Aquí verás un perfil general de cómo eres tú. Este
                    perfil general está compuesto por letras mayúsculas y minúsculas. Las mayúsculas reflejan
                    las preferencias que más priman en ti y dirigen más tu forma de actuar. Por otro lado, las
                    minúsculas también influyen en cómo eres tú pero no reflejan preferencias tan marcadas
                    como las que aparecen en mayúsculas.</p>
            </div>
        </div>

        <div class="pad-doc">
            <h4 class="font-weight-bold text-secondary">1.2 Descripción de los Elementos</h4>
            <div>
                <p>A continuación se presentan 4 gráficos de barras donde aparecen tus elementos
                    predominantes. La barra más alta representa el elemento que describe de manera más
                    precisa cómo eres tú, de acuerdo con tus respuestas.
                    En este gráfico de barras se muestran características específicas. Las barras pueden ir
                    hacia arriba o hacia abajo. Las barras hacia arriba expresan las características de las
                    personas extrovertidas, intuitivas, racionales y organizadas. Las barras hacia abajo
                    representan las características de las personas introvertidas, sensoriales, emocionales y
                    casuales.</p>
            </div>

            @foreach ($areas as $a)
            <div>
                <h4 class="font-weight-bold text-secondary">1.2.{{$loop->index +1}} Descripciones de los elementos del área {{$a->nombre}}</h4>
                @foreach ($puntajes as $p)
                    @if ($a->id == $p->formula->area->id)
                        {{$p->formula->nombre }} : puntaje {{$p->puntaje}} / transformacion {{$p->transformacion}}
                    @endif
                @endforeach
            </div>
            @endforeach
        </div>
    </body>
</html>