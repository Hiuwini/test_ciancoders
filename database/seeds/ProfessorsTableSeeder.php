<?php

use Illuminate\Database\Seeder;

class ProfessorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('professors')->delete();

        $professors = [
            ['id' => 1, 'firstname' => 'Rudy', 'lastname' => 'Alvarado', 'user_id' => 2],
            ['id' => 2, 'firstname' => 'Pablo', 'lastname' => 'Garcia', 'user_id' => 3],
        ];

        DB::table('professors')->insert($professors);

    }
}
