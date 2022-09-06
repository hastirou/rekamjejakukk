<?php

use Illuminate\Support\Facades\Route;

    #Router Frontend

    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('index');
    Route::get('/semualelang', [App\Http\Controllers\Frontend\HomeController::class, 'semualelang'])->name('semualelang');

    #Router Frontend Lelang
    
    Route::get('/lelang/{id}', [App\Http\Controllers\Frontend\Lelang\LelangController::class, 'index'])->middleware('auth');
    Route::get('/lelang/detail/{id}', [App\Http\Controllers\Frontend\Lelang\LelangController::class, 'detail'])->name('detail');
    Route::get('/lelang/belumdimulai/{id}', [App\Http\Controllers\Frontend\Lelang\LelangController::class, 'belumdimulai'])->name('belumdimulai');
    Route::get('/bid/search/{id}', [App\Http\Controllers\Frontend\Lelang\LelangController::class, 'searchbid'])->name('searchbid');

	Auth::routes();

    #Router Backend
    Route::group(['middleware'=>['hakakses:pegawai'],'prefix'=>'admin'],function() {


    Route::get('/', [App\Http\Controllers\Backend\PanelController::class, 'index'])->name('index');

    #Router Backend Klasifikasi

    Route::get('/klasifikasi', [App\Http\Controllers\Backend\Master\KlasifikasiController::class, 'index'])->name('index');
    Route::get('/klasifikasi/create', [App\Http\Controllers\Backend\Master\KlasifikasiController::class, 'create'])->name('create');
    Route::post('/klasifikasi/store', [App\Http\Controllers\Backend\Master\KlasifikasiController::class, 'store'])->name('masterklasifikasi.store');
    Route::get('/klasifikasi/edit/{id}', [App\Http\Controllers\Backend\Master\KlasifikasiController::class, 'edit'])->name('edit');
    Route::post('/klasifikasi/update', [App\Http\Controllers\Backend\Master\KlasifikasiController::class, 'update'])->name('masterklasifikasi.update');
    Route::get('/klasifikasi/hapus/{id}', [App\Http\Controllers\Backend\Master\KlasifikasiController::class, 'hapus'])->name('hapus');

    #Router Backend Data Properti

    Route::get('/dataproperti', [App\Http\Controllers\Backend\DataProperti\PropertiController::class, 'index'])->name('index');
    Route::get('/dataproperti/create', [App\Http\Controllers\Backend\DataProperti\PropertiController::class, 'create'])->name('create');
    Route::post('/dataproperti/store', [App\Http\Controllers\Backend\DataProperti\PropertiController::class, 'store'])->name('properti.store');
    Route::get('/dataproperti/edit/{id}', [App\Http\Controllers\Backend\DataProperti\PropertiController::class, 'edit'])->name('edit');
    Route::get('/dataproperti/konfirmasi', [App\Http\Controllers\Backend\DataProperti\PropertiController::class, 'konfirmasi'])->name('konfirmasi');
    Route::get('/dataproperti/konfirm/{id}', [App\Http\Controllers\Backend\DataProperti\PropertiController::class, 'konfirm'])->name('konfirm');
    Route::get('/dataproperti/batalkonfirm/{id}', [App\Http\Controllers\Backend\DataProperti\PropertiController::class, 'batalkonfirm'])->name('batalkonfirm');
    Route::get('/dataproperti/detail/{id}', [App\Http\Controllers\Backend\DataProperti\PropertiController::class, 'detail'])->name('detail');
    Route::get('/dataproperti/detailkonfirmasi/{id}', [App\Http\Controllers\Backend\DataProperti\PropertiController::class, 'detailkonfirmasi'])->name('detailkonfirmasi');
    Route::post('/dataproperti/update', [App\Http\Controllers\Backend\DataProperti\PropertiController::class, 'update'])->name('properti.update');
    Route::get('/dataproperti/hapus/{id}', [App\Http\Controllers\Backend\DataProperti\PropertiController::class, 'hapus'])->name('hapus');

    #Router Backend Proses Lelang

    Route::get('/lelang/dalamantrian', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'dalamantrian'])->name('dalamantrian');
    Route::get('/dataproperti/aturjadwal/{id}', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'aturjadwal'])->name('aturjadwal');
    Route::post('/lelang/store', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'store'])->name('lelang.store');
    Route::get('/lelang/dalamantrian/detail/{id}', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'detail'])->name('detail');
    Route::get('/lelang/dalamantrian/edit/{id}', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'edit'])->name('edit');
    Route::post('/lelang/dalamantrian/update', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'update'])->name('lelang.update');
    Route::get('/lelang/dalamantrian/hapus/{id}', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'hapus'])->name('hapus');
    Route::get('/lelang/berlangsung', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'berlangsung'])->name('berlangsung');
    Route::get('/lelang/prosesmulai/{id}', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'prosesmulai'])->name('prosesmulai');
    Route::get('/lelang/batalmulai/{id}', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'batalmulai'])->name('batalmulai');
    Route::get('/lelang/berlangsung/detail/{id}', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'detailberlangsung'])->name('detailberlangsung');   
    Route::get('/lelang/berakhir', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'berakhir'])->name('berakhir'); 
    Route::get('/lelang/selesai/{id}', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'selesai'])->name('selesai');
    });