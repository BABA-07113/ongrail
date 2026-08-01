<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            // Financier
            [
                'name' => 'René DUPÉRÉ',
                'logo' => null,
                'website_url' => '#',
                'description' => 'Originaire du Québec, Canada et compositeur de musique notamment au Cirque du Soleil, M. René Dupéré est le principal partenaire financier (bailleur de fonds) du Réseau d\'Appui aux Initiatives locales (RAIL). Il s\'investit depuis plus de 15 ans dans la lutte contre la pauvreté féminine et juvénile au Bénin (plus précisément dans la ville de Porto-Novo).',
                'category' => 'financier',
                'is_visible' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Fondation Paul Gérin Lajoie',
                'logo' => null,
                'website_url' => '#',
                'description' => 'Fondée par M. Paul Gérin Lajoie, premier ministre de l\'éducation du Québec, la Fondation Paul Gérin Lajoie est un important partenaire du Réseau d\'Appui aux Initiatives Locales (RAIL). La Fondation a été notamment partenaire du PAPEF (Projet d\'appui au parcours entrepreneurial des Femmes de Porto Novo 2016-2018), financé par René Dupéré et le gouvernement du Québec. Elle a été initiatrice des projets QSF (Québec Sans Frontières).',
                'category' => 'financier',
                'is_visible' => true,
                'sort_order' => 2,
            ],
            // Institutionnel
            [
                'name' => 'Ville de Porto-Novo',
                'logo' => null,
                'website_url' => '#',
                'description' => 'La Ville de Porto-Novo est un grand partenaire institutionnel local du Réseau d\'Appui aux Initiatives Locales (RAIL). Elle a mis à la disposition du RAIL deux bâtiments depuis sa fondation afin d\'héberger l\'équipe de travail et les coopérants canadiens qui viennent régulièrement au Bénin. Elle accompagne le projet de l\'École entrepreneuriale de Porto-Novo en offrant aux jeunes hommes et femmes de 18 à 35 ans, des bourses de participation aux cours d\'entrepreneuriat. Le maire, M. Emmanuel Zossou offre "les bourses du maire pour la jeunesse", un total de 10 bourses par mois.',
                'category' => 'institutionnel',
                'is_visible' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Ministère des Relations Internationales et de la Francophonie du Québec',
                'logo' => null,
                'website_url' => '#',
                'description' => 'Le Ministère des relations internationales et de la Francophonie du Québec donne des appuis financiers au Réseau d\'Appui aux Initiatives Locales (RAIL) par l\'intermédiaire de la Fondation Paul Gérin Lajoie. De 2016 à 2018, le Ministère a financé le Projet d\'appui au parcours entrepreneurial des femmes de Porto-Novo (PAPEF). Il finance actuellement le projet d\'appui à la promotion de l\'entrepreneuriat des jeunes de Porto-Novo (PAPEJ-Bénin) dans le cadre du programme Québec Sans Frontières (QSF).',
                'category' => 'institutionnel',
                'is_visible' => true,
                'sort_order' => 4,
            ],
            [
                'name' => "Carrefour Jeunesse Emploi du Comté Iberville-St-Jean (Québec)",
                'logo' => null,
                'website_url' => '#',
                'description' => "Le Carrefour Jeunesse Emploi du comté Iberville-St-Jean au Québec a comme mission d'accompagner et de supporter les jeunes adultes âgés de 16 à 35 ans dans leur cheminement vers l'emploi, pour un retour aux études ou pour la création de leur entreprise. Dirigée par Martine Roy depuis 1996, le Carrefour Jeunesse Emploi a réalisé, en partenariat avec le RAIL et les Offices Jeunesse Internationaux du Québec, des projets de volontariats au Bénin avec des groupes de jeunes. Ils se sont donnés comme mandat de fabriquer des tables bancs pour les écoles primaires de la ville de Porto-Novo.",
                'category' => 'institutionnel',
                'is_visible' => true,
                'sort_order' => 5,
            ],
            // Technique
            [
                'name' => 'ONG CITYA (Québec)',
                'logo' => null,
                'website_url' => '#',
                'description' => "L'ONG CITYA (Centre international pour le développement socio-économique urbain) a été fondée en 2002 par Sylvie Labelle, initiatrice du projet Femmes de Porto-Novo : de l'alphabétisation à l'entrepreneuriat. Elle a été directrice Afrique de la Fondation Paul Gérin Lajoie pendant cinq années (2002-2007) et conseillère senior au PNUD Gabon (2007-2009). De nationalité canadienne, elle a été pendant plus de 20 ans commissaire au Service de développement économique de la Ville de Montréal. L'ONG CITYA a comme mission le développement socio économique et urbain des villes et de leur population dans les pays en voie de développement.",
                'category' => 'technique',
                'is_visible' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
