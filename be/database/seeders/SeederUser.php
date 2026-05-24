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
        //SuperAdmin

        //Admin
        $user  = new User();
        $user->name = "Koharudin";
        $user->email = "koharudin.mail07@gmail.com";
        $user->password = Hash::make("demo");
        $user->save();

         //Admin
         $user  = new User();
         $user->name = "Admin";
         $user->email = "admin@gmail.com";
         $user->password = Hash::make("demo");
         $user->save();


        //Guru
        $user  = new User();
        $user->name = "Guru";
        $user->email = "guru@gmail.com";
        $user->password = Hash::make("demo");
        $user->save();

         //Walmur
         $user  = new User();
         $user->name = "Walmur";
         $user->email = "walmur@gmail.com";
         $user->password = Hash::make("demo");
         $user->save();

          //Siswa
          $user  = new User();
          $user->name = "Siswa";
          $user->email = "siswa@gmail.com";
          $user->password = Hash::make("demo");
          $user->save();
    }
}
