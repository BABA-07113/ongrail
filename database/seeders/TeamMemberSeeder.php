<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            // Conseil d'Administration (Board)
            [
                'name' => 'Augustin BODJRENOU',
                'photo' => 'images/team/augustin.jpg',
                'position' => 'Président',
                'group' => 'conseil_administration',
                'bio' => 'Directeur Général Hôtel "La Vie est Belle", Bénin',
                'sort_order' => 1,
                'is_visible' => true,
            ],
            [
                'name' => 'Eunice HOUMENOU',
                'photo' => 'images/team/Eunice_Houmenou.jpg',
                'position' => 'Secrétaire générale',
                'group' => 'conseil_administration',
                'bio' => '',
                'sort_order' => 2,
                'is_visible' => true,
            ],
            [
                'name' => 'Diane COCO',
                'photo' => 'images/team/diane_coco.jpg',
                'position' => 'Trésorière générale',
                'group' => 'conseil_administration',
                'bio' => 'Entrepreneur, Bénin',
                'sort_order' => 3,
                'is_visible' => true,
            ],
            // Équipe Exécutive
            [
                'name' => 'Eric Prosper M. DOSSA',
                'photo' => 'images/team/eric.jpg',
                'position' => 'Directeur exécutif du RAIL',
                'group' => 'executif',
                'bio' => '',
                'sort_order' => 4,
                'is_visible' => true,
            ],
            [
                'name' => 'Cyre AHISSOUVOU',
                'photo' => 'images/team/cyre.jpg',
                'position' => 'Animatrice',
                'group' => 'executif',
                'bio' => '',
                'sort_order' => 5,
                'is_visible' => true,
            ],
            [
                'name' => 'Pedro ADJAFON',
                'photo' => 'images/team/pedro.jpg',
                'position' => 'Animateur',
                'group' => 'executif',
                'bio' => '',
                'sort_order' => 6,
                'is_visible' => true,
            ],
            [
                'name' => 'Line GNONHOSSOU',
                'photo' => 'images/team/LINE_GNONHOSSOU.jpg',
                'position' => 'Secrétaire comptable',
                'group' => 'executif',
                'bio' => '',
                'sort_order' => 7,
                'is_visible' => true,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::create($member);
        }
    }
}
