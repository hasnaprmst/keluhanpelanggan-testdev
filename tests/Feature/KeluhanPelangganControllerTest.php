<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\KeluhanPelanggan;
use App\Models\KeluhanStatusHis;

class KeluhanPelangganControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_update_keluhan_pelanggan()
    {
        $keluhan = KeluhanPelanggan::create([
            'nama' => 'Test',
            'email' => 'test@email.com',
            'nomor_hp' => '081234567890',
            'status_keluhan' => '1',
            'keluhan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec odio vitae nunc ultricies aliquam. Donec nec odio vitae nunc ultricies aliquam. Donec nec odio vitae nunc ultricies aliquam.'
        ]);

        $data = [
            'nama' => 'Test',
            'email' => 'test@email.com',
            'nomor_hp' => '081234567890',
            'status_keluhan' => '2',
            'keluhan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec odio vitae nunc ultricies aliquam. Donec nec odio vitae nunc ultricies aliquam. Donec nec odio vitae nunc ultricies aliquam.'
        ];

        $response = $this->putJson("/api/keluhan-pelanggan/$keluhan->id", $data);

        $response->assertStatus(200);
        $response->assertJson([
            'status_keluhan' => '2'
        ]);

        $keluhan->refresh();
        $this->assertEquals('2', $keluhan->status_keluhan);
    }

    public function keluhan_tidak_ditemukan()
    {
        $data = ['status_keluhan' => '2'];
        $response = $this->putJson("/api/keluhan-pelanggan/54", $data);

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'Keluhan tidak ditemukan'
        ]);
    }
}
