<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleImage;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'super_admin')->first();

        $articles = [
            [
                'title' => "LE RAIL LANCE UN PROJET POUR LE DÉVELOPPEMENT DES COMPÉTENCES EN ENTREPRENEURIAT NUMÉRIQUE POUR LES FEMMES",
                'slug' => 'le-rail-lance-un-projet-pour-le-developpement-des-competences-en-entrepreneuriat-numerique-pour-les-femmes',
                'excerpt' => "Le RAIL met en œuvre un nouveau projet d'une durée de 6 mois, avec l'appui du Programme CLÉ et le financement d'Affaires mondiales Canada.",
                'content' => '<p>2 juin 2026- Le RAIL met en œuvre un nouveau projet d\'une durée de 6 mois, avec l\'appui du Programme CLÉ et le financement d\'Affaires mondiales Canada. Ce nouveau projet est intitulé « Développement des compétences en entrepreneuriat numérique pour une autonomisation économique des jeunes filles et femmes âgées de 18 à 35 ans à Porto-Novo ».</p><p>Ce projet vise à accompagner 50 jeunes filles et femmes en situation de vulnérabilité, en leur offrant des compétences pratiques, concrètes et directement applicables dans le domaine du numérique et de l\'entrepreneuriat.</p><p>À travers ce programme, les participantes bénéficieront de formations en outils digitaux (WhatsApp Business, Facebook Business, TikTok…); d\'ateliers pratiques de création de contenus (photos, vidéos, flyers, IA); d\'un renforcement en marketing digital et stratégie de vente en ligne; d\'un accompagnement personnalisé pour mettre leurs activités en ligne; de la création de portfolios numériques professionnels; d\'une formation en gestion simplifiée (stocks, clients, finances) et d\'un immersion professionnelle auprès de start-up à Cotonou.</p><p>Les objectifs sont de renforcer l\'autonomie économique des femmes, d\'améliorer la visibilité de leurs activités, de faciliter leur accès aux opportunités locales et digitales, de renforcer le leadership féminin et l\'inclusion sociale.</p><p>Les participantes seront encadrées par des coopérant.e.s volontaires canadien.ne.s qui nous viennent du centre de formation professionnelle (CFP) des Riverains.</p><p>À travers cette initiative, l\'ONG RAIL réaffirme sa volonté de réduire les inégalités et de donner aux jeunes femmes les moyens de réussir dans l\'économie numérique.</p>',
                'category_id' => 3,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/entreprenariat-01.jpg',
                'status' => 'published',
                'published_at' => '2026-06-02',
                'images' => [
                    ['image' => 'images/articles/entreprenariat-01.jpg', 'caption' => 'Projet entrepreneuriat numérique pour les femmes', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "LE RAIL LANCE UNE NOUVELLE COHORTE EN MARAÎCHAGE POUR UNE AGRICULTURE DURABLE",
                'slug' => 'le-rail-lance-une-nouvelle-cohorte-en-maraichage-pour-une-agriculture-durable',
                'excerpt' => "Pour une troisième année, le projet FEM (Formation en Maraîchage), lance officiellement une nouvelle cohorte composée de 30 participant·e·s.",
                'content' => '<p>13 avril 2026 – Pour une troisième année, le projet FEM (Formation en Maraîchage), lance officiellement une nouvelle cohorte. Composée de 30 participant·e·s, cette cohorte bénéficie d\'un programme de formation de trois mois axés sur les techniques de maraîchage durable, avec une attention particulière portée à l\'adaptation aux changements climatiques.</p><p>L\'objectif est de doter les bénéficiaires de compétences pratiques leur permettant de développer des exploitations agricoles productives, respectueuses de l\'environnement et résilientes face aux aléas climatiques.</p><p>Cette première rencontre a également introduit les bonnes pratiques de production biologique, ouvrant ainsi la voie à un parcours de formation prometteur et transformateur. À travers le projet FEM, le RAIL réaffirme son engagement à accompagner les jeunes et les femmes vers une agriculture plus durable, inclusive et respectueuse des écosystèmes.</p><p>Le succès de cette initiative repose sur l\'appui de partenaires techniques et financiers engagés, notamment René Dupéré, Citya ONG dirigée par Sylvie Labelle, ainsi que la Mairie de Porto-Novo.</p>',
                'category_id' => 2,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/cohorte-01.jpg',
                'status' => 'published',
                'published_at' => '2026-04-13',
                'images' => [
                    ['image' => 'images/articles/cohorte-01.jpg', 'caption' => 'Nouvelle cohorte FEM 2026', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "LE RAIL ACCUEILLE DES STAGIAIRES DE L'ÉCOLE NATIONALE SUPÉRIEURE DES TRAVAUX PUBLICS (ENSTP)",
                'slug' => 'le-rail-accueille-des-stagiaires-de-lecole-nationale-superieure-des-travaux-publics-enstp',
                'excerpt' => "L'ONG RAIL accueille deux stagiaires en troisième année de licence en Hydraulique et Assainissement, issus de l'ENSTP.",
                'content' => '<p>13 avril 2026 – Dans le cadre de son engagement en faveur de la formation pratique et de l\'innovation, l\'ONG RAIL a le plaisir d\'accueillir deux stagiaires en troisième année de licence en Hydraulique et Assainissement, issus de l\'École Nationale Supérieure des Travaux Publics (ENSTP) afin de renforcer la recherche en agriculture durable. Cette immersion, d\'une durée de trois mois, s\'inscrit dans le cadre de la rédaction de leur mémoire de fin de cycle.</p><p>Au cours de leur stage, les étudiants auront pour mission d\'approfondir leurs connaissances sur le fonctionnement du pyrolyseur, une technologie innovante utilisée pour la production de biochar.</p><p>Leur travail consistera notamment à analyser le processus de transformation des déchets organiques, évaluer la qualité du biochar produit, mesurer les quantités obtenues selon les types de matières utilisées.</p><p>Cette démarche scientifique contribue à mieux comprendre le potentiel du biochar comme solution durable pour l\'amélioration de la fertilité des sols.</p><p>L\'ONG RAIL adresse ses sincères remerciements à l\'ONG CREDEL pour son appui dans la mise en place de cette collaboration.</p>',
                'category_id' => 5,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/stagiaire-02.jpg',
                'status' => 'published',
                'published_at' => '2026-04-13',
                'images' => [
                    ['image' => 'images/articles/stagiaire-02.jpg', 'caption' => 'Stagiaires ENSTP au RAIL', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "LE RAIL RENFORCE L'ACCOMPAGNEMENT SCOLAIRE DES ENFANTS À TRAVERS LE PROJET « AIDE AUX DEVOIRS DES FILLES ET GARÇONS »",
                'slug' => 'le-rail-renforce-laccompagnement-scolaire-des-enfants-a-travers-le-projet-aide-aux-devoirs-des-filles-et-garcons',
                'excerpt' => "L'ONG RAIL a procédé au lancement officiel de la 3e année du projet Aide aux Devoirs des filles et garçons à Porto-Novo.",
                'content' => '<p>8 avril 2026 – Dans le cadre de sa mission en faveur de l\'éducation et de l\'inclusion sociale, l\'ONG RAIL a procédé au lancement officiel de la 3e année, du projet « Aide aux Devoirs des filles et garçons » à Porto-Novo. Cette initiative vise à offrir un appui scolaire renforcé aux enfants issus de familles économiquement vulnérables, afin de favoriser leur réussite académique et leur épanouissement personnel.</p><p>Le projet concerne 40 écolier·e·s, scolarisés dans les écoles publiques de Porto-Novo, du niveau CE1 au CM2. À travers des séances régulières de renforcement scolaire, ces apprenants bénéficient d\'un encadrement pédagogique adapté à leurs besoins.</p><p>La mise en œuvre de ce projet est rendue possible grâce au soutien précieux de René Dupéré et de Sylvie Labelle.</p>',
                'category_id' => 1,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/scolaire-01.jpg',
                'status' => 'published',
                'published_at' => '2026-04-08',
                'images' => [
                    ['image' => 'images/articles/scolaire-01.jpg', 'caption' => 'Aide aux devoirs des filles et garçons', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "LE RAIL FORME DES MENTORES DU PROJET AGRI-RÉSILENCE POUR UN IMPACT DURABLE",
                'slug' => 'le-rail-forme-des-mentores-du-projet-agri-resilence-pour-un-impact-durable',
                'excerpt' => "Une session de formation dédiée aux mentores du projet Femmes agri-entrepreneures et résilience (Agri-Résilience) s'est tenue à Porto-Novo.",
                'content' => '<p>31 mars 2026 – Une session de formation dédiée aux mentores du projet Femmes agri-entrepreneures et résilience (Agri-Résilience) s\'est tenue à Porto-Novo.</p><p>Pendant trois jours intensifs, les six participant.e.s ont consolidé leurs compétences en agroécologie, en production d\'intrants biologiques et en technologies énergétiques propres. Cette formation a également mis l\'accent sur le développement du leadership féminin, l\'animation communautaire et les techniques de facilitation.</p><p>Le projet est financé par le Ministère de l\'Environnement, de la Lutte contre les changements climatiques, de la Faune et des Parcs et mis en œuvre par un consortium composé de la Fondation Paul Gérin-Lajoie, de RAIL Bénin, de CREDEL, de APRETECTRA et de GECA Environnement.</p><p>Les travaux ont porté sur plusieurs axes essentiels : la gestion durable de la fertilité des sols et la production de biopesticides, les pratiques agroécologiques adaptées aux aléas climatiques, la fabrication de fertilisants naturels et d\'intrants biologiques.</p><p>Un accent particulier a été mis sur la fabrication du biochar, une solution innovante pour améliorer la fertilité des sols.</p>',
                'category_id' => 2,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/mentores-07.jpg',
                'status' => 'published',
                'published_at' => '2026-03-31',
                'images' => [
                    ['image' => 'images/articles/mentores-07.jpg', 'caption' => 'Formation des mentores Agri-Résilience', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "LE RAIL CÉLÈBRE LA JOURNÉE INTERNATIONALE DES FEMMES SUR LES THÈMES DU NUMÉRIQUE ET DE L'AUTONOMISATION",
                'slug' => 'le-rail-celebre-la-journee-internationale-des-femmes-sur-les-themes-du-numerique-et-de-lautonomisation',
                'excerpt' => "L'ONG RAIL a marqué la Journée Internationale des Droits de la Femme à travers une rencontre d'échanges sur le thème du numérique.",
                'content' => '<p>12 mars 2026 – À l\'occasion de la Journée Internationale des Droits de la Femme, l\'ONG RAIL a marqué l\'événement à travers une rencontre d\'échanges et de partage réunissant des femmes autour des enjeux actuels de leur autonomisation. Placée sous le thème « Femme à l\'ère du numérique : un levier pour l\'autonomisation », cette journée a constitué un cadre privilégié de réflexion, d\'apprentissage et d\'engagement.</p><p>La rencontre a débuté avec une intervention dynamique des stagiaires de l\'INJEPS. Leur message a mis en lumière une réalité essentielle : l\'autonomisation des femmes au sein des foyers constitue un pilier fondamental du développement social et économique au Bénin.</p><p>Sous la conduite de Madame ZEVOUNOU Bella, présidente de Wolsi ONG, les échanges ont permis de mieux comprendre le rôle du numérique comme ensemble d\'outils facilitant la communication, l\'accès à l\'information et la gestion des activités.</p><p>Nous exprimons notre profonde gratitude à nos partenaires au Ministère des Relations internationales et de la Francophonie du Québec.</p>',
                'category_id' => 3,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/journee_international-03.jpg',
                'status' => 'published',
                'published_at' => '2026-03-12',
                'images' => [
                    ['image' => 'images/articles/journee_international-03.jpg', 'caption' => 'Journée Internationale des Femmes au RAIL', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "LE RAIL ET SES PARTENAIRES LANCENT LA FORMATION EN MARAÎCHAGE AGROÉCOLOGIQUE (FEM 2026)",
                'slug' => 'le-rail-et-ses-partenaires-lancent-la-formation-en-maraichage-agroecologique-fem-2026',
                'excerpt' => "Dans le cadre du projet FEM, financé par René DUPÉRÉ, une nouvelle cohorte de formation est lancée pour l'année 2026.",
                'content' => '<p>5 mars 2026- Dans le cadre du projet Formation en Maraîchage (FEM), financé par M. René DUPÉRÉ, une nouvelle cohorte de formation est lancée pour l\'année 2026. Actuellement dans sa troisième année de mise en œuvre, ce projet vise à former 60 bénéficiaires, notamment des jeunes et des femmes, afin de renforcer leurs compétences dans le domaine de l\'agriculture durable.</p><p>Initiée par l\'ONG CITYA, en partenariat avec le RAIL ONG et la mairie de Porto-Novo, cette formation se déroulera à Porto-Novo sur une durée de trois mois de formation intensive.</p><p>À travers cette initiative, les participants bénéficieront de compétences pratiques et théoriques en maraîchage agroécologique, de connaissances en agriculture intelligente face au climat, ainsi que d\'un accompagnement vers l\'insertion professionnelle et l\'autonomie économique.</p>',
                'category_id' => 2,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/maraichage_agroecologique-01.jpg',
                'status' => 'published',
                'published_at' => '2026-03-05',
                'images' => [
                    ['image' => 'images/articles/maraichage_agroecologique-01.jpg', 'caption' => 'Formation FEM 2026', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "UNE DEUXIÈME PHASE DE FORMATION DÉMARRE POUR RENFORCER LES CAPACITÉS DES PRODUCTEURS EN INTRANTS BIOLOGIQUES",
                'slug' => 'une-deuxieme-phase-de-formation-demarre-pour-renforcer-les-capacites-des-producteurs-en-intrants-biologiques',
                'excerpt' => "Une nouvelle session de formation a été organisée dans le cadre du projet Agri-Résilience pour consolider les compétences en techniques agroécologiques.",
                'content' => '<p>17 au 19 février 2026 – Dans le cadre du projet Agri-Résilience (Femmes agri-entrepreneures et résilience), une nouvelle session de formation a été organisée au profit du personnel technique, des jeunes et des groupements partenaires afin de consolider leurs compétences en techniques agroécologiques résilientes face aux changements climatiques.</p><p>Pendant trois jours de formation intensive, les participants ont renforcé leurs connaissances pratiques sur la gestion durable des sols et la production d\'intrants biologiques locaux, directement applicables dans leurs exploitations agricoles.</p><p>Les travaux ont porté notamment sur la production de super-sol adapté aux cultures, de biofertilisants ioniques et liquides à base de Tithonia diversifolia, ainsi que sur la fabrication de biopesticides et bio-insecticides.</p><p>Cette deuxième phase confirme l\'engagement de la Fondation Paul Gérin-Lajoie et de l\'ATDA 7, aux côtés du RAIL, à promouvoir une agriculture durable.</p>',
                'category_id' => 2,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/producteurs_biologiques-02.jpg',
                'status' => 'published',
                'published_at' => '2026-02-17',
                'images' => [
                    ['image' => 'images/articles/producteurs_biologiques-02.jpg', 'caption' => 'Formation en intrants biologiques', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "LE RAIL LANCE LES FORMATIONS DU PROJET « D-CLIC, FORMEZ-VOUS AU NUMERIQUE AVEC L'OIF »",
                'slug' => 'le-rail-lance-les-formations-du-projet-d-clic-formez-vous-au-numerique-avec-loif',
                'excerpt' => "Ce projet de l'OIF s'inscrit dans le cadre de la Stratégie de la Francophonie numérique 2022-2026, mise en œuvre par l'ONG RAIL au Bénin.",
                'content' => '<p>13 janvier 2026 – Ce projet, initié et conçu par l\'Organisation internationale de la Francophonie (OIF), s\'inscrit dans le cadre de la Stratégie de la Francophonie numérique 2022-2026, qui place le numérique comme un axe stratégique prioritaire pour soutenir les initiatives des jeunes et des femmes francophones. Au Bénin, l\'ONG RAIL est le partenaire de mise en œuvre du projet.</p><p>La cérémonie de lancement s\'est tenue au siège du RAIL à Porto-Novo, en présence de 20 jeunes bénéficiaires sélectionnés, accompagnés de leurs parents et amis, des formateurs ainsi que de plusieurs acteurs locaux.</p><p>Les bénéficiaires, composés de 50 % de femmes et 50 % d\'hommes répartis en deux cohortes de dix personnes chacune, suivront trois mois de formation théorique et pratique dans les domaines du développement web, du marketing digital et de la cybersécurité, suivis de trois mois de stage en entreprise.</p>',
                'category_id' => 4,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/d-clic-01.jpg',
                'status' => 'published',
                'published_at' => '2026-01-13',
                'images' => [
                    ['image' => 'images/articles/d-clic-01.jpg', 'caption' => 'Lancement D-CLIC OIF', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "LE RAIL RENFORCE LES COMPÉTENCES AGRICOLES SUR LA PYROLYSE, LE BIOCHAR ET LES TECHNIQUES AGROÉCOLOGIQUES",
                'slug' => 'le-rail-renforce-les-competences-agricoles-sur-la-pyrolyse-le-biochar-et-les-techniques-agroecologiques',
                'excerpt' => "Dans le cadre du projet Agri-Résilience, plusieurs sessions de formation ont été organisées sur la pyrolyse et la production de biochar.",
                'content' => '<p>1er au 3 décembre 2025 – Dans le cadre du projet « Femmes agri-entrepreneures et résilience » (Agri-Résilience), plusieurs sessions de formation ont été organisées au profit du personnel de l\'ONG RAIL et de la Cellule communale Porto-Novo/Adjarra par l\'ONG CREDEL.</p><p>L\'un des thèmes centraux de la formation a porté sur la pyrolyse et la production de biochar. Les participants ont été initiés à l\'utilisation du pyrolyseur, une technologie conçue par des artisans soudeurs de Porto-Novo, permettant de produire du biochar qui améliore la fertilité des sols.</p><p>La formation a été assurée par Madame Suzanne Allaire, Directrice de GECA Environnement, avec des séances théoriques suivies de visites de terrain sur les sites d\'implantation des pyrolyseurs.</p><p>À l\'issue des sessions, Madame Christine SIMONET, Coordonnatrice et Chargée de projets internationaux senior de la Fondation Paul Gérin-Lajoie, a salué la qualité de la formation.</p>',
                'category_id' => 5,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/pyrolyse-01.jpg',
                'status' => 'published',
                'published_at' => '2025-12-01',
                'images' => [
                    ['image' => 'images/articles/pyrolyse-01.jpg', 'caption' => 'Formation pyrolyse et biochar', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "FORMATION SUR LA FABRICATION DE BIO-PESTICIDE AU JARDIN ÉCOLE DU RAIL",
                'slug' => 'formation-sur-la-fabrication-de-bio-pesticide-au-jardin-ecole-du-rail',
                'excerpt' => "Les apprenant·e·s du RAIL ont participé à une séance pratique consacrée à la production de pesticide naturel.",
                'content' => '<p>7 novembre 2025 — Dans le cadre du programme FEM (Formation En Maraîchage), les apprenant·e·s du RAIL ont participé à une séance pratique consacrée à la production de pesticide naturel, une technique simple et efficace pour protéger les cultures sans l\'utilisation de produits chimiques.</p><p>À partir d\'ingrédients locaux tels que le piment, les feuilles de papayer, les feuilles de neem, les feuilles de tabac et du savon, les participant·e·s ont appris à fabriquer un bio-pesticide capable de lutter contre plusieurs ravageurs du maraîchage.</p><p>Cette formation permet aux jeunes d\'acquérir des compétences pratiques en agriculture biologique et de contribuer à un environnement plus sain.</p>',
                'category_id' => 2,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/bio_pesticide_01.jpg',
                'status' => 'published',
                'published_at' => '2025-11-07',
                'images' => [
                    ['image' => 'images/articles/bio_pesticide_01.jpg', 'caption' => 'Fabrication de bio-pesticide', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "HUIT GROUPEMENTS DE FEMMES RENOUVELLENT LEURS PRÊTS GRÂCE AU PARTENARIAT DU RAIL AVEC UNACREP",
                'slug' => 'huit-groupements-de-femmes-renouvellent-leurs-prets-grace-au-partenariat-du-rail-avec-unacrep',
                'excerpt' => "Le RAIL, en partenariat avec l'UNACREP, a entrepris le renouvellement des prêts pour 8 groupements de femmes pour un montant de 9 000 000 FCFA.",
                'content' => '<p>6 novembre 2025 — Le RAIL, en partenariat avec l\'UNACREP (Union Nationale des Caisses Rurales d\'Épargne et de Prêt), et en l\'occurrence la CREP de Porto-Novo, a entrepris le renouvellement des prêts pour 8 groupements de femmes déjà bénéficiaires, pour un montant global de 9 000 000 FCFA (neuf millions de Francs CFA).</p><p>Cette initiative vise à renforcer l\'autonomisation économique des femmes, à consolider les acquis des activités génératrices de revenus et à encourager la pérennité des efforts entrepris pendant plusieurs années.</p><p>Le RAIL tient à remercier l\'UNACREP pour sa confiance renouvelée et a félicité chaleureusement tous les bénéficiaires pour leur engagement sans faille.</p>',
                'category_id' => 3,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/UNACREP_03.jpg',
                'status' => 'published',
                'published_at' => '2025-11-06',
                'images' => [
                    ['image' => 'images/articles/UNACREP_03.jpg', 'caption' => 'Renouvellement des prêts UNACREP', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "LE RAIL REMERCIE KÉNE DIOP POUR CES DEUX MOIS DE RENFORCEMENT EN BRODERIE NUMÉRIQUE",
                'slug' => 'le-rail-remercie-kene-diop-pour-ces-deux-mois-de-renforcement-en-broderie-numerique',
                'excerpt' => "Mme DIOP a renforcé les compétences de l'atelier de formation en stylisme, modélisme et haute couture au RAIL.",
                'content' => '<p>28 octobre 2025 – Mme DIOP a plus de 5 ans d\'expérience professionnelle dans le domaine de la broderie numérique. Elle est la co-fondatrice de « LINGUERE FABLAB », une entreprise qui œuvre dans la promotion et la formation en broderie numérique au service des jeunes et des femmes.</p><p>Dans le cadre du Programme CLÉ, Mme DIOP a été volontaire en broderie numérique déployée par l\'ONG ALPHADEV (Dakar, Sénégal). En tant qu\'instructrice en broderie numérique, elle a renforcé les compétences de l\'atelier de formation en stylisme, modélisme et haute couture au RAIL.</p><p>Le RAIL a été ravi d\'accueillir Mme DIOP au sein de son équipe il y a 2 mois, et lui souhaite le meilleur dans tous ses projets futurs.</p>',
                'category_id' => 4,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/apprenantes_02.jpg',
                'status' => 'published',
                'published_at' => '2025-10-28',
                'images' => [
                    ['image' => 'images/articles/apprenantes_02.jpg', 'caption' => 'Formation en broderie numérique', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "UN FOUR À PYROLYSE POUR LA PRODUCTION DU BIOCHAR A ÉTÉ INSTALLÉ AU SIÈGE DU RAIL",
                'slug' => 'un-four-a-pyrolyse-pour-la-production-du-biochar-a-ete-installe-au-siege-du-rail',
                'excerpt' => "Dans le cadre du projet Agri-résilience, un four à pyrolyse est désormais installé au RAIL pour produire du biochar.",
                'content' => '<p>27 octobre 2025 — Dans le cadre du projet Agri-résilience, un four à pyrolyse est désormais installé au RAIL. Cette machine de recyclage permet la décomposition des matières organiques par un processus de traitement thermique basé sur l\'action de la chaleur en atmosphère inerte, produisant ainsi des gaz, des huiles et des résidus solides (biochar).</p><p>Ce pyrolyseur permettra de produire du biochar, un charbon végétal obtenu à partir de biomasse (résidus organiques comme les noix de coco). Le biochar est riche en carbone et améliore la qualité des sols.</p><p>Ce projet, co-financé par René DUPÉRÉ et le ministère de l\'Environnement du Québec, et mené en partenariat avec la Fondation Paul Gérin-Lajoie, permettra aux producteur·rice·s d\'enrichir les terres agricoles en matières organiques.</p>',
                'category_id' => 5,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/four_01.jpg',
                'status' => 'published',
                'published_at' => '2025-10-27',
                'images' => [
                    ['image' => 'images/articles/four_01.jpg', 'caption' => 'Four à pyrolyse installé au RAIL', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "UN COMITÉ D'ORIENTATION COMMUNAUTAIRE EST MIS EN ŒUVRE POUR ACCOMPAGNER LES JEUNES DANS LEUR INSERTION PROFESSIONNELLE",
                'slug' => 'un-comite-dorientation-communautaire-est-mis-en-oeuvre-pour-accompagner-les-jeunes',
                'excerpt' => "Le Projet IDÉE poursuit son engagement pour le renforcement des capacités entrepreneuriales des jeunes au Bénin.",
                'content' => '<p>14 octobre 2025 — Le Projet Initiative Décoloniale pour une Éducation Entrepreneuriale (IDÉE), lancé en octobre 2024, poursuit son engagement pour le renforcement des capacités entrepreneuriales des jeunes au Bénin.</p><p>Dans cette dynamique, s\'est tenue la première rencontre du Comité d\'Orientation Communautaire (COC), un cadre consultatif réunissant les acteurs clés du projet.</p><p>Ce comité a pour mission d\'accompagner les jeunes entrepreneurs dans leur insertion professionnelle et de favoriser une appropriation locale des actions du projet.</p><p>L\'ONG RAIL adresse ses sincères remerciements au Ministère des Relations internationales et de la Francophonie (Québec) pour son appui précieux.</p>',
                'category_id' => 3,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/orientation_communautaire_02.jpg',
                'status' => 'published',
                'published_at' => '2025-10-14',
                'images' => [
                    ['image' => 'images/articles/orientation_communautaire_02.jpg', 'caption' => 'Comité d\'orientation communautaire', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "LE RAIL SOUTIENT LA RÉUSSITE SCOLAIRE GRÂCE À LA REMISE DE KITS SCOLAIRES AUPRÈS DES ÉCOLIERS",
                'slug' => 'le-rail-soutient-la-reussite-scolaire-grace-a-la-remise-de-kits-scolaires',
                'excerpt' => "Le RAIL a marqué une nouvelle étape dans son engagement pour l'éducation inclusive à travers le projet Aide au Devoir des Filles et Garçons.",
                'content' => '<p>17 septembre 2025 – Le RAIL a marqué une nouvelle étape dans son engagement pour l\'éducation inclusive et de qualité, à travers le projet Aide au Devoir des Filles et Garçons (ADF/G).</p><p>Dans ce cadre, une cinquantaine de kits scolaires complets ont été remis aux écolier·e·s pour le compte de l\'année académique 2025-2026. Ces dons, composés de sacs à dos, de cahiers et de fournitures diverses, viennent alléger le poids financier des familles.</p><p>Un remerciement particulier à René DUPÉRÉ et Sylvie Labelle pour leur générosité et leur engagement constant en faveur de l\'éducation.</p>',
                'category_id' => 1,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/kits_scolaire_01.jpg',
                'status' => 'published',
                'published_at' => '2025-09-17',
                'images' => [
                    ['image' => 'images/articles/kits_scolaire_01.jpg', 'caption' => 'Remise de kits scolaires', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "LE RAIL REÇOIT TROIS STAGIAIRES DE L'ONG ALTERNATIVES DE MONTRÉAL",
                'slug' => 'le-rail-recoit-trois-stagiaires-de-long-alternatives-de-montreal',
                'excerpt' => "L'ONG RAIL a accueilli trois nouvelles stagiaires internationales dans le cadre du Programme de stages internationaux pour les jeunes (PSIJ).",
                'content' => '<p>16 septembre 2025 – L\'ONG RAIL a accueilli chaleureusement trois nouvelles stagiaires internationales dans le cadre du Programme de stages internationaux pour les jeunes (PSIJ) de l\'organisme Alternatives de Montréal : Élisabeth ROY, Charlotte VAN RANDEN et Eva TAILLEFER.</p><p>Elles contribueront dans les domaines du maraîchage biologique, de l\'adaptation aux changements climatiques et de la communication sur les réseaux sociaux.</p><p>Le partenariat entre l\'ONG RAIL et l\'organisme Alternatives (Montréal) illustre le principe de solidarité internationale.</p>',
                'category_id' => 8,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/stagiaire_03.jpg',
                'status' => 'published',
                'published_at' => '2025-09-16',
                'images' => [
                    ['image' => 'images/articles/stagiaire_03.jpg', 'caption' => 'Stagiaires Alternatives Montréal', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "LE RAIL ACCUEILLE MME KÉNE DIOP DE DAKAR POUR OFFRIR UNE FORMATION EN BRODERIE NUMÉRIQUE",
                'slug' => 'le-rail-accueille-mme-kene-diop-de-dakar-pour-offrir-une-formation-en-broderie-numerique',
                'excerpt' => "Le RAIL accueille Mme Kéne DIOP, volontaire déployée par l'ONG ALPHADEV, pour former les femmes couturières en broderie numérique.",
                'content' => '<p>1er septembre 2025 — Le RAIL a accueilli dans ses locaux Mme Kéne DIOP, volontaire déployée par l\'ONG partenaire ALPHADEV basée à Dakar (Sénégal), grâce au Programme CLÉ dans le cadre du Volontariat Sud-Sud.</p><p>Spécialiste en broderie numérique, Mme DIOP séjournera au Bénin du 30 août au 30 octobre 2025. Sa mission consistera à former les femmes couturières en apprentissage au sein du RAIL.</p><p>À travers cette initiative, le Programme CLÉ contribue activement à l\'autonomisation économique des femmes, la valorisation de métiers créatifs et modernes, et le renforcement de la résilience locale.</p>',
                'category_id' => 4,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/broderie_numerique_02.jpg',
                'status' => 'published',
                'published_at' => '2025-09-01',
                'images' => [
                    ['image' => 'images/articles/broderie_numerique_02.jpg', 'caption' => 'Formation en broderie numérique', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "UNE NOUVELLE FORMATION EN COMMUNICATION POUR AMPLIFIER LES ACTIONS DU RAIL ET D'APRETECTRA",
                'slug' => 'une-nouvelle-formation-en-communication-pour-amplifier-les-actions-du-rail-et-dapretectra',
                'excerpt' => "Les équipes de communication du RAIL et d'APRETECTRA ont pris part à une formation en techniques de cadrage et montage vidéo.",
                'content' => '<p>18 août 2025 – Les équipes de communication de l\'ONG RAIL de Porto-Novo et de l\'ONG APRETECTRA de Comé ont pris part à une formation enrichissante au siège de l\'APRETECTRA dans le cadre du projet IDÉE.</p><p>Animée par le formateur M. Hounon Lorys, cette session a permis aux participants d\'explorer et de maîtriser les techniques de cadrage et de montage vidéo, des outils indispensables pour mieux valoriser nos actions sur le terrain.</p><p>Un grand merci à la Fondation Paul Gérin-Lajoie pour cette initiative qui vient renforcer les compétences des acteurs engagés pour un impact durable.</p>',
                'category_id' => 8,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/formation_04.jpg',
                'status' => 'published',
                'published_at' => '2025-08-18',
                'images' => [
                    ['image' => 'images/articles/formation_04.jpg', 'caption' => 'Formation en communication', 'sort_order' => 1],
                ],
            ],
            [
                'title' => "UN NOUVEL OUTIL POUR RENFORCER L'IMPACT DU PROJET IDÉE AU SEIN DU RAIL",
                'slug' => 'un-nouvel-outil-pour-renforcer-limpact-du-projet-idee-au-sein-du-rail',
                'excerpt' => "L'équipe projet IDÉE a accueilli la directrice de l'ONG APRETECTRA pour un atelier sur l'Approche Individuel dans le Collectif (AIC).",
                'content' => '<p>13 Août 2025 – Dans les locaux du RAIL, l\'équipe projet « IDEE » a eu le plaisir d\'accueillir la directrice de l\'ONG APRETECTRA et le volontaire attitré à un nouvel outil dénommé l\'Approche individuel dans le collectif (AIC).</p><p>L\'AIC, développée et utilisée par APRETECTRA depuis 1998, est une méthodologie innovante qui valorise l\'implication active de chaque individu au sein du groupe, afin de favoriser un changement durable et participatif.</p><p>Des échanges fructueux et inspirants ont permis un consensus entre les deux équipes autour de cette nouvelle méthodologie.</p>',
                'category_id' => 3,
                'user_id' => $admin?->id ?? 1,
                'featured_image' => 'images/articles/projet_idee_01.jpg',
                'status' => 'published',
                'published_at' => '2025-08-13',
                'images' => [
                    ['image' => 'images/articles/projet_idee_01.jpg', 'caption' => 'Atelier projet IDÉE', 'sort_order' => 1],
                ],
            ],
        ];

        foreach ($articles as $articleData) {
            $images = $articleData['images'] ?? [];
            unset($articleData['images']);

            $article = Article::firstOrCreate(['slug' => $articleData['slug']], $articleData);

            foreach ($images as $imageData) {
                $article->images()->firstOrCreate(['image' => $imageData['image']], $imageData);
            }
        }
    }
}
