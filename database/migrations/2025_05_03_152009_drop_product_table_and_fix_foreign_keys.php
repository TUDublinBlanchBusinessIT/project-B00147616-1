<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropProductTableAndFixForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop the foreign key constraint in the 'order_detail' table referencing 'product'
        Schema::table('order_detail', function (Blueprint $table) {
            $table->dropForeign('order_detail_ibfk_2');
        });

        // Now drop the 'product' table
        Schema::dropIfExists('product');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Recreate the 'product' table (if needed)
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->string('imagepath', 255);
            $table->timestamps();
            $table->softDeletes();
        });

        // Recreate the foreign key constraint if needed in the 'order_detail' table
        Schema::table('order_detail', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
        });
    }
}
