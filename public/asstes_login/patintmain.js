
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");



$( document ).ready(function() {
  container.classList.add("sign-up-mode");
});


function AddUser(){
  var name=$('#name').val();
var phone=$('#phone').val();
var email_user=$('#email_user').val();
var password=$('#password').val();
var birth_date=$('#birth_date').val();
var url=$('.sign-up-form').attr('data-url');

if(name==="" || phone==="" || email_user===""|| password==="" || birth_date===""){
  Swal.fire({
    icon: 'error',
    title: 'يوجد خطأ...',
    text: 'هناك معلومات لم تقم بإدخالها !'
  })
  return;
}

if(IsEmail(email_user)==false){
  Swal.fire({
    icon: 'error',
    title: ' يوجد خطأ...',
    text: '   البريد الالكتروني غير صحيح  !'
  })
  return false;
}
if(password.length < 5)
{
  Swal.fire({
    icon: 'error',
    title: ' يوجد خطأ...',
    text: 'كلمة المرور يجب ان لا تقل عن 5 احرف!'
  })
  return false;
}


var birth=isValidDate(birth_date);
if(birth==false){
  Swal.fire({
    icon: 'error',
    title: ' يوجد خطأ...',
    text: 'تاريخ الميلاد يجب ان يكون بشكل الاتي  اليوم-الشهر-السنة!'
  })
  return false;
}
$.ajax({
  type:'POST',
  url:url,
  data:{name:name,phone:phone,email:email_user,password:password,birth_date:birth_date},
  headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
  success:function(response){
    var Data = $.parseJSON(response);
if(Data.message=='error'){
  Swal.fire({
    icon: 'error',
    title: ' يوجد خطأ...',
    text: 'البريد الالكتروني مستخدم!'
  })
}else{


  Swal.fire({
    title: "تمت العملية بنجاح",
    text: "الان قم بعمل تسجيل دخول",
    icon: "success",
    confirmButtonText: "ok"
  }).then(function(result) {
    if (result.value) {
      $('#name').val("");
      $('#phone').val("");
      $('#email_user').val("");
      $('#password').val("");
      $('#birth_date').val("");
      container.classList.remove("sign-up-mode");
    }
  });

}
}
})


  }
  function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
       return false;
    }else{
       return true;
    }
  }

  function isValidDate(dateString) {
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    return dateString.match(regEx) != null;
  }

  function login(){
    
  var email_user=$('#email_login').val();
  var password=$('#password_login').val();
  var url=$('.sign-in-form').attr('data-url');

  if( email_user===""|| password==="" ){
    Swal.fire({
      icon: 'error',
      title: 'يوجد خطأ...',
      text: 'هناك معلومات لم تقم بإدخالها !'
    })
    return;
  }
  
  if(IsEmail(email_user)==false){
    Swal.fire({
      icon: 'error',
      title: ' يوجد خطأ...',
      text: '   البريد الالكتروني غير صحيح  !'
    })
    return false;
  }
  if(password.length < 5)
  {
    Swal.fire({
      icon: 'error',
      title: ' يوجد خطأ...',
      text: 'كلمة المرور يجب ان لا تقل عن 5 احرف!'
    })
    return false;
  }
  

  $.ajax({
    type:'POST',
    url:url,
    data:{email:email_user,password:password},
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
    success:function(response){
 
      var Data = $.parseJSON(response);
  if(Data.message=='error'){
    Swal.fire({
      icon: 'error',
      title: ' يوجد خطأ...',
      text: 'البريد الالكتروني او كلمة المرور غير صحيح!'
    })
  }else{

    Swal.fire({
      title: "تمت العملية بنجاح",
      text: "عزيزي الطالب قم بكتابة المشكلة التي تواجهها",
      icon: "success",
      confirmButtonText: "ok"
    }).then(function(result) {
      window.location.href = Data.url;

    });
  }
  
  
  }
  })
  
  
    }

    function SaveProblem(){
   
      var summary=$('#TextProblem').val();
     var url=$('#route').val();
    
      $.ajax({
        type:'POST',
        url:url,
        data:{summary:summary},
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
        success:function(response){
          var Data = $.parseJSON(response);
        
          if(Data.message=='success'){
         
            window.location.href = 'https://daleli.org/ar/login-1/'+Data.id;
return;
            $( "#TextDiv" ).hide();
            $("#chatbtn").attr("disabled", true);

            
            $("#ChatBtn").show();
            return;}

 
      }
      })

    }

    function StartChat(id){
  var url='https://app.daleli.org/chatify/'+id;
 
      window.location.href = url;

    }

