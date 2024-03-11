
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- google translate -->
<style>
    .glow {
        /* border : 13px; */
        /* box-shadow: 0 0 50px 15px rgba(72,171,224,45%); */
        box-shadow: 10px 10px 77px 0px rgba(72, 171, 224, 0.75);
        -webkit-box-shadow: 10px 10px 77px 0px rgba(72, 171, 224, 0.75);
        -moz-box-shadow: 10px 10px 77px 0px rgba(72, 171, 224, 0.75);
    }
    .readonly {pointer-events: none;
    background:#a1a1a147;
    }
</style>
<?php
// echo "<pre>";
// print_r("enrolled");
// print_r($enrolled);
// // print_r("room_add_enroll");
// // print_r($room_add_enroll);
// print_r("events");
// print_r($events);
// print_r("events_fees");
// print_r($events_fees);

// die;
?>
<div id="google_translate_element" style="display: flex; justify-content: center;"></div> <!-- ends -->
<div class="container" id="athlete">
    <form onsubmit="validation()" enctype="multipart/form-data" method="post"
        action="<?= base_url() ?>Events/edit_events_enroll_process" id="formevent">
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
                                                placeholder="Address"  id="address" value="<?php if (isset($enrolled) && $enrolled[0]["address"] !== '') {
                                                    echo $enrolled[0]["address"];
                                                } ?>">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <label for="" class="form-label">Address 2</label>
                                    <input name="address2" type="text" class="form-control form1"
                                        placeholder="Address 2"  value="<?php if (isset($enrolled) && $enrolled[0]["address2"] !== '') {
                                            echo $enrolled[0]["address2"];
                                        } ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">City</label>
                                    <input name="city" type="text" class="form-control form1" placeholder="City"
                                         id="city" value="<?php if (isset($enrolled) && $enrolled[0]["city"] !== '') {
                                            echo $enrolled[0]["city"];
                                        } ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">State</label>
                                    <input name="state" type="text" class="form-control form1" placeholder="State"
                                         id="state" value="<?php if (isset($enrolled) && $enrolled[0]["state"] !== '') {
                                            echo $enrolled[0]["state"];
                                        } ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">Zip</label>
                                    <input name="zip" type="number" class="form-control form1" placeholder="Zip"
                                         id="zip" value="<?php if (isset($enrolled) && $enrolled[0]["zip"] !== '') {
                                            echo $enrolled[0]["zip"];
                                        } ?>">
                                </div>
                                <div class="col-md-4 ">
                                    <label for="" class="form-label">Country</label>
                                    <select id="country" name="country" required class="form-control form1">
                <option value="">Select Your Country</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
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
                                        } ?>"  class="form-control form1" placeholder=""  id="health">
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Dietary Choices</label>
                                    <input name="dietary"  value="<?php if (isset($enrolled) && $enrolled[0]["dietary"] !== '') {
                                            echo $enrolled[0]["dietary"];
                                        } ?>" type="text" class="form-control form1" placeholder="Vegetarian/allergic/Hui diet
                                    "  id="dietary">
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
                                         id="emg_contact_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Emergency Contact Relationship</label>
                                    <input name="emg_contact_relation"  value="<?php if (isset($enrolled) && $enrolled[0]["emg_contact_relation"] !== '') {
                                            echo $enrolled[0]["emg_contact_relation"];
                                        } ?>" type="text" class="form-control form1"
                                        placeholder="Emergency Contact Relationship"  id="emg_contact_relation">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Emergency Phone Number</label>
                                    <input name="emg_contact"   type="text"  value="<?php if (isset($enrolled) && $enrolled[0]["emg_contact"] !== '') {
                                            echo $enrolled[0]["emg_contact"];
                                        } ?>" class="form-control form1" placeholder="Emergency Phone Number"
                                         id="emg_contact">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Emergency Email Address</label>
                                    <input name="emg_contact_email"   type="email"  value="<?php if (isset($enrolled) && $enrolled[0]["emg_contact_email"] !== '') {
                                            echo $enrolled[0]["emg_contact_email"];
                                        } ?>" class="form-control form1" placeholder="Emergency Email Address"
                                         id="emg_contact_email">
                                </div>
                                <?php } ?>
                                <div class="col-md-12 d-flex justify-content-end my-2">
                                    <button type="button" class="btn btn-outline-success mx-3" onclick="save('form1')">Save</button>
                                    <button type="button" class="btn btn-outline-warning" onclick="edit('form1')">Edit</button>
                                </div>
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
                                        } ?>" class="form-control form2" placeholder="" >
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="" class="form-label">Position</label>
                                <input name="position" type="text"  value="<?php if (isset($enrolled) && $enrolled[0]["position"] !== '') {
                                            echo $enrolled[0]["position"];
                                        } ?>" class="form-control form2" placeholder="" >
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="" class="form-label">Professional Title
                                </label>
                                <input name="ptitle" type="text"  value="<?php if (isset($enrolled) && $enrolled[0]["ptitle"] !== '') {
                                            echo $enrolled[0]["ptitle"];
                                        } ?>" class="form-control form2" placeholder="" >
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="" class="form-label">Research Field/Major
                                </label>
                                <input name="major" type="text"  value="<?php if (isset($enrolled) && $enrolled[0]["major"] !== '') {
                                            echo $enrolled[0]["major"];
                                        } ?>" class="form-control form2" placeholder="" >
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="" class="form-label">Website</label>
                                <input name="websites" type="text"  value="<?php if (isset($enrolled) && $enrolled[0]["websites"] !== '') {
                                            echo $enrolled[0]["websites"];
                                        } ?>" class="form-control form2" placeholder="" >
                            </div>


                            <div class="col-md-12 mt-2">
                                <label for="biodoc" class="form-label">Academic Background or Short bio
                                </label>
                                <!-- <input name="biodoc" type="file" accept="image/*" class="form-control form2" id="biodoc"
                                    required> -->
                                <textarea name="biodoc" id="biodoc" cols="30" rows="10" class="form-control form2"
                                    placeholder="Short Bio Here"> <?php if (isset($enrolled) && $enrolled[0]["biodoc"] !== '') {
                                            echo $enrolled[0]["biodoc"];
                                        } ?></textarea>
                            </div>

                            <!-- <div class="col-md-4 d-flex justify-content-end align-items-center flex-column">
                                <div class="d-flex align-items-center justify-content-center ">
                                    <label for="biodoc" class="btn btn-rounded text-white mx-2"><i
                                            class="fa-solid fa-upload"></i></label>
                                    <button type="button" onclick="document.getElementById('biodoc').value = '';"
                                        class="btn btn-rounded2 text-white"><i class="fa-solid fa-trash"></i></button>
                                </div>

                            </div> -->
                            <?php /*  <div class="col-md-6 d-flex justify-content-start align-items-center">
                             <a href="<?= base_url() ?>Events/enroll/1/step2"
                             class="btn-warning btn mt-3 text-white">Edit Previous Form</a>
                             </div>
                             <div class="col-md-6 d-flex justify-content-end">
                             <input type="submit" value="submit" class="btn btn-choose text-white mt-3 disabled"
                             id="submit2">
                             </div>*/?>
                              <div class="col-md-12 d-flex justify-content-end my-2">
                                    <button type="button" class="btn btn-outline-success mx-3" onclick="save('form2')">Save</button>
                                    <button type="button" class="btn btn-outline-warning" onclick="edit('form2')">Edit</button>
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
                        <div class="col-md-8">
                            <label for="file1" class="form-label">for Doc / PPT / PDF /Images file please upload here
                            </label>
                            <input name="docs" type="file" accept=".jgp, .png,.doc, .docx,.ppt, .pptx,.txt,.pdf"
                                class="form-control form3 input_file_leb" id="file1" onchange="test()">
                                <div class="progress-wrap progress"  id="progress-wrap-1"  data-progress-percent="100">
                                    <div class="progress-bar progress"></div>
                                </div>
                        </div>

                        <div class="col-md-4 d-flex justify-content-end align-items-center flex-column">
                            <div class="d-flex align-items-center justify-content-center ">
                                <label for="file1" class="input_file_leb btn btn-rounded text-white mx-2"><i
                                        class="fa-solid fa-upload"></i></label>
                                <button type="button" onclick="document.getElementById('file1').value = '';$('#document_show').attr('data',''));resetProgressBar('progress-wrap-1');"
                                    class="btn btn-rounded2 text-white input_file_leb"><i class="fa-solid fa-trash"></i></button>
                                    <button type="button" class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
  Show doc
