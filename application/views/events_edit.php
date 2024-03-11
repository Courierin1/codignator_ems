  <style>
    
    .readonly {pointer-events: none;
    background:#a1a1a147;
    }
  </style>
  <!-- google translate -->
  <div id="google_translate_element" style="display: flex; justify-content: center;"></div>    <!-- ends -->
    <div class="container-fluid" id="event_registration">
    <div class="row">
        <div class="col-md-6">
            <div id="Events">
                <h1 class="color-1">Event Edit Admin</h1>
            </div>
        </div>
    </div>
    <hr>
    <div class="row" id="event_add">
        <form method="post" action="<?= base_url() ?>events/edit_event_process"   enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8 mt-2">
        <label for="" class="form-label">Event Image</label>
                                            <input  name="image" accept="image/*" id="imgInp" type="file"
                                                class="form-control formedit " placeholder="Choose athlete image">
                                            <small>For best results, please use .png or .jpg files</small>
                                        
                                        </div>
                                        <div class="col-md-4">
                                    <img id="blah" src="<?= base_url() ?><?=$events[0]["image"]?>"  class="img-fluid">
                                </div>
                                </div>
                                <div class="col-12 mb-3">
        <p class="msg">Instruction For User</p>
            <textarea name="instruction" id="instruction" cols="30" rows="10">
            <?=$events[0]["instruction"]?>
            </textarea>
     
        </div>   
            <div class="col-md-12">
                <label for="" class="form-label">Title of the event</label>
                <input name="event_id" type="hidden" class="form-control " value="<?=$events[0]["id"]?>">
                <input name="title" type="text" class="form-control formedit" value="<?=$events[0]["event_name"]?>">
            </div>
            <div class="col-md-12">
                <div class="mt-3">
                    <textarea name="event_description" rows="5" class="form-control formedit"><?=$events[0]["event_description"]?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                <div class="mt-3">
                    <label for="" class="form-label">Name of Event Creator:</label>
                    <input name="name_creator" value="<?=$events[0]["name_creator"]?>" type="text" required class="form-control formedit">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mt-3">
                    <label for="" class="form-label">Order no Or serial no:</label>
                    <input name="order_no" required type="number" value="<?=$events[0]["order_no"]?>" class="form-control formedit">
                </div>
            </div>
            </div>
            
            <div class="col-12">
            <p class="msg mt-3">Enable & Disable sections</p>
            <div class="row">
                    <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" <?=$events[0]["health"]==0? "checked" :"" ;   ?> type="checkbox"  name="health" id="health"  >
                    <label class="form-check-label" for="health">
                    Health Condition
                    </label>
                </div>  
                    </div>
                     <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox"  <?=$events[0]["emergency"]==0? "checked" :"" ;   ?>  name="emergency" id="emergency"  >
                    <label class="form-check-label" for="emergency">
                    Emergency Contact
                    </label>
                </div>  

                    </div>
                     <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox"  <?=$events[0]["academic"]==0? "checked" :"" ;   ?>  name="academic" id="academic"  >
                    <label class="form-check-label" for="academic">
                    Academic Background
                    </label>
                </div>  

                    </div>
                    <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox"  <?=$events[0]["presentation"]==0? "checked" :"" ;   ?>  name="presentation" id="presentation"  >
                    <label class="form-check-label" for="presentation">
                    Presentation/ Paper/ Abstract Submission
                    </label>
                </div>  

                    </div>
                     <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox"  <?=$events[0]["hotel"]==0? "checked" :"" ;   ?>  name="hotel" id="hotet_checkbox"   >
                    <label class="form-check-label" for="hotet_checkbox">
                    Hotel
                    </label>
                </div>  

                    </div>
                    <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="event_fess" id="event_fess"  <?=$events[0]["event_fee"]==0? "checked" :"" ;   ?> >
                    <label class="form-check-label" for="hotet_checkbox">
                Event Fees
                    </label>
                </div>  

                    </div>
                    <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inquired" id="inquired" <?=$events[0]["inquired"]==0? "checked" :"" ;   ?> >
                    <label class="form-check-label" for="inquired">
                    Inquired Question
                    </label>
                </div>  

                    </div>
                     
                     
                </div>
            </div>
            <div id="fess_box">
            <div class="row">
               
            <div class="col-md-6">
                <label class="form-label mt-3">Name of the event Fee options</label>
         
            </div>
            <div class="col-md-6">
                <label class="form-label mt-3">Fee Amount</label>
         
            </div>
             </div>
             <?php 
                    //print_r($events_fees);
                    foreach($events_fees as $key=>$events_fee){
                    //    echo $key;
                    //    echo $events_fees[$key]["fees_name"];
                    ?>
            <div class="row mt-2">
            <div class="col-md-6">
                        <input name="fee_name_edit[<?=$events_fees[$key]["id"]?>]" type="text" value="<?=$events_fees[$key]["fees_name"]?>"  required class="form-control mb-2 count_fuc"
                            placeholder="Name of Event options selection ">
                    </div>
                    <div class="col-md-2">
                        <input name="fee_amount_edit[<?=$events_fees[$key]["id"]?>]" type="number" value="<?=$events_fees[$key]["amount"]?>"  required class="form-control mb-2 count_fuc" placeholder="$20">
                    </div>
                    <div class="col-md-2">
                        <input type="button" ids="<?=$events_fees[$key]["id"]?>" class="btn btn-danger removefess_del " value="Remove" >
                    </div>
            </div>
            <?php
                    }
                    ?>
                <div class="" id="res">
                    
                </div>

           
            <div class="col-md-12">
                <button type="button" onclick="add_text_box()" class="btn btn-warning text-white feeadd">Add More</button>
            </div>
      </div>
      <div class="row mt-4" id="hotel_section">
            <div class="col-md-12">
                <h4 class=""> Hotel Room Fee Setup</h4>
            </div>
           <div class="row">
           <p class="msg1"> Bed Room Setup</p>
            <div class="row">
                <div class="row">
                    <div class="col-5">
                        Name
                    </div>
                    <div class="col-2">
                        Fee
                    </div>
                    <div class="col-2">
                        Tax
                    </div>
                    <div class="col-2">
                        Total Amount
                    </div>
                </div>
                <?php 
                    //print_r($events_fees);
                    foreach($bed_setup as $key=>$bed){
                    //    echo $key;
                    //    echo $events_fees[$key]["fees_name"];
                    ?>
                <div class="row mt-2">
                    <div class="col-5">
                    <input name="bed_name_edit[<?=$bed_setup[$key]["id"]?>]" type="text" id="bed_name_<?=$bed_setup[$key]["id"]?>" value="<?=$bed_setup[$key]["name"]?>"  required class="form-control  "
                                placeholder="Name">
                    </div>
                    <div class="col-2">
                    <input name="bed_price_edit[<?=$bed_setup[$key]["id"]?>]" type="number" step="0.01" onkeyup="bed_cal(<?=$bed_setup[$key]['id']?>)"  value="<?=$bed_setup[$key]["price"]?>"  id="bed_price_<?=$bed_setup[$key]["id"]?>"  required class="form-control  "
                                placeholder="Fee">
                    </div>
                    <div class="col-2">
                    <input name="bed_tax_edit[<?=$bed_setup[$key]["id"]?>]" type="number" step="0.01" onkeyup="bed_cal(<?=$bed_setup[$key]['id']?>)"  value="<?=$bed_setup[$key]["tax"]?>"  id="bed_tax_<?=$bed_setup[$key]["id"]?>"  required class="form-control  "
                                placeholder="Tax">
                    </div>
                    <div class="col-2">
                    <input name="bed_totalprice_edit[<?=$bed_setup[$key]["id"]?>]" type="number" step="0.01" onkeyup="bed_cal(<?=$bed_setup[$key]['id']?>)"  value="<?=$bed_setup[$key]["totalprice"]?>"   id="bed_totalprice_<?=$bed_setup[$key]["id"]?>" required class="form-control "
                                placeholder="Total Amount ">
                    </div>
                    <div class="col-md-1">
                    <input type="button"  class="btn btn-danger removebed_del " ids="<?=$bed_setup[$key]["id"]?>" value="Remove" >
                </div>
                </div>
                <?php
                    }
                    ?>
                
            <div class="row bed_append">

            </div>
                
                <div class="col-6 mt-2">
                    <button type="button" class="btn btn-warning text-white add_bed">Add Bed</button>
                </div>
                <div class="col-6 mt-2 ">
                <div class="form-check text-right">
                    <input class="form-check-input" type="checkbox" name="meals" id="meals" <?=$events[0]["meals"]==0? "checked" :"" ;   ?>  >
                    <label class="form-check-label" for="meals">
                    Meal
                    </label>
                </div>  
                </div>
           </div>
           <div class="row" id="meal_box">
           <p class="msg"> Meal Per Person Setup</p>
