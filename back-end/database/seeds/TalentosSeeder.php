<?php

use Illuminate\Database\Seeder;
use App\Talento;

class TalentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $talentos=[
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Cálido','descripcion'=>'Cálido','imagen'=>'Calido.png','imagen_espalda'=>'Espalda Calido.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Servicial','descripcion'=>'Servicial','imagen'=>'Servicial.png','imagen_espalda'=>'Espalda Servicial.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Sensible','descripcion'=>'Sensible','imagen'=>'Sensible.png','imagen_espalda'=>'Espalda Sensible.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Empático','descripcion'=>'Empático','imagen'=>'Empatico.png','imagen_espalda'=>'Espalda Empatico.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Asertivo','descripcion'=>'Asertivo','imagen'=>'Asertivo.png','imagen_espalda'=>'Espalda Asertivo.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Abierto a los demás','descripcion'=>'Abierto a los demás','imagen'=>'Abierto a los demas.png','imagen_espalda'=>'Espalda Abierto a los demas.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Armonizador','descripcion'=>'Armonizador','imagen'=>'Armonizador.png','imagen_espalda'=>'Espalda Armonizador.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Sabe escuchar','descripcion'=>'Sabe escuchar','imagen'=>'Sabe escuchar.png','imagen_espalda'=>'Espalda Sabe escuchar.png'],
            ['tendencia_id'=>1,'tipo_id'=>1,'nombre'=>'Sociable','descripcion'=>'Sociable','imagen'=>'Sociable.png','imagen_espalda'=>'Espalda Sociable.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Entusiasta','descripcion'=>'Entusiasta','imagen'=>'Entusiasta.png','imagen_espalda'=>'Espalda Entusiasta.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Comercial','descripcion'=>'Comercial','imagen'=>'Comercial.png','imagen_espalda'=>'Espalda Comercial.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Positivo','descripcion'=>'Positivo','imagen'=>'Positivo.png','imagen_espalda'=>'Espalda Positivo.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Emprendedor','descripcion'=>'Emprendedor','imagen'=>'Emprendedor.png','imagen_espalda'=>'Espalda Emprendedor.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Ejecutor','descripcion'=>'Ejecutor','imagen'=>'Ejecutor.png','imagen_espalda'=>'Espalda Ejecutor.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Con coraje','descripcion'=>'Con coraje','imagen'=>'Con coraje.png','imagen_espalda'=>'Espalda Con coraje.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Estratégico','descripcion'=>'Estratégico','imagen'=>'Estrategico.png','imagen_espalda'=>'Espalda Estrategico.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Orientado al logro','descripcion'=>'Orientado al logro','imagen'=>'Orientado al logro.png','imagen_espalda'=>'Espalda Orientado al logro.png'],
            ['tendencia_id'=>2,'tipo_id'=>1,'nombre'=>'Con iniciativa','descripcion'=>'Con iniciativa','imagen'=>'Con iniciativa.png','imagen_espalda'=>'Espalda Con iniciativa.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Ingenioso','descripcion'=>'Ingenioso','imagen'=>'Ingenioso.png','imagen_espalda'=>'Espalda Ingenioso.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Flexible','descripcion'=>'Flexible','imagen'=>'Flexible.png','imagen_espalda'=>'Espalda Flexible.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Creativo','descripcion'=>'Creativo','imagen'=>'Creativo.png','imagen_espalda'=>'Espalda Creativo.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Prefiere la novedad','descripcion'=>'Prefiere la novedad','imagen'=>'Prefiere la novedad.png','imagen_espalda'=>'Espalda Prefiere la novedad.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Intuitivo','descripcion'=>'Intuitivo','imagen'=>'Intuitivo.png','imagen_espalda'=>'Espalda Intuitivo.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Original','descripcion'=>'Original','imagen'=>'Original.png','imagen_espalda'=>'Espalda Original.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Visionario','descripcion'=>'Visionario','imagen'=>'Visionario.png','imagen_espalda'=>'Espalda Visionario.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Sentido del humor','descripcion'=>'Sentido del humor','imagen'=>'Sentido del humor.png','imagen_espalda'=>'Espalda Sentido del humor.png'],
            ['tendencia_id'=>3,'tipo_id'=>1,'nombre'=>'Curioso intelectual','descripcion'=>'Curioso intelectual','imagen'=>'Curioso intelectual.png','imagen_espalda'=>'Espalda Curioso intelectual.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Organizado','descripcion'=>'Organizado','imagen'=>'Organizado.png','imagen_espalda'=>'Espalda Organizado.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Anticipado','descripcion'=>'Anticipado','imagen'=>'Anticipado.png','imagen_espalda'=>'Anticipado.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Detallista','descripcion'=>'Detallista','imagen'=>'Detallista.png','imagen_espalda'=>'Espalda Detallista.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Disciplinado','descripcion'=>'Disciplinado','imagen'=>'Disciplinado.png','imagen_espalda'=>'Espalda Disciplinado.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Enfocado','descripcion'=>'Enfocado','imagen'=>'Enfocado.png','imagen_espalda'=>'Espalda Enfocado.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Planificado','descripcion'=>'Planificado','imagen'=>'Planificado.png','imagen_espalda'=>'Espalda Planificado.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Ordenado','descripcion'=>'Ordenado','imagen'=>'Ordenado.png','imagen_espalda'=>'Espalda Ordenado.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Monitor','descripcion'=>'Monitor','imagen'=>'Monitor.png','imagen_espalda'=>'Espalda Monitor.png'],
            ['tendencia_id'=>4,'tipo_id'=>1,'nombre'=>'Director','descripcion'=>'Director','imagen'=>'Director.png','imagen_espalda'=>'Espalda Director.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Argumentador','descripcion'=>'Argumentador','imagen'=>'Argumentador.png','imagen_espalda'=>'Espalda Argumentador.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Persuasivo','descripcion'=>'Persuasivo','imagen'=>'Persuasivo.png','imagen_espalda'=>'Espalda Persuasivo.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Orientador','descripcion'=>'Orientador','imagen'=>'Orientador.png','imagen_espalda'=>'Espalda Orientador.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Comunicador escrito','descripcion'=>'Comunicador escrito','imagen'=>'Comunicador escrito.png','imagen_espalda'=>'Espalda Comunicador escrito.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Informado','descripcion'=>'Informado','imagen'=>'Informado.png','imagen_espalda'=>'Espalda Informado.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Negociador','descripcion'=>'Negociador','imagen'=>'Negociador.png','imagen_espalda'=>'Espalda Negociador.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Comunicador verbal','descripcion'=>'Comunicador verbal','imagen'=>'Comunicador verbal.png','imagen_espalda'=>'Espalda Comunicador verbal.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Expresivo','descripcion'=>'Expresivo','imagen'=>'Expresivo.png','imagen_espalda'=>'Espalda Expresivo.png'],
            ['tendencia_id'=>5,'tipo_id'=>1,'nombre'=>'Coherente','descripcion'=>'Coherente','imagen'=>'Coherente.png','imagen_espalda'=>'Espalda Coherente.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Numérico','descripcion'=>'Numérico','imagen'=>'Numerico.png','imagen_espalda'=>'Espalda Numerico.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Reflexivo','descripcion'=>'Reflexivo','imagen'=>'Reflexivo.png','imagen_espalda'=>'Espalda Reflexivo.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Ecuánime','descripcion'=>'Ecuánime','imagen'=>'Ecuanime.png','imagen_espalda'=>'Espalda Ecuanime.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Crítico','descripcion'=>'Crítico','imagen'=>'Critico.png','imagen_espalda'=>'Espalda Critico.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Autodidacta','descripcion'=>'Autodidacta','imagen'=>'Autodidacta.png','imagen_espalda'=>'Espalda Autodidacta.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Científico','descripcion'=>'Científico','imagen'=>'Cientifico.png','imagen_espalda'=>'Espalda Cientifico.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Aprendiz','descripcion'=>'Aprendiz','imagen'=>'Aprendiz.png','imagen_espalda'=>'Espalda Aprendiz.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Analítico','descripcion'=>'Analítico','imagen'=>'Analitico.png','imagen_espalda'=>'Espalda Analitico.png'],
            ['tendencia_id'=>6,'tipo_id'=>1,'nombre'=>'Investigador','descripcion'=>'Investigador','imagen'=>'Investigador.png','imagen_espalda'=>'Espalda Investigador.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Visual','descripcion'=>'Visual','imagen'=>'Visual.png','imagen_espalda'=>'Espalda Visual.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Espacial','descripcion'=>'Espacial','imagen'=>'Espacial.png','imagen_espalda'=>'Espalda Espacial.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Facilidad con los idiomas','descripcion'=>'Facilidad con los idiomas','imagen'=>'Facilidad con los idiomas.png','imagen_espalda'=>'Espalda Facilidad con los idiomas.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Artístico','descripcion'=>'Artístico','imagen'=>'Artistico.png','imagen_espalda'=>'Espalda Artistico.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Buen oído','descripcion'=>'Buen oído','imagen'=>'Buen oido.png','imagen_espalda'=>'Espalda Buen oido.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Ciencias Naturales','descripcion'=>'Facilidad para las ciencias naturales','imagen'=>'Ciencias naturales.png','imagen_espalda'=>'Espalda Ciencias naturales.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Estético','descripcion'=>'Estético','imagen'=>'Estetico.png','imagen_espalda'=>'Espalda Estetico.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Motriz','descripcion'=>'Motriz','imagen'=>'Motriz.png','imagen_espalda'=>'Espalda Motriz.png'],
            ['tendencia_id'=>7,'tipo_id'=>2,'nombre'=>'Deportivo','descripcion'=>'Deportivo','imagen'=>'Deportivo.png','imagen_espalda'=>'Espalda Deportivo.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Espiritualidad','descripcion'=>'Espiritualidad','imagen'=>'Espiritualidad.png','imagen_espalda'=>'Espalda Espiritualidad.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Gratitud','descripcion'=>'Gratitud','imagen'=>'Gratitud.png','imagen_espalda'=>'Espalda Gratitud.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Honestidad','descripcion'=>'Honestidad','imagen'=>'Honestidad.png','imagen_espalda'=>'Espalda Honestidad.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Humildad','descripcion'=>'Humildad','imagen'=>'Humildad.png','imagen_espalda'=>'Espalda Humildad.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Justicia','descripcion'=>'Justicia','imagen'=>'Justicia.png','imagen_espalda'=>'Espalda Justicia.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Lealtad','descripcion'=>'Lealtad','imagen'=>'Lealtad.png','imagen_espalda'=>'Espalda Lealtad.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Perdón','descripcion'=>'Perdón','imagen'=>'Perdon.png','imagen_espalda'=>'Espalda Perdon.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Prudencia','descripcion'=>'Prudencia','imagen'=>'Prudencia.png','imagen_espalda'=>'Espalda Prudencia.png'],
            ['tendencia_id'=>null,'tipo_id'=>3,'nombre'=>'Responsabilidad','descripcion'=>'Responsabilidad','imagen'=>'RESPONSABILIDAD SOCIAL.png','imagen_espalda'=>'Espalda RESPONSABILIDAD SOCIAL.png']
        ];

        Talento::insert($talentos);
    }
}
