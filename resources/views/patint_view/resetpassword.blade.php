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
          <form method="post" action="{{ route('Patint.Reset.Password') }}" class="sign-up-form" style="direction: rtl;">
          @csrf
          <div id="TextDiv"  style="text-align: center;">
   
          <input type='hidden' value="<?= $id ?>" name="id"> 
            <h2 class="title">قم بكتابة كلمة مرور جديدة !</h2>
          
</br>
         <div class="row">
         <div class="col-12">

         <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="كلمة المرور" require/>
            </div>
         </div>
         </div>
            <input type="submit"  class="btn" value="حفظ" />
            </div>
            <div style="text-align: center;display:none;" >
            <div id="ChatBtn"  >
            <h2 class="title"> يمكنك الان بدء المحادثة مع المشرف  !</h2>
          </br>
         <div >
            <input  type="button"   class="btn"  value="ابدأ المحادثة" 
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


        