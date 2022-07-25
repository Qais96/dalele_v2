<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CasesModel;
use App\Models\CaseConsultantModel;
use App\Models\User;
use Hash;
use Redirect;

class CasesController extends Controller
{
    //
    public function index(){

        $Cases=CasesModel::join('users as a', 'a.id', '=', 'cases.patient_Fk')
        ->leftJoin('case_consultant', 'case_consultant.case_Fk', '=', 'cases.id')
        ->leftJoin('users as  l', 'l.id', '=', 'case_consultant.consalutant_Fk')
        ->select('cases.*', 'a.name','case_consultant.first_session','l.name as name_consalutant')
        ->where('cases.Is_deleted',0)
        ->get(); 
        return view('cases/index',['Cases'=>$Cases]);
    }

    public function GetSummary(Request $request){


$Summary=CasesModel::where('Is_deleted',0)->find($request->id);
echo json_encode(['Summary'=>$Summary->summary]);
     

    }
    public function GetCaseConsultant(Request $request){
    
        session()->put('TypeViewCase', $request->type);
        $Consultants=User::where('type','Consalutant')->where('Is_deleted',0)->get();
     
        $Case=CasesModel::
        leftJoin('case_consultant', 'case_consultant.case_Fk', '=', 'cases.id')
        ->where('cases.id',$request->id)
        ->select('cases.*','case_consultant.consalutant_Fk','case_consultant.first_session')
        ->where('cases.Is_deleted',0)
        ->first();
   
        return view('cases/session',['Consultants'=>$Consultants,'Case'=>$Case]);

             
        
            }
    
            public function EditCaseConsultant(Request $request){
              
                $Case=CaseConsultantModel::where('case_Fk',$request->id)->where('Is_deleted',0)->first();
              
                $first_session=$request->date.' '.$request->time;
                $Session =session()->get('TypeViewCase');
                if(!empty($Case)){
                   
                    $data=[
                        'consalutant_Fk'=>$request->consalutant_Fk,
                        'first_session'=>$first_session,
                    ];
                    CaseConsultantModel::where('id', $Case->id)
                    ->update($data);
                    CasesModel::where('id',$request->id)->update(['status' => "assigned"]);
                   
                    if($Session=='FromHome'){
                        return redirect()->route('home');
                    }else{
                        return redirect()->route('Cases');
                    }
                    

                }else{
          
                    $data=[
                        'patient_Fk'=>$request->patient_Fk,
                        'case_Fk'=>$request->id,
                        'consalutant_Fk'=>$request->consalutant_Fk,
                        'first_session'=>$first_session,
                    ];
                 
                    CaseConsultantModel::insert($data);
                    CasesModel::where('id',$request->id)->update(['status' => "assigned"]);
                    if($Session=='FromHome'){
                        return redirect()->route('home');
                    }else{
                        return redirect()->route('Cases');
                    }
                    
                }
        
        }
        public function DeleteCaseConsultant(Request $request){
           
            CasesModel::where('id',$request->id)->update(['Is_deleted' => 1]);
            CaseConsultantModel::where('case_Fk',$request->id)->update(['Is_deleted' => 1]);
            $url=route('Cases');
           
            echo json_encode(['url'=>$url]);
             
        
        }
}
