<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Habits;
use App\Models\HabitIndikator;

class HabitIndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Bangun Pagi' => [
                [
                    'indicator' => 'Bangun sebelum pukul 06.00',
                    'achievement_criteria' => 'Selalu: 5 kali/minggu, Sering: 3-4 kali, Kadang-kadang: < 3 kali',
                    'assessment' => 'Observasi harian',
                    'score' => '1-5',
                ],
                [
                    'indicator' => 'Merapikan tempat tidur setiap pagi',
                    'achievement_criteria' => 'Selalu: Setiap hari, Kadang-kadang: 3 kali/minggu, Tidak: < 3 kali',
                    'assessment' => 'Checklist guru/orang tua',
                    'score' => '1-5',
                ],
            ],

            'Beribadah' => [
                [
                    'indicator' => 'Melaksanakan ibadah sesuai jadwal',
                    'achievement_criteria' => 'Selalu: Tepat waktu, Kadang-kadang: Terlambat, Tidak: Tidak melaksanakan',
                    'assessment' => 'Observasi harian',
                    'score' => '1-5',
                ],
                [
                    'indicator' => 'Membaca doa sebelum dan sesudah aktivitas',
                    'achievement_criteria' => 'Selalu: Semua doa, Kadang-kadang: Beberapa, Tidak: Tidak sama sekali',
                    'assessment' => 'Observasi guru',
                    'score' => '1-5',
                ],
            ],

            'Berolahraga' => [
                [
                    'indicator' => 'Berolahraga 15 menit sehari',
                    'achievement_criteria' => 'Selalu: 5 kali/minggu, Sering: 3-4 kali, Kadang-kadang: < 3 kali',
                    'assessment' => 'Lembar laporan siswa',
                    'score' => '1-5',
                ],
                [
                    'indicator' => 'Berpartisipasi dalam kegiatan fisik di sekolah',
                    'achievement_criteria' => 'Aktif, Kadang-kadang aktif, Tidak aktif',
                    'assessment' => 'Observasi guru',
                    'score' => '1-5',
                ],
            ],

            'Makan Sehat' => [
                [
                    'indicator' => 'Membawa bekal sehat',
                    'achievement_criteria' => 'Selalu: 5 kali/minggu, Sering: 3-4 kali, Kadang-kadang: < 3 kali',
                    'assessment' => 'Observasi guru/orang tua',
                    'score' => '1-5',
                ],
                [
                    'indicator' => 'Mengurangi konsumsi makanan tidak sehat',
                    'achievement_criteria' => 'Selalu, Kadang-kadang, Tidak',
                    'assessment' => 'Checklist guru',
                    'score' => '1-5',
                ],
            ],

            'Gemar Belajar' => [
                [
                    'indicator' => 'Membaca buku 15 menit sehari',
                    'achievement_criteria' => 'Selalu, Kadang-kadang, Tidak',
                    'assessment' => 'Jurnal harian siswa',
                    'score' => '1-5',
                ],
                [
                    'indicator' => 'Menyelesaikan tugas sekolah tepat waktu',
                    'achievement_criteria' => 'Selalu, Kadang-kadang, Tidak',
                    'assessment' => 'Laporan tugas guru',
                    'score' => '1-5',
                ],
            ],

            'Bermasyarakat' => [
                [
                    'indicator' => 'Berpartisipasi dalam kegiatan sosial',
                    'achievement_criteria' => 'Aktif, Kadang-kadang, Tidak aktif',
                    'assessment' => 'Observasi lingkungan',
                    'score' => '1-5',
                ],
                [
                    'indicator' => 'Menyapa dan membantu teman',
                    'achievement_criteria' => 'Selalu, Kadang-kadang, Tidak',
                    'assessment' => 'Observasi guru',
                    'score' => '1-5',
                ],
            ],

            'Tidur Cepat' => [
                [
                    'indicator' => 'Tidur sebelum pukul 21.00',
                    'achievement_criteria' => 'Selalu: 5 kali/minggu, Sering: 3-4 kali, Kadang-kadang: < 3 kali',
                    'assessment' => 'Laporan orang tua',
                    'score' => '1-5',
                ],
                [
                    'indicator' => 'Terlihat segar dan fokus di pagi hari',
                    'achievement_criteria' => 'Selalu, Kadang-kadang, Tidak',
                    'assessment' => 'Observasi guru',
                    'score' => '1-5',
                ],
            ],
        ];

        foreach ($data as $habitName => $indicators) {
            $habit = Habits::where('name', $habitName)->first();

            if ($habit) {
                foreach ($indicators as $item) {
                    HabitIndikator::create([
                        'habit_id' => $habit->id,
                        'name' => $item['indicator'],
                        'achievement_criteria' => $item['achievement_criteria'],
                        'assessment' => $item['assessment'],
                        'score' => $item['score'],
                    ]);
                }
            }
        }
    }
}