<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('students')->delete();

        $students = [
            ['id' => 1, 'firstname' => 'Marco', 'lastname' => 'Mayen', 'matricula' => 201901008, 'birth_date' => '1997-01-22', 'user_id' => 4],
            ['id' => 2, 'firstname' => 'Julio', 'lastname' => 'Palacios', 'matricula' => 201901009, 'birth_date' => '1997-01-22', 'user_id' => 5],
            ['id' => 3, 'firstname' => 'Marco', 'lastname' => 'Verrati', 'matricula' => 201901010, 'birth_date' => '1997-01-22', 'user_id' => 6],
            ['id' => 4, 'firstname' => 'Leonel', 'lastname' => 'Garcia', 'matricula' => 201901011, 'birth_date' => '1997-01-22', 'user_id' => 7],
            ['id' => 5, 'firstname' => 'Sahara', 'lastname' => 'Santiago', 'matricula' => 201901012, 'birth_date' => '1997-01-22', 'user_id' => 8],
            ['id' => 6, 'firstname' => 'Valeria', 'lastname' => 'Rodriguez', 'matricula' => 201901013, 'birth_date' => '1997-01-22', 'user_id' => 9],
            ['id' => 7, 'firstname' => 'Alejandra', 'lastname' => 'Rodriguez', 'matricula' => 201901014, 'birth_date' => '1997-01-22', 'user_id' => 10],
            
        ];

        DB::table('students')->insert($students);
    }
}
