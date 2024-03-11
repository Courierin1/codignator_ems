<!-- google translate -->
<div id="google_translate_element" style="display: flex; justify-content: center;"></div> <!-- ends -->
<div class="container-fluid" id="event_registration">
    <div class="row">
        <div class="col-md-6">
            <div id="Events">
                <h1 class="color-1">Event Registration Admin</h1>
            </div>
        </div>
    </div>
    <hr>
    <form method="post" action="<?= base_url() ?>events/event_process"  enctype="multipart/form-data">
    <div class="row" id="event_add">
       
        <div class="row">
            <div class="col-md-8 mt-2">
        <label for="" class="form-label">Event Image</label>
                                            <input  name="image" accept="image/*" id="imgInp" type="file"
                                                class="form-control form1 " placeholder="Choose athlete image">
                                            <small>For best results, please use .png or .jpg files</small>
                                        
                                        </div>
                                        <div class="col-md-4">
                                    <img id="blah" src=""  class="img-fluid">
                                </div>
                                </div>
                                <div class="col-12 mb-3">
        <p class="msg">Instruction For User</p>
            <textarea name="instruction" id="instruction" cols="30" rows="10">

            </textarea>
     
        </div>
            <div class="col-md-12 mt-2">
                <label for="" class="form-label">Title of the event</label>
                <input name="title" type="text"  required class="form-control">
            </div>
        </div>
        
            <div class="col-md-12">
                <div class="mt-3">
                    <textarea name="event_description"  required rows="5" class="form-control"></textarea>
                </div>
            </div>
            <div class="row">
                 <div class="col-md-8">
                <div class="mt-3">
                    <label for="" class="form-label">Name of Event Creator:</label>
                    <input name="name_creator" required type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mt-3">
                    <label for="" class="form-label">Order no Or serial no:</label>
                    <input name="order_no" required type="number" class="form-control">
                </div>
            </div>
            </div>
           
            <div class="col-12">
            <p class="msg mt-3">Enable & Disable sections</p>
            <div class="row">
                    <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="health" id="health"  >
                    <label class="form-check-label" for="health">
                    Health Condition
                    </label>
                </div>  
                    </div>
                     <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="emergency" id="emergency"  >
                    <label class="form-check-label" for="emergency">
                    Emergency Contact
                    </label>
                </div>  

                    </div>
                     <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="academic" id="academic"  >
                    <label class="form-check-label" for="academic">
                    Academic Background
                    </label>
                </div>  

                    </div>
                    <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="presentation" id="Presentation"  >
                    <label class="form-check-label" for="Presentation">
                    Presentation/ Paper/ Abstract Submission
                    </label>
                </div>  

                    </div>
                     <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hotel" id="hotet_checkbox" checked >
                    <label class="form-check-label" for="hotet_checkbox">
                    Hotel
                    </label>
                </div>  

                    </div>
                    <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="event_fess" id="event_fess" checked >
                    <label class="form-check-label" for="event_fess">
                Event Fees
                    </label>
                </div>  

                    </div>
                    <div class="col-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inquired" id="inquired" checked >
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
            <div class="row">
            <div class="col-md-6">
                        <input name="fee_name[]" type="text"  required class="form-control mb-2 count_fuc"
                            placeholder="Name of Event options selection ">
                    </div>
                    <div class="col-md-2">
                        <input name="fee_amount[]" type="number"  required class="form-control mb-2 count_fuc" placeholder="$20">
                    </div>
                    <div class="col-md-2">
                        <input type="button"  class="btn btn-danger removefess " value="Remove" >
                    </div>
            </div>
            
                <div class="" id="res">
                    
                </div>

           
            <div class="col-md-12">
                <button type="button" onclick="add_text_box()" class="btn btn-warning text-white">Add More</button>
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
               
                <div class="row">
                    <div class="col-5">
                    <input name="bed_name[]" type="text" id="bed_name_0"  required class="form-control  section_req"
                                placeholder="Name">
                    </div>
                    <div class="col-2">
                    <input name="bed_price[]" type="number" step="0.01" onkeyup="bed_cal(0)"  id="bed_price_0"  required class="form-control section_req "
                                placeholder="Fee">
                    </div>
                    <div class="col-2">
                    <input name="bed_tax[]" type="number" step="0.01" onkeyup="bed_cal(0)"  id="bed_tax_0"  required class="form-control section_req "
                                placeholder="Tax">
                    </div>
                    <div class="col-2">
                    <input name="bed_totalprice[]" type="number" step="0.01" onkeyup="bed_cal(0)"   id="bed_totalprice_0" required class="form-control section_req"
                                placeholder="Total Amount ">
                    </div>
                    <div class="col-md-1">
                    <input type="button"  class="btn btn-danger removebed " value="Remove" >
                </div>
                </div>
               
                
            <div class="row bed_append">

            </div>
                
                <div class="col-6 mt-2">
                    <button type="button" class="btn btn-warning text-white add_bed">Add Bed</button>
                </div>
                <div class="col-6 mt-2 ">
                <div class="form-check text-right">
                    <input class="form-check-input" type="checkbox" name="meals" id="meals" checked >
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
    <div class="row">
    <div class="col-5">
                <input name="m_name[]" type="text" id="m_name_0" required class="form-control meal_re section_req"
                            placeholder="Name">
                </div>
                <div class="col-2">
                <input name="m_price[]" type="number" step="0.01" onkeyup="meal_cal(0)" id="m_price_0"  required class="form-control meal_re section_req"
                            placeholder="Fee">
                </div>
                <div class="col-2">
                <input name="m_tax[]" type="number" step="0.01" onkeyup="meal_cal(0)"id="m_tax_0"  required class="form-control  meal_re section_req"
                            placeholder="Tax">
                </div>
                <div class="col-2">
                <input name="m_totalprice[]" type="number" step="0.01" onkeyup="meal_cal(0)"  id="m_totalprice_0" required class="form-control meal_re section_req"
                            placeholder="Total Amount ">
                </div>
                <div class="col-md-1">
                    <input type="button"  class="btn btn-danger removemeal " value="Remove" >
                </div>
    </div>

               
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
            <div class="row" id="inquired_field" >
            <div class="col-md-10">
                        <input name="questions[]" type="text"  required class="form-control mb-2 questions"
                            placeholder="Write a question for inquiry">
                    </div>
                    <div class="col-md-2">
                        <input type="button" onclick="$(this).parent().parent().remove();"  class="btn btn-danger" value="Remove" >
                    </div>
            </div>
            
                <div class="" id="append_question">
                    
                </div>

           
            <div class="col-md-12">
                <button type="button" onclick="append_question()" class="btn btn-warning text-white">Add More</button>
            </div>
      </div>
        <div class="col-12 mb-3">
        <p class="msg">Cancelation Policy</p>
            <textarea name="policy" id="policy" cols="30" rows="10">

            </textarea>
     
        </div>
        <div class="col-md-10" style="float: left"></div>
            <div class="col-md-2" style="float: right">
                <button type="submit" class="btn btn-primary">Save Event</button>
            </div>

       
    </div>
