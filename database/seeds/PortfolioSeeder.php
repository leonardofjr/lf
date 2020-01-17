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
            'description' => '<p>Technologies implemented:</p>,
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
    }
}
