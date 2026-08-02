<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'À propos de RAIL Bénin',
                'slug' => 'a-propos',
                'content' => '<div class="prose max-w-none"><p><strong>Réseau d\'Appui aux Initiatives Locales (RAIL)</strong> a comme mission d\'améliorer les conditions de vie des populations défavorisées du Bénin. L\'organisme se donne également comme mission d\'améliorer l\'environnement et de lutter contre les effets des variations climatiques au Bénin.</p><p>Le RAIL veut apporter des <strong>solutions concrètes</strong> aux jeunes, aux femmes et à toutes personnes marginalisées. À travers des programmes participatifs et inclusifs, nous travaillons main dans la main avec les communautés locales pour co-construire des réponses adaptées à leurs réalités.</p><p>Le RAIL est une <strong>organisation non gouvernementale</strong> créée en 2003 et incorporée en 2014. L\'organisme développe des projets visant l\'autonomie de la population, le développement des compétences techniques et organisationnelles orientées vers l\'entrepreneuriat, l\'innovation et la créativité.</p><p>Nous soutenons et mettons en œuvre des initiatives sur <strong>l\'égalité entre les hommes et les femmes</strong> pour un monde plus prospère, équitable et juste. Nos programmes profitent notamment aux femmes et aux jeunes, qui sont au cœur de notre action.</p><h2>Notre Mission</h2><p>Améliorer les conditions de vie des populations défavorisées du Bénin et améliorer l\'environnement tout en luttant contre les effets des variations climatiques.</p><h2>Nos Valeurs</h2><ul><li><strong>Solidarité :</strong> Agir ensemble pour le bien-être des communautés défavorisées et promouvoir l\'entraide sociale.</li><li><strong>Durabilité :</strong> Des solutions durables pour un impact à long terme sur l\'environnement et les communautés.</li><li><strong>Équité :</strong> Promouvoir l\'égalité des genres et l\'inclusion sociale pour toutes les couches de la population.</li></ul></div>',
                'meta_title' => 'À propos de RAIL Bénin - Réseau d\'appui aux initiatives locales',
                'meta_description' => 'RAIL Bénin est une ONG créée en 2003 pour améliorer les conditions de vie des populations défavorisées du Bénin à travers l\'entrepreneuriat, l\'agriculture durable et le numérique.',
                'template' => 'default',
                'is_published' => true,
            ],
        ];

        foreach ($pages as $page) {
            Page::firstOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
