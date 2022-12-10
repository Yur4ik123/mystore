<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code'); //код_товару
            $table->string('product_name_ru', 110); //название ру
            $table->string('product_name_uk', 130); //название uk
            $table->text('search_query_ru'); //поисковой запрос ру
            $table->text('search_query_uk'); //поисковой запрос uk
            $table->text('description_ru'); //описание ру
            $table->text('description_uk'); //описание укр
            $table->string('product_type', 2)->default('r'); //r ― товар продається тільки в роздріб
                                                                //            w ― товар продається тільки оптом
                                                                //u ― товар продається оптом і в роздріб
                                                                //s ― послуга
            $table->float('price');
            $table->string('currency')->default('UAH');
            $table->string('unit')->nullable();
            $table->integer('balance')->default(0); //остаток
            $table->string('images')->nullable();
            $table->string('available', 3)->default('+');
            $table->unique('product_code');




            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
