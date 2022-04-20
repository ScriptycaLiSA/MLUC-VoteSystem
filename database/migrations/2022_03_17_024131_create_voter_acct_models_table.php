<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoterAcctModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voter_acct_models', function (Blueprint $table) {
            $table->id();
            $table->unique('idNum');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('password');
            $table->string('college');
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
        Schema::dropIfExists('voter_acct_models');
    }
}
