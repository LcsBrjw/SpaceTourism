<?php

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Migrations\Migration;

class AddPermissionsForResources extends Migration
{
    public function up(): void
    {
        // Ajouter les permissions pour technologies
        Permission::create(['name' => 'create_technology']);
        Permission::create(['name' => 'update_technology']);
        Permission::create(['name' => 'delete_technology']);

        // Ajouter les permissions pour crews
        Permission::create(['name' => 'create_crew']);
        Permission::create(['name' => 'update_crew']);
        Permission::create(['name' => 'delete_crew']);

        // Ajouter les permissions pour destinations
        Permission::create(['name' => 'create_destination']);
        Permission::create(['name' => 'update_destination']);
        Permission::create(['name' => 'delete_destination']);
    }

    public function down(): void
    {
        // Annuler la création des permissions (en cas de rollback)
        Permission::whereIn('name', [
            'create_technology', 'update_technology', 'delete_technology',
            'create_crew', 'update_crew', 'delete_crew',
            'create_destination', 'update_destination', 'delete_destination'
        ])->delete();
    }
}
