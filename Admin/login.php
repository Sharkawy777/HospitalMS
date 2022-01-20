<?php
require './helpers/dbConnection.php';
require './helpers/functions.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = Clean($_POST['email']);
    $password = Clean($_POST['password']);

    $errors = [];


    # Validate Email
    if (!Validate($email, 1)) {
        $errors['Email'] = 'Field Required';
    } elseif (!Validate($email, 2)) {
        $errors['Email'] = 'Invalid Email';
    }

    # Validate Password
    if (!Validate($password, 1)) {
        $errors['Password'] = 'Field Required';
    } elseif (!Validate($password, 3)) {
        $errors['Password'] = 'Length must be >= 6 chars';
    }

    if (count($errors) > 0) {
        # Print Errors
        Errors($errors);
    } else {
        # Logic .......

        $password = md5($password);

        $sql = "select * from users where email = '$email' and password = '$password'";
        $op = mysqli_query($con, $sql);

        if (mysqli_num_rows($op) == 1) {
            // code ....
            $data = mysqli_fetch_assoc($op);
            $_SESSION['user'] = $data;
            if ($_SESSION['user']['role_id'] == 1) {
                header("Location: " . Url());
            } elseif ($_SESSION['user']['role_id'] == 2) {
                header("Location: " . Url());

            } elseif ($_SESSION['user']['role_id'] == 3) {
                header("Location: ../specializations.php");
//                session_destroy();
//                header("Location: ./login.php");
//                echo '* Error in Email || Password Try Again !!!!';
            }
        } else {
            echo '* Error in Email || Password Try Again !!!!';
        }


    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Login - SB Admin</title>
    <link href=" <?php echo url('/assetsDir/css/styles.css'); ?>" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
            crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                            <div class="card-body">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-4" id="inputEmailAddress" name="email"
                                               type="email" placeholder="Enter email address"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control py-4" id="inputPassword" name="password"
                                               type="password" placeholder="Enter password"/>
                                    </div>

                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="./patients/create.php">Need an account? Sign up!</a></div>
<!--                                <div class="small"><a href="../signup.php">Need an account? Sign up!</a></div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="http://localhost/Hospital-MS/admin/assetsDir/js/scripts.js"></script>
</body>
</html>