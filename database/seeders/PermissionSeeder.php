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
        Permission::create(['name' => 'create products']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);
        Permission::create(['name' => 'publish products']);
        Permission::create(['name' => 'unpublish products']);

        // create roles and assign existing permissions
        $roleUser = Role::create(['name' => 'user']);

        $roleModerator = Role::create(['name' => 'moderator']);
        $roleModerator->givePermissionTo(['publish products']);
        $roleModerator->givePermissionTo(['unpublish products']);

        $rolePublisher = Role::create(['name' => 'publisher']);
        $rolePublisher->givePermissionTo(['publish products']);
        $rolePublisher->givePermissionTo(['unpublish products']);

        $roleWriter = Role::create(['name' => 'writer']);
        $roleWriter->givePermissionTo(['create products']);
        $roleWriter->givePermissionTo(['publish products']);
        $roleWriter->givePermissionTo(['unpublish products']);

        $roleEditor = Role::create(['name' => 'editor']);
        $roleEditor->givePermissionTo(['edit products']);
        $roleEditor->givePermissionTo(['delete products']);
        $roleEditor->givePermissionTo(['publish products']);
        $roleEditor->givePermissionTo(['unpublish products']);

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(['create products']);
        $roleAdmin->givePermissionTo(['edit products']);
        $roleAdmin->givePermissionTo(['delete products']);
        $roleAdmin->givePermissionTo(['publish products']);
        $roleAdmin->givePermissionTo(['unpublish products']);

        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
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
