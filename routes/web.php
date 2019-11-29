<?php

Route::get('/demo-form-components', function(){
    return view('pages.form-components');
});

//Middleware auth routes;
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
//halaman forgot password dan reset password 
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token?}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/email/reset','Auth\ResetPasswordController@reset')->name('reset');
//verifikasi email
Route::get('/user/verify/{token}', 'TeknisiController@verifikasiTeknisi');


//Middleware auth
Route::group([ 'middleware' => 'auth' ], function () {
            //user profile routes
        Route::get('akun/profile', 'UserController@showProfile')->name('profile');
        Route::post('akun/profile/upload-image', 'UserController@uploadImageProfile')->name('uploadProfile');
        Route::get('akun/profile/get-userImage/', 'UserController@getUserImage')->name('getImgProfile');
        //
        Route::post('post-ganti-password', 'UserController@gantiPassword')->name('postGantiPassword');
        //
        Route::get('/dokumentasi/foto/get-foto', 'DokumentasiController@getImage')->name('getImage');    
        Route::get('/dokumentasi/foto/download', 'DokumentasiController@downloadImages')->name('downloadImage');
        Route::get('/dokumentasi/video/download', 'DokumentasiController@downloadVideo')->name('downloadVideo');

        //
        Route::post('/instansi/daftar-instansi', 'InstansiController@getInstansi');
        Route::post('/instansi/daftar-pic', 'InstansiController@getDaftarPic');
        Route::post('/instansi/list-kategori', 'InstansiController@getListCategory');
        Route::post('/wilayah-indonesia/provinsi', 'WilayahIndonesiaController@getProvinces');
        Route::post('/wilayah-indonesia/kabupaten-kota', 'WilayahIndonesiaController@getRegencies');

        //Middleware user.default
        Route::group(['middleware'=> 'user.default'], function(){
            Route::get('/', function () {
                return redirect()->intended('dashboard');
            });
            Route::get('/home', function () {
                return redirect()->intended('dashboard');
            });
            Route::get('/dashboard', 'HomeController@index')->name('dashboard');
            
            Route::get('akun/ganti-password', 'UserController@indexGantiPassword')->name('gantiPassword');
            //laporan instalasi routes
            Route::get('/laporan-instalasi-baru', 'LaporanInstalasiController@showFormInstalasi')->name('showFormInstalasi');
            Route::post('/laporan-instalasi/buat-baru', 'LaporanInstalasiController@createLaporanInstalasi')->name('buatLaporanInstalasiBaru');
            Route::post('/laporan-instalasi/daftar-proyek-instalasi', 'LaporanInstalasiController@getByUser');
            Route::get('/daftar-proyek-instalasi', function(){
                return view('pages.users.daftarProyekInstalasi');
            })->name('daftar-proyek-instalasi');
            Route::get('/daftar-proyek-instalasi/detail-proyek', 'LaporanInstalasiController@getSpecificReport')->name('detail-proyek');

            //
            Route::get('/laporan-berkala', 'LaporanBerkalaController@showFormBerkala')->name('showFormBerkala');
            Route::post('/laporan-berkala/buat', 'LaporanBerkalaController@createLaporanBerkala')->name('buatLaporanBerkala');

            Route::get('/laporan-training', 'LaporanTrainingController@showFormTraining')->name('showFormTraining');
            Route::post('/laporan-training/buat', 'LaporanTrainingController@createLaporanTraining')->name('buatLaporanTraining');

            //
            Route::get('/laporan-keluhan', function(){
                return view('pages.users.buatLaporanKeluhan');
            });
            Route::post('/laporan-keluhan/buat', 'LaporanKeluhanController@createLaporanKeluhan')->name('buatLaporanKeluhan');
            Route::post('/laporan-keluhan/subjek-keluhan/data','LaporanKeluhanController@getSubjekKeluhan');

            //
            Route::post('/dokumentasi/foto/upload-foto', 'DokumentasiController@uploadImages')->name('imageUploads');
            Route::post('/dokumentasi/foto/delete-foto', 'DokumentasiController@deleteImage')->name('deleteImage');
            Route::post('/dokumentasi/video/upload-video', 'DokumentasiController@uploadVideo')->name('videoUploads');
            Route::post('/dokumentasi/video/delete-video', 'DokumentasiController@deleteVideo')->name('deleteVideo');
            
            //
            Route::post('/statistik/proyek/list-proyek', 'ProyekController@listProjectBetweenTwoDates');
                
        });
        //Middleware admin routes prefix admin eg admin/....
        Route::group(['middleware'=>'admin', 'prefix'=>'admin'], function(){
                Route::get('/', function () {
                    return redirect()->intended('dashboard');
                });
                Route::get('/home', 'HomeController@indexOfAdmin')->name('home');
                Route::get('/dashboard', 'HomeController@indexOfAdmin')->name('dashboardAdmin');
                Route::get('/dashboard/data', 'HomeController@getYearData');
                Route::post('akun/logout', 'Auth\LoginController@logout')->name('logoutAdmin');
                Route::get('akun/profile', 'UserController@showProfile')->name('profileAdmin');
                Route::get('akun/profile/get-userImage/', 'UserController@getUserImage')->name('getImgProfileAdmin');
                Route::get('akun/ganti-password', 'UserController@indexGantiPassword')->name('gantiPasswordAdmin');

                //
                Route::get('/instansi', function(){
                    return view('pages.admin.instansi');
                })->name('tambah-instansi-form');
                Route::post('/instansi/tambah-instansi/', 'InstansiController@addInstansi')->name('tambah-instansi');


                //pages proyek instansi
                Route::get('/daftar-proyek-instalasi', function(){
                    return view('pages.admin.daftarProyekInstalasiAdmin');
                })->name('daftar-proyek-instalasi-admin'); //show pages proyek instalasi                
                Route::post('/daftar-proyek-instalasi/data', 'ProyekController@showProyek'); //table daftar seluruh instalasi
                Route::get('/daftar-proyek-instalasi/detail-proyek/', 'LaporanInstalasiController@getSpecificReport')->name('detail-proyek');

                //pages keluhan
                Route::get('/keluhan', function(){
                    return view('pages.admin.keluhan');
                })->name('listKeluhan');
                Route::post('/postKeluhan','LaporanKeluhanController@showDaftarkeluhan')->name('keluhan');
                Route::post('/keluhan-per-tahun','LaporanKeluhanController@instansiKeluhan');
                
                //pages statistik teknisi & detail teknisi
                Route::get('/statistik/teknisi/detailTeknisi','TeknisiController@detailTeknisi')->name('detail-teknisi'); //pages detail teknisi

                //pages daftar teknisi
                Route::get('/manajemen/teknisi/daftar-teknisi','TeknisiController@indexDeleteUser')->name('daftar-teknisi'); //showpages delete teknisi
                Route::post('/manajemen/teknisi/showUser','TeknisiController@showUser')->name('show-user'); //tampil daftar teknisi
                Route::get('/manajemen/teknisi/deleteUser/','TeknisiController@deleteUser'); //function for delete

                //pages form teknisi
                Route::post('/manajemen/teknisi/tambah-teknisi','TeknisiController@addTeknisi')->name('addTeknisi'); //show add teknisi pages
                Route::get('/manajemen/teknisi/formAddTeknisi','TeknisiController@formAddTeknisi')->name('formAddTeknisi');//show form add teknisi

                //pages kategori & function
                Route::get('/manajemen/kategori-instansi', function(){
                    return view('pages.admin.kategoriInstansi');
                })->name('list-kategori');
                Route::post('/manajemen/kategori-instansi/data','InstansiController@getListCategory');
                Route::post('/manajemen/kategori/update','InstansiController@updateCategory')->name('update-kategori'); //update kategori function
                Route::post('/manajemen/kategori/addNew','InstansiController@addCategory')->name('add-kategori'); //add kategori function
                Route::get('/manajemen/kategori/delete','InstansiController@deleteCategory')->name('delete-kategori'); //delete kategori function

                //detail teknisi pages
                Route::post('/editTeknisi','TeknisiController@editProfile')->name('edit-teknisi'); //edit teknisi function
                Route::post('/editImageTeknisi','UserController@uploadImageProfile')->name('edit-image'); //edit teknisi function

                //subjek keluhan    
                Route::get('/manajemen/subjek-keluhan', function(){
                    return view('pages.admin.subjekKeluhan');
                })->name('subjek-keluhan');
                Route::post('/manajemen/subjek-keluhan/data','LaporanKeluhanController@getSubjekKeluhan');
                Route::post('/manajemen/subjek-keluhan/add-subjek','LaporanKeluhanController@addSubjekKeluhan')->name('add-subjek');
                Route::post('/manajemen/subjek-keluhan/update-subjek','LaporanKeluhanController@updateSubjekKeluhan')->name('update-subjek');
                Route::get('/manajemen/subjek-keluhan/delete-subjek','LaporanKeluhanController@deleteSubjekKeluhan')->name('delete-subjek');


                //download as pdf
                Route::get('/print/laporan-instalasi','LaporanInstalasiController@downloadPdf');
                
                //test controller
                Route::get('/test', 'TeknisiController@statsTeknisi');

                Route::get('/testis', 'ProyekController@barDetailProyek');

        });
    //logout routes
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

});