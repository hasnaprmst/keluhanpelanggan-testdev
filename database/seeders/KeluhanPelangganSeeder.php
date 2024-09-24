<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Hash;

class KeluhanPelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keluhan_pelanggan')->insert([
            [
                'nama' => 'nama1',
                'email' => 'nama1@email.com',
                'nomor_hp' => '62874361342',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 1',
                'created_at' => '2023-01-05 11:30:00'
            ],
            [
                'nama' => 'nama2',
                'email' => 'nama2@email.com',
                'nomor_hp' => '62874361343',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 2',
                'created_at' => '2023-01-06 11:30:00'
            ],
            [
                'nama' => 'nama3',
                'email' => 'nama3@email.com',
                'nomor_hp' => '62874361344',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 3',
                'created_at' => '2023-01-07 11:30:00'
            ],
            [
                'nama' => 'nama4',
                'email' => 'nama4@email.com',
                'nomor_hp' => '62874361345',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 4',
                'created_at' => '2023-01-08 11:30:00'
            ],
            [
                'nama' => 'nama5',
                'email' => 'nama5@email.com',
                'nomor_hp' => '62874361346',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 5',
                'created_at' => '2023-02-08 11:30:00'
            ],
            [
                'nama' => 'nama6',
                'email' => 'nama6@email.com',
                'nomor_hp' => '62874361347',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 6',
                'created_at' => '2023-02-09 11:30:00'
            ],
            [
                'nama' => 'nama7',
                'email' => 'nama7@email.com',
                'nomor_hp' => '62874361348',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 7',
                'created_at' => '2023-02-10 11:30:00'
            ],
            [
                'nama' => 'nama8',
                'email' => 'nama8@email.com',
                'nomor_hp' => '62874361349',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 8',
                'created_at' => '2023-02-11 11:30:00'
            ],
            [
                'nama' => 'nama9',
                'email' => 'nama9@email.com',
                'nomor_hp' => '62874361350',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 9',
                'created_at' => '2023-02-12 11:30:00'
            ],
            [
                'nama' => 'nama10',
                'email' => 'nama10@email.com',
                'nomor_hp' => '62874361351',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 10',
                'created_at' => '2023-02-13 11:30:00'
            ],
            [
                'nama' => 'nama11',
                'email' => 'nama11@email.com',
                'nomor_hp' => '62874361352',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 11',
                'created_at' => '2023-02-14 11:30:00'
            ],
            [
                'nama' => 'nama12',
                'email' => 'nama12@email.com',
                'nomor_hp' => '62874361353',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 12',
                'created_at' => '2023-03-02 11:30:00'
            ],
            [
                'nama' => 'nama13',
                'email' => 'nama13@email.com',
                'nomor_hp' => '62874361354',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 13',
                'created_at' => '2023-03-03 11:30:00'
            ],
            [
                'nama' => 'nama14',
                'email' => 'nama14@email.com',
                'nomor_hp' => '62874361355',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 14',
                'created_at' => '2023-03-04 11:30:00'
            ],
            [
                'nama' => 'nama15',
                'email' => 'nama15@email.com',
                'nomor_hp' => '62874361356',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 15',
                'created_at' => '2023-03-05 11:30:00'
            ],
            [
                'nama' => 'nama16',
                'email' => 'nama16@email.com',
                'nomor_hp' => '62874361357',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 16',
                'created_at' => '2023-03-06 11:30:00'
            ],
            [
                'nama' => 'nama17',
                'email' => 'nama17@email.com',
                'nomor_hp' => '62874361358',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 17',
                'created_at' => '2023-03-07 11:30:00'
            ],
            [
                'nama' => 'nama18',
                'email' => 'nama18@email.com',
                'nomor_hp' => '62874361359',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 18',
                'created_at' => '2023-03-08 11:30:00'
            ],
            [
                'nama' => 'nama19',
                'email' => 'nama19@email.com',
                'nomor_hp' => '62874361360',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 19',
                'created_at' => '2023-03-09 11:30:00'
            ],
            [
                'nama' => 'nama20',
                'email' => 'nama20@email.com',
                'nomor_hp' => '62874361361',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 20',
                'created_at' => '2023-03-10 11:30:00'
            ],
            [
                'nama' => 'nama21',
                'email' => 'nama21@email.com',
                'nomor_hp' => '62874361362',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 21',
                'created_at' => '2023-03-31 11:30:00'
            ],
            [
                'nama' => 'nama22',
                'email' => 'nama22@email.com',
                'nomor_hp' => '62874361363',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 22',
                'created_at' => '2023-04-01 11:30:00'
            ],
            [
                'nama' => 'nama23',
                'email' => 'nama23@email.com',
                'nomor_hp' => '62874361364',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 23',
                'created_at' => '2023-04-02 11:30:00'
            ],
            [
                'nama' => 'nama24',
                'email' => 'nama24@email.com',
                'nomor_hp' => '62874361365',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 24',
                'created_at' => '2023-04-03 11:30:00'
            ],
            [
                'nama' => 'nama25',
                'email' => 'nama25@email.com',
                'nomor_hp' => '62874361366',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 25',
                'created_at' => '2023-04-04 11:30:00'
            ],
            [
                'nama' => 'nama26',
                'email' => 'nama26@email.com',
                'nomor_hp' => '62874361367',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 26',
                'created_at' => '2023-04-05 11:30:00'
            ],
            [
                'nama' => 'nama27',
                'email' => 'nama27@email.com',
                'nomor_hp' => '62874361368',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 27',
                'created_at' => '2023-04-06 11:30:00'
            ],
            [
                'nama' => 'nama28',
                'email' => 'nama28@email.com',
                'nomor_hp' => '62874361369',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 28',
                'created_at' => '2023-04-07 11:30:00'
            ],
            [
                'nama' => 'nama29',
                'email' => 'nama29@email.com',
                'nomor_hp' => '62874361370',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 29',
                'created_at' => '2023-04-08 11:30:00'
            ],
            [
                'nama' => 'nama30',
                'email' => 'nama30@email.com',
                'nomor_hp' => '62874361371',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 30',
                'created_at' => '2023-04-09 11:30:00'
            ],
            [
                'nama' => 'nama31',
                'email' => 'nama31@email.com',
                'nomor_hp' => '62874361372',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 31',
                'created_at' => '2023-05-01 11:30:00'
            ],
            [
                'nama' => 'nama32',
                'email' => 'nama32@email.com',
                'nomor_hp' => '62874361373',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 32',
                'created_at' => '2023-05-02 11:30:00'
            ],
            [
                'nama' => 'nama33',
                'email' => 'nama33@email.com',
                'nomor_hp' => '62874361374',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 33',
                'created_at' => '2023-05-03 11:30:00'
            ],
            [
                'nama' => 'nama34',
                'email' => 'nama34@email.com',
                'nomor_hp' => '62874361375',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 34',
                'created_at' => '2023-05-04 11:30:00'
            ],
            [
                'nama' => 'nama35',
                'email' => 'nama35@email.com',
                'nomor_hp' => '62874361376',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 35',
                'created_at' => '2023-05-05 11:30:00'
            ],
            [
                'nama' => 'nama36',
                'email' => 'nama36@email.com',
                'nomor_hp' => '62874361377',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 36',
                'created_at' => '2023-05-06 11:30:00'
            ],
            [
                'nama' => 'nama37',
                'email' => 'nama37@email.com',
                'nomor_hp' => '62874361378',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 37',
                'created_at' => '2023-05-07 11:30:00'
            ],
            [
                'nama' => 'nama38',
                'email' => 'nama38@email.com',
                'nomor_hp' => '62874361379',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 38',
                'created_at' => '2023-05-08 11:30:00'
            ],
            [
                'nama' => 'nama39',
                'email' => 'nama39@email.com',
                'nomor_hp' => '62874361380',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 39',
                'created_at' => '2023-05-09 11:30:00'
            ],
            [
                'nama' => 'nama40',
                'email' => 'nama40@email.com',
                'nomor_hp' => '62874361381',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 40',
                'created_at' => '2023-05-10 11:30:00'
            ],
            [
                'nama' => 'nama41',
                'email' => 'nama41@email.com',
                'nomor_hp' => '62874361382',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 41',
                'created_at' => '2023-05-11 11:30:00'
            ],
            [
                'nama' => 'nama42',
                'email' => 'nama42@email.com',
                'nomor_hp' => '62874361383',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 42',
                'created_at' => '2023-05-12 11:30:00'
            ],
            [
                'nama' => 'nama43',
                'email' => 'nama43@email.com',
                'nomor_hp' => '62874361384',
                'status_keluhan' => '2',
                'keluhan' => 'keluhan pelanggan 43',
                'created_at' => '2023-05-13 11:30:00'
            ],
            [
                'nama' => 'nama44',
                'email' => 'nama44@email.com',
                'nomor_hp' => '62874361385',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 44',
                'created_at' => '2023-05-14 11:30:00'
            ],
            [
                'nama' => 'nama45',
                'email' => 'nama45@email.com',
                'nomor_hp' => '62874361386',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 45',
                'created_at' => '2023-05-15 11:30:00'
            ],
            [
                'nama' => 'nama46',
                'email' => 'nama46@email.com',
                'nomor_hp' => '62874361387',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 46',
                'created_at' => '2023-05-16 11:30:00'
            ],
            [
                'nama' => 'nama47',
                'email' => 'nama47@email.com',
                'nomor_hp' => '62874361388',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 47',
                'created_at' => '2023-05-17 11:30:00'
            ],
            [
                'nama' => 'nama48',
                'email' => 'nama48@email.com',
                'nomor_hp' => '62874361389',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 48',
                'created_at' => '2023-06-22 11:30:00'
            ],
            [
                'nama' => 'nama49',
                'email' => 'nama49@email.com',
                'nomor_hp' => '62874361390',
                'status_keluhan' => '0',
                'keluhan' => 'keluhan pelanggan 49',
                'created_at' => '2023-06-23 11:30:00'
            ],
            [
                'nama' => 'nama50',
                'email' => 'nama50@email.com',
                'nomor_hp' => '62874361391',
                'status_keluhan' => '1',
                'keluhan' => 'keluhan pelanggan 50',
                'created_at' => '2023-06-23 11:30:00'
            ],
        ]);
    }
}