<div class="row">
    <div class="row">
<div class="col-5">
                    Name
                </div>
                <div class="col-2">
                    Fee
                </div>
                <div class="col-2">
                    Tax
                </div>
                <div class="col-2">
                    Total Amount
                </div>
                
    </div>
    <?php 
                    //print_r($events_fees);
                    foreach($meals_setup as $key=>$meals){
                    //    echo $key;
                    //    echo $events_fees[$key]["fees_name"];
                    ?>
    <div class="row mt-2">
    <div class="col-5">
                <input name="m_name_edit[<?=$meals_setup[$key]["id"]?>]" type="text" id="m_name_<?=$meals_setup[$key]["id"]?>"  value="<?=$meals_setup[$key]["name"]?>" required class="form-control meal_re "
                            placeholder="Name">
                </div>
                <div class="col-2">
                <input name="m_price_edit[<?=$meals_setup[$key]["id"]?>]" type="number" step="0.01" onkeyup="meal_cal(<?=$meals_setup[$key]['id']?>)" value="<?=$meals_setup[$key]["price"]?>" id="m_price_<?=$meals_setup[$key]["id"]?>"  required class="form-control meal_re "
                            placeholder="Fee">
                </div>
                <div class="col-2">
                <input name="m_tax_edit[<?=$meals_setup[$key]["id"]?>]" type="number" step="0.01" onkeyup="meal_cal(<?=$meals_setup[$key]['id']?>)" value="<?=$meals_setup[$key]["tax"]?>"  id="m_tax_<?=$meals_setup[$key]["id"]?>"  required class="form-control  meal_re"
                            placeholder="Tax">
                </div>
                <div class="col-2">
                <input name="m_totalprice_edit[<?=$meals_setup[$key]["id"]?>]" type="number" step="0.01" onkeyup="meal_cal(<?=$meals_setup[$key]['id']?>)"  value="<?=$meals_setup[$key]["totalprice"]?>" id="m_totalprice_<?=$meals_setup[$key]["id"]?>" required class="form-control meal_re"
                            placeholder="Total Amount ">
                </div>
                <div class="col-md-1">
                    <input type="button"  class="btn btn-danger removemeal_del " ids="<?=$meals_setup[$key]["id"]?>" value="Remove" >
                </div>
    </div>
    <?php
                    }
                    ?>
               
                <div class="row meal_append">

                </div>
                <div class="col-12 mt-2">
                    <button type="button" class="btn btn-warning text-white add_meal">Add Meal</button>
                </div>

           </div>
        </div>
        </div>
        </div>
     
            
        <div id="inquired_box">
            <div class="row">
               
            <div class="col-md-12">
                <label class="form-label mt-3">Inquired Question</label>
            </div>
             </div>
             <?php 
                    //print_r($questions);
                    foreach($questions as $key=>$question){
                    //    echo $key;
                    //    echo $events_fees[$key]["fees_name"];
                    ?>
            <div class="row"  >
            <div class="col-md-10">
                        <input name="questions_edit[<?= $question["id"] ?>]" type="text"  value="<?= $question["question"] ?>" required class="form-control mb-2 questions"
                            placeholder="Write a question for inquiry">
                    </div>
                    <div class="col-md-2">
                        <input type="button"  ids="<?= $question ["id"] ?>" class="btn btn-danger question_del" value="Remove" >
                    </div>
            </div>
            <?php
                    }
                    ?>
                <div class="" id="append_question">
                    
                </div>

           
            <div class="col-md-12">
                <button type="button" onclick="append_question()" class="btn btn-warning text-white">Add More</button>
            </div>
      </div>
        <br>
        <div class="col-12 mb-3">
            <textarea name="policy" id="policy" cols="30" rows="10">
            <?=$events[0]["policy"]?>
            </textarea>
       
        </div>
            <div class="col-md-10" style="float: left"></div>
            <div class="col-md-2" style="float: right">
                <button type="submit" class="btn btn-primary">Save Event</button>
            </div>

        </form>
