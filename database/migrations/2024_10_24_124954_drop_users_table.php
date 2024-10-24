<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class DropUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations (drop the users table).
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
