<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->string('id');
            $table->string('leadid');
            $table->timestamps('install')->nullable();
            $table->string('addressid')->nullable();
            $table->string('projectstatus')->default('estimate');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps('designconsult')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
