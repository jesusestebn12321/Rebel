<?php

use Illuminate\Database\Seeder;
use Equivalencias\Content;

class ContentTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create([
            'slug'=> str_slug('Titlte_1'),
            'justification'=>'En la asignatura Programación II,  tiene como propósito esencial orientar al estudiante de Ingeniería en Informática a utilizar principios, esquemas y técnicas en el diseño y elaboración de programas informáticos que contribuyan a una optimización y de los procesos que involucren usando las bondades y beneficios que poseen los lenguajes de programación bajo el paradigma de programación orientado a objeto, de trabajo en multiplataforma y basados en la arquitectura de diseño Modelo Vista Controlador (MVC), permitiendo separar los datos y la lógica de negocio de una aplicación de la interfaz de usuario y el módulo encargado de gestionar los eventos y las comunicaciones.',
            'version'=>'2020',
            'purpose'=>'Orientar al estudiante al estudiante mediante el empleo de técnicas y herramientas de la Programación Orientada a Objeto  y  el lenguaje Javascript el conocimiento para  diseñar un sistema de información usando la arquitectura de software MVC, usando un motor de base de datos que permita interactuar con la información y usando distintos formatos para la presentación de la información',
            'content'=> '   Programación orientada objeto
    HyperText Markup Language, versión 5 (HTML5)
    Arquitectura de diseño a 3 capas MVC
    Diseño de Modelos
    Diseño de Vistas
    Diseño de Controladores
    Manejo de Excepciones
    Bloque try-catch-finally
    Sentencia Throw
    Objeto Errorde javascript
    Manejo de datos almacenados (Bases de datos y archivos)
    Generación de reportes',
            'methodology'=>'Clase Magistral
    Mapas mentales
    Mapas Conceptuales
    Mesas de discusión
    Resúmenes
    Trabajos grupales e individuales
    Investigación en red',
            'evaluation'=>'Demostraciones Prácticas
    Experimentación y Demostración
    Talleres Prácticos
    Muestras de Ejemplos prácticos
    Resolución de problemas
    Asignación de ejercicios
    Desarrollo de ejemplos prácticos en grupo
    Clase Aula Virtual',
            'matter_id'=>1
        ]);
        Content::create([
            'slug'=> str_slug('Titlte_2'),
            'justification'=>'Matematica',
            'version'=>'1',
            'purpose'=>'asdasdasdasdasdsadasd',
            'methodology'=>'asdasdasdasdasdsadasd',
            'evaluation'=>'asdasdasdasdasdsadasd',
            'content'=> 'asdasdasdggggasdasdasdasdasd',
            'matter_id'=>1
        ]);
        Content::create([
            'slug'=> str_slug('Titlte_4'),
            'justification'=>'Logica',
            'version'=>'1',
            'purpose'=>'asdasdasdasdasdsadasd',
            'methodology'=>'asdasdasdasdasdsadasd',
            'evaluation'=>'asdasdasdasdasdsadasd',
            'content'=> 'asdasdasdasdasaaaaaaaaaaaaaaaasdasdasd',
            'matter_id'=>1
        ]);
        Content::create([
            'slug'=> str_slug('Titlte_5'),
            'justification'=>'Algoritmo',
            'version'=>'1',
            'purpose'=>'asdasdasdasdasdsadasd',
            'methodology'=>'asdasdasdasdasdsadasd',
            'evaluation'=>'asdasdasdasdasdsadasd',
            'content'=> 'asdasdasdasdasaaaaaaaaaaaaaaaasdasdasd',
            'matter_id'=>1
        ]);
    }
}
