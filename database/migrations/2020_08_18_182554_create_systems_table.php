<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('version')->default('0');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->float('saleprice');
            $table->boolean('share')->default(true);
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
        Schema::dropIfExists('system');
    }
}
