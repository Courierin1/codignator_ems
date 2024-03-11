<footer id="footer mt-5">
  <div class="container">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <p class="msg text-center">Copyright © World Taiji Science Federation </p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- <script src="https://www.google.com/recaptcha/enterprise.js?render=6LcavHAnAAAAABuDyKH-bdvU7zHhMAH0ngnnl--6"></script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  
//  swal("Hello world!");
 <?php
if (isset($_SESSION["msg1"])) {
  if (isset($_SESSION["enroll_id"])) {
    unset($_SESSION['msg1']);
    unset($_SESSION['enroll_id']);
  }else {
    echo "swal('".$_SESSION['msg1']."');";
    unset($_SESSION['msg1']);
  }
  
}
?>
 
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/sidebar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function () {
    $('#example').DataTable();
    

  });

 
  imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }
  
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
    type="text/javascript"></script>
  <script>
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
    function confirmation(ev) {
ev.preventDefault();
var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
console.log(urlToRedirect); // verify if this is the right URL
swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
  if (willDelete) {
    window.location.href = urlToRedirect
  } 
});
}
  </script>
</body>

</html>
