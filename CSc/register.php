<?php
require 'conn.php';

?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<?php
if (isset($_POST['submit'])) {

  $firstName = $_POST['fname'];
  $lastName = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  // $regexEmail='/^[a-zA-Z\._\d] + @ [a-zA-Z\d\._]= \. [a-zA-Z\d\.]+$/';
  $regexPassword = '/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^{}[]:;<>,.?~_+-=|).{8,32}+$/';
  if (preg_match("/^[a-zA-Z-' ]*$/", $firstName) && preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      if ($password == $repassword) {
        if (preg_match($regexPassword, $password)) {
          $sql = 'INSERT INTO users (fname,lname, email, password, gender, address) VALUES (?,?,?,?,?,?)';
          $stInsert = $conn->prepare($sql);
          $result = $stInsert->execute([$firstName, $lastName, $email, $password, $gender, $address]);
          if ($result) {
            echo "<script>alert('Success Register User')</script>";
            header("location: login.php");
          } else {
            echo "<script>alert('Falid Register User')</script>";
          }
        } else {

          echo "<script>alert('please insert valid password')</script>";
        }
      } else {
        echo "<script>alert('please insert Same password in Two Fields')</script>";
      }
    } else {

      echo "<script>alert('please insert valid Email')</script>";
    }
  } else {

    echo "<script>alert('Please insert valid name (String Name)')</script>";
  }
}

?>

<body>


  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <form class="mx-1 mx-md-4" method="post" action=''>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Your First Name</label>
                        <input type="text" id="form3Example1c" name='fname' class="form-control" />

                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Your last Name</label>
                        <input type="text" id="form3Example1c" name='lname' class="form-control" />

                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <input type="email" id="form3Example3c" name='email' class="form-control" />

                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c">Password</label>
                        <input type="password" id="form3Example4c" name='password' class="form-control" />

                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c">Confermd Password</label>
                        <input type="password" id="form3Example4c" name='repassword' class="form-control" />

                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c">Address</label>
                        <input type="text" id="form3Example4c" name='address' class="form-control" />

                      </div>
                    </div>

                    <!-- <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" />
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div> -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c">Gender</label>
                        <select class="form-select" name='gender' aria-label="Default select example">
                          <option selected>Select Gender</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>

                        </select>

                      </div>
                    </div>


                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name='submit' class="btn btn-primary btn-lg">Register</button>
                    </div>

                  </form>
                  <hr>
                  <a href="login.php">Login </a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>





  </script>



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>