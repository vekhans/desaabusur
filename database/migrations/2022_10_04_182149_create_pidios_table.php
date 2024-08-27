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
        Schema::create('pidios', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');
            $table->text('file',255);
            $table->text('caption',255);
            $table->text('sumber')->nullable();
            $table->unsignedBigInteger('id_admin')->nullable()->unsigned(); 
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('publish_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('id_ad')->nullable()->unsigned();
            $table->unsignedBigInteger('id_de')->nullable()->unsigned();
            $table->unsignedBigInteger('id_publish')->nullable()->unsigned();
            $table->enum('publish', ['belum', 'publish'])->default('belum');
            $table->boolean('ok')->default(0);
            $table->softDeletes();
        });
        schema::table('pidios', function($table){
            $table->foreign('id_admin')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ad')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_de')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_publish')->references('id')->on('users')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        Schema::dropForeign(['id_admin']);
        Schema::dropForeign(['id_ad']);
        Schema::dropForeign(['id_de']);
        Schema::dropForeign(['id_publish']);
        Schema::dropIfExists('pidios');
    }
};
