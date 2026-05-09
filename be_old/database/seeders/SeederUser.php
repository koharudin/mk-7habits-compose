<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SeederUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin
        $user  = new User();
        $user->name = "Koharudin";
        $user->email = "koharudin.mail07@gmail.com";
        $user->password = Hash::make("demo");
        $user->save();

        //Demo
        $user  = new User();
        $user->name = "Demo";
        $user->email = "demo@gmail.com";
        $user->password = Hash::make("demo");
        $user->save();
    }
}
