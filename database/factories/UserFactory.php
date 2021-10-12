<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $role1 = Role::create(['name' => 'super_admin']);
        $role2 = Role::create(['name' => 'manager']);
        $role3 = Role::create(['name' => 'user']);
        $permission = Permission::create(
            ['name' => 'Thêm câu hỏi'],
            ['name' => 'Sửa câu hỏi'],
            ['name'=> 'Xóa câu hỏi'],
            ['name' => 'Tạo bài thi'],
            ['name' => 'Thêm tài khoản'],
            ['name' => 'Sửa tài khoản'],
            ['name' => 'Xóa tài khoản'],
            ['name' => 'Làm bài thi'],
        );
        $role1->syncPermissions($permission);
        $role2->syncPermissions('Thêm câu hỏi','Sửa câu hỏi','Xóa câu hỏi','Tạo bài thi');
        $role3->syncPermissions('Làm bài thi');
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
