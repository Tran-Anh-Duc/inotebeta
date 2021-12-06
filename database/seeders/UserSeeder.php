<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "anh duc one";
        $user->email = "trananhducty@gmail.com";
        $user->password = Hash::make('123456');
        $user->save();

        $user = new User();
        $user->name = "anh duc two";
        $user->email = "trananhducti@gmail.com";
        $user->password = Hash::make('123456');
        $user->save();
    }
}
