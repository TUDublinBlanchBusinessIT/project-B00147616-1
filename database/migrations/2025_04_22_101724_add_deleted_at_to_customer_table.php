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
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer', function (Blueprint $table) {
            // Check if 'deleted_at' column exists, if not, add it
            if (!Schema::hasColumn('customer', 'deleted_at')) {
                $table->softDeletes();
            }

            // Drop unnecessary columns if they exist
            if (Schema::hasColumn('customer', 'createdat')) {
                $table->dropColumn('createdat');
            }
            if (Schema::hasColumn('customer', 'updatedat')) {
                $table->dropColumn('updatedat');
            }
            if (Schema::hasColumn('customer', 'deletedat')) {
                $table->dropColumn('deletedat');
            }
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