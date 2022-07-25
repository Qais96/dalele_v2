<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Redirect,Auth;
class ChatController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(){
        $Users=User::
        Join('case_consultant', 'case_consultant.patient_Fk', '=', 'users.id')
        ->select('users.*','case_consultant.consalutant_Fk')
       -> where('users.type','Patient')
       ->where('users.Is_deleted',0)
       ->where('case_consultant.Is_deleted',0)
       ->get();
       
     //  session()->put('consultant_id', $request->consultant_id);
        return view('chat/index',['Users'=>$Users]);
    }


public function ViewChat(Request $request){
    session()->put('ID_PATINT', $request->id);
    session()->put('consultant_id', $request->consultant_id);
    $url='chatify/'.$request->consultant_id.'';
    return redirect($url);
}

public function ViewChat2(Request $request){

    session()->put('ID_PATINT', Auth::user()->id);
   // session()->put('consultant_id', $request->consultant_id);
    $url='chatify/'.$request->id_two.'';
    return redirect($url);
}
    
}
