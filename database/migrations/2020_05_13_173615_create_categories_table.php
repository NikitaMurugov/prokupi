<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('categories')->insert([
            'name' => 'Бытовая электроника',
        ]);

        DB::table('categories')->insert([
            'name' => 'Для квартиры и дома',
        ]);

        DB::table('categories')->insert([
            'name' => 'Хобби и отдых',
        ]);

        DB::table('categories')->insert([
            'name' => 'Транспорт',
        ]);

        DB::table('categories')->insert([
            'name' => 'Недвижимость',
        ]);

        DB::table('categories')->insert([
            'name' => 'Личные вещи',
        ]);

        DB::table('categories')->insert([
            'name' => 'Животные',
        ]);

        DB::table('categories')->insert([
            'name' => 'Услуги',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
