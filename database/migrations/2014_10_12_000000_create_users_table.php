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

        Schema::create('class', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('name');  
			$kolom->timestamps();
        });

        Schema::create('users', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->unsignedInteger('level_id')->nullable();
            $kolom->unsignedInteger('class_id')->nullable();
            $kolom->string('name');
            $kolom->string('email')->unique();
            $kolom->string('images')->nullable();
            $kolom->string('password');
            $kolom->rememberToken();
            $kolom->timestamps();
        });
      
        Schema::table('users', function (Blueprint $kolom) {
		  $kolom->foreign('level_id')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');
          $kolom->foreign('class_id')->references('id')->on('class')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::create('pertemuan', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('name');  
			$kolom->timestamps();
        });

        Schema::create('meetingname', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('name')->nullable();          
            $kolom->unsignedInteger('class_id')->nullable();
            $kolom->unsignedInteger('pertemuan_id')->nullable();
            $kolom->string('status')->nullable();          
            $kolom->timestamps();
        });
      
        Schema::table('meetingname', function (Blueprint $kolom) {
          $kolom->foreign('class_id')->references('id')->on('class')->onDelete('cascade')->onUpdate('cascade');
          $kolom->foreign('pertemuan_id')->references('id')->on('pertemuan')->onDelete('cascade')->onUpdate('cascade');
        });
        
        Schema::create('meeting', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->unsignedInteger('class_id')->nullable();
            $kolom->unsignedInteger('meetingname_id')->nullable();
            $kolom->string('file');
            $kolom->string('doc');
            $kolom->string('tommorow')->nullable();
            $kolom->string('assignment')->nullable();
            $kolom->string('description')->nullable();
            $kolom->string('desc')->nullable();
            $kolom->string('deadline')->nullable();
            $kolom->timestamps();
        });
      
        Schema::table('meeting', function (Blueprint $kolom) {
          $kolom->foreign('class_id')->references('id')->on('class')->onDelete('cascade')->onUpdate('cascade');
          $kolom->foreign('meetingname_id')->references('id')->on('meetingname')->onDelete('cascade')->onUpdate('cascade');

        });

        

        Schema::create('kehadiran', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->unsignedInteger('meeting_id')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->unsignedInteger('class_id')->nullable();
            $kolom->string('status')->nullable();

           
            $kolom->timestamps();
        });
      
        Schema::table('kehadiran', function (Blueprint $kolom) {
          $kolom->foreign('meeting_id')->references('id')->on('meeting')->onDelete('cascade')->onUpdate('cascade');
          $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
          $kolom->foreign('class_id')->references('id')->on('class')->onDelete('cascade')->onUpdate('cascade');

        });
        
        Schema::create('assignment', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->unsignedInteger('meeting_id')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->string('file')->nullable();
            $kolom->string('status')->nullable();

           
            $kolom->timestamps();
        });
      
        Schema::table('assignment', function (Blueprint $kolom) {
          $kolom->foreign('meeting_id')->references('id')->on('meeting')->onDelete('cascade')->onUpdate('cascade');
          $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::create('exam', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('name')->nullable();
            $kolom->string('types')->nullable();
            $kolom->string('status')->nullable();
            $kolom->unsignedInteger('class_id')->nullable();
            $kolom->string('file');
            $kolom->timestamps();
        });
      
        Schema::table('exam', function (Blueprint $kolom) {
          $kolom->foreign('class_id')->references('id')->on('class')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('answer', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->unsignedInteger('exam_id')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->string('file')->nullable();
            $kolom->string('status')->nullable();
            $kolom->string('nilai')->nullable();
            $kolom->timestamps();
        });
      
        Schema::table('answer', function (Blueprint $kolom) {
          $kolom->foreign('exam_id')->references('id')->on('exam')->onDelete('cascade')->onUpdate('cascade');
          $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });




        Schema::create('quiz', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('name')->nullable();
            $kolom->string('status')->nullable();
            $kolom->unsignedInteger('class_id')->nullable();
            $kolom->string('types')->nullable();
           
            $kolom->timestamps();
        });
      
        Schema::table('quiz', function (Blueprint $kolom) {
            $kolom->foreign('class_id')->references('id')->on('class')->onDelete('cascade')->onUpdate('cascade');


        });

        Schema::create('soal', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('soal')->nullable();
            $kolom->unsignedInteger('quiz_id')->nullable();
           
            $kolom->timestamps();
        });
      
        Schema::table('soal', function (Blueprint $kolom) {
            $kolom->foreign('quiz_id')->references('id')->on('quiz')->onDelete('cascade')->onUpdate('cascade');


        });

        Schema::create('jawaban', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('jawab')->nullable();
            $kolom->string('status')->nullable();
            $kolom->string('nilai')->nullable();
            $kolom->unsignedInteger('soal_id')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->unsignedInteger('quiz_id')->nullable();

            $kolom->timestamps();
        });
      
        Schema::table('jawaban', function (Blueprint $kolom) {
            $kolom->foreign('soal_id')->references('id')->on('soal')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('quiz_id')->references('id')->on('quiz')->onDelete('cascade')->onUpdate('cascade');


        });
        Schema::create('nilai', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('nilai')->nullable();
            $kolom->unsignedInteger('quiz_id')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();

            $kolom->timestamps();
        });
      
        Schema::table('nilai', function (Blueprint $kolom) {
            $kolom->foreign('quiz_id')->references('id')->on('quiz')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');



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
        	$kolom->string('tanggal')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->timestamps();
        });

 		Schema::table('masuk', function (Blueprint $kolom) {
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


        });

         Schema::create('barangmasuk', function (Blueprint $kolom) {
            $kolom->increments('id');
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
            $kolom->string('file');
            $kolom->string('surat')->nullable();;
            $kolom->string('status');
            $kolom->string('tanggal')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->timestamps();
        });

 		Schema::table('keluar', function (Blueprint $kolom) {
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


        });

         Schema::create('barangkeluar', function (Blueprint $kolom) {
            $kolom->increments('id');
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
