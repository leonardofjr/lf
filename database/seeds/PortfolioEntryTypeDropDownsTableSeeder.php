<?php

use Illuminate\Database\Seeder;

class PortfolioEntryTypeDropDownsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolio_entry_type_dropdowns')->insert([
            ['name' => 'web_development'],
            ['name' => 'logo_design'],
            ['name' => 'graphic_design'],
        ]);
    }
}