</div>
</div>

</div>
</form>

<script>
    $("#hotet_checkbox").on("change", function hotel_toggle() {
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
        var removebed = 1;
        $('.removebed').each(function (i, obj) {
            removebed++;
            });
            // alert(removebed)
        var html = `
        <div class="row mt-2 remove_bed_row">
        <div class="col-5">
                <input name="bed_name[]"   id="bed_name_`+removebed+`" type="text"  required class="form-control section_req "
                            placeholder="Name">
                </div>
                <div class="col-2">
                <input name="bed_price[]"   id="bed_price_`+removebed+`" type="number" step="0.01" onkeyup="bed_cal(`+removebed+`)"  required class="form-control  section_req"
                            placeholder="Fee">
                </div>
                <div class="col-2">
                <input name="bed_tax[]"   id="bed_tax_`+removebed+`" type="number" step="0.01" onkeyup="bed_cal(`+removebed+`)"  required class="form-control  section_req"
                            placeholder="Tax">
                </div>
                <div class="col-2">
                <input name="bed_totalprice[]"    id="bed_totalprice_`+removebed+`" type="number" step="0.01" onkeyup="bed_cal(`+removebed+`)"  required class="form-control section_req"
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



    // bed section end
//  hotel Meal section
$(document).on('click', '.add_meal', function () {
    var removebed = 1;
        $('.removemeal').each(function (i, obj) {
            removebed++;
            });

        var html = `
        <div class="row mt-2 remove_meal_row">
        <div class="col-5">
                <input name="m_name[]"    id="m_name_`+removebed+`" type="text"  required class="form-control section_req  meal_re"
                            placeholder="Name">
                </div>
                <div class="col-2">
                <input name="m_price[]"     id="m_price_`+removebed+`" type="number" step="0.01" onkeyup="meal_cal(`+removebed+`)" required class="form-control  section_req meal_re"
                            placeholder="Fee">
                </div>
                <div class="col-2">
                <input name="m_tax[]"    id="m_tax_`+removebed+`"  type="number" step="0.01" onkeyup="meal_cal(`+removebed+`)" required class="form-control section_req meal_re"
                            placeholder="Tax">
                </div>
                <div class="col-2">
                <input name="m_totalprice[]"    id="m_totalprice_`+removebed+`" type="number" step="0.01" onkeyup="meal_cal(`+removebed+`)" required class="form-control section_req meal_re"
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


    // meal section end
//  event fee section
function add_text_box(){

var html = '<div class="row remove_div">';
    html += '<div class="col-md-6">';
    html += '<input type="text" name="fee_name[]" class="form-control my-2 count_fuc"  placeholder="Event options selection ">';
    html += '</div>';
    html += '<div class="col-md-2">';
    html += '<input type="number"   name="fee_amount[]"  class="form-control my-2 count_fuc"   placeholder="$50">';
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


function single_bad_cost_tax() {
var amt = $("#single_bad_cost").val();
var tax =$("#single_tax").val();
var divsion = 0;
var total_amt =0;
if(tax>0){
divsion = (amt * tax)/100;
total_amt = parseFloat(parseFloat(amt) +parseFloat(divsion));
total_amt = parseFloat(total_amt).toFixed(2);
}
$("#single_total").val(total_amt);
}
function double_bad_cost_tax() {
var amt = $("#double_bad_cost").val();
var tax =$("#double_tax").val();
var divsion = 0;
var total_amt =0;
if(tax>0){
divsion = (amt * tax)/100;
total_amt = parseFloat(parseFloat(amt) +parseFloat(divsion));
total_amt = parseFloat(total_amt).toFixed(2);
}
$("#double_total").val(total_amt);
}
function triple_bad_cost_tax() {
var amt = $("#triple_bad_cost").val();
var tax =$("#triple_tax").val();
var divsion = 0;
var total_amt =0;
if(tax>0){
divsion = (amt * tax)/100;
total_amt = parseFloat(parseFloat(amt) +parseFloat(divsion));
total_amt = parseFloat(total_amt).toFixed(2);
}
$("#triple_total").val(total_amt);
}
function quad_bad_cost_tax() {
var amt = $("#quad_bad_cost").val();
var tax =$("#quad_tax").val();
var divsion = 0;
var total_amt =0;
if(tax>0){
divsion = (amt * tax)/100;
total_amt = parseFloat(parseFloat(amt) +parseFloat(divsion));
total_amt = parseFloat(total_amt).toFixed(2);
}
$("#quad_total").val(total_amt);
}
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