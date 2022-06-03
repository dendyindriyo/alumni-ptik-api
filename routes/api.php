<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\Api\FormAlumniController;
use App\Http\Controllers\Api\FormRiwayatPekerjaanAlumniController;
use App\Http\Controllers\Api\FormTahunMasukController;
use App\Http\Controllers\Api\FormTahunLulusController;
use App\Http\Controllers\Api\FormProvinsiController;
use App\Http\Controllers\Api\FormPeminatanController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/alumni', [FormAlumniController::class, 'create']);
    Route::put('/alumni/{nim}', [FormAlumniController::class, 'update']);
    Route::delete('/alumni/{nim}', [FormAlumniController::class, 'delete']);

    Route::post('/riwayat-pekerjaan-alumni', [FormRiwayatPekerjaanAlumniController::class, 'create']);
    Route::put('/riwayat-pekerjaan-alumni/{id}', [FormRiwayatPekerjaanAlumniController::class, 'update']);
    Route::delete('/riwayat-pekerjaan-alumni/{id}', [FormRiwayatPekerjaanAlumniController::class, 'delete']);

    Route::post('/tahun-masuk', [FormTahunMasukController::class, 'create']);
    Route::put('/tahun-masuk/{id}', [FormTahunMasukController::class, 'update']);
    Route::delete('/tahun-masuk/{id}', [FormTahunMasukController::class, 'delete']);

    Route::post('/tahun-lulus', [FormTahunLulusController::class, 'create']);
    Route::put('/tahun-lulus/{id}', [FormTahunLulusController::class, 'update']);
    Route::delete('/tahun-lulus/{id}', [FormTahunLulusController::class, 'delete']);

    Route::post('/provinsi', [FormProvinsiController::class, 'create']);
    Route::put('/provinsi/{id}', [FormProvinsiController::class, 'update']);
    Route::delete('/provinsi/{id}', [FormProvinsiController::class, 'delete']);

    Route::post('/peminatan', [FormPeminatanController::class, 'create']);
    Route::put('/peminatan/{id}', [FormPeminatanController::class, 'update']);
    Route::delete('/peminatan/{id}', [FormPeminatanController::class, 'delete']);
});

//Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('/reset-password', [NewPasswordController::class, 'reset']);

Route::get('/alumni', [FormAlumniController::class, 'show']);
Route::get('/alumni/{nim}/riwayat-pekerjaan-alumni', [FormRiwayatPekerjaanAlumniController::class, 'show']);
Route::get('/tahun-masuk', [FormTahunMasukController::class, 'show']);
Route::get('/tahun-lulus', [FormTahunLulusController::class, 'show']);
Route::get('/provinsi', [FormProvinsiController::class, 'show']);
Route::get('/peminatan', [FormPeminatanController::class, 'show']);
Route::get('/alumni/search/nama-alumni/{nama_alumni}', [FormAlumniController::class, 'searchNamaAlumni']);
Route::get('/alumni/search/nim/{nim}', [FormAlumniController::class, 'searchNim']);
