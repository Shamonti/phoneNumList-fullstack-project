<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- GOOGLE FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
              rel="stylesheet">

        <!-- BOOTSTRAP ICONS     -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />

        <!-- DATATABLE CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

        <!-- BOOTSTRAP TABLE CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

        <!-- BOOTSTRAP CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

        <!-- CUSTOM CSS -->
        <link rel="stylesheet" href="{{ asset('/') }}adminAsset/assets/css/style.css" />
        <title>Dashboard</title>
        <link rel="shortcut icon" href="{{ asset('/') }}adminAsset/assets/images/icons/favicon.ico" />
    </head>
    <body>
        <?php
        if(isset($_POST["id"]))
        {
            $output = '';
            $connect = mysqli_connect("localhost", "root", "", "phonelist");
            $query = "SELECT * FROM phone_lists WHERE id = '".$_POST["id"]."'";
            $result = mysqli_query($connect, $query);
            $output .= '<form action="">'; ?>

        @csrf

        <?php
            while($row = mysqli_fetch_array($result))
            {
                $output .= '

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" value="'.$row["phone"].'">
                            </div>

                            <div class="mb-3">
                                <label for="uid" class="form-label">Facebook URL</label>
                                <input type="text" class="form-control" id="uid" value="https://www.facebook.com/'.$row["uid"].'">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" value="'.$row["email"].'">
                            </div>

                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" value="'.$row["first_name"].'">
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" value="'.$row["last_name"].'">
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <input type="text" class="form-control" id="gender" value="'.$row["gender"].'">
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" value="'.$row["country"].'">
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" value="'.$row["location"].'">
                            </div>

                            <div class="mb-3">
                                <label for="hometown" class="form-label">Hometown</label>
                                <input type="text" class="form-control" id="hometown" value="'.$row["hometown"].'">
                            </div>

                            <div class="mb-3">
                                <label for="relation" class="form-label">Relationship Status</label>
                                <input type="text" class="form-control" id="relation" value="'.$row["relationship_status"].'">
                            </div>

                            <div class="mb-3">
                                <label for="education" class="form-label">Education Last Year</label>
                                <input type="number" class="form-control" id="education" value="'.$row["education_last_year"].'">
                            </div>

                            <div class="mb-3">
                                <label for="work" class="form-label">Workplace</label>
                                <input type="text" class="form-control" id="work" value="'.$row["work"].'">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>';
            }
            $output .= "</form>></div>";
            echo $output;
        }
        ?>


        <!-- BOOTSTRAP JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- Chart JS -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Custom JS -->
        <script src="{{ asset('/') }}adminAsset/assets/js/script.js"></script>
        <script src="{{ asset('/') }}adminAsset/assets/js/dashboard.js"></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <!-- DataTable JS -->
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

        <!-- Bootstrap Table JS -->
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>


    </body>
</html>





