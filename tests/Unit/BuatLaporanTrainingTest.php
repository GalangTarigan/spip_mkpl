<?php

namespace Tests\Unit;

use App\Model\Dokumentasi_Instalasi;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Model\Laporan_Instalasi;
use App\Pkl\Traits\LaporanInstalasi;
use App\Pkl\Traits\Convert;

class BuatLaporanTrainingTest extends TestCase
{
    use LaporanInstalasi, Convert;
    public function createUserDefault(){
        return factory(User::class)->create();
    }

    public function createUserAdmin(){
        return factory(User::class)->create([
            'role' => 'admin'
        ]);
    }

    public function createDocumentationPhotos($id_laporan){
        return factory(Dokumentasi_Instalasi::class)->create([
            'laporan_instalasi_id' => $id_laporan,
        ]);
    }

    public function createDocumentationVideo($id_laporan){
        return factory(Dokumentasi_Instalasi::class)->create([
            'laporan_instalasi_id' => $id_laporan,
            'keterangan' => 'video',
            'dokumentasi' => 'dokumentasi/video/fakeVideo.mp4'
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
     * User default membuat laporan training ketika sedang ada laporan / proyek yang sedang dikerjakan dengan menginputkan isian yang tidak valid
     * Expected result : user tidak dapat membuat laporan training, sistem menampilkan pesan error sesuai field yang tidak valid
     * @return void
     */
    public function testUserTryToCreateTrainingReport_1()
    {
        $user = $this->getUserDefaultWithActiveProject();
        $this->actingAs($user);
        $laporan = $this->getCurrentActiveUserProjects($user->id);
        $response = $this->post('/laporan-training/buat', [
            'waktuMulaiTraining' => '07/11/2019 16:00',
            'waktuSelesaiTraining' => '07/11/2019 15:38',
            'informasiTambahan' => 'Ganti provider'
        ]);
        $errors = request()->session()->get('errors');

        $messages = $errors->getBag('default')->getMessages();
        $ErrorMessage = array_shift($messages['waktuSelesaiTraining']);

        $this->assertEquals('Tanggal dan waktu selesai training harus diset setelah tanggal & waktu mulai instalasi, tanggal mulai training serta harus terlewati dari waktu sekarang', $ErrorMessage);
        $this->assertDatabaseMissing('laporan_training', ['laporan_instalasi_id' => $laporan->id_laporan, 'waktu_mulai_t' => $this->convertToTimeStamps('07/11/2019 16:00'), 'waktu_selesai_t' => $this->convertToTimeStamps('07/11/2019 15:38') ]);
    }

    /**
     * User default membuat laporan training ketika sedang tidak ada laporan / proyek yang sedang dikerjakan
     * Expected result : user tidak dapat membuat laporan training
     * @return void
     */
    public function testUserTryToCreateTrainingReport_2()
    {
        $user = $this->createUserDefault();
        $this->actingAs($user);

        $response = $this->get('/laporan-training');
        $response->assertViewHas('status', 'Prohibited');
    }

    /**
     * User default membuat laporan training ketika sedang tidak ada laporan / proyek yang sedang dikerjakan dengan menginputkan isian yang valid tetapi tidak menyertakan dokumentasi foto dan video
     * Expected result : user tidak dapat membuat laporan training, sistem menampilkan pesan error dengan pesan bahwa user harus menyertakan dokumentasi foto min 5 dan video == 1
     * @return void
     */
    public function testUserTryToCreateTrainingReport_3()
    {
        $user = $this->getUserDefaultWithActiveProject();
        $this->actingAs($user);
        $laporan = $this->getCurrentActiveUserProjects($user->id);

        $response = $this->post('/laporan-training/buat', [
            'waktuMulaiTraining' => '07/11/2019 16:00',
            'waktuSelesaiTraining' => '07/11/2019 16:40',
            'informasiTambahan' => 'Ganti provider'
        ]);
        $response->assertRedirect('/laporan-training');
        $response->assertSessionHasErrors('failed');
        $this->assertDatabaseMissing('laporan_training', ['laporan_instalasi_id' => $laporan->id_laporan, 'waktu_mulai_t' => $this->convertToTimeStamps('07/11/2019 16:00'), 'waktu_selesai_t' => $this->convertToTimeStamps('07/11/2019 15:38') ]);
    }

     /**
     * User default membuat laporan training ketika sedang tidak ada laporan / proyek yang sedang dikerjakan dengan menginputkan isian yang valid serta menyertakan dokumentasi foto >= 5 dan video == 1
     * Expected result : user dapat membuat laporan training
     * @return void
     */
    public function testUserTryToCreateTrainingReport_5()
    {
        $user = $this->getUserDefaultWithActiveProject();
        $this->actingAs($user);

        $laporan = $this->getCurrentActiveUserProjects($user->id);

        for ($i = 0; $i < 5; $i++){
            $this->createDocumentationPhotos($laporan->id_laporan);
        }
        $this->createDocumentationVideo($laporan->id_laporan);

        $response = $this->post('/laporan-training/buat', [
            'waktuMulaiTraining' => '07/11/2019 16:00',
            'waktuSelesaiTraining' => '07/11/2019 16:40',
            'informasiTambahan' => 'Ganti provider'
        ]);
        $response->assertRedirect('/daftar-proyek-instalasi');
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('training_report_s');
        $this->assertDatabaseHas('laporan_training', ['laporan_instalasi_id' => $laporan->id_laporan, 'waktu_mulai_t' => $this->convertToTimeStamps('07/11/2019 16:00'), 'waktu_selesai_t' => $this->convertToTimeStamps('07/11/2019 16:40') ]);
    }
}
