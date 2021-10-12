<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //chạy xong comment lại tránh chạy lần 2 => có lỗi {
        $role1 = Role::create(['name' => 'super_admin']);
        $role2 = Role::create(['name' => 'manager']);
        $role3 = Role::create(['name' => 'user']);
        Permission::create(['name' => 'Thêm câu hỏi']);
        Permission::create(['name' => 'Sửa câu hỏi']);
        Permission::create(['name' => 'Xóa câu hỏi']);
        Permission::create(['name' => 'Tạo bài thi']);
        Permission::create(['name' => 'Thêm tài khoản']);
        Permission::create(['name' => 'Sửa tài khoản']);
        Permission::create(['name' => 'Xóa tài khoản']);
        Permission::create(['name' => 'Làm bài thi']);
        $role1->givePermissionTo('Thêm câu hỏi','Sửa câu hỏi','Xóa câu hỏi','Tạo bài thi','Thêm tài khoản','Sửa tài khoản','Xóa tài khoản');
        $role2->givePermissionTo('Thêm câu hỏi','Sửa câu hỏi','Xóa câu hỏi','Tạo bài thi');
        $role3->givePermissionTo('Làm bài thi');
         //chạy xong comment lại tránh chạy lần 2 => có lỗi }


        \App\Models\User::factory(10)->create();


         //chạy xong comment lại tránh chạy lần 2 => có lỗi {
        $user =User::all();
        foreach($user as $c){
            $c->assignRole('super_admin');
        }
         //chạy xong comment lại tránh chạy lần 2 => có lỗi }

         
        Question::factory(20)->create();
    }
}