</div>
</div>

<!-- </div> -->


<script>
              <?php  $sql ="SELECT * FROM event_enrolls where event_id='".$events[0]["id"]." ' "; 
            $query = $this->db->query($sql); 
            $row = $query->result_array();
            if (count($row)!=0) {
                echo "$(document).ready(function () {
                    $('.form-control').each(function (i, obj) {
                    if(!$(this).hasClass('formedit'))
                    $(this).addClass('readonly');
                   
                     })
                     $('.form-check-label').addClass('readonly');
                     $('.form-check-input').addClass('readonly');
                     $('.add_meal').addClass('readonly');
                     $('.removebed_del').addClass('readonly');
                     $('.add_bed').addClass('readonly');
                     $('.removemeal_del').addClass('readonly');
                     $('.feeadd').addClass('readonly');
                     $('.removefess_del').addClass('readonly');
                        });
                   
                     ";
            }
?>

    <?php
    echo
    "
    $(document).ready(function () {
if ($('#hotet_checkbox').is(':checked')){
    $('.section_req').attr('required')
    $('#hotel_section').show();
}else{
    $('.section_req').removeAttr('required')
    $('#hotel_section').hide();
}
if ($('#event_fess').is(':checked')){
    $('.count_fuc').attr('required')
    $('#fess_box').show();
}else{
    $('.count_fuc').removeAttr('required')
    $('.count_fuc').val('')
    $('#fess_box').hide();
}
if ($('#meals').is(':checked')){
    $('.meal_re').attr('required')
    $('#meal_box').show();
}else{
    $('.meal_re').removeAttr('required')
    $('.meal_re').val('')
    $('#meal_box').hide();
}
    })
    if ($('#inquired').is(':checked')){
        $('.questions').attr('required')
        $('#inquired_box').show();
    }else{
        $('.questions').removeAttr('required')
        $('.questions').val('')
        $('#inquired_box').hide();
    }
    ";
    ?>
    $("#hotet_checkbox").on("change", function hotel_toggle() {
        // $('#hotel_section').toggle();
          if ($('#hotet_checkbox').is(':checked')){
            $(".section_req").attr("required")
            $("#hotel_section").show();
        }else{
            $(".section_req").removeAttr("required")
            $(".section_req").val("")
            $("#hotel_section").hide();
        }
    })
    $("#inquired").on("change", function inquired_toggle() {
        if ($('#inquired').is(':checked')){
            $(".questions").attr("required")
            $("#inquired_box").show();
        }else{
            $(".questions").removeAttr("required")
            $(".questions").val("")
            $("#inquired_box").hide();
        }
    })
    $("#event_fess").on("change", function events_toggle() {
        if ($('#event_fess').is(':checked')){
            $(".count_fuc").attr("required")
            $("#fess_box").show();
        }else{
            $(".count_fuc").removeAttr("required")
            $(".count_fuc").val("")
            $("#fess_box").hide();
        }
    })
