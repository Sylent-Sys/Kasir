<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('transaksi_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_detail_id')->constrained();
            $table->foreignId('menu_id')->constrained();
            $table->integer('jumlah');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
        DB::select("DROP TRIGGER IF EXISTS `kurangStok`");
        DB::select("CREATE TRIGGER `kurangStok` AFTER INSERT ON `transaksi_items` FOR EACH ROW UPDATE `menus` SET `menus`.`stok`=`menus`.`stok`-new.jumlah WHERE `menus`.`id`=new.menu_id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_items');
    }
}
