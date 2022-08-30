<?php
require 'conn.php';
session_start(); 
if($_SESSION['isLogin'] == true){

}else{
    header("location: login.php");
}
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

<body>

    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
//*********************************************** */
if(isset($_POST['submit'])){
$firstName=$_POST['fname'];
  $lastName=$_POST['lname'];
  $email=$_POST['email'];
  $password=$_POST['password'];
 
  $address=$_POST['address'];
// $sqlupdate = "UPDATE users SET fname='$firstName' ,lname='$lastName' ,email='$email' ,password='$password' ,address='$address' WHERE  WHERE id='$id'";
$ss="UPDATE users SET fname='$firstName' ,lname='$lastName' ,email='$email' ,password='$password' ,address='$address'   WHERE id='$id'";
$conn->query($ss) ;
header("location: index.php");


}




    ?>

    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            
                            <div class="row justify-content-center">
                                
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                              <a href="home.php">  <button type="submit" name='submit'class="btn btn-primary btn-lg">Back </button></a>
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit User</p>
                                    <?php
                                    foreach ($row as $value) :



                                    ?>
                                        <form class="mx-1 mx-md-4" method="post" action=''>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="form3Example1c">Your First Name</label>
                                                    <input type="text" id="form3Example1c" value='<?php echo $value['fname']; ?>' name='fname' class="form-control" />

                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="form3Example1c">Your last Name</label>
                                                    <input type="text" id="form3Example1c" value='<?php echo $value['lname']; ?>' name='lname' class="form-control" />

                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="form3Example3c">Your Email</label>
                                                    <input type="email" id="form3Example3c" value='<?php echo $value['email']; ?>' name='email' class="form-control" />

                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="form3Example4c">Password</label>
                                                    <input type="password" id="myInput" value='<?php echo $value['password']; ?>' name='password' class="form-control" />
                                                    <input type="checkbox" onclick="myFunction()">Show Password
                                                </div>
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
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="form3Example4c">Address</label>
                                                    <input type="text" id="form3Example4c" value='<?php echo $value['address']; ?>' name='address' class="form-control" />

                                                </div>
                                            </div>





                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" name='submit' class="btn btn-primary btn-lg">Edit</button>
                                            </div>

                                        </form>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>