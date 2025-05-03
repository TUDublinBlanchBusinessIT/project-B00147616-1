<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    if (!Schema::hasTable('customer')) {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 30);
            $table->string('lastname', 30);
            $table->string('email', 50);
            $table->string('phone', 20);
            $table->string('password')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
