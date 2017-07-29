<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');

            $table->integer('office_id')->unsigned();
            $table->integer('status_alert_id')->unsigned();

            $table->foreign('office_id')
                ->references('id')->on('offices')
                ->onDelete('cascade');

            $table->foreign('status_alert_id')
                ->references('id')->on('status_alerts')
                ->onDelete('cascade');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alerts');
    }
}
