<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiwanjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kiwanjas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("authority_id");
            $table->bigInteger("user_id");
            $table->boolean("conflict")->nullable();
            $table->integer("price")->nullable();
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
        Schema::dropIfExists('kiwanjas');
    }
}
