<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shu Dong Li</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
    <!-- dataTables -->
    <link rel="stylesheet" href="./assets/css/sidebar.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>


<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include "./assets/includes/sidebar.php"; ?>
        <!-- Page Content  -->
        <div id="content">
            <?php include "./assets/includes/navbar.php"; ?>
            <!-- <img src="./assets/images/Screenshot 2023-05-02 174322.png" alt=""> -->
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
                                    <th>Group Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>01</td>
                                    <td>Yacine Boukhennoufa</td>
                                    <td>M</td>
                                    <td>-</td>
                                    <td>No</td>
                                    <td>karimkfw@gmail.com</td>
                                    <td>-</td>
                                    <td>Stanford  University </td>
                                </tr>
                                <tr>

                                    <td>02</td>
                                    <td>Van Luu</td>
                                    <td>F</td>
                                    <td>-</td>
                                    <td>No</td>
                                    <td>vanluu2@comcast.net</td>
                                    <td>-</td>
                                    <td>Stanford  University </td>
                                </tr>
                                <tr>

                                    <td>03</td>
                                    <td>Tiziri Belkadi</td>
                                    <td>F</td>
                                    <td>-</td>
                                    <td>No</td>
                                    <td>karimkfw@gmail.com</td>
                                    <td>-</td>
                                    <td>Djurdjura wushu school 阿尔及利亚 </td>
                                </tr>
                                <tr>

                                    <td>04</td>
                                    <td>Sofia Laib</td>
                                    <td>F</td>
                                    <td>-</td>
                                    <td>No</td>
                                    <td>karimkfw@gmail.com</td>
                                    <td>-</td>
                                    <td>Djurdjura wushu school 阿尔及利亚 </td>
                                </tr>




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include "./assets/includes/footer.php"; ?>