//  hotel bed section
$("#meals").on("change", function events_toggle() {
        if ($('#meals').is(':checked')){
            $(".meal_re").attr("required")
            $("#meal_box").show();
        }else{
            $(".meal_re").removeAttr("required")
            $(".meal_re").val("")
            $("#meal_box").hide();
        }
    })
    $(document).on('click', '.add_bed', function () {
        var removebed = 0;
        $('.removebed').each(function (i, obj) {
            removebed++;
            });
            // alert(removebed)
        var html = `
        <div class="row mt-2 remove_bed_row">
        <div class="col-5">
                <input name="bed_name[]"   id="bed_name_`+removebed+`" type="text"  required class="form-control  "
                            placeholder="Name">
                </div>
                <div class="col-2">
                <input name="bed_price[]"   id="bed_price_`+removebed+`" type="number" step="0.01" onkeyup="bed_cal(`+removebed+`)"  required class="form-control  "
                            placeholder="Fee">
                </div>
                <div class="col-2">
                <input name="bed_tax[]"   id="bed_tax_`+removebed+`" type="number" step="0.01" onkeyup="bed_cal(`+removebed+`)"  required class="form-control  "
                            placeholder="Tax">
                </div>
                <div class="col-2">
                <input name="bed_totalprice[]"    id="bed_totalprice_`+removebed+`" type="number" step="0.01" onkeyup="bed_cal(`+removebed+`)"  required class="form-control "
                            placeholder="Total Amount ">
                </div>
                <div class="col-md-1">
                    <input type="button"  class="btn btn-danger removebed " value="Remove" >
                </div>
        </div>
        `;
        $(".bed_append").append(html);
    });
    $(document).on('click', '.removebed', function () {
        $(this).parent().parent().remove();
    });

       
