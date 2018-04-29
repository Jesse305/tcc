<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfis = [
          ['perfil' => 'Administrador'],
          ['perfil' => 'Funcionário'],
        ];

        DB::table('perfis')->insert($perfis);

        $user = [
          'name' => 'Jesse de Oliveira Abreu',
          'cpf' => '000.786.221-07',
          'email' => 'jesse.ti.305@gmail.com',
          'phone' => '(61) 99407-0720',
          'password' => bcrypt('jes12345'),
          'perfil_id' => 1,
        ];

        DB::table('users')->insert($user);
    }
}
