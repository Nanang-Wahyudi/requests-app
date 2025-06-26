<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesRequestTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

         // Insert roles
         $infraRoleId = DB::table('roles')->insertGetId([
            'name' => 'IT Infrastructure',
            'guard_name' => 'web',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

         $archRoleId = DB::table('roles')->insertGetId([
            'name' => 'IT Architecture',
            'guard_name' => 'web',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

         $netRoleId  = DB::table('roles')->insertGetId([
            'name' => 'IT Network',
            'guard_name' => 'web',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $devSecRoleId  = DB::table('roles')->insertGetId([
            'name' => 'DevSecOps',
            'guard_name' => 'web',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $dbaRoleId  = DB::table('roles')->insertGetId([
            'name' => 'Database Administrator',
            'guard_name' => 'web',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $devRoleId  = DB::table('roles')->insertGetId([
            'name' => 'Developer',
            'guard_name' => 'web',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $managerRoleId  = DB::table('roles')->insertGetId([
            'name' => 'Manager IT',
            'guard_name' => 'web',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

         // Insert request types
         DB::table('request_types')->insert([
             ['request_type_name' => 'Server Specification Upgrade', 'role_id' => $infraRoleId],
             ['request_type_name' => 'Server Software Installation', 'role_id' => $infraRoleId],
             ['request_type_name' => 'Architecture Documentation', 'role_id' => $archRoleId],
             ['request_type_name' => 'Architrcture Review', 'role_id' => $archRoleId],
             ['request_type_name' => 'IP Address Alocation', 'role_id' => $netRoleId],
             ['request_type_name' => 'Firewall Access', 'role_id' => $netRoleId],
             ['request_type_name' => 'Security Scan', 'role_id' => $devSecRoleId],
             ['request_type_name' => 'Production Merge', 'role_id' => $devSecRoleId],
             ['request_type_name' => 'Query Execution', 'role_id' => $dbaRoleId],
             ['request_type_name' => 'Data Retrieval', 'role_id' => $dbaRoleId],
         ]);
    }
}
