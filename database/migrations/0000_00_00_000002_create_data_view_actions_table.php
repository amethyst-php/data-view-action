<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class CreateDataViewActionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(Config::get('amethyst.data-view-action.data.data-view-action.table'), function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();

            $table->string('data');
            $table->string('scope');
            $table->text('body')->nullable();

            $table->foreignId('workflow_id')->on(Config::get('amethyst.action.data.workflow.table'));

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('amethyst.data-view-action.data.data-view-action.table'));
    }
}