function bed_cal(id) {
var amt = $("#bed_price_"+id).val();
var tax =$("#bed_tax_"+id).val();
var divsion = 0;
var total_amt =parseFloat(amt).toFixed(2);
if(tax>0){
divsion = (amt * tax)/100;
total_amt = parseFloat(parseFloat(amt) +parseFloat(divsion));
total_amt = parseFloat(total_amt).toFixed(2);
}
$("#bed_totalprice_"+id).val(total_amt);
}

$(document).on('click', '.removebed_del', function () {
        
        var id = $(this).attr('ids');
        $(this).parent().parent().remove();
        $.ajax({
            url: "<?= base_url() ?>Events/remove_bed",
            type: "POST",
            data: {id : id},
            dataType: "text"
            });

            request.done(function(msg) {
            if(msg == "true"){
            
            }
            });

            request.fail(function(jqXHR, textStatus) {
            });
        
    });
    $(document).on('click', '.question_del', function () {
        
        var id = $(this).attr('ids');
        $(this).parent().parent().remove();
        $.ajax({
            url: "<?= base_url() ?>Events/remove_question",
            type: "POST",
            data: {id : id},
            dataType: "text"
            });

            request.done(function(msg) {
            if(msg == "true"){
            
            }
            });
            request.fail(function(jqXHR, textStatus) {
            });
    });
    // bed section end
