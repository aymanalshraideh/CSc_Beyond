<?php
require 'conn.php';
session_start();
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
  $email = $_POST['email'];
  $password = $_POST['password'];
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT * FROM users WHERE email= '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['email'] == $email) {
      $hashed_password=$row['password'];
      
      if(password_verify($password,$hashed_password)) {
        $_SESSION["email"] = $email;
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['userId'] = $row['id'];
        
        $_SESSION['isLogin'] = true;
        if ($row['activation'] == 0) {
          $_SESSION['active'] = false;
        } else {
          $_SESSION['active'] = true;
        }
        if ($row['roal'] == 0) {
          $_SESSION['isAdmin'] = false;
        } elseif ($row['roal'] == 1) {
          $_SESSION['isAdmin'] = true;
        }
        echo "<script>alert('success');</script>";

        header("location: index.php");
      } else {
        echo "<script>alert('Your password is incorrect! Please try again')</script>";
      }
    } else {
      echo "<script>alert('You dont have account')</script>";
    }
  }
}

// if(isset($_POST['submit'])){

//   $firstName=$_POST['fname'];
//   $lastName=$_POST['lname'];
//   $email=$_POST['email'];
//   $password=$_POST['password'];
//   $gender=$_POST['gender'];
//   $address=$_POST['address'];
//   // $regexEmail='/^[a-zA-Z\._\d] + @ [a-zA-Z\d\._]= \. [a-zA-Z\d\.]+$/';
//   $regexPassword='/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^{}[]:;<>,.?~_+-=|).{8,32}+$/';
// if(preg_match("/^[a-zA-Z-' ]*$/",$firstName) &&preg_match("/^[a-zA-Z-' ]*$/",$lastName )){
//   if(filter_var($email, FILTER_VALIDATE_EMAIL)){
//   if(preg_match($regexPassword, $password)){
//   $sql='INSERT INTO users (fname,lname, email, password, gender, address) VALUES (?,?,?,?,?,?)';
//   $stInsert=$conn->prepare($sql);
//   $result=$stInsert->execute([$firstName,$lastName,$email,$password,$gender,$address]);
//   if($result){
//       echo "<script>alert('Success Register User')</script>";

//   }else{
//     echo "<script>alert('Falid Register User')</script>";
//   }
// }else{

//   echo "<script>alert('please insert valid password')</script>";
// }

// }else{

//   echo "<script>alert('please insert valid Email')</script>";
// }
// }else{

//   echo "<script>alert('Please insert valid name (String Name)')</script>";
// }

// }

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

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>

                  <form method="post" action=''>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form1Example1">Email </label>
                      <input type="email" id="form1Example1" name='email' class="form-control" />

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form1Example2">Password</label>
                      <input type="password" id="myInput" name='password' class="form-control" />
                      <input type="checkbox" onclick="myFunction()">Show Password
                      <script>
                        function myFunction() {
                          var x = document.getElementById("myInput");
                          if (x.type === "password") {
                            x.type = "text";
                          } else {
                            x.type = "password";
                          }
                        }
                      </script>
                    </div>



                    <!-- Submit button -->
                    <button type="submit" name='submit' class="btn btn-primary btn-block">Sign in</button>

                  </form>
                  <hr>
                  <a href="register.php">Register </a>
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