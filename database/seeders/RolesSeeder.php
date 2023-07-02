<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name'=>'super_admin',
                'display_name'=>'المالك',
                'description'=>'له كل صلاحيات'
               
            ],

            [
                'name'=>'admin',
                'display_name'=>'المدير',
                'description'=>'له صلاحيات الادراه'
            ],

            
            [
                'name'=>'teacher',
                'display_name'=>'معلم',
                'description'=>'له صلاحيات المعلم'
            ],

            
            [
                'name'=>'parent',
                'display_name'=>'ولي الامر',
                'description'=>'له صلاحيات اولياء الامور'
            ],

            [
                'name'=>'student',
                'display_name'=>'طالب',
                'description'=>'له صلاحيات الطلاب '
            ],
        ];

        foreach($data as $d)
        {
            Role::create($d);
        }
    }
}
