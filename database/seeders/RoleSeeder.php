<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++) {
            DB::table('roles')->insert([
                'name' => 'admin-'.$i,
                'descriptions' => 'quan tri vien - ' . $i,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
