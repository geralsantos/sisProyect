<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

public function run()
{
    \DB::table("users")->insert(array(
      'name'  => 'Poma',
      'email' => 'geral_366@hotmail.com',
      'password'  => \Hash::make('123'),
      "tipo" => 'admin',
      "activo" => 1,
      "keyreg" =>"",
      "keypass" =>"",
      "newpass" => ""

      ));
}

}
