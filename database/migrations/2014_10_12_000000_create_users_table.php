<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('name');  
			$kolom->timestamps();
        });


        Schema::create('users', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->unsignedInteger('level_id')->nullable();
            $kolom->string('name');
            $kolom->string('email')->unique();
            $kolom->string('images')->nullable();
            $kolom->string('password');
            $kolom->rememberToken();
            $kolom->timestamps();
        });
      
        Schema::table('users', function (Blueprint $kolom) {
		  $kolom->foreign('level_id')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');

        });

       
      // barang BARANG

         Schema::create('barang', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('nama')->nullable();
            $kolom->string('tipe')->nullable();
            $kolom->integer('jumlah')->nullable();
            $kolom->integer('max')->nullable();
            $kolom->string('satuan')->nullable();
            $kolom->integer('harga')->nullable();
            $kolom->timestamps();
        });

         Schema::create('masuk', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('file');
        	$kolom->date('tanggal')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->timestamps();
        });

 		Schema::table('masuk', function (Blueprint $kolom) {
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


        });

         Schema::create('barangmasuk', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->date('tanggal')->nullable();
            $kolom->integer('masuk')->nullable();
            $kolom->unsignedInteger('masuk_id')->nullable();
            $kolom->unsignedInteger('barang_id')->nullable();
            $kolom->timestamps();
        });
      
        Schema::table('barangmasuk', function (Blueprint $kolom) {
            $kolom->foreign('masuk_id')->references('id')->on('masuk')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');



        });

         Schema::create('keluar', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('file')->nullable();
            $kolom->string('surat')->nullable();
            $kolom->string('status');
            $kolom->date('tanggal')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->timestamps();
        });

 		Schema::table('keluar', function (Blueprint $kolom) {
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


        });

         Schema::create('barangkeluar', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->date('tanggal')->nullable();
            $kolom->integer('keluar')->nullable();
            $kolom->unsignedInteger('keluar_id')->nullable();
            $kolom->unsignedInteger('barang_id')->nullable();
            $kolom->timestamps();
        });
      
        Schema::table('barangkeluar', function (Blueprint $kolom) {
            $kolom->foreign('keluar_id')->references('id')->on('keluar')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');



        });
      
        
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
