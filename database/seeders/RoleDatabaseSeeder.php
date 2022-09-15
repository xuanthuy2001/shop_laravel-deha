<?php

namespace Database\Seeders;

use App\Models\permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class RoleDatabaseSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'super-admin', 'display_name' => 'Super Admin', 'group' => 'system'],
            ['name' => 'admin', 'display_name' => 'admin', 'group' => 'system'],
            ['name' => 'employee', 'display_name' => 'employee', 'group' => 'system'],
            ['name' => 'manager', 'display_name' => 'manager', 'group' => 'system'],
            ['name' => 'user', 'display_name' => 'user', 'group' => 'system'],
        ];
        foreach ($roles as $role) {
            // nếu trong db permission có rồi thì update nếu chưa thì thêm vào 
            Role::updateOrCreate($role);
        }

        $superAdmin = User::whereEmail('admin@gmail.com')->first();

        if(!$superAdmin)
        {
            $superAdmin = User::factory()->create([
                'name' => 'superAdmin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456a@'),
        ]);
        }
        $superAdmin->assignRole('super-admin');

        $permission = [
            ['name' => 'create-user', 'display_name' => 'Create user', 'group' => 'user'],
            ['name' => 'update-user', 'display_name' => 'Update user', 'group' => 'user'],
            ['name' => 'show-user', 'display_name' => 'Show user', 'group' => 'user'],
            ['name' => 'delete-user', 'display_name' => 'Delete user', 'group' => 'user'],

            ['name' => 'create-role', 'display_name' => 'Create role', 'group' => 'Role'],
            ['name' => 'update-role', 'display_name' => 'Update role', 'group' => 'Role'],
            ['name' => 'show-role', 'display_name' => 'Show role', 'group' => 'Role'],
            ['name' => 'delete-role', 'display_name' => 'Delete role', 'group' => 'Role'],

            ['name' => 'create-category', 'display_name' => 'Create category', 'group' => 'Category'],
            ['name' => 'update-category', 'display_name' => 'Update category', 'group' => 'Category'],
            ['name' => 'show-category', 'display_name' => 'Show category', 'group' => 'Category'],
            ['name' => 'delete-category', 'display_name' => 'Delete category', 'group' => 'Category'],

            ['name' => 'create-product', 'display_name' => 'Create product', 'group' => 'Product'],
            ['name' => 'update-product', 'display_name' => 'Update product', 'group' => 'Product'],
            ['name' => 'show-product', 'display_name' => 'Show product', 'group' => 'Product'],
            ['name' => 'delete-product', 'display_name' => 'Delete product', 'group' => 'Product'],


            ['name' => 'create-coupon', 'display_name' => 'Create coupon', 'group' => 'Coupon'],
            ['name' => 'update-coupon', 'display_name' => 'Update coupon', 'group' => 'Coupon'],
            ['name' => 'show-coupon', 'display_name' => 'Show coupon', 'group' => 'Coupon'],
            ['name' => 'delete-coupon', 'display_name' => 'Delete coupon', 'group' => 'Coupon'],

            ['name' => 'list-order', 'display_name' => 'list order', 'group' => 'orders'],
            ['name' => 'update-order-status', 'display_name' => 'Update order status', 'group' => 'orders'],

        ];
        foreach ($permission as $item) {
            // nếu trong db permission có rồi thì update nếu chưa thì thêm vào 
            permission::updateOrCreate($item);
        }
    }
}


