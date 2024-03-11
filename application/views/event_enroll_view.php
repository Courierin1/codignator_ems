<style>
    .glow {
        box-shadow: 10px 10px 77px 0px rgba(72, 171, 224, 0.75);
        -webkit-box-shadow: 10px 10px 77px 0px rgba(72, 171, 224, 0.75);
        -moz-box-shadow: 10px 10px 77px 0px rgba(72, 171, 224, 0.75);
    }
    .readonly {pointer-events: none;
    background:#a1a1a147;
    }
    .form-control,.form-select,.form-check-input,.custom-control-input
    {pointer-events: none;}
</style>
<div id="google_translate_element" style="display: flex; justify-content: center;"></div> <!-- ends -->
<div class="container" id="athlete">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center my-4">
                        Event title:
                        <?= $events[0]["event_name"] ?>
                    </h1>
                </div>

            </div>
            
        <?php if (isset($events) && $events[0]["instruction"] !== '') { ?>
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="bg-theme p-3">
                        <h3 class="text-white"> Signup Instruction
                        </h3>
                    </div>
                </div>
                <div class="col-md-12">
                <?= $events[0]["instruction"] ?>
                </div>
            </div>
            
            <?php } ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-theme p-3">
                        <h3 class="text-white">Individual information
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
           
                <div class="col-md-12">
                    <div class="form-card mt-3">
                        <div class="row">

                        <input value="<?= $enrolled[0]["event_id"] ?>" type="hidden" name="event_id">
                            <input value="<?= $enrolled[0]["id"] ?>" type="hidden" name="enroll_id">
                            <div class="row">

                                <div class="col-md-2">
                                    <img id="blah" src="<?php if (isset($enrolled) && $enrolled[0]["profile_image"] != '') {
                                        echo base_url() . $enrolled[0]["profile_image"];
                                    } ?>" alt="" class="img-fluid">
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input  name="profile_image" accept="image/*" id="imgInp" type="file"
                                                class="form-control form1 " placeholder="Choose athlete image">
                                            <small>For best results, please use .png or .jpg files</small>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="" class="form-label ">First Name*</label>
                                            <input value="<?php if (isset($enrolled) && $enrolled[0]["first_name"] !== '') {
                                                echo $enrolled[0]["first_name"];
                                            } ?>" name="first_name" type="text" class="form-control form1"
                                                placeholder="First Name" required id="fname">
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="" class="form-label">Last Name*</label>
                                            <input value="<?php if (isset($enrolled) && $enrolled[0]["first_name"] !== '') {
                                                echo $enrolled[0]["last_name"];
                                            } ?>" name="last_name" type="text" class="form-control form1 "
                                                placeholder="Last Name" required id="lname">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="" class="form-label">Gender*</label>
                                            <select name="gender" id="gender" class="form-select form1" required>
                                                <option value="male" <?= $enrolled[0]["gender"] == "male" ?"selected":""; ?>>Male</option>
                                                <option value="female" <?= $enrolled[0]["gender"] == "female" ?"selected":""; ?>>female</option>
                                                <option value="other" <?= $enrolled[0]["gender"] == "other" ?"selected":""; ?>>Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="" class="form-label">Date of Birth*</label>
                                            <input value="<?php if (isset($enrolled) && $enrolled[0]["dob"] !== '') {
                                                echo $enrolled[0]["dob"];
                                            } ?>" name="dob" type="date" class="form-control form1" id="dob"
                                                placeholder="DD-MM-YYYY" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="" class="form-label">Phone Number*</label>
                                            <input value="<?php if (isset($enrolled) && $enrolled[0]["phone"] !== '') {
                                                echo $enrolled[0]["phone"];
                                            } ?>" name="phone" type="tel" class="form-control form1"
                                                placeholder="Phone number" required id="phone">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="form-label">Email*</label>
                                            <input name="email" type="email" class="form-control form1"
                                                placeholder="email" required id="email" value="<?php if (isset($enrolled) && $enrolled[0]["email"] !== '') {
                                                    echo $enrolled[0]["email"];
                                                } ?>">
                                        </div>


                                        <div class="col-md-8 ">
                                            <label for="" class="form-label">Address</label>
                                            <input name="address" type="text" class="form-control form1"
                                                placeholder="Address" required id="address" value="<?php if (isset($enrolled) && $enrolled[0]["address"] !== '') {
                                                    echo $enrolled[0]["address"];
                                                } ?>">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <label for="" class="form-label">Address 2</label>
                                    <input name="address2" type="text" class="form-control form1"
                                        placeholder="Address 2" required value="<?php if (isset($enrolled) && $enrolled[0]["address2"] !== '') {
                                            echo $enrolled[0]["address2"];
                                        } ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">City</label>
                                    <input name="city" type="text" class="form-control form1" placeholder="City"
                                        required id="city" value="<?php if (isset($enrolled) && $enrolled[0]["city"] !== '') {
                                            echo $enrolled[0]["city"];
                                        } ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">State</label>
                                    <input name="state" type="text" class="form-control form1" placeholder="State"
                                        required id="state" value="<?php if (isset($enrolled) && $enrolled[0]["state"] !== '') {
                                            echo $enrolled[0]["state"];
                                        } ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">Zip</label>
                                    <input name="zip" type="number" class="form-control form1" placeholder="Zip"
                                        required id="zip" value="<?php if (isset($enrolled) && $enrolled[0]["zip"] !== '') {
                                            echo $enrolled[0]["zip"];
                                        } ?>">
                                </div>
                                <div class="col-md-4 ">
                                    <label for="" class="form-label">Country*</label>
                                    <select id="country" name="country" class="form1 form-control">
               
                <option value="" selected ><?php if (isset($enrolled) && $enrolled[0]["country"] !== '') {
                                            echo $enrolled[0]["country"];
                                        } ?></option>
            </select>
                                </div>
