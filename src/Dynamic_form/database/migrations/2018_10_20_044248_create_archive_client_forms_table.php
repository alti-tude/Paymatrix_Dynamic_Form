<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchiveClientFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archive_client_forms', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('Client_id');
          $table->integer('client_form_id');
          $table->text('template')->nullable();
          $table->string('form_status');
          $table->string('form_name');
          //$table->string('created_by');
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
        Schema::dropIfExists('archive_client_forms');
    }
}
