<?php

use Illuminate\Database\Seeder;
use App\Wisata;

class wisataSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 11; $i++) { 
            $data = Wisata::create([
                'nama'=>"Wisata $i",
                'slug'=>"wisata-$i",
                'alamat'=>"Jln. Candi Pawon No. $i",
                'gambar'=>"Gambar $i",
                'keterangan'=>"Keterngan $i",
            ]);
        }
    }
}
