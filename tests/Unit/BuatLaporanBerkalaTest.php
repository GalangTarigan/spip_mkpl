<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Model\Laporan_Instalasi;

class BuatLaporanBerkalaTest extends TestCase
{
    public function createUserDefault()
    {
        return factory(User::class)->create();
    }

    public function createUserAdmin()
    {
        return factory(User::class)->create([
            'role' => 'admin'
        ]);
    }

    public function getUserAdmin()
    {
        return User::find(1);
    }

    // Asumsi user dengan id dibawah ini tidak sedang mengerjakan proyek
    public function getUserDefault($id_user)
    {
        return User::find($id_user);
    }

    public function getUserDefaultWithActiveProject()
    {
        return Laporan_Instalasi::where('status', 'Dalam Pengerjaan')->first()->users;
    }
    /**
     *
     * User default membuat laporan berkala ketika sedang tidak ada laporan / proyek yang sedang dikerjakan dengan mengisikan field yang tidak valid
     * Expected result : user tidak dapat membuat laporan berkala, sistem menampilkan pesan error validasi untuk field tertentu yang isiannya tidak valid
     * @return void
     */
    public function testUserTryToCreateRoutineReport_1()
    {
        $user = $this->getUserDefaultWithActiveProject();
        $this->actingAs($user);

        $response = $this->post('/laporan-berkala/buat', [
            'subjek' => 'Jaringan',
            'permasalahanKeluhan' => '', // mengosongkan field permasalahanKeluhan
            'solusi' => 'Ganti provider'
        ]);
        $response->assertSessionHasErrors(['permasalahanKeluhan']); // cek apakah error untuk keys permasalahanKeluhan ada
        $this->assertDatabaseMissing('laporan_instalasi_berkala', ['subjek' => 'Jaringan', 'isi_laporan' => ';+;Ganti provider']);
    }

    /**
     *
     * User default membuat laporan berkala ketika sedang tidak ada laporan / proyek yang sedang dikerjakan
     * Expected result : user tidak dapat membuat laporan berkala
     * @return void
     */
    public function testUserTryToCreateRoutineReport_2()
    {
        $user = $this->createUserDefault();
        $this->actingAs($user);

        $response = $this->post('/laporan-berkala/buat', [
            'subjek' => 'Jaringan',
            'permasalahanKeluhan' => 'Internet tidak stabil',
            'solusi' => 'Ganti provider'
        ]);
        $response->assertRedirect('/laporan-berkala');
        $response->assertSessionHas('error');
        $this->assertDatabaseMissing('laporan_instalasi_berkala', ['subjek' => 'Jaringan', 'isi_laporan' => 'Internet tidak stabil;+;Ganti provider']);
    }

    /**
     *
     * User default membuat laporan berkala ketika sedang ada laporan / proyek yang sedang dikerjakan
     * Expected result : user dapat membuat laporan berkala
     * @return void
     */
    public function testUserTryToCreateRoutineReport_3()
    {
        $user = $this->getUserDefaultWithActiveProject();
        $this->actingAs($user);

        $response = $this->post('/laporan-berkala/buat', [
            'subjek' => 'Jaringan',
            'permasalahanKeluhan' => 'Internet tidak stabil',
            'solusi' => 'Ganti provider'
        ]);
        // dd($response);
        $response->assertRedirect('/laporan-berkala');
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('laporan_instalasi_berkala', ['subjek' => 'Jaringan', 'isi_laporan' => 'Internet tidak stabil;+;Ganti provider']);
    }
}
