  <!-- google translate -->
  <div id="google_translate_element" style="display: flex; justify-content: center;"></div>    <!-- ends -->
    <div class="container">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div id="Events">
                <h1>Events</h1>
            </div>
        </div>
        <hr>
    </div>
    <div class="row">
        <?php 
        foreach($events as $key => $value){
            $event_id = $value["id"];
            $user_id = $_SESSION["user_login"]["id"];
            $sql ="SELECT * FROM event_enrolls where event_id='$event_id' and user_id = '$user_id'"; 
            $query = $this->db->query($sql);
        ?>
            <div class="col-lg-4 col-md-4  col-sm-6 my-3">
                <div class="cards">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center my-2">
                            <img src="<?= base_url() ?><?=$value["image"]?>" alt=""  class="img-fluid">
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="btn-sec">
                                <?php 
                                if ($query->num_rows() > 0) {
                                $row =  $query->result_array();
                                ?>
                                <a href="<?=base_url()?>events/view/<?=$row[0]['id']?>" class="btn btn-event">Enrolled View</a>
                                <?php
                                }
                                else{
                                    if($_SESSION["user_login"]["wiever_accpt"]!=1){
                                ?>
                                <a href="<?=base_url()?>events/waiver/<?=$value["id"]?>" class="btn btn-event">Enroll</a>
                                <?php } else {?>
                                <a href="<?=base_url()?>events/enroll/<?=$value["id"]?>" class="btn btn-event">Enroll</a>
                                <?php   }
                                }
                                ?>
                                
                            </div>
                        </div>

                        <div class="col-md-6 d-block ">
                            <div class="d-block m-auto">
                                <h3 class="truncate"><?=$value["event_name"]?></h3>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <p class="paragraph mt-3"><?=$value["event_description"]?></p>
                        </div>
                        <div class="col-md-12">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 d-flex justify-content-end"> -->
                            <!-- <a href="javascript:void(0)" class="btn btn-event">View</a> -->
                        <!-- </div> -->
                    </div>

                </div>
            </div>
        <?php } ?>
    </div>
</div>


</div>