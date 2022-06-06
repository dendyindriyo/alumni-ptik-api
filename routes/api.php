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
use App\Http\Controllers\Api\FormKepengurusanIkaPtikController;
use App\Http\Controllers\Api\FormDosenController;
use App\Http\Controllers\Api\FormKegiatanAlumniController;
use App\Http\Controllers\Api\FormBeritaAlumniController;
use App\Http\Controllers\Api\FormFaqController;
use App\Http\Controllers\Api\FormBeasiswaController;
use App\Http\Controllers\Api\FormAlumniBerprestasiController;
use App\Http\Controllers\Api\FormTracerStudyController;
use App\Http\Controllers\Api\FormLowonganPekerjaanController;
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

    Route::post('/kepengurusan-ika-ptik', [FormKepengurusanIkaPtikController::class, 'create']);
    Route::put('/kepengurusan-ika-ptik/{id}', [FormKepengurusanIkaPtikController::class, 'update']);
    Route::delete('/kepengurusan-ika-ptik/{id}', [FormKepengurusanIkaPtikController::class, 'delete']);

    Route::post('/dosen-ptik', [FormDosenController::class, 'create']);
    Route::put('/dosen-ptik/{id}', [FormDosenController::class, 'update']);
    Route::delete('/dosen-ptik/{id}', [FormDosenController::class, 'delete']);

    Route::post('/kegiatan-alumni', [FormKegiatanAlumniController::class, 'create']);
    Route::put('/kegiatan-alumni/{id}', [FormKegiatanAlumniController::class, 'update']);
    Route::delete('/kegiatan-alumni/{id}', [FormKegiatanAlumniController::class, 'delete']);

    Route::post('/berita-alumni', [FormBeritaAlumniController::class, 'create']);
    Route::put('/berita-alumni/{id}', [FormBeritaAlumniController::class, 'update']);
    Route::delete('/berita-alumni/{id}', [FormBeritaAlumniController::class, 'delete']);

    Route::post('/faq', [FormFaqController::class, 'create']);
    Route::put('/faq/{id}', [FormFaqController::class, 'update']);
    Route::delete('/faq/{id}', [FormFaqController::class, 'delete']);

    Route::post('/informasi-beasiswa', [FormBeasiswaController::class, 'create']);
    Route::put('/informasi-beasiswa/{id}', [FormBeasiswaController::class, 'update']);
    Route::delete('/informasi-beasiswa/{id}', [FormBeasiswaController::class, 'delete']);

    Route::post('/alumni-berprestasi', [FormAlumniBerprestasiController::class, 'create']);
    Route::put('/alumni-berprestasi/{id}', [FormAlumniBerprestasiController::class, 'update']);
    Route::delete('/alumni-berprestasi/{id}', [FormAlumniBerprestasiController::class, 'delete']);

    Route::post('/tracer-study', [FormTracerStudyController::class, 'create']);
    Route::put('/tracer-study/{id}', [FormTracerStudyController::class, 'update']);
    Route::delete('/tracer-study/{id}', [FormTracerStudyController::class, 'delete']);

    Route::post('/lowongan-pekerjaan', [FormLowonganPekerjaanController::class, 'create']);
    Route::put('/lowongan-pekerjaan/{id}', [FormLowonganPekerjaanController::class, 'update']);
    Route::delete('/lowongan-pekerjaan/{id}', [FormLowonganPekerjaanController::class, 'delete']);
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

Route::get('/tahun-masuk/{id_tahun_masuk}/alumni', [FormTahunMasukController::class, 'showAlumni']);
Route::get('/tahun-lulus/{id_tahun_lulus}/alumni', [FormTahunLulusController::class, 'showAlumni']);
Route::get('/provinsi/{id_provinsi}/alumni', [FormProvinsiController::class, 'showAlumni']);
Route::get('/peminatan/{id_peminatan}/alumni', [FormPeminatanController::class, 'showAlumni']);

Route::get('/kepengurusan-ika-ptik', [FormKepengurusanIkaPtikController::class, 'show']);

Route::get('/dosen-ptik', [FormDosenController::class, 'show']);

Route::get('/kegiatan-alumni', [FormKegiatanAlumniController::class, 'show']);

Route::get('/berita-alumni', [FormBeritaAlumniController::class, 'show']);

Route::get('/faq', [FormFaqController::class, 'show']);

Route::get('/informasi-beasiswa', [FormBeasiswaController::class, 'show']);

Route::get('/alumni-berprestasi', [FormAlumniBerprestasiController::class, 'show']);

Route::get('/tracer-study', [FormTracerStudyController::class, 'show']);

Route::get('/lowongan-pekerjaan', [FormLowonganPekerjaanController::class, 'show']);








// Route::get('/alumni/search/nama-alumni/{nama_alumni}', [FormAlumniController::class, 'searchNamaAlumni']);
// Route::get('/alumni/search/nim/{nim}', [FormAlumniController::class, 'searchNim']);
// Route::get('/alumni/sort/nama-alumni', [FormAlumniController::class, 'sortNamaAlumni']);
