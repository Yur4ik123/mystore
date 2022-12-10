<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('retail_price')->default(0);
            $table->boolean('auto_price')->default(true);
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {

        });
    }
};
