const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password_login');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
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

   
    var urli=$('#urlcheck').val();
    $.ajax({
      type:'POST',
      url:urli,
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      success:function(response){
      
        var Case = $.parseJSON(response);

          if(Case.message =='empty case' && Case.FirstSession =='empty session' || Case.message =='finished'&& Case.FirstSession =='empty session' ){
            
            Swal.fire({
              title: "تمت العملية بنجاح",
              text: "عزيزي الطالب قم بكتابة المشكلة التي تواجهها",
              icon: "success",
              confirmButtonText: "ok"
            }).then(function(result) {
           
              window.location.href = Data.url;

        
            });
          }
        if(Case.message =='assigned' && Case.FirstSession =='empty session'){
       
          window.location.href = 'https://daleli.org/ar/login-1?user='+Case.id;

        }else if(Case.message =='assigned' && Case.FirstSession !='empty session'){

          Swal.fire({
            title: "تمت العملية بنجاح",
            icon: "success",
            confirmButtonText: "ok"
          }).then(function(result) {
           
            window.location.href = Data.url;
      
          });
        }else if(Case.message =='Pending' && Case.FirstSession =='empty session'){
        
          window.location.href = 'https://daleli.org/ar/login-2?user='+Case.id;
        }

  }});

  }

  }
  })
  
  
    }


  function SweetShow(){
    var text="يرجى قراءة الشروط والأحكام التالية بعناية قبل استخدام موقع أو تطبيق دليلي في حالة حدوث اختلاف في تفسير أي من البنود المذكورة أدناه يتم اعتماد النص العربى كمستند أساسي ووحيد للتفسير. باستخدام موقع أو تطبيق دليلي فإنك توافق على أن تكون ملزم قانونيا بهذه الشروط والأحكام، والتي تنتج أثارها فور استخدامك لموقع أو لتطبيق دليلي إذا كنت لا توافق على الشروط التالية، يرجى اغلاق الموقع أو التطبيق فورا."+
    "تحتفظ شركة دليلي. صاحبة موقع وتطبيق دلييلي بحقها في تغيير الشروط والأحكام والبنود الخاصة بسياسة الخصوصية من وقت لآخر وعليه يتعين عليك الإطلاع على هذه الشروط والأحكام وسياسة الخصوصية دوريا، ولا يتوجب علينا الاتصال بك مباشرة أو إعلامك بأي تغييرات تم إجراؤها على الشروط والأحكام وسياسة الخصوصية، وسيتم الاكتفاء بالتنويه عن تاريخ آخر تحديث شروط الاستخدام وسياسة الخصوصية كما هو موضح بالأعلى."+
    "أيضا كجزء من التزامنا فإننا نرحب بكافة تعليقاتك من خلال نموذج التواصل معنا "+"اتصل بنا"+" على أي من السياسات والشروط التي ندرجها أدناه."+
    "سياسة الخصوصية"+
    "  يحتاج أي شخص أقل من 18عاما (حسب التقويم الميلادي) يرد أن يقوم باستخدام موقع أو تطبيق دليلي إلى الحصول على موافقة والديه أو ولي أمره للقيام بذلك، وذلك عن طريق ارسال عنوان البريد الإلكتروني لأحد الوالدين أو ولي الأمر حتى يتسنى لنا مخاطبتهم للحصول على موافقتهم ، وبناء على ذلك يلتزم الوالدان أو أولياء الأمور بمراقبة أنشطة أبنائهم ويكونوا مسئولين عن التصرفات الصادرة من أبنائهم طالما لم يبلغوا سن الرشد وهو 18 عاما (حسب التقويم الميلادي)."+
    " في حالة اذا تم ابلاغنا أو اتضح لنا بطريقتنا بأن عمر المستخدم أقل من السن القانوني لإنشاء حساب بـ دليلي فسنقوم بوقف مؤقت للحساب لحين الحصول على موافقة ولي الأمر، ويتم ذلك بالحصول على عنوان البريد الإلكتروني الخاص بالوالدين من خلال طلب عنوان البريد الإلكتروني الخاص بأحد الوالدين أو ولي الأمر من قبل الطفل، وذلك بما يتفق مع متطلبات قانون حماية خصوصية الأطفال عبر الإنترنت في أيٍ من المواقع أو التطبيقات التي تستهدف الأطفال. إذا كنت تعتقد أن طفلك يشارك في نشاط يقوم بجمع المعلومات الشخصية، ولم يصلك أو يصل الوالد / ولي الأمر بريد إلكتروني لإخطارك أو طلب موافقتك، يُرجى عدم التردد في التواصل معنا عبر البريد الإلكتروني"+
    " باستخدام دليلي فإنك تقر وتتعهد بأنك تتمتع بالحق و القدرة القانونية على استخدام الخدمة طبقا لقانون البلد التابع لها وعلى سبيل الاسترشاد دون الحصر يكون الحد الأدنى من السن القانوني لاستخدام الخدمة هو 18 سنة بالنسبة لجمهورية مصر العربية وكذلك الدول العربية، و 18 سنة بالنسبة لدولة الصين, و 16 سنة بالنسبة لدولة هولندا، و14 سنة بالنسبة لدول ألمانيا واستراليا وكوريا الجنوبية وإسبانيا والولايات المتحدة الأمريكية، و 13 سنة بالنسبة لباقي دول العالم."+
    " باستخدام دليلي فإنك توافق على الامتناع عن القيام أو المشاركة في الأمور التالية (سواء قمت أنت بها شخصيا أو من خلال طرف ثالث) حيث باستخدامك لموقع أو تطبيق دليلي يقع على مسؤوليتك الشخصية ،فإنك توافق على عدم نشر، أو رفع، أو إرسال، أو توزيع، أو تخزين، أو إيجاد أو نشر بأي شكل من الأشكال، أو التسبب في نشر على موقع دليلي بشكل مباشر أو غير مباشر عن طريق موقع إلكتروني للغير أي من الأمور التالية:"+
    "1   القيام بأي عمل يكون من شأنه التأثير على تشغيل أو أمن موقع دليلي أو يتسبب في إزعاج غير منطقي أو إساءة أو تعطيل أي من المستخدمين الآخرين أو العاملين لدينا."+
    "2   نقل حسابك (بما في ذلك الصفحة التي تديرها أو التطبيق) إلى أي شخص دون إخطارنا بذلك و الحصول على إذن كتابي مسبق يسمح بذلك."+
    "3   تطبيق هندسة عكسية، أو جمع عكسي، أو تفكيك، أو أي عمل آخر يكون من شأنه اكتشاف رمز مصدري أو غيره من الصيغ الحسابية أو المعالجات فيما يخص برنامج الحاسوب المستخدم في البنية التحتية والعمليات المتعلقة بموقع آو تطبيق دليلي ."+
    "4  انتهاك حقوق المستخدمين الآخرين في الخصوصية، أو جمع أي بيانات و معلومات حول المستخدمين الآخرين دون موافقتهم الصريحة، سواء كان ذلك بشكل يدوي أو باستخدام أي برمجيات آلية أو عنكبوتية (spider) أو متسللة (crawler) أو بحث في الموقع أو تطبيق استعادة، أو أي أجهزة أو عمليات آلية أخرى لاختراق الموقع الإلكتروني و/ أو المنصة و/ أو استعادة فهرس و/ أو معلومات تنقيب البيانات."+
    "5  تقديم معلومات شخصية أو خاصة بطرف ثالث، وعلى سبيل المثال لا الحصر، اسم العائلة، وعنوان، وأرقام هواتف، وعناوين بريد إلكتروني، وأرقام بطاقات ائتمان."+
    "6   بث فيروسات، أو بيانات مخربة، أو ملفات أخرى تتسبب في أضرار، أو أعطال أو تخريب."+
    "7  تقديم محتوى أو وصلات إلى محتوى نعتبره وبناء على حكمنا المطلق بأنه يتسبب في تعريضنا بأي شكل من الأشكال نحن أو المستخدمين الآخرين للضرر أو المساءلة القانونية بأي شكل من الأشكال."+
    "8  محتوى غير قانوني، أو تشهير، أو ذم، أو مسيء لأي مجموعة دينية أو أخلاقية، أو محتوى فاضح، أو إباحي، أو فاحش، أو بذيء، أو فيه إيحاءات، أو مضايقات، أو تهديدات، أو خرق لحقوق الخصوصية والنشر، أو عنيف، أو مثير للحساسيات، أو احتيالي أو غير مقبول بأي شكل من الأشكال."+
     "9  محتوى يشكل، أو يشجع، أو يقدم تعليمات لمخالفة جرمية، أو خرق حقوق أي طرف كان، أو يتسبب بأي شكل من الأشكال في مسؤولية قانونية أو يخرق أي من القوانين المحلية ."+
     "10  محتوى يتسبب في إزعاج أو مضايقة الآخرين."+
     "11  محتوى لا تمتلكه أنت شخصيا دون إذن صريح معتد به قانونيا من مالك ذلك المحتوى."+
     "12  محتوى ينتحل شخصية أي شخص حقيقي أو اعتباري أو يتسبب بأي شكل من الأشكال في ادعاء كاذب بتبعية لذلك الشخص الحقيقي أو الاعتباري، بما في ذلك دليلي ."+
     "13  مواد ترويجية غير مرغوبة، أو حملات سياسية، أو الإعلانات، أو المسابقات، أو السحوبات، أو تقديم عروض."+
     " لا نتحمل مسؤولية أو نقر أي محتوى ينشره المستخدمون، أو يرفعونه في، أو يبثونه، أو يوزعونه، أو يخزنونه، أو يوجدونه، أو ينشرونه بأي شكل من الأشكال أو يتسببون في نشره على موقع دليلي مباشرة أو من خلال موقع إلكتروني للغير."+
     " لا نتحمل أي مسؤولية عن أي محتوى يتم نشره أو تخزينه أو رفعه في المجموعات أو الصفحة التفاعلية من قبلك أو من قبل أي طرف ثالث، أو عن أي خسارة أو أضرار ناجمة عن ذلك، كما أننا لا نتحمل مسؤولية أية أخطاء، أو ذم، أو تحقير، أو تشهير، أو سهو، أو أكاذيب، أو إساءة، أو إباحية، أو شتائم قد تصادفك أثناء استخدامك الصفحات التفاعلية. كما لا نتحمل أية مسؤولية عن أي عبارات، أو تعهدات أو محتوى يقدمه المستخدمون في أي الصفحة التفاعلية العامة،. ويجب على المستخدمين تبلغينا فوراً حدوث ذلك لاتخاذ اللازم وفقا لتقديرنا ."+
     " في حالة وجود شكاوى ناشئة عن المحتوى الذي قام مستخدم بنشره أو رفعه، أو بثه، أو توزيعه، أو حفظه، أو إيجاده، أو تسبب بأي شكل من الأشكال بنشره على موقع دليلي مباشرة أو عن طريق موقع إلكتروني للغير، فأنت توافق على مباشرة الشكوى ضد ذلك المستخدم فقط وليس ضدنا نحن"+
     " نظرا لمحدودية قدرة أجهزة الخوادم “Servers” واستخدامها من قبل العديد من الأشخاص في الوقت نفسه، فإنك تلتزم بعدم استخدام موقع دليلي بأي شكل من الأشكال التي تؤدي إلى تخريب أو تتجاوز قدرة تحمل أجهزة الخادم “Servers” لدينا أو أي شبكة مرتبطة بأي من خوادمنا، كالقيام بأي فعل يكون من شأنه فرض حمل كبير بشكل غير منطقي أو غير متناسب مع البنية التحتية المتاحة أو النطاق الترددي لموقع أو تطبيق دليلي المعالجون المواقع الاكترونية الاخري";
     var NewText=text.replace(/(.*?\s.*?\s.*?\s.*?\s.*?\s.*?\s.*?\s.*?\s)/g, '$1'+'\n');
     
    Swal.fire({
      title: 'الشروط والاحكام!',
      text: 'Discription',
  

      html: ' <textarea style="  padding-right: 10px;      padding-left: 10px;   line-height: 47px;   text-align: right;      height: 600px;font-size: 20px;"class="form-control textareanewclass" id="exampleFormControlTextarea1" rows="3">'+ NewText+'</textarea>' ,





     
    })
  }


  $(function() {
    $('#flexCheckDefault').click(function() {
        if ($(this).is(':checked')) {
            $('#addBtn').removeAttr('disabled');
        } else {
            $('#addBtn').attr('disabled', 'disabled');
        }
    });
});





  function ResetPassword(){
    (async () => {
      //Your await function/logic
      const { value: email } = await Swal.fire({
        title: 'أدخل بريدك الالكتروني',
        input: 'email',
        inputLabel: '',
        inputPlaceholder: 'Enter your email address'
      })
      
      if (email) {
       var url=$('#ResetPassword').attr('data-url');
    
        $.ajax({
          type:'POST',
          url:url,
          data:{email: email},
          headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          success:function(response){
            var User = $.parseJSON(response);
if(User.message=='sucsess'){
  Swal.fire({
    title: "تم ارسال رابط تعيين كلمة المرور الى بريدك الالكتروني بنجاح ",
    icon: "success",
    confirmButtonText: "ok"
  })
}else{
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'البريد الالكتروني غير موجود !!!!!',
    footer: '<a href="">يرجى التأكد من البريد الالكتروني </a>'
  })
}
         
      }});
      //  Swal.fire(`Entered email: ${email}`)
      }
   })()
   
  }