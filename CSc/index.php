<?php
require 'conn.php';
session_start();
if ($_SESSION['isLogin'] == true) {
    if ($_SESSION['active'] == true) {
    } elseif ($_SESSION['active'] == false) {
        echo '<script>
        function myFunction() {
          let text = "Your Account Not Active pleace contact with Admin.";
          if (confirm(text) == true) {
            window.location.href = "logout.php";
          } else {
            text = "You canceled!";
          }
          window.location.href = "logout.php";
        }
        myFunction()
        </script>';
    }
} else {
    header("location: login.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/dashboard/">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        body {
            font-size: .875rem;
        }

        .feather {
            width: 16px;
            height: 16px;
            vertical-align: text-bottom;
        }

        /* Sidebar*/

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            /* Behind the navbar */
            padding: 48px 0 0;
            /* Height of navbar */
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 5rem;
            }
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link .feather {
            margin-right: 4px;
            color: #727272;
        }

        .sidebar .nav-link.active {
            color: #007bff;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
            color: inherit;
        }

        .sidebar-heading {
            font-size: .75rem;
            text-transform: uppercase;
        }

        /*Navbar*/
        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: 1rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .navbar-toggler {
            top: .25rem;
            right: 1rem;
        }

        .navbar .form-control {
            padding: .75rem 1rem;
            border-width: 0;
            border-radius: 0;
        }

        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }
    </style>
</head>

<body>
    <!-- <script>
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "allUsers.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script> -->
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#"><?php echo $_SESSION['fname'] ?></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input type="search" class="form-control" onkeyup="showHint(this.value)" id="datatable-search-input">
        <div id="txtHint">
        </div>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="logout.php">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <span data-feather="file"></span>
                                Home
                            </a>
                        </li>
                        <?php
                        if ($_SESSION['isAdmin'] == true) :

                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="addUser.php">
                                    <span data-feather="file"></span>
                                    Add User PHP
                                </a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter" href="">
                                    <span data-feather="file"></span>
                                    Add User Ajax
                                </a>
                            </li>
                            <li>
                                <div class="dropdown">
                                  

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                      
                            <li class="nav-item">
                                  <a class="dropdown-item" href="addCourse.php">Add Courses PHP</a>
                                <a class="nav-link" data-toggle="modal" data-target="#addCourse" href="">
                                    <span data-feather="file"></span>
                                    Add Course Ajax
                                </a>
                                <a class="dropdown-item" href="allCourses.php">All Courses PHP</a>
                            </li>

                            <a class="dropdown-item" href="markUsers.php">Add Mark</a>
                            <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
                </div>
        </div>

        </li>
        <li>
            <div class="dropdown">
                <a href="#" class="nav-link" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Marks
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">



                </div>
            </div>

        </li>
        <li>
            <div class="dropdown">
                <a href="#" class="nav-link" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Marks
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">



                </div>
            </div>

        </li>
        
    <?php endif; ?>
    </ul>
    </div>
    </nav>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    </div>
                    <form id="fupForm" name="form1" method="post">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">First Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                                <input type="text" class="form-control" name='fname' id="fname">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Last Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                                <input type="text" class="form-control" name='lname' id="lname">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                                <input type="email" class="form-control" name='email' id="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                                <input type="text" class="form-control" name='address' id="address">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                                <input type="password" class="form-control" name='password' id="password">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Confirm Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                                <input type="password" class="form-control" name='repassword' id="repassword">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Gender</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                                <select class="form-select" name='gender' id="gender" aria-label="Default select example">
                                                    <option selected>Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>




                            <div class="modal-footer">

                                <input type="button" name="save" class="btn btn-primary" value="Add User" id="butsave">


                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>



    <!-- Edit User -->

    <div class="modal fade" id="update_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    </div>

                    <form id="fupFormm" name="fform1" method="post">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">First Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                                <input type="text" class="form-control" name='fname' id="efname_modal">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Last Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                                <input type="text" class="form-control" name='lname' id="elname_modal">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                                <input type="email" class="form-control" name='email' id="eemail_modal">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                                <input type="text" class="form-control" name='address' id="eaddress_modal">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Gender</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                            <select class="form-select" name='gender' id="gender" aria-label="Default select example">
                                                    <option selected>Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>












                                </div>
                            </div>


                            <input type="hidden" name="id" id="id_modal" class="form-control-sm">

                            <div class="modal-footer">

                                <input type="button" name="save" class="btn btn-primary" data-dismiss="modal" value="Edit User" id="butsavee">


                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


    <!-- add Course -->

    <div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    </div>

                    <form  method="post">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Course Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                                <input type="text" class="form-control" name='title' id="title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">escription</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div class="mb-3">

                                                <input type="text" class="form-control" name='description' id="description">
                                            </div>
                                        </div>
                                    </div>

                                    

                                    



                                </div>
                            </div>




                            <div class="modal-footer">

                                <input type="button" name="save" class="btn btn-primary" value="Add User" id="subCourse">


                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>



    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
            </div>
        </div>


        <div class="container">
            <div class="main-body">



                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?></h4>
                                        <p class="text-secondary mb-1">Full Stack Developer</p>
                                        <p class="text-muted font-size-sm"> <?php echo $_SESSION['email'] ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">First Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $_SESSION['fname'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Last Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $_SESSION['lname'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $_SESSION['email'] ?>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $_SESSION['address'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $_SESSION['gender'] ?>
                                    </div>
                                </div>
                                <hr>

                            </div>
                        </div>





                    </div>
                </div>

            </div>
        </div>


        <?php
        if ($_SESSION['isAdmin'] == true) :

        ?>
            <h2>All Users</h2>
            <?php
            // $sql = "SELECT * FROM users ";
            // $result = mysqli_query($conn, $sql);
            // $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

            ?>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>State</th>
                            <th>Activation</th>
                            <th>Marks</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody id="table">

                    </tbody>
                </table>
            </div>
        <?php endif; ?>
        <?php
        $userId = $_SESSION['userId'];
        if ($_SESSION['isAdmin'] == false) :

        ?>
            <h2>Marks</h2>
            <?php
            $sqll = "SELECT * FROM marks
                    LEFT JOIN courses
                    ON courses.id = marks.cours_id
                    LEFT JOIN users
                    ON users.id = marks.user_id WHERE marks.user_id =$userId";
            $resultd = mysqli_query($conn, $sqll);
            $rows = mysqli_fetch_all($resultd, MYSQLI_ASSOC);
            // echo '<pre>';print_r($rows);echo '</pre>';
            //  print_r($rows);
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>

                            <th>
                                <h4>Subject Name</h4>
                            </th>
                            <th>
                                <h4>Description</h4>
                            </th>
                            <th>
                                <h4>Mark</h4>
                            </th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php




                        foreach ($rows as  $value) :


                        ?>
                            <tr>
                                <td>
                                    <h6><?php echo $value['title'] ?></h6>
                                </td>
                                <td>
                                    <h6><?php echo $value['description'] ?></h6>
                                </td>
                                <td>
                                    <h6> <?php echo $value['mark'] ?></h6>
                                </td>


                            </tr>
                        <?php
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
    </div>
    </div>

    <script src="ajax.js"></script>
    <!-- <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl" crossorigin="anonymous"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI" crossorigin="anonymous"></script>
    <!-- <script src="dashboard.js">

    </script> -->
</body>

</html>