<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class')->insert([
            'id'=> '1',
            'name' => 'Teknik Informatika 1',
            'created_at' => Carbon::now(),
        ]);
       DB::table('class')->insert([
            'id'=> '2',
            'name' => 'Teknik Informatika 2',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'id'=> '1',
            'name' => 'Dosen',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
        	'id'=> '2',
            'name' => 'Mahasiswa',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'id'=> '3',
            'name' => 'Admin',
            'created_at' => Carbon::now(),
        ]);
        
        DB::table('users')->insert([
            'id'=> '1',
            'name' => 'Dosen',
            'level_id'=> '1',
            'email' => 'dosen',
            'password' => bcrypt('12345'),
            'images' => 'admin.png',
            'created_at' => Carbon::now(),
        ]);
        
         DB::table('users')->insert([
            'id'=> '2',
            'name' => 'Admin',
            'level_id'=> '3',
            'email' => 'admin',
            'images' => 'admin.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
         DB::table('users')->insert([
            'id'=> '3',
            'name' => 'Beny',
            'level_id'=> '2',
            'class_id'=> '2',
            'email' => 'beny',
            'images' => 'beny.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id'=> '4',
            'name' => 'Charlie',
            'level_id'=> '2',
            'class_id'=> '2',
            'email' => 'charlie',
            'images' => 'beny.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id'=> '5',
            'name' => 'Denis',
            'level_id'=> '2',
            'class_id'=> '1',
            'email' => 'denis',
            'images' => 'anang.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id'=> '6',
            'name' => 'Eddie',
            'level_id'=> '2',
            'class_id'=> '1',
            'email' => 'eddie',
            'images' => 'anang.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id'=> '7',
            'name' => 'Fransisco',
            'level_id'=> '2',
            'class_id'=> '2',
            'email' => 'Fransisco',
            'images' => 'anang.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id'=> '8',
            'name' => 'Giant',
            'level_id'=> '2',
            'class_id'=> '1',
            'email' => 'giant',
            'images' => 'anang.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id'=> '9',
            'name' => 'Harry',
            'level_id'=> '2',
            'class_id'=> '2',
            'email' => 'harry',
            'images' => 'anang.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id'=> '10',
            'name' => 'Iqbal',
            'level_id'=> '2',
            'class_id'=> '1',
            'email' => 'iqbal',
            'images' => 'anang.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id'=> '11',
            'name' => 'Juki',
            'level_id'=> '2',
            'class_id'=> '2',
            'email' => 'juki',
            'images' => 'anang.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id'=> '12',
            'name' => 'Kirana',
            'level_id'=> '2',
            'class_id'=> '1',
            'email' => 'Kirana',
            'images' => 'anang.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id'=> '13',
            'name' => 'Leroy',
            'level_id'=> '2',
            'class_id'=> '2',
            'email' => 'leroy',
            'images' => 'anang.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id'=> '14',
            'name' => 'Mochtar',
            'level_id'=> '2',
            'class_id'=> '1',
            'email' => 'mochtar',
            'images' => 'anang.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id'=> '15',
            'name' => 'Nia',
            'level_id'=> '2',
            'class_id'=> '2',
            'email' => 'nia',
            'images' => 'anang.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
    }
}
