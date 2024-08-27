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
        Schema::create('komentar_beritas', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');
            $table->integer('id_berita')->nullable()->unsigned();
            $table->integer('id_komentar')->nullable();
            $table->text('nama');
            $table->text('email');
            $table->longtext('komentar')->nullable();
            $table->boolean('rating')->nullable();
            $table->string('url')->nullable();
            $table->string('session_id')->nullable();
            $table->unsignedBigInteger('id_user')->nullable()->unsigned();
            $table->string('ip')->nullable();
            $table->string('agent')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('id_de')->nullable()->unsigned();
            $table->softDeletes();
        });
        schema::table('komentar_beritas', function($table){
            $table->foreign('id_berita')->references('id')->on('beritas')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_de')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['id_user']);
        Schema::dropForeign(['id_de']);
        Schema::dropForeign(['id_berita']);
        Schema::dropIfExists('komentar_beritas');
    }
};
