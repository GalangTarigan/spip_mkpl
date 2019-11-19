<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Model\Laporan_Instalasi;
class BuatLaporanInstalasi extends TestCase
{
    public function createUserDefault(){
        return factory(User::class)->create();
    }

    public function createUserAdmin(){
        return factory(User::class)->create([
            'role' => 'admin'
        ]);
    }

    public function getUserAdmin(){
        return User::find(1);
    }

    // Asumsi user dengan id dibawah ini tidak sedang mengerjakan proyek
    public function getUserDefault($id_user){
        return User::find($id_user);
    }

    public function getUserDefaultWithActiveProject(){
        return Laporan_Instalasi::where('status', 'Dalam Pengerjaan')->first()->users;
    }

    /**
     *
     *
     * @return void
     */
    public function testUnauthenticatedUserTryToAccessHomepage()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
    /**
     *
     *
     * @return void
     */
    public function testUserTryToLogin()
    {

        $user = $this->getUserDefault(2);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $user->password
        ]);

        $response->assertRedirect('/');
    }

    /**
     *
     * User mencoba default membuka halaman buat laporan disaat user tsb tdk sedang mengerjakan proyek
     *
     * @return void
     */
    public function testUserTryToAccessCreateNewReportPage_1()
    {

        $user = $this->getUserDefault(2);
        $this->actingAs($user);

        $response = $this->get('/laporan-instalasi-baru');
        $response->assertViewHas('status', 'Allowed');
    }

    /**
     * 
     * User default membuat laporan instalasi baru ketika tidak ada laporan yang sedang dikerjakan dengan menginputkan kolom isian yang salah
     * Expected result : user tidak dapat membuat laporan instalasi, sistem menampilkan pesan error validasi untuk field tertentu yang isiannya tidak valid
     */
    public function testUserTryToCreateNewInstallationReport_1()
    {
        $user = $this->createUserDefault();
        $this->actingAs($user);
        $response = $this->post('/laporan-instalasi/buat-baru', [
            'daftarInstansi' => 1, // pilih id instansi yang tidak sedang dikerjakan oleh orang lain
            'waktuMulaiInstalasi' => '06/11/asd asd' // format dd/mm/yyyy hh:mm
        ]);

        $errors = request()->session()->get('errors');

        $messages = $errors->getBag('default')->getMessages();
        $ErrorMessage = array_shift($messages['waktuMulaiInstalasi']);

        $this->assertEquals('Kolom waktu waktu mulai instalasi harus berisi tanggal dan waktu', $ErrorMessage);
        $this->assertDatabaseMissing('laporan_instalasi', ['user_nama' => $user->nama_lengkap ]);
    }

        /**
     *
     * User default membuat laporan instalasi baru ketika sedang ada laporan / proyek yang sedang dikerjakan
     * Expected result : user tidak dapat membuat laporan instalasi, user akan diarahkan ke halaman dashboard
     * @return void
     */
    public function testUserTryToCreateNewInstallationReport_2()
    {
        $user = $this->getUserDefaultWithActiveProject();
        $this->actingAs($user);
        $response = $this->post('/laporan-instalasi/buat-baru', [
            'daftarInstansi' => 2,
            'waktuMulaiInstalasi' => '06/11/2019 08:00'
        ]);

        $response->assertRedirect('/dashboard');
        $response->assertSessionHasErrors('failed');
    }


     /**
     * 
     * User default membuat laporan instalasi baru ketika tidak ada laporan yang sedang dikerjakan dengan memasukkan input yang valid
     * Expected result : laporan instalasi baru berhasil dibuat, user diarahkan ke halaman daftar proyek instalasi
     */
    public function testUserTryToCreateNewInstallationReport_4()
    {
        $user = $this->createUserDefault();
        $this->actingAs($user);
        $response = $this->post('/laporan-instalasi/buat-baru', [
            'daftarInstansi' => 2, // pilih id instansi yang tidak sedang dikerjakan oleh orang lain
            'waktuMulaiInstalasi' => '06/11/2019 08:00' // format dd/mm/yyyy hh:mm  dan harus terlewati dari waktu sekarang
        ]);
        //dd($response);
         $response->assertRedirect('/daftar-proyek-instalasi');
         $response->assertSessionHasNoErrors();
         $response->assertSessionHas('installation_report_s');
         $this->assertDatabaseHas('laporan_instalasi', ['user_nama' => $user->nama_lengkap ]);

    }

}
