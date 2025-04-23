<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->softDeletes(); //adds deleted column
        });
    }

    public function down()
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->dropSoftDeletes(); //removes deleted column
        });
    }
    }    
