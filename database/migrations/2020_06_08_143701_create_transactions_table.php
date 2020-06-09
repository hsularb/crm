<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('amount');
            $table->date('transaction_date');
            $table->text('description');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('currency_id');
            $table->unsignedBigInteger('income_source_id');
            $table->unsignedBigInteger('transaction_type_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('income_source_id')->references('id')->on('income_source');
            $table->foreign('transaction_type_id')->references('id')->on('transaction_type');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
