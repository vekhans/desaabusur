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
        Schema::create('media_beritas', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');
            $table->integer('id_berita')->nullable()->unsigned();
            $table->enum('jenis', ['foto', 'video']);
            $table->text('file');
            $table->text('caption');
            $table->text('sumber')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('id_ad')->nullable()->unsigned();
            $table->unsignedBigInteger('id_de')->nullable()->unsigned();
            $table->softDeletes();
        });
        schema::table('media_beritas', function($table){
            $table->foreign('id_berita')->references('id')->on('beritas')->onDelete('cascade');
            $table->foreign('id_ad')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropForeign(['id_ad']);
        Schema::dropForeign(['id_de']);
        Schema::dropForeign(['id_berita']);
        Schema::dropIfExists('media_beritas');
    }
};
