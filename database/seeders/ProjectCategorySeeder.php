<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Entrepreneuriat', 'slug' => 'entrepreneuriat', 'description' => 'Projets entrepreneuriaux', 'icon' => 'bi-briefcase'],
            ['name' => 'Agriculture', 'slug' => 'agriculture', 'description' => 'Projets agricoles', 'icon' => 'bi-tree'],
            ['name' => 'Numérique', 'slug' => 'numerique', 'description' => 'Projets numériques', 'icon' => 'bi-laptop'],
            ['name' => 'Éducation', 'slug' => 'education', 'description' => 'Projets éducatifs', 'icon' => 'bi-book'],
            ['name' => 'Environnement', 'slug' => 'environnement', 'description' => 'Projets environnementaux', 'icon' => 'bi-globe'],
        ];

        foreach ($categories as $cat) {
            ProjectCategory::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
