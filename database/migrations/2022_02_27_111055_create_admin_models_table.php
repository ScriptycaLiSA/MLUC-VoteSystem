<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_models', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('uname');
            $table->string('password');
            $table->string('role');
            $table->string('email');
            $table->string('organization');
            //permissions in admin
            $table->boolean('canMngStd');
            $table->boolean('canMngCand');
            $table->boolean('canMngRtt');
            $table->boolean('canVvto');
            $table->boolean('canMngRtmt');
            $table->boolean('canMngRtmt');
            $table->boolean('canMngUsers');
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
        Schema::dropIfExists('admin_models');
    }
}
