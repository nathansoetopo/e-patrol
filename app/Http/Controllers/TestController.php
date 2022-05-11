<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function TestMap(){
        $location = Barcode::all();
        $data = [];
        foreach($location as $l){
            $data[] = [
                $l->name,
                $l->latitude,$l->longitude,
                $l->id,
            ];
        }
        return view('test.testMaps' , [
            'location' => $data,
        ]);
    }

    public function testAjaxView(){
        $user = User::all();
        return view('test.ajax' , [
            'data' => $user,
        ]);
    }

    public function testSearchAjax(Request $request){
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $data = DB::table('users')->where('name', 'like', '%'.$query.'%')->get();
            }else{
                $data = DB::table('users')->get();
            }
            $total_row = $data->count();
            if($total_row>0){
                foreach($data as $d){
                    $output.='
                    <tr>
                        <td>'.$d->name.'</td>
                        <td>'.$d->email.'</td>
                        <td>'.$d->username.'</td>
                    </tr>
                    ';
                }
            }else{
                $output .= 'Data Not Found';
            }
            echo $output;
        }
    }

    public function TestForm(){
        return view('test.test-form');
    }

    public function TestScanner(){
        return view('pages.satpam.test-scanner');
    }
}
