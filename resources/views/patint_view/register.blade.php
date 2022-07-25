<!DOCTYPE html>
<html lang="en">
  <head>
    	
<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

.shroot{    margin-top: -25px;

  padding-left: 201px; 

}
.fontsize{
  font-size: 16px;

}
.spacespan{
  margin-top: -20px;

}
.btnbig{
  margin-top: -20px;

  width: 373px;
    height: 51px;
}
.textareatest{
      font-size: 20px;
    padding-right: 10px;
    padding-top: 10px;
    width: 500px;
    height: 400px;
    }
    .test{
      max-width: 380px;
    width: 100%;
    margin: 10px 0;
    height: 55px;
    border-radius: 55px;
    /* display: inline-table; */
    grid-template-columns: 15% 85%;
    padding: 0 0.4rem;
    position: relative;
    }
    .textareanewclass{
      width: 435px;
    }
    @media only screen and (max-width: 600px) {
      .container.sign-up-mode:before {
        bottom: 21%;
    left: 50%;}
 
    .textareanewclass {
      width: 263px;
}
    .textareatest{
      font-size: 20px;
    padding-right: 10px;
    padding-top: 10px;
    width: 220px;
    height: 200px;
    }
    .btnconfirm{
      margin-top: -15px;      
    height: 30px;
    width: 100px;
    }
    .p{
  font-size: 8px;

}
.fontsize{
  font-size: 8px;

}
.btnmobile{
  width: 250px;
    height: 30px;
    margin-top: -65px;
}
.shroot{
  margin-top: -50px;
  padding-left: 0px !important ; 

}
.test {
    max-width: 380px;
    margin-top: -34px !important;
    width: 100%;
    text-align: center !important;

    margin: 10px 0;
    /* height: 55px; */
    border-radius: 55px;
    /* display: inline-table; */
    grid-template-columns: 15% 85%;
    padding: 0 0.4rem;
    position: relative;
}
}

  </style>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form  class="sign-in-form" method="post" data-url="{{ route('Login.User') }}"  style="direction: rtl;">
          @csrf

<input type="hidden" value="{{route('Check.Stuts')}}" id="urlcheck">
            <h2 class="title">تسجيل دخول</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="email_login" placeholder="البريد الالكتروني" />
  <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password"  id="password_login" placeholder="كلمة المرور" require />
  <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
            </div>
            <a href="#" onclick="ResetPassword()" data-url="{{route('Reset.Password')}}" id="ResetPassword">هل نسيت كلمة المرور؟ </a> 
            <input type="button"  onclick="login()" value="تسجيل دخول"  class="btn solid" />
            
      
          </form>
         
                          
          <form method="post" data-url="{{ route('Add.User.Register') }}" class="sign-up-form" style="direction: rtl;">
          @csrf
            <h2 class="title">تسجيل مستخدم جديد</h2>

            <div class="input-field">

              <i class="fas fa-user"></i>
              <input type="text" id="name" placeholder="الاسم" require/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" id="email_user" placeholder="البريد الالكتروني" require/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" placeholder="كلمة المرور" require/>
            </div>
     
            <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="number" id="phone" placeholder="رقم الهاتف" require/>
            </div>
            <div class="input-field" >

<input  id="birth_date" name="birth_date" placeholder="تاريخ الميلاد" type="text" onfocus="(this.type = 'date')"  style="border-right: none;
    direction: ltr;
width: 321px;
height: 53px;
border-radius: 20px;
background-color: #f0f0f0;
/* border-color: #2699f5; */
text-align: end;
padding-right: 20px;
font-size: 16px;
border-left: none;
border-top: none;
border-bottom: none;">


</div>
</br>
<div class="test" >
<span class="fontsize spacespan" style="    font-weight: bold;
    color: red;"> *قم بقرأة الشروط والاحكام من خلال الضغط على زر الشروط والاحكام</span>


</div>

<div class="test" >

              <button type="button"  onclick="SweetShow()" class="btn btn-primary btn-lg btn-block fontsize btnmobile btnbig"  >الشروط والاحكام</button>


       

</div>    
 
    
</br>
<div class="row" style="    display: flex;
">
  <div class="shroot" >

  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label  class="fontsize"
style="    font-weight: bold;
" class="form-check-label" for="flexCheckDefault">
   موافق على الشروط والاحكام
  </label>
  </div>

</div>
            <input type="button" disabled onclick="AddUser()" class="btn btnconfirm"  id="addBtn" value="تسجيل" />
     
          </form>
        </div>
      </div>
 
<div><div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>مستخدم جديد؟</h3>
            <p class="fontsize"
>
              قم بإنشاء حساب جديد ليتم التواصل معك من قبل المشرفين !
            </p>
            <button 
style="    
" class="btn transparent fontsize" id="sign-up-btn">
              تسجيل حساب جديد
            </button>
          </div>
          <img src="{{ URL::asset('asstes_login/img/log.svg') }}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>لديك حساب</h3>
            <p              class="fontsize"
>
             قم بالضغط على زر تسجيل الدخول وادخل البريد الالكتروني وكلمة المرور
            </p>
            
            <button style="    font-size: 15px;
" class="btn transparent" id="sign-in-btn">
              تسجيل دخول
            </button>
            
          </div>
          <img src="{{ URL::asset('asstes_login/img/register.svg') }}" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ URL::asset('asstes_login/app.js') }}"></script>
  </body>
</html>


        