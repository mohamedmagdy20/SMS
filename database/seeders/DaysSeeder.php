<?php

namespace Database\Seeders;

use App\Models\Days;
use Illuminate\Database\Seeder;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'name'=>'السبت',
            ],
            [
                'name'=>'الاحد',
            ],
            [
                'name'=>'الاثنين',
            ],
            [
                'name'=>'الثلاثاء',
            ],
            [
                'name'=>'الاربعاء',
            ],
            [
                'name'=>'الخميس',
            ],
            [
                'name'=>'الجمعه',
            ]
            ];

            foreach($data as $d)
            {
                Days::create($d);
            }
    }
}
