<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', '30');
            $table->longText('description');
            $table->string('image', '255');
            $table->decimal('price');
            $table->unsignedInteger('quantity');
            $table->timestamps();
            $table->foreignId('product_category_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign(['product_category_id']);

        });
        Schema::dropIfExists('products');

    }
};
