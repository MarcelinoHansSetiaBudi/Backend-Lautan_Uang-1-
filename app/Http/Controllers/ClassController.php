<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $class = ClassRoom::all(); // $<data> = <model>::all();
            return view('classroom', ['classList' => $class]);

        /** untuk -> var_dump('<isi_text>');
         * digunakan utnuk menampilkan tipe data dan panjang stringnya.
         * pada laravel juga terdapat var_dump yaitu 
         * dd('<text>'); yang ditampilkan adalah isi text nya.
         * Biasanya dd ini digunakan untuk ngetest controller.
         */
        //var_dump('test');
    }
}
