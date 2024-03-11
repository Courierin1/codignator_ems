<!-- google translate -->
<div id="google_translate_element" style="display: flex; justify-content: center;"></div> <!-- ends -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div id="Events">
                <h1>Create Events</h1>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-end"></div>
        <div class="col-md-6 d-flex justify-content-end">
            <div id="Events">
                <a href="<?= base_url() ?>events/create" class="btn btn-primary">Create Event</a>
            </div>
        </div>
        <hr>
    </div>
    <div class="row">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order no</th>
                    <th>Event Name</th>
                    <th>Event Link</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                foreach ($events as $key => $value) {
                    ?>
                    <tr>
                        <td>
                            <?= ++$count; ?>
                        </td>
                        <td>
                            <?= $value["order_no"]; ?>
                        </td>
                        <td>
                            <?= $value["event_name"] ?>
                        </td>
                        <td>
                            <a href="<?=base_url()?>Events/enroll/<?= $value["id"] ?>"><?=base_url()?>Events/enroll/<?= $value["id"] ?></a>
                        </td>
                        <td>
                            <?= $value["created_at"] ?>
                        </td>
                        <td>
                            <select name="" class="form-select status" ids="<?= $value["id"] ?>">
                                <option value="1" <?= $retVal = ($value['event_status'] ==1) ? "selected" :"" ;?> >Active</option>
                                <option value="0" <?= $retVal = ($value['event_status'] ==0) ? "selected" :"" ;?>>InActive</option>
                            </select>
                        </td>
                        <td>
                        
                            <a href="<?= base_url() ?>events/edit/<?= $value["id"] ?>" class="btn btn-warning">Edit</a>
                            <a onclick="confirmation(event)"  href="<?= base_url() ?>events/delete/<?= $value["id"] ?>" class="btn btn-danger">Delete</a>
                           
                        </td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>
    </div>
</div>
</div>

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
                url: "<?=base_url("Events/status")?>",
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