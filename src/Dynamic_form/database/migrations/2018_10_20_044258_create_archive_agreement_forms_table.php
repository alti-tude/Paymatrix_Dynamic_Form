<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchiveAgreementFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archive_agreement_forms', function (Blueprint $table) {
          $table->integer('client_id');
          $table->integer('archive_client_forms_id')->onDelete('cascade');
          $table->integer('fid');
          $table->increments('id');
          $table->string('label');
          $table->integer('min')->nullable();
          $table->integer('max')->nullable();
          $table->string('helpingText')->nullable();
          $table->string('placeholder')->nullable();
          $table->string('field_name')->nullable();
          $table->text('options')->nullable();
          $table->text('default_value')->nullable();
          $table->string('field_type');
          $table->text('validations')->nullable();
          $table->string('data_column');
          //$table->integer('status');
          $table->integer('order_of_field');
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
        Schema::dropIfExists('archive_agreement_forms');
    }
}