</button>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <label for="file2" class="form-label">Need upload videos Mp4 or Mov
                            </label>
                            <input name="videos" type="file" accept="video/mp4,video/x-m4v,video/*" class="input_file_leb form-control form3"
                                id="file2" onchange="test()">
                                <div class="progress-wrap progress"  id="progress-wrap-2"  data-progress-percent="100">
                                    <div class="progress-bar progress"></div>
                                </div>
                        </div>

                        <div class="col-md-4 d-flex justify-content-end align-items-center flex-column">
                            <div class="d-flex align-items-center justify-content-center ">
                                <label for="file2" class="btn btn-rounded input_file_leb text-white mx-2"><i
                                        class="fa-solid fa-upload"></i></label>
                                <button type="button" onclick="document.getElementById('file2').value = '';$('#video_show').attr('src',''));resetProgressBar('progress-wrap-2');"
                                    class="btn btn-rounded2 text-white input_file_leb"><i class="fa-solid fa-trash"></i></button>
                                    <button type="button" class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  show video
</button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label for="file3" class="form-label">Upload Audio Mp3  
                            </label>
                            <input name="audio" type="file" accept="audio/mp3,audio/*;capture=microphone" class="input_file_leb form-control form3"
                                id="file3" onchange="test()">
                                <div class="progress-wrap progress"  id="progress-wrap-3"  data-progress-percent="100">
                                    <div class="progress-bar progress"></div>
                                </div>
                        </div>

                        <div class="col-md-4 d-flex justify-content-end align-items-center flex-column">
                            <div class="d-flex align-items-center justify-content-center ">
                                <label for="file3" class="btn btn-rounded input_file_leb text-white mx-2"><i
                                        class="fa-solid fa-upload"></i></label>
                                <button type="button" onclick="document.getElementById('file3').value = '';$('#audio_show').attr('src','');resetProgressBar('progress-wrap-3');"
                                    class="btn btn-rounded2 text-white input_file_leb"><i class="fa-solid fa-trash"></i></button>
                                    <button type="button" class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
  show Audio
