<?php
    include('condb.php');

    if(isset($_POST['login_user'])){
        $username = $_POST ['username'];
        $password = $_POST['password'];
        echo $username;
        echo $password;
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $login = $stm->fetch(PDO::FETCH_ASSOC);
        echo $login['username'];
        if($login == false){
            echo 'Username & Password is invalid';
        }else{
            header('location:data.php');
        }
    }

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

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-danger">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-4">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">ยินดีต้อนรับ</h1>
                  </div>
                              
                    <form method="post" class="user">
                    <!-- <form class="user"> -->
                    <div class="form-group">
                        <!-- <label for="username">Username</label> -->
                        <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <!-- <label for="password">Password</label> -->
                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>


   


                    <div class="form-group">
                        <button type="submit" name="login_user" class="btn btn-primary btn-user btn-block"  >เข้าสู่ระบบ</button>
                    </div>
                    <p>Not yet a member? <a href="register.php">ลงทะเบียน</a></p>
                    </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div> -->
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
