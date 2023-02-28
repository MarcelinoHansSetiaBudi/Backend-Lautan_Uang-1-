<?php
/** Syntax untuk membuat controllernya:
 *  php artisan make:controller students
 * 
 */

namespace App\Http\Controllers;
use App\Models\Student;
use illumintate\Http\Request;
class studentController extends Controller
{
    // public func nyoba di pake di routes;
    /** 
    * Notes:
    *  Tujuan dari function index di controller ini sendiri untuk menampilkan semua data
    *   Serta jika pake controller jangan lupa sourcenya dimasukkin
    *   use App\http\Controllers\<nama_controllernya>;
    *
    *   Dari controller kita juga bisa menyampaikan langsung ke route menggunakan 
    *   return view('<nama_file_diView>','[<nama_file_dariController>'=> $nama_file_dariController]);
    */
    public function index()
    {
        $student = Student::all();
        return view('students',['studentList'=> $student]);
        // dd('halolala');
        /** untuk -> var_dump('<isi_text>');
         * digunakan utnuk menampilkan tipe data dan panjang stringnya.
         * pada laravel juga terdapat var_dump yaitu 
         * dd('<text>'); yang ditampilkan adalah isi text nya.
         * Biasanya dd ini digunakan untuk ngetest controller.
         */
        //var_dump('test');
    }
}
/** Query di Laravel untuk mengambil data dari DB:
 *  Ada 3 :
 *  1. eLoquent orm -> yang paling direkomendasikan karena lebih lengkap dan mudah.
 *  2. query builder
 *  3. raw query -> tidak recomended karena memungkinkan query injection
 */

 /**    untuk query eLoquent orm:
  * 
  *         $student = Student::all(); // maksudnya select * from students
  *
  *     untuk lihat hasilnya maka kita bisa pake dd($student); buat cek
  *     
  *     Notes:
  *     Jangan lupa untuk menggunakan / menyertakan repositorinya 
  *
  *     use App\Models\Student;
  */