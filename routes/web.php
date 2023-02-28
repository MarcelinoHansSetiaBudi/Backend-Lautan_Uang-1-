<?php

use App\Http\Controllers\studentController;
use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Contoh route view 
// Menampilkan file yang di tunjuk di dalam ('...')
// return <nama folder -> view> ('<nama file .blade.php');
// return view('Welcome') menampilkan file di folder view yang menunjuk file welcome.blade.php
Route::get('/', function () {
    return view('welcome');
});

// Route pakai for loop di home.blade.php

Route::get('/home', function () {
    return view('home',[
        'name' => 'Hans',
        'role' => 'admin',  
        'buah' => ['pisang', 'apel', 'jeruk', 'semangka', 'kiwi']
    ]);
});

Route::get('/about', function(){
    return view('about');
});

/** Syntax 
 *  Route::get('/<nama_web_yg_kita_pgn_buat>', [<nama_class_controller>::class,'<nama_function>']);
 *  
 * Notes:
 *  Jika function bernama index maka nama_function tidak perlu ditulis gapapa 
 *  Tujuan dari function index ini sendiri untuk menampilkan semua data
 */
Route::get('/students', [studentController::class,'index']);
Route::get('/class', [ClassController::class,'index']);

// '/' artinya saat index awal
// '/Me' artinya saat masukkin link local host trus d belakang ditambahi /Me maka akan menampilkan hasil 8 x 2
// Route::get('/Me', function (){
//     return 8*2;
// });

// Route::get('/about', function(){
//     return 'Contoh untuk menampilkan text';
// });

// cara route view 1
// Route::get('/contact', function () {
//    return view('contact');
// });

// cara route view 2
// Route::view('/contact','contact');

// untuk menampilkan sebuah argumen dalam view
//Route::view('/contact','contact', ['name'=>'cara fajar', 'phone'=>'087755821328']);

// untuk route yang biasa 
// Route::get('/contact', function () {
//     return view('contact',['name'=>'cara fajar', 'phone'=>'087755821328']);
// });

// Routes methods
// Route::<route method>('/')
// 1. get -> untuk mendapatkan data
// post / put / patch -> untuk menulis data semisal ngisi form untuk nulis data ke DB pake Route::post\
// delete -> untuk menghapus data
// option -> 
// redirect -> apabila user ingin membuka menu about maka web secara otomatis mengarahkan ke aboutus
// Route::redirect('/here', '/there'); Nb jika user buka web here akan di arahkan ke there

// Route::redirect('/about','/aboutus');

// // Route Parameter
// Route::get('/product', function(){
//     return 'product';
// });

// Route::get('/product/{id}', function($id){
//     return 'Ini adalah product dengan id ' .$id;
// });

// Route::get('/product/{id}', function($id){
//     return view('product.detail', ['id' => $id]);
// });

// Route name prefix
//Route::get('/profil-admin', function(){
//   return 'profil admin';
// });

// Route::get('admin/profil-admin', function(){
//   return 'profil admin';
// });

// Route::get('admin/about-admin', function(){
//     return 'about admin';
// });

// Route::get('admin/contact-admin', function(){
//     return 'contact admin';
// });

// Bisa diganti denga route prefix biar lebih pendek menjadi
// tinggal ganti nama index di dalam prefix('<nama indexnya>');
// Route::prefix('admin')->group(function(){
//     Route::get('/profil-admin', function(){
//         return 'profil admin';
//     });

//     Route::get('/about-admin', function(){
//         return 'about admin';
//     });

//     Route::get('/contact-admin', function(){
//         return 'contact admin';
//     });
// });

// Route::get('/', function(){
//     return view('home', [
//         'name' => 'cara fajar', 
//         'role' => 'staff'  
//     ]);
// });
