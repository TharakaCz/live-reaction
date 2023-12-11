<?php

namespace Database\Seeders;

use App\Models\User;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = new User();
        $super_admin->user_id = Uuid::uuid4();
        $super_admin->first_name = fake()->name;
        $super_admin->last_name = fake()->name;
        $super_admin->email = "super.user@email.com";
        $super_admin->password = Hash::make("SuPer%U007");
        $super_admin->address_1 = fake()->address;
        $super_admin->token = md5($super_admin->email. '.' .time(). '.' .$super_admin->user_id);
        $super_admin->avatar = Gravatar::get($super_admin->email, ['size' => 500]);
        $super_admin->avatar_type = User::gravatar;
        $super_admin->assignRole('super_admin');
        $super_admin->save();

        $admin = new User();
        $admin->user_id = Uuid::uuid4();
        $admin->first_name = fake()->name;
        $admin->last_name = fake()->name;
        $admin->email = "admin.user@email.com";
        $admin->password = Hash::make("admin%U008");
        $admin->address_1 = fake()->address;
        $admin->token = md5($admin->email. '.' .time(). '.' .$admin->user_id);
        $admin->avatar = Gravatar::get($admin->email, ['size' => 500]);
        $admin->avatar_type = User::gravatar;
        $admin->assignRole('admin');
        $admin->save();

        $principle = new User();
        $principle->user_id = Uuid::uuid4();
        $principle->first_name = fake()->name;
        $principle->last_name = fake()->name;
        $principle->email = "principle.user@email.com";
        $principle->password = Hash::make("principle%U048");
        $principle->address_1 = fake()->address;
        $principle->token = md5($principle->email. '.' .time(). '.' .$principle->user_id);
        $principle->avatar = Gravatar::get($principle->email, ['size' => 500]);
        $principle->avatar_type = User::gravatar;
        $principle->assignRole('principle');
        $principle->save();

        $vice_principle = new User();
        $vice_principle->user_id = Uuid::uuid4();
        $vice_principle->first_name = fake()->name;
        $vice_principle->last_name = fake()->name;
        $vice_principle->email = "vice.principle@email.com";
        $vice_principle->password = Hash::make("vicE&principle%j002");
        $vice_principle->address_1 = fake()->address;
        $vice_principle->token = md5($vice_principle->email. '.' .time(). '.' .$vice_principle->user_id);
        $vice_principle->avatar = Gravatar::get($vice_principle->email, ['size' => 500]);
        $vice_principle->avatar_type = User::gravatar;
        $vice_principle->assignRole('vice_principle');
        $vice_principle->save();

        $teacher = new User();
        $teacher->user_id = Uuid::uuid4();
        $teacher->first_name = fake()->name;
        $teacher->last_name = fake()->name;
        $teacher->email = "teacher@email.com";
        $teacher->password = Hash::make("teacher%hG802");
        $teacher->address_1 = fake()->address;
        $teacher->token = md5($teacher->email. '.' .time(). '.' .$teacher->user_id);
        $teacher->avatar = Gravatar::get($teacher->email, ['size' => 500]);
        $teacher->avatar_type = User::gravatar;
        $teacher->assignRole('teacher');
        $teacher->save();

        $student = new User();
        $student->user_id = Uuid::uuid4();
        $student->first_name = fake()->name;
        $student->last_name = fake()->name;
        $student->email = "student@email.com";
        $student->password = Hash::make("Stu%086Ktw");
        $student->address_1 = fake()->address;
        $student->token = md5($student->email. '.' .time(). '.' .$student->user_id);
        $student->avatar = Gravatar::get($student->email, ['size' => 500]);
        $student->avatar_type = User::gravatar;
        $student->assignRole('student');
        $student->save();

        $parent = new User();
        $parent->user_id = Uuid::uuid4();
        $parent->first_name = fake()->name;
        $parent->last_name = fake()->name;
        $parent->email = "parent@email.com";
        $parent->password = Hash::make("PeR^083kH");
        $parent->address_1 = fake()->address;
        $parent->token = md5($parent->email. '.' .time(). '.' .$parent->user_id);
        $parent->avatar = Gravatar::get($parent->email, ['size' => 500]);
        $parent->avatar_type = User::gravatar;
        $parent->assignRole('parent');
        $parent->save();
    }
}
