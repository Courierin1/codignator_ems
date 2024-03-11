  <!-- google translate -->
  <div id="google_translate_element" style="display: flex; justify-content: center;"></div>    <!-- ends -->
    <div class="container-fluid" id="event_registration">
                <div class="row">
                    <div class="col-md-6">
                        <div id="Events">
                            <h1 class="color-1">Event Registration Admin</h1>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 ">
                        <h2 class="text-center msg">
                            Search by Name / Email / phone / School or group / Best match

                        </h2>
                    </div>
                    <div class="col-md-12">
                        <p class="">Name List</p>
                    </div>
                    <div class="col-md-12">

                        <table id="example" class="display " style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Country</th>
                                    <th>Paid</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql ="SELECT * FROM event_enrolls "; 
                                $query = $this->db->query($sql);
                                $count = 0;
                                foreach ($query->result() as $row) {?>
                                <tr>

                                    <td><?=++$count;?></td>
                                    <td><?php echo $row->first_name.' '.$row->last_name;?></td>
                                    <td><?php echo $row->gender;?></td>
                                    <td><?php echo $row->country;?></td>
                                    <td>No</td>
                                    <td><?php echo $row->email;?></td>
                                    <td><?php echo $row->phone;?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>