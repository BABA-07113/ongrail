<?php

namespace Database\Seeders;

use App\Models\Opportunity;
use Illuminate\Database\Seeder;

class OpportunitySeeder extends Seeder
{
    public function run(): void
    {
        $opportunities = [
            [
                'title' => 'Appel à candidatures - Programme d\'accompagnement des jeunes entrepreneurs 2025',
                'slug' => 'appel-candidatures-accompagnement-jeunes-entrepreneurs-2025',
                'description' => '<p>L\'ONG RAIL Bénin lance la 3e édition de son programme d\'accompagnement destiné aux jeunes entrepreneurs du département du Plateau.</p><p><strong>Domaines éligibles :</strong></p><ul><li>Agriculture et transformation agroalimentaire</li><li>Numérique et technologies</li><li>Artisanat et services</li><li>Environnement et développement durable</li></ul><p><strong>Avantages :</strong></p><ul><li>Accompagnement technique personnalisé</li><li>Financement de démarrage jusqu\'à 500 000 FCFA</li><li>Mise en réseau avec des partenaires</li><li>Suivi pendant 12 mois</li></ul>',
                'type' => 'appel_candidature',
                'deadline' => '2025-12-31',
                'status' => 'ouvert',
                'is_published' => true,
            ],
            [
                'title' => 'Recrutement d\'un(e) Chargé(e) de Projet',
                'slug' => 'recrutement-charge-projet',
                'description' => '<p>Dans le cadre de l\'extension de ses activités, ONG RAIL Bénin recrute un(e) Chargé(e) de Projet.</p><p><strong>Missions :</strong></p><ul><li>Coordonner la mise en œuvre des projets terrain</li><li>Assurer le suivi-évaluation des activités</li><li>Rédiger les rapports techniques</li><li>Animer les relations avec les partenaires locaux</li></ul><p><strong>Profil recherché :</strong></p><ul><li>Bac+3 minimum en développement local, gestion de projet ou domaine connexe</li><li>Expérience d\'au moins 2 ans dans un poste similaire</li><li>Maitrise des outils informatiques</li><li>Capacité à travailler en équipe</li></ul>',
                'type' => 'emploi',
                'deadline' => '2025-09-30',
                'status' => 'ouvert',
                'is_published' => true,
            ],
            [
                'title' => 'Programme de volontariat communautaire',
                'slug' => 'programme-volontariat-communautaire',
                'description' => '<p>ONG RAIL Bénin lance son programme de volontariat communautaire ouvert aux jeunes âgés de 18 à 35 ans.</p><p><strong>Domaines d\'intervention :</strong></p><ul><li>Sensibilisation environnementale</li><li>Alphabétisation et éducation</li><li>Appui aux activités agricoles</li><li>Animation communautaire</li></ul><p>Les volontaires recevront une formation et une indemnité de transport.</p>',
                'type' => 'volontariat',
                'deadline' => '2025-10-15',
                'status' => 'ouvert',
                'is_published' => true,
            ],
            [
                'title' => 'Formation en maraîchage agroécologique',
                'slug' => 'formation-maraichage-agroecologique',
                'description' => '<p>Inscrivez-vous à notre programme de formation en techniques de maraîchage agroécologique.</p><p><strong>Contenu de la formation :</strong></p><ul><li>Techniques de compostage et fertilisation biologique</li><li>Gestion intégrée des ravageurs</li><li>Irrigation et gestion de l\'eau</li><li>Commercialisation des produits maraîchers</li></ul><p>La formation est gratuite et ouverte à tous les agriculteurs du département du Plateau.</p>',
                'type' => 'formation',
                'deadline' => '2025-11-01',
                'status' => 'ouvert',
                'is_published' => true,
            ],
            [
                'title' => 'Stage en communication digitale',
                'slug' => 'stage-communication-digitale',
                'description' => '<p>ONG RAIL Bénin offre un stage en communication digitale pour un(e) étudiant(e) en fin de cycle.</p><p><strong>Missions :</strong></p><ul><li>Gestion des réseaux sociaux</li><li>Création de contenu (textes, images, vidéos)</li><li>Rédaction d\'articles pour le site web</li><li>Appui à l\'organisation d\'événements</li></ul><p><strong>Durée :</strong> 3 mois renouvelable</p><p><strong>Indemnité :</strong> 50 000 FCFA/mois</p>',
                'type' => 'stage',
                'deadline' => '2025-08-31',
                'status' => 'ouvert',
                'is_published' => true,
            ],
            [
                'title' => 'Résultats - Appel à candidatures 2024',
                'slug' => 'resultats-appel-candidatures-2024',
                'description' => '<p>Les résultats de l\'appel à candidatures 2024 pour le programme d\'accompagnement des jeunes entrepreneurs sont disponibles.</p><p>15 candidats ont été retenus sur 120 dossiers reçus. Les lauréats seront contactés individuellement par nos équipes.</p>',
                'type' => 'appel_candidature',
                'deadline' => '2024-06-30',
                'status' => 'resultats_publies',
                'results_description' => '15 candidats retenus sur 120 dossiers reçus. Félicitations à tous les lauréats !',
                'is_published' => true,
            ],
        ];

        foreach ($opportunities as $opportunity) {
            Opportunity::create($opportunity);
        }
    }
}
