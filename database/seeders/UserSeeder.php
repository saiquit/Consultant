<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $users = \App\Models\User::factory(10)->hasExpertises(10)->create();
        // foreach ($users as $user) {
        //     \App\Models\Profile::factory([
        //         'user_id' => $user->id
        //     ])->count(1)->create();

        //     if ($user->type == 'company') {
        //         \App\Models\Project::factory([
        //             'service_id' => random_int(1, 10),
        //             'author_id' => $user->id
        //         ])->count(2)->create();
        //     }
        // }
        $admin_user = \App\Models\User::factory([
            'name' => 'admin',
            'email' => 'office@xpertgroupbd.com',
            'password' => bcrypt('Eli@s2948'), // password
            'type'  => 'admin'
        ])->create();
        \App\Models\Profile::factory([
            'user_id' => $admin_user->id
        ])->count(1)->create();
        // $company_user = \App\Models\User::factory([
        //     'name' => 'company',
        //     'email' => 'company@xpertgroupbd.com',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'type'  => 'company'
        // ])->create();
        // \App\Models\CompanyProfile::factory([
        //     'user_id' => $company_user->id
        // ])->count(1)->create();
        // $expert_user = \App\Models\User::factory([
        //     'name' => 'expert',
        //     'email' => 'expert@xpertgroupbd.com',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'type'  => 'expert'
        // ])->create();
        // \App\Models\Profile::factory([
        //     'user_id' => $expert_user->id
        // ])->count(1)->create();
    }
}
