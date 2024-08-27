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
        Schema::create('arsips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_admin')->nullable()->unsigned();
            $table->string('judul')->unique(); 
            $table->Integer('id_jenis')->nullable()->unsigned();
            $table->longtext('deskripsi');
            $table->text('file');
            $table->text('keterangan')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('brubah')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('publish_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('id_ad')->nullable()->unsigned();
            $table->unsignedBigInteger('id_de')->nullable()->unsigned();
            $table->unsignedBigInteger('id_publish')->nullable()->unsigned();
            $table->enum('publish', ['belum', 'publish'])->default('belum'); 
            $table->boolean('ok')->default(0);
            $table->softDeletes();
            
                      
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
        Schema::dropForeign(['id_jenis']);
        Schema::dropIfExists('arsips');
    }
};
