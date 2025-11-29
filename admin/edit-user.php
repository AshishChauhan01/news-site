<?php
include 'header.php';
$records_query = "SELECT first_name, last_name, username, user_type FROM users ORDER BY id DESC LIMIT 6";
$latest_records = mysqli_query($conn, $records_query);

$user_id = intval($_GET['id']);
$query = "SELECT * FROM users WHERE id = $user_id";
$fetch_record = mysqli_query($conn, $query);
$record = mysqli_fetch_assoc($fetch_record);
?>
<section class="users-section section-padding min-height">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h2>Update User</h2>
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
                                <small class="text-muted">*Leave blank if you don't want to change the password.</small>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="user_type" class="form-label">Types of User</label>
                            <select name="user_type" id="user_type" class="form-select" required>
                                <option value="0" <?= $record['user_type'] == 0 ? 'selected' : ''; ?>>Admin</option>
                                <option value="1" <?= $record['user_type'] == 1 ? 'selected' : ''; ?>>Standard User</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" name="submit" class="btn btn-success btn-sm">Update Details</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <h3 class="border-bottom border-2 mb-0">Latest Updated Users</h3>
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
<?php include 'footer.php'; ?>