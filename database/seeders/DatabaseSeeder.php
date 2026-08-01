<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use \Illuminate\Database\Console\Seeds\WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            CategorySeeder::class,
            ProjectCategorySeeder::class,
            PageSeeder::class,
            SettingSeeder::class,
            TeamMemberSeeder::class,
            ArticleSeeder::class,
            ProjectSeeder::class,
            GallerySeeder::class,
            OpportunitySeeder::class,
            PartnerSeeder::class,
            TestimonialSeeder::class,
            ResourceSeeder::class,
        ]);
    }
}
