<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    public function run(): void
    {
        $resources = [
            [
                'title' => 'Guide pratique du maraîchage agroécologique',
                'description' => 'Un guide complet sur les techniques de maraîchage biologique adaptées au contexte béninois.',
                'file_path' => 'resources/guide-maraichage-agroecologique.pdf',
                'file_type' => 'pdf',
                'category' => 'guide',
                'download_count' => 245,
                'is_published' => true,
            ],
            [
                'title' => 'Rapport annuel d\'activités 2024',
                'description' => 'Le rapport annuel présentant les réalisations de RAIL Bénin pour l\'exercice 2024.',
                'file_path' => 'resources/rapport-annuel-2024.pdf',
                'file_type' => 'pdf',
                'category' => 'rapport',
                'download_count' => 189,
                'is_published' => true,
            ],
            [
                'title' => 'Étude sur l\'entrepreneuriat des jeunes dans le Plateau',
                'description' => 'Une étude approfondie sur les défis et opportunités de l\'entrepreneuriat des jeunes dans le département du Plateau.',
                'file_path' => 'resources/etude-entrepreneuriat-jeunes-plateau.pdf',
                'file_type' => 'pdf',
                'category' => 'etude',
                'download_count' => 312,
                'is_published' => true,
            ],
            [
                'title' => 'Manuel de formation en compostage',
                'description' => 'Support de formation détaillant les techniques de compostage domestique et communautaire.',
                'file_path' => 'resources/manuel-formation-compostage.pdf',
                'file_type' => 'pdf',
                'category' => 'manuel',
                'download_count' => 156,
                'is_published' => true,
            ],
            [
                'title' => 'Guide d\'éducation numérique pour les écoles',
                'description' => 'Guide à destination des enseignants pour l\'intégration du numérique dans les pratiques pédagogiques.',
                'file_path' => 'resources/guide-education-numerique-ecoles.pdf',
                'file_type' => 'pdf',
                'category' => 'guide',
                'download_count' => 98,
                'is_published' => true,
            ],
            [
                'title' => 'Support de formation - Gestion de projets communautaires',
                'description' => 'Document de formation destiné aux animateurs et chefs de projets communautaires.',
                'file_path' => 'resources/support-gestion-projets-communautaires.pdf',
                'file_type' => 'pdf',
                'category' => 'support',
                'download_count' => 201,
                'is_published' => true,
            ],
        ];

        foreach ($resources as $resource) {
            Resource::create($resource);
        }
    }
}
