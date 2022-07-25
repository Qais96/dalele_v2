<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUsersModel;
use App\Models\User;
use App\Models\CasesModel;
use App\Models\CaseConsultantModel;
use DateTime;
use App\Http\Requests\PasswordRequest;


use App\Http\Requests\Auth\LoginRequest;

use Redirect,Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AppUsersController extends Controller
{
    //

    public function index(){
        $Users=User::where('type','Patient')->where('Is_deleted',0)->orderBy('id','DESC')
        ->get();
        return view('App_Users/app_users',['Users'=>$Users]);
    }

    public function ViewAddUser(Request $request){
     
        return view('App_Users/add_users');
    }
    public function AddUser(Request $request){


        $AppUser=User::
        where('name',$request->name)
        ->where('birth_date',$request->birth_date)
        ->where('email',$request->email)
        ->where('type','Patient')
        ->where('Is_deleted',0)
        ->first();

     if(empty( $AppUser)){
        if(!empty($request)){
            /*
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
         
            $request->image->move(public_path('images'), $imageName);*/
            $data=[
                'name'=>$request->name,
                'birth_date'=>$request->birth_date,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'bio'=>'null',
                'phone'=>$request->phone,
                'type'=>'Patient',
                'image'=>'1653232273.jpg',

            ];
            User::insert($data);
            return redirect()->route('AppUsers');
      
        }
     }else{
        return Redirect::back()->withErrors(['msg' => 'this user already inserted']);

}
    
}
public function AddUserRegister(Request $request){


    $AppUser=User::
    where('email',$request->email)
    ->where('Is_deleted',0)
    ->first();

 if(empty( $AppUser)){
    if(!empty($request)){
    
        $data=[
            'name'=>$request->name,
            'birth_date'=>$request->birth_date,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'bio'=>'null',
            'type'=>'Patient',
            'image'=>'1653232273.jpg',

        ];
    
        User::insert($data);
        return json_encode(['message'=>'success']);
  
    }
 }else{
    return json_encode(['message'=>'error']);
}
    
    }

    public function ViewEditUser(Request $request){
    
        $Users=User::find($request->id);
     
        return view('App_Users/edit_user',['Users'=>$Users]);
    }

    public function EditUser(Request $request){
        if(!empty($request)){
            $data=[
                'name'=>$request->name,
                'email'=>$request->email,
                'birth_date'=>$request->birth_date,
                'bio'=>'null',
                'phone'=>$request->phone,
                'type'=>'Patient',
            ];
            if(!empty($request->image)){

            }
            $data['image']='1653232273.jpg';
            User::where('id', $request->id)
            ->update($data);
      
            return redirect()->route('AppUsers');

    }
}

public function DeleteUser(Request $request){
  

    User::where('id',$request->id)->update(['Is_deleted' => 1]);
if($request->type =='patint'){
    $url=route('AppUsers');


}else{
    $url=route('Admins');

}
    echo json_encode(['url'=>$url]);

}


public function LoginUser(Request $request){
    $input = $request->all();

    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
    {
        $url=route('User.Main.Home');
        echo json_encode(['message'=>'sucsess','url'=>$url]);
 
    
    }else{
        echo json_encode(['message'=>'error']);

    }



}


public function ViewAdmins(){
   
    $Users=User::where('type','Admin')->orWhere('type','Monitor')->where('Is_deleted',0)->get();

    return view('Admins/app_users',['Users'=>$Users]);
}

public function ViewAddAdmins(){

    return view('Admins/add_users');

 
}
public function AddAdmin(Request $request){
    $AppUser=User::
    where('email',$request->email)
    ->where('Is_deleted',0)
    ->first();

 if(empty($AppUser)){
    if(!empty($request)){

        $data=[
            'name'=>$request->name,
            'birth_date'=>$request->birth_date,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'bio'=>'null',
            'phone'=>$request->phone,
            'type'=>$request->type,
            'image'=>'1653232273.jpg',

        ];
        User::insert($data);
        return redirect()->route('Admins');
  
    }
 }else{
    return Redirect::back()->withErrors(['msg' => 'this user already inserted']);

}

}


public function ViewEditAdmin(Request $request){
    
    $Users=User::find($request->id);
 
    return view('Admins/edit_user',['Users'=>$Users]);
}

public function EditAdmin(Request $request){
    if(!empty($request)){
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'birth_date'=>$request->birth_date,
            'bio'=>'null',
            'phone'=>$request->phone,
            'type'=>$request->type,
        ];
        if(!empty($request->image)){
 
        }
        $data['image']='1653232273.jpg';
        User::where('id', $request->id)
        ->update($data);
  
        return redirect()->route('Admins');

}
}

public function LoginApi(Request $request){

    $User=User::find($request->id);

    if(!empty($User)){
      // $Case= CasesModel::where('patient_Fk',$request->id)->where('status','assigned')->first();
      $Case= CasesModel::where('patient_Fk',$User->id)->where('status','!=','finished')->first();

      if(empty($Case)){
        return json_encode(['message'=>'inactive']);

      }else{
       
        if($Case->status=='assigned'){
            $PatintCase=CaseConsultantModel::where('case_Fk',$Case->id)->where('Is_deleted',0)->first();
            $first_session = DateTime::createFromFormat('Y-m-d h:i:s',$PatintCase->first_session);
            $now = new DateTime();

            if($first_session > $now){
                return json_encode(['message'=>'inactive']);

            }else{
                return json_encode(['message'=>'active']);

             

            }

        }
        return json_encode(['message'=>'inactive']);
      }
     
     

}else{
    return json_encode(['message'=>'User Not login']);

}
}


public function AdminPassword(PasswordRequest $request)
{

    if (auth()->user()->id == 0) {
    
        return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
    }

    auth()->user()->update(['password' => Hash::make($request->get('password'))]);
   
    return back()->withPasswordStatus(__('Password successfully updated.'));
}
}