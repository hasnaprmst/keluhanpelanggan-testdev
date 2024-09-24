<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Hash;

class KeluhanStatusHisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keluhan_status_his')->insert([
            ['id' => 1, 'keluhan_id' => 1, 'status_keluhan' => '0', 'updated_at' => '2023-01-05 11:30:00'],
            ['id' => 3, 'keluhan_id' => 1, 'status_keluhan' => '1', 'updated_at' => '2023-01-06 11:30:00'],
            ['id' => 6, 'keluhan_id' => 1, 'status_keluhan' => '2', 'updated_at' => '2023-01-07 11:30:00'],
            ['id' => 2, 'keluhan_id' => 2, 'status_keluhan' => '0', 'updated_at' => '2023-01-06 11:30:00'],
            ['id' => 5, 'keluhan_id' => 2, 'status_keluhan' => '1', 'updated_at' => '2023-01-07 11:30:00'],
            ['id' => 9, 'keluhan_id' => 2, 'status_keluhan' => '2', 'updated_at' => '2023-01-08 11:30:00'],
            ['id' => 4, 'keluhan_id' => 3, 'status_keluhan' => '0', 'updated_at' => '2023-01-07 11:30:00'],
            ['id' => 8, 'keluhan_id' => 3, 'status_keluhan' => '1', 'updated_at' => '2023-01-08 11:30:00'],
            ['id' => 11, 'keluhan_id' => 3, 'status_keluhan' => '2', 'updated_at' => '2023-01-09 11:30:00'],
            ['id' => 7, 'keluhan_id' => 4, 'status_keluhan' => '0', 'updated_at' => '2023-01-08 11:30:00'],
            ['id' => 10, 'keluhan_id' => 4, 'status_keluhan' => '1', 'updated_at' => '2023-01-09 11:30:00'],
            ['id' => 12, 'keluhan_id' => 5, 'status_keluhan' => '0', 'updated_at' => '2023-02-08 11:30:00'],
            ['id' => 14, 'keluhan_id' => 5, 'status_keluhan' => '1', 'updated_at' => '2023-02-09 11:30:00'],
            ['id' => 13, 'keluhan_id' => 6, 'status_keluhan' => '0', 'updated_at' => '2023-02-09 11:30:00'],
            ['id' => 16, 'keluhan_id' => 6, 'status_keluhan' => '1', 'updated_at' => '2023-02-10 11:30:00'],
            ['id' => 15, 'keluhan_id' => 7, 'status_keluhan' => '0', 'updated_at' => '2023-02-10 11:30:00'],
            ['id' => 18, 'keluhan_id' => 7, 'status_keluhan' => '1', 'updated_at' => '2023-02-11 11:30:00'],
            ['id' => 17, 'keluhan_id' => 8, 'status_keluhan' => '0', 'updated_at' => '2023-02-11 11:30:00'],
            ['id' => 19, 'keluhan_id' => 9, 'status_keluhan' => '0', 'updated_at' => '2023-02-12 11:30:00'],
            ['id' => 21, 'keluhan_id' => 9, 'status_keluhan' => '1', 'updated_at' => '2023-02-13 11:30:00'],
            ['id' => 20, 'keluhan_id' => 10, 'status_keluhan' => '0', 'updated_at' => '2023-02-13 11:30:00'],
            ['id' => 22, 'keluhan_id' => 11, 'status_keluhan' => '0', 'updated_at' => '2023-02-14 11:30:00'],
            ['id' => 23, 'keluhan_id' => 12, 'status_keluhan' => '0', 'updated_at' => '2023-03-02 11:30:00'],
            ['id' => 24, 'keluhan_id' => 13, 'status_keluhan' => '0', 'updated_at' => '2023-03-03 11:30:00'],
            ['id' => 25, 'keluhan_id' => 13, 'status_keluhan' => '1', 'updated_at' => '2023-03-04 11:30:00'],
            ['id' => 26, 'keluhan_id' => 14, 'status_keluhan' => '0', 'updated_at' => '2023-03-04 11:30:00'],
            ['id' => 28, 'keluhan_id' => 14, 'status_keluhan' => '1', 'updated_at' => '2023-03-05 11:30:00'],
            ['id' => 30, 'keluhan_id' => 14, 'status_keluhan' => '2', 'updated_at' => '2023-03-06 11:30:00'],
            ['id' => 27, 'keluhan_id' => 15, 'status_keluhan' => '0', 'updated_at' => '2023-03-05 11:30:00'],
            ['id' => 29, 'keluhan_id' => 16, 'status_keluhan' => '0', 'updated_at' => '2023-03-06 11:30:00'],
            ['id' => 31, 'keluhan_id' => 17, 'status_keluhan' => '0', 'updated_at' => '2023-03-07 11:30:00'],
            ['id' => 33, 'keluhan_id' => 17, 'status_keluhan' => '1', 'updated_at' => '2023-03-08 11:30:00'],
            ['id' => 35, 'keluhan_id' => 17, 'status_keluhan' => '2', 'updated_at' => '2023-03-09 11:30:00'],
            ['id' => 32, 'keluhan_id' => 18, 'status_keluhan' => '0', 'updated_at' => '2023-03-08 11:30:00'],
            ['id' => 34, 'keluhan_id' => 19, 'status_keluhan' => '0', 'updated_at' => '2023-03-09 11:30:00'],
            ['id' => 37, 'keluhan_id' => 19, 'status_keluhan' => '1', 'updated_at' => '2023-03-10 11:30:00'],
            ['id' => 38, 'keluhan_id' => 19, 'status_keluhan' => '2', 'updated_at' => '2023-03-11 11:30:00'],
            ['id' => 36, 'keluhan_id' => 20, 'status_keluhan' => '0', 'updated_at' => '2023-03-10 11:30:00'],
            ['id' => 39, 'keluhan_id' => 21, 'status_keluhan' => '0', 'updated_at' => '2023-03-31 11:30:00'],
            ['id' => 40, 'keluhan_id' => 22, 'status_keluhan' => '0', 'updated_at' => '2023-04-01 11:30:00'],
            ['id' => 41, 'keluhan_id' => 23, 'status_keluhan' => '0', 'updated_at' => '2023-04-02 11:30:00'],
            ['id' => 43, 'keluhan_id' => 23, 'status_keluhan' => '1', 'updated_at' => '2023-04-03 11:30:00'],
            ['id' => 42, 'keluhan_id' => 24, 'status_keluhan' => '0', 'updated_at' => '2023-04-03 11:30:00'],
            ['id' => 44, 'keluhan_id' => 24, 'status_keluhan' => '1', 'updated_at' => '2023-04-04 11:30:00'],
            ['id' => 45, 'keluhan_id' => 25, 'status_keluhan' => '0', 'updated_at' => '2023-04-04 11:30:00'],
            ['id' => 46, 'keluhan_id' => 25, 'status_keluhan' => '1', 'updated_at' => '2023-04-05 11:30:00'],
            ['id' => 47, 'keluhan_id' => 25, 'status_keluhan' => '2', 'updated_at' => '2023-04-06 11:30:00'],
            ['id' => 48, 'keluhan_id' => 26, 'status_keluhan' => '0', 'updated_at' => '2023-04-20 11:30:00'],
            ['id' => 50, 'keluhan_id' => 26, 'status_keluhan' => '1', 'updated_at' => '2023-04-21 11:30:00'],
            ['id' => 53, 'keluhan_id' => 26, 'status_keluhan' => '2', 'updated_at' => '2023-04-22 11:30:00'],
            ['id' => 49, 'keluhan_id' => 27, 'status_keluhan' => '0', 'updated_at' => '2023-04-21 11:30:00'],
            ['id' => 52, 'keluhan_id' => 27, 'status_keluhan' => '1', 'updated_at' => '2023-04-22 11:30:00'],
            ['id' => 56, 'keluhan_id' => 27, 'status_keluhan' => '2', 'updated_at' => '2023-04-23 11:30:00'],
            ['id' => 51, 'keluhan_id' => 28, 'status_keluhan' => '0', 'updated_at' => '2023-04-22 11:30:00'],
            ['id' => 55, 'keluhan_id' => 28, 'status_keluhan' => '1', 'updated_at' => '2023-04-23 11:30:00'],
            ['id' => 58, 'keluhan_id' => 28, 'status_keluhan' => '2', 'updated_at' => '2023-04-24 11:30:00'],
            ['id' => 54, 'keluhan_id' => 29, 'status_keluhan' => '0', 'updated_at' => '2023-04-23 11:30:00'],
            ['id' => 57, 'keluhan_id' => 29, 'status_keluhan' => '1', 'updated_at' => '2023-04-24 11:30:00'],
            ['id' => 59, 'keluhan_id' => 29, 'status_keluhan' => '2', 'updated_at' => '2023-04-25 11:30:00'],
            ['id' => 60, 'keluhan_id' => 30, 'status_keluhan' => '0', 'updated_at' => '2023-04-29 11:30:00'],
            ['id' => 62, 'keluhan_id' => 30, 'status_keluhan' => '1', 'updated_at' => '2023-04-30 11:30:00'],
            ['id' => 65, 'keluhan_id' => 30, 'status_keluhan' => '2', 'updated_at' => '2023-05-01 11:30:00'],
            ['id' => 61, 'keluhan_id' => 31, 'status_keluhan' => '0', 'updated_at' => '2023-04-30 11:30:00'],
            ['id' => 64, 'keluhan_id' => 31, 'status_keluhan' => '1', 'updated_at' => '2023-05-01 11:30:00'],
            ['id' => 68, 'keluhan_id' => 31, 'status_keluhan' => '2', 'updated_at' => '2023-05-02 11:30:00'],
            ['id' => 63, 'keluhan_id' => 32, 'status_keluhan' => '0', 'updated_at' => '2023-05-01 11:30:00'],
            ['id' => 67, 'keluhan_id' => 32, 'status_keluhan' => '1', 'updated_at' => '2023-05-02 11:30:00'],
            ['id' => 71, 'keluhan_id' => 32, 'status_keluhan' => '2', 'updated_at' => '2023-05-03 11:30:00'],
            ['id' => 66, 'keluhan_id' => 33, 'status_keluhan' => '0', 'updated_at' => '2023-05-02 11:30:00'],
            ['id' => 70, 'keluhan_id' => 33, 'status_keluhan' => '1', 'updated_at' => '2023-05-03 11:30:00'],
            ['id' => 74, 'keluhan_id' => 33, 'status_keluhan' => '2', 'updated_at' => '2023-05-04 11:30:00'],
            ['id' => 69, 'keluhan_id' => 34, 'status_keluhan' => '0', 'updated_at' => '2023-05-03 11:30:00'],
            ['id' => 73, 'keluhan_id' => 34, 'status_keluhan' => '1', 'updated_at' => '2023-05-04 11:30:00'],
            ['id' => 76, 'keluhan_id' => 34, 'status_keluhan' => '2', 'updated_at' => '2023-05-05 11:30:00'],
            ['id' => 72, 'keluhan_id' => 35, 'status_keluhan' => '0', 'updated_at' => '2023-05-04 11:30:00'],
            ['id' => 75, 'keluhan_id' => 35, 'status_keluhan' => '1', 'updated_at' => '2023-05-05 11:30:00'],
            ['id' => 77, 'keluhan_id' => 36, 'status_keluhan' => '0', 'updated_at' => '2023-05-10 11:30:00'],
            ['id' => 78, 'keluhan_id' => 37, 'status_keluhan' => '0', 'updated_at' => '2023-05-11 11:30:00'],
            ['id' => 79, 'keluhan_id' => 38, 'status_keluhan' => '0', 'updated_at' => '2023-05-12 11:30:00'],
            ['id' => 80, 'keluhan_id' => 39, 'status_keluhan' => '0', 'updated_at' => '2023-05-13 11:30:00'],
            ['id' => 81, 'keluhan_id' => 40, 'status_keluhan' => '0', 'updated_at' => '2023-05-14 11:30:00'],
            ['id' => 82, 'keluhan_id' => 41, 'status_keluhan' => '0', 'updated_at' => '2023-06-14 11:30:00'],
            ['id' => 83, 'keluhan_id' => 42, 'status_keluhan' => '0', 'updated_at' => '2023-06-15 11:30:00'],
            ['id' => 84, 'keluhan_id' => 43, 'status_keluhan' => '0', 'updated_at' => '2023-06-16 11:30:00'],
            ['id' => 86, 'keluhan_id' => 43, 'status_keluhan' => '1', 'updated_at' => '2023-06-17 11:30:00'],
            ['id' => 85, 'keluhan_id' => 44, 'status_keluhan' => '0', 'updated_at' => '2023-06-17 11:30:00'],
            ['id' => 88, 'keluhan_id' => 44, 'status_keluhan' => '1', 'updated_at' => '2023-06-18 11:30:00'],
            ['id' => 87, 'keluhan_id' => 45, 'status_keluhan' => '0', 'updated_at' => '2023-06-18 11:30:00'],
            ['id' => 90, 'keluhan_id' => 45, 'status_keluhan' => '1', 'updated_at' => '2023-06-19 11:30:00'],
            ['id' => 89, 'keluhan_id' => 46, 'status_keluhan' => '0', 'updated_at' => '2023-06-19 11:30:00'],
            ['id' => 92, 'keluhan_id' => 46, 'status_keluhan' => '1', 'updated_at' => '2023-06-20 11:30:00'],
            ['id' => 91, 'keluhan_id' => 47, 'status_keluhan' => '0', 'updated_at' => '2023-06-20 11:30:00'],
            ['id' => 94, 'keluhan_id' => 47, 'status_keluhan' => '1', 'updated_at' => '2023-06-21 11:30:00'],
            ['id' => 93, 'keluhan_id' => 48, 'status_keluhan' => '0', 'updated_at' => '2023-06-21 11:30:00'],
            ['id' => 96, 'keluhan_id' => 48, 'status_keluhan' => '1', 'updated_at' => '2023-06-22 11:30:00'],
            ['id' => 95, 'keluhan_id' => 49, 'status_keluhan' => '0', 'updated_at' => '2023-06-22 11:30:00'],
            ['id' => 98, 'keluhan_id' => 49, 'status_keluhan' => '1', 'updated_at' => '2023-06-23 11:30:00'],
            ['id' => 97, 'keluhan_id' => 50, 'status_keluhan' => '0', 'updated_at' => '2023-06-23 11:30:00'],
            ['id' => 99, 'keluhan_id' => 50, 'status_keluhan' => '1', 'updated_at' => '2023-06-24 11:30:00'],
        ]);
    }
}
