<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use App\Models\User;
use Illuminate\Http\Request;

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
            echo $request->get('query');
        }else{
            return redirect('/');
        }
    
    }
}
