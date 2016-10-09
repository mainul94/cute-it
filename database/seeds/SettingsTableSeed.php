<?php

use Illuminate\Database\Seeder;

class SettingsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'property' => 'primary_menu',
                'property_values' => null,
	            's_group' =>null
            ],
            [
                'property' => 'footer_menu',
                'property_values' => null,
	            's_group' =>null
            ],
            [
                'property' => 'home_slide',
                'property_values' => null,
	            's_group' =>null
            ],
            [
                'property' => 'home_recent_news_category',
                'property_values' => null,
	            's_group' =>null
            ],
            [
                'property' => 'facebook_link',
                'property_values' => null,
                's_group' => 'social_link'
            ],
            [
                'property' => 'twitter_link',
                'property_values' => null,
                's_group' => 'social_link'
            ],
            [
                'property' => 'google_plus_link',
                'property_values' => null,
                's_group' => 'social_link'
            ],
            [
                'property' => 'youtube_link',
                'property_values' => null,
                's_group' => 'social_link'
            ],
            [
                'property' => 'linkdin_link',
                'property_values' => null,
                's_group' => 'social_link'
            ],
            [
                'property' => 'pinterest_link',
                'property_values' => null,
                's_group' => 'social_link'
            ],
            [
                'property' => 'google_mpa_lat_lng',
                'property_values' => null,
                's_group' => 'social_link'
            ]
        ];
	    DB::table('settings')->insert($settings);
    }
}
