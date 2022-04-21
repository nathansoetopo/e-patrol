<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
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
}
