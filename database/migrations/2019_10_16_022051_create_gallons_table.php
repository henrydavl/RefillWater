<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGallonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallons', function (Blueprint $table) {
            $table->string('id', '5')->primary();
            $table->string('default_ml')->nullable();
            $table->string('current_ml')->nullable();
            $table->text('description');
            $table->enum('is_empty', ['0','1'])->default('0');
            $table->bigInteger('nRefill')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallons');
    }
}
