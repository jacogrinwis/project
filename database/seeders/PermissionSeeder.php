<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'Create Products']);
        Permission::create(['name' => 'Edit Products']);
        Permission::create(['name' => 'Delete Products']);
        Permission::create(['name' => 'Publish Products']);
        Permission::create(['name' => 'Unpublish Products']);

        // create roles and assign existing permissions
        $roleUser = Role::create(['name' => 'User']);

        $roleModerator = Role::create(['name' => 'Moderator']);
        $roleModerator->givePermissionTo(['Publish Products']);
        $roleModerator->givePermissionTo(['Unpublish Products']);

        $rolePublisher = Role::create(['name' => 'Publisher']);
        $rolePublisher->givePermissionTo(['Publish Products']);
        $rolePublisher->givePermissionTo(['Unpublish Products']);

        $roleWriter = Role::create(['name' => 'writer']);
        $roleWriter->givePermissionTo(['Create Products']);
        $roleWriter->givePermissionTo(['Publish Products']);
        $roleWriter->givePermissionTo(['Unpublish Products']);

        $roleEditor = Role::create(['name' => 'Editor']);
        $roleEditor->givePermissionTo(['Edit Products']);
        $roleEditor->givePermissionTo(['Delete Products']);
        $roleEditor->givePermissionTo(['Publish Products']);
        $roleEditor->givePermissionTo(['Unpublish Products']);

        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleAdmin->givePermissionTo(['Create Products']);
        $roleAdmin->givePermissionTo(['Edit Products']);
        $roleAdmin->givePermissionTo(['Delete Products']);
        $roleAdmin->givePermissionTo(['Publish Products']);
        $roleAdmin->givePermissionTo(['Unpublish Products']);

        $roleSuperAdmin = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = User::factory()->create([
            'name' => 'Frontend User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($roleUser);

        $user = User::factory()->create([
            'name' => 'Moderator User',
            'email' => 'moderator@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($roleModerator);

        $user = User::factory()->create([
            'name' => 'Publisher User',
            'email' => 'publisher@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($rolePublisher);

        $user = User::factory()->create([
            'name' => 'Writer User',
            'email' => 'writer@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($roleWriter);

        $user = User::factory()->create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($roleEditor);

        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($roleAdmin);

        $user = User::factory()->create([
            'name' => 'Super-Admin User',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($roleSuperAdmin);
    }
}
