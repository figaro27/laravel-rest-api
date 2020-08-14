<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaddetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_details', function (Blueprint $table) {
            $table->string('id');
            $table->string('leadid')->default('');
            $table->string('email')->nullable();
            $table->string('besttimetocall')->nullable();
            $table->string('hearaboutus')->nullable();
            $table->string('howcanwehelp')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('version')->default('0');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('leaddetails');
    }
}
