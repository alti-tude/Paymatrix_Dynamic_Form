<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // This table is for storing the form information 
        Schema::create('client_forms', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('Client_id');
          $table->text('template')->nullable();
          $table->string('form_name');
          $table->string('form_status');
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
        Schema::dropIfExists('client_forms');
    }
}
