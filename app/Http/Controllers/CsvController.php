<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class CsvController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function import(Request $request){
        try{
        $file = $request->file('file');
        $res = Excel::import(new UserImport(),  $file);

        $response = ['success' => 'Csv Saved', 'res' =>$res];
        } catch (\Exception $e) {
            $response = ['error' => 'Something wrong happened '. $e->getMessage()];
        }


        return $response;





       # Excel::import(new PersonasImport, $request->file('file'));

        #return redirect()->route('/');
    }
}
