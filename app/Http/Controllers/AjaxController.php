<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use App\Models\Presensi;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function SearchUserAdminSide(Request $request){
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            $user = request()->user();
            if($query != ''){
                if($user->hasRole('hrd')){
                    $data = User::role('satpam')->where('name', 'like', '%'.$query.'%')->get();
                }elseif($user->hasRole('admin')){
                    $data = User::where('name', 'like', '%'.$query.'%')->get();
                }
            }else{
                if($user->hasRole('hrd')){
                    $data = User::role('satpam')->get();
                }elseif($user->hasRole('admin')){
                    $data = User::all();
                }
            }
            $total_row = $data->count();
            if($total_row>0){
                $i=1;
                foreach($data as $d){
                    if($d->status == 'ACTIVE'){
                        $badge = '<span class="badge badge-success">Aktif</span>';
                    }else{
                        $badge = '<span class="badge badge-danger">Non</span>';
                    }
                    $output.='
                    <tr>
                        <th scope="row">'.$i++.'</th>
                        <td>'.$d->name.'</td>
                        <td>'.$d->nik.'</td>
                        <td>'.$d->email.'</td>
                        <td>
                            '.$badge.'
                        </td>
                    </tr>
                    ';
                }
            }else{
                $output .= 'User Not Found';
            }
            echo $output;
        }
    }

    public function SearchShiftAdmin(Request $request){
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            $user = request()->user();
            if($query != ''){
                $data = Shift::where('name', 'like', '%'.$query.'%')->get();
            }else{
                $data = Shift::all();
            }
            $total_row = $data->count();
            if($total_row>0){
                $i=1;
                foreach($data as $shift){
                    if($shift->status == 'ACTIVE'){
                        $badge = '<span class="badge badge-success">Aktif</span>';
                    }else{
                        $badge = '<span class="badge badge-danger">Non</span>';
                    }
                    //Button
                    if($user->hasRole('admin')){
                        $button1 = '
                        <a href="/admin/data-shift/'.$shift->id.'/data-satpam" id="modal-7"
                            class="btn btn-transparent text-center text-dark">
                            <i class="fas fa-user-cog fa-2x"></i>
                        </a>
                        '; 
                        $button2 = '
                        <a href="#" id="modal-7" data-toggle="modal" data-target="#updateData'.$shift->id.'"
                            class="btn btn-transparent text-center text-dark">
                            <i class="fas fa-edit fa-2x"></i>
                        </a>
                        ';
                        $button3 = '
                        <a href="#" id="modal-7" data-toggle="modal" data-target="#deleteData'.$shift->id.'"
                            class="btn btn-transparent text-center text-dark">
                        <i class="fas fa-trash-alt fa-2x"></i>
                        </a>
                        ';
                    }else{
                        $button3 = '';
                        $button1 = '';
                        $button2 = '';
                    }
                    $output.='
                    <tr>
                        <th scope="row">'. $i++ .'</th>
                        <td>' .$shift->name. '</td>
                        <td>' .$shift->start_time. '</td>
                        <td>' .$shift->end_time. '</td>
                        <td>
                            '.$badge.'
                        </td>
                        <td>
                            '.$button1.'
                            <a href="/hrd/data-shift/'.$shift->id.'/data-satpam" id="modal-7"
                                class="btn btn-transparent text-center text-dark">
                                <i class="fas fa-user-shield fa-2x"></i>
                            </a>
                            '.$button2.'
                            <a href="#" id="modal-7" data-toggle="modal" data-target="#updateDataStatus'.$shift->id.'"
                                class="btn btn-transparent text-center text-dark">
                                <i class="fas fa-power-off fa-2x"></i>
                            </a>
                            '.$button3.'
                        </td>
                    </tr>
                    ';
                }
            }else{
                $output .= 'Shift Not Found';
            }
            echo $output;
        }
    }

    public function SearchShiftHRD(Request $request){
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            $user = request()->user();
            if($query != ''){
                $data = Shift::where('name', 'like', '%'.$query.'%')->get();
            }else{
                $data = Shift::all();
            }
            $total_row = $data->count();
            if($total_row>0){
                $i=1;
                foreach($data as $shift){
                    if($shift->status == 'ACTIVE'){
                        $badge = '<span class="badge badge-success">Aktif</span>';
                    }else{
                        $badge = '<span class="badge badge-danger">Non</span>';
                    }
                    //Button
                    if($user->hasRole('hrd')){
                        $button1 = '
                        <a href="/hrd/data-shift/'.$shift->id.'/data-satpam" id="modal-7"
                            class="btn btn-transparent text-center text-dark">
                            <i class="fas fa-user-cog fa-2x"></i>
                        </a>
                        '; 
                        $button2 = '
                        <a href="#" id="modal-7" data-toggle="modal" data-target="#updateData'.$shift->id.'"
                            class="btn btn-transparent text-center text-dark">
                            <i class="fas fa-edit fa-2x"></i>
                        </a>
                        ';
                        $button3 = '
                        <a href="#" id="modal-7" data-toggle="modal" data-target="#deleteData'.$shift->id.'"
                            class="btn btn-transparent text-center text-dark">
                        <i class="fas fa-trash-alt fa-2x"></i>
                        </a>
                        ';
                    }else{
                        $button3 = '';
                        $button1 = '';
                        $button2 = '';
                    }
                    $output.='
                    <tr>
                        <th scope="row">'. $i++ .'</th>
                        <td>' .$shift->name. '</td>
                        <td>' .$shift->start_time. '</td>
                        <td>' .$shift->end_time. '</td>
                        <td>
                            '.$badge.'
                        </td>
                        <td>
                            '.$button1.'
                            <a href="/admin/data-shift/'.$shift->id.'/data-hrd" id="modal-7"
                                class="btn btn-transparent text-center text-dark">
                                <i class="fas fa-user-shield fa-2x"></i>
                            </a>
                            '.$button2.'
                            <a href="#" id="modal-7" data-toggle="modal" data-target="#updateDataStatus'.$shift->id.'"
                                class="btn btn-transparent text-center text-dark">
                                <i class="fas fa-power-off fa-2x"></i>
                            </a>
                            '.$button3.'
                        </td>
                    </tr>
                    ';
                }
            }else{
                $output .= 'Shift Not Found';
            }
            echo $output;
        }
    }

    public function SearchHrdAdmin(Request $request){
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $data = User::role('hrd')->where('name', 'like', '%'.$query.'%')->get();
            }else{
                $data = User::role('hrd')->paginate(5);
            }
            $total_row = $data->count();
            if($total_row>0){
                $i=1;
                foreach($data as $s){
                    if($s->status == 'ACTIVE'){
                        $badge = '<span class="badge badge-success">Aktif</span>';
                    }else{
                        $badge = '<span class="badge badge-danger">Non</span>';
                    }
                    $output.='
                    <tr>
                                <th scope="row">'.$i++.'</th>
                                <td>'.$s->name.'</td>
                                <td>'.$s->nik.'</td>
                                <td>'.$s->username.'</td>
                                <td>'.$s->email.'</td>
                                <td>'.$s->phone.'</td>
                                <td>
                                    '.$badge.'
                                </td>
                                <td>
                                    <a href="#" id="modal-7" data-toggle="modal" data-target="#updateData'.$s->id.'"
                                        class="btn btn-transparent text-center text-dark">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </a>
                                    <a href="#" id="modal-7" data-toggle="modal" data-target="#updateDataStatus'.$s->id.'"
                                        class="btn btn-transparent text-center text-dark">
                                        <i class="fas fa-power-off fa-2x"></i>
                                    </a>
                                    <a href="#" id="modal-7" data-toggle="modal" data-target="#deleteData'.$s->id.'"
                                        class="btn btn-transparent text-center text-dark">
                                    <i class="fas fa-trash-alt fa-2x"></i>
                                    </a>
                                </td>
                            </tr>
                    ';
                }
            }else{
                $output .= 'HRD Not Found';
            }
            echo $output;
        }
    }

    public function SearchSatpamAdmin(Request $request){
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $data = User::role('satpam')->where('name', 'like', '%'.$query.'%')->get();
            }else{
                $data = User::role('satpam')->paginate(5);
            }
            $total_row = $data->count();
            if($total_row>0){
                $i=1;
                foreach($data as $s){
                    if($s->status == 'ACTIVE'){
                        $badge = '<span class="badge badge-success">Aktif</span>';
                    }else{
                        $badge = '<span class="badge badge-danger">Non</span>';
                    }
                    $output.='
                    <tr>
                        <th scope="row">'.$i++.'</th>
                        <td>'. $s->name .'</td>
                        <td>'. $s->nik .'</td>
                        <td>'. $s->username .'</td>
                        <td>'. $s->email .'</td>
                        <td>'. $s->phone .'</td>
                        <td>
                            '.$badge.'
                        </td>
                        <td>
                            <a href="#" id="modal-7" data-toggle="modal" data-target="#updateData'.$s->id.'"
                                class="btn btn-transparent text-center text-dark">
                                <i class="fas fa-edit fa-2x"></i>
                            </a>
                            <a href="#" id="modal-7" data-toggle="modal" data-target="#updateDataStatus'.$s->id.'"
                                class="btn btn-transparent text-center text-dark">
                                <i class="fas fa-power-off fa-2x"></i>
                            </a>
                            <a href="#" id="modal-7" data-toggle="modal" data-target="#deleteData'.$s->id.'"
                                class="btn btn-transparent text-center text-dark">
                            <i class="fas fa-trash-alt fa-2x"></i>
                            </a>
                        </td>
                    </tr>
                    ';
                }
            }else{
                $output .= 'Satpam Not Found';
            }
        echo $output;
        }
    }

    public function SearchLokasi(Request $request){
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $data = Barcode::where('name', 'like', '%'.$query.'%')->get();
            }else{
                $data = Barcode::paginate(5);
            }
            $total_row = $data->count();
            if($total_row>0){
                $i=1;
                foreach($data as $b){
                    if($b->status == 'ACTIVE'){
                        $badge = '<span class="badge badge-success">Aktif</span>';
                    }else{
                        $badge = '<span class="badge badge-danger">Non</span>';
                    }
                    $output.='
                    <tr>
                        <th scope="row">'.$i++.'</th>
                        <td>'.$b->name.'</td>
                        <td>'.$b->latitude.'</td>
                        <td>'.$b->longitude.'</td>
                        <td>
                            '.$badge.'
                        </td>
                        <td>
                            <a href="/admin/data-lokasi/'.$b->id.'/satpam" id="modal-7"
                                class="btn btn-transparent text-center text-dark">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                            <a href="#" id="modal-7" data-toggle="modal"
                                data-target="#barcodeLocation'.$b->id.'"
                                class="btn btn-transparent text-center text-dark">
                                <i class="fas fa-qrcode fa-2x"></i>
                            </a>
                            <a href="#" id="modal-7" data-toggle="modal"
                                data-target="#updateDataStatus'.$b->id.'"
                                class="btn btn-transparent text-center text-dark">
                                <i class="fas fa-power-off fa-2x"></i>
                            </a>
                            <a href="#" id="modal-7" data-toggle="modal"
                                data-target="#deleteData'.$b->id.'"
                                class="btn btn-transparent text-center text-dark">
                                <i class="fas fa-trash-alt fa-2x"></i>
                            </a>
                         </td>
                    </tr>
                    ';
                }
            }else{
                $output .= 'Location Not Found';
            }
        echo $output;
        }
    }

    public function SearchPresensi(Request $request){
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $data = Presensi::where('start_time', 'like', '%'.$query.'%')->get();
            }else{
                $data = Presensi::paginate(5);
            }
            $total_row = $data->count();
            if($total_row>0){
                $i=1;
                foreach($data as $p){
                    if($p->status == 'ACTIVE'){
                        $badge = '<span class="badge badge-success">Aktif</span>';
                    }else{
                        $badge = '<span class="badge badge-danger">Non</span>';
                    }
                    $output.='
                    <tr>
                                        <th scope="row">'.$i++.'</th>
                                        <td>'.$p->name.'</td>
                                        <td>'.$p->start_time.'</td>
                                        <td>'.$p->end_time.'</td>
                                        <td>
                                            '.$badge.'
                                        </td>
                                        <td>
                                            <a href="/admin/data-presensi/'.$p->id.'/data-users" id="modal-7"
                                                class="btn btn-transparent text-center text-dark">
                                                <i class="fas fa-user fa-2x"></i>
                                            </a>
                                            <a href="#" id="modal-7" data-toggle="modal" data-target="#updateDataStatus'.$p->id.'"
                                                class="btn btn-transparent text-center text-dark">
                                                <i class="fas fa-power-off fa-2x"></i>
                                            </a>
                                            <a href="#" id="modal-7" data-toggle="modal" data-target="#deleteData'.$p->id.'"
                                                class="btn btn-transparent text-center text-dark">
                                            <i class="fas fa-trash-alt fa-2x"></i>
                                            </a>
                                        </td>
                                    </tr>
                    ';
                }
            }else{
                $output .= 'Absensi Not Found';
            }
        echo $output;
        }
    }
}
