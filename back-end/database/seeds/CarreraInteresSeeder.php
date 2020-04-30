<?php

use App\CarreraInteres;
use Illuminate\Database\Seeder;

class CarreraInteresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carreras=[
            ['carrera_id'=>1,'nombre'=>'Administración/Gestión'],
            ['carrera_id'=>1,'nombre'=>'Administración y Gestión Comercial'],
            ['carrera_id'=>1,'nombre'=>'Administración y Negocios Internacionales'],
            ['carrera_id'=>1,'nombre'=>'Ingeniería de Gestión Empresarial'],
            ['carrera_id'=>1,'nombre'=>'Ingeniería Industrial'],
            ['carrera_id'=>1,'nombre'=>'Recursos Humanos'],
            ['carrera_id'=>2,'nombre'=>'Administración y Agronegocios'],
            ['carrera_id'=>2,'nombre'=>'Ciencia de los Alimentos'],
            ['carrera_id'=>2,'nombre'=>'Industrias Alimentarias'],
            ['carrera_id'=>2,'nombre'=>'Ingeniería Agroindustrial'],
            ['carrera_id'=>2,'nombre'=>'Ingeniería de Industria Alimentaria'],
            ['carrera_id'=>3,'nombre'=>'Artes Escénicas'],
            ['carrera_id'=>3,'nombre'=>'Artista Profesional'],
            ['carrera_id'=>3,'nombre'=>'Danza'],
            ['carrera_id'=>3,'nombre'=>'Música'],
            ['carrera_id'=>4,'nombre'=>'Artes Visuales'],
            ['carrera_id'=>4,'nombre'=>'Ciencias de la Comunicación'],
            ['carrera_id'=>4,'nombre'=>'Comunicación Audiovisual y Medios Interactivos'],
            ['carrera_id'=>4,'nombre'=>'Comunicación e Imagen Empresarial'],
            ['carrera_id'=>4,'nombre'=>'Comunicación Social'],
            ['carrera_id'=>4,'nombre'=>'Comunicación y Periodismo'],
            ['carrera_id'=>4,'nombre'=>'Locución'],
            ['carrera_id'=>4,'nombre'=>'Periodismo'],
            ['carrera_id'=>5,'nombre'=>'Ingeniería Civil'],
            ['carrera_id'=>6,'nombre'=>'Arte culinario'],
            ['carrera_id'=>6,'nombre'=>'Gastronomía'],
            ['carrera_id'=>6,'nombre'=>'Gastronomía y Gestión de Restaurantes'],
            ['carrera_id'=>7,'nombre'=>'Ciencias del Deporte'],
            ['carrera_id'=>7,'nombre'=>'Profesor o Preparador Físico'],
            ['carrera_id'=>7,'nombre'=>'Administración y Negocios del Deporte'],
            ['carrera_id'=>8,'nombre'=>'Dirección de Artes Gráficas y Publicitarias'],
            ['carrera_id'=>8,'nombre'=>'Diseño Publicitario'],
            ['carrera_id'=>8,'nombre'=>'Diseño de Moda'],
            ['carrera_id'=>8,'nombre'=>'Diseño Gráfico'],
            ['carrera_id'=>8,'nombre'=>'Diseño Industrial'],
            ['carrera_id'=>8,'nombre'=>'Arquitectura'],
            ['carrera_id'=>8,'nombre'=>'Arquitectura de Interiores'],
            ['carrera_id'=>8,'nombre'=>'Diseño de Interiores'],
            ['carrera_id'=>9,'nombre'=>'Administración y Finanzas'],
            ['carrera_id'=>9,'nombre'=>'Contabilidad'],
            ['carrera_id'=>9,'nombre'=>'Contabilidad y Administración'],
            ['carrera_id'=>9,'nombre'=>'Economía'],
            ['carrera_id'=>10,'nombre'=>'Ciencias de la Computación'],
            ['carrera_id'=>10,'nombre'=>'Diseño Web'],
            ['carrera_id'=>10,'nombre'=>'Informática'],
            ['carrera_id'=>10,'nombre'=>'Informática Empresarial'],
            ['carrera_id'=>10,'nombre'=>'Ingeniería de Sistemas'],
            ['carrera_id'=>10,'nombre'=>'Ingeniería de Sistemas de Información'],
            ['carrera_id'=>10,'nombre'=>'Ingeniería de Software'],
            ['carrera_id'=>10,'nombre'=>'Seguridad Informática'],
            ['carrera_id'=>11,'nombre'=>'Derecho'],
            ['carrera_id'=>11,'nombre'=>'Derecho y Ciencias Políticas'],
            ['carrera_id'=>12,'nombre'=>'Administración y Marketing'],
            ['carrera_id'=>12,'nombre'=>'Comunicación e Imagen Empresarial'],
            ['carrera_id'=>12,'nombre'=>'Comunicación y Marketing'],
            ['carrera_id'=>12,'nombre'=>'Publicidad'],
            ['carrera_id'=>12,'nombre'=>'Comunicación y Publicidad'],
            ['carrera_id'=>13,'nombre'=>'Ingeniería Electrónica'],
            ['carrera_id'=>13,'nombre'=>'Ingeniería Mecánica'],
            ['carrera_id'=>13,'nombre'=>'Ingeniería Mecatrónica'],
            ['carrera_id'=>14,'nombre'=>'Ingeniería de Gestión Minera'],
            ['carrera_id'=>14,'nombre'=>'Ingeniería de Minas'],
            ['carrera_id'=>15,'nombre'=>'Educación'],
            ['carrera_id'=>15,'nombre'=>'Educación Especial'],
            ['carrera_id'=>15,'nombre'=>'Educación y Gestión del Aprendizaje'],
            ['carrera_id'=>16,'nombre'=>'Enfermería'],
            ['carrera_id'=>16,'nombre'=>'Medicina'],
            ['carrera_id'=>16,'nombre'=>'Odontología'],
            ['carrera_id'=>16,'nombre'=>'Terapia Física'],
            ['carrera_id'=>16,'nombre'=>'Nutrición y Dietética'],
            ['carrera_id'=>17,'nombre'=>'Psicología'],
            ['carrera_id'=>18,'nombre'=>'Traducción e Interpretación Profesional'],
            ['carrera_id'=>19,'nombre'=>'Ecoturismo'],
            ['carrera_id'=>19,'nombre'=>'Turismo'],
            ['carrera_id'=>19,'nombre'=>'Hotelería'],
            ['carrera_id'=>19,'nombre'=>'Hotelería y Administración'],
        ];

        CarreraInteres::insert($carreras);
    }
}
