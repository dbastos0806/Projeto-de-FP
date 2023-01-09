<?php
include('pserver.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Projeto Final</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script>
    function confirmar() {
      var result = confirm("Tem a certeza que pretende apagar?");
      return result;
    }
  </script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="main.php">Formula 1</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
      data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="main.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Pilots</span>
          </a>
        </li>
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="charts.html">
            <i class="fa fa-check-square"></i>
            <span class="nav-link-text">Paginas para edição</span>
          </a>
        </li> -->

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="pistas.php">
            <i class="fa fas fa-map"></i>
            <span class="nav-link-text">Circuits</span>
            </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="register.php">
            <i class="fa fas fa-user"></i>
            <span class="nav-link-text">Register Users</span>
          </a>
        </li>

      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="" href="#" id="toggleNavColor">teste</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="main.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Admin</li>
      </ol>

      <div class="row">
        <div class="col-12">
          <h1>Gestão de Utilizadores </h1>
        </div>
      </div>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Table Users
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User type</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>User ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User type</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "formula1";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                $sql = 'SELECT * from users';
                if (mysqli_query($conn, $sql)) {
                  echo "";
                } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                $count = 1;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                      <th>
                        <?php echo $row['UserId']; ?>
                      </th>
                      <td>
                        <?php echo $row['Name']; ?>
                      </td>
                      <td>
                        <?php echo $row['Email'] ?>
                      </td>
                      <td>
                        <?php echo $row['UserType'] ?>
                      </td>
                      <td>
                        <a href="edit_user.php?editId=<?php echo $row['UserId'] . '&username=' . $row['Name'] . '&email=' . $row['Email'] . '&usertype=' . $row['UserType'] ?>"
                          class="btn btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                        <a onclick="return confirmar();" href="delete_user.php?delId=<?php echo $row['UserId'] ?>"
                          class="btn btn-danger"><i class="bi bi-trash"></i>Delete</a>
                      </td>
                    </tr>



                    <?php
                    $count++;
                  }
                } else {
                  echo '0 results';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">last Update</div>
      </div>
    </div>

    <!-- <div class="col-md-8">

          <form method="post" action="product.php">

            <div class="form-group">
              <label>Product Name</label>
              <input type="text" class="form-control" name="pname" required>
            </div>

            <div class="form-group">
              <label>Product Price</label>
              <input type="text" class="form-control" name="pirce" required>
            </div>

            <div class="form-group">
              <label>Product Catgory</label>
              <input type="text" class="form-control" name="pcat" required>
            </div>

            <div class="form-group">
              <label>Product Details</label>
              <textarea class="form-control" name="pdetails" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="reg_p">Submit</button>
          </form>

        </div>
      </div>
    </div> -->

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Diogo Bastos 2023</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
    <script>
      $('#toggleNavColor').click(function () {
        $('nav').toggleClass('navbar-dark navbar-light');
        $('nav').toggleClass('bg-dark bg-light');
        $('body').toggleClass('bg-dark bg-light');
      });

    </script>
  </div>
</body>

</html>