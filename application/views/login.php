<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=2.0" />
  <title>Shu Dong Li</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css" />
  <!-- <script src="https://www.google.com/recaptcha/api.js?render=6LeBq1MnAAAAAKpfeD1wqaTV89XcNiQEeyOCSgWE"></script> -->
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer></script> 
</head>

<body>
  <!-- google translate -->
  <div id="google_translate_element" style="display: flex; justify-content: center;"></div>    <!-- ends -->
    
    <section id="login">
      <div class="container">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="img-logo d-flex justify-content-center">
                <img src="<?= base_url() ?>/assets/images/logo.png" alt="" class="img-fluid ">
              </div>
            </div>
            <div class="col-md-12">
              <div class="registration mt-3 mb-2 d-flex justify-content-center">
                <h2 class="text-center">Event Registration</h2>
              </div>
            </div>
            <div class="col-md-12">
              <div class="img-logo d-flex justify-content-center mb-2">
                <h1 class="text-center">Login</h1>
              </div>
            </div>
            <div class="col-md-12">
              <!-- <select class="selectpicker" data-width="fit" onchange="translateLanguage(this.value);">

                <option data-content='<spanclass="flag-icon flag-icon-af"></span> Afrikaans' value="Afrikaans">Afrikaans
                </option>

                <option data-content='<spanclass="flag-icon flag-icon-al"></span> Albanian' value="Albanian">Albanian
                </option>

                <option data-content='<spanclass="flag-icon flag-icon-ar"></span> Arabic' value="Arabic">Arabic</option>

                <option data-content='<spanclass="flag-icon flag-icon-am"></span> Armenian' value="Armenian">Armenian
                </option>

                <option data-content='<spanclass="flag-icon flag-icon-az"></span> Azerbaijani' value="Azerbaijani">
                  Azerbaijani</option>

                ...

              </select> -->
             
      <br/>
            </div>
            <form method="post" id="demo-form" action="<?= base_url() ?>login/login_process">
              <div class="col-md-12">
                <div class="input-email d-flex justify-content-center mb-2">
                  <input name="username" type="text" class="form-control  width-input" placeholder="username">
                  <span><img src="<?= base_url() ?>/assets/images/hourglass.png" alt=""
                      class="img-fluid img-input"></span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="input-email d-flex justify-content-center mb-2">
                  <input name="password" type="password" class="form-control  width-input" placeholder="Password">
                  <span><img src="<?= base_url() ?>/assets/images/hourglass.png" alt=""
                      class="img-fluid img-input"></span>
                </div>
              </div>
              <?php 
              if(isset($slug)){
                if($slug=='failed'){
                  ?>
                  <div class="col-md-12">
                    <div class="d-flex justify-content-center mb-2">
                      <div style="" class="alert alert-danger"  role="alert">
                        Failed To Login Try Again
                      </div>
                    </div>
                  </div>
                  <?php
                }
                if($slug=='failed1'){
                  echo ' <div class="col-md-12">
                  <div class="d-flex justify-content-center mb-2">
                    <div style="" class="alert alert-danger"  role="alert">
                      Please checked the CAPTCHA to verify
                    </div>
                  </div>
                </div>';
                }
              }
              ?> 
              <!-- <div class="row justify-content-center" id="html_element"></div> -->
              <div class="col-md-12">
                <div class="input-email d-flex justify-content-center mb-2">
                  <button   type="submit" class=" btn btn-login">Login</button>
                </div>
            </form>
            <div class="col-md-12">
              <div class="input-email d-flex justify-content-center mb-2">
                <a href="<?= base_url() ?>register" class="btn btn-register">Register</a>
              </div>
              <div class="col-md-12">
                <div class="input-email d-flex justify-content-center mb-2">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-forget">Forget Password</button>
                </div>
                <!-- <div class="col-md-12">
            <div class="input-email d-flex justify-content-center mb-2">
             <a href="javascript:void(0)" class="btn btn-outline-primary">Captcha</a>
          </div>
        </div> -->
              </div>
            </div>
    </section>
    <!-- Use this secret key for communication between your site and reCAPTCHA -->
  <!-- 6LeBq1MnAAAAAAXemNzida5nGIbjcI4XEvey4qLx -->
  <!-- 
reCAPTCHA icon
Success – you're all set up with Enterprise!
checkmark
Manage settings in the Google Cloud project
checkmark
Up to 1,000,000 assessments/month at no cost
Visit the Google Cloud Platform project hosting your reCAPTCHA Enterprise keys to enable advanced features.
Use this site key in the HTML code your site serves to users.
 -->
  <!-- 6LeBq1MnAAAAAKpfeD1wqaTV89XcNiQEeyOCSgWE -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Forget password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="<?= base_url() ?>Login/forget_password"  method="post">
       <div class="col-md-12 d-flex justify-content-center mb-2"><label  for="">Email &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </label>
                
                <input   type="email" name="email" required class="form-control  width-input" placeholder="Email" >
             
          </div>
          <div class="row justify-content-center" id="html_element3"></div>
          <br>
          <div class="text-center">
            
          <button type="submit" id="submitbtn" class="btn btn-success">Submit</button>
          </div>
       </form>
      </div>
    </div>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
    type="text/javascript"></script>
 <!-- <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6Lc9y3AnAAAAANO3lCZ8qwX8jol7cgOKUEcvHM9W'
        });
        grecaptcha.render('html_element3', {
          'sitekey' : '6Lc9y3AnAAAAANO3lCZ8qwX8jol7cgOKUEcvHM9W'
        });
      };
     
    </script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  
//  swal("Hello world!");
 <?php
if (isset($_SESSION["login_msg"])) {
 
    echo "swal('".$_SESSION['login_msg']."');";
    unset($_SESSION['login_msg']);

  
}
?>
//  document.getElementById("demo-form").addEventListener("submit",function(evt)
//   {
  
//   var response = grecaptcha.getResponse();
//   if(response.length == 0) 
//   { 
//     //reCaptcha not verified
//     swal("Please verify Captcha is check");
//     evt.preventDefault();
//     return false;
//   }
//   //captcha verified
//   //do the rest of your validations here
  
// });

    function googleTranslateElementInit() {
      new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
    }

    function translateLanguage(lang) {
      googleTranslateElementInit();
      var $frame = $('.goog-te-menu-frame:first');
      if (!$frame.size()) {
        alert("Error: Could not find Google translate frame.");
        return false;
      }
      $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
      return false;
    }

    // $(function () {
    //   $('.selectpicker').selectpicker();
    // });
  </script>
</body>

</html>
