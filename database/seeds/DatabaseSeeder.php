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
        DB::table('pertemuan')->insert([
            'id'=> '1',
            'name' => 'Pertemuan 1',
            'created_at' => Carbon::now(),
        ]);
        DB::table('pertemuan')->insert([
            'id'=> '2',
            'name' => 'Pertemuan 2',
            'created_at' => Carbon::now(),
        ]);
        DB::table('pertemuan')->insert([
            'id'=> '3',
            'name' => 'Pertemuan 3',
            'created_at' => Carbon::now(),
        ]);
        DB::table('pertemuan')->insert([
            'id'=> '4',
            'name' => 'Pertemuan 4',
            'created_at' => Carbon::now(),
        ]);
        DB::table('pertemuan')->insert([
            'id'=> '5',
            'name' => 'Pertemuan 5',
            'created_at' => Carbon::now(),
        ]);
        DB::table('pertemuan')->insert([
            'id'=> '6',
            'name' => 'Pertemuan 6',
            'created_at' => Carbon::now(),
        ]);
        DB::table('pertemuan')->insert([
            'id'=> '7',
            'name' => 'Pertemuan 7',
            'created_at' => Carbon::now(),
        ]);
        DB::table('pertemuan')->insert([
            'id'=> '8',
            'name' => 'Pertemuan 8',
            'created_at' => Carbon::now(),
        ]);
        DB::table('pertemuan')->insert([
            'id'=> '9',
            'name' => 'Pertemuan 9',
            'created_at' => Carbon::now(),
        ]);
        DB::table('pertemuan')->insert([
            'id'=> '10',
            'name' => 'Pertemuan 10',
            'created_at' => Carbon::now(),
        ]);
        DB::table('pertemuan')->insert([
            'id'=> '11',
            'name' => 'Pertemuan 11',
            'created_at' => Carbon::now(),
        ]);
        DB::table('pertemuan')->insert([
            'id'=> '12',
            'name' => 'Pertemuan 12',
            'created_at' => Carbon::now(),
        ]);
        DB::table('pertemuan')->insert([
            'id'=> '13',
            'name' => 'Pertemuan 13',
            'created_at' => Carbon::now(),
        ]);
        DB::table('pertemuan')->insert([
            'id'=> '14',
            'name' => 'Pertemuan 14',
            'created_at' => Carbon::now(),
        ]);
        
        DB::table('meetingname')->insert([
            'id'=> '1',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 01',
            'class_id' => '1',
            'pertemuan_id'=> '1',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '2',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 02',
            'class_id' => '1',
            'pertemuan_id'=> '2',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '3',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 03',
            'class_id' => '1',
            'pertemuan_id'=> '3',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '4',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 04',
            'class_id' => '1',
            'pertemuan_id'=> '4',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '5',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 05',
            'class_id' => '1',
            'pertemuan_id'=> '5',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '6',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 06',
            'class_id' => '1',
            'pertemuan_id'=> '6',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '7',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 07',
            'class_id' => '1',
            'pertemuan_id'=> '7',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '8',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 08',
            'class_id' => '1',
            'pertemuan_id'=> '8',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '9',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 09',
            'class_id' => '1',
            'pertemuan_id'=> '9',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '10',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 10',
            'class_id' => '1',
            'pertemuan_id'=> '10',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '11',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 11',
            'class_id' => '1',
            'pertemuan_id'=> '11',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '12',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 12',
            'class_id' => '1',
            'pertemuan_id'=> '12',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '13',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 13',
            'class_id' => '1',
            'pertemuan_id'=> '13',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '14',
            'name' => 'Teknik Informatika 1 - PERTEMUAN 14',
            'class_id' => '1',
            'pertemuan_id'=> '14',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '15',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 01',
            'class_id' => '2',
            'pertemuan_id'=> '1',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '16',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 02',
            'class_id' => '2',
            'pertemuan_id'=> '2',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '17',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 03',
            'class_id' => '2',
            'pertemuan_id'=> '3',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '18',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 04',
            'class_id' => '2',
            'pertemuan_id'=> '4',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '19',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 05',
            'class_id' => '2',
            'pertemuan_id'=> '5',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '20',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 06',
            'class_id' => '2',
            'pertemuan_id'=> '6',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '21',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 07',
            'class_id' => '2',
            'pertemuan_id'=> '7',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '22',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 08',
            'class_id' => '2',
            'pertemuan_id'=> '8',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '23',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 09',
            'class_id' => '2',
            'pertemuan_id'=> '9',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '24',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 10',
            'class_id' => '2',
            'pertemuan_id'=> '10',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '25',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 11',
            'class_id' => '2',
            'pertemuan_id'=> '11',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '26',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 12',
            'class_id' => '2',
            'pertemuan_id'=> '12',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '27',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 13',
            'class_id' => '2',
            'pertemuan_id'=> '13',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        DB::table('meetingname')->insert([
            'id'=> '28',
            'name' => 'Teknik Informatika 2 - PERTEMUAN 14',
            'class_id' => '2',
            'pertemuan_id'=> '14',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
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
