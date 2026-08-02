<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Jardin-École du RAIL 2021',
                'slug' => 'jardin-ecole-rail-2021',
                'description' => 'Photos du Jardin-école du RAIL mis en place dans le cadre du projet PAREF.',
                'images' => [
                    'PHOTO-2021-06-28-18-08-50.jpg',
                    'PHOTO-2021-06-28-18-08-51.jpg',
                    'PHOTO-2021-06-28-18-08-52.jpg',
                    'PHOTO-2021-06-28-18-08-53.jpg',
                    'PHOTO-2021-06-28-18-08-54.jpg',
                    'PHOTO-2021-06-28-18-08-55.jpg',
                    'PHOTO-2021-06-28-18-08-56.jpg',
                    'PHOTO-2021-06-28-18-08-57.jpg',
                    'PHOTO-2021-06-28-18-08-57a.jpg',
                    'PHOTO-2021-06-28-18-08-58.jpg',
                    'PHOTO-2021-06-28-18-08-58a.jpg',
                ],
            ],
            [
                'title' => 'Remise de Matériel Scolaire 2020',
                'slug' => 'remise-materiel-scolaire-2020',
                'description' => 'Distribution de kits scolaires aux enfants dans le cadre des projets du RAIL.',
                'images' => [
                    'IMG_3965.jpg',
                    'IMG_3967.jpg',
                    'IMG_3969.jpg',
                    'IMG_3971.jpg',
                    'IMG_3974.jpg',
                    'IMG_3976.jpg',
                    'IMG_3977.jpg',
                    'IMG_3979.jpg',
                    'IMG_3982.jpg',
                    'IMG_3983.jpg',
                    'IMG_3987.jpg',
                    'IMG_3988.jpg',
                    'IMG_3990.jpeg',
                    'IMG_3991.jpg',
                    'IMG_3992.jpeg',
                ],
            ],
            [
                'title' => 'Formation Marketing Digital',
                'slug' => 'formation-marketing-digital',
                'description' => 'Sessions de formation en marketing digital pour les jeunes entrepreneurs.',
                'images' => [
                    'image1.jpg',
                    'image2.jpg',
                    'image3.jpg',
                    'image4.jpg',
                    'image5.jpg',
                    'image6.jpg',
                ],
            ],
            [
                'title' => 'Le RAIL pendant la COVID-19',
                'slug' => 'rail-pendant-covid-19',
                'description' => 'Actions du RAIL pendant la pandémie de COVID-19 pour soutenir les communautés.',
                'images' => [
                    'covid_01.jpg',
                    'covid_02.jpg',
                    'covid_03.jpg',
                    'covid_04.jpg',
                    'covid_05.jpg',
                    'covid_06.jpg',
                    'covid_07.jpg',
                    'covid_08.jpg',
                    'covid_09.jpg',
                    'covid_10.jpg',
                    'covid_11.jpg',
                    'covid_12.jpg',
                    'covid_13.jpg',
                    'covid_14.jpg',
                    'covid_15.jpg',
                    'covid_16.jpg',
                    'covid_17.jpg',
                    'covid_18.jpg',
                    'covid_19.jpg',
                    'covid_20.jpg',
                    'covid_21.jpg',
                    'covid_22.jpg',
                    'covid_23.jpg',
                    'covid_24.jpg',
                    'covid_25.jpg',
                    'covid_26.jpg',
                    'images7.jpg',
                    'images8.jpg',
                    'images9.jpg',
                    'images10.jpg',
                    'images11.jpg',
                    'images12.jpg',
                ],
            ],
            [
                'title' => 'Mission 2020 : Jeunes Entrepreneurs de l\'École Entrepreneuriale de Porto Novo',
                'slug' => 'mission-2020-jeunes-entrepreneurs-ecole-entrepreneuriale',
                'description' => 'Photos de la mission 2020 avec les jeunes entrepreneurs de l\'École Entrepreneuriale de Porto-Novo.',
                'images' => [
                    'IMG_9290.jpg',
                    'IMG_9349.jpg',
                    'IMG_9373.jpg',
                    'IMG_9379.jpg',
                    'IMG_9384.jpg',
                    'IMG_9407.jpg',
                ],
            ],
            [
                'title' => 'Mission 2020 : Les Femmes et les Enfants de Porto Novo',
                'slug' => 'mission-2020-femmes-enfants-porto-novo',
                'description' => 'Photos de la mission 2020 avec les femmes et les enfants de Porto-Novo.',
                'images' => [
                    'IMG_9201.jpg',
                    'IMG_9202.jpg',
                    'IMG_9207.jpg',
                    'IMG_9234-rotated-1.jpg',
                    'IMG_9262-rotated-1.jpg',
                    'IMG_9459.jpg',
                    'IMG_9558.jpg',
                    'IMG_9564.jpg',
                    'IMG_9580.jpg',
                    'IMG_9588.jpg',
                    'myimage.jpg',
                ],
            ],
            [
                'title' => 'Lancement de l\'École Entrepreneuriale de Porto Novo (Mars 2019)',
                'slug' => 'lancement-ecole-entrepreneuriale-mars-2019',
                'description' => 'Cérémonie de lancement de l\'École Entrepreneuriale de Porto-Novo en mars 2019.',
                'images' => [
                    'Groupe_avec_diplome.jpg',
                    'img-4260_orig.jpg',
                    'img-4277_1_orig.jpg',
                    'img-4299_orig.jpg',
                    'Les_femmes_ecoutent.jpg',
                    'lsdk1655_1.jpg',
                    'Photo_banniere_ecole.jpg',
                    'Rene_parle.jpg',
                    'Sylvie_parle.jpg',
                ],
            ],
            [
                'title' => '15e Anniversaire du Projet des Femmes de Porto Novo (Janvier 2017)',
                'slug' => '15e-anniversaire-projet-femmes-porto-novo-2017',
                'description' => 'Célébration du 15e anniversaire du projet des femmes de Porto-Novo en janvier 2017.',
                'images' => [
                    'Celebration_15e_2017.jpg',
                    'Distribution_des_fonds.jpg',
                    'img-4317_orig.jpg',
                    'img-5502_orig.jpg',
                    'img-5551_orig.jpg',
                    'img-5580_orig.jpg',
                    'img-5585_orig.jpg',
                    'img-5594_orig.jpg',
                    'img-5610_orig.jpg',
                    'img-5670_orig.jpg',
                    'img-5744_orig.jpg',
                    'img-5749_orig.jpg',
                    'img-5769_orig.jpg',
                    'img-5785_orig.jpg',
                    'rene-medaille-2017_orig.jpg',
                    'Sylvie_medaille_2017.jpg',
                ],
            ],
            [
                'title' => 'Les Femmes en Action',
                'slug' => 'les-femmes-en-action',
                'description' => 'Les femmes bénéficiaires des projets du RAIL en pleine action.',
                'images' => [
                    'img-0608_orig.jpg',
                    'img-0753_orig.jpg',
                    'img-1226_orig.jpg',
                    'img-1720_1_orig.jpg',
                    'img-1725_orig.jpg',
                    'img-1873_orig.jpg',
                    'img-1881_orig.jpg',
                    'img-1905_orig.jpg',
                    'img-1927_orig.jpg',
                    'img-3480_orig.jpg',
                    'img-4142_orig.jpg',
                    'img-4229_orig.jpg',
                    'img-4243_orig.jpg',
                    'img-4397_orig.jpg',
                    'img-4637_orig.jpg',
                    'img-4655_orig.jpg',
                    'img-4656_orig.jpg',
                    'img-4741_orig.jpg',
                    'img-5514_orig.jpg',
                    'img-9522_orig.jpg',
                    'img-9550_orig.jpg',
                    'img-9925_orig.jpg',
                    'img-9963_orig.jpg',
                    'img-e4422_orig.jpg',
                ],
            ],
            [
                'title' => 'Mission : Production de Tables Bancs pour les Écoles de Porto Novo (Novembre 2017)',
                'slug' => 'mission-production-tables-bancs-ecoles-2017',
                'description' => 'Mission de production de tables-bancs pour les écoles primaires de Porto-Novo en novembre 2017.',
                'images' => [
                    'img-1465_orig.jpg',
                    'img-1475_orig.jpg',
                    'img-1529_orig.jpg',
                    'img-1534_orig.jpg',
                    'img-1554_orig.jpg',
                    'img-1571_orig.jpg',
                ],
            ],
        ];

        foreach ($galleries as $galleryData) {
            $images = array_map(fn ($file, $index) => [
                'image' => 'images/galleries/' . $file,
                'sort_order' => $index + 1,
            ], $galleryData['images'], array_keys($galleryData['images']));

            unset($galleryData['images']);

            $galleryData['cover_image'] = $images[0]['image'];

            $gallery = Gallery::firstOrCreate(['slug' => $galleryData['slug']], $galleryData);

            foreach ($images as $imageData) {
                $gallery->images()->firstOrCreate(['image' => $imageData['image']], $imageData);
            }
        }
    }
}
