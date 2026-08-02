<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Éducation', 'slug' => 'education', 'description' => 'Actualités et projets éducatifs'],
            ['name' => 'Agriculture', 'slug' => 'agriculture', 'description' => 'Projets et initiatives agricoles'],
            ['name' => 'Entrepreneuriat', 'slug' => 'entrepreneuriat', 'description' => 'Programmes entrepreneuriaux'],
            ['name' => 'Numérique', 'slug' => 'numerique', 'description' => 'Innovations et technologies'],
            ['name' => 'Environnement', 'slug' => 'environnement', 'description' => 'Actions environnementales'],
            ['name' => 'Santé', 'slug' => 'sante', 'description' => 'Projets de santé communautaire'],
            ['name' => 'Culture', 'slug' => 'culture', 'description' => 'Activités culturelles et artistiques'],
            ['name' => 'Non classé', 'slug' => 'non-classe', 'description' => 'Articles divers'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
