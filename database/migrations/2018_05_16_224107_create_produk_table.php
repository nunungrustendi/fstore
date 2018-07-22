<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nama');
			$table->longText('detail')->nullable();
			$table->string('gambar')->nullable();
            $table->timestamps();
        });
		
		Schema::create('merk', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nama');
			$table->longText('detail')->nullable();
			$table->string('gambar')->nullable();
            $table->timestamps();
        });
		
		Schema::create('group', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nama');
			$table->longText('detail')->nullable();
			$table->string('gambar')->nullable();
			$table->boolean('display_on_home');
            $table->timestamps();
        });
		
		Schema::create('gambar', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nama');
			$table->string('gambar')->nullable();
            $table->timestamps();
        });
		
				
		Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('kategori_id')->unsigned()->nullable();
			$table->foreign('kategori_id')->references('id')->on('kategori');
			$table->integer('merk_id')->unsigned()->nullable();
			$table->foreign('merk_id')->references('id')->on('merk');
			$table->integer('user_id')->nullable();
			$table->string('nama');
			//$table->string('paket_kotak')->nullable();
			//$table->string('garansi')->nullable();
			$table->longText('deskripsi')->nullable();
			$table->longText('detail')->nullable();
			$table->decimal('harga_dasar',15,2);
			$table->decimal('harga_aktual',15,2);
			//$table->integer('rating')->nullable();
			//$table->integer('num_stock')->nullable();
			$table->integer('num_view')->nullable();
			//$table->integer('num_sold')->nullable();
			//$table->boolean('sponsored')->nullable();
			$table->string('gambar1')->nullable();
			$table->string('gambar2')->nullable();
			$table->string('gambar3')->nullable();
			$table->string('gambar4')->nullable();
			$table->string('gambar5')->nullable();
			$table->string('gambar6')->nullable();
            $table->timestamps();
        });
		
		
		Schema::create('group_produk',function(Blueprint $table){ 
			$table->integer('group_id')->unsigned()->nullable();
			$table->foreign('group_id')->references('id')->on('group');
			$table->unsignedBigInteger('produk_id')->nullable();
			$table->foreign('produk_id')->references('id')->on('produk');
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
	   Schema::table('produk',function(Blueprint $table){
					$table->dropForeign('produk_kategori_id_foreign');
					$table->dropIndex('produk_kategori_id_foreign');
					$table->dropForeign('produk_merk_id_foreign');
					$table->dropIndex('produk_merk_id_foreign');
					});
	  Schema::table('group_produk',function(Blueprint $table){
					$table->dropForeign('group_produk_group_id_foreign');
					$table->dropIndex('group_produk_group_id_foreign');
					$table->dropForeign('group_produk_produk_id_foreign');
					$table->dropIndex('group_produk_produk_id_foreign');
					});
	   Schema::dropIfExists('merk'); 
	   Schema::dropIfExists('kategori');
	   Schema::dropIfExists('produk');
	   Schema::dropIfExists('group');
	   Schema::dropIfExists('gambar');
	   Schema::dropIfExists('group_produk');
    }
}
