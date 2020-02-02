<?php

use Illuminate\Database\Seeder;
use App\CaProvince;

class CaProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $ca_provinces = [
            'AL' => 'Alberta',
            'BC' => 'British columbia',
            'MB' => 'Manitoba',
            'NB' => 'New brunswick',
            'NL' => 'Newfoundland and Labrador',
            'NT' => 'Northwest Territories',
            'NS' => 'Nova Scotia',
            'NU' => 'Nunavut',
            'ON' => 'Ontario',
            'PE' => 'Prince Edward Island',
            'QC' => 'Quebec',
            'SK' => 'Saskatchewan',
            'YT' => 'Yukon',
        ];
        foreach($ca_provinces as $iso => $ca_province) {
            CaProvince::create([
                'name' => $ca_province,
                'iso' => $iso
            ]);
        }
    }
}
