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
        Schema::table('users', function ($table) {
            $table->string('email_token', 191)->after('email_verified_at')->nullable();
            $table->string('verification_code', 6)->after('email_token')->nullable();
            $table->float('download')->after('is_viewed')->default(0);
            $table->float('upload')->after('download')->default(0);
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
            $table->dropColumn(['email_token', 'verification_code', 'download', 'upload']);
        });
    }
};
