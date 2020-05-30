<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string("name",60);
            $table->integer("category_id")->default(0)->index();
            $table->integer("user_id")->default(0)->index();
            $table->integer("price")->default('10');
            $table->text("description")->default('');
            $table->string("phone_number",17);
            $table->string("location",350);
            $table->text("img");
            $table->boolean('deleted')->default(false);
            $table->timestamps();
            $table->timestamp('deleted-at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
