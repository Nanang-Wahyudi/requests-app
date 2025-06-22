<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesDepartmentsRequestTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

         // Insert roles
         $adminRoleId = DB::table('roles')->insertGetId([
            'name' => 'admin',
            'guard_name' => 'web',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

         $agentRoleId = DB::table('roles')->insertGetId([
            'name' => 'agent',
            'guard_name' => 'web',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

         $userRoleId  = DB::table('roles')->insertGetId([
            'name' => 'user',
            'guard_name' => 'web',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
 
         // Insert departments
         $managerITDeptId = DB::table('departments')->insertGetId([
             'department_name' => 'Manager IT',
             'role_id' => $adminRoleId
         ]);
 
         $developerDeptId = DB::table('departments')->insertGetId([
             'department_name' => 'Developer',
             'role_id' => $userRoleId
         ]);
 
         $archDeptId = DB::table('departments')->insertGetId([
             'department_name' => 'IT Architecture',
             'role_id' => $agentRoleId
         ]);
 
         $infraDeptId = DB::table('departments')->insertGetId([
             'department_name' => 'IT Infrastructure',
             'role_id' => $agentRoleId
         ]);
 
         $netDeptId = DB::table('departments')->insertGetId([
             'department_name' => 'IT Network',
             'role_id' => $agentRoleId
         ]);
 
         $devSecDeptId = DB::table('departments')->insertGetId([
             'department_name' => 'DevSecOps',
             'role_id' => $agentRoleId
         ]);
 
         $dbaDeptId = DB::table('departments')->insertGetId([
             'department_name' => 'Database Administrator',
             'role_id' => $agentRoleId
         ]);
 
         // Insert request types
         DB::table('request_types')->insert([
             ['request_type_name' => 'Server Specification Upgrade', 'department_id' => $infraDeptId],
             ['request_type_name' => 'Server Software Installation', 'department_id' => $infraDeptId],
             ['request_type_name' => 'Architecture Documentation', 'department_id' => $archDeptId],
             ['request_type_name' => 'Architrcture Review', 'department_id' => $archDeptId],
             ['request_type_name' => 'IP Address Alocation', 'department_id' => $netDeptId],
             ['request_type_name' => 'Firewall Access', 'department_id' => $netDeptId],
             ['request_type_name' => 'Security Scan', 'department_id' => $devSecDeptId],
             ['request_type_name' => 'Production Merge', 'department_id' => $devSecDeptId],
             ['request_type_name' => 'Query Execution', 'department_id' => $dbaDeptId],
             ['request_type_name' => 'Data Retrieval', 'department_id' => $dbaDeptId],
         ]);
    }
}
