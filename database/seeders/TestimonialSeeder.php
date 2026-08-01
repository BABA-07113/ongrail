<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Marie K.',
                'function' => 'Bénéficiaire, Programme Entrepreneuriat',
                'content' => 'Grâce à ONG RAIL, j\'ai pu lancer ma petite entreprise de transformation agricole. Leur accompagnement a été déterminant dans la réussite de mon projet.',
                'type' => 'beneficiaire',
                'is_approved' => true,
                'is_visible' => true,
            ],
            [
                'name' => 'Jean-Baptiste A.',
                'function' => 'Directeur d\'école, Pobè',
                'content' => 'L\'installation des kits solaires dans notre école a changé la vie des élèves. Ils peuvent enfin étudier le soir dans de bonnes conditions.',
                'type' => 'beneficiaire',
                'is_approved' => true,
                'is_visible' => true,
            ],
            [
                'name' => 'Fatima D.',
                'function' => 'Membre, Coopérative Agricole',
                'content' => 'Les formations en techniques agricoles durables nous ont permis d\'augmenter nos rendements tout en préservant l\'environnement. Un grand merci à toute l\'équipe.',
                'type' => 'beneficiaire',
                'is_approved' => true,
                'is_visible' => true,
            ],
            [
                'name' => 'Paul A.',
                'function' => 'Jeune Entrepreneur, Adja-Ouèrè',
                'content' => 'Le programme d\'accompagnement m\'a permis de structurer mon projet et d\'obtenir un financement de démarrage. Aujourd\'hui mon entreprise emploie 3 personnes.',
                'type' => 'beneficiaire',
                'is_approved' => true,
                'is_visible' => true,
            ],
            [
                'name' => 'Sébastien H.',
                'function' => 'Partenaire Technique',
                'content' => 'RAIL Bénin est un partenaire fiable et engagé. Leur approche participative et leur ancrage local en font un acteur incontournable du développement dans le Plateau.',
                'type' => 'partenaire',
                'is_approved' => true,
                'is_visible' => true,
            ],
            [
                'name' => 'Gisèle M.',
                'function' => 'Bénéficiaire, Formation Agroalimentaire',
                'content' => 'Grâce à la formation en transformation agroalimentaire, j\'ai appris à conserver et commercialiser mes produits. Mon revenu a doublé en six mois.',
                'type' => 'beneficiaire',
                'is_approved' => true,
                'is_visible' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
