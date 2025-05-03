<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBouquetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop the foreign key constraint before dropping the product table
        Schema::table('bouquet', function (Blueprint $table) {
            // Drop the foreign key using the correct constraint name
            $table->dropForeign('bouquet_ibfk_1'); 
        });
        

        // Drop the product table
        Schema::dropIfExists('product');

        // Create the product table again
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

        // Re-create the foreign key relationship for bouquet table
        Schema::table('bouquet', function (Blueprint $table) {
            $table->unsignedBigInteger('productid');
            $table->foreign('productid')->references('id')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the foreign key and the product table in reverse order
        Schema::table('bouquet', function (Blueprint $table) {
            $table->dropForeign(['productid']);
        });

        Schema::dropIfExists('product');
    }
}
