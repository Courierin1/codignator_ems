  <!-- google translate -->
  <div id="google_translate_element" style="display: flex; justify-content: center;"></div>    <!-- ends -->
    
<div class="container">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			<?php 
			echo $events[0]["text"];
			
			?>
				<p>Printed By: <span><input type="text" class="form-control" onchange="check()" id="text"></span></p>
				<p>Date: <span><input type="date"  min='<?php echo date("Y-m-d") ;?>' class="form-control" onchange="check()" id="date"></span></p>
			</div>
			<div class="col-md-12 d-flex justify-content-end">
				<p class="font-created-2" for="checkbox" style="font-size:13px ;">I agree to all the conditions
					<span><input type="checkbox" class="" id="checkbox" onclick="check()"></span>
				</p>

			</div>
			<div class="col-md-12 d-flex justify-content-end">
				<!-- <a href="<?= base_url() ?>Events/enroll/<?=$slug?>" class="btn btn-choose text-white my-2 disabled"
					id="btn_submit" disabled>Submit</a> -->
					<form action="<?= base_url() ?>Events/wevier_accept" method="post">
					<button class="btn btn-choose text-white my-2 "
					id="btn_submit" >Submit</button> 
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	let text = document.getElementById("text")
	let date = document.getElementById("date")
	let checkbox = document.getElementById("checkbox")
	let btn_submit = document.getElementById("btn_submit").disabled

	function check() {
		// alert(date.value)
		if (checkbox.checked == true && text.value.length > 0 && date.value != "") {
			$(".btn-choose").removeClass("disabled");
		}
		else {
			$(".btn-choose").addClass("disabled");
		}

	}
</script>