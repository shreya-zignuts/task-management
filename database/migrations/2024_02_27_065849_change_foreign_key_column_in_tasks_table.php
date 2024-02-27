<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeForeignKeyColumnInTasksTable extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->renameColumn('users_id', 'user_id');
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->renameColumn('user_id', 'users_id');
        });
    }
}

