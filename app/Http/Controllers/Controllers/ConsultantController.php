<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CaseConsultantModel;
use App\Models\ChMessage;
use App\Models\ReportModel;
use App\Models\CasesModel;
use Hash,Auth;
use Redirect;
class ConsultantController extends Controller
{
    //
    public function index(){
        $Consultants=User::where('type','Consalutant')->where('Is_deleted',0)->get();
        return view('consultant/index',['Consultants'=>$Consultants]);
    }

    public function ViewAddConsultant(Request $request){
    
        return view('consultant/add_consultant');
    }
    public function AddConsultant(Request $request){
        $Consalutant=User::
        where('name',$request->name)
        ->where('birth_date',$request->birth_date)
        ->where('email',$request->email)
        ->where('type','Consalutant')
        ->where('Is_deleted',0)
        ->first();
   
        if(empty($Consalutant)){
            if(!empty($request)){
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            
                $imageName = time().'.'.$request->image->extension();  
             
                $request->image->move(public_path('images'), $imageName);
                $data=[
                    'name'=>$request->name,
                    'birth_date'=>$request->birth_date,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'bio'=>$request->bio,
                    'type'=>'Consalutant',
                    'image'=>$imageName,
    
                ];
                User::insert($data);
                return redirect()->route('Consultant');
          
            }
     
        }else{
            return Redirect::back()->withErrors(['msg' => 'this user already inserted']);
 
    }}

    public function ViewEditConsultant(Request $request){

        $Consalutants=User::find($request->id);
        return view('consultant/edit_consultant',['Consalutants'=>$Consalutants]);
    }

    public function EditConsultant(Request $request){
        if(!empty($request)){
            $data=[
                'name'=>$request->name,
                'email'=>$request->email,
                'birth_date'=>$request->birth_date,
                'bio'=>$request->bio,
                'type'=>'Consalutant',
            ];
            if(!empty($request->image)){
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.$request->image->extension();  
         
                $request->image->move(public_path('images'), $imageName);
                $data['image']=$imageName;
            }
            User::where('id', $request->id)
            ->update($data);
      
            return redirect()->route('Consultant');

    }
}

public function DeleteConsultant(Request $request){

    User::where('id',$request->id)->update(['Is_deleted' => 1]);
    $url=route('Consultant');
    echo json_encode(['url'=>$url]);
     

}
public function GetConsultentCaseAdmin(Request $request){


    $Cases=CaseConsultantModel::
    leftJoin('cases', 'cases.id', '=', 'case_consultant.case_Fk')
    ->leftJoin('users', 'users.id', '=', 'cases.patient_Fk')
    ->select('cases.status','users.name','users.birth_date','case_consultant.patient_Fk','case_consultant.first_session','case_consultant.case_Fk','case_consultant.consalutant_Fk')
   -> where('case_consultant.consalutant_Fk',Auth::user()->id)
   ->get();
  
   foreach($Cases as $case){
    $Chat=ChMessage::where('from_id',$case->consalutant_Fk)->where('to_id',$case->patient_Fk)->first();
    if(!empty($Chat)){
        $case->chat='Start';
    }else{
        $case->chat='No chat';
    }
   }

    return view('consultant/case_admin',['Cases'=>$Cases]);     

}


public function ViewReport(Request $request){

    $Report=ReportModel::where('patient_Fk',$request->patient_Fk)->where('consalutant_Fk',$request->consalutant_Fk)->first();

    return view('consultant/report',['Report'=>$Report,'patient_Fk'=>$request->patient_Fk,'consalutant_Fk'=>$request->consalutant_Fk]);     

}
public function EditCaseReport(Request $request){
   
    $Report=ReportModel::where('patient_Fk',$request->patient_Fk)->where('consalutant_Fk',$request->consalutant_Fk)->first();
    if(empty($Report)){
        $data=['report'=>$request->report,
        'patient_Fk'=>$request->patient_Fk,
        'consalutant_Fk'=>$request->consalutant_Fk,
    ];
    ReportModel::insert($data);
   

    }else{
        ReportModel::where('id', $request->id)
       ->update([
            'report'=>$request->report,
        ]);
    }
    CasesModel::where('patient_Fk', $request->patient_Fk)
    ->update([
         'status'=>'finished',
     ]);
    
    return redirect()->route('Get.Consultent.Case.Admin');
  

}
public function AssignedCasesAdmin(Request $request){

    $Cases=CaseConsultantModel::
    leftJoin('cases', 'cases.id', '=', 'case_consultant.case_Fk')
    ->leftJoin('users', 'users.id', '=', 'cases.patient_Fk')
    ->select('cases.status','users.name','users.birth_date','case_consultant.patient_Fk','case_consultant.first_session','case_consultant.case_Fk','case_consultant.consalutant_Fk')
   ->where('case_consultant.consalutant_Fk',Auth::user()->id)
   ->get();
   
   foreach($Cases as $case){
    $Chat=ChMessage::where('from_id',$case->consalutant_Fk)->where('to_id',$case->patient_Fk)->first();
    if(!empty($Chat)){
        $case->chat='Start';
    }else{
        $case->chat='No chat';
    }
   }

    return view('consultant/AssignedCases',['Cases'=>$Cases]);     

}

}
