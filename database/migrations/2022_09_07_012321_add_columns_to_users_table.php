<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name', 20)->change();
            $table->renameColumn('name', 'account_name');
            $table->string('user_name', 20)->unique();
            $table->string('icon_image')->default('no_image.png');
            $table->string('header_image')->default('no_image.png');
            $table->string('bio', 140)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('bio');
            $table->dropColumn('header_image');
            $table->dropColumn('icon_image');
            $table->dropColumn('user_name');
            $table->string('account_name', 255)->change();
            $table->renameColumn('account_name', 'name');
        });
    }
};
