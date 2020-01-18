<?php

use Illuminate\Database\Seeder;
use App\Portfolio;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::create([
            'user_id' => 1,
            'title' => 'ISA',
            'type' => 'web_development',
            'website_url' => 'https://isaclean.ca',
            'description' => '<p>Technologies implemented:</p>
            <ul>
                <li>PHP</li>
                <li>Laravel</li>
                <li>Bootstrap</li>
                <li>SASS</li>
                <li>HTML5</li>
                <li>CSS3</li>
                <li>JavaScript</li>
            </ul>',
            'image' => '1579151841.png',
        ]);      

        Portfolio::create([
            'user_id' => 1,
            'title' => 'Sacred Light Healing Centre',
            'type' => 'web_development',
            'website_url' => 'https://sacredlighthealing.ca',
            'description' => '<p>Technologies implemented:</p>
            <ul>
                <li>PHP</li>
                <li>Laravel</li>
                <li>Bootstrap</li>
                <li>SASS</li>
                <li>HTML5</li>
                <li>CSS3</li>
                <li>JavaScript</li>
                <li>Vue.js</li>
            </ul>',
            'image' => '1579297874.png',
        ]);      
        Portfolio::create([
            'user_id' => 1,
            'title' => 'Triple C Automotive',
            'type' => 'web_development',
            'website_url' => 'https://triplecauto.ca',
            'description' => '<p>Technologies implemented:</p>
            <ul>
                <li>PHP</li>
                <li>Laravel</li>
                <li>Bootstrap</li>
                <li>SASS</li>
                <li>HTML5</li>
                <li>CSS3</li>
                <li>JavaScript</li>
                <li>Vue.js</li>
            </ul>',
            'image' => '1579306599.png',
        ]);      
        Portfolio::create([
            'user_id' => 1,
            'title' => 'Wonderful Works Of Jesus',
            'type' => 'web_development',
            'website_url' => 'https://wonderfulworksofjesus.com',
            'description' => '<p>Technologies implemented:</p>
            <ul>
                <li>PHP</li>
                <li>Laravel</li>
                <li>Bootstrap</li>
                <li>SASS</li>
                <li>HTML5</li>
                <li>CSS3</li>
                <li>JavaScript</li>
                <li>Vue.js</li>
            </ul>',
            'image' => '1579306615.png',
        ]);      
    }
}
