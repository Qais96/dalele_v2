<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CasesModel;
use App\Models\User;
use App\Mail\TestEmail;
use Mail;
use App\Models\CaseConsultantModel;
use Redirect,Session,DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class PataintController extends Controller
{
    //
 
    public function RegisterPataint(){
        return view('patint_view/register');
    }
    public function UserMainHome(){
        $id = auth()->user()->id;
        
      //  $Case=CasesModel::where('patient_Fk',$id)->first();
        $Case=CasesModel::where('patient_Fk',$id)->where('Is_deleted',0)->orderBy('id', 'desc')
        ->limit(1)->first();

     if(!empty($Case)){
        $PatintCase=CaseConsultantModel::where('patient_Fk',$Case->patient_Fk)->where('Is_deleted',0)->orderBy('id', 'desc')
        ->limit(1)->first();
        
        if(!empty($PatintCase)){
        
            $Case->DateTime =$PatintCase->first_session;
            $Case->consalutant_Fk=$PatintCase->consalutant_Fk;            

        }
     }
        return view('patint_view/mainpage',['Case'=>$Case]);
    }
    
    public function AddPatintCase(Request $request){

        if(!empty($request)){
            $id = auth()->user()->id;
          
            $data=[
                'summary'=>$request->summary,
                'status'=>'pending',
                'patient_Fk'=>$id,
            ];
      
            CasesModel::insert($data);
            Auth::logout();
            return json_encode(['message'=>'success','id'=>$id]);
      
        }
        else{
            return json_encode(['message'=>'error']);

        }
    

    }

    public function LogOutPatint(Request $request){
        Auth::logout();
        return redirect('/RegisterPataint');

    }
    

    public function CheckStuts(Request $request){
        $FirstSession='empty session';
        $id = auth()->user()->id;

        $Case=CasesModel::where('patient_Fk',$id)->where('Is_deleted',0)->orderBy('id', 'desc')
        ->limit(1)->first();

if(!empty($Case)){
// var_dump($Case->status);die();
    if($Case->status =='finished'){
        return json_encode(['message'=>'finished','FirstSession'=>$FirstSession]);    
    }
    elseif($Case->status =='assigned'){

        $Session=CaseConsultantModel::where('case_Fk',$Case->id)->first();
        if(!empty($Session)){
            $FirstSession=$Session->first_session;
        }
        return json_encode(['message'=>'assigned','FirstSession'=>$FirstSession,'id'=>$Case->patient_Fk]);    
    }else{
        return json_encode(['message'=>'Pending','FirstSession'=>$FirstSession,'id'=>$Case->patient_Fk]);  

    }
 
}else{

    return json_encode(['message'=>'empty case','FirstSession'=>$FirstSession]);
}




    }

    public function ResetPassword(Request $request){
        $User=User::where('email',$request->email)->first();
if(!empty($User)){
    $url=route('View.Reset.Password',['id'=>$User->id]);
    $data = ['message' => 'عزيزي الطالب قم بالضغط على اللينك ليتم تعيين كلمة مرور جديدة :<a href="'.$url.'" >اضغط هنا </a>' ];

    Mail::to($request->email)->send(new TestEmail($data));
    return json_encode(['message'=>'sucsess']);
}else{
    return json_encode(['message'=>'not found email!!!!']);
}
      
       

    }
    public function ViewResetPassword(Request $request){

        return view('patint_view/resetpassword',['id'=>$request->id]);
     

    }

    public function PatintResetPassword(Request $request){
       
User::where('id',$request->id)->update(['password'=>Hash::make($request->password)]);
return redirect('/RegisterPataint');


    }

    
}
