<?php
require 'condb.php';
// $sql = 'SELECT * FROM training';
$sql = 'SELECT training.T_ID, training.T_Name, training.Date, training.Address, training.Time,lecturer.Dir_Name, lecturer.L_Name
FROM training,lecturer
WHERE training.L_ID =  lecturer.L_ID';
$statement = $conn->prepare($sql);
$statement->execute();
$training = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
    <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>Train</title>

      <!-- Custom fonts for this template -->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">

      <!-- Custom styles for this page -->
      <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>

  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    


      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="data.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">ข้อมูล</div>
        <!-- Nav Item - Tables -->
        <li class="nav-item active">
          <a class="nav-link" href="showtrain.php"><i class="fas fa-fw fa-table"></i><span>ข้อมูลการอบรม</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="showlec.php"><i class="fas fa-fw fa-table"></i><span>ข้อมูลวิทยากร</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="showparti.php"><i class="fas fa-fw fa-table"></i><span>ข้อมูลผู้เข้าอบรม</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item active">
          <a class="nav-link" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>                
            <span>ออกจากระบบ</span></a>
        </li>
        <!-- <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a> -->

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <form class="form-inline">
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>
            </form>

            <!-- Topbar Search -->
            <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form> -->

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                  <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    ออกจากระบบ
                  </a>
                </div>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">ข้อมูลการอบรม</h1>
            <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

              <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">เพิ่มวิทยากร</h6> -->
              <div class="card">
                <div class="card-header">
                  <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-user-plus"></i> เพิ่มข้อมูลการอบรม</button>
                </div> <!-- end-card-header -->
              </div>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- <td  align="center"><strong>รหัสการอบรม</strong></td> -->
                            <td  align="center"><strong>ชื่อการอบรม</strong></td>
                            <td  align="center"><strong>สถานที่</strong></td>
                            <td  align="center"><strong>วันที่</strong></td>
                            <td  align="center"><strong>เวลา</strong></td>
                            <td  align="center"><strong>วิทยากร</strong></td>
                            <td  align="center"><strong>เอกสาร</strong></td>
                            <td  align="center"><strong>รายชื่อ</strong></td>
                            <td  align="center"><strong>แก้ไข</strong></td> 
                            <td  align="center"><strong>ลบ</strong></td>
                        </tr>
                    </thead>
                    <?php foreach($training as $trainings): ?>
                        <tr>    
                            <!-- <td align="center"><?= $trainings->T_ID; ?></td>  -->
                            <td ><?= $trainings->T_Name; ?></td> 
                            <td><?= $trainings->Address; ?></td> 
                            <td><?= $trainings->Date; ?></td> 
                            <td><?= $trainings->Time; ?></td>   
                            <td><?= $trainings->Dir_Name; ?><?= $trainings->L_Name; ?></td>  
                            <!-- <td><?= $trainings->Document; ?></td> -->
                            <td  align="center">
                                <a href="showdocument.php?id=<?= $trainings->T_ID ?>" class="btn btn-info">เพิ่มเอกสาร</a>
                            </td>
                            <td  align="center">
                                <a href="showname.php?id=<?= $trainings->T_ID ?>" class="btn btn-info">รายชื่อ</a>
                            </td>
                            <td  align="center">
                                <a href="edittrain.php?id=<?= $trainings->T_ID ?>"class="btn btn-warning" ><i class='fas fa-pen'></i></a>
                            </td>
                            <td  align="center">
                                <a onclick="return confirm('ต้องการลบหรือไม่?')" 
                                href="deletetrain.php?id=<?= $trainings->T_ID ?>" class="btn btn-danger" ><i class='fa fa-trash'></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?> 
                  </table>
                </div>
              </div>
            </div>
          </div> <!-- /.container-fluid -->          
        </div> <!-- End of Main Content -->


        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <!-- <span>Copyright &copy; Your Website 2020</span> -->
            </div>
          </div>
        </footer> <!-- End of Footer -->
      </div> <!-- End of Content Wrapper -->
    </div> <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!--start Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5> -->
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">ท่านต้องการออกจากระบบหรือไม่ ??</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                <a class="btn btn-primary" href="login.php">ออกจากระบบ</a>
            </div>
        </div>
      </div>
    </div>   <!--end Logout Modal-->

    <div class="modal fade  " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h2 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลการอบรม</h2>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                  <!-- <span aria-hidden="true">&times;</span> -->
                </button>
              </div>
              <div class="modal-body ">
               

      <form action="addtrain.php" method="post" class="form-horizontal">
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-4 control-label">ชื่อการอบรม</label>
              <div class="col-sm-5">
                <input type="text" name="T_Name" id="T_Name" class="form-control">
              </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-4 control-label">สถานที่</label>
            <div class="col-sm-5">
                <input type="text" name="Address" id="Address" class="form-control">
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-4 control-label">วันที่</label>
            <div class="col-sm-5">
                <input type="date" name="Date" id="Date" class="form-control">
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-4 control-label">เวลา</label>
            <div class="col-sm-5">
                <input type="text" name="Time" id="Time" class="form-control">
            </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-4 control-label">รหัสวิทยากร</label>
            <div class="col-sm-5">
                <input type="text" name="L_ID" id="L_ID" class="form-control">
            </div>
            </div>
        </div>


        <div class="modal-footer">
            <button type="button"  class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            <button type="submit" name="btn_insert" class="btn btn-success" value="Insert">เพิ่มการอบรม</button>
          </div>  
      </form>      
     <!-- end add train -->       



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
  </body>
</html>