</button>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end my-2">
                                    <button type="button" class="btn btn-outline-success mx-3" onclick="save('form3')">Save</button>
                                    <button type="button" class="btn btn-outline-warning" onclick="edit('form3')">Edit</button>
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
                                            <button type="button" class="btn btn-danger  remove_room_person_del" ids="<?= $enroll_room_person->id ?>"  >Remove Person</button>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="col-md-12 my-2">
                                    <button type="button" class="btn_hotel btn btn-add" onclick="add_room_person(<?= $enroll_room->id ?>)">Add
                                        Person</button>
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
                                            <input type="date"  min='<?php echo date("Y-m-d") ;?>' class=" form-control form4" onchange="total_date(<?= $enroll_room->id ?>)"
                                                name="up_checkin[<?= $enroll_room->id ?>]" id="checkin_<?= $enroll_room->id ?>" placeholder="" value="<?= $enroll_room->checkin ?>" required>

                                        </div>
                                        <div class="col-md-4 mb-1">
                                            <label for="validationTooltip<?= $enroll_room->id ?>2">Check out Date</label>
                                            <input type="date"  min='<?php echo date("Y-m-d") ;?>' class=" form-control form4" onchange="total_date(<?= $enroll_room->id ?>)"
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
                                        <button type="button" class="btn_hotel btn btn-danger remove_room_del" ids="<?= $enroll_room->id ?>"  >Remove Room</button>
                                        </div>
                            </div>
                            


                            <?php } ?>
                            <!-- End come from backend -->
                           
                            
                        </div>
                        
                        <div class="col-md-12 text-center">
                            <div>
                                <button type="button" class="btn_hotel btn btn-outline-secondary " onclick="add_room()">Add
                                    Room</button>
                                </div>
                                
                            </div>
                            <div class="col-md-12 d-flex justify-content-end my-2">
                                <button type="button" class="btn btn-outline-success mx-3" onclick="save('form4')">Save</button>
                                <button type="button" class="btn btn-outline-warning" onclick="edit('form4')">Edit</button>
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
                                        } ?>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input form5 checkboxval"  <?php if(array_key_exists($row->id,$array)){ echo "checked"; }?>  type="checkbox" onchange="calculation('abc')"
                                            name="event_enroll[<?php echo $row->id; ?>]" value="<?php echo $row->amount; ?>"
                                            id="event_enroll_<?php echo $row->id; ?>" >
                                        <label class="form-check-label" for="event_enroll_<?php echo $row->id; ?>">
                                            <?php echo $row->fees_name . ' $' . $row->amount; ?>
                                        </label>
                                    </div>
                                </div>
                            <?php } ?>


                          
                            <div class="col-md-12 d-flex justify-content-end my-2">
                                    <button type="button" class="btn btn-outline-success mx-3" onclick="save('form5')">Save</button>
                                    <button type="button" class="btn btn-outline-warning" onclick="edit('form5')">Edit</button>
                                </div>
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
                            $sql = "SELECT * FROM questions where event_id = ".$events[0]["id"];
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


                          
                            <div class="col-md-12 d-flex justify-content-end my-2">
                                    <button type="button" class="btn btn-outline-success mx-3" onclick="save('form6')">Save</button>
                                    <button type="button" class="btn btn-outline-warning" onclick="edit('form6')">Edit</button>
                                </div>
                                <!-- section 5 ends here -->
                        </div>
                        <?php } ?>
                        <div class="row">
                            
                            <div class="col-md-12 text-danger">
                                <h5>Note: </h5>
                                    <p class="mx-3 fs-6 text-danger my-2">
                                    If you need any modifications or updates after you submit, please contact us at:  
                                     <a class="text-dark" href="mailto:Forum@wtjsf.org"
                                            class="web-anchor">Forum@wtjsf.org</a>
                                            or
                                            <a  class="text-dark" href="mailto:info@gowushu.com"
                                            class="web-anchor">info@gowushu.com</a>
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

                                <input type="submit" class="btn btn-choose text-white" id="pay_btn" value="Update" >
                                <!-- <button type="submit" class="btn btn-choose text-white">Pay now</button>  -->
                            </div>
   
