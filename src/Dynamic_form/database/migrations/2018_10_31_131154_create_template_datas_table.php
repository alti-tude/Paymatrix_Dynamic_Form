<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_form_id');
            $table->integer('user_id')->nullable();
            $table->text('col_1')->nullable();
            $table->text('col_2')->nullable();
            $table->text('col_3')->nullable();
            $table->text('col_4')->nullable();
            $table->text('col_5')->nullable();
            $table->text('col_6')->nullable();
            $table->text('col_7')->nullable();
            $table->text('col_8')->nullable();
            $table->text('col_9')->nullable();
            $table->text('col_10')->nullable();
            $table->text('col_11')->nullable();
            $table->text('col_12')->nullable();
            $table->text('col_13')->nullable();
            $table->text('col_14')->nullable();
            $table->text('col_15')->nullable();
            $table->text('col_16')->nullable();
            $table->text('col_17')->nullable();
            $table->text('col_18')->nullable();
            $table->text('col_19')->nullable();
            $table->text('col_20')->nullable();
            $table->text('col_21')->nullable();
            $table->text('col_22')->nullable();
            $table->text('col_23')->nullable();
            $table->text('col_24')->nullable();
            $table->text('col_25')->nullable();
            $table->text('col_26')->nullable();
            $table->text('col_27')->nullable();
            $table->text('col_28')->nullable();
            $table->text('col_29')->nullable();
            $table->text('col_30')->nullable();
            $table->text('col_31')->nullable();
            $table->text('col_32')->nullable();
            $table->text('col_33')->nullable();
            $table->text('col_34')->nullable();
            $table->text('col_35')->nullable();
            $table->text('col_36')->nullable();
            $table->text('col_37')->nullable();
            $table->text('col_38')->nullable();
            $table->text('col_39')->nullable();
            $table->text('col_40')->nullable();
            $table->text('Link')->nullable();
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
        Schema::dropIfExists('template_datas');
    }
}
