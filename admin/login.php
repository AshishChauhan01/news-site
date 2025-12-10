<?php
$login_page = true;
include "header.php";
if (isset($_SESSION['login_user_id'])) {
    header('location:index.php');
    exit();
}

if (isset($_POST['signin'])) {
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $userpassword = $_POST['userpassword'];
    $query = "SELECT id, first_name, last_name, user_role, `password` FROM users WHERE username = '$username' OR email = '$username' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $record = mysqli_fetch_assoc($result);
        $check_pwd = password_verify($userpassword, $record['password']);
        if ($check_pwd) {
            $_SESSION['login_user_id'] = $record['id'];
            $_SESSION['login_user_name'] = $record['first_name'] . '&nbsp;' . $record['last_name'];
            $_SESSION['login_user_role'] = $record['user_role'];
            header("location:index.php");
        } else {
            header('location:' . $_SERVER['PHP_SELF'] . '?error=wrong');
            exit();
        }
    } else {
        header('location:' . $_SERVER['PHP_SELF'] . '?error=wrong');
        exit();
    }
}

if (isset($_GET['error'])) {
    $alert_text = "";
    if ($_GET['error'] == 'wrong') {
        $alert_text = "Invalid username or password. Please try again.";
    }

    if ($_GET['error'] == 'notlogin') {
        $alert_text = "You need to log in first.";
    }
}
if (isset($_GET['success'])) {
    if ($_GET['success'] == 'logout') {
        $alert_text = "You've successfully logout";
    }
}

if (!empty($alert_text)) {
    $error_type = isset($_GET['error']) ? 'danger' : 'success';

    echo "<div class='alert alert-$error_type alert-dismissible fade show mb-0' role='alert'>
        $alert_text
      <button type='button' class='btn-close btn-sm' data-bs-dismiss='alert'></button>
    </div>";
}



?>


<div class="login-page">
    <div class="login-wrapper">
        <div class="login-box">
            <div class="logo">
                <img src="../assets/images/logo.jpg" alt="logo">
            </div>
            <h4>Admin Login</h4>
            <p>Welcome back! Please sign in to continue</p>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

                <label for="username" class="form-label">Username</label>
                <input type="text" placeholder="Enter your username or email" id="username" name="username" class="form-control mb-3" required>

                <label for="userpassword" class="form-label">Password</label>
                <input type="password" placeholder="Enter your password" id="userpassword" name="userpassword" class="form-control mb-3" required>

                <div class="remember-me-box">
                    <div class="d-flex align-items-center gap-1">
                        <input type="checkbox" name="remember"><span>Remember me</span>
                    </div>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" name="signin" class="btn btn-info btn-md w-100 mt-3">Sign In</button>
            </form>
            <p class="signup">Don't have an account?&nbsp;<a href="#">Sign Up</a></p>
        </div>
        <p class="copyright-text">@ <?= date('Y') ?> NEWS NX. All rights reserved</p>
    </div>
</div>

<?php include "footer.php"; ?>