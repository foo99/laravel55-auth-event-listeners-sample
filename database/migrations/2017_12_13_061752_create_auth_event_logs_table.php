<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthEventLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_event_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps('created_at');
        });
        
        Schema::create('auth_event_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('auth_event_type_id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->ipAddress('ip');
            $table->timestamps('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth_event_logs');
        
        Schema::dropIfExists('auth_event_types');
    }
}
