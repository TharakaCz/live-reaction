<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $super_admin = Role::create(['name' => 'super_admin']);
        $admin = Role::create(['name' => 'admin']);
        $principle = Role::create(['name' => 'principle']);
        $vice_principle = Role::create(['name' => 'vice_principle']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);
        $parent = Role::create(['name' => 'parent']);

        $permissons = [
            ['id' => 1, 'name' => 'create_admin_account'],
            ['id' => 2, 'name' => 'create_teacher_account'],
            ['id' => 3, 'name' => 'create_student_account'],
            ['id' => 4, 'name' => 'create_principle_account'],
            ['id' => 5, 'name' => 'create_vice_principle_account'],
            ['id' => 6, 'name' => 'create_parent_account'],

            ['id' => 7, 'name' => 'update_admin_account'],
            ['id' => 8, 'name' => 'update_teacher_account'],
            ['id' => 9, 'name' => 'update_student_account'],
            ['id' => 10, 'name' => 'update_principle_account'],
            ['id' => 11, 'name' => 'update_vice_principle_account'],
            ['id' => 12, 'name' => 'update_parent_account'],

            ['id' => 13, 'name' => 'remove_admin_account'],
            ['id' => 14, 'name' => 'remove_teacher_account'],
            ['id' => 15, 'name' => 'remove_student_account'],
            ['id' => 16, 'name' => 'remove_principle_account'],
            ['id' => 17, 'name' => 'remove_vice_principle_account'],
            ['id' => 18, 'name' => 'remove_parent_account'],

            ['id' => 19, 'name' => 'create_attendence'],
            ['id' => 20, 'name' => 'update_attendence'],
            ['id' => 21, 'name' => 'remove_attendence'],
            ['id' => 22, 'name' => 'view_attendence'],

            ['id' => 23, 'name' => 'create_exam'],
            ['id' => 24, 'name' => 'update_exam'],
            ['id' => 25, 'name' => 'remove_exam'],
            ['id' => 26, 'name' => 'view_exam'],

            ['id' => 27, 'name' => 'create_event'],
            ['id' => 28, 'name' => 'update_event'],
            ['id' => 29, 'name' => 'remove_event'],
            ['id' => 30, 'name' => 'view_event'],

            ['id' => 31, 'name' => 'create_time_table'],
            ['id' => 32, 'name' => 'update_time_table'],
            ['id' => 33, 'name' => 'remove_time_table'],
            ['id' => 34, 'name' => 'view_time_table'],

            ['id' => 35, 'name' => 'view_students'],
            ['id' => 36, 'name' => 'view_teachers'],
            ['id' => 37, 'name' => 'view_principle'],
            ['id' => 38, 'name' => 'view_vice_principles'],
            ['id' => 39, 'name' => 'view_parents'],

            ['id' => 40, 'name' => 'create_inquiry'],
            ['id' => 41, 'name' => 'remove_inquiry'],
            ['id' => 42, 'name' => 'update_inquiry'],
            ['id' => 43, 'name' => 'view_inquiry'],

            ['id' => 44, 'name' => 'create_donations'],
            ['id' => 45, 'name' => 'update_donations'],
            ['id' => 46, 'name' => 'remove_donations'],
            ['id' => 47, 'name' => 'view_donations'],

            ['id' => 48, 'name' => 'create_student_progress'],
            ['id' => 49, 'name' => 'update_student_progress'],
            ['id' => 50, 'name' => 'remove_student_progress'],
            ['id' => 51, 'name' => 'view_student_progress'],

            ['id' => 52, 'name' => "create_reports"],
            ['id' => 53, 'name' => 'update_reports'],
            ['id' => 54, 'name' => 'remove_reports'],
            ['id' => 55, 'name' => 'view_reports'],
            ['id' => 56, 'name' => 'download_reports'],

        ];

        if(!$this->createPermission($permissons)){
            Log::error('Permission creation has a problem.');
            exit;
        }

        $admin_permissions = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16,
            17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34,
            35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52,
            53, 54, 55, 56];

        $principle_permissions = [19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31,
            32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50,
            51, 52, 53, 54, 55, 56];

        $vice_principle_permissions = [19, 20, 22, 23, 24, 26, 27, 28, 30, 31,
            32, 34, 35, 36, 37, 38, 39, 40, 42, 44, 45, 47, 48, 49,
            51, 52, 53, 55, 56];

        $teacher_permissions = [20, 22, 23, 24, 26, 30, 31,
            32, 34, 35, 36, 39, 40, 42, 48, 49,
            51, 52, 53, 56];

        $student_permissions = [22, 26, 30, 32, 34, 51, 52, 53, 56];

        $parent_permissions = [22, 26, 30, 32, 34, 51, 52, 53];

        $super_admin->syncPermissions(Permission::all());
        $admin->syncPermissions($admin_permissions);
        $principle->syncPermissions($principle_permissions);
        $vice_principle->syncPermissions($vice_principle_permissions);
        $teacher->syncPermissions($teacher_permissions);
        $student->syncPermissions($student_permissions);
        $parent->syncPermissions($parent_permissions);

    }

    private function createPermission($permissions){
        if (count($permissions) > 0){
            try {
                foreach ($permissions as $key => $permission){
                    if (!empty($up = Permission::query()->where('name', $permission)->first())){
                        if (!Permission::query()
                            ->where('id', $up->id)
                            ->update(['name' => $permission->name])){
                            return false;
                        }
                    }else{
                        if (!Permission::create($permission)){
                            return false;
                        }
                    }
                }
                return true;
            }catch (\Exception $ex){
                Log::error($ex->getMessage());
            }
        }
        return false;
    }
}
