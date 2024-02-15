<?php

namespace Database\Seeders;

use App\Models\Monstruo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonstruoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $monstruo1= new Monstruo;
        $monstruo1->nombre="Lizard";
        $monstruo1->armadura="12";
        $monstruo1->vida="1d4";
        $monstruo1->velocidad="12";
        $monstruo1->reto="0";
        $monstruo1->timestamps= false;
        $monstruo1->save();

        $monstruo2= new Monstruo;
        $monstruo2->nombre="Kobold";
        $monstruo2->armadura="12";
        $monstruo2->vida="5 (2d6  2)";
        $monstruo2->velocidad="30 ft";
        $monstruo2->reto="1/8";
        $monstruo2->timestamps= false;
        $monstruo2->save();

        $monstruo3= new Monstruo;
        $monstruo3->nombre="Duergar";
        $monstruo3->armadura="16";
        $monstruo3->vida="26 (4d8 + 8)";
        $monstruo3->velocidad="25 ft";
        $monstruo3->reto="1";
        $monstruo3->timestamps= false;
        $monstruo3->save();

        $monstruo4= new Monstruo;
        $monstruo4->nombre="Ghast";
        $monstruo4->armadura="13";
        $monstruo4->vida=" 36 (8d8)";
        $monstruo4->velocidad="30 ft";
        $monstruo4->reto="2";
        $monstruo4->timestamps= false;
        $monstruo4->save();

        $monstruo5= new Monstruo;
        $monstruo5->nombre="Air Elemental";
        $monstruo5->armadura="15";
        $monstruo5->vida=" 90 (12d10 + 24)";
        $monstruo5->velocidad="90 ft fly";
        $monstruo5->reto="5";
        $monstruo5->timestamps= false;
        $monstruo5->save();
    }
}
