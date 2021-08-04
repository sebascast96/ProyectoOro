<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleSeller = Role::create(['name' => 'seller']);
        $roleEmployee = Role::create(['name' => 'employee']);

        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('permissions')->insert([
            ['name' => 'see-clients'],
            ['name' => 'create-clients'],
            ['name' => 'modify-clients'],
            ['name' => 'delete-clients'],
            ['name' => 'see-products'],
            ['name' => 'create-products'],
            ['name' => 'modify-products'],
            ['name' => 'delete-products'],
            ['name' => 'see-sellers'],
            ['name' => 'create-sellers'],
            ['name' => 'modify-sellers'],
            ['name' => 'delete-sellers'],
            ['name' => 'see-employees'],
            ['name' => 'create-employees'],
            ['name' => 'modify-employees'],
            ['name' => 'delete-employees'],
            ['name' => 'see-suppliers'],
            ['name' => 'create-suppliers'],
            ['name' => 'modify-suppliers'],
            ['name' => 'delete-suppliers'],
            ]
        );


        $ids = DB::table('permissions')->get()->pluck('id');
        $roleAdmin->syncPermissions($ids);


        $admin=User::find(1);
        $admin->assignRole('admin');


    }
}
