<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeed extends Seeder
{
    public function run()
    {
        $categories = [
            'Divani e Poltrone',
            'Tavoli e Sedie',
            'Letti e Materassi',
            'Armadietti e Comò',
            'Scrivanie e Ufficio',
            'Cucine e Mobili da Cucina',
            'Lampade e Illuminazione',
            'Mobili da Esterno',
            'Decorazioni e Accessori',
            'Elettrodomestici Usati'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}