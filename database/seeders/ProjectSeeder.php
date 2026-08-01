<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => "Projet d'Appui à la Résilience des Femmes de Porto Novo (PAREF)",
                'slug' => 'projet-appui-resilience-femmes-porto-novo-paref',
                'content' => "<p>Le RAIL a mis en œuvre, de janvier à septembre 2021, le projet PAREF (Projet d'appui à la résilience des Femmes de Porto–Novo), en partenariat avec la Fondation Paul Gérin-Lajoie et la Ville de Porto Novo qui a mis à disposition du Rail un terrain. Ce projet a été financé par le ministère des Relations internationales du Gouvernement du Québec.</p><p>Le PAREF a permis de mettre en place un « Jardin-école », de former une centaine de femmes en maraichage, membres de coopératives et de les familiariser à de nouvelles méthodes de production en période de pandémie. Des ateliers sur le leadership des femmes et la masculinité positive ont été réalisés. Les femmes ont reçu des équipements pour améliorer leur production et sécuriser la vente de leurs produits.</p>",
                'objectives' => '<ul><li>Mettre en place un Jardin-école</li><li>Former une centaine de femmes en maraichage</li><li>Familiariser les femmes aux nouvelles méthodes de production</li><li>Renforcer le leadership des femmes</li></ul>',
                'results' => '<ul><li>Jardin-école mis en place</li><li>100 femmes formées en maraichage</li><li>Ateliers sur le leadership et la masculinité positive réalisés</li><li>Équipements distribués pour améliorer la production</li></ul>',
                'project_category_id' => 2,
                'status' => 'termine',
                'start_date' => '2021-01-01',
                'end_date' => '2021-09-30',
                'featured_image' => 'images/galleries/PHOTO-2021-06-28-18-08-50.jpg',
                'is_featured' => true,
            ],
            [
                'title' => "Favoriser l'Autonomisation Socio-Économique et la Résilience des Femmes de Porto Novo (FAR)",
                'slug' => 'favoriser-autonomisation-socio-economique-resilience-femmes-far',
                'content' => "<p>Le projet FAR (Favoriser l'autonomisation socio-économique et la résilience des femmes de Porto Novo) a été mis en œuvre, de janvier à août 2021, par le RAIL en partenariat avec la Fondation Paul Gérin-Lajoie. Il a été financé par l'Organisation Internationale de la Francophonie.</p><p>Il a permis de financer dix nouvelles coopératives de femmes et cinq autres groupements présidées par des femmes mentors. Les femmes ont bénéficié d'un véritable « parcours » de formations afin d'augmenter leurs compétences en entrepreneuriat. Ce projet comportait un volet numérique. Une formation sur l'usage des technologies pour la collecte et la diffusion d'informations sur la COVID-19 a été offerte aux participantes. Une plate-forme a été créée.</p><p>Le projet FAR a mis à la disposition de chacune des quinze coopératives, un téléphone Android. Cinq kiosques en métal, ayant pignon sur rue, ont été offerts pour favoriser la vente des produits. Les femmes ont reçu des équipements pour augmenter leur production. Une attention particulière a été apportée à la scolarisation des filles par la distribution de 150 kits scolaires.</p>",
                'objectives' => '<ul><li>Financer de nouvelles coopératives de femmes</li><li>Offrir des formations en entrepreneuriat</li><li>Former à l\'usage des technologies numériques</li><li>Distribuer des équipements et kits scolaires</li></ul>',
                'results' => '<ul><li>15 coopératives/groupements financés</li><li>Téléphones Android distribués</li><li>5 kiosques en métal offerts</li><li>150 kits scolaires distribués</li><li>Plateforme numérique créée</li></ul>',
                'project_category_id' => 1,
                'status' => 'termine',
                'start_date' => '2021-01-01',
                'end_date' => '2021-08-31',
                'featured_image' => 'images/galleries/image1.jpg',
                'is_featured' => true,
            ],
            [
                'title' => "L'École Entrepreneuriale de Porto-Novo (EEP)",
                'slug' => 'ecole-entrepreneuriale-porto-novo-eep',
                'content' => "<p>Le RAIL a fondé la première école entrepreneuriale du Bénin en février 2019. L'École entrepreneuriale de Porto-Novo est une initiative de soutien à la création et au renforcement des entreprises. Elle s'inscrit dans une vision globale de résorption du chômage au Bénin.</p><p>Elle offre mensuellement six (6) cours de formation en entrepreneuriat aux participants et plusieurs services pour un montant forfaitaire de 10 000 F CFA :</p><ul><li>Cours de Pré-démarrage (Trouver une idée d'affaires, étude de marché et évaluation du potentiel entrepreneurial)</li><li>Modèle et plan d'affaires</li><li>Marketing et réseaux sociaux</li><li>Financement et Comptabilité</li><li>Démarrage de l'entreprise et Ressources humaines</li><li>Aspects juridiques et fiscaux de l'entreprise</li><li>Ateliers de coaching pour la réalisation des plans d'affaires</li><li>Réseautage et suivi</li></ul><p>L'École entrepreneuriale de Porto-Novo décerne à chaque fin de mois, un prix au meilleur projet d'affaires : un don de 25 000 F CFA (62 $ CAN) et un prêt de 200 000 F CFA (500 $ CAN) remboursable sur une période de 12 mois avec un taux d'intérêt de 5% l'an.</p><p>Le Maire de la Mairie de Porto-Novo M. Emmanuel ZOSSOU offre mensuellement 10 bourses pour le soutien des jeunes et femmes de la tranche d'âge entre 18 et 35 ans dont les moyens sont limités. L'École entrepreneuriale de Porto-Novo est entièrement financée par M. René DUPERE.</p>",
                'objectives' => '<ul><li>Soutenir la création et le renforcement des entreprises</li><li>Résorber le chômage au Bénin</li><li>Offrir des formations complètes en entrepreneuriat</li></ul>',
                'results' => '<ul><li>Première école entrepreneuriale du Bénin fondée en février 2019</li><li>6 cours de formation offerts mensuellement</li><li>Prix au meilleur projet d\'affaires chaque mois</li><li>10 bourses mensuelles offertes par la Mairie</li></ul>',
                'project_category_id' => 1,
                'status' => 'en_cours',
                'start_date' => '2019-02-01',
                'end_date' => null,
                'featured_image' => 'images/galleries/Photo_banniere_ecole.jpg',
                'is_featured' => true,
            ],
            [
                'title' => "Projet d'Appui à l'Entrepreneuriat des Jeunes de Porto-Novo (PAPEJ)",
                'slug' => 'projet-appui-entrepreneuriat-jeunes-porto-novo-papej',
                'content' => "<p>Démarré en 2018 par la Fondation Paul Gérin Lajoie en partenariat avec le RAIL, le projet d'appui à l'entrepreneuriat des jeunes de Porto-Novo (PAPEJ) a été financé par le programme Québec Sans Frontières du gouvernement du Québec. Le projet offre des stages internationaux aux jeunes québécois sur le thème de l'entrepreneuriat.</p><p>Depuis deux ans, l'équipe du RAIL accueille ces jeunes stagiaires québécois. Des familles de Porto-Novo hébergent les jeunes qui offrent des formations en entrepreneuriat auprès de la population béninoise pendant 12 semaines.</p>",
                'objectives' => '<ul><li>Offrir des stages internationaux aux jeunes québécois</li><li>Former la population béninoise en entrepreneuriat</li><li>Favoriser les échanges interculturels</li></ul>',
                'results' => '<ul><li>Projet démarré en 2018</li><li>Jeunes stagiaires québécois accueillis chaque année</li><li>Formations en entrepreneuriat dispensées pendant 12 semaines</li></ul>',
                'project_category_id' => 1,
                'status' => 'en_cours',
                'start_date' => '2018-01-01',
                'end_date' => null,
                'featured_image' => 'images/galleries/img-1720_1_orig.jpg',
                'is_featured' => true,
            ],
            [
                'title' => "Projet d'Appui au Parcours Entrepreneurial des Femmes de Porto-Novo (PAPEF)",
                'slug' => 'projet-appui-parcours-entrepreneurial-femmes-porto-novo-papef',
                'content' => "<p>Le Projet d'appui au parcours entrepreneurial des femmes de Porto-Novo (PAPEF) a été mis en œuvre par le RAIL de septembre 2015 à août 2018. Financé par René DUPERE et le Ministère des relations internationale et de la Francophonie du gouvernement du Québec via la Fondation Paul Gérin Lajoie, le PAPEF a appuyé 28 groupements d'activités génératrices de revenus et 300 femmes directes membres des groupements.</p><p>Il a offert aux bénéficiaires une série de formations en éducation (alphabétisation fonctionnelle en langue locale goun et en français fondamental) et en entrepreneuriat. Le projet a offert également des kits d'équipements et matériels de travail aux bénéficiaires et des prêts à caractères social à un taux d'intérêt annuel de 7%.</p><p>Le PAPEF phase 2 est en cours d'élaboration.</p>",
                'objectives' => '<ul><li>Appuyer les groupements d\'activités génératrices de revenus</li><li>Offrir des formations en alphabétisation et entrepreneuriat</li><li>Fournir des kits d\'équipements et prêts sociaux</li></ul>',
                'results' => '<ul><li>28 groupements appuyés</li><li>300 femmes bénéficiaires directes</li><li>Formations en alphabétisation (goun et français) et entrepreneuriat</li><li>Kits d\'équipements et matériels distribués</li><li>Prêts à caractère social à 7% d\'intérêt annuel</li></ul>',
                'project_category_id' => 1,
                'status' => 'termine',
                'start_date' => '2015-09-01',
                'end_date' => '2018-08-31',
                'featured_image' => 'images/galleries/Les_femmes_ecoutent.jpg',
                'is_featured' => true,
            ],
            [
                'title' => "Projet Femmes de Porto-Novo : De l'Alphabétisation à l'Entrepreneuriat",
                'slug' => 'projet-femmes-porto-novo-alphabetisation-entrepreneuriat',
                'content' => "<p>Démarré en 2002, le Projet des Femmes de Porto-Novo : de l'alphabétisation à l'entrepreneuriat a été initié par Sylvie LABELLE (Ex-Directrice Afrique de la Fondation Paul Gérin Lajoie) et financé par René DUPERE avec l'appui de la Fondation Paul Gérin Lajoie et la Mairie de Porto-Novo pendant 13 années.</p><p>Le projet offrait aux femmes défavorisées de Porto Novo, un parcours entrepreneurial d'un an et demi. Ce parcours était composé de cours d'alphabétisation, de cours de français, d'accompagnement pour la création du plan d'affaire, des formations en gestion, marketing et bonne gouvernance. Un don en moyenne de 300 000 francs CFA et un prêt de 600 000 francs CFA leur étaient accordés.</p><p>Ce projet s'adressait aux groupements de femmes en activité depuis 3 ans. Le projet a ainsi soutenu 1 500 femmes. M. René Dupéré a été le principal bailleur de fonds du projet.</p>",
                'objectives' => '<ul><li>Alphabétiser les femmes défavorisées de Porto-Novo</li><li>Offrir un parcours entrepreneurial complet</li><li>Accorder des dons et prêts pour le démarrage d\'activités</li></ul>',
                'results' => '<ul><li>1 500 femmes soutenues</li><li>13 années de projet</li><li>Parcours entrepreneurial d\'un an et demi</li><li>Don moyen de 300 000 F CFA et prêt de 600 000 F CFA</li></ul>',
                'project_category_id' => 1,
                'status' => 'termine',
                'start_date' => '2002-01-01',
                'end_date' => '2015-12-31',
                'featured_image' => 'images/galleries/img-1873_orig.jpg',
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
