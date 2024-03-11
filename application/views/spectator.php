  <!-- google translate -->
  <div id="google_translate_element" style="display: flex; justify-content: center;"></div>    <!-- ends -->
    <div class="container-fluid" id="event_registration">
                <div class="row">
                    <div class="col-md-6">
                        <div id="Events">
                            <h1 class="color-1">Event Enrolled</h1>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8 ">
                       <select  class="form-select status mb-2"   id="events_sel">
                       <option value="">Select Event for Filter</option>
                        <?php
                          $sql1 ="SELECT * FROM  events"; 
                          $query1 = $this->db->query($sql1);
                          foreach ($query1->result() as $row2) {
                            echo ('<option value="'.$row2->event_name.'">'.$row2->event_name.'</option>');
                          }
                          ?>
                       </select>
                    </div>
                    <div class="col-md-3 ">  
                        <button onclick="export_csv()" class="btn btn-success">Export data to CSV</button>
                    </div>
                    <div class="col-md-12">

                        <table id="example" class="display " style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Event Name</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Country</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql ="SELECT *,ee.id as en_id FROM event_enrolls as ee join  events as e on ee.event_id =e.id "; 
                                $query = $this->db->query($sql);
                                $count = 0;
                                foreach ($query->result() as $row) {?>
                                <tr>

                                    <td><?=++$count;?></td>
                                    <td><?php echo $row->event_name;?></td>
                                    <td><a href="<?= base_url() ?>event_enroll/edit/<?= $row->en_id ?>" >Edit<?php echo $row->first_name.' '.$row->last_name;?></a></td>
                                    <td><?php echo $row->gender;?></td>
                                    <td><?php echo $row->country;?></td>
                                    <td><?php echo $row->email;?></td>
                                    <td><?php echo $row->phone;?></td>
                                    <td><a href="<?= base_url() ?>event_enroll/edit/<?= $row->en_id ?>" class="btn btn-warning">Edit</a>
                        <a onclick="confirmation(event)"  href="<?= base_url() ?>event_enroll_del/<?= $row->en_id ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
    $(document).ready(function () {
 var oTable = $('#example').dataTable();
     $('select#events_sel').change( function () {  oTable.fnFilter( this.value, 1 );  } );
    
});
function export_csv() {
    var ids = $('#events_sel').val();
    console.log(ids);
    var form = document.createElement("form");
    var element1 = document.createElement("input"); 
    var element2 = document.createElement("input");  
    form.method = "POST";
    form.action = "<?=base_url("Events/export_csv")?>";   
    element1.value=ids;
    element1.name="id";
    form.appendChild(element1);  
    document.body.appendChild(form);
    form.submit();
     }
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