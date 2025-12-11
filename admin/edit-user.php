<?php
include 'header.php';
$user_id = intval($_GET['id']);
$query = "SELECT * FROM users WHERE id = $user_id";

$fetch_record = mysqli_query($conn, $query);
$record = mysqli_fetch_assoc($fetch_record);

$records_query = "SELECT first_name, last_name, username, user_role FROM users ORDER BY updated_at DESC LIMIT 6";
$latest_records = mysqli_query($conn, $records_query);

if (isset($_POST['update'])) {
    $fields = ['user_id', 'first_name', 'last_name', 'email', 'username', 'user_role'];
    foreach ($fields as $field) {
        $$field = mysqli_real_escape_string($conn, trim($_POST[$field]));
    }
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $update_query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', username = '$username', user_role = '$user_role' ";
    if (!empty($password) && !empty($confirm_password)) {
        if ($password !== $confirm_password) {
            header('location:' . $_SERVER['PHP_SELF'] . '?error=pwd&id=' . $user_id);
            exit;
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $update_query .= ", password = '$hashed_password'";
    }

    $email_query = "SELECT id FROM users WHERE email = '$email' AND id != $user_id";
    $check_email = mysqli_query($conn, $email_query);
    if (mysqli_num_rows($check_email) > 0) {
        header("location:" . $_SERVER['PHP_SELF'] . "?error=email");
        exit();
    }

    $user_name_query = "SELECT id FROM users WHERE username = '$username' AND id != $user_id";
    $check_user_name = mysqli_query($conn, $user_name_query);
    if (mysqli_num_rows($check_user_name) > 0) {
        header("location:" . $_SERVER['PHP_SELF'] . "?error=username");
        exit();
    }

    $update_query .= "WHERE id = $user_id";
    $query_execute = mysqli_query($conn, $update_query);

    if ($query_execute) {
        header('location:users.php?success=updated');
    } else {
        echo "Data not updated : " . mysqli_error($conn);
    }
}
if (isset($_GET['error'])) {
    if ($_GET['error'] == "pwd") {
        echo "<div class='alert alert-danger'>Your entered password do not match!</div>";
    }

    if ($_GET['error'] == "email") {
        echo "<div class='alert alert-danger'>Email already exists!</div>";
    }

    if ($_GET['error'] == "username") {
        echo "<div class='alert alert-danger'>Username already exists!</div>";
    }
}
?>
<section class="users-section section-padding min-height">
    <div class="container">
        <div class="mt-2">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-wrapper">
                        <div class="title-head">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2>Update User</h2>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="users.php" class="btn btn-warning btn-sm">User List <i class="fa-solid fa-list"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" placeholder="Enter First Name" class="form-control" value="<?= $record['first_name']; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control" value="<?= $record['last_name']; ?>">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" placeholder="Enter Email Address" class="form-control" value="<?= $record['email']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">User Name</label>
                                <input type="text" name="username" placeholder="Enter User Name" class="form-control" value="<?= $record['username']; ?>" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" placeholder="Enter new password" class="form-control">

                                </div>
                                <div class="col-md-6">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>

                                    <input type="password" name="confirm_password" placeholder="Confirm new password" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <small class="text-muted" style="font-size: 12px;">*Leave blank if you don't want to change the password.</small>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="user_role" class="form-label">Types of User</label>
                                <select name="user_role" id="user_role" class="form-select" required>
                                    <option value="0" <?= $record['user_role'] == 0 ? 'selected' : ''; ?>>Admin</option>
                                    <option value="1" <?= $record['user_role'] == 1 ? 'selected' : ''; ?>>Standard User</option>
                                </select>
                            </div>
                            <input type="hidden" name="user_id" value="<?= $user_id; ?>">
                            <div>
                                <button type="submit" name="update" class="btn btn-success btn-md w-100">Update Details</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="section-wrapper">
                        <div class="title-head">
                            <h3>Latest Updated Users</h3>
                        </div>
                        <ul>
                            <?php if (mysqli_num_rows($latest_records) > 0) {
                                while ($rows = mysqli_fetch_assoc($latest_records)) {
                            ?>
                                    <li>
                                        <div>
                                            <span>
                                                <?php echo $rows['first_name'] . "&nbsp;" . $rows['last_name'] ?>
                                            </span>
                                            <span>
                                                (<?php echo $rows['user_role'] == "0" ? 'Admin' : 'Standard User'; ?>)
                                            </span>
                                            <span>
                                                <b>Username:</b> <?php echo $rows['username']; ?>
                                            </span>
                                        </div>
                                    </li>
                            <?php }
                            } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>