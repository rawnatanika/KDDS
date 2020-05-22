<?php
    include"includes/config.php";

    //registration code
    session_start();
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $name = $_POST['name'];
        $guardian = $_POST['guardian'];
        $class = $_POST['class'];
        $section = $_POST['section'];
        $roll = $_POST['roll'];

        $sql_u = "SELECT * FROM student WHERE username='$username'";
        $sql_e = "SELECT * FROM student WHERE email='$email'";
        $res_u = mysqli_query($connection, $sql_u);
        $res_e = mysqli_query($connection, $sql_e);

        if (mysqli_num_rows($res_u) > 0){
            echo "<script>alert('Sorry... username already taken');</script>";
        } 
        else if(mysqli_num_rows($res_e) > 0){
            echo "<script>alert('Sorry... email already taken');</script>";
        } 
        else{
            $query = "INSERT INTO student (username, name, guardian, class,  section, roll, email, password, date ) ";
            $query .= "VALUES('{$username}', '{$name}', '{$guardian}', '{$class}', '{$section}', '{$roll}','{$email}', '{$password}', now() )";

            $register_user_query = mysqli_query($connection, $query);

            if($register_user_query){
                echo "<script>alert('You are successfully register');</script>";
            }
            else{
                echo "<script>alert('Not register something went worng');</script>";
            }
        } 
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Register</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="assets/images/logo.png" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Sign into your account</p>
                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="name" class="sr-only">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Your name">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="name" class="sr-only">Name</label>
                                        <input type="text" name="username" id="name" class="form-control" placeholder="User name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="guardian" class="sr-only">Guardian</label>
                                    <input type="text" name="guardian" id="guardian" class="form-control" placeholder="You guardian name">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="class" class="sr-only">Class</label>
                                        <select class="form-control" name="class">
                                            <option value="0" name="class">Your class:</option>

                                            <?php 
                                                $query = "SELECT * FROM class";
                                                $class_query = mysqli_query($connection, $query);

                                                if(!$class_query){
                                                    die("Not Connected" . mysqli_error($connection));
                                                }

                                                while($row = mysqli_fetch_assoc($class_query)){
                                                    $class_name = $row['name'];
                                                    echo "<option value ='$class_name' >{$class_name}</option>";
                                                }
                                            ?>

                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="class" class="sr-only">Section</label>
                                        <select class="form-control" name="section">
                                            <option value="0" name="section">Your section:</option>
                                            
                                            <?php 
                                                $query = "SELECT * FROM section";
                                                $section_query = mysqli_query($connection, $query);

                                                if(!$section_query){
                                                    die("Not Connected" . mysqli_error($connection));
                                                }

                                                while($row = mysqli_fetch_assoc($section_query)){
                                                    $section_name = $row['name'];
                                                    echo "<option value ='$section_name' >{$section_name}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="roll" class="sr-only">Roll</label>
                                    <input type="text" name="roll" id="roll" class="form-control" placeholder="Roll number">
                                </div>

                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>

                                <button name="register" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Regisster">Regisster</button>
                            </form>
                            <p class="login-card-footer-text">Have an account? <a href="land.php" class="text-reset">Login here</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
