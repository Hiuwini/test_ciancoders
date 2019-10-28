<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('courses')->delete();

        $courses = [
            ['id' => 1, 'name' => 'Matematica V', 'professor_id' => 1],
            ['id' => 2, 'name' => 'Programación IV', 'professor_id' => 1],
            ['id' => 3, 'name' => 'Fisica III', 'professor_id' => 1],
            ['id' => 4, 'name' => 'Quimica II', 'professor_id' => 1],
            ['id' => 5, 'name' => 'Literatura', 'professor_id' => 2],
            ['id' => 6, 'name' => 'Ingles IV', 'professor_id' => 2],
            ['id' => 7, 'name' => 'Programación Movil', 'professor_id' => 1],
            ['id' => 8, 'name' => 'Teoria de Sistemas', 'professor_id' => 2],
            ['id' => 9, 'name' => 'Teoria de la Información', 'professor_id' => 2],
            ['id' => 10, 'name' => 'Video Juegos', 'professor_id' => 2],
        ];

        DB::table('courses')->insert($courses);
    }
}
