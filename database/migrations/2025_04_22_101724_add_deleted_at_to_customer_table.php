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
            // Drop unnecessary columns
            $table->dropColumn(['createdat', 'updatedat', 'deletedat']);

            // Add softDeletes to the table
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer', function (Blueprint $table) {
            // Re-add the dropped columns in case we want to roll back
            $table->timestamp('createdat')->nullable();
            $table->timestamp('updatedat')->nullable();
            $table->timestamp('deletedat')->nullable();

            // Remove softDeletes in case we want to roll back
            $table->dropSoftDeletes();
        });
    }
}