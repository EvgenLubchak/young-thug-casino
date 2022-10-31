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
        Schema::create('thug_games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('thug_game_link_id')->nullable();
            $table->foreign('thug_game_link_id')
                ->references('id')
                ->on('thug_game_links')
                ->onDelete('set null');
            $table->smallInteger('result');
            $table->smallInteger('money_won');
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
        Schema::dropIfExists('thug_games');
    }
};
