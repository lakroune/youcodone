<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        Permission::firstOrCreate(['name' => 'favori restaurant']);
        permission::firstOrCreate(['name' => 'ajouter restaurants']);
        permission::firstOrCreate(['name' => 'modifier restaurants']);
        permission::firstOrCreate(['name' => 'supprimer restaurants']);
        permission::firstOrCreate(['name' => 'suspendre utilisateurs']);
        permission::firstOrCreate(['name' => 'activer utilisateurs']);
        Permission::firstOrCreate(['name' => 'gerer menus']);

        $restaurateur = Role::firstOrCreate(['name' => 'restaurateur']);
        $client = Role::firstOrCreate(['name' => 'client']);
        $admin = Role::firstOrCreate(['name' => 'admin']);

        $restaurateur->givePermissionTo('ajouter restaurants');
        $restaurateur->givePermissionTo('modifier restaurants');
        $restaurateur->givePermissionTo('supprimer restaurants');
        $restaurateur->givePermissionTo('gerer menus');
        $client->givePermissionTo('favori restaurant');
        $admin->givePermissionTo('suspendre utilisateurs');
        $admin->givePermissionTo('activer utilisateurs');
    }
}