</div>
<?php     } else{ ?>
    <div class="row">
                            
                            <div class="col-md-12">

                                <input type="submit" class="btn btn-choose text-white" id="pay_btn" value="Update" >
                              
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
</form>
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
      <!-- <div class="modal-footer"> -->
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      <!-- </div> -->
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
      $(document).ready(function () {
     
        hotel_enroll_req();

        <?php if (isset($enrolled) && $enrolled[0]["country"] !== '') {
       echo '$("#country").val("'.$enrolled[0]["country"].'");';
                                        } ?>
  });
 
   
    // function remove_room_person(id) {
    //     // $(this).parent().parents(".person").remove();

    //     console.log($(this).parent());
    //     // alert("sadsa")
    // }
    // function remove_room() {

    //     // alert("sadsa")
    //     // $(this).parent().parents(".room_of_hotel").remove();
    //     console.log($(this).parent());
    // }
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
    $(document).on('click', '.remove_room_del', function () {
        var id = $(this).attr('ids');
         $(this).parent().parent().remove();
        $.ajax({
            url: "<?= base_url() ?>Events/remove_room_del",
            type: "POST",
            data: {id : id},
            dataType: "text"
            });

            request.done(function(msg) {
            if(msg == "true"){

               
        var event_enroll = parseFloat($("input[name='event_enroll']:checked").val());
        if (isNaN(event_enroll)) { event_enroll = 0 }
        var total_cost = 0;
        $('.room_cost').each(function (i, obj) {
            total_cost += $(this).val()
        });
        total_cost = event_enroll + total_cost
        console.log(total_cost);
        $("#full_total_amt").val(total_cost)

        $('.room_cost').each(function (i, obj) {
            total_cost += isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val());
        });
        total_cost = event_enroll + total_cost
        total_cost = (total_cost).toFixed(2);
        console.log(total_cost);
        $("#full_total_amt").val(total_cost)

            }
            });

            request.fail(function(jqXHR, textStatus) {
            });


    });
    $(document).on('click', '.remove_room_person', function () {
        $(this).parent().parent().remove();
        // var id = $(this).attr('ids');
        var id = $(this).attr('data-room');
        // console.log("SAdadsa"+id);
        calculation(id);
    });
    
    $(document).on('click', '.remove_room', function () {
        $(this).parent().parent().remove();
        var event_enroll = parseFloat($("input[name='event_enroll']:checked").val());
        if (isNaN(event_enroll)) { event_enroll = 0 }
        var total_cost = 0;
        $('.room_cost').each(function (i, obj) {
            total_cost += $(this).val()
        });
        total_cost = event_enroll + total_cost
        console.log(total_cost);
        $("#full_total_amt").val(total_cost)

        $('.room_cost').each(function (i, obj) {
            total_cost += isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val());
        });
        total_cost = event_enroll + total_cost
        total_cost = (total_cost).toFixed(2);
        console.log(total_cost);
        $("#full_total_amt").val(total_cost)
    });


    function add_room() {
        var counter = 0;
        $('.hotel_room_append').each(function (i, obj) {
            counter = counter + 1;
        });
        //     counter = counter + 1;
        //     var html = `
        //   <div class="room_of_hotel">`
        //       counter=i
        // });
        // counter = counter + 1;
        var html = `
<div class="room_of_hotel row">
<div class="col-md-6 d-flex align-items-center hotel_room_append">
                        

                  </div>
                 
                      <hr>
                      <div class="col-md-4  my-3">
                          <div class="rooms">
                              Room <span> ` + (counter + 1) + `</span>
                          </div>
                      </div>
                      <div class="col-md-8 d-flex align-items-center" id="Rooms_bed">
                      <?php
                            $sql = "SELECT * FROM bed_setup where event_id="  .$events[0]["id"];
                            $query = $this->db->query($sql);
                            $count = 0;
                            foreach ($query->result() as $row) { ?>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input form4" type="radio"  onchange="calculation(` + counter + `)"
                                            name="bed_charges[` + counter + `]" value="<?php echo $row->totalprice; ?>"
                                            id="bed_<?php echo $row->id; ?>_` + counter + `" required>
                                        <label class="custom-control-label" for="bed_<?php echo $row->id; ?>_` + counter + `">
                                            <?php echo $row->name; ?>
                                        </label>
                                    </div>
                            <?php } ?>
                     
                  </div>

                  <div class="row" id="append_person_` + counter + `">

                 
                  <!-- second row #   -->
                  <div class="col-md-2 my-2 " id="form">
                      <label for="" class="form-label">Person Type:</label>
                      <select name="person_type[` + counter + `][]"  required class="form-control form4" id="person_type">
                          <option value="Adult">Adult</option>
                          <option value="Child">Child</option>
                      </select>
                  </div>
                  <div class="col-md-4 my-2" id="form">
                      <label for="" class="form-label">First Name:</label>
                      <input type="text" name="fname[` + counter +
          `][]"  required class="form-control form4 class_check_` + counter + `" placeholder="First Name">
                  </div>
                  <div class="col-md-4 my-2" id="form">
                      <label for="" class="form-label">Last Name:</label>
                      <input type="text" name="lname[` + counter + `][]"  required class="form-control form4" placeholder="Last Name">
                  </div>
                  <div class="col-md-2 my-2" id="form">
                      <label for="" class="form-label">Age:</label>
                      <input type="number" name="age[` + counter + `][]"  required class="form-control form4" placeholder="21">
                  </div>
               </div>
                  <div class="col-md-12 my-2">
                      <button class="btn btn-add  "  type="button" onclick="add_room_person(` + counter + `)">Add Person</button>
                  </div>
                  <div class="col-md-4 my-3 d-flex align-items-center">
                  <?php
                            $sql = "SELECT * FROM meals_setup where event_id=" .$events[0]["id"];
                            $query = $this->db->query($sql);
                            $count = 0;
                            foreach ($query->result() as $row) { ?>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input form4" type="radio"  onchange="calculation(` + counter + `)"
                                            name="meals[` + counter + `]" value="<?php echo $row->totalprice; ?>"
                                            id="meal_<?php echo $row->id; ?>_` + counter + `" required>
                                        <label class="custom-control-label  " for="meal_<?php echo $row->id; ?>_` + counter + `">
                                            <?php echo $row->name; ?>
                                        </label>
                                    </div>
                            <?php } ?>
                     
                  </div>
                  <div class="col-md-8 my-3">
                      <div class="row">
                          <div class="col-md-4 mb-3">
                              <label for="validationTooltip` + counter + `1">Check in Date</label>
                              <input type="date" class="form-control form4"  min='<?php echo date("Y-m-d") ;?>' onchange="total_date(` + counter +
          `)" name="checkin[` + counter + `]" id="checkin_` + counter + `" placeholder=""
                                  value="" required>

                          </div>
                          <div class="col-md-4 mb-3">
                              <label for="validationTooltip` + counter + `2">Check out Date</label>
                              <input type="date" class="form-control form4"   min='<?php echo date("Y-m-d") ;?>' onchange="total_date(` + counter +
          `)" name="checkout[` + counter + `]" id="checkout_` + counter + `" placeholder="Last name"
                                  value="" required>

                          </div>
                          <div class="col-md-4 mb-3">
                              <label for="validationTooltip` + counter + `2">Total Nights</label>
                              <input type="number" class="form-control form4" readonly  onchange="calculation(` + counter +
          `)" name="tnight[` + counter + `]" id="tnight_` + counter +
          `" placeholder=""
                                  value="" required>

                          </div>
                      </div>
                  </div>
                  <div class="col-md-12 d-flex justify-content-center my-4">
                      <div>
                          <p class="total">Total Price <input type="number" class="form-control form4 room_cost" readonly  name="room_cost[]" id="room_price_` + counter + `"></p>

                      </div>
                  </div>
                  <div class="col-md-2 my-2" >
                  <button type="button" class="btn_hotel btn btn-danger remove_room  "  onclick="remove_room()">Remove Room</button>
                  </div>
                  </div>
                  </div>

`;
      $("#hotel_append").append(html)
  }

  function add_room_person(room_id) {
      var html = `
<div class="row person" data-ids="1">
                  <div class="col-md-2 my-2 " id="form">
                      <select name="person_type[` + room_id + `][]"  required class="form-control form4" id="person_type">
                          <option value="Adult">Adult</option>
                          <option value="Child">Child</option>
                      </select>
                  </div>
                  <div class="col-md-3 my-2" id="form">
                      <input type="text" name="fname[` + room_id +
          `][]"  required class="form-control form4 class_check_` + room_id + `" placeholder="First Name">
                  </div>
                  <div class="col-md-3 my-2" id="form">
                      <input type="text" name="lname[` + room_id + `][]"  required class="form-control form4" placeholder="Last Name">
                  </div>
                  <div class="col-md-2 my-2" id="form">
                      <input type="number" name="age[` + room_id + `][]"  required class="form-control form4" placeholder="21">
                  </div>
                  <div class="col-md-2 my-2" id="form">
                  <button type="button" class="btn_hotel btn btn-danger remove_room_person  " data-room='` + room_id +
          `' onclick="remove_room_person(` + room_id + `)">Remove Person</button>
                  </div>
                  </div>
`;
      $("#append_person_" + room_id).append(html)
      calculation(room_id);
  }

    function total_date(id) {

        var date1 = new Date($("#checkin_" + id).val());
        var date2 = new Date($("#checkout_" + id).val());
        if (date1 != "" && date2 != "") {
            // To calculate the time difference of two dates
            var Difference_In_Time = date2.getTime() - date1.getTime();

            // To calculate the no. of days between two dates
            var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
            $("#tnight_" + id).val(Difference_In_Days)
            calculation(id)
        }
    }

 
    function calculation(id) {
        var event_enroll = 0;
        var bed_charges = parseFloat($("input[name='bed_charges[" + id + "]']:checked").val());
        var tnight = parseFloat($("input[name='tnight[" + id + "]']").val());
        var meals = parseFloat($("input[name='meals[" + id + "]']:checked").val());
        
        if (isNaN(bed_charges)) {
            bed_charges = 0
        }
        if (isNaN(tnight)) {
            tnight = 0
        }
        if (isNaN(meals)) {
            meals = 0
        }
        $('.checkboxval').each(function (i, obj) {
                if (this.checked) {
                    event_enroll += parseFloat(this.value)    
                }
            });
        if (isNaN(event_enroll)) {
            event_enroll = 0
        }
        var roomcost = 0;
        var person = 0;
        if (id != "abc") {
            $('.class_check_' + id).each(function (i, obj) {
                person++;
            });
            person = person < 0 ? 0 : person;
            // console.log(person)


            // console.log("bed_charges = " + bed_charges);
            // console.log("meals =" + meals);
            // console.log("tnight =" + tnight);
            if (tnight == 0) {
                tnight = 1;
            }
            roomcost = (bed_charges * tnight) + (person * meals)
            roomcost = (roomcost).toFixed(2);

            $("#room_price_" + id).val(roomcost);
        }

        var total_cost = 0;
        $('.room_cost').each(function (i, obj) {
            total_cost += isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val());
        });
        total_cost = event_enroll + total_cost
        // console.log(total_cost);
        $("#full_total_amt").val(total_cost)

        var total_cost = 0;
        $('.room_cost').each(function (i, obj) {
            total_cost += isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val());
        });
        total_cost = event_enroll + total_cost
        total_cost = (total_cost).toFixed(2);
        // console.log(total_cost);
        $("#full_total_amt").val(total_cost)
    }



    // calculation
    // function calculation(id) {
    //    var event_enroll = parseFloat($("input[name='event_enroll']:checked").val());
    //     if(id!="abc"){
    //         var bed_charges =  $("input[name='bed_charges["+id+"]']:checked").val();
    //         var tnight =  $("input[name='tnight["+id+"]']").val();
    //         var person = 1;
    //         $("input[name='tnight["+id+"]']").each(function(i, obj) {
    //             person++; 
    // });
    //    var meals = $("input[name='meals["+id+"]']").is(":checked")? parseFloat($("#meals_price").val()) : 0;
    //    var breaKfast = $("input[name='breaKfast["+id+"]']").is(":checked")? parseFloat($("#brkfst_price").val()) : 0;
    //    console.log("bed_charges = "+bed_charges);
    //    console.log("breaKfast ="+breaKfast);
    //    console.log("meals ="+meals);

    //    $("#room_price_"+id).val();
    //     }
    //    console.log("event_enroll "+event_enroll);
    // //    console.log();
    // //    console.log();
    //    var total_cost = 0;
    //    $('.room_cost').each(function(i, obj) {
    //     total_cost += $(this).val()
    // });
    //    console.log(total_cost);
    // $("#full_total_amt").val(total_cost)
    // }
    // calculation off
    function clicktoggle(id) {
        // let f_star = $("#f_star_"+id);
        // let t_star = $("#t_star_"+id);

        let f_star = document.getElementById("f_star_" + id)
        let t_star = document.getElementById("t_star_" + id)
        // alert(t_star)
        f_star.classList.toggle("glow")
        t_star.classList.remove("glow")
    }

    function clicktoggle2(id) {

        // let f_star = $("#f_star_"+id);
        // let t_star = $("#t_star_"+id);
        let f_star = document.getElementById("f_star_" + id)
        let t_star = document.getElementById("t_star_" + id)
        t_star.classList.toggle("glow")
        f_star.classList.remove("glow")
    }
