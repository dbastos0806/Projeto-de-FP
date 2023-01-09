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
                <form method="post" action="edit_user.php">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="user id ">User ID</label>
                            <input class="form-control" id="editId" type="text" aria-describedby="ID"
                                name="editId" value="<?php echo $_REQUEST["editId"]; ?>">
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="InputName">Username</label>
                                <input class="form-control" id="InputName" type="text" name="username"
                                    value="<?php echo $_REQUEST["username"]; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputEmail1">Email address</label>
                        <input class="form-control" id="InputEmail1" type="email" aria-describedby="emailHelp"
                            name="email" value="<?php echo $_REQUEST["email"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Inputusertype">User type</label>
                        <input class="form-control" id="Inputusertype" type="text" name="usertype"
                            value="<?php echo $_REQUEST["usertype"]; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" name="edit_user">Edit</button>
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