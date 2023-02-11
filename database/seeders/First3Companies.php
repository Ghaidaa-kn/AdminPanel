<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use Illuminate\support\facades\DB;


class First3Companies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
        [
        	'name' => 'firstCompany',
            'email' => 'firstCompany@gmail.com',
            'website' => 'firstCompany.com',
            'logo' => 'first.jfif',
 
        ],
        [
        	'name' => 'secodCompany',
            'email' => 'secondCompany@gmail.com',
            'website' => 'secodCompany.com',
            'logo' => 'second.jfif',
        ],
        [
        	'name' => 'thirdCompany',
            'email' => 'thirdCompany@gmail.com',
            'website' => 'thirdCompany.com',
            'logo' => 'third.webp',
        ]
      ]);
    }
}