<?php if($events[0]["health"]==0){ ?>
                                <div class="col-md-12 mt-2">
                                    <h5>Health Condition :</h5>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Health Condition (If you want us to
                                        know)*</label>
                                    <input name="health" type="text"  value="<?php if (isset($enrolled) && $enrolled[0]["health"] !== '') {
                                            echo $enrolled[0]["health"];
                                        } ?>"  class="form-control form1" placeholder="" required id="health">
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Dietary Choices</label>
                                    <input name="dietary"  value="<?php if (isset($enrolled) && $enrolled[0]["dietary"] !== '') {
                                            echo $enrolled[0]["dietary"];
                                        } ?>" type="text" class="form-control form1" placeholder="Vegetarian/allergic/Hui diet
                                    " required id="dietary">
                                </div>
                                <?php }
                                if($events[0]["emergency"]==0){ ?>
                                <div class="col-md-12 mt-2">
                                    <h5>Emergency Contact: </h5>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Emergency Contact Name</label>
                                    <input name="emg_contact_name"  type="text"  value="<?php if (isset($enrolled) && $enrolled[0]["emg_contact_name"] !== '') {
                                            echo $enrolled[0]["emg_contact_name"];
                                        } ?>" class="form-control form1" placeholder="Emergency Contact Name"
                                        required id="emg_contact_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Emergency Contact Relationship</label>
                                    <input name="emg_contact_relation"  value="<?php if (isset($enrolled) && $enrolled[0]["emg_contact_relation"] !== '') {
                                            echo $enrolled[0]["emg_contact_relation"];
                                        } ?>" type="text" class="form-control form1"
                                        placeholder="Emergency Contact Relationship" required id="emg_contact_relation">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Emergency Phone Number</label>
                                    <input name="emg_contact"   type="text"  value="<?php if (isset($enrolled) && $enrolled[0]["emg_contact"] !== '') {
                                            echo $enrolled[0]["emg_contact"];
                                        } ?>" class="form-control form1" placeholder="Emergency Phone Number"
                                        required id="emg_contact">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Emergency Email Address</label>
                                    <input name="emg_contact_email"   type="email"  value="<?php if (isset($enrolled) && $enrolled[0]["emg_contact_email"] !== '') {
                                            echo $enrolled[0]["emg_contact_email"];
                                        } ?>" class="form-control form1" placeholder="Emergency Email Address"
                                        required id="emg_contact_email">
                                </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                        <?php if($events[0]["academic"]==0){ ?>
                        <!-- section 1 end here    -->
                        <div class="row my-3">
                            <div class="col-md-12">
                                <div class="bg-theme p-3">
                                    <h3 class="text-white"> Academic Background
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 mt-2">
                                <label for="" class="form-label">Institution/Group
                                </label>
                                <input name="grouping" type="text"  value="<?php if (isset($enrolled) && $enrolled[0]["grouping"] !== '') {
                                            echo $enrolled[0]["grouping"];
                                        } ?>" class="form-control form2" placeholder="" required>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="" class="form-label">Position</label>
                                <input name="position" type="text"  value="<?php if (isset($enrolled) && $enrolled[0]["position"] !== '') {
                                            echo $enrolled[0]["position"];
                                        } ?>" class="form-control form2" placeholder="" required>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="" class="form-label">Professional Title
                                </label>
                                <input name="ptitle" type="text"  value="<?php if (isset($enrolled) && $enrolled[0]["ptitle"] !== '') {
                                            echo $enrolled[0]["ptitle"];
                                        } ?>" class="form-control form2" placeholder="" required>
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="" class="form-label">Research Field/Major
                                </label>
                                <input name="major" type="text"  value="<?php if (isset($enrolled) && $enrolled[0]["major"] !== '') {
                                            echo $enrolled[0]["major"];
                                        } ?>" class="form-control form2" placeholder="" required>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="" class="form-label">Website</label>
                                <input name="websites" type="text"  value="<?php if (isset($enrolled) && $enrolled[0]["websites"] !== '') {
                                            echo $enrolled[0]["websites"];
                                        } ?>" class="form-control form2" placeholder="" required>
                            </div>


                            <div class="col-md-12 mt-2">
                                <label for="biodoc" class="form-label">Academic Background or Short bio
                                </label>
                              
                                <textarea name="biodoc" id="biodoc" cols="30" rows="10" class="form-control form2"
                                    placeholder="Short Bio Here"> <?php if (isset($enrolled) && $enrolled[0]["biodoc"] !== '') {
                                            echo $enrolled[0]["biodoc"];
                                        } ?></textarea>
                            </div>

                           
                             
                             
                        </div>
                        <!-- section 2 end here -->
                    </div>
                    <?php }
                                if($events[0]["presentation"]==0){ ?>

                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="bg-theme p-3">
                                <h3 class="text-white">Presentation/ Paper/ Abstract Submission
                                </h3>
                            </div>
                        </div>
                    </div>
                    <?php }
                                 ?>
                    <div class="row">
                    <?php if($events[0]["presentation"]==0){ ?>
                        <div class="col-md-8 mb-4">
                            <label for="file1" class="form-label">Doc / PPT / PDF /Images file 
                            </label>
                            </div>

                        <div class="col-md-4 d-flex justify-content-end align-items-center flex-column">
                            <div class="d-flex align-items-center justify-content-center ">
                                
                                    <button type="button" class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
  Show doc
</button>
                            </div>

                        </div>
                        <div class="col-md-8 mb-4">
                            <label for="file2" class="form-label"> Videos Mp4 or Mov
                            </label>
                            </div>

                        <div class="col-md-4 d-flex justify-content-end align-items-center flex-column">
                            <div class="d-flex align-items-center justify-content-center ">
                              <button type="button" class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Show video
</button>
                            </div>
                        </div>
                        
                        <div class="col-md-8 mb-4">
                            <label for="file3" class="form-label">Audio Mp3  
                            </label>
                          
                        </div>

                        <div class="col-md-4 d-flex justify-content-end align-items-center flex-column">
                            <div class="d-flex align-items-center justify-content-center ">
                                    <button type="button" class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
  Show Audio
</button>
                            </div>
                        </div>
                                <?php }
                                 ?>
                        <!-- section 3 end here -->
                        <?php if($events[0]["hotel"]==0){ ?>

                        <div class="row" id="hotel_append">
                            
                        
                        <!-- come from backend -->
<?php
 $sql = "SELECT * FROM room_add_enroll where enroll_id=" .$enrolled[0]["id"];
 $query = $this->db->query($sql);
 $count = 0;
 foreach ($query->result() as $enroll_room) {
    // print_r($enroll_room);
?>

<div class="room_of_hotel row">
                                <div class="col-md-6 d-flex align-items-center hotel_room_append">
                                    <p class="msg2">Choose Official Hotel</p>

                                </div>

                                <div class="col-md-6 d-flex align-items-center hotel_room_append">
                                <div class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input form4" type="radio" onchange="hotel_enroll_req()"
                                            name="hotel_enroll" value="0" <?= $enrolled[0]["hotel_enroll"] == 0 ?"checked":""; ?>
                                            id="hotel_enroll1" >
                                        <label class="custom-control-label" for="hotel_enroll1">
                                           Hotel Not Required
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input form4"  type="radio" onchange="hotel_enroll_req()"
                                            name="hotel_enroll" value="1" <?= $enrolled[0]["hotel_enroll"] == 1 ?"checked":""; ?>
                                            id="hotel_enroll2" >
                                        <label class="custom-control-label" for="hotel_enroll2">
                                           Hotel Required
                                        </label>
                                    </div>
                                </div>

                             
                                <hr>
                                <div class="col-md-4  my-3">
                                    <div class="rooms">
                                        Room <span> 1</span>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex align-items-center" id="Rooms_bed">
                                <?php
                            $sql = "SELECT * FROM bed_setup where event_id=" .$events[0]["id"];
                            $query = $this->db->query($sql);
                            $count = 0;
                            foreach ($query->result() as $row) { ?>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input form4" type="radio"  onchange="calculation(<?= $enroll_room->id ?>)"
                                            name="up_bed_charges[<?= $enroll_room->id ?>]" value="<?php echo $row->totalprice; ?>" <?= $enroll_room->bed_charges == $row->totalprice ?"checked":""; ?>
                                            id="bed_<?php echo $row->id; ?>_<?= $enroll_room->id ?>" required>
                                        <label class="custom-control-label" for="bed_<?php echo $row->id; ?>_<?= $enroll_room->id ?>">
                                            <?php echo $row->name; ?>
                                        </label>
                                    </div>
                            <?php } ?>
                                </div>

                                <div class="row" >
                                <div class="row" >
                                        <!-- second row #   -->
                                        <div class="col-md-2 " id="form">
                                            <label for="" class="form-label">Person Type:</label>
                                        </div>
                                        <div class="col-md-3 " id="form">
                                            <label for="" class="form-label">First Name:</label>
                                            
                                        </div>
                                        <div class="col-md-3 " id="form">
                                            <label for="" class="form-label">Last Name:</label>
                                          
                                        </div>
                                        <div class="col-md-2 " id="form">
                                            <label for="" class="form-label">Age:</label>
                                           
                                        </div>
                                        <div class="col-md-2" id="form">
                                        </div>
                                    </div>
                                    <?php
                                    $sql = "SELECT * FROM room_person where room_id= ".$enroll_room->id ;
                                    $query = $this->db->query($sql);
                                    $count = 0;
                                    foreach ($query->result() as $enroll_room_person) {
                                    //    print_r($enroll_room_person);
                                   ?>
                                    <div class="row person" data-ids="1">
                                        <!-- second row #   -->
                                        <div class="col-md-2 my-2 " id="form">
                                            <select name="up_person_type[<?= $enroll_room->id ?>][<?= $enroll_room_person->id ?>]" class=" form-control form4" required
                                                id="person_type">
                                                <option value="Adult" <?= $enroll_room_person->person_type == "Adult" ?"selected":""; ?>>Adult</option>
                                                <option value="Child" <?= $enroll_room_person->person_type == "Child" ?"selected":""; ?>>Child</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 my-2" id="form">
                                            <input type="text" name="up_fname[<?= $enroll_room->id ?>][<?= $enroll_room_person->id ?>]" value="<?= $enroll_room_person->fname ?>" class=" form-control form4 class_check_<?= $enroll_room->id ?>"
                                                required placeholder="First Name">
                                        </div>
                                        <div class="col-md-3 my-2" id="form">
                                            <input type="text" name="up_lname[<?= $enroll_room->id ?>][<?= $enroll_room_person->id ?>]" value="<?= $enroll_room_person->lname ?>" class=" form-control form4" required
                                                placeholder="Last Name">
                                        </div>
                                        <div class="col-md-2 my-2" id="form">
                                            <input type="number" name="up_age[<?= $enroll_room->id ?>][<?= $enroll_room_person->id ?>]" value="<?= $enroll_room_person->age ?>" class=" form-control form4" required
                                                placeholder="21">
                                        </div>
                                        <div class="col-md-2 my-2" id="form">
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>

                               
                                <div class="col-md-4 my-3 d-flex align-items-center">
                                <?php
                            $sql = "SELECT * FROM meals_setup where event_id="  .$events[0]["id"];
                            $query = $this->db->query($sql);
                            $count = 0;
                            foreach ($query->result() as $row) { ?>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input form4" type="radio" <?= $enroll_room->meal_fess == $row->totalprice ?"checked":""; ?>  onchange="calculation(<?= $enroll_room->id ?>)"
                                            name="up_meals[<?= $enroll_room->id ?>]" value="<?php echo $row->totalprice; ?>"
                                            id="meal_<?php echo $row->id; ?>_<?= $enroll_room->id ?>" required>
                                        <label class="custom-control-label" for="meal_<?php echo $row->id; ?>_<?= $enroll_room->id ?>">
                                            <?php echo $row->name; ?>
                                        </label>
                                    </div>
                            <?php } ?>
                                   
                                </div>
                                <div class="col-md-8  ">
                                    <div class="row">
                                        <div class="col-md-4 mb-1">
                                            <label for="validationTooltip<?= $enroll_room->id ?>1">Check in Date</label>
                                            <input type="date" class=" form-control form4" onchange="total_date(<?= $enroll_room->id ?>)"
                                                name="up_checkin[<?= $enroll_room->id ?>]" id="checkin_<?= $enroll_room->id ?>" placeholder="" value="<?= $enroll_room->checkin ?>" required>

                                        </div>
                                        <div class="col-md-4 mb-1">
                                            <label for="validationTooltip<?= $enroll_room->id ?>2">Check out Date</label>
                                            <input type="date" class=" form-control form4" onchange="total_date(<?= $enroll_room->id ?>)"
                                                name="up_checkout[<?= $enroll_room->id ?>]" id="checkout_<?= $enroll_room->id ?>"  value="<?= $enroll_room->checkout ?>" 
                                                required>

                                        </div>
                                        <div class="col-md-4 mb-1">
                                            <label for="validationTooltip<?= $enroll_room->id ?>2">Total Nights</label>
                                            <input type="number" class=" form-control form4" readonly name="up_tnight[<?= $enroll_room->id ?>]"
                                                value="1" id="tnight_<?= $enroll_room->id ?>" placeholder=""  value="<?= $enroll_room->total_night ?>"  required>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex justify-content-center  ">
                                    <div>
                                        <p class="total">Total Price <input type="number" class=" form-control form4 room_cost"
                                                readonly name="up_room_cost[<?= $enroll_room->id ?>]"  value="<?= $enroll_room->total_price ?>" id="room_price_<?= $enroll_room->id ?>"></p>

                                    </div>
                                    
                                </div>
<div class="col-md-2 my-2" >
                                        </div>
                            </div>
                            


                            <?php } ?>
                            <!-- End come from backend -->
                           
                            
                        </div>
                        
                     
                           
                            <?php }
                            if ($events[0]["event_fee"]==0) {
                                # code...
                        
                                 ?>
                            <!-- section 4 end here -->
                        <div class="row my-3">
                            <div class="col-md-12">
                                <div class="bg-theme p-3">
                                    <h3 class="text-white">Event Options
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM event_fees where event_id=" .$events[0]["id"];
                            $query = $this->db->query($sql);
                            $count = 0;
                            foreach ($query->result() as $row) { 
                                 
                                if (isset($enrolled) && $enrolled[0]["event_enroll"] != "") {
                                    $array = $enrolled[0]["event_enroll"];
                                    $array = (array) json_decode($array);
                                 // die;
                                         }
                                ?>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input form5 checkboxval"  <?php if(array_key_exists($row->id,$array)){ echo "checked"; }?>    type="checkbox" onchange="calculation('abc')"
                                            name="event_enroll" value="<?php echo $row->amount; ?>"
                                            id="event_enroll_<?php echo $row->id; ?>" >
                                        <label class="form-check-label" for="event_enroll_<?php echo $row->id; ?>">
                                            <?php echo $row->fees_name . ' $' . $row->amount; ?>
                                        </label>
                                    </div>
                                </div>
                            <?php } ?>


                          
                                <!-- section 5 ends here -->
                        </div>
                      
                        <?php }
                            if ($events[0]["inquired"]==0) {
                                 ?>
                            <!-- section 4 end here -->
                        <div class="row my-3">
                            <div class="col-md-12">
                                <div class="bg-theme p-3">
                                    <h3 class="text-white">Inquiry Questions
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM questions where event_id =" .$events[0]["id"];
                            $query = $this->db->query($sql);
                            $count = 1;
                            foreach ($query->result() as $row) { 
                                $sql = "SELECT * FROM answers where question_id=" .$row->id." and enroll_id=" .$enrolled[0]["id"]." limit 1";
                                $query = $this->db->query($sql);
                                $rr = $query->first_row();
                                // print_r($rr);
                                if ($rr) {  ?>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <b>Q<?php echo $count++; ?> : <?php echo $row->question; ?></b>
                                       <input type="hidden" name="question_edit[<?php echo $rr->id?>]" value="<?php echo $row->id; ?>"  >
                                       <input type="text" name="answer_edit[<?php echo $rr->id?>]" required value="<?php echo $rr->answer;?>" class=" form-control form6"  >
                                    </div>
                                </div>
                               <?php } else { ?>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <b>Q<?php echo $count++; ?> : <?php echo $row->question; ?></b>
                                       <input type="hidden" name="question[]" value="<?php echo $row->id; ?>"  >
                                       <input type="text" name="answer[]" required class=" form-control form6"  >
                                    </div>
                                </div>
                                    <?php } ?>

                               
                            <?php } ?>


                          
                             
                                <!-- section 5 ends here -->
                        </div>
                        <?php } ?>
                        <div class="row">
                            
                            <div class="col-md-12 text-danger">
                                <h5>Note:</h5>
								<p class="mx-3 fs-6 text-danger my-2">
									After clicking the 'Submit' button, you will not be able to modify the relevant content anymore. If you need to make changes, please contact us at  <a class="text-dark" href="mailto:Forum@wtjsf.org"
                                            class="web-anchor">Forum@wtjsf.org</a> or on WeChat at usahqf
                                    </p>
                                </div>
                            </div>
                        
                        <?php  if ($events[0]["event_fee"]==0 || $events[0]["hotel"]==0) {
                        ?>
                        <div class="row my-3">
                            <div class="col-md-12">
                                <div class="bg-theme p-3">
                                    <h3 class="text-white">Total and Pricing
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p class="total2">Total: <input type="number" value="<?php if (isset($enrolled) && $enrolled[0]["total_amt"] !== '') {
                                            echo $enrolled[0]["total_amt"];
                                        } ?>" readonly name="full_total_amt"
                                        id="full_total_amt"></p>
                            </div>
                            <div class="col-md-12">

   
</div>
<?php     } else{ ?>
    <div class="row">
                            
                            <div class="col-md-12">

                               
                            </div>
   
</div>
<?php } ?>
<div class="row">
<div class="col-md-12" id="cancel">
    <?php if (isset($events) && $events[0]["policy"] !== '') {
                                            echo $events[0]["policy"];
                                        } ?>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-xl  ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Document Show</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <object data="<?= base_url() ?><?php if (isset($enrolled) && $enrolled[0]["docs"] !== '') { echo $enrolled[0]["docs"];} ?>" class="object-fit-none border rounded w-100"  width="400" height="600" id="document_show"></object>
       <!-- <iframe src="" frameborder="0" class="object-fit-none border rounded w-100"  id="document_show"></iframe> -->
      </div>
      <div class="modal-footer">
        <a href="<?= base_url() ?><?php if (isset($enrolled) && $enrolled[0]["docs"] !== '') { echo $enrolled[0]["docs"];} ?>"class="btn btn-secondary" >Download</a>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-xl ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Video Show</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <video controls class="object-fit-none border rounded w-100" id="video_show">
        <source src="<?= base_url() ?><?php if (isset($enrolled) && $enrolled[0]["videos"] !== '') { echo $enrolled[0]["videos"];} ?>" type="video/mp4" />
        </video>
      </div>
      <div class="modal-footer">
        <a href="<?= base_url() ?><?php if (isset($enrolled) && $enrolled[0]["videos"] !== '') { echo $enrolled[0]["videos"];} ?>"class="btn btn-secondary" >Download</a>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-xl ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Audio Show</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <audio controls id="audio_show" class="object-fit-none border rounded w-100">
  <source src="<?= base_url() ?><?php if (isset($enrolled) && $enrolled[0]["audio"] !== '') { echo $enrolled[0]["audio"];} ?>" type="audio/mpeg" >
Your browser does not support the audio element.
</audio>
        
      </div>
    </div>
  </div>
</div>
