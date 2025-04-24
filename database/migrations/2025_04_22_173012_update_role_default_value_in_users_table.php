<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRoleDefaultValueInUsersTable extends Migration
{
    /**
     * Applique les modifications à la base de données.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Modifier la valeur par défaut de la colonne 'role'
            $table->string('role')->default('user')->change(); // On change la valeur par défaut ici
        });
    }

    /**
     * Inverse les modifications effectuées dans la méthode 'up'.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert la valeur par défaut à 'admin' si nécessaire
            $table->string('role')->default('admin')->change();
        });
    }
}
