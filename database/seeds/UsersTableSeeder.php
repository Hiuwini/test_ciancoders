<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();

        $users = [
            ['id' => 1, 'username' => 'admin', 'password' => bcrypt('test'), 'rol' => 1],
            ['id' => 2, 'username' => 'ralvarado', 'password' => bcrypt('test'), 'rol' => 2],
            ['id' => 3, 'username' => 'pablogarcia', 'password' => bcrypt('test'), 'rol' => 2],
            ['id' => 4, 'username' => 'marcomayen', 'password' => bcrypt('test'), 'rol' => 3],
            ['id' => 5, 'username' => 'juliopalacios', 'password' => bcrypt('test'), 'rol' => 3],
            ['id' => 6, 'username' => 'marcoverrati', 'password' => bcrypt('test'), 'rol' => 3],
            ['id' => 7, 'username' => 'leonelgarcia', 'password' => bcrypt('test'), 'rol' => 3],
            ['id' => 8, 'username' => 'saharasantiago', 'password' => bcrypt('test'), 'rol' => 3],
            ['id' => 9, 'username' => 'valeriarodriguez', 'password' => bcrypt('test'), 'rol' => 3],
            ['id' => 10, 'username' => 'alejandrarodriguez', 'password' => bcrypt('test'), 'rol' => 3],
        ];

        DB::table('users')->insert($users);
    }
}