function edit(name) {
    // alert(name)
    $("."+name).removeClass("readonly")
    if (name == "form4") {
            $('.custom-control-label').attr("style", "");
            $('.hotel').attr("style", "");
            $('.btn_hotel').attr("style", "");
    }
    if(name == "form3"){
        $('.input_file_leb').attr("style", "");
    }
    if(name == "form5"){
        $('.form-check-input').attr("style", "");
        $('.form-check-label').attr("style", "");
    }
    // if (name == "form1" || name == "form3" ||name == "form4" ||name == "form5") {
    //         $('.'+name+'_file_leb').attr("style", "");
    // }
    
}

function hotel_enroll_req() {
     var val = $("input[name='hotel_enroll']:checked").val()
     if(val == 0){
        console.log("welcome1");
         $(".form4").removeAttr("required");
     }else{
         $(".form4").attr("required") ;
         console.log("welcome");
     }
    
    }  

function save(name) {
    // alert(name)
    $("."+name).addClass("readonly")
    if (name == "form4") {
            $('.custom-control-label').attr("style", "pointer-events: none;");
            $('.hotel').attr("style", "pointer-events: none;");
            $('.btn_hotel').attr("style", "pointer-events: none;");
    }
    if(name == "form3"){
        $('.input_file_leb').attr("style", "pointer-events: none;");
    }
    if(name == "form5"){
        $('.form-check-input').attr("style", "pointer-events: none;");
        $('.form-check-label').attr("style", "pointer-events: none;");
    }
    // if (name == "form1" || name == "form3" ||name == "form4" ||name == "form5") {
    //         $('.'+name+'_file_leb').attr("style", "pointer-events: none;");
    // }
    
}  
imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }

  
  function moveProgressBar(barId) {
    console.log("moveProgressBar");

    var $progressWrap = $('#' + barId);
    var getPercent = $progressWrap.data('progress-percent') / 100;
    var getProgressWrapWidth = $progressWrap.width();
    var progressTotal = getPercent * getProgressWrapWidth;
   
    var animationLength = 1000;
    if (barId =="progress-wrap-2") {
    animationLength = 7000;
    } 
    if (barId =="progress-wrap-3") {
    animationLength = 2500;
    }
    

    // Animate the progress bar movement
    $('#' + barId + ' .progress-bar').animate({
        left: progressTotal
    }, animationLength);
}
function resetProgressBar(barId) {
    var $progressWrap = $('#' + barId);
    var $progressBar = $progressWrap.find('.progress-bar');
    
    // Reset the progress bar to 0
    $progressBar.css('left', 0);
}
$('#file1').on('change', function() {
    moveProgressBar('progress-wrap-1');
            $("#document_show").attr("data",URL.createObjectURL(this.files[0]));
    //         $("#staticBackdrop2").modal("show")
     });
     $('#file2').on('change', function() {
         
              
        moveProgressBar('progress-wrap-2');
            // console.log(URL.createObjectURL(this.files[0]));
            $("#video_show").attr("src",URL.createObjectURL(this.files[0]));
            // $("#staticBackdrop").modal("show")
     });
     $('#file3').on('change', function() {
       
                moveProgressBar('progress-wrap-3');
            // console.log(URL.createObjectURL(this.files[0]));
            sound = $("#audio_show").attr("src",URL.createObjectURL(this.files[0]));
            // $("#staticBackdrop3").modal("show");
       
     });

</script>

<script src="<?=base_url()?>assets/js/sidebar.js"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
  integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

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
  </script>
</body>

</html>
