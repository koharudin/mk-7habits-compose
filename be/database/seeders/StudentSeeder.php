<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $record = new Student();
        $record->name = "Andini Ayudhia Azzahra";
        $record->sekolah_id =1;
        $record->nis = '2014';
        $record->save();
        
    }
}
