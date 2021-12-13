<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisableAtToUsers extends Migration
{


    public function up():void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('disable_at')->nullable()->after('remember_token');
        });
    }

    public function down():void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('disable_at');
        });
    }
}