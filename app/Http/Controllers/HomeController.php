<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CasesModel;
use App\Models\CaseConsultantModel;
use App\Models\AppUsersModel;
use Hash,Auth,DB;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
  
        $Cases=CasesModel::join('users as a', 'a.id', '=', 'cases.patient_Fk')
        ->leftJoin('case_consultant', 'case_consultant.case_Fk', '=', 'cases.id')
        ->leftJoin('users as  l', 'l.id', '=', 'case_consultant.consalutant_Fk')
        ->select('cases.*', 'a.name','case_consultant.first_session','case_consultant.consalutant_Fk','l.name as name_consalutant')
        ->where('cases.Is_deleted',0)
        ->where('cases.status','pending')
        ->orderBy('cases.id','DESC')
        ->get();

  
        foreach($Cases as $Case){
            
            $Count=CasesModel::where('patient_Fk',$Case->patient_Fk)->where('Is_deleted',0)->count();
            $Case['Count']=$Count;
             }
 
        $Pendding=CasesModel::where('status','pending')->where('Is_deleted',0)->count();
        $finished=CasesModel::where('status','finished')->where('Is_deleted',0)->count();
        $assigned=CasesModel::where('status','assigned')->where('Is_deleted',0)->count();
     
    
        return view('home/index',['Cases'=>$Cases,'Pendding'=>$Pendding,'finished'=>$finished,'assigned'=>$assigned]);
    }

        
}
