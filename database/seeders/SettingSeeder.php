<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'RAIL Bénin', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Réseau d\'appui aux initiatives locales - Développement durable au Bénin', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => null, 'group' => 'general'],
            ['key' => 'site_favicon', 'value' => null, 'group' => 'general'],

            // Contact
            ['key' => 'contact_email', 'value' => 'info@ongrail.com', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+229 96 01 20 48', 'group' => 'contact'],
            ['key' => 'contact_phone_2', 'value' => '+229 97 13 46 46', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'Quartier Koutongbé, 2ème Arrondissement, 01BP1585 Porto-Novo, Bénin', 'group' => 'contact'],
            ['key' => 'contact_map_lat', 'value' => '6.4969', 'group' => 'contact'],
            ['key' => 'contact_map_lng', 'value' => '2.6036', 'group' => 'contact'],

            // Social
            ['key' => 'social_facebook', 'value' => 'https://www.facebook.com/railbenin', 'group' => 'social'],
            ['key' => 'social_twitter', 'value' => null, 'group' => 'social'],
            ['key' => 'social_linkedin', 'value' => null, 'group' => 'social'],
            ['key' => 'social_instagram', 'value' => null, 'group' => 'social'],
            ['key' => 'social_youtube', 'value' => null, 'group' => 'social'],
            ['key' => 'social_whatsapp', 'value' => '+229 96 01 20 48', 'group' => 'social'],

            // Stats (for homepage)
            ['key' => 'stat_projects', 'value' => '15+', 'group' => 'stats'],
            ['key' => 'stat_beneficiaries', 'value' => '5000+', 'group' => 'stats'],
            ['key' => 'stat_partners', 'value' => '6+', 'group' => 'stats'],
            ['key' => 'stat_years', 'value' => '23+', 'group' => 'stats'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
