<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>>Projeto Final</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container">
        <div class="card card-edit mx-auto mt-5">
            <div class="card-header">Edit</div>
            <div class="card-body">
                <form method="post" action="edit_pilot.php">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="driverId ">Driver ID</label>
                            <input readonly class="form-control" id="driverId" type="text" aria-describedby="driverId"
                                name="driverId" value="<?php echo $_REQUEST["driverId"]; ?>">
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="InputName">Code</label>
                                <input class="form-control" id="Inputcode" type="text" name="code" maxlength="3"
                                    value="<?php echo $_REQUEST["code"]; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Inputforename">Forename</label>
                        <input class="form-control" id="Inputforename" type="text" name="forename"
                            value="<?php echo $_REQUEST["forename"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Inputsurname">Surname</label>
                        <input class="form-control" id="Inputsurname" type="text" name="surname"
                            value="<?php echo $_REQUEST["surname"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Inputnationality">Nationality</label>
                        <input class="form-control" id="Inputnationality" type="text" name="nationality"
                            value="<?php echo $_REQUEST["nationality"]; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" name="edit_pilot">Edit</button>
                </form>
                </div>
                </main>

            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>