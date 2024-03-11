<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shu Dong Li</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" /> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- dataTables -->
    <!-- <link rel="stylesheet" href="<?=base_url()?>assets/css/sidebar.css" /> -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" />
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer></script> 
</head>


<body>
    <div id="Navigation">
        <div class="container">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg ">
                    <a class="navbar-brand" href="#"><img src="<?=base_url()?>assets/images/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
<!-- active -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                           
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url()?>dashboard">Events</a>
                            </li>
                           

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url()?>contact">Contact Us</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url()?>about">About Us</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?=base_url()?>profile">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url()?>logout">Logout</a>
                            </li>


                        </ul>

                    </div> 
                    <!--  <li class="nav-item">
                                <a class="nav-link" href="<?= base_url()?>waiver_view">Waiver Form</a>
                            </li>
                   <div id="checkout">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Checkout
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">My Account</a>
                                        <a class="dropdown-item" href="#">Event Info</a>
                                        
                                        <a class="dropdown-item" href="#">Contact Us</a>
                                        <a class="dropdown-item" href="#">Logout</a>
                                    </div>
                                </li>

                            </ul>

                        </div>
                    </div> -->
                </nav>
            </div>
        </div>
    </div>