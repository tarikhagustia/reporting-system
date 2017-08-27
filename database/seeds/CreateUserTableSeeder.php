<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Femi Nemalita',
            'email' => 'feminemalita@gmail.com',
            'password' => bcrypt(1234),
            'access' => 'ba'
        ]);
    }
}
