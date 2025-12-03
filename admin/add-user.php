<?php include "header.php" ?>
<?php

$records_query = "SELECT first_name, last_name, username, user_type FROM users ORDER BY id DESC LIMIT 6";
$latest_records = mysqli_query($conn, $records_query);

if (isset($_POST['submit'])) {
    $first_name = mysqli_real_escape_string($conn, trim($_POST['first_name']));
    $last_name = mysqli_real_escape_string($conn, trim($_POST['last_name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = trim($_POST['password']);
    $conf_password = trim($_POST['confirm_password']);
    $user_type = mysqli_real_escape_string($conn, trim($_POST['user_type']));

    if ($password !== $conf_password) {
        header("location: add-user.php?error=pwd");
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $email_query = "SELECT id FROM users WHERE email = '$email'";
    $check_email = mysqli_query($conn, $email_query);
    if (mysqli_num_rows($check_email) > 0) {
        header("location: add-user.php?error=email");
        exit();
    }

    $user_name_query = "SELECT id FROM users WHERE username = '$username'";
    $check_user_name = mysqli_query($conn, $user_name_query);
    if (mysqli_num_rows($check_user_name) > 0) {
        header("location: add-user.php?error=username");
        exit();
    }

    $insert_query = "INSERT INTO users(first_name, last_name, email, username, password, user_type) VALUES('$first_name', '$last_name', '$email', '$username', '$hashed_password', '$user_type')";

    $insert_data = mysqli_query($conn, $insert_query);
    if ($insert_data) {
        header("location: add-user.php?success=1");
        exit();
    } else {
        echo "Data not inserted!" . mysqli_error($conn);
    }
}

if (isset($_GET['error'])) {
    $alert_text = "";

    if ($_GET['error'] == "pwd") {
        $alert_text = "Your entered password do not match!";
    }

    if ($_GET['error'] == "email") {
        $alert_text = "Email already exists!";
    }

    if ($_GET['error'] == "username") {
        $alert_text = "Username already exists!";
    }

    if (!empty($alert_text)) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>$alert_text
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>";
    }
}
if (isset($_GET['success'])) {
    $alert_text = "";

    if ($_GET['success'] == '1') {
        $alert_text = "😊 User data successfully inserted.";
    }

    if (!empty($alert_text)) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>$alert_text
        <button type='button' class='btn-close btn-sm' data-bs-dismiss='alert'></button>
        </div>";
    }
}
?>
<section class="users-section section-padding min-height">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h2>Add User</h2>
            </div>
            <div class="col-md-4 text-end">
                <a href="users.php" class="btn btn-warning btn-sm">User List <i class="fa-solid fa-list"></i>
                </a>
            </div>
        </div>

        <div class="mt-2">
            <div class="row">
                <div class="col-md-8">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" placeholder="Enter First Name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" placeholder="Enter Email Address" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" name="username" placeholder="Enter User Name" class="form-control" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" placeholder="Confirm your password" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="user_type" class="form-label">Types of User</label>
                            <select name="user_type" id="user_type" class="form-select" required>
                                <option selected disabled>Select User Type</option>
                                <option value="0">Admin</option>
                                <option value="1">Standard User</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" name="submit" class="btn btn-success btn-sm">Add User</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <h3 class="border-bottom border-2 mb-0">Latest Added Users</h3>
                    <ul class="list-style-bullet">
                        <?php if (mysqli_num_rows($latest_records) > 0) {
                            while ($rows = mysqli_fetch_assoc($latest_records)) {
                        ?>
                                <li class="border-bottom py-3">
                                    &#10687; <?php echo $rows['first_name'] . "&nbsp;" . $rows['last_name'] ?><sup>(<?php echo $rows['user_type'] == "0" ? 'Admin' : 'Standard User'; ?>)</sup>
                                    <br>
                                    <span class="ms-3"><b>Username:</b> <?php echo $rows['username']; ?></span>
                                </li>
                        <?php }
                        } ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php" ?>