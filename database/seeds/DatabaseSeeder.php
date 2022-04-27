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
       
        DB::table('levels')->insert([
            'id'=> '1',
            'name' => 'Admin',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'id'=> '2',
            'name' => 'Pengurus',
            'created_at' => Carbon::now(),
        ]);
        DB::table('levels')->insert([
            'id'=> '3',
            'name' => 'Super-Admin',
            'created_at' => Carbon::now(),
        ]);
        
        DB::table('users')->insert([
            'id'=> '1',
            'name' => 'admin',
            'level_id'=> '1',
            'email' => 'admin',
            'password' => bcrypt('12345'),
            'images' => 'admin.png',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id'=> '16',
            'name' => 'Dosengame',
            'level_id'=> '1',
            'email' => 'dosengame',
            'password' => bcrypt('12345'),
            'images' => 'admin.png',
            'created_at' => Carbon::now(),
        ]);
         DB::table('users')->insert([
            'id'=> '2',
            'name' => 'Administrator',
            'level_id'=> '3',
            'email' => 'administrator',
            'images' => 'admin.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
         DB::table('users')->insert([
            'id'=> '3',
            'name' => 'Ronny',
            'level_id'=> '2',
            'email' => 'ronny',
            'images' => 'beny.png',
            'password' => bcrypt('12345'),
            'created_at' => Carbon::now(),
        ]);
      
      
    }
}
