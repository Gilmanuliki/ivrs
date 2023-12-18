<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'total_create',
            ],
            [
                'id'    => 18,
                'title' => 'total_edit',
            ],
            [
                'id'    => 19,
                'title' => 'total_show',
            ],
            [
                'id'    => 20,
                'title' => 'total_delete',
            ],
            [
                'id'    => 21,
                'title' => 'total_access',
            ],
            [
                'id'    => 22,
                'title' => 'station_create',
            ],
            [
                'id'    => 23,
                'title' => 'station_edit',
            ],
            [
                'id'    => 24,
                'title' => 'station_show',
            ],
            [
                'id'    => 25,
                'title' => 'station_delete',
            ],
            [
                'id'    => 26,
                'title' => 'station_access',
            ],
            [
                'id'    => 27,
                'title' => 'source_create',
            ],
            [
                'id'    => 28,
                'title' => 'source_edit',
            ],
            [
                'id'    => 29,
                'title' => 'source_show',
            ],
            [
                'id'    => 30,
                'title' => 'source_delete',
            ],
            [
                'id'    => 31,
                'title' => 'source_access',
            ],
            [
                'id'    => 32,
                'title' => 'add_income_create',
            ],
            [
                'id'    => 33,
                'title' => 'add_income_edit',
            ],
            [
                'id'    => 34,
                'title' => 'add_income_show',
            ],
            [
                'id'    => 35,
                'title' => 'add_income_delete',
            ],
            [
                'id'    => 36,
                'title' => 'add_income_access',
            ],
            [
                'id'    => 37,
                'title' => 'income_access',
            ],
            [
                'id'    => 38,
                'title' => 'visitor_access',
            ],
            [
                'id'    => 39,
                'title' => 'income_report_create',
            ],
            [
                'id'    => 40,
                'title' => 'income_report_edit',
            ],
            [
                'id'    => 41,
                'title' => 'income_report_show',
            ],
            [
                'id'    => 42,
                'title' => 'income_report_delete',
            ],
            [
                'id'    => 43,
                'title' => 'income_report_access',
            ],
            [
                'id'    => 44,
                'title' => 'report_access',
            ],
            [
                'id'    => 45,
                'title' => 'visitors_report_create',
            ],
            [
                'id'    => 46,
                'title' => 'visitors_report_edit',
            ],
            [
                'id'    => 47,
                'title' => 'visitors_report_show',
            ],
            [
                'id'    => 48,
                'title' => 'visitors_report_delete',
            ],
            [
                'id'    => 49,
                'title' => 'visitors_report_access',
            ],
            [
                'id'    => 50,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
