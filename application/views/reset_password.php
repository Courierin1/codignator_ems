<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shu Dong Li</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css" />
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer></script> 
</head>

<body>
  
  <section id="login">
    <div class="container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="img-logo d-flex justify-content-center">
              <img src="<?=base_url()?>/assets/images/logo.png" alt="" class="img-fluid ">
            </div>
          </div>
          <div class="col-md-12">
            <div class="registration mt-3 mb-2 d-flex justify-content-center">
                <h2 class="text-center">Reset Password</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="img-logo d-flex justify-content-center mb-2">
                <h1 class="text-center">Update password</h1>
            </div>
          </div>
          <form method="post" action="<?=base_url()?>password_reset">
          <input type="hidden" name="token_key" value="<?php echo $_GET['token'];?>" >
          <div class="col-md-12">
            <div class="input-email d-flex justify-content-center mb-2">
                <input id="password" required name="password" type="password" class="form-control  width-input" placeholder="Password" >
                <span><img src="<?=base_url()?>/assets/images/hourglass.png" alt="" class="img-fluid img-input"></span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="input-email d-flex justify-content-center mb-2">
                <input onkeyup="matchpassword();" required id="confirm_password" name="confirm_password" type="password" class="form-control  width-input" placeholder="Confirm Password" >
                <span><img src="<?=base_url()?>/assets/images/hourglass.png" alt="" class="img-fluid img-input"></span>
            </div>
          </div>
          
          <div class="col-md-12">
            <div class="d-flex justify-content-center mb-2">
              <div style="display: none;" class="alert alert-danger" id="alert-danger" role="alert">
                Password Not Matched
              </div>
            </div>
          </div>
          <div class="row justify-content-center" id="html_element"></div>
          <div class="col-md-12">
            <div class="input-email d-flex justify-content-center mb-2">
             <button id="submitbtn" type="submit" class="btn btn-register">Update</button>
          </div>
          </form>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <!-- <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6Lc9y3AnAAAAANO3lCZ8qwX8jol7cgOKUEcvHM9W'
        });
      };
     
    </script> -->
  <script>
    function matchpassword(){
      var password = $("#password").val();
      var confirm_password = $("#confirm_password").val();
      if(password!=confirm_password){
        $("#alert-danger").slideDown(500);
        $("#submitbtn").prop('disabled', true);
      }
      else{
      $("#alert-danger").slideUp(500);
      $("#submitbtn").prop('disabled', false);
      }
    }
    //
  </script>
</body>

</html>