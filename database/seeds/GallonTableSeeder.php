<?php

use App\Gallon;
use Illuminate\Database\Seeder;

class GallonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gallon = new Gallon();
        $gallon->id = "L0101";
        $gallon->description = "Galon No. 1 di Lantai 1 gedung lama";
        $gallon->save();

        $gallon = new Gallon();
        $gallon->id = "B0701";
        $gallon->description = "Galon No. 1 di Lantai 7 gedung baru";
        $gallon->save();
    }
}
