<?php

use Illuminate\Support\Facades\Route; 

#ROUTER FORNTEND

Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'index'])->name('index');
Route::POST('/masuk', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Auth::routes();
Route::get('/tentangakun', [App\Http\Controllers\Frontend\IndexController::class, 'tentangakun'])->name('tentangakun');
Route::get('/tentangakun/editprofil', [App\Http\Controllers\Frontend\IndexController::class, 'editprofil'])->name('editprofil');
Route::get('/tentangakun/ubahpassword', [App\Http\Controllers\Frontend\ChangePasswordController::class, 'ubahpassword'])->name('ubahpassword');
Route::post('/tentangakun/ubahpassword/change', [App\Http\Controllers\Frontend\ChangePasswordController::class, 'change'])->name('ubahpassword.change');
Route::post('/tentangakun/update', [App\Http\Controllers\Frontend\IndexController::class, 'update'])->name('tentangakun.updated');

//REKAMJEJAK
Route::get('/rekamjejak', [App\Http\Controllers\Frontend\RekamJejakController::class, 'index'])->name('index');
Route::post('/rekamjejak/store', [App\Http\Controllers\Frontend\RekamJejakController::class, 'store'])->name('rekamjejak.store');
Route::get('/rekamjejak/semuadata', [App\Http\Controllers\Frontend\RekamJejakController::class, 'semuadata'])->name('semuadata');
Route::get('/rekamjejak/semuadata/hapus/{id}', [App\Http\Controllers\Frontend\RekamJejakController::class, 'hapus'])->name('hapus');
Route::get('/rekamjejak/semuadata/edit/{id}', [App\Http\Controllers\Frontend\RekamJejakController::class, 'edit'])->name('edit');
Route::post('/rekamjejak/semuadata/update', [App\Http\Controllers\Frontend\RekamJejakController::class, 'update'])->name('rekamjejak.update');


#ROUTER BACKEND

    Route::group(['middleware'=>['hakakses:pegawai'],'prefix'=>'admin'],function() {

    Route::get('/', [App\Http\Controllers\Backend\PanelController::class, 'index'])->name('index');
    Route::get('/tentangakun', [App\Http\Controllers\Backend\TentangAkunController::class, 'tentangakun'])->name('tentangakun');
    Route::get('/tentangakun/editprofil', [App\Http\Controllers\Backend\TentangAkunController::class, 'editprofil'])->name('editprofil');
    Route::get('/tentangakun/ubahpassword', [App\Http\Controllers\Backend\ChangePasswordController::class, 'ubahpassword'])->name('ubahpassword');
    Route::post('/tentangakun/ubahpassword/change', [App\Http\Controllers\Backend\ChangePasswordController::class, 'change'])->name('ubahpassword.change');
    Route::post('/tentangakun/update', [App\Http\Controllers\Backend\TentangAkunController::class, 'update'])->name('tentangakun.update');

//MANAJEMENUSER
    Route::get('/manajemenuser', [App\Http\Controllers\Backend\ManajemenUserController::class, 'index'])->name('index');
    Route::get('/manajemenuser/edit/{id}', [App\Http\Controllers\Backend\ManajemenUserController::class, 'edit'])->name('edit');
    Route::post('/manajemenuser/update', [App\Http\Controllers\Backend\ManajemenUserController::class, 'update'])->name('manajemenuser.update');
    Route::get('/manajemenuser/hapus/{id}', [App\Http\Controllers\Backend\ManajemenUserController::class, 'hapus'])->name('hapus');
    
    Route::get('/userbackend/editbackend/{id}', [App\Http\Controllers\Backend\ManajemenUserController::class, 'editbackend'])->name('editbackend');
    Route::post('/userbackend/updatebackend', [App\Http\Controllers\Backend\ManajemenUserController::class, 'updatebackend'])->name('userbackend.updatebackend');
    Route::get('/userbackend/hapusbackend/{id}', [App\Http\Controllers\Backend\ManajemenUserController::class, 'hapusbackend'])->name('hapusbackend');

//REKAMDATA
    Route::get('/rekamdata', [App\Http\Controllers\Backend\RekamDataController::class, 'index'])->name('index');
    Route::get('/rekamdata/datauser/{id}', [App\Http\Controllers\Backend\RekamDataController::class, 'datauser'])->name('datauser');
    Route::get('/rekamdata/datauser/hapus/{authid}/{id}', [App\Http\Controllers\Backend\RekamDataController::class, 'hapus'])->name('hapus');
    Route::get('/rekamdata/datauser/batalhapus/{authid}/{id}', [App\Http\Controllers\Backend\RekamDataController::class, 'batalhapus'])->name('batalhapus');

});

    Route::group(['middleware'=>['hakakses:admin'],'prefix'=>'admin'],function(){
    Route::get('/userbackend', [App\Http\Controllers\Backend\ManajemenUserController::class, 'backendindex'])->name('backendindex');
});