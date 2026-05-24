<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Habit;
use App\Models\Habits;

class HabitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $habits = [
            [
                'name' => 'Bangun Pagi',
                'description' => 'Mengawali hari dengan disiplin.',
            ],
            [
                'name' => 'Beribadah',
                'description' => 'Membentuk anak yang beriman.',
            ],
            [
                'name' => 'Berolahraga',
                'description' => 'Membiasakan pola hidup sehat.',
            ],
            [
                'name' => 'Makan Sehat',
                'description' => 'Menanamkan kebiasaan memilih makanan bergizi.',
            ],
            [
                'name' => 'Gemar Belajar',
                'description' => 'Membentuk karakter anak yang cerdas dan kreatif.',
            ],
            [
                'name' => 'Bermasyarakat',
                'description' => 'Mengembangkan kepedulian sosial.',
            ],
            [
                'name' => 'Tidur Cepat',
                'description' => 'Mendukung pola hidup sehat dan disiplin.',
            ],
        ];

        foreach ($habits as $key=>$habit) {
            $habit['order']=$key+1;
            Habits::create($habit);
        }
    }
}