<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
            $table->foreignId('id_transaksi_detail')->constrained('transaksi_details')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_menu')->constrained('menus')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('jumlah');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
        DB::select("DROP TRIGGER IF EXISTS `kurangStok`");
        DB::select("CREATE TRIGGER `kurangStok` AFTER INSERT ON `transaksi_items` FOR EACH ROW UPDATE `menus` SET `menus`.`stok`=`menus`.`stok`-new.jumlah WHERE `menus`.`id`=new.id_menu");
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
