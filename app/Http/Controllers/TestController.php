<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use mysql_xdevapi\Exception;

class TestController extends Controller
{
    function saludar(Request $request){
        return view('test-view',[
            'title'=>$request->query('title'),
            'description'=>$request->query('description')

        ]);
    }

    function testdb(){
        try {
               //Conexion a BD
            DB::connection()->getPdo();
            if (DB::connection()->getDatabaseName())
            {
                die('Si conectó :)');
            }
            else{
                die('No conectó :(');
            }
        }
        catch (Exception $e){
            die('No se pudo establecer conexion');
        }
    }
}
