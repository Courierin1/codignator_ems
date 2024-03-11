<?php include "./assets/includes/navbar_athlete.php" ?>

<div class="container" id="athlete">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center my-4">
                    Event title: 3rd International Taiji Science Forum
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bg-theme p-3">
                    <h3 class="text-white">Information : Name</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-card mt-3">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="./assets/images/person.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="file" class="form-control" placeholder="Choose athlete image">
                                    <small>For best results, please use .png or .jpg files</small>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="" class="form-label">First Name*</label>
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="" class="form-label">Last Name*</label>
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="" class="form-label">Gender*</label>
                                    <select name="" id="" class="form-select">
                                        <option value="male">Male</option>
                                        <option value="female">female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="" class="form-label">Birthdate*</label>
                                    <input type="date" class="form-control" placeholder="DD-MM-YYYY">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="" class="form-label">Country*</label>
                                    <select name="" id="" class="form-select">
                                        <option value="male">USA</option>
                                        <option value="female">Chine</option>
                                        <option value="other">Australia</option>
                                        <option value="other">Hungary</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 mt-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" class="form-control" placeholder="Address">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="" class="form-label">Address 2</label>
                            <input type="text" class="form-control" placeholder="Address 2">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">City</label>
                            <input type="text" class="form-control" placeholder="City">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">State</label>
                            <input type="text" class="form-control" placeholder="State">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Zip</label>
                            <input type="number" class="form-control" placeholder="Zip">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Phone*</label>
                            <input type="number" class="form-control" placeholder="State">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Email*</label>
                            <input type="email" class="form-control" placeholder="Zip">
                        </div>
                        <div class="col-md-6 my-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                    value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Attend the meeting as a spectator only
                                </label>
                            </div>

                        </div>
                        <div class="col-md-6 my-3 d-flex justify-content-end">
                            <a href="#" class="btn btn-choose text-white">Save and Confirm</a>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                    value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                Join as VIP / presenter / official / author
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="Bio" class="form-label">Bio</label>
                            <textarea name="" id="" cols="5" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="Bio" class="form-label">Title</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="Bio" class="form-label">Key words （for presentation or paper submission optional）  </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="Bio" class="form-label">Abstract / or brief introduction  </label>
                            <textarea name="" id="" cols="5" rows="5" class="form-control"></textarea>
                        </div>
                        
                        <div class="col-md-12 d-flex justify-content-end mt-3">
                            <a href="#" class="btn btn-choose text-white">Save and Confirm</a>
                        </div>
                        <div class="col-md-8">
                            <label for="Bio" class="form-label">You can also choose to upload the required files. Doc / PPT  / PDF …  </label>
                            <input type="file" class="form-control">
                        </div>
                        
                        <div class="col-md-4 d-flex justify-content-end align-items-center flex-column">
                            <div class="d-flex">
                            <a href="#" class="btn btn-warning text-white mx-2">Upload</a>
                            <a href="#" class="btn btn-warning text-white">Delete</a>
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                            <a href="#" class="btn btn-warning mt-3 text-white">More Files</a>
                        </div>
                        <div class="col-md-8">
                            <label for="Bio" class="form-label">Need upload  videos  Mp4  or Mov   </label>
                            <input type="file" class="form-control">
                        </div>
                       
                        <div class="col-md-4 d-flex justify-content-end align-items-center flex-column">
                            <div class="d-flex">
                            <a href="#" class="btn btn-warning text-white mx-2">Upload</a>
                            <a href="#" class="btn btn-warning text-white">Delete</a>
                            </div>
                            
                        </div>
                        <div class="col-md-8">
                            <a href="#" class="btn btn-warning mt-3 text-white">More Videos</a>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end align-items-center flex-column">
                            <a href="#" class="btn btn-recaptcha mt-3 text-white">Recaptcha</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<?php include "./assets/includes/footer.php" ?>


</body>

</html>