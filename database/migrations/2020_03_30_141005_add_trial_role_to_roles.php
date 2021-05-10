<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrialRoleToRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( \App\Models\Role::whereName('trial')->count()) return;
        \App\Models\Role::create(
            [
                'name' => 'trial',
                'guard' => 'web'
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\Models\Role::whereName('trial')->delete();
    }
}
