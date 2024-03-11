  <!-- google translate -->
  <div id="google_translate_element" style="display: flex; justify-content: center;"></div>    <!-- ends -->
    <div class="container-fluid" id="event_registration">
    <div class="row">
        <div class="col-md-6">
            <div id="Events">
                <h1 class="color-1">User Management</h1>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 ">
            <!-- <h2 class="text-center msg"> -->
                <!-- Search by Name / Email / phone / School or group / Best match -->

            <!-- </h2> -->
        </div>
        <div class="col-md-12">
            <!-- <p class="">Name List</p> -->
        </div>
        <div class="col-md-12">
            <!-- <label for="">Filter User</label> -->
            <!-- <input type="text" class="form-control my-2"> -->
            <div id="example_wrapper" class="dataTables_wrapper no-footer">
                
                <table id="example" class="display dataTable no-footer" style="width: 100%;"
                    aria-describedby="example_info">
                    <thead>
                        <tr>
                           <th>S.no</th>
                           <th>login username</th>
                           <th>Name</th>
                           <th>Gender</th>
                           <th>Country</th>
                           <th>Email</th>
                           <th>Phone</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                                $sql ="SELECT * FROM  users  "; 
                                $query = $this->db->query($sql);
                                $count = 0;
                                foreach ($query->result() as $row) {?>
                                <tr>

                                    <td><?=++$count;?></td>
                                    <td><?php echo $row->username;?></td>
                                    <td><?php echo $row->first_name.' '.$row->last_name;?></td>
                                    <td><?php echo $row->gender;?></td>
                                    <td><?php echo $row->country;?></td>
                                    <td><?php echo $row->email;?></td>
                                    <td><?php echo $row->phone;?></td>
                                    <td> <select name="" class="form-select status" ids="<?=$row->id ?>">
                                <option value="1" <?= $retVal = ($row->status ==1) ? "selected" :"" ;?> >Active</option>
                                <option value="0" <?= $retVal = ($row->status ==0) ? "selected" :"" ;?>>InActive</option>
                            </select></td>
                            <td>
                                
                            <a href="<?= base_url() ?>users/edit/<?= $row->id ?>" class="btn btn-warning">Edit</a>
                        <a onclick="confirmation(event)"  href="<?= base_url() ?>users/delete/<?= $row->id ?>" class="btn btn-danger">Delete</a>
                               
                        </td>
                                </tr>
                                <?php }?>
                    </tbody>
                </table>
                
        </div>
<script>

    $(document).ready(function () {
        $('.status').on('change', function () {
            // $(this).attr("ids")
            let ids = $(this).attr("ids")
            let value = $(this).val()
            
            $.ajax({
                type: "POST",
                dataType: "text",
                url: "<?=base_url("Events/user_status")?>",
                data:{id:ids,value:value},
                success: function (textMsg) {

                   console.log("value added" + textMsg)

                },
                Error: function (textMsg) {
                    console.log("value not added" + textMsg)
                    
                }
            });
        });
    });
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
    </div>
</div>