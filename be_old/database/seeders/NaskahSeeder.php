<?php

namespace Database\Seeders;

use App\Models\Naskah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NaskahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title'=> 'Rasa Carita (Sanghyang Hayu)',
                'description' => 'Naskah keagamaan Sunda Kuna yang berisi ajaran moral dan spiritual.',
            ],
            [
                'title'=> 'Bujangga Manik',
                'description' => 'Naskah perjalanan tokoh pertapa Sunda yang menggambarkan wilayah Nusantara.',
            ],
            [
                'title'=> 'Wawacan Sulanjana',
                'description' => 'Naskah wawacan yang mengisahkan mitologi Sulanjana dalam tradisi Sunda.',
            ],
            [
                'title'=> 'Wawacan Supena Nu Kasep jeung Gagah',
                'description' => 'Karya sastra wawacan Sunda mengenai tokoh Supena.',
            ],
            [
                'title'=> 'Wawacan Pua-pua Bermana Sakti',
                'description' => 'Naskah wawacan Sunda bertema kepahlawanan dan kesaktian.',
            ],
            [
                'title'=> 'Sanghyang Raga Dewata',
                'description' => 'Naskah kosmologi Sunda Kuna mengenai penciptaan alam semesta.',
            ],
            [
                'title'=> 'Pustaka Dwipantaraparwa Sargah 10',
                'description' => 'Bagian dari seri pustaka Dwipantara Parwa.',
            ],
            [
                'title'=> 'Carita Parahyangan Sargah 2',
                'description' => 'Naskah sejarah Sunda Kuna mengenai kerajaan di Tatar Sunda.',
            ],
            [
                'title'=> 'Pustaka Dwipantaraparwa Sargah 4',
                'description' => 'Bagian keempat dari naskah Dwipantaraparwa.',
            ],
            [
                'title'=> 'Pustaka Dwipantaraparwa Sargah 2',
                'description' => 'Bagian kedua dari pustaka Dwipantaraparwa.',
            ],
            [
                'title'=> 'Carita Parahyangan Sargah 1',
                'description' => 'Naskah sejarah Sunda Kuna yang mencatat raja-raja Sunda.',
            ],
            [
                'title'=> 'Pustaka Dwipantaraparwa Sargah 7',
                'description' => 'Bagian ketujuh dari seri Dwipantaraparwa.',
            ],
            [
                'title'=> 'Pustaka Dwipantaraparwa Sargah 8',
                'description' => 'Bagian kedelapan dari seri Dwipantaraparwa.',
            ],
            [
                'title'=> 'Pustaka Dwipantaraparwa Sargah 3',
                'description' => 'Bagian ketiga dari pustaka Dwipantaraparwa.',
            ],
            [
                'title'=> 'Wawacan Walangsungsang',
                'description' => 'Naskah mengenai perjalanan Walangsungsang dalam sejarah Cirebon.',
            ],
            [
                'title'=> 'Babad Banten',
                'description' => 'Kronik sejarah Kesultanan Banten.',
            ],
            [
                'title'=> 'Niti Sastra',
                'description' => 'Naskah petuah moral dan tata kehidupan.',
            ],
            [
                'title'=> 'Carita Parahyangan',
                'description' => 'Naskah sejarah penting mengenai kerajaan Sunda dan Galuh.',
            ],
            [
                'title'=> 'Jati Suda',
                'description' => 'Naskah Sunda Kuna berisi ajaran dan nilai kehidupan.',
            ],
            [
                'title'=> 'Wawacan Ranggawulung',
                'description' => 'Kisah wawacan Sunda mengenai tokoh Ranggawulung.',
            ],
            [
                'title'=> 'Wawacan Ahmad Muhammad',
                'description' => 'Naskah wawacan bernuansa Islam.',
            ],
            [
                'title'=> 'Babad Cirebon',
                'description' => 'Kronik sejarah berdirinya Cirebon dan para wali.',
            ],
            [
                'title'=> 'Silsilah Bandung',
                'description' => 'Catatan silsilah keluarga dan tokoh di Bandung.',
            ],
            [
                'title'=> 'Silsilah Sajarah Bandung',
                'description' => 'Naskah silsilah dan sejarah wilayah Bandung.',
            ],
            [
                'title'=> 'Wawacan Ciung Wanara',
                'description' => 'Kisah legendaris Ciung Wanara dari tanah Galuh.',
            ],
            [
                'title'=> 'Wawacan Carbon',
                'description' => 'Naskah tradisional mengenai wilayah Cirebon.',
            ],
            [
                'title'=> 'Wawacan Samun',
                'description' => 'Naskah wawacan Sunda klasik.',
            ],
            [
                'title'=> 'Wawacan Rengganis',
                'description' => 'Kisah kepahlawanan dan legenda Dewi Rengganis.',
            ],
            [
                'title'=> 'Wawacan Sajarah Wali',
                'description' => 'Naskah sejarah dan kisah para wali.',
            ],
            [
                'title'=> 'Sahadat Fatimah',
                'description' => 'Naskah keagamaan Islam tradisional Sunda.',
            ],
            [
                'title'=> 'Pustaka Rajya-Rajya i Bhumi Nusantara 2-4',
                'description' => 'Naskah mengenai kerajaan-kerajaan di Nusantara.',
            ],
        ];

        foreach ($data as &$item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
                Naskah::create($item);
        }

        //DB::table('naskah')->insert($data);
    }
}