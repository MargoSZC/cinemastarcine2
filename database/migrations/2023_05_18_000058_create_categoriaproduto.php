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
        Schema::create('categoriaproduto', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->timestamps();
        });

        Schema::disableForeignKeyConstraints();

        Schema::table('produto', function (Blueprint $table) {
            $table->foreignId('categoriaproduto_id')->nullable()->constrained('categoriaproduto')->default(null);
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoriaproduto');
    }
};
