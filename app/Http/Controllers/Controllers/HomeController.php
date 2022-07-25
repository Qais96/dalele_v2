<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CasesModel;
use App\Models\CaseConsultantModel;
use App\Models\AppUsersModel;
use Hash;
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
        $Cases=CasesModel::join('app_users as a', 'a.id', '=', 'cases.patient_Fk')
        ->leftJoin('case_consultant', 'case_consultant.case_Fk', '=', 'cases.id')
        ->leftJoin('app_users as  l', 'l.id', '=', 'case_consultant.consalutant_Fk')
        ->select('cases.*', 'a.name','case_consultant.first_session','l.name as name_consalutant')
        ->where('cases.Is_deleted',0)
        ->where('cases.status','pending')
        ->get(); 
        return view('home/index',['Cases'=>$Cases]);
    }

        
}
