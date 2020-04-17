<?php

use Illuminate\Database\Seeder;
use App\Pregunta;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preguntas=[
            ['tipo_encuesta_id'=>1,'nombre'=> 'Administrar una empresa, hotel o fábrica.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Cuidar que las semillas produzcan mejores frutos y vegetales.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Representar un personaje de teatro, cine o televisión.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Conducir programas de televisión o de radio.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Dirigir la construcción de edificios o carreteras.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Crear nuevas recetas de comidas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Entrenar a deportistas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Diseñar casas, parques o centros comerciales.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Definir los precios más competitivos para un producto en el mercado.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Crear software de simulación, animación o entretenimiento.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Defender los derechos de las personas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Evaluar la satisfacción del cliente con un negocio o producto.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Armar y desarmar máquinas y equipos para entender cómo funcionan.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Extraer los minerales de un yacimiento.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Mejorar las técnicas de enseñanza de los cursos.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Tratar las enfermedades físicas de las personas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Escuchar y entender los problemas de las personas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Traducir textos considerando su contexto cultural.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Promover el turismo de un país o una región.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Planificar las acciones de una empresa, hotel o fábrica para lograr sus objetivos.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Procesar cereales para que las personas los puedan consumir.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Comunicar ideas y sentimientos a través de la música, la actuación o el baile.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Producir películas de cine o programas de radio o televisión.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Calcular los materiales necesarios para la construcción de un puente.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Preparar diversos platos de comida.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Dirigir la preparación de los deportistas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Crear combinaciones armoniosas de colores.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Llevar un registro de los ingresos y gastos de una empresa.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Diseñar páginas web de intercambio de videos y de información personal.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Orientar a las personas utilizando normas o leyes.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Crear productos de acuerdo a las necesidades del consumidor.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Armar redes de comunicación entre las computadoras.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Localizar minas o yacimientos petroleros.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Dar clases utilizando métodos que aseguren el aprendizaje de los alumnos.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Asesorar a las personas para que tengan una alimentación saludable.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Orientar a las personas para que resuelvan sus problemas personales.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Adaptar los diálogos de las películas para que sean dobladas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Mostrar nuevos lugares turísticos.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Manejar las importaciones o exportaciones de una empresa, hotel o fábrica.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Sembrar y cultivar frutos o vegetales.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Participar de un grupo artístico (orquesta, grupo musical, elenco de actores).'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Realizar reportajes periodísticos.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Construir un edificio.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Preparar pasteles, dulces o postres.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Asesorar a los deportistas para mejorar su rendimiento.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Aplicar el arte a objetos funcionales (muebles, ropa, adornos, etc.).'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Supervisar que los ingresos y gastos de una empresa estén de acuerdo con lo planeado.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Crear aplicaciones para celulares o tablets.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Defender a una persona analizando los hechos.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Persuadir a las personas para que compren productos o servicios de una empresa.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Reparar motores y equipos mecánicos o electrónicos.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Descubrir minerales valiosos en lugares recónditos.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Evaluar el rendimiento de los alumnos.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Preservar la salud integral de las personas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Apoyar a las personas para que desarrollen su máximo potencial.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Traducir conferencias o entrevistas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Brindar servicios a los turistas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Negociar acuerdos con empresas nacionales o internacionales.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Supervisar la producción de alimentos.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Producir espectáculos artísticos.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Transmitir ideas por medios audiovisuales.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Supervisar la construcción de un centro comercial'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Presentar los platos de comida de forma atractiva.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Diseñar estrategias para ganar competencias deportivas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Realizar dibujos en perspectiva.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Analizar los efectos de los cambios económicos sobre las empresas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Diseñar antivirus o protectores de información personal de las computadoras.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Facilitar que las personas lleguen a un acuerdo en términos legales.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Diseñar estrategias para ampliar el mercado de los productos o servicios de una empresa.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Realizar proyectos de robótica.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Dirigir la búsqueda de yacimientos petroleros.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Preparar materiales para la enseñanza.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Rehabilitar a personas adictas (a las drogas, videojuegos, etc.).'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Evaluar las capacidades de las personas para conocerlas en profundidad.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Invertir el dinero de una empresa para lograr mayor rentabilidad.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Traducir las conversaciones de las películas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Coordinar los servicios turísticos ofrecidos a un grupo de personas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Corregir las alteraciones en la posición de los dientes para mejorar la sonrisa de las personas.'],
            ['tipo_encuesta_id'=>1,'nombre'=> 'Tratar las limitaciones funcionales y discapacidades de las personas.']
        ];

        Pregunta::insert($preguntas);
    }
}
