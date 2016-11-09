<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateElsIpLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('els_ip_logs', function (Blueprint $table) {
            $table->string('ip_address')->unique();
        });
        DB::statement('ALTER TABLE `els_ip_logs` MODIFY COLUMN `ip_address` VARBINARY(16)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('els_ip_logs');
    }
}
