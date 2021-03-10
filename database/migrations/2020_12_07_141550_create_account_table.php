<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{

    public function up():void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_user');
            $table->string('account_number');
            $table->float('amount');
            $table->string('currency');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('accounts');
    }
}
