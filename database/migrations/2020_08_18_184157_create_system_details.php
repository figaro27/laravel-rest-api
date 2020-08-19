<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_details', function (Blueprint $table) {
            $table->string('id');
            $table->string('systemid');
            $table->string('ingredientid');
            $table->string('extra')->default('');
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('version')->default('0');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->float('price')->default(0);
            $table->tinyInteger('factor')->default(true);
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
        Schema::dropIfExists('system_details');
    }
}