//  hotel Meal section
$(document).on('click', '.add_meal', function () {
    var removebed = 0;
        $('.removemeal').each(function (i, obj) {
            removebed++;
            });

        var html = `
        <div class="row mt-2 remove_meal_row">
        <div class="col-5">
                <input name="m_name[]"    id="m_name_`+removebed+`" type="text"  required class="form-control  meal_re"
                            placeholder="Name">
                </div>
                <div class="col-2">
                <input name="m_price[]"     id="m_price_`+removebed+`" type="number" step="0.01" onkeyup="meal_cal(`+removebed+`)" required class="form-control  meal_re"
                            placeholder="Fee">
                </div>
                <div class="col-2">
                <input name="m_tax[]"    id="m_tax_`+removebed+`"  type="number" step="0.01" onkeyup="meal_cal(`+removebed+`)" required class="form-control  meal_re"
                            placeholder="Tax">
                </div>
                <div class="col-2">
                <input name="m_totalprice[]"    id="m_totalprice_`+removebed+`" type="number" step="0.01" onkeyup="meal_cal(`+removebed+`)" required class="form-control meal_re"
                            placeholder="Total Amount ">
                </div>
                <div class="col-md-1">
                    <input type="button"  class="btn btn-danger removemeal " value="Remove" >
                </div>
        </div>
        `;
        $(".meal_append").append(html);
    });
    $(document).on('click', '.removemeal', function () {
        $(this).parent().parent().remove();
    });
    function meal_cal(id) {
var amt = $("#m_price_"+id).val();
var tax =$("#m_tax_"+id).val();
var divsion = 0;
var total_amt =parseFloat(amt).toFixed(2);
if(tax>0){
divsion = (amt * tax)/100;
total_amt = parseFloat(parseFloat(amt) +parseFloat(divsion));
total_amt = parseFloat(total_amt).toFixed(2);
}
$("#m_totalprice_"+id).val(total_amt);
}
$(document).on('click', '.removemeal_del', function () {
        
        var id = $(this).attr('ids');
        $(this).parent().parent().remove();
        $.ajax({
            url: "<?= base_url() ?>Events/remove_meal",
            type: "POST",
            data: {id : id},
            dataType: "text"
            });
            request.done(function(msg) {
            if(msg == "true"){
           
            }
            });

            request.fail(function(jqXHR, textStatus) {
            });
        
    });

    // meal section end
//  event fee section
function add_text_box(){

var html = '<div class="row remove_div">';
    html += '<div class="col-md-6">';
    html += '<input name="fee_name[]" type="text" class="form-control my-2 count_fuc"  placeholder="Event options selection ">';
    html += '</div>';
    html += '<div class="col-md-2">';
    html += '<input name="fee_amount[]" type="number" class="form-control my-2 count_fuc"   placeholder="$50">';
    html += '</div>';
    html += '<div class="col-md-2">';
    html += '<input type="button"  class="btn btn-danger removefess mt-2" value="Remove" >';
    html += '</div>';
    html += '</div>';
    $("#res").append(html);

}
$(document).on('click', '.removefess', function () {
        $(this).parent().parent().remove();
    });

    $(document).on('click', '.remove_room_person_del', function () {
        
        var id = $(this).attr('ids');
        $(this).parent().parent().remove();
        // var id = $(this).attr('data-room');
        $.ajax({
            url: "<?= base_url() ?>Events/remove_room_person_del",
            type: "POST",
            data: {id : id},
            dataType: "text"
            });

            request.done(function(msg) {
            // $("#log").html( msg );
            if(msg == "true"){
            calculation(id);
            
        }
            });

            request.fail(function(jqXHR, textStatus) {
            });
        
    }); 

    function append_question() {
    var html =`
    <div class="row" >
            <div class="col-md-10">
                        <input name="questions[]" type="text"  required class="form-control mb-2 questions"
                            placeholder="Write a question for inquiry">
                    </div>
                    <div class="col-md-2">
                        <input type="button" onclick="$(this).parent().parent().remove();"  class="btn btn-danger" value="Remove" >
                    </div>
            </div>
    `;
  $('#append_question').append( `<div class='row'>`+html+`</div>`);
}
    ClassicEditor.create(document.querySelector("#instruction")).catch((error) => {
		console.error(error);
	});
    

	ClassicEditor.create(document.querySelector("#policy")).catch((error) => {
		console.error(error);
	});
</script>