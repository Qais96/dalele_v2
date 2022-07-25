
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ URL::asset('asstes_login/style.css') }}" />
    <title>Sign in & Sign up Form</title>
  </head>

  </style>
  <style>
    .p{
  font-size: 16px;

}
.textareatest{
      font-size: 20px;
    padding-right: 10px;
    padding-top: 10px;
    width: 500px;
    height: 400px;
    }
    .btt{
 font-size: 10px;

    }
    @media only screen and (max-width: 600px) {
      .container.sign-up-mode:before {
        bottom: 21%;
    left: 50%;}
 
    .textareatest{
      font-size: 20px;
    padding-right: 10px;
    padding-top: 10px;
    width: 250px;
    height: 300px;
  border-left: ridge;

    }
    .btt{
 font-size: 10px;

    }
    .p{
  font-size: 8px;

}

}

  </style>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup" id="section-content">         
          <form method="post" data-url="{{ route('Add.User.Register') }}" class="sign-up-form" style="direction: rtl;">
          @csrf
          <div id="TextDiv" <?php if(!empty($Case) && $Case->status !='finished'  ){echo 'style="display:none;"';}else if(!empty($Case) && $Case->status =='assigned'){echo 'style="display:none;"';}?> style="text-align: center;">
   
          <input type='hidden' value="{{route('Add.Patint.Case')}}" id="route"> 
            <h2 class="title">قم بكتابة المشكلة التي تعاني منها  !</h2>
          
</br>
         <div class="row">
         <div class="col-12">

         <div class="form-group">
  
    <textarea id="TextProblem"  class="form-control textareatest" id="exampleFormControlTextarea1" rows="3" name="summary"></textarea>
  </div>
         </div>
         </div>
            <input type="button" onclick="SaveProblem()" class="btn" value="حفظ" />
            </div>
            <div style="text-align: center;">
            <div id="ChatBtn" <?php if(empty($Case)){echo 'style="display:none;"';}
            else if(!empty($Case) && $Case->status =='finished'){
              echo 'style="display:none;"';
            }
            
            
            
            ?> >
            <h2 class="title"> يمكنك الان بدء المحادثة مع المشرف  !</h2>
          </br>
         <div >
            <input  type="button" onclick="StartChat(<?php if(!empty($Case)){ echo $Case->consalutant_Fk;}  ?>)"  class="btn" id="chatbtn" value="ابدأ المحادثة" 
             />


            </div></div></div>
     
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
        
          </div>
          <img src="{{ URL::asset('asstes_login/img/log.svg') }}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>هل تريد تسجيل خروج ؟</h3>
            <p >
              قم بالضغط على زر تسجيل الخروج
            </p>
            <button   class="btn transparent btt" id="sign-in-btn">
<a href="{{route('Log.Out.Patint')}}" style="    color: white;
    text-decoration: none;">تسجيل خروج</a>

            </button>
          </div>
          <img src="{{ URL::asset('asstes_login/img/register.svg') }}" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ URL::asset('asstes_login/patintmain.js') }}"></script>
  </body>
</html>


        