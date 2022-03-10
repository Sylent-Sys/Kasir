<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga');
            $table->string('gambar');
            $table->integer('stok');
            $table->timestamps();
        });
        DB::select("DROP PROCEDURE IF EXISTS `hapusMenu`");
        DB::select("CREATE PROCEDURE `hapusMenu`(IN `idMenu` INT) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER DELETE FROM `menus` WHERE `menus`.`id`=idMenu");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
