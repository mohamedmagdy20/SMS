<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name'=>'show_mangers',
                'display_name'=>'عرض الادارين',
                'description'=>''
            
            ],

            [
                'name'=>'add_mangers',
                'display_name'=>'اضافه الادارين',
                'description'=>''
            
            ],


            [
                'name'=>'edit_mangers',
                'display_name'=>'تعديل الادارين',
                'description'=>''
            
            ],


            [
                'name'=>'delete_mangers',
                'display_name'=>'مسح الادارين',
                'description'=>''
            
            ],


            [
                'name'=>'show_roles',
                'display_name'=>'عرض الوظائف',
                'description'=>''
            
            ],

            [
                'name'=>'add_roles',
                'display_name'=>'اضافه الوظائف',
                'description'=>''
            
            ],

            [
                'name'=>'edit_roles',
                'display_name'=>'تعديل الوظائف',
                'description'=>''
            
            ],


        ];

        foreach($data as $d)
        {
            Permission::create($d);
        }
    }
}
