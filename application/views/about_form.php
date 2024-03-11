
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> 
  <!-- google translate -->
  <div id="google_translate_element" style="display: flex; justify-content: center;"></div>    <!-- ends -->
    <div class="container-fluid">
	<form action="<?=base_url()?>events/about_form" method="post" id="about_form">
		<div class="row">
			<div class="col-md-12">
				<h3>About From</h3>
			</div>
			<div class="col-md-12">
				<textarea name=""  class="form-control" id="editor">
				<?php echo $about[0]["text"]; ?>
				</textarea>
				
			</div>
			<div class="col-md-12 d-flex justify-content-end">
				<div class="mt-2">
					<input type="submit" class="form-control btn btn-choose text-white" />
				</div>
			</div>
		</div>
	</form>
</div>
<script>
$(document).ready(function() {
        $('#editor').summernote();
    });
	$(function(){
		$("#about_form").submit(function(e){
			e.preventDefault();
			var text = $("#editor").val();
			$.ajax({
				url:"<?=base_url()?>events/about_form",
				type:"post",
				data:{'text':text},
				success:function(response){
					if(response=1){
						window.location.href = "<?=base_url()?>about_form";
					}
				}
			});
		});
	})
</script>
