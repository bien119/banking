<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanaccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('loanrate', function (Blueprint $table) {
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
        Schema::create('loanaccount', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer');
            $table->integer('id_loanrate');
            $table->float('loan');
            $table->String('kind');
            $table->timestamps();
            $table->foreign('id_customer')
              ->references('id')->on('customer');
              $table->foreign('id_loanrate')
              ->references('id')->on('loanrate');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loanaccount');
    }
}
