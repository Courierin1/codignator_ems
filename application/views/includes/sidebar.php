<?php
if($_SESSION["user_login"]['roleid'] ==2){
    redirect('dashboard', 'refresh');
}
?>
       
        <!-- Sidebar  -->
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <h3><img src="<?=base_url()?>assets/images/logo.png" alt=""></h3>
            </div>

            <ul class="list-unstyled components">
                <p class="text-center">Admin</p>
                <!-- <li class=" "> -->
                    <!-- <a href="<?=base_url()?>dashboard" data-toggle="collapse" aria-expanded="false" class="">Dashboard</a> -->
                    
                <!-- </li> -->
                <li class="">
                    <a href="<?=base_url()?>events" data-toggle="collapse" aria-expanded="false" class="">Event</a>
                    
                </li>
               
                <li class="">
                    <a href="<?=base_url()?>waiver" data-toggle="collapse" aria-expanded="false" class="">Waiver Form</a>
                    
                </li>
                <li class="">
                    <a href="<?=base_url()?>contact_form" data-toggle="collapse" aria-expanded="false" class="">Contact Form</a>
                    
                </li>
                <li class="">
                    <a href="<?=base_url()?>about_form" data-toggle="collapse" aria-expanded="false" class="">About Form</a>
                    
                </li>
                 <li class="">
                    <a href="<?=base_url()?>users" data-toggle="collapse" aria-expanded="false" class="">Users</a>
                    
                </li>
               
                <li>
                    <a href="<?=base_url()?>participate" data-toggle="collapse" aria-expanded="false" class="">Event Participate</a>
                </li>
              
            </ul>
<!-- 
      <li>
                    <a href="<?=base_url()?>vips">VIPs</a>
                </li>
            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul> -->
        </nav>
        
        <!-- Page Content  -->