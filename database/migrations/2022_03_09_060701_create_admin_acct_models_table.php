<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAcctModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_acct_models', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('imageUrl');
            $table->string('email');
            $table->string('password');
            $table->string('role');
            $table->string('organization');
            //permissions in admin
            $table->string('canMngStd');
            $table->string('canMngCand');
            $table->string('canMngRtt');
            $table->string('canVvto');
            $table->string('canMngRtmt');
            $table->string('canMngUsers');
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
        Schema::dropIfExists('admin_acct_models');
    }
}
