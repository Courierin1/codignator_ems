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
                <div class="row" id="event_add">
                    <div class="col-md-12">
                        <label for="" class="form-label">Title of the event</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <a href="javascript:void(0)" class="btn btn-choose mt-3 text-white"> Choose event options</a>
                    </div>
                    <div class="col-md-12">
                        <div class="mt-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Bio</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Bio</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p class="msg mt-5 pt-5">Name of the event Fee options</p>
                    </div>
                    <div class="col-md-6">
                    <input type="text" class="form-control mb-2" placeholder="Name of Event options selection ">
                    </div>
                    <div class="col-md-2">
                    <input type="number" class="form-control mb-2" placeholder="$20">
                    </div>
                    <div class="col-md-6">
                    <input type="text" class="form-control my-2" placeholder="Event options selection ">
                    </div>
                    <div class="col-md-2">
                    <input type="number" class="form-control my-2" placeholder="$50">
                    </div>
                    <div class="col-md-12">
                        <a href="javascript:void(0)" class="btn btn-warning text-white">Add More</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include "./assets/includes/footer.php"; ?